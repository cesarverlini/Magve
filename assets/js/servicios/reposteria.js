$(function () {
	$('.ocultar').hide();
	// $('.boton_detalle').click();
})
	$('.boton_detalle').click(function(){
		id = $(this).val();
		console.log($(this).val());
		$.ajax({
			url: "http://localhost:8080/apiReposteria/index.php/Paquetes/paquete_reposteria/"+id,
			type: 'get',
			dataType: "json",			
			success: function( data ) {
				$.each( data, function( key, value ) {
					// console.log(value);
					$('#detalle_reposteria'+id+'').append(
						'<tr>'+						
							'<td>'+value.NombreProducto+'</td>'+
							'<td>'+value.Costo+'</td>									'+
						'</tr>'
						);
					});	
				$('#tabla_detalle'+id).show();
			}
		  });		
	});
