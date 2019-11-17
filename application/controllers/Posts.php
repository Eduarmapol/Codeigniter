<?php

class Posts extends CI_Controller
{

	function __construct()
	{
		session_start();
		parent::__construct();
		if (!isset($_SESSION['id_usuario']))
		{
			header('location:'.base_url());
		}
		$this->load->model('PostsModel');
	}

	public function index()
	{
		$posts = $this->PostsModel->getPosts();
		$this->layout->view('index.php', compact('posts'));
	}

	public function add()
	{
		$this->layout->view('add.php');
	}

	public function userPosts(int $id_post)
	{
		$this->PostsModel->get;
	}

	public function setpost()
	{
		if($this->input->post())
		{
			$id_usuario = $_SESSION['id_usuario'];
			$titulo = $_POST['titulo'];
			$contenido = $_POST['contenido'];
			
			if ($this->PostsModel->setPost($id_usuario, $titulo, $contenido))
			{
				header('location:../');
			}
			else
			{
				header('location:posts?error=true');
			}
		}
	}

	public function eliminar(int $id_post = null)
	{
		if(is_null($id_post))
		{
			header('location:posts');
		}
		else
		{
			$this->PostsModel->deletePost($_SESSION['id_usuario'], $id_post);
			header('location:../../');
		}
	}
}