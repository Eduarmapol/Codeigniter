<?php

class MensajesModel extends CI_Model
{
	public function getMensajesRecibidos(int $id_usuario)
	{
		$pst = $this->mypdo->pdo->prepare('SELECT mensajes.*, usuarios.email FROM mensajes JOIN usuarios ON usuarios.id_usuario = mensajes.id_emisor WHERE id_remitente = :id_usuario');
		$pst->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
		$pst->execute();
		return $pst->fetchAll();
	}

		public function getMensajesEnviados(int $id_usuario)
	{
		$pst = $this->mypdo->pdo->prepare('SELECT mensajes.*, usuarios.email FROM mensajes JOIN usuarios ON usuarios.id_usuario = mensajes.id_remitente WHERE id_emisor = :id_usuario');
		$pst->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
		$pst->execute();
		return $pst->fetchAll();
	}

	public function getMensaje(int $id_usuario, int $id_mensaje)
	{
		$pst = $this->mypdo->pdo->prepare('SELECT mensajes.*, usuarios.email FROM mensajes
		JOIN usuarios ON usuarios.id_usuario = mensajes.id_emisor WHERE (id_emisor = :id_usuario OR id_remitente = :id_usuario) AND id_mensaje = :id_mensaje');
		$pst->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
		$pst->bindParam('id_mensaje', $id_mensaje, PDO::PARAM_INT);
		$pst->execute();
		$this->setEstado($id_usuario, $id_mensaje);
		return $pst->fetch();
	}

	public function setMensaje(int $id_emisor, int $id_remitente, string $titulo, string $mensaje)
	{
		$pst = $this->mypdo->pdo->prepare('INSERT INTO mensajes VALUES (null, :id_emisor, :id_remitente, :titulo, :mensaje, :fecha, 0)');
		$pst->bindParam('id_emisor', $id_emisor);
		$pst->bindParam('id_remitente', $id_remitente);
		$pst->bindParam('titulo', $titulo);
		$pst->bindParam('mensaje', $mensaje);
		$fecha = date('Y-m-d h:m:s');
		$pst->bindParam('fecha', $fecha);
		return $pst->execute();
	}

	private function setEstado(int $id_usuario, int $id_mensaje)
	{
		return $this->mypdo->pdo->query("UPDATE mensajes SET estado = 1 WHERE id_remitente = {$id_usuario} AND id_mensaje = {$id_mensaje}");
	}

}