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
						
						<strong><i class="fas fa-map-marker-alt mr-1" ></i> Direccion</strong>
                        <p class="text-muted" id="direccion">Malibu, California</p>
						
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> Costo</strong>
                        <p class="text-muted" id="costo">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>
                        <hr>
						
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Capacidad</strong>
                        <p class="text-muted" id="capacidad">
                        <!-- <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span> -->
                        </p>
                        
                        <!-- <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--- Termina PANEL LATERAL -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nombre del local</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h3 id="nombrelocal">Este local tiene el id <?= $id_local; ?></h3>
                        <a href="<?php echo base_url('carrito/comprar/'.$id_local); ?>" class="btn btn-xs bg-gradient-primary">Agregar al carrito</a>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- fin del cuerpo del local-->
        </div>
    </div>
</section>
