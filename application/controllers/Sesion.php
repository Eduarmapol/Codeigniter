<?php

class Sesion extends CI_Controller
{
	public function index()
	{
		if($this->input->post())
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
		
			$this->load->model('UsuariosModel');

			$id_usuario = $this->UsuariosModel->getUsuarioSesion($email, $password);
			if ($id_usuario)
			{
				session_start();
				$_SESSION['id_usuario'] = $id_usuario;
				$_SESSION['email'] = $email;
				header('location:usuarios');
			}
			else
			{
				header('Location:index.php?error=sesion');
			}
		}
	}

	public function salir()
	{
		session_start();
		session_destroy();
		header('location:../Init');
	}
}