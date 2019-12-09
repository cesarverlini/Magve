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
						<form action="<?php echo base_url('confirmacion'); ?>" method="post" class="col-md-12">
							<h3><span class="text-success">1</span> Buscar cotización por...</h3>
							<div class="row">
								<div class="col-md-5">
									<label for="correo">Correo Electronico</label>
									<input class="form-control" type="text" id="correo" name="correo" value="">
									<!-- <input hidden class="form-control" type="text" id="idcliente" name="idcliente" value=""> -->
								</div>
								<div class="col-md-5">
									<label for="folio">Folio de la Cotizacion</label>
									<input class="form-control" type="text" id="folio" name="folio" value="">
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
									<input class="form-control" type="text" id="nombre" name="nombre" value="">
								</div>
								<div class="col-md-6">
									<label for="telefono">Numero de Telefono</label>
									<input class="form-control" type="text" id="telefono" name="telefono" value="">
								</div>
							</div>
							<hr>
							<h3 class="my-3">Detalle de la cotización</h3>
							<div class="card-body p-0">
								<table class="table table-bordered" id="tabla_cotizacion">
									<thead>
										<tr>
											<th style="width: 50px">ID</th>
											<th>Tipo</th>
											<th>Nombre</th>
											<th>Precio</th>
											<th>Cantidad</th>
											<th>Subtotal</th>
											<!-- <th style="width: 100px">Eliminar</th> -->
										</tr>
									</thead>
									<tbody id="tblbodyCotizacion">
										<!-- <?php foreach ($carrito as $item) { ?>
								<tr>
									<td><?php echo $item['id']; ?></td>
									<td><?php echo $item['service']; ?></td>
									<td><?php echo $item['name']; ?></td>
									<td><?php echo $item['price']; ?></td>
									<td><?php echo $item['quantity']; ?></td>
									<td><?php echo $item['price'] * $item['quantity']; ?></td>
											<a href="<?php echo site_url('carrito/quitar/' . $item['id']); ?>">X</a>
									</td> -->
										</tr>
									<?php } ?> -->
									<!-- <tr>
								<td colspan="5" align="right">Total</td>
								<td colspan="2">$<?php echo $total; ?></td>
							</tr> -->
									</tbody>
								</table>
							</div>
							<div class="row my-3">
								<!-- <div class="col-md-10"></div> -->
								<div class="col-md-2">
									<button id="Contrato" type="button" class="btn btn-primary">Generar Contrato</button>
									<!-- <a href="<?php echo base_url('contrato'); ?>" target="_blank" id="Contrato" type="button" class="btn btn-primary">Generar Contrato (NO ESTA TERMINADO)</> -->
								</div>
								<div class="col-md-2">
									<button type="butotn" class="btn btn-success">Proceder con la compra</button>
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