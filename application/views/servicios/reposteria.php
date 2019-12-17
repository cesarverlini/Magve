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
                                    <!-- <div class="">
                                        <h4><?php echo $pack->nombre; ?></h4>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="<?php echo base_url('assets/img/servicios/placeholder.png');?>" width="150" alt="">
                                        </div>
                                        <div class="col-md-8 offset-md-1 card-body">
																					<h5><?php echo $pack->NombrePaquete; ?></h5>
																					<b><h6>Detalle del paquete</h6></b>
																					<h6><?php echo $pack->Contenido; ?></h6>
																					<!-- <input id="id_paquete<?php echo $pack->id;?>" class="ocultar" value="<?php echo $pack->id;?>"> -->
																					<!-- <table id="tabla_detalle<?php echo $pack->id;?>" class="table table-bordered ocultar">
																						<thead>                  
																						<tr>													
																							<th>Producto</th>
																							<th>Costo</th>                         
																							</tr>
																						</thead>
																						<tbody id="detalle_reposteria<?php echo $pack->id;?>" class="detalle_reposteria<?php echo $pack->id;?>">
																									
																						</tbody>
																					</table> -->
																					<!-- <p><?php echo $pack->Total; ?></p> -->
																					
																					<div class="d-block">
																						<form action="<?php echo base_url('carrito/comprar/'.$pack->id); ?>" method="post">	
																							<input type="text" id="servicio" name="servicio" value="1" class="ocultar">							
																							<input type="text" id="nombre" name="nombre" value="<?php echo $pack->NombrePaquete;?>" class="ocultar">							
																							<input type="text" id="descripcion" name="descripcion" value="<?php echo $pack->Contenido; ?>" class="ocultar">
																							<input type="text" id="costo" name="costo" value="<?php echo $pack->Total;?>" class="ocultar">	

																							<!-- <button type="button" id="detalles_paquete<?php echo $pack->id;?>" value="<?php echo $pack->id;?>" class="boton_detalle btn btn-xs bg-gradient-info">Ver detalles</button> -->																							
																							<button type="submit"class="btn btn-xs bg-gradient-primary">Agregar producto</button>										
																						</form>											
																					</div>
																					
                                        </div>
                                        <div class="col-md-2 card-body" style="display:flex;margin:auto;">
                                        <h4><span class="text-success">$</span><?php echo $pack->Total; ?></h4>
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
