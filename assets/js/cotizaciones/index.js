$(document).ready(function(){
	$('#confirmacion').click(function(){
		var data = {
			'nombre' : $('#nombre').val(),
			'correo' : $('#correo').val(),
			'telefono' : $('#telefono').val(),
		}
		var respuesta = cargar_ajax.run_server_ajax("sistema/Cotizaciones/existe_correo", data);
		console.log(respuesta);
		if (respuesta == true) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Lo sentimos, el correo electronico ya existe en nuestro sistema, favor de introducir otro',
			})		
		}else{
			$('#submit').click();
		}

	});
	
});
