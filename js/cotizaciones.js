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

//===================================================================================================================================================== 
// 																	BANQUETE
//=====================================================================================================================================================
$(document).ready(function () {
	var Bebidas = [];
	var base_url = "http://localhost/magve/";
	$('#btnAddBebida').on('click', function(e){
		var nombre = $('#cmbBebida option:selected').text(); // no se si agregar el nombre o el valor del input
		var cantidad = $('#txtPrecioBebida').val();
		var precio = $('#txtCantidadBebida').val();
		var total = parseInt(cantidad) * parseInt(precio);

		Bebidas.push({"nombre":nombre,"cantidad":cantidad,"precio":precio,"total":total});
		$('#tablabebidas').empty();
		$.each(Bebidas, function(e,v){
			$('#tablabebidas').append(
				'<tr>'+
				'<td>'+v.nombre+'</td>'+
				'<td>'+v.cantidad+'</td>'+
				'<td>'+v.precio+'</td>'+
				'<td>'+v.total+'</td>'+
				'</tr>'
			);
		});
				
	});
	
	var Comidas = [];
	$('#btnAddComida').on('click', function(e){
		var nombre = $('#cmbComida option:selected').text(); // no se si agregar el nombre o el valor del input
		var cantidad = $('#txtPrecioComida').val();
		var precio = $('#txtCantidadComida').val();
		var total = parseInt(cantidad) * parseInt(precio);

		Comidas.push({"nombre":nombre,"cantidad":cantidad,"precio":precio,"total":total});
		$('#tablaComida').empty();
		$.each(Comidas, function(e,v){
			$('#tablaComida').append(
				'<tr>'+
				'<td>'+v.nombre+'</td>'+
				'<td>'+v.cantidad+'</td>'+
				'<td>'+v.precio+'</td>'+
				'<td>'+v.total+'</td>'+
				'</tr>'
			);
		});
				
	});
	
	var Postres = [];
	$('#btnAddPostre').on('click', function(e){
		var nombre = $('#cmbPostre option:selected').text(); // no se si agregar el nombre o el valor del input
		var cantidad = $('#txtPrecioPostre').val();
		var precio = $('#txtCantidadPostre').val();
		var total = parseInt(cantidad) * parseInt(precio);

		Postres.push({"nombre":nombre,"cantidad":cantidad,"precio":precio,"total":total});
		$('#tablapostres').empty();
		$.each(Postres, function(e,v){
			$('#tablapostres').append(
				'<tr>'+
				'<td>'+v.nombre+'</td>'+
				'<td>'+v.cantidad+'</td>'+
				'<td>'+v.precio+'</td>'+
				'<td>'+v.total+'</td>'+
				'</tr>'
			);
		});
				
	});

	$('#btnprueba').on('click',function(e){
		
		// $.post(base_url+'cotizaciones/crear_cotizacion');
		cargar_ajax.run_server_ajax('cotizaciones/crear_cotizacion',Bebidas);
		// $.ajax({
		// 	type: 'POST',
		// 	url: base_url+'cotizaciones/crear_cotizacion', //aqui quiero mandar los datos a la bd
		// 	data: Bebidas,
		// 	success: function(e) {
		// 		alert(); // Aquí si puedes, porque estás dentro de una función
		// 	},
		// 	error: function(e){
		// 		alert(e);
		// 	}
		// });
	});
});


