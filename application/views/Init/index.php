<div class="row">
	<div class="center">
		<form method="post" action="sesion">
				<h5>&nbsp;</h5>
				<div class="input-field col s4 offset-s4">	
						<input type="text" name="email" class="validate" required="true">
						<label>Usuario</label>
				</div>
				<div class="clearfix"></div>
				<div class="input-field col s4 offset-s4">	
						<input type="password" name="password" class="validate" required="true">
						<label>Contraseña</label>
				</div>
				<div class="clearfix"></div>
				<input type="submit" class="btn waves-effect" value="Iniciar Sesion">
				<?php
					if($_GET)
					{
						if($_GET['error'] == 'sesion')
						{
							echo "<br><label class='red-text label'>Usuario no encontrado.</label>";
						}
					}
				?>
			</form>
		</div>
</div>