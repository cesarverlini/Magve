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
			  <form action="<?php echo base_url('confirmacion');?>" method="post" class="col-md-12">
				<div class="row">	
					<div class="col-md-4">
						<label for="nombre">Nombre Completo</label>
						<input class="form-control" type="text" id="nombre" name="nombre">
					</div>
					<!-- <div class="col-md-4">
						<label for="apellido_p">Apellido Paterno</label>
						<input class="form-control" type="text" id="apellido_p" name="apellido_p">
					</div>
					<div class="col-md-4">
						<label for="apellido_m">Apellido Materno</label>
						<input class="form-control" type="text" id="apellido_m" name="apellido_m">
					</div> -->
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="correo">Correo Electronico</label>
						<input class="form-control" type="text" id="correo" name="correo">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="telefono">Numero de Telefono</label>
						<input class="form-control" type="text" id="telefono" name="telefono">
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
