<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">FOTOSFiltrar resultados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
						<strong class="d-block"><i class="far fa-calendar-alt"></i> Fecha</strong>
						<input class="form-control fecha_renta" type="date" id="filtroLocal_fecha" min="0" placeholder="Fecha que desea rentar el local">
						<hr>
                        <strong class="d-block"><i class="fas fa-money-bill-wave-alt mr-1"></i>Costo</strong>
                        <input id="rango_costo" type="text" name="rango_costos" value="10000;200000">
                        <hr>
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
                            <?php if($paquetes == null){ ?>
                            <div class="card d-flex flex-direction-column">
                                <div class="card-body">
                                    <h4>Algo salió mal <i class="fas fa-bug ml-2"></i></h4>
                                    <p>No se ha podido conectar con el proveedo de <span class="text-info"><?= $title; ?></span>.</p>
                                    <p>La conexión no pudo ser establecida o no existe un canal para obtener la información. <a href="<?php echo base_url('servicios'); ?>">Regresar a servicios.</a></p>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <!-- si sí hay paquetes se muestran aqui -->
                                <?php foreach($paquetes as $pack){ ?>
                                <div class="card d-flex flex-direction-column">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="<?php echo base_url('assets/img/servicios/placeholder.png');?>" width="150" alt="">
                                        </div>
                                        <div class="col-md-8 offset-md-1 card-body">
                                            <h5><?php echo $pack->nombre; ?></h5>
                                            <p><?php echo $pack->detalles; ?></p>
                                            <div class="d-block">
                                                <!-- formulario para hacer post en carrito -->
                                                <form action="<?php echo base_url('carrito/comprar/'.$pack->idpaquete); ?>" method="POST">
                                                    <input type="hidden" name="servicio" value="2">
                                                    <input type="hidden" name="nombre" value="<?php echo $pack->nombre; ?>">
                                                    <input type="hidden" name="costo" value="<?php echo $pack->costo; ?>">
                                                    <button type="submit" class="btn btn-outline-primary btn-sm">Agregar al carrito</button>
                                                </form>
                                                <!-- termina formulario para comprar -->
                                            </div>
                                        </div>
                                        <div class="col-md-2 card-body" style="display:flex;margin:auto;">
                                        <h4><span class="text-success">$</span><?php echo $pack->costo; ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
