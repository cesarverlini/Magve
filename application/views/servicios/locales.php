<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filtro de locales</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
						<strong><i class="far fa-calendar-alt"></i> Fecha</strong>
						<input class="form-control fecha_renta" type="date" id="filtroLocal_fecha" min="0" placeholder="Fecha que desea rentar el local">
						<hr>
                        <strong><i class="fas fa-money-bill-wave-alt mr-1"></i>Costo</strong>
                        <input id="rango_costo" type="text" name="rango_costos" value="10000;200000">
                        <hr>
						
                        <strong><i class="fas fa-male mr-1"></i>Capacidad</strong>
                        <input id="rango_capacidad" type="text" name="rango_locales" value="10000;100000">
                    </div>
                </div>
            </div>
            <!-- fin filtro -->
            <div class="col-md-9">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Listado de locales</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" id="Locales_disponibles">

                            <!-- <div class="col-md-4">
                                <div class="card" style="">
                                    <img src="<?php echo base_url('assets/img/servicios/locales.jpg');?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Nombre del local</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="<?php echo base_url('servicios/locales/1'); ?>" class="btn btn-primary">Ver local</a>
                                    </div>
                                </div>
							</div> -->
							

                            <!-- <div class="col-md-4"> 
                                <div class="card" style="">
                                    <img src="<?php echo base_url('assets/img/servicios/locales.jpg');?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="<?php echo base_url('servicios/locales/2'); ?>" class="btn btn-primary">Ver local</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card" style="">
                                    <img src="<?php echo base_url('assets/img/servicios/locales.jpg');?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="<?php echo base_url('servicios/locales/3'); ?>" class="btn btn-primary">Ver local</a>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
