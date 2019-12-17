$(document).ready(function(){
	contrato_id = 0;
	$('#tabla_cotizacion').hide();
	$('#divcotizaciones').hide();
	// $('#Contrato').hide();
	$('#btn-compra').hide();
	$('#detalle-titulo').hide();
	var base_url = $('#base_url').val();
	$('#correofolio').autocomplete({	
		source: function(req,res){	
			$('#tabla_cotizacion').hide();
			// $('#Contrato').hide();
			$('#tblbodyCotizacion').empty();
			$.ajax({
				url: base_url+"sistema/ventas/autocomplete",
				type: 'post',
				dataType: "json",
				data: {
				  search: req.term
				},
				success: function( data ) {
					 res($.map(data, function (value, key) {
						 if (value.correo) {
							return {
								label: value.correo,
								value: key.correo,
								nombre: value.nombre_completo,
								telefono: value.telefono,
								id: value.id,
								correo: value.correo
							};
						 }else{
							return {
								label: value.folio,
								value: key.folio,
								id: value.id,
								id_cliente: value.id_cliente,
								subtotal: value.subtotal,
								iva: value.subtotal,
								total: value.total,
								folio: value.folio
							};
						 }					 
						
					}));
				}
			  });			
		},
		select: function(event, selectedData){
			if (selectedData.item.correo) {
				$('#divcotizaciones').show();
				$('#nombre').val(selectedData.item.nombre);
				$('#correo').val(selectedData.item.label);
				$('#telefono').val(selectedData.item.telefono);
				var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/get_cotizaciones", $data = { 'id': selectedData.item.id});
				// console.log(respuesta);
				$('#cmbCotizaciones').empty();
				$('#cmbCotizaciones').append(
					'<option value="">Seleccionar...</option>'
				);
				$.each(respuesta, function(e,v){
					$('#cmbCotizaciones').append(
						// '<option value="">Seleccionar...</option>' +
						'<option value="'+v.id+'" name="'+v.subtotal+'" >'+v.folio+'</option>' 
					);
				});		
			}else{
				$('#divcotizaciones').hide();
				var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/get_cliente", $data = { 'id': selectedData.item.id_cliente});
				total =  selectedData.item.subtotal;
				id_cotizacion = selectedData.item.id;
				folio = selectedData.item.folio;
				$('#nombre').val(respuesta[0].nombre_completo);
				$('#correo').val(respuesta[0].correo);
				$('#telefono').val(respuesta[0].telefono);
				obtener_detalle(id_cotizacion);
			}
			
		}
	});
	$('#folio').autocomplete({	
		source: function(req,res){	
			// $('#tabla_cotizacion').hide();
			// $('#Contrato').hide();
			$('#tblbodyCotizacion').empty();
			$.ajax({
				url: base_url+"sistema/ventas/autocomplete_folio",
				type: 'post',
				dataType: "json",
				data: {
				  search: req.term
				},
				success: function( data ) {
					 res($.map(data, function (value, key) {						 
						return {
							label: value.folio,
							value: key.folio,
							id: value.id,
							id_cliente: value.id_cliente,
							total: value.total
						};
					}));
				}
			  });			
		},
		select: function(event, selectedData){
			$('#divcotizaciones').hide();
			var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/get_cliente", $data = { 'id': selectedData.item.id_cliente});
			total =  selectedData.item.total;
			id_cotizacion = selectedData.item.id;
			$('#nombre').val(respuesta[0].nombre_completo);
			$('#correo').val(respuesta[0].correo);
			$('#telefono').val(respuesta[0].telefono);
			obtener_detalle(id_cotizacion);
		}
	});
	
	$('#cmbCotizaciones').change(function(){
		id_cotizacion = $('#cmbCotizaciones').val();
		
		total = $('#cmbCotizaciones option:selected').attr("name");
		folio = $('#cmbCotizaciones option:selected').text();
		if (id_cotizacion == "") {
			$('#tabla_cotizacion').hide();
			// $('#Contrato').hide();
		}else{
			obtener_detalle(id_cotizacion);		
		}
	});

	// $('#Contrato').on('click',function(){
	// 	console.log($('#cmbCotizaciones').val());
	// });
	function obtener_detalle(id)
	{
		$('#tabla_cotizacion').show();
		// $('#Contrato').show();
		$('#btn-compra').show();
		$('#detalle-titulo').show();
		$('#tblbodyCotizacion').empty();

		var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/get_detalles", $data = { 'id': id});
		
		// se valida que tipo de producto es
		$.each(respuesta, function(e,v){
			if (v.id_proveedor == 2) {
				$proveedor = "Local";
			}else if (v.id_proveedor == 3) {
				$proveedor = "Reposteria";
			}else if (v.id_proveedor == 4) {
				$proveedor = "Decoracion";
			}else if (v.id_proveedor == 5) {
				$proveedor = "Fotografia";
			}else if (v.id_proveedor == 6) {
				$proveedor = "Imprenta";
			}else if (v.id_proveedor == 7) {
				$proveedor = "Banquete";
			}
			// console.log(v.id_proveedor);


			//se rellena la tabla 
			$('#tblbodyCotizacion').append(
				'<tr>'+
					'<td>'+v.id+'</td>'+
					'<td>'+$proveedor+'</td>'+
					'<td>'+v.nombre+'</td>'+
					'<td>'+v.costo+'</td>'+
					'<td>'+v.cantidad+'</td>'+
					'<td>$'+v.subtotal+'</td>'+
				'</tr>'			
			);
		});
		$('#tblbodyCotizacion').append(
			'<tr><td colspan="5" align="right" style="border: 0px">Subtotal</td>'+
			'<td colspan="2">$'+total+'</td></tr>'+
			'<tr><td colspan="5" align="right" style="border: 0px">IVA</td>'+
			'<td colspan="2">$'+(total*.16)+'</td></tr>'+
			'<tr><td colspan="5" align="right" style="border: 0px">Total</td>'+
			'<td colspan="2">$'+(total*1.16).toFixed(2)+'</td></tr>'
		);
	}

	// contrato
	// $('#Contrato').click(function(){
	// 	window.open(base_url+"contrato/"+id_cotizacion);
	// });

	// proceder con la compra
	$('#btn-compra').click(function(){
		// console.log(id_cotizacion);		
		window.location.href = base_url+"ventas/cotizacion-venta/"+folio;

		// ventas/cotizacion-venta/76912019
	});
});

