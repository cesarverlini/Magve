<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Busqueda de cotización</h3>
					</div>

					<!-- /.card-header -->

					<div class="card-body">
						<form action="<?php echo base_url('ventas/cotizacion-venta/76912019'); ?>" method="post" class="col-md-12">
							<h3>Buscar cotización:</h3>
							<div class="row">
								<div class="col-md-5">
									<label for="correo">Correo Electronico / Folio</label>
									<input class="form-control" type="text" id="correofolio" name="correofolio" value="">
									<br>
									<br>
									<br>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4" id="divcotizaciones">
									<label for="cmbCotizaciones">Seleccionar cotización</label>
									<select class="form-control" id="cmbCotizaciones" name="cmbCotizaciones">
									</select>
								</div>
							</div>

							<hr>
							<h3 class="my-3">Información del cliente</h3>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="nombre">Nombre</label>
									<input class="form-control" type="text" id="nombre" name="nombre" value="" disabled>
								</div>
								<div class="col-md-6">
									<label for="telefono">Numero de Telefono</label>
									<input class="form-control" type="text" id="telefono" name="telefono" value="" disabled>
								</div>
							</div>
							<hr>
							<h3 class="my-3" id="detalle-titulo">Detalle de la cotización</h3>
							<div class="card-body p-0">
								<table class="table table-bordered" id="tabla_cotizacion">
									<thead>
										<tr>
											<th style="width: 50px">ID</th>
											<th>Tipo</th>
											<th>Nombre</th>
											<th>Precio Unitario</th>
											<th>Cantidad</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody id="tblbodyCotizacion">
										<!-- contenido cargado con JS -->
									</tbody>
								</table>
							</div>
							<div class="d-block mt-3">
								<button id="btn-compra" type="button" class="btn btn-success mr-2">Proceder con la compra</button>
								<!-- <button id="Contrato" type="button" class="btn btn-primary">Generar Contrato</button> -->
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
