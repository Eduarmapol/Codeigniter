$(document).on('submit', '#guardar', function(e)
{
	var id = this.id;
	e.preventDefault();
	$.ajax({
		method: this.method,
		url: this.action,
		data: $(this).serialize(),
		dataType: 'json',
		success:function(data)
		{

			if(data['error'])
			{				
				var mensajes = data['mensaje'].split('</p>');
				if(mensajes.length == 1)
					Materialize.toast(mensajes[0], 2000);
				for (var i = 0; i <= mensajes.length - 2; i++) {
					Materialize.toast(mensajes[i], 2000);

				}
			}
			else
			{
				Materialize.toast(data['mensaje'], 2000);
				document.getElementById(id).reset();
			}
		}
	});
}); 


$(document).on('submit', '#sesion', function(e)
{
	var id = this.id;
	e.preventDefault();
	$.ajax({
		method: this.method,
		url: this.action,
		data: $(this).serialize(),
		dataType: 'json',
		success:function(data)
		{
			if(data['error'])
			{
				var mensajes = data['mensaje'].split(".");
				for(i = 0; i< mensajes.length - 1; i++)
				{
					Materialize.toast(mensajes[i], 2000);
				}
			}
			else
			{				
				Materialize.toast(data['mensaje'], 2000);
				location.reload();
			}
			
		}
	});
}); 


$(document).on('click', '#eliminar', function(e)
	{
		e.preventDefault();
		if(confirm('¿Desea eliminar este contenido?'))
		{
			$.ajax({
				method:'get',
				url: this.href,
				dataType: 'json',
				success: function(data)
				{
					Materialize.toast(data['mensaje'], 2000);
					$('#' + data['id']).fadeOut(function(){
						$('#' + data['id']).remove();
					});
				}
			});
		}
	});

$(document).on('submit', '#actualizar', function(e)
{
	var id = this.id;
	e.preventDefault();
	$.ajax({
		method: this.method,
		url: this.action,
		data: $(this).serialize(),
		dataType: 'json',
		success:function(data)
		{
			if(data['error'])
			{				
				var mensajes = data['mensaje'].split('</p>');
				for (var i = 0; i <= mensajes.length - 2; i++) {
					Materialize.toast(mensajes[i], 2000);
				}
			}
			else
			{
				Materialize.toast(data['mensaje'], 2000);
			}
		}
	});
}); 