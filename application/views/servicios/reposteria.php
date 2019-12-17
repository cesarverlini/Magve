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
											<!-- <input id="id_paquete<?php echo $pack->idPaquete;?>" class="ocultar" value="<?php echo $pack->idPaquete;?>"> -->
											<!-- <h6>Detalle del paquete</h6> -->
											<table id="tabla_detalle<?php echo $pack->idPaquete;?>" class="table table-bordered ocultar">
												<thead>                  
												<tr>													
													<th>Producto</th>
													<th>Costo</th>                         
													</tr>
												</thead>
												<tbody id="detalle_reposteria<?php echo $pack->idPaquete;?>" class="detalle_reposteria<?php echo $pack->idPaquete;?>">
															
												</tbody>
											</table>
											<!-- <p><?php echo $pack->Total; ?></p> -->
											
                                            <div class="d-block">
											<form action="<?php echo base_url('carrito/comprar/'.$pack->idPaquete); ?>" method="post">	
												<input type="text" id="servicio" name="servicio" value="Reposteria" class="ocultar">							
												<input type="text" id="nombre" name="nombre" value="<?php echo $pack->NombrePaquete;?>" class="ocultar">							
												<input type="text" id="descripcion" name="descripcion" value="" class="ocultar">
												<input type="text" id="costo" name="costo" value="<?php echo $pack->Total;?>" class="ocultar">						
											
												<!-- <a href="<?php echo base_url('servicios/paquete/'.$pack->idPaquete); ?>">Ver detalles</a> -->
												<button type="button" id="detalles_paquete<?php echo $pack->idPaquete;?>" value="<?php echo $pack->idPaquete;?>" class="boton_detalle btn btn-xs bg-gradient-info">Ver detalles</button>
												<!-- &nbsp;|&nbsp; -->
												<button type="submit"class="btn btn-xs bg-gradient-primary">Agregar producto</button>										
											</form>											
											</div>
												<!-- <input type="text" id="servicio" name="servicio" value="Decoraciones" class="esconder">							
												<input type="text" id="nombre" name="nombre" value="<?php echo $pack->Servicio_Contratado;?>" class="esconder">							
												<input type="text" id="descripcion" name="descripcion" value="<?php echo $pack->Descripcion;?>" class="esconder">						
												<input type="text" id="costo" name="costo" value="<?php echo $pack->Monto;?>" class="esconder">						
												<button type="submit" class="btn btn-xs bg-gradient-primary"><i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito</button> -->
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
	
	<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
</section>
