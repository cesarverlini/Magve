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
		 		<div class="row">
					<div class="col-md-6">
						<label for="correo">Seleccione Tipo de pago</label>
						<select id="cmbTipo_pago" class="form-control">
							<option value="">Seleccionar...</option>
							<option value="1">Efectivo</option>
							<option value="2">Tarjeta</option>
						</select>
						<!-- <input class="form-control" type="text" id="correo" name="correo" value=""> -->					
					</div>
				</div>	
			  <form action="<?php echo base_url('transferencia');?>" method="post" class="col-md-12" id="form_transferencia">				
				<div class="row">
					<div class="col-md-6">
						<label for="correo">Numero Tarjeta</label>
						<input class="form-control" type="text" id="num_tarjeta" name="num_tarjeta" value="">					
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="folio">Nip</label>
						<input class="form-control" type="password" id="nip" name="nip" value="">			
					</div>
				</div>		
				<div class="row">
					<div class="col-md-6">						
						<label for="nombre">Monto</label>
						<input class="form-control" type="text" id="monto" name="monto" value="">
					</div>
				</div>					
				<div class="row">					
					<div class="col-md-2">
						<br>
						<button id="Contrato" type="submit" class="btn btn-primary">Pagar</button>
					</div>	
				</div>
			</form>		
			<form action="<?php echo base_url('deposito');?>" method="post" class="col-md-12" id="form_deposito">				
				<div class="row">
					<div class="col-md-6">
						<label for="correo">Monto</label>
						<input class="form-control" type="text" id="monto" name="monto" value="">					
					</div>
				</div>				
				<div class="row">					
					<div class="col-md-2">
						<br>
						<button id="Contrato" type="submit" class="btn btn-primary">Pagar</button>
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
