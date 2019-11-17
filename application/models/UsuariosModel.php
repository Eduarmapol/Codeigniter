<?php

class UsuariosModel extends CI_Model
{
	public function getUsuarios()
	{
		return $this->mypdo->pdo->query('SELECT * FROM usuarios')->fetchAll();
	}

	public function getUsuarioById(int $id_usuario)
	{
		$pst = $this->mypdo->pdo->prepare('SELECT * FROM usuarios WHERE id_usuario = :id_usuario');
		$pst->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
		$pst->execute();
		return $pst->fetch();
	}

	public function getUsuarioSesion(string $email, string $password)
	{
		$pst = $this->mypdo->pdo->prepare('SELECT id_usuario FROM usuarios WHERE email = :email AND password = :password');
		$pst->execute(array('email' => $email, 'password' => $password));
		return $pst->fetchColumn();
	}

}