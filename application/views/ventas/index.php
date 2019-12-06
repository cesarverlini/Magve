<!-- <div class="content-wrapper">
	<section class="content-header">
		<h1>Checkout <small>Proceso de venta</small>
	</section>
	
	<section class="container-fluid" style="margin-left:20px;margin-top:20px;padding:25px;">
		<hr style="width:100%;height:2px;background:#c7c5c1;">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron" style="padding:20px;heigth:100%;background:white;">
					<h2>No tienes cotización previa?</h2>
					<p style="font-size:15px;">
						Necesitas generar una cotización para poder partir de ese punto
						y realizar el checkout.
					</p>
					<p><a class="btn btn-success btn-lg" href="<?php echo base_url('sistema/cotizaciones'); ?>" role="button">Crear cotización</a></p>
				</div>
			</div>
		</div>

		<hr style="width:100%;height:2px;background:#c7c5c1;">
		<div class="row">
			<div class="col-lg-6">
				<h2>Buscar cotización reciente</h2>
				<p style="font-size:15px;">Recuerda que las cotizaciónes tienen una vigencia de 15 días</p>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Nombre del cliente o número de cotización">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Buscar</button>
					</span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h3 style="margin:20px 0;">Resultados de la busqueda</h3>
				<table class="table table-bordered" style="background:white;">
					<tr>
						<th>Numero cotización</th>
						<th>Nombre del cliente</th>
						<th>Empleado cotizador</th>
						<th>Total cotización (MX)</th>
						<th>Fecha de cotización</th>
						<th>Acción</th>
					</tr>
				
					<?php foreach($cotizaciones as $row){ ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['id_cliente']; ?></td>
							<td><?php echo $row['id_empleado']; ?></td>
							<td><?php echo $row['total']; ?></td>
							<td><?php echo $row['fecha']; ?></td>
							<td><a href="<?php echo base_url('ventas/verificar-cotizacion/'.$row['id']); ?>">Ver Cotización</a></td>

						</tr>
					<?php } ?> 
				</table>
				<div class="block">
					<nav aria-label="Page navigation">
						<ul class="pagination">
							<li class="disabled">
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
							</li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
</div> -->

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
			  <form action="<?php echo base_url('confirmacion');?>" method="post" class="col-md-12">				
				<div class="row">
					<div class="col-md-6">
						<label for="correo">Correo Electronico</label>
						<input class="form-control" type="text" id="correo" name="correo" value="">
						<!-- <input hidden class="form-control" type="text" id="idcliente" name="idcliente" value=""> -->							
					</div>
					<div class="col-md-6">
						<label for="folio">Folio de la Cotizacion</label>
						<input class="form-control" type="text" id="folio" name="folio" value="">		
						<br>
						<br>
						<br>	
					</div>
				</div>	
				<div class="row">
					<div class="col-md-6">						
						<label for="nombre">Nombre</label>
						<input class="form-control" type="text" id="nombre" name="nombre" value="">
					</div>
					<div class="col-md-6">
						<label for="telefono">Numero de Telefono</label>
						<input class="form-control" type="text" id="telefono" name="telefono" value="">
					</div>
				</div>	
				<div class="row">
					<div class="col-md-4" id="divcotizaciones">
						<label for="cmbCotizaciones">Cotizaciones</label>
						<select class="form-control" id="cmbCotizaciones" name="cmbCotizaciones">
							<!-- <option value="value1">Value 1</option> 
							<option value="value2" selected>Value 2</option>
							<option value="value3">Value 3</option> -->
						</select>
					</div>					
				</div>
				<div class="card-body">
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
											<a href="<?php echo site_url('carrito/quitar/'.$item['id']); ?>">X</a>
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
				<div class="row">
					<!-- <div class="col-md-10"></div> -->
					<div class="col-md-2">
						<br>
						<button id="Contrato" type="button" class="btn btn-primary">Generar Contrato</button>
						<!-- <a href="<?php echo base_url('contrato');?>" target="_blank" id="Contrato" type="button" class="btn btn-primary">Generar Contrato (NO ESTA TERMINADO)</> -->
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
