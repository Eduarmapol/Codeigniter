<!DOCTYPE html>
<html>
<head>
	<title>CESM</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/materialize-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/materialize.min.css">

	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/scripts.js"></script>
	<meta name="viewport"  content="width=device-width,initial-scale=1.0"/>
	<script type="text/javascript">
		$(document).ready(function() {
    $('select').material_select();
  });
	</script>
</head>
<body>
	<nav>
		
		
		<?php 
		if (isset($_SESSION['id_usuario']))
		{
			echo '<a href="'.base_url('posts').'">Ver Articulos</a> |
			<a href="'.base_url('posts/add').'">Agregar Articulo</a> |';

			echo "<a href=".base_url('sesion/salir').">Salir</a> | ";
			echo 'Usuario: '.$_SESSION['email'];
		}
		
		//	echo "<a href=".base_url().">Ingresar</a> |";
		?>
	</nav>
	<div class="container" style='height: 100vh'>
		<?php
			echo $content_for_layout;
		?>
	</div>
</body>
</html>