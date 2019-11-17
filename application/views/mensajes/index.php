<center><h4>Mensajes</h4></center>

<div class="row">
	<div class="center">
		<form method="post" action="mensajes/enviarMensaje">
				<div class="input-field col s4 offset-s4">	
						<select name="id_usuario" required="true">
							<option value="">Seleccione</option>
							<?php
								foreach($usuarios as $usuario)
								{
									echo "<option value='{$usuario->id_usuario}'>{$usuario->email}</option>";
								}
							?>
						</select>
						<label>Destinatario</label>			
				</div>
				<div class="clearfix"></div>
				<div class="input-field col s4 offset-s4">	
						<input type="text" name="titulo" class="validate" maxlength="32" required="true">
						<label>Título</label>
				</div>
				<div class="clearfix"></div>
				<div class="input-field col s4 offset-s4">	
						<textarea name="mensaje" class="message materialize-textarea" maxlength="1024"></textarea>
						<label>Mensaje</label>
				</div>
				<div class="clearfix"></div>
				<input type="submit" class="btn waves-effect" value="Enviar">
			</form>
		</div>
</div> 

<hr>

<div class="row">
	<div class="col offset-l2 offset-m2 s12 l8 m8">
		<ul class="collapsible" data-collapsible="accordion">
			<li> 
					<div class="collapsible-header orange white-text">Buzón de entrada</div>
					<div class="collapsible-body teal lighten-5">
						<table>
							<thead>
								<tr>
									<th>N°</th>
									<th>Título</th>
									<th>Email</th>
									<th>Opción</th>
								</tr>
							</thead>
							<tbody>
									<?php
									$contador = 1;
									foreach($mensajesRecibidos as $mensaje)
									{
										$leido = '';
										if (!$mensaje->estado)
										{
											$leido = "class='yellow lighten-4'";
										}
										echo 
										"		<tr {$leido}>
													<td>{$contador}</td>
													<td><a href='mensajes/leer/{$mensaje->id_mensaje}'>{$mensaje->titulo}</a></td>
													<td>{$mensaje->email}</td>
													<td><a href=''>Eliminar</a></td>
												</tr>
											</tbody>
										";
										$contador++;
									}
									?>
								</tbody>
							</table>
					</div>
		</li>
			<li> 
					<div class="collapsible-header orange white-text">Buzón de salida</div>
					<div class="collapsible-body teal lighten-5">
						<table>
							<thead>
								<tr>
									<th>N°</th>
									<th>Título</th>
									<th>Email</th>
									<th>Opción</th>
								</tr>
							</thead>
							<tbody>
									<?php
									$contador = 1;
									foreach($mensajesEnviados as $mensaje)
									{
										echo 
										"		<tr>
													<td>{$contador}</td>
													<td><a href='mensajes/leer/{$mensaje->id_mensaje}'>{$mensaje->titulo}</a></td>
													<td>{$mensaje->email}</td>
													<td><a href=''>Eliminar</a></td>
												</tr>
											</tbody>
										";
										$contador++;
									}
									?>
								</tbody>
							</table>
					</div>
		</li>
	</ul>
	
			