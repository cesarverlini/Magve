var url = $(location).attr('href');
var segments = url.split('/');
var id = segments[6]; //para agarrar el id enviando en la url
$(function () {
	locales = cargar_ajax_get.run_server_ajax('Locales/local/'+id);
	$.each( locales.locales, function( key, value ) {	
		local = value;
		$('#nombrelocal').text(local.nombre);
		$('#direccion').text(local.direccion);
		$('#costo').text("$ "+local.costo);
		$('#capacidad').text("Este local tiene capacidad para "+local.capacidad+" personas");
	});	
})
