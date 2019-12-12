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
