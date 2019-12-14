<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Ventas Realizadas</h3>
					</div>

					<!-- /.card-header -->

					<div class="card-body">
						<form action="<?php echo base_url(); ?>" method="post" class="col-md-12">							
							<h3 class="my-3" id="detalle-titulo">Detalle de ventas</h3>
							<div class="card-body p-0">
								<table class="table table-bordered datatable" id="tabla_historial">
									<thead>
										<tr>
											<th style="width: 50px">ID</th>
											<th>Nombre Cliente</th>
											<th>Folio</th>
											<th>Fecha de venta</th>
											<th>Total</th>
											<th>Detalle</th>
											<th>PDF</th>
										</tr>
									</thead>
									<tbody id="tblbodyHistorial">
									<?php if(!empty($ventas)):?>
										<?php foreach ($ventas as $venta) { ?>
											<tr>
												<td><?php echo $venta->id; ?></td>												
												<td><?php echo $venta->nombre_completo; ?></td>												
												<td><?php echo $venta->folio; ?></td>												
												<td><?php echo date('Y-m-d', strtotime($venta->fecha_venta)) ?></td>												
												<td><?php echo $venta->total; ?></td>												
												<td>
													<div style="text-align: center;">
														<a href="<?php echo base_url('ver_venta/'.$venta->id)?>" class="btn btn-primary"><span class="fa fa-eye"></span></a>													
													</div>
												</td>												
												<td>
													<div style="text-align: center;">
														<a href="<?php echo base_url('ver_venta_pdf/'.$venta->id)?>" target="_blank" class="btn btn-success"><span class="fa fa-download"></span></a>													
													</div>
												</td>												
											</tr>
										<?php } ?>

									<?php endif;?>
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
