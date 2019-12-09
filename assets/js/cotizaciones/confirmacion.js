base_url = $('#base_url').val();
$('#nombre').hide();
$('#apellido_p').hide();
$('#apellido_m').hide();
$('#correo').hide();
$('#telefono').hide();


$('#guardar').click(function()
{
	var cliente = {
		nombre_completo: $('#nombre').val(),
		correo:$('#correo').val(),
		telefono:$('#telefono').val(),
	}		
	respuesta = cargar_ajax.run_server_ajax('sistema/cotizaciones/guardar',cliente);					
	window.open(base_url+"cotizacion_pdf/"+respuesta, '_blank');
	window.open(base_url);
	// console.log(base_url);

});
