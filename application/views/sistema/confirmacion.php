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
			      <form action="<?php echo base_url('save_cotizacion');?>" method="post" class="col-md-12">
              <h4>Datos del cliente</h4>
              <hr>
              <div class="row">	
                <div class="col-md-12 d-flex mb-2">
                  <strong>Nombre:</strong>&nbsp;<span class="text-muted"><?php echo $nombre?></span>
                </div>

                <div class="col-md-12 d-flex mb-2">
                  <strong>Correo electronico:</strong>&nbsp;<span class="text-muted"><?php echo $correo?></span>
                </div>

                <div class="col-md-12 d-flex mb-2">
                  <strong>Teléfono:</strong>&nbsp;<span class="text-muted"><?php echo $telefono?></span>
                </div>
					
              </div><!--end row-->

              <hr>
              <h4>Productos agregados al carrito</h4>
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
                <div class="col-md-2 mb-4" style="text-align: right;">
                  <button type="submit" id="guardar" class="btn btn-primary">Generar Cotizacion</button>
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
