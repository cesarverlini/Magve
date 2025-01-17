<div class="content-wrapper">
	<section class="content-header">
		<h1>Checkout <small>Proceso de venta</small>
	</section>
	<!-- Main content -->
	<section class="container-fluid" style="margin-left:20px;margin-top:20px;padding:25px;">
		<hr style="width:100%;height:2px;background:#c7c5c1;">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron" style="padding:20px;heigth:100%;background:white;">
					<h2>Verificand si tu cotización existe</h2>
					<p style="font-size:15px;">
						<?= $mensaje; ?>
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
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
