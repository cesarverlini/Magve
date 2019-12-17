$(function () {
	$('#Contrato').hide();

	base_url = $('#base_url').val();
	folio = $('#folioCotizacion').val();

	// JS Date
	var d = new Date();
	var month = d.getMonth() + 1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
		(month < 10 ? '0' : '') + month + '-' +
		(day < 10 ? '0' : '') + day;

	$(".fecha_renta").attr("min", output);

	$('#fechaEvento').change(function () {
		var folio = {
			folio: $('#folioCotizacion').val()
		}
		id_producto = 0;
		var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/cotizacion_folio", folio);
		$.each(respuesta, function (e, v) {
			if (v.id_proveedor = 2) {
				id_producto = v.id_producto;
				url = 'Locales/disponibilidad_local/';
				servicio = "Local";
			} else if (v.id_proveedor = 3) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			} else if (v.id_proveedor = 4) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			} else if (v.id_proveedor = 5) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			} else if (v.id_proveedor = 6) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			} else if (v.id_proveedor = 7) {
				id_producto = v.id_producto;
				url = 'proveedor/disponibilidad/';
				servicio = "servicio";
			}
		});
		var fecha_seleccionada = $(this).val();
		response = cargar_ajax_get.run_server_ajax(url + id_producto + '/' + fecha_seleccionada);
		// console.log(response);

		if (response.error == false) {
			var no_disponible = [];
			$.each(response.fechas, function (e, v) {
				no_disponible.push(' ' + v.fecha_renta);
			});
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Lo sentimos, el ' + servicio + ' seleccionado no esta disponible en las siguientes fechas ' + no_disponible,
			})
			$('#Contrato').hide();
		} else {
			$('#Contrato').show();
		}
	});
	
	// response = cargar_ajax.run_server_ajax('/sistema/ventas/cotizacion_folio',folio );
	// id_cotizacion = response.id;
	// console.log(response);
	

})
$('#Contrato').click(function(){
	window.open(base_url+"contrato/"+folio);
});
$('#finalizarventa').click(function () {
	// arreglo para el pago
	var data = {
		tarjeta: $('#tarjeta').val(),
		nip: $('#nip').val(),
		monto: $('#monto').val(),
		fecha: $('#fecha').val()
	}

	alert(data.fecha);

	// JSON.parse, para poder leer la respuesta
	var respuesta = JSON.parse(cargar_ajax.run_server_ajax("sistema/ventas/generar_venta", data));
	//var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/generar_venta", data);

	console.log(respuesta);

	if (!respuesta.error) {
		Swal.fire({
			icon: 'success',
			title: 'Pago efectuado correctamente',
			text: respuesta.mensaje + '\nOperación #' + respuesta.numero_transaccion + " " + respuesta.fecha
		}).then((result) => {
			if (result.value) {
				// se procede con la compra

				var datos_compra = {
					ubicacion: $('#ubiEvento').val(),
					fecha: $('#fechaEvento').val(),
					folio: $('#folioCotizacion').val(),
					pago: $('#monto').val(),
					metodo: 1,
					num_transaccion: respuesta.numero_transaccion,
					fecha_autorizacion: respuesta.fecha
				}

				// ejecutamos el metodo para guardar la compra
				var compra_result = cargar_ajax.run_server_ajax("sistema/ventas/generar_compra", datos_compra);

				Swal.fire({
					icon: 'success',
					title: 'Venta registrada orrectamente',
					text: 'La venta se efectuó con exito.'
				}).then((result) => {
					if (result.value) {
						window.location.href = base_url;
					}
				})
			}
		})
	} else {
		Swal.fire({
			icon: 'error',
			title: 'Algo salió mal',
			text: respuesta.errno+" "+respuesta.mensaje,
		})
	}
})
