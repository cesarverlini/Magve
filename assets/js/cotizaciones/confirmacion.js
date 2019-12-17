base_url = $('#base_url').val();
$('#nombre').hide();
$('#id_cliente').hide();
$('#apellido_p').hide();
$('#apellido_m').hide();
$('#correo').hide();
$('#telefono').hide();

$('#guardar').click(function()
{
	var cliente = {
		id: $('#id_cliente').val(),
		nombre_completo: $('#nombre').val(),
		correo:$('#correo').val(),
		telefono:$('#telefono').val(),
	}		
	respuesta = cargar_ajax.run_server_ajax('sistema/cotizaciones/guardar',cliente);					
	// console.log(respuesta);
	window.open(base_url+"cotizacion_pdf/"+respuesta, '_blank');
	Swal.fire({
		icon: 'success',
		title: 'Cotizacion guardada correctamente',
	  	}).then((result) => {
		if (result.value) {
			  	window.location.href =base_url;
		}
	  })
	window.location.href =base_url;

});
