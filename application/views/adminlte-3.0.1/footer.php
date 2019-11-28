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
        <!-- custom JS file load -->
        <?php
            $ruta = ($this->router->fetch_method() == 'vista') ? $this->uri->segment(2) : $this->router->fetch_method();
            $JSFile = base_url().'assets/js/'.$this->router->fetch_class().'/'.$ruta.'.js';
            echo '<script src="'.$JSFile.'"></script>';
        ?>
    </body>
</html>
