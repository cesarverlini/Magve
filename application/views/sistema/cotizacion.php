<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Completar el registro para la cotización - Datos del cliente</h3>
          </div>

          <!-- /.card-header -->

          <div class="card-body">
			  <form action="<?php echo base_url('confirmacion-cotizacion');?>" method="post" class="col-md-12" id="formcot">
			  <h3><span class="text-success"></span> Sí el cliente esta registrado buscar cliente por...</h3>
			  <div class="row mb-3">
					<div class="col-md-9">
						<label for="correo">Correo Electronico</label>
						<input class="form-control" type="text" id="buscarcorreo" name="buscarcorreo" >
						<input hidden class="form-control" type="text" id="id_cliente" name="id_cliente" >
						<small class="text-danger">
							<?php 
							
							if(null != $this->session->flashdata('bad_email')){
								echo $this->session->flashdata('bad_email');
							}

							?>
						</small>
					</div>
				</div>
			  <hr>
			  <h3 class="my-3">Información del cliente</h3>


				<div class="row mb-4">	
					<div class="col-md-12">
						<label for="nombre">Nombre completo</label>
						<input class="form-control" type="text" id="nombre" name="nombre" >
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-9">
						<label for="correo">Correo Electronico</label>
						<input class="form-control" type="text" id="correo" name="correo" >
						<small class="text-danger">
							<?php 
							
							if(null != $this->session->flashdata('bad_email')){
								echo $this->session->flashdata('bad_email');
							}

							?>
						</small>
					</div>
					<div class="col-md-3 mb-4">
						<label for="telefono">Teléfono</label>
						<input class="form-control" type="text" id="telefono" name="telefono" >
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<button type="button" id="confirmacion" class="btn btn-primary">Continuar con cotización</button>
						<button hidden type="submit" id="submit" class="btn btn-primary">Continuar con cotización</button>
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
