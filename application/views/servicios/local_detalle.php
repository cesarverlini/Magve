<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detalles</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
						<strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
                        <p class="text-muted" id="iddireccion">
                            <?= $info_local->locales[0]->direccion; ?>
                        </p>
						
                        <hr>
                        <strong><i class="fas fa-money-bill-wave-alt mr-1"></i> Costo</strong>
                        <p class="text-muted" id="idcosto">
                            La renta de este local es de $<?= $info_local->locales[0]->costo; ?>.00MX
                        </p>
                        <hr>
						
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Capacidad</strong>
                        <p class="text-muted" id="idcapacidad">
                            Este local tiene capacidad hasta para <?= $info_local->locales[0]->capacidad;?> personas.
                        </p>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--- Termina PANEL LATERAL -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Información del local</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- empieza cuerpo -->
                        <div class="d-flex justify-content-between align-items-center">
							<h3><?= $info_local->locales[0]->nombre; ?></h3>
							<form action="<?php echo base_url('carrito/comprar/'.$id_local); ?>" method="post">
								<input type="text" id="servicio" name="servicio" value="0">							
								<input type="text" id="nombre" name="nombre" value="<?php echo $info_local->locales[0]->nombre;?>">						
								<input type="text" id="costo" name="costo" value="<?php echo $info_local->locales[0]->costo;?>">	
								<input type="text" id="descripcion" name="descripcion" value="">						
								<button type="submit" class="btn btn-xs bg-gradient-primary"><i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito</button>
							</form>
								
                            <!-- <a href="<?php echo base_url('carrito/comprar/'.$id_local); ?>" class="btn btn-xs bg-gradient-primary">Agregar al carrito</a> -->
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://picsum.photos/300" alt="">
                            </div>
                            <div class="col-md-8">
                                <p class="pt-0">
                                <h4 class="p-0 m-0">Descripción</h4><br>
                                Lorem ipsum dolor sit amet consectetur adipisicing 
                                elit. Officiis qui autem neque facere! Nemo deserunt 
                                accusantium quam, commodi ab nulla fugiat culpa repudiandae 
                                praesentium exercitationem beatae, eligendi corporis odio recusandae?
                                </p>

                                <hr>

                                <p>
                                <h4 class="p-0 m-0">Opiniones</h4><br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Officiis qui autem neque facere! Nemo deserunt accusantium quam, 
                                commodi ab nulla fugiat culpa repudiandae praesentium exercitationem 
                                beatae, eligendi corporis odio recusandae?
                                </p>
                                <!--<a href="<?php echo base_url(''); ?>" class="btn btn-block btn-lg bg-gradient-primary">Ver galería</a>-->
                            </div>
                        </div>
                        <hr>
                        <h4 class="p-0 m-0">Galería de fotos</h4><br>
                        <div class="row">
                            <div class="col-md-2"><img src="https://via.placeholder.com/150C/" alt=""></div>
                            <div class="col-md-2"><img src="https://via.placeholder.com/150C/" alt=""></div>
                            <div class="col-md-2"><img src="https://via.placeholder.com/150C/" alt=""></div>
                            <div class="col-md-2"><img src="https://via.placeholder.com/150C/" alt=""></div>
                            <div class="col-md-2"><img src="https://via.placeholder.com/150C/" alt=""></div>
                            <div class="col-md-2"><img src="https://via.placeholder.com/150C/" alt=""></div>     
                            <div class="col-md-2 mt-2"><img src="https://via.placeholder.com/150C/" alt=""></div>                   
                            <div class="col-md-2 mt-2"><img src="https://via.placeholder.com/150C/" alt=""></div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- fin del cuerpo del local-->
        </div>
    </div>
</section>
