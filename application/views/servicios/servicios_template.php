<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filtrar resultados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
						<strong class="d-block"><i class="far fa-calendar-alt"></i> Fecha</strong>
						<input class="form-control fecha_renta" type="date" id="filtroLocal_fecha" min="0" placeholder="Fecha que desea rentar el local">
						<hr>
                        <strong class="d-block"><i class="fas fa-money-bill-wave-alt mr-1"></i>Costo</strong>
                        <input id="rango_costo" type="text" name="rango_costos" value="10000;200000">
                        <hr>
						
                        <strong class="d-block"><i class="fas fa-male mr-1"></i>Capacidad</strong>
                        <input id="rango_capacidad" type="text" name="rango_locales" value="10000;100000">
                    </div>
                </div>
            </div>
            <!-- fin filtro -->
            <div class="col-md-9">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Paquetes disponibles en <?= $title ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="card d-flex flex-direction-column">
                            <div class="card-body">
                            <h4>Algo salió mal <i class="fas fa-bug ml-2"></i></h4>
                                <p>No se ha podido conectar con el proveedo de <span class="text-info"><?= $title; ?></span>.</p>
                                <p>La conexión no pudo ser establecida o no existe un canal para obtener la información. <a href="<?php echo base_url('servicios'); ?>">Regresar a servicios.</a></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
