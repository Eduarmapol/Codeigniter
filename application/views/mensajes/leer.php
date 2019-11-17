<div class="row">
	<div class="col s12 m12">
		<div class="card teal">
			<div class="card-content white-text">
				<span class="card-title"><?php echo htmlentities($mensaje->titulo); ?></span>

				<p><?php echo $mensaje->mensaje; ?></p>
			</div>
			<div class="card-action">
			<label class="white-text"><?php echo $mensaje->fecha; ?></label> |
			<a href='<?php echo base_url(); ?>usuarios/<?php echo $mensaje->id_emisor?>'><label class="white-text"><?php echo $mensaje->email; ?></label>
			</a>
				<?php
					if($_SESSION['id_usuario'] == $mensaje->id_emisor)
					{
						echo "<a href='#'>Editar</a><a href='posts/eliminar/{$mensaje->id_mensaje}'>Eliminar</a>";
					}
				?>
			</div>
		</div>
	</div>
</div>