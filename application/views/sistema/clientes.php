
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Listado de clientes</h3>
          </div>

          <!-- /.card-header -->

          <div class="card-body">
		  	<div class="row">
                    <div class="col-md-12">
                        <table id="tablaClientes" class="table table-bordered btn-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Telefono</th>
									<th>Editar</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($clientes)):?>
									<?php foreach ($clientes as $cliente):?>
										<tr>
											<td><?php echo $cliente->id?></td>
											<td><?php echo $cliente->nombre_completo?></td>
											<td><?php echo $cliente->correo?></td>
											<td><?php echo $cliente->telefono?></td>
											<td>
												<div style="text-align: center;">
													<a href="<?php echo base_url();?>sistema/clientes/editar_cliente/<?php echo $cliente->id?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>													
												</div>
											</td>
										</tr>
									<?php endforeach;?>
								<?php endif;?>
							</tbody>
						</table>
                    </div>
                </div>				
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
</section>
