<?php

class PostsModel extends CI_Model
{
	public function getPosts()
	{
		return $this->mypdo->pdo->query('SELECT posts.*, usuarios.email FROM posts 
			JOIN usuarios ON usuarios.id_usuario = posts.id_usuario
			ORDER BY id_post DESC')->fetchAll();
	}

	public function setPost(int $id_usuario, string $titulo, string $contenido)
	{
		$pst = $this->mypdo->pdo->prepare('INSERT INTO posts VALUES (null, :id_usuario, :titulo, :contenido, :fecha)');
		$fecha = date('Y-m-d h:m:s');
		return $pst->execute(array('id_usuario' => $id_usuario,
							'titulo' => $titulo,
							'contenido' => $contenido,
							'fecha' => $fecha));
	}

	public function getPostsUsuario(int $id_usuario)
	{
		return $this->mypdo->pdo->query('SELECT * FROM posts WHERE id_usuario = '.$id_usuario.' ORDER BY id_post DESC')->fetchAll();
	}

	public function deletePost(int $id_usuario, int $id_post)
	{
		return $this->mypdo->pdo->query('DELETE FROM posts WHERE id_post = '.$id_post.' AND id_usuario = '.$id_usuario);
	}
}