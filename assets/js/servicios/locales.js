$(function () {
	// range picker locales costo
    $('#rango_costo').ionRangeSlider({
      min     : 10000,
      max     : 200000,
      from    : 10000,
      type    : 'double',
      step    : 1000,
      postfix : '$',
      prettify: false,
      hasGrid : true
    })

	// range picker locales capacidad
    $('#rango_capacidad').ionRangeSlider({
        min     : 10,
        max     : 1000,
        from    : 0,
        type    : 'double',
        step    : 10,
        postfix : 'Personas',
        prettify: false,
        hasGrid : true
	})
	  

	/*
	* Cargando locales y filtrado de locales
	*/
	//var base_url = 'http://localhost/magve/';
	// =======================================
	 const url = document.location.host;
	 const base_url = 'http://'+url+'/';
	// =======================================
	var locales = [];
	var seleccionado = [];

	// JS Date
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear() + '-' +
		(month<10 ? '0' : '') + month + '-' +
		(day<10 ? '0' : '') + day;

	$(".fecha_renta").attr("min", output);

	//=======================================================================================================================================
	//																					OBTENER LISTADO DE LOCALES SIN NINGUN FILTRO
	//=======================================================================================================================================
	locales = cargar_ajax_get.run_server_ajax('Locales/local/');
	if (locales.locales) 
	{
		$.each( locales.locales, function( key, value ) {
			$('#Locales_disponibles').append(
				'<div class="col-md-4">'+
					'<div class="card" style="">'+
							'<img src="https://picsum.photos/200" class="card-img-top" alt="...">'+
							'<div class="card-body">'+
									'<h5 class="card-title">'+value.nombre+'</h5>'+
									'<p class="card-text text-muted">'+value.direccion+'</p>'+
									'<a href="'+base_url+'servicios/locales/'+value.id+'" class="btn btn-primary mandar_info">Ver local</a>'+
							'</div>'+
					'</div>'+
				'</div>'
			);
		});	
	}
	
	//=======================================================================================================================================
	//																					OBTENER LOCALES MEDIANTE FECHA
	//=======================================================================================================================================
	$('#filtroLocal_fecha').change(function()
	{			
		var fecha_seleccionada = $(this).val();
		locales = cargar_ajax_get.run_server_ajax('Locales/disponibilidad/'+fecha_seleccionada);
		$('#Locales_disponibles').empty();	
		$.each( locales, function( key, value ) {		
			prueba = [value];
			$('#Locales_disponibles').append(
				'<div class="col-md-4">'+
					'<div class="card" style="">'+
							'<img src="'+base_url+'assets/img/servicios/locales.jpg" class="card-img-top" alt="...">'+
							'<div class="card-body">'+
									'<h5 class="card-title">'+value.nombre+'</h5>'+
									'<p class="card-text">'+value.direccion+'</p>'+
									'<a href="'+base_url+'servicios/locales/'+value.id+'" class="btn btn-primary mandar_info">Ver local</a>'+
							'</div>'+
					'</div>'+
				'</div>'
			);
		});	
	// $(".mandar_info").click(function( event ) {
	// 	event.preventDefault();					
	// });	
	});
})
	