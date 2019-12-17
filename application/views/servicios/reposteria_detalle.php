<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Información del paquete</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>                  
							<tr>
								<th style="width: 50px">ID</th>                            
								<th>Nombre</th>
								<th>Costo</th>                         
								</tr>
							</thead>
							<tbody>
							<?php foreach ($info_paquete as $item) { ?>
								<tr>
									<td><?php echo $item->idProducto; ?></td>
									<td><?php echo $item->NombreProducto; ?></td>
									<td><?php echo $item->Costo; ?></td>									
								</tr>
							<?php } ?>								
							</tbody>
						</table>
					</div>
					
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- empieza cuerpo -->
                        <div class="d-flex justify-content-between align-items-center">
							<!-- <h3><?= $info_local->locales[0]->nombre; ?></h3> -->
							<form action="<?php echo base_url('carrito/comprar/'); ?>" method="post">
								<!-- <input type="text" id="servicio" name="servicio" value="Local">							
								<input type="text" id="nombre" name="nombre" value="<?php echo $info_paquete->locales[0]->nombre;?>">							
								<input type="text" id="direccion" name="direccion" value="<?php echo $info_paquete->locales[0]->direccion;?>">						
								<input type="text" id="costo" name="costo" value="<?php echo $info_paquete->locales[0]->costo;?>">						
								<input type="text" id="capacidad" name="capacidad" value="">
								<input type="text" id="descripcion" name="descripcion" value="">	
								<input type="text" id="direccion" name="direccion" value=""> -->
								<button type="submit" class="btn btn-xs bg-gradient-primary"><i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito</button>
							</form>
								
                            <!-- <a href="<?php echo base_url('carrito/comprar/'.$id_local); ?>" class="btn btn-xs bg-gradient-primary">Agregar al carrito</a> -->
                        </div>                      
                    </div>
                    <hr>
                </div>
            </div>
            <!-- fin del cuerpo del local-->
        </div>
    </div>
</section>
