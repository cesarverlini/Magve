
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <a href="<?php echo base_url();?>mantenimiento/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Productos</a> -->
                    </div>
                </div>
                <hr>
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
											<td><?php echo $cliente->nombre?></td>
											<td><?php echo $cliente->correo?></td>
											<td><?php echo $cliente->telefono?></td>
											<td>
												<div style="text-align: center;">
													<a href="<?php echo base_url();?>sistema/clientes/editar_cliente/<?php echo $cliente->id?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>													
												</div>
											</td>
										</tr>
									<?php endforeach;?>
								<?php endif;?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <table id="example1" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>cesar</td>
			<td>cesarvb02@gmail.com</td>
			<td>6622286175</td>
			<td>
				<div>
					<a href="#" class="btn btn-danger"><span class="fa fa-remove"></span></a>
				</div>
			</td>
		</tr>
	</tbody>
</table> -->
