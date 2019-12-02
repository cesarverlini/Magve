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
            <div class="col-md-8">
              <label>Nombre: </label>
            </div>
            <div class="col-md-4" style="text-align: right;">
							<label><?php echo $nombre?></label>
							<br>
							<input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $nombre?>">
							<!-- <input class="form-control" type="text" id="apellido_p" name="apellido_p" value="<?php echo $apellido_p?>">
							<input class="form-control" type="text" id="apellido_m" name="apellido_m" value="<?php echo $apellido_m?>"> -->
            </div>					
          </div>
          <div class="row">				
            <div class="col-md-8">
              <label for="correo">Correo Electronico</label>
            </div>
            <div class="col-md-4" style="text-align: right;">
							<label name="correo"><?php echo $correo?></label>
							<input class="form-control" type="text" id="correo" name="correo" value="<?php echo $correo?>">								
            </div>					
            <div class="col-md-8">
              <label for="telefono">Numero de Telefono</label>
            </div>
            <div class="col-md-4" style="text-align: right;">
							<label name="telefono"><?php echo $telefono?></label>
							<input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $telefono?>">						
            </div>					
          </div>			
          <div class="card-body">
						<table class="table table-bordered">
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
								<tbody>
								<?php foreach ($carrito as $item) { ?>
										<tr>
												<td><?php echo $item['id']; ?></td>
												<td><?php echo $item['service']; ?></td>
												<td><?php echo $item['name']; ?></td>
												<td><?php echo $item['price']; ?></td>
												<td><?php echo $item['quantity']; ?></td>
												<td><?php echo $item['price'] * $item['quantity']; ?></td>
												<!-- <td align="center">
														<a href="<?php echo site_url('carrito/quitar/'.$item['id']); ?>">X</a>
												</td> -->
										</tr>
								<?php } ?>
										<tr>
									<td colspan="5" align="right">Total</td>
									<td colspan="2">$<?php echo $total; ?></td>
								</tr>
								</tbody>
						</table>
          </div>
          <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2" style="text-align: right;">
              <br>
              <button type="submit" id="guardar" class="btn btn-primary">Enviar Cotizacion</button>
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
