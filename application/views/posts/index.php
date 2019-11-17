<br>
<table>
<tr style="background-color: #CCC">
	<td><b>Articulo</b></td>
	<td><b>Precio</b></td>
	<td></td>
</tr>
<?php

foreach($posts as $post)
{
?>

	<tr>
		<td><?php echo htmlentities($post->titulo); ?></td>
		<td width="200px">$ <?php echo number_format($post->contenido, 0, '.', ','); ?></td>
		<?php
			if($_SESSION['id_usuario'] == $post->id_usuario)
			{
				
				echo "<td><a href='posts/eliminar/{$post->id_post}'>Eliminar</a></td>";
			}
		?>		
	</tr>

<?php
}
?>
</table>