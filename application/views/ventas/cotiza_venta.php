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
                        <h3>Información para evento - Folio: <?= $folio ?></h3>
                        <hr>
                        <form action="<?php echo base_url('ventas/generar-venta'); ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ubicación del evento</label>
                                <input type="text" class="form-control" id="ubiEvento" name ="ubiEvento" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Proporcione la dirección donde será el evento o bien la del local alquilado</small>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                <label for="fechaEvento">Fecha del evento</label>
                                <input type="date" class="form-control" name="fechaEvento" id="fechaEvento" aria-describedby="">
                                <small class="form-text text-muted">Sujeto a disponibilidad</small>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h4>Información del pago</h4>
                                    <div class="border rounded my-2 p-3">
                                        <label for="formaPago">Forma de pago</label>
                                        <select name="formaPago" id="" class="form-control">
                                            <option value="0">Efectivo</option>
                                            <option value="1">Tarjeta</option>
                                        </select>
                                        <hr class=>

                                        <!-- info de tarjeta -->
                                        <div class="form-group">
                                            <label for="">Número de tarjeta</label>
                                            <input type="text" class="form-control" id="tarjeta" name="tarjeta">
                                            <small id="" class="form-text text-muted">16 digitos de tu plastico</small>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="">NIP</label>
                                                <input type="text" class="form-control" id="nip" name="nip">
                                                <small id="" class="form-text text-muted">La clave con la que firmas tus compras</small>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="">CVV</label>
                                                <input type="text" class="form-control" id="cvv" name="cvv">
                                                <small id="" class="form-text text-muted">No compartiremos ningun dato privado con nadie</small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Detalles</h4>
                                    <div class="border rounded my-2 p-3">
                                        <div class="form-group">
                                            <label class="py-0 my-0">Nombre del cliente</label>
                                            <p class="text-muted"><?php echo $detalle->nombre_completo; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label class="py-0 my-0">Telefono</label>
                                            <p class="text-muted"><?php echo $detalle->telefono; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label class="py-0 my-0">Correo</label>
                                            <p class="text-muted"><?php echo $detalle->correo; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label class="py-0 my-0">Nombre del vendedor</label>
                                            <p class="text-muted"><?php echo $detalle->nombre." ".$detalle->apellido_p; ?></p>
                                        </div>

                                        <div class="form-group">
                                            <label class="py-0 my-0">Total a pagar</label>
                                            <input type="hidden" value="<?php echo $detalle->total; ?>" name="monto">
                                            <p class="text-muted"><?php echo $detalle->total; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block">
                                <button class="btn btn-success" type="submit">Finalizar compra</button>
                            </div>
                        </form>
                    </div>

                    <!-- end card body -->
                </div>
            </div>
        </div>
    </div>
</section>