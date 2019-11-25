$('#navStep1').on('click', function(){
	$('#navStep2').removeClass("active");
	$('#navStep3').removeClass("active");
	$('#navStep4').removeClass("active");
	$('#navStep5').removeClass("active");
	$('#navStep6').removeClass("active");
	$('#navStep7').removeClass("active");
	
	$('#navStep1').addClass("active");
	
	$('#step-1').show();
	$('#step-2').hide();
	$('#step-3').hide();
	$('#step-4').hide();
	$('#step-5').hide();
	$('#step-6').hide();
	$('#step-7').hide();
});

$('#navStep2').on('click', function(){
	$('#navStep1').removeClass("active");
	$('#navStep3').removeClass("active");
	$('#navStep4').removeClass("active");
	$('#navStep5').removeClass("active");
	$('#navStep6').removeClass("active");
	$('#navStep7').removeClass("active");

	$('#navStep2').addClass("active");

	$('#step-2').show();
	$('#step-1').hide();
	$('#step-3').hide();
	$('#step-4').hide();
	$('#step-5').hide();
	$('#step-6').hide();
	$('#step-7').hide();
});

$('#navStep3').on('click', function(){
	$('#navStep1').removeClass("active");
	$('#navStep2').removeClass("active");
	$('#navStep4').removeClass("active");
	$('#navStep5').removeClass("active");
	$('#navStep6').removeClass("active");
	$('#navStep7').removeClass("active");

	$('#navStep3').addClass("active");

	$('#step-3').show();
	$('#step-1').hide();
	$('#step-2').hide();
	$('#step-4').hide();
	$('#step-5').hide();
	$('#step-6').hide();
	$('#step-7').hide();
});

$('#navStep4').on('click', function(){
	$('#navStep1').removeClass("active");
	$('#navStep2').removeClass("active");
	$('#navStep3').removeClass("active");
	$('#navStep5').removeClass("active");
	$('#navStep6').removeClass("active");
	$('#navStep7').removeClass("active");

	$('#navStep4').addClass("active");
	
	$('#step-4').show();
	$('#step-1').hide();
	$('#step-2').hide();
	$('#step-3').hide();
	$('#step-5').hide();
	$('#step-6').hide();
	$('#step-7').hide();
});

$('#navStep5').on('click', function(){
	$('#navStep1').removeClass("active");
	$('#navStep2').removeClass("active");
	$('#navStep3').removeClass("active");
	$('#navStep4').removeClass("active");
	$('#navStep6').removeClass("active");
	$('#navStep7').removeClass("active");

	$('#navStep5').addClass("active");

	$('#step-5').show();
	$('#step-1').hide();
	$('#step-2').hide();
	$('#step-3').hide();
	$('#step-4').hide();
	$('#step-6').hide();
	$('#step-7').hide();
});

$('#navStep6').on('click', function(){
	$('#navStep1').removeClass("active");
	$('#navStep2').removeClass("active");
	$('#navStep3').removeClass("active");
	$('#navStep4').removeClass("active");
	$('#navStep5').removeClass("active");
	$('#navStep7').removeClass("active");

	$('#navStep6').addClass("active");

	$('#step-6').show();
	$('#step-1').hide();
	$('#step-2').hide();
	$('#step-3').hide();
	$('#step-4').hide();
	$('#step-5').hide();
	$('#step-7').hide();
});

$('#navStep7').on('click', function(){
	$('#navStep1').removeClass("active");
	$('#navStep2').removeClass("active");
	$('#navStep3').removeClass("active");
	$('#navStep4').removeClass("active");
	$('#navStep5').removeClass("active");
	$('#navStep6').removeClass("active");

	$('#navStep7').addClass("active");

	$('#step-7').show();
	$('#step-1').hide();
	$('#step-2').hide();
	$('#step-3').hide();
	$('#step-4').hide();
	$('#step-5').hide();
	$('#step-6').hide();
});


$(document).ready(function () {
	$('#navStep2').hide();
	$('#navStep3').hide();
	$('#navStep4').hide();
	$('#navStep5').hide();
	$('#navStep6').hide();
	$('#navStep7').hide();

	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
		(month<10 ? '0' : '') + month + '-' +
		(day<10 ? '0' : '') + day;

	$(".fecha_renta").attr("min", output);

	var Bebidas = [];
	var base_url = "http://localhost/magve/";
	// $('#tablaBebidas').DataTable();
	// $('#btnAddBebida').on('click', function(e){
	// 	var nombre = $('#cmbBebida option:selected').text(); // no se si agregar el nombre o el valor del input
	// 	var cantidad = $('#txtPrecioBebida').val();
	// 	var precio = $('#txtCantidadBebida').val();
	// 	var total = parseInt(cantidad) * parseInt(precio);

	// 	Bebidas.push({
	// 		'nombre':  $('#cmbBebida option:selected').text(), // no se si agregar el nombre o el valor del input
	// 		'cantidad': $('#txtCantidadBebida').val(),
	// 		'precio': $('#txtPrecioBebida').val(),
	// 		'total':  parseInt(cantidad) * parseInt(precio),
	// 	});
		
	// 	// Bebidas.push({"nombre":nombre,"cantidad":cantidad,"precio":precio,"total":total});
	// 	$('#tablabebidas').empty();
	// 	$.each(Bebidas, function(e,v){
	// 		$('#tablabebidas').append(
	// 			'<tr>'+
	// 			'<td>'+v.nombre+'</td>'+
	// 			'<td>'+v.precio+'</td>'+
	// 			'<td>'+v.cantidad+'</td>'+
	// 			'<td>'+v.total+'</td>'+
	// 			'</tr>'
	// 		);
	// 	});
				
	// });
	
	// var Comidas = [];
	// $('#btnAddComida').on('click', function(e){
	// 	var nombre = $('#cmbComida option:selected').text(); // no se si agregar el nombre o el valor del input
	// 	var cantidad = $('#txtPrecioComida').val();
	// 	var precio = $('#txtCantidadComida').val();
	// 	var total = parseInt(cantidad) * parseInt(precio);

	// 	Comidas.push({"nombre":nombre,"cantidad":cantidad,"precio":precio,"total":total});
	// 	$('#tablaComida').empty();
	// 	$.each(Comidas, function(e,v){
	// 		$('#tablaComida').append(
	// 			'<tr>'+
	// 			'<td>'+v.nombre+'</td>'+
	// 			'<td>'+v.precio+'</td>'+
	// 			'<td>'+v.cantidad+'</td>'+
	// 			'<td>'+v.total+'</td>'+
	// 			'</tr>'
	// 		);
	// 	});
				
	// });
	
	// var Postres = [];
	// $('#btnAddPostre').on('click', function(e){
	// 	var nombre = $('#cmbPostre option:selected').text(); // no se si agregar el nombre o el valor del input
	// 	var cantidad = $('#txtPrecioPostre').val();
	// 	var precio = $('#txtCantidadPostre').val();
	// 	var total = parseInt(cantidad) * parseInt(precio);

	// 	Postres.push({"nombre":nombre,"cantidad":cantidad,"precio":precio,"total":total});
	// 	$('#tablapostres').empty();
	// 	$.each(Postres, function(e,v){
	// 		$('#tablapostres').append(
	// 			'<tr>'+
	// 			'<td>'+v.nombre+'</td>'+
	// 			'<td>'+v.precio+'</td>'+
	// 			'<td>'+v.cantidad+'</td>'+
	// 			'<td>'+v.total+'</td>'+
	// 			'</tr>'
	// 		);
	// 	});
				
	// });
	
});
var datos_cotizacion = [];
var respuesta_cliente = 0;
$('#btnprueba').on('click',function(e){	
	var arrayDatos = [];
	if ($('#nombreCliente').val() != "" && $('#correoCliente').val() != "" && $('#telefonoCliente').val() != "" ) 
	{
		var TotalCotizacion = 0;
		datos_cotizacion = [];
		if ($('#cbxlocal').prop('checked')) {
			var locales = {
				tipo_servicio: 'local',
				nombre: $('#cmbLocales option:selected').text(),
				direccion: $('#txtLocalAddress').val(),
				capacidad: $('#txtLocalCap').val(),
				costo: $('#txtCostoLocal').val(),
				fecha_renta: $('#filtroLocal_fecha').val(),
				id_cotizacion: 0
			}	
			TotalCotizacion = parseInt(TotalCotizacion) + parseInt($('#txtCostoLocal').val())
			datos_cotizacion.push(locales);
		}
		if ($('#cbxfotografia').prop('checked')) {
			var fotografia = {
				tipo_servicio: 'fotografia',
				nombre: $('#cmbPaqueteFoto option:selected').text(),
				descripcion: $('#txtDesc_foto').val(),
				costo: $('#txtCostoFoto').val(),
				fecha_renta: $('#filtroFoto_fecha').val(),
				id_cotizacion: respuesta_cliente
			}
			TotalCotizacion = parseInt(TotalCotizacion) + parseInt($('#txtCostoFoto').val())
			datos_cotizacion.push(fotografia);
		}
		if ($('#cbximprenta').prop('checked')) {
			var imprenta = {
				tipo_servicio: 'imprenta',
				nombre: $('#cmbPaqueteImprenta option:selected').text(),
				descripcion: $('#txtDesc_imprenta').val(),
				costo: $('#txtCostoImprenta').val(),
				fecha_renta: $('#filtroImprenta_fecha').val(),
				id_cotizacion: respuesta_cliente
			}
			TotalCotizacion = parseInt(TotalCotizacion) + parseInt($('#txtCostoImprenta').val())
			datos_cotizacion.push(imprenta);
		}
		if ($('#cbxbanquete').prop('checked')) {
			var banquete = {
				tipo_servicio: 'banquete',
				nombre: $('#cmbPaqueteBanquete option:selected').text(),
				descripcion: $('#txtDesc_banquete').val(),
				costo: $('#txtCostoBanquete').val(),
				fecha_renta: $('#filtroBanquete_fecha').val(),
				id_cotizacion: respuesta_cliente
			}
			TotalCotizacion = parseInt(TotalCotizacion) + parseInt($('#txtCostoBanquete').val())
			datos_cotizacion.push(banquete);
		}
		if ($('#cbxdecoracion').prop('checked')) {
			var decoracion = {
				tipo_servicio: 'decoracion',
				nombre: $('#cmbPaqueteDecoracion option:selected').text(),
				descripcion: $('#txtDesc_decoracion').val(),
				costo: $('#txtCostoDecoracion').val(),
				fecha_renta: $('#filtroDecoracion_fecha').val(),
				id_cotizacion: respuesta_cliente
			}
			TotalCotizacion = parseInt(TotalCotizacion) + parseInt($('#txtCostoDecoracion').val())
			datos_cotizacion.push(decoracion);
		}
		var cliente = {
			nombre: $('#nombreCliente').val(),
			correo: $('#correoCliente').val(),
			telefono: $('#telefonoCliente').val(),
			total: TotalCotizacion
		}					
		// console.log(locales);	
		respuesta_cliente = cargar_ajax.run_server_ajax('sistema/cotizaciones/Crear_Cliente',cliente);				
		if (respuesta_cliente) 
		{
			var id_cotizacion = respuesta_cliente;
			if ($('#cbxfotografia').prop('checked')) { locales['id_cotizacion'] = id_cotizacion}
			if ($('#cbxlocal').prop('checked')) { fotografia['id_cotizacion'] = id_cotizacion}
			if ($('#cbximprenta').prop('checked')) { imprenta['id_cotizacion'] = id_cotizacion}
			if ($('#cbxbanquete').prop('checked')) { banquete['id_cotizacion'] = id_cotizacion}
			if ($('#cbxdecoracion').prop('checked')) { decoracion['id_cotizacion'] = id_cotizacion}
			// datos_cotizacion.push(id_cotizacion);
			$.each(datos_cotizacion, function( key, value ) {		
				var respuesta;
					respuesta += cargar_ajax.run_server_ajax('sistema/cotizaciones/crear_detalle_cotizacion',value);
					console.log(respuesta);	
			});				
			// var cotizacion_id = {
			// 	id_cotizacion: respuesta_cliente
			// }
			// cargar_ajax.run_server_ajax('sistema/cotizaciones/definir_total',cotizacion_id);	
		}
			// console.log(datos_cotizacion);
	}
			
	

});
//===================================================================================================================================================== 
// 																	BTN'S CARRITO
//=====================================================================================================================================================


$('#btnCarritoLocal').on('click',function(){
	
	// console.log(datos_cotizacion);
	// $('#tablaCarrito').empty();	
	$.each(datos_cotizacion, function( key, value ) {	
		if (value.tipo_servicio == 'local') {
			$('#tablaCarrito').append(
				'<tr>'+
					'<td>'+value.tipo_servicio+'</td>'+
					'<td>'+value.nombre+'</td>'+
					'<td>'+value.costo+'</td>'+
				'</tr>'
				// '<option value="">'+"Seleccionar..."+'</option>'
			);
		}	
	});

	
});
$('#btnCarritoFoto').on('click',function(){
	
		$.each(datos_cotizacion, function( key, value ) {	
		if (value.tipo_servicio == 'fotografia') {
			$('#tablaCarrito').append(
				'<tr>'+
					'<td>'+value.tipo_servicio+'</td>'+
					'<td>'+value.nombre+'</td>'+
					'<td>'+value.costo+'</td>'+
				'</tr>'
				// '<option value="">'+"Seleccionar..."+'</option>'
			);
		}	
	});
});
$('#btnCarritoImprenta').on('click',function(){
	
		$.each(datos_cotizacion, function( key, value ) {	
			if (value.tipo_servicio == 'imprenta') {
				$('#tablaCarrito').append(
					'<tr>'+
						'<td>'+value.tipo_servicio+'</td>'+
						'<td>'+value.nombre+'</td>'+
						'<td>'+value.costo+'</td>'+
					'</tr>'
					// '<option value="">'+"Seleccionar..."+'</option>'
				);
			}	
		});
});
$('#btnCarritoBanquete').on('click',function(){

		$.each(datos_cotizacion, function( key, value ) {	
			if (value.tipo_servicio == 'banquete') {
				$('#tablaCarrito').append(
					'<tr>'+
						'<td>'+value.tipo_servicio+'</td>'+
						'<td>'+value.nombre+'</td>'+
						'<td>'+value.costo+'</td>'+
					'</tr>'
					// '<option value="">'+"Seleccionar..."+'</option>'
				);
			}	
		});
		
});
$('#btnCarritoDecoracion').on('click',function(){

		$.each(datos_cotizacion, function( key, value ) {	
		if (value.tipo_servicio == 'decoracion') {
			$('#tablaCarrito').append(
				'<tr>'+
					'<td>'+value.tipo_servicio+'</td>'+
					'<td>'+value.nombre+'</td>'+
					'<td>'+value.costo+'</td>'+
				'</tr>'
				// '<option value="">'+"Seleccionar..."+'</option>'
			);
		}	
	});
});
// $('#').on('click',function(){

// });
//===================================================================================================================================================== 
// 																	ASDASD
//=====================================================================================================================================================
var locales = [];
var prueba = [];
var datos = [];
$('#cmbLocales').change(function()
{	
	var id = $(this).val();
	$.each(prueba, function( key, value ) {		
		if (value.id == id) {
			datos = value;
		}	
	});
	$('#txtLocalCap').val(datos.capacidad);
	$('#txtLocalAddress').val(datos.direccion);
	$('#txtCostoLocal').val(datos.costo);
});
$('#filtroLocal_fecha').change(function()
{
	var fecha_seleccionada = $(this).val();
	prueba = cargar_ajax_get.run_server_ajax('Locales/disponibilidad/'+fecha_seleccionada);
	$('#cmbLocales option').remove();	
	$('#cmbLocales').append(
		'<option value="">'+"Seleccionar..."+'</option>'
	);
	$.each( prueba, function( key, value ) {	
		$('#cmbLocales').append(
			'<option value="'+value.id+'">'+value.nombre+'</option>'
		);	
	});
	// console.log(prueba);
});



// var output = (day<10 ? '0' : '') + day + '/' + (month<10 ? '0' : '') + month + '/' +  d.getFullYear();

	$('#btnapi').on('click',function(){
		$fecha = '2019-11-29';
		var data = {
			id_local: 1,
			id_cliente: 1,
			fecha_renta: '2019-11-29',
		}
		// prueba = cargar_ajax_put.run_server_ajax('Locales/local/'+data.id_local+'/'+data.id_cliente+'/'+data.fecha_renta);
		// console.log(data);
		prueba = cargar_ajax_put.run_server_ajax('Locales/local',data);
		console.log(prueba);

	});
//===================================================================================================================================================== 
// 																	CHECKBOX'S
//=====================================================================================================================================================
$('#cbxlocal').change(function(){
	if ($(this).is( ":checked" )) {
		// prueba = cargar_ajax_get.run_server_ajax('Locales/local/');				
		// locales = prueba['locales'];
		// // console.log(prueba['locales']);
		// $.each( prueba['locales'], function( key, value ) {			
		// 	$('#cmbLocales').append(
		// 		'<option value="'+value.id+'">'+value.nombre+'</option>'
		// 	);
		// });
		$('#navStep2').show();
	}else{
		$('#navStep2').hide();

	}
});
$('#cbxfotografia').change(function(){
	if ($(this).is( ":checked" )) {
		$('#navStep3').show();
	}else{
		$('#navStep3').hide();

	}
});
$('#cbxbanquete').change(function(){
	if ($(this).is( ":checked" )) {
		$('#navStep4').show();
	}else{
		$('#navStep4').hide();

	}
});
$('#cbximprenta').change(function(){
	if ($(this).is( ":checked" )) {
		$('#navStep5').show();
	}else{
		$('#navStep5').hide();

	}
});
$('#cbxdecoracion').change(function(){
	if ($(this).is( ":checked" )) {
		$('#navStep6').show();
	}else{
		$('#navStep6').hide();

	}
});
