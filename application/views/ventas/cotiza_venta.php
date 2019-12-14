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
                        <input type="hidden" value="<?= $folio ?>" id="folioCotizacion">
                        <hr>
                        <form action="<?php echo base_url('ventas/generar-venta'); ?>" method="POST">
                            <div class="form-group">
                                <label for="">Ubicación del evento</label>
                                <?php if($direccion != null){ ?>
                                    <input value="<?= $direccion; ?>" type="text" class="form-control" id="ubiEvento" name ="ubiEvento" disabled>
                                <?php }else{ ?>
                                    <input type="text" class="form-control" id="ubiEvento" name ="ubiEvento">
                                <?php } ?>
                                <small id="" class="form-text text-muted">Proporcione la dirección donde será el evento o bien la del local alquilado</small>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                <label for="fechaEvento">Fecha del evento</label>
                                <input type="date" class="form-control fecha_renta" name="fechaEvento" id="fechaEvento" aria-describedby="" value="<?php echo date('Y-m-d')?>">
								<small class="form-text text-muted">Sujeto a disponibilidad</small>
								<button id="Contrato" type="button" class="btn btn-primary">Generar Contrato</button>							
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h4>Información del pago</h4>
                                    <div class="border rounded my-2 p-3">
                                        <label for="formaPago">Forma de pago</label>
                                        <select name="formaPago" id="formaPago" class="form-control">
                                            <option value="0">Efectivo</option>
                                            <option value="1">Tarjeta</option>
                                        </select>
                                        <hr class=>

                                        <!-- info de tarjeta -->
                                        <div class="form-group">
                                            <label for="">Número de tarjeta</label>
                                            <input type="text" class="form-control" id="tarjeta" name="tarjeta" autocomplete="off">
                                            <small id="" class="form-text text-muted">16 digitos de tu plastico</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Nombre del titular</label>
                                            <input type="text" class="form-control" id="" name="" placeholder="Jhon Doe" autocomplete="off">
                                            <small id="" class="form-text text-muted">Todos los datos son confidenciales</small>
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-6 form-group">
                                                <label for="">vencimiento</label>
                                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="12/22" autocomplete="off">
                                                <small id="" class="form-text text-muted">Vencimiento del plastico</small>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="">CVV</label>
                                                <input type="password" class="form-control" id="nip" name="nip" autocomplete="off">
                                                <small id="" class="form-text text-muted">Código de seguridad</small>
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

                                        <!-- calculo del subtotal + IVA -->
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="py-0 my-0">Subtotal a pagar</label>
                                                <p class="text-muted"><?php echo round($detalle->total, 2); ?></p>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label class="py-0 my-0">IVA</label>
                                                <p class="text-muted"><?php echo ($detalle->total*.16); ?></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="py-0 my-0">Total a pagar</label>
                                            <input type="hidden" value="<?php echo $detalle->total; ?>" name="monto" id="monto">
                                            <p class="text-muted"><span class="text-info">$</span><?php echo round($detalle->total*1.16,2); ?><span class="text-success">MXN</span></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="d-block">
                                <!-- <button class="btn btn-success" type="submit">Finalizar compra</button> -->
                                <button class="btn btn-success" type="button" id="finalizarventa">Finalizar compra</button>
                            </div>
                        </form>
                    </div>

                    <!-- end card body -->
                </div>
            </div>
        </div>
    </div>
</section>
