$(document).ready(function(){
	var base_url = $('#base_url').val();
	$('#correo').autocomplete({
		source: function(req,res){
			var data = {
				'correo': req.term
			}			
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
							nombre: value.nombre,
							apellido_p: value.apellido_p,
							apellido_m: value.apellido_m,
							telefono: value.telefono,
							id: value.id
						};
					}));
				}
			  });			
		},
		select: function(event, selectedData){
			console.log(selectedData.item);
			// $('#idcliente').val(selectedData.item.id);
			$('#nombre').val(selectedData.item.nombre);
			$('#apellido_p').val(selectedData.item.apellido_p);
			$('#apellido_m').val(selectedData.item.apellido_m);
			$('#correo').val(selectedData.item.label);
			$('#telefono').val(selectedData.item.telefono);

		}
	});
});
$(function(){
	
})

