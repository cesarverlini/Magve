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
                        <p class="text-muted" id="direccion">
                            <?= $info_local->locales[0]->direccion; ?>
                        </p>
						
                        <hr>
                        <strong><i class="fas fa-money-bill-wave-alt mr-1"></i> Costo</strong>
                        <p class="text-muted" id="costo">
                            La renta de este local es de $<?= $info_local->locales[0]->costo; ?>.00MX
                        </p>
                        <hr>
						
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Capacidad</strong>
                        <p class="text-muted" id="capacidad">
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
                            <a href="<?php echo base_url('carrito/comprar/'.$id_local); ?>" class="btn btn-xs bg-gradient-primary">Agregar al carrito</a>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://picsum.photos/300" alt="">
                            </div>
                            <div class="col-md-8">
                                <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis qui autem neque facere! Nemo deserunt accusantium quam, commodi ab nulla fugiat culpa repudiandae praesentium exercitationem beatae, eligendi corporis odio recusandae?
                                </p>

                                <hr>

                                <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis qui autem neque facere! Nemo deserunt accusantium quam, commodi ab nulla fugiat culpa repudiandae praesentium exercitationem beatae, eligendi corporis odio recusandae?
                                </p>
                                <hr>
                                <a href="<?php echo base_url(''); ?>" class="btn btn-block btn-lg bg-gradient-primary">Ver galería</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- fin del cuerpo del local-->
        </div>
    </div>
</section>