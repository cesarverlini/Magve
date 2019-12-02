        </div>
        <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.1
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/js/demo.js"></script>
		<script src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <!-- custom JS file load -->
        <?php
            $ruta = ($this->router->fetch_method() == 'vista') ? $this->uri->segment(2) : $this->router->fetch_method();
            $JSFile = base_url().'assets/js/'.$this->router->fetch_class().'/'.$ruta.'.js';
            echo '<script src="'.$JSFile.'"></script>';
		?>
		<script type="text/javascript">
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
			// url: 'http://api.integradoraenm.com/index.php/' + _url,

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
    </body>
</html>
