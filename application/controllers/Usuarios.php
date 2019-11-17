<?php

class Usuarios extends CI_Controller
{
	public function index(int $id_usuario = null)
	{
		session_start();
		if (!isset($_SESSION['id_usuario']))
		{
			header('location:'.base_url());
		}
		
		$id_usuario = $id_usuario ?? $_SESSION['id_usuario'];
		$this->load->model('PostsModel');
		$this->load->model('UsuariosModel');
		$usuario = $this->UsuariosModel->getUsuarioById($id_usuario);
		if (!$usuario)
		{
			header('location:index');
		}
		$posts = $this->PostsModel->getPostsUsuario($id_usuario);
		$this->layout->view('index', compact('usuario', 'posts'));
	}

}