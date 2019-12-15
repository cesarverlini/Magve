<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Favor de confirmar la información para generar cotización</h3>
          </div>

          <!-- /.card-header -->

          <div class="card-body">
				<form action="<?php echo base_url('save_cotizacion');?>" method="post" class="col-md-12">
					<div class="row">	
						<div class="col-md-12">
							<p><strong>Nombre</strong>: <span class="text-muted"><?php echo $nombre; ?></span></p>
						</div>
						<div class="col-md-12">
							<p><strong>Correo Electronico</strong>: <span class="text-muted"><?php echo $correo; ?></span></p>
						</div>
						<div class="col-md-12">
							<p><strong>Número de teléfono</strong>: <span class="text-muted"><?php echo $telefono; ?></span></p>
						</div>

						<!-- hidden inputs -->
						<input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>">
						<input class="form-control" type="text" id="id_cliente" name="id_cliente" value="<?php echo $id?>">
						<input class="form-control" type="text" id="correo" name="correo" value="<?php echo $correo?>">								
						<input class="form-control" type="hidden" id="telefono" name="telefono" value="<?php echo $telefono?>">
						<!-- hidden inputs -->
					</div>
						

			
					<div class="p-0 my-3">
						<table class="table table-bordered p-0 m-0">
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
								<tbody>
									<?php foreach ($carrito as $item) { ?>
									<tr>
										<td><?php echo $item['id']; ?></td>
										<td><?php echo $item['service']; ?></td>
										<td><?php echo $item['name']; ?></td>
										<td><?php echo $item['price']; ?></td>
										<td><?php echo $item['quantity']; ?></td>
										<td><?php echo "$".$item['price'] * $item['quantity']; ?></td>
									</tr>
									<?php } ?>
								<tr>
									<td colspan="5" align="right" style="border: 0">Sub Total</td>
									<td colspan="2">$<?php echo $total; ?></td>
								</tr>
								<tr>
									<td colspan="5" align="right" style="border: 0">IVA</td>
									<td colspan="2">$<?php echo $iva; ?></td>
								</tr>
								<tr>
									<td colspan="5" align="right" style="border: 0">Total</td>
									<td colspan="2">$<?php echo ($total + $iva); ?></td>
								</tr>
								</tbody>
						</table>
					</div>
					<div class="row">
						<div class="d-block my-3">
							<button type="button" id="guardar" class="btn btn-primary mr-2">Generar cotizacion</button>
							<!-- <a href="<?php echo base_url('pagar');?>" type="button" class="btn btn-success">Pagar</a> -->
							
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
