<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Favor de introducir los datos del cliente</h3>
          </div>

          <!-- /.card-header -->

          <div class="card-body">
			  <form action="<?php echo base_url('');?>" method="post" class="col-md-12">
				<div class="row">	
					<div class="col-md-4">
						<label for="nombre">Nombre</label>
						<br/>
						<label name="nombre"><?php echo $nombre?></label>
					</div>
					<div class="col-md-4">
						<label for="apellido_p">Apellido Paterno</label>
						<br>
						<label name="apellido_p"><?php echo $apellido_p?></label>
					</div>
					<div class="col-md-4">
						<label for="apellido_m">Apellido Materno</label>
						<br>
						<label name="apellido_m"><?php echo $apellido_m?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="correo">Correo Electronico</label>
						<br>
						<label name="correo"><?php echo $correo?></label>
					</div>
					<div class="col-md-6">
						<label for="telefono">Numero de Telefono</label>
						<br>
						<label name="telefono"><?php echo $telefono?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11"></div>
					<div class="col-md-1">
						<br>
						<button type="submit" class="btn btn-primary">Siguiente</button>
					</div>	
				</div>
			</form>					
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
</section>
