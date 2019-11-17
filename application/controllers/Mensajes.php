<?php

class Mensajes extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		session_start();
		if (!isset($_SESSION['id_usuario']))
		{
			header('location:'.base_url());
		}
		$this->load->model('MensajesModel');
		$this->load->model('UsuariosModel');
	}

	public function index()
	{
		$mensajesRecibidos = $this->MensajesModel->getMensajesRecibidos($_SESSION['id_usuario']);
		$mensajesEnviados = $this->MensajesModel->getMensajesEnviados($_SESSION['id_usuario']);
		$usuarios = $this->UsuariosModel->getUsuarios();
		$this->layout->view('index', compact('mensajesRecibidos', 'mensajesEnviados', 'usuarios'));
	}

	public function enviarMensaje()
	{
		if($this->input->post())
		{
			$id_emisor = $_SESSION['id_usuario'];
			$id_receptor = $_POST['id_usuario'];
			$titulo = $_POST['titulo'];
			$mensaje = $_POST['mensaje'];
			
			if($this->MensajesModel->setMensaje($id_emisor, $id_receptor, $titulo, $mensaje))
			{
				header('location:../mensajes');
			}
			else
			{
				die("Error");
			}
		}
	}

	public function leer(int $id_mensaje = null)
	{
		if(is_null($id_mensaje))
		{
			header('location:../');
		}
		else
		{
			$mensaje = $this->MensajesModel->getMensaje($_SESSION['id_usuario'], $id_mensaje);
			if($mensaje)
				$this->layout->view('leer.php', compact('mensaje'));
			else
				header('location:../');
		}
	}
}