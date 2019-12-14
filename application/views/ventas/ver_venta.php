<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title"></h3>
					</div>

					<!-- /.card-header -->

					<div class="card-body">
						<form action="#" method="post" class="col-md-12">	
							<!-- AQUI IRIA LOS DATOS DEL CLIENTE Y ESAS COSAS  -->
							<h3 class="my-3" id="detalle-titulo">Datos del cliente</h3>							
								<div class="row">	
									<div class="col-md-12">
										<p><strong>Nombre</strong>: <span class="text-muted"><?php echo $venta->nombre_completo; ?></span></p>
									</div>
									<div class="col-md-12">
										<p><strong>Fecha de la venta</strong>: <span class="text-muted"><?php echo date('Y-m-d', strtotime($venta->fecha_venta)) ; ?></span></p>
									</div>
									<div class="col-md-12">
										<p><strong>Folio</strong>: <span class="text-muted"><?php echo $venta->folio; ?></span></p>
									</div>
									<div class="col-md-12">
										<p><strong>Folio</strong>: <span class="text-muted"><?php echo $venta->correo; ?></span></p>
									</div>	
									<div class="col-md-12">
										<p><strong>Telefono</strong>: <span class="text-muted"><?php echo $venta->telefono; ?></span></p>
									</div>								
								</div>							
							<!-- <div class="row">	
								<div class="col-md-12">
									<p><strong>Nombre</strong>: <span class="text-muted"><?php echo $nombre_completo; ?></span></p>
								</div>
								<div class="col-md-12">
									<p><strong>Correo Electronico</strong>: <span class="text-muted"><?php echo $correo; ?></span></p>
								</div>
								<div class="col-md-12">
									<p><strong>Número de teléfono</strong>: <span class="text-muted"><?php echo $telefono; ?></span></p>
								</div>
							</div> -->


							<h3 class="my-3" id="detalle-titulo">Detalle de la venta</h3>
							<div class="card-body p-0">
								<table class="table table-bordered" id="">
									<thead>
										<tr>
											<th style="width: 50px">ID</th>
											<th>Tipo</th>
											<th>Nombre</th>
											<th>Precio</th>
											<th>Cantidad</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody id="">
									<?php if(!empty($venta)):?>
										<?php $i = 1;?>
										<?php foreach ($detalle_venta as $item) { ?>
											<tr>												
												<td><?php echo $i++?></td>												
												<td><?php echo $item->id_proveedor; ?></td> <!-- ESTE FALTA ADAPTARLO PARA QUE DIGA QUE PROVEEDOR ES -->																																
												<td><?php echo $item->nombre; ?></td>												
												<td><?php echo $item->costo; ?></td>												
												<td><?php echo $item->cantidad; ?></td>												
												<td><?php echo $item->subtotal; ?></td>												
											</tr>
										<?php } ?>
									<?php endif;?>

									<!-- <tr><td colspan="5" align="right" style="border: 0">Subtotal</td>
									<td colspan="2"></td></tr>
									<tr><td colspan="5" align="right" style="border: 0">IVA</td>
									<td colspan="2"></td></tr>
									<tr><td colspan="5" align="right" style="border: 0">Total</td>
									<td colspan="2"></td></tr> -->
									</tbody>
								</table>
							</div>
							<div class="d-block mt-3">
								<!-- <button id="btn-compra" type="button" class="btn btn-success mr-2">Proceder con la compra</button>
								<button id="Contrato" type="button" class="btn btn-primary">Generar Contrato</button> -->
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
