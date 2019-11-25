        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">

	$(function () {
		
		// DataTables
		$('#tablaClientes').dataTable( {
			language: {
					"decimal": "",
					"emptyTable": "No hay información",
					"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
					"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
					"infoFiltered": "(Filtrado de _MAX_ total entradas)",
					"infoPostFix": "",
					"thousands": ",",
					"lengthMenu": "Mostrar _MENU_ Entradas",
					"loadingRecords": "Cargando...",
					"processing": "Procesando...",
					"search": "Buscar:",
					"zeroRecords": "Sin resultados encontrados",
					"paginate": {
						"first": "Primero",
						"last": "Ultimo",
						"next": "Siguiente",
						"previous": "Anterior"
					}
			},
				"columnDefs": [ {
				"targets": 'no-sort',
				"orderable": false,
			}],

		} );

	});

	$(".numbersOnly").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});

	$(".lettersOnly").keypress(function (key) {
	if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
		&& (key.charCode < 65 || key.charCode > 90) //letras minusculas
		&& (key.charCode != 45) //retroceso
		&& (key.charCode != 241) //ñ
		&& (key.charCode != 209) //Ñ
		&& (key.charCode != 32) //espacio
		&& (key.charCode != 225) //á
		&& (key.charCode != 233) //é
		&& (key.charCode != 237) //í
		&& (key.charCode != 243) //ó
		&& (key.charCode != 250) //ú
		&& (key.charCode != 193) //Á
		&& (key.charCode != 201) //É
		&& (key.charCode != 205) //Í
		&& (key.charCode != 211) //Ó
		&& (key.charCode != 218) //Ú
		&& (key.charCode != 44) //,
		&& (key.charCode != 46) //.

		)
		return false;
	});
	// FUNCIONES PARA CARGAR AJAX DESDE CUALQUIER ARCHIVO JS o <script> DEL SISTEMA
	var cargar_ajax = {

		run_server_ajax: function(_url, _data = null){
			var json_result = $.ajax({
			url: '<?= base_url(); ?>' + _url,
			dataType: "json",
			method: "post",
			async: false,
			type: 'post',
			data: _data, 
			done: function(response) {
				return response;
			}
			}).responseJSON;
		
			return json_result;
		}
	}

	var cargar_ajax_put = {

		run_server_ajax: function(_url, _data = null){
			var json_result = $.ajax({
			url: 'http://api.integradoraenm.com/index.php/' + _url,
			dataType: "json",
			method: "put",
			async: false,
			type: 'post',
			data: _data, 
			done: function(response) {
				return response;
			}
			}).responseJSON;

			return json_result;
		}
	}
	// url: 'http://localhost/api_locales/index.php/' + _url,

	var cargar_ajax_get = {

		run_server_ajax: function(_url, _data = null){
			var json_result = $.ajax({
			url:'http://api.integradoraenm.com/index.php/' + _url,
			dataType: "json",
			method: "get",
			async: false,
			type: 'post',
			data: _data, 
			done: function(response) {
				return response;
			}
			}).responseJSON;

		return json_result;
	}
	
	
}
	// FUNCION PARA CARGAR MENSAJES SWAL DESDE LOS CONTROLADORES
	<?php if(isset($mensajes_swal)){ echo  $mensajes_swal;}?>
	</script>
<script>	
$(document).ready(function () {
    var base_url= "<?php echo base_url();?>";
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                //http://localhost/magve/mantenimiento/productos
                window.location.href = base_url + resp;
            }
        });
    });
    $(".btn-view-producto").on("click", function(){
        var producto = $(this).val(); 
        //alert(cliente);
        var infoproducto = producto.split("*");
        html = "<p><strong>Codigo:</strong>"+infoproducto[1]+"</p>"
        html += "<p><strong>Nombre:</strong>"+infoproducto[2]+"</p>"
        html += "<p><strong>Descripcion:</strong>"+infoproducto[3]+"</p>"
        html += "<p><strong>Precio:</strong>"+infoproducto[4]+"</p>"
        html += "<p><strong>Stock:</strong>"+infoproducto[5]+"</p>"
        html += "<p><strong>Categoria:</strong>"+infoproducto[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });
  
    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val(); 
        //alert(cliente);
        var infocliente = cliente.split("*");
        html = "<p><strong>Nombres:</strong>"+infocliente[1]+"</p>"
        html += "<p><strong>Apellidos:</strong>"+infocliente[2]+"</p>"
        html += "<p><strong>Telefono:</strong>"+infocliente[3]+"</p>"
        html += "<p><strong>Direccion:</strong>"+infocliente[4]+"</p>"
        html += "<p><strong>RUC:</strong>"+infocliente[5]+"</p>"
        html += "<p><strong>Empresa:</strong>"+infocliente[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });
    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });
	$('#example1').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
	$('.sidebar-menu').tree();
})
</script>
		<?php
		$_curController = $this->router->fetch_class();
		$_curAction = $this->router->fetch_method();
		
		switch ($_curController) {

		    case 'cotizaciones':
			    echo '<script src="'.base_url().'js/cotizaciones.js"></script>';
		    break;

		    // case 'clientes':
			//     echo '<script src="'.base_url().'js/clientes/clientes.js"></script>';
		    // break;

		    // case 'empresas':
			//     echo '<script src="'.base_url().'js/empresas/empresas.js"></script>';
		    // break;

		    // case 'responsables':
			//     echo '<script src="'.base_url().'js/responsables/responsables.js"></script>';
		    // break;

		    // case 'foda':
			//     switch ($_curAction) {
			//     	case 'index':
		    //         	echo '<script src="'.base_url().'js/foda/foda.js"></script>';
		    //         break;
		    //         case 'add_foda':
		    //         	echo '<script src="'.base_url().'js/foda/foda.js"></script>';
		    //         break;

		    //         case 'editar_foda':
		    //             echo '<script src="'.base_url().'js/foda/editar_foda.js"></script>';
		    //         break;
		    //     }
			// break;


			// case 'stakeholders':
			//     echo '<script src="'.base_url().'js/stakeholders/stakeholders.js"></script>';
		    // break;

		    // case 'politicas_objetivos':
			//     echo '<script src="'.base_url().'js/politicas_objetivos/politicas_objetivos.js"></script>';
		    // break;	

			// case 'procesos':
			//     echo '<script src="'.base_url().'js/procesos/procesos.js"></script>';
		    // break;

		    // case 'riesgos':
			//     echo '<script src="'.base_url().'js/riesgos/riesgos.js"></script>';
		    // break;

		    // case 'personas':
			//     echo '<script src="'.base_url().'js/personas/personas.js"></script>';
		    break;
		    
	    }
		?>
</body>
</html>
