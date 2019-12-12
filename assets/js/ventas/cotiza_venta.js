$(function () {
	// JS Date
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	
	var output = d.getFullYear() + '-' +
	(month<10 ? '0' : '') + month + '-' +
	(day<10 ? '0' : '') + day;
	
	$(".fecha_renta").attr("min", output);
	
	$('#fechaEvento').change(function(){
		var folio = {
			folio:  $('#folio').val()
		}
		id_producto = 0;
		var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/cotizacion_folio", folio);
		$.each(respuesta, function(e,v){
			if (v.id_proveedor = 2) {
				id_producto = v.id_producto;
				url = 'Locales/disponibilidad_local/';
				servicio = "Local";
			}else if (v.id_proveedor = 3) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			}else if (v.id_proveedor = 4) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			}else if (v.id_proveedor = 5) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			}else if (v.id_proveedor = 6) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			}else if (v.id_proveedor = 7) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			}
		});
		var fecha_seleccionada = $(this).val();
		response = cargar_ajax_get.run_server_ajax(url+id_producto+'/'+fecha_seleccionada);
		// console.log(response);

		if (response.error == false) {
			var no_disponible = [];
			$.each(response.fechas, function(e,v){
				no_disponible.push(' '+v.fecha_renta);												
			});	
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Lo sentimos, el '+servicio+' seleccionado no esta disponible en las siguientes fechas '+ no_disponible,
			})			
		}else{
			//nada
		}
	});
	
})
$('#finalizarventa').click(function(){

	var data = {
		tarjeta: $('#tarjeta').val(),
		nip: $('#nip').val(),
		cvv: $('#cvv').val(),
		monto: $('#monto').val(),
	}
	var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/generar_venta", data);
	console.log(respuesta);
	if (respuesta == true) {	 //aqui pondrías la respuesta de que si fue hecho bien el deposito, pues suelta un alerta de que esta todo bien		
		Swal.fire({
		  icon: 'success',
		  title: 'Pago efectuada correctamente',
		}).then((result) => {
		  if (result.value) {
				// window.location = base_url+"sistema/clientes";	
		  }
		})
	}else{ //si no se efectuo el deposito, tira error
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Lo sentimos, hubo un error al registrar el pago',
		})	
	}
})
