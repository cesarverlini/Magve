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
                        <div class="row">
                            <?php 
                                foreach($locales->locales as $local){
                            ?>
                            <div class="col-md-4">
                                <div class="card" style="">
                                    <img src="https://picsum.photos/id/1<?php echo $local->id; ?>/200" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $local->nombre; ?></h5>
                                        <p class="card-text text-muted"><?php echo $local->direccion; ?></p>
                                        <a href="<?php echo base_url('servicios/locales/'.$local->id); ?>" class="btn btn-primary">Ver local</a>
                                    </div>
                                </div>
                            </div>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
