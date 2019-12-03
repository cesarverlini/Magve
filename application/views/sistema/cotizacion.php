<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-10 offset-md-1">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Completar el registro para la cotización - Datos del cliente</h3>
          </div>

          <!-- /.card-header -->

          <div class="card-body">
<<<<<<< HEAD
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
=======
			  <form action="<?php echo base_url('confirmacion-cotizacion');?>" method="post" class="col-md-12">

				<div class="row mb-4">	
					<div class="col-md-12">
						<label for="nombre">Nombre completo</label>
						<input class="form-control" type="text" id="nombre" name="nombre" required="true">
					</div>
>>>>>>> 3b4cf08532b97b5ed6efc763d22c5606f93d67f3
				</div>

				<div class="row">
<<<<<<< HEAD
					<div class="col-md-4">
=======
					<div class="col-md-9">
>>>>>>> 3b4cf08532b97b5ed6efc763d22c5606f93d67f3
						<label for="correo">Correo Electronico</label>
						<input class="form-control" type="text" id="correo" name="correo" required="true">
					</div>
<<<<<<< HEAD
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="telefono">Numero de Telefono</label>
						<input class="form-control" type="text" id="telefono" name="telefono">
=======
					<div class="col-md-3 mb-4">
						<label for="telefono">Teléfono</label>
						<input class="form-control" type="text" id="telefono" name="telefono" required="true">
>>>>>>> 3b4cf08532b97b5ed6efc763d22c5606f93d67f3
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<button type="submit" class="btn btn-primary">Continuar con cotización</button>
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
