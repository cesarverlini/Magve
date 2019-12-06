$(document).ready(function(){
	var base_url = $('#base_url').val();
	$('#editar').click(function(){
		var data = {
			'id' : $('#idCliente').val(),
			'nombre' : $('#nombre').val(),
			'correo' : $('#correo').val(),
			'telefono' : $('#telefono').val(),
		}
		var respuesta = cargar_ajax.run_server_ajax("sistema/clientes/update", data);
		console.log(respuesta);
		if (respuesta == true) {			
			  Swal.fire({
				icon: 'success',
				title: 'Guardado Correctamente',
			  }).then((result) => {
				if (result.value) {
					  window.location = base_url+"sistema/clientes";	
				}
			  })
		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Lo sentimos, hubo un error al guardar, intente de nuevo',
			})	
		}
	});
});
