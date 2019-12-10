$(document).ready(function(){
	base_url = $('#base_url').val();

	$('#confirmacion').click(function(){
		var data = {
			'id': $('#id_cliente').val(),
			'nombre' : $('#nombre').val(),
			'correo' : $('#correo').val(),
			'telefono' : $('#telefono').val(),
		}
		var respuesta = cargar_ajax.run_server_ajax("sistema/Cotizaciones/existe_correo", data);
		// console.log(respuesta);
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
	$('#buscarcorreo').autocomplete({	
		source: function(req,res){	
			$('#nombre').attr('readonly', false); 
			$('#correo').attr('readonly', false); 
			$('#telefono').attr('readonly', false); 
			$('#nombre,#correo,#telefono,#id_cliente').val("");			
			$.ajax({
				url: base_url+"sistema/cotizaciones/autocomplete",
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
			$('#nombre,#correo,#telefono').attr('readonly', true); 
			$('#nombre').val(selectedData.item.nombre);
			$('#id_cliente').val(selectedData.item.id);
			$('#correo').val(selectedData.item.label);
			$('#telefono').val(selectedData.item.telefono);

		}
	});
	
});
