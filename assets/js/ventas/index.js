$(document).ready(function(){
	$('#tabla_cotizacion').hide();
	// $('#Contrato').hide();
	var base_url = $('#base_url').val();
	$('#correo').autocomplete({	
		source: function(req,res){	
			$('#tabla_cotizacion').hide();
			$('#Contrato').hide();
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
						return {
							label: value.correo,
							value: key.correo,
							nombre: value.nombre_completo,
							telefono: value.telefono,
							id: value.id
						};
					}));
				}
			  });			
		},
		select: function(event, selectedData){
			$('#nombre').val(selectedData.item.nombre);
			$('#correo').val(selectedData.item.label);
			$('#telefono').val(selectedData.item.telefono);
			var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/get_cotizaciones", $data = { 'id': selectedData.item.id});
			$('#cmbCotizaciones').empty();
			$.each(respuesta, function(e,v){
				$('#cmbCotizaciones').append(
					'<option value="">Seleccionar...</option>' +
					'<option value="'+v.id+'">'+v.fecha_registro+'</option>' 
				);
			});
		}
	});
	$('#cmbCotizaciones').change(function(){
		id = $('#cmbCotizaciones').val();
		if (id == "") {
			$('#tabla_cotizacion').hide();
			$('#Contrato').hide();
		}else{
			$('#tabla_cotizacion').show();
			$('#Contrato').show();
			$('#tblbodyCotizacion').empty();
			var respuesta = cargar_ajax.run_server_ajax("sistema/ventas/get_detalles", $data = { 'id': id});
			
			$.each(respuesta, function(e,v){
				if (v.id_proveedor = 2) {
					$proveedor = "Local";
				}else if (v.id_proveedor = 3) {
					$proveedor = "Reposteria";
				}else if (v.id_proveedor = 4) {
					$proveedor = "Musica";
				}else if (v.id_proveedor = 5) {
					$proveedor = "Fotografia";
				}else if (v.id_proveedor = 6) {
					$proveedor = "Imprenta";
				}else if (v.id_proveedor = 7) {
					$proveedor = "Banquete";
				}
				$('#tblbodyCotizacion').append(
					'<tr>'+
						'<td>'+v.id+'</td>'+
						'<td>'+$proveedor+'</td>'+
						'<td>'+v.nombre+'</td>'+
						'<td>'+v.costo+'</td>'+
						'<td>'+v.cantidad+'</td>'+
						'<td>'+v.subtotal+'</td>'+
					'</tr>'
				);
			});
		}
	});

	$('#Contrato').on('click',function(){
		console.log($('#cmbCotizaciones').val());
	});
	
});
$(function(){
})

