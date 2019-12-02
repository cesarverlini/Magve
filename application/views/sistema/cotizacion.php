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
			  <form action="<?php echo base_url('confirmacion-cotizacion');?>" method="post" class="col-md-12">

				<div class="row mb-4">	
					<div class="col-md-12">
						<label for="nombre">Nombre completo</label>
						<input class="form-control" type="text" id="nombre" name="nombre" required="true">
					</div>
				</div>

				<div class="row">
					<div class="col-md-9">
						<label for="correo">Correo Electronico</label>
						<input class="form-control" type="text" id="correo" name="correo" required="true">
					</div>
					<div class="col-md-3 mb-4">
						<label for="telefono">Teléfono</label>
						<input class="form-control" type="text" id="telefono" name="telefono" required="true">
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
