
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Cotizaciones
        <!-- <small>Listado</small> -->
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    		<div class="row">
            <div class="col-xs-12">
              	<div class="box">
                    <div class="box-header">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav">
                                    <li id="navStep1" class="li-nav active" step="#step-1">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Pasos</h4> -->
                                            <p class="list-group-item-text">Creacion de cotizacion</p>
                                        </a>
                                    </li>
                                        
                                    <li id="navStep2" class="li-nav " step="#step-2" >
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 1</h4> -->
                                            <p class="list-group-item-text">Locales</p>
                                        </a>
                                    </li>
                                    <li id="navStep3" class="li-nav" step="#step-3">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 2</h4> -->
                                            <p class="list-group-item-text">Fotografia</p>
                                        </a>
                                    </li>
                                    <li id="navStep4" class="li-nav" step="#step-4">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 3</h4> -->
                                            <p class="list-group-item-text">Banquete</p>
                                        </a>
                                    </li>
                                    <li id="navStep5" class="li-nav" step="#step-5">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 4</h4> -->
                                            <p class="list-group-item-text">Imprenta</p>
                                        </a>
                                    </li>
                                    <li id="navStep6" class="li-nav" step="#step-6">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 5</h4> -->
                                            <p class="list-group-item-text">Decoraciones</p>
                                        </a>
									</li>
									<li id="navStep7" class="li-nav" step="#step-7">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 6</h4> -->
                                            <p class="list-group-item-text">x</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">                        
                        <div class="row setup-content primer_paso" id="step-1">
                            <!-- <form name="crear_cotizacion" id="crear_cotizacion" style="margin-top: -20px;"> -->
							<div class="col-md-6 text-left">
								<label class="">Servicios</label>

								<ul class="list-group">
									<li class="list-group-item">
										<input class="form-check-input" type="checkbox" id="cbxlocal" name="cbxlocal">
										<label for="cbxlocal">Local</label>
									</li>
									<li class="list-group-item">
										<input type="checkbox" id="cbxfotografia" name="cbxfotografia">
										<label for="cbxfotografia">Fotografía</label>
									</li>
									<li class="list-group-item">
										<input type="checkbox" id="cbxbanquete" name="cbxbanquete">
										<label for="cbxbanquete">Banquete</label>
									</li>
									<li class="list-group-item">
										<input type="checkbox" id="cbximprenta" name="cbxmusica">
										<label for="cbxmusica">Musica</label>
									</li>
									<li class="list-group-item">
										<input type="checkbox" id="cbxdecoracion" name="cbxreposteria">
										<label for="cbxreposteria">Reposteria</label>
									</li>
								</ul>
							</div>

							<div id="clientes" class="col-md-6">
								<label>Cliente</label>
								<input class="form-control"	type="text" id="nombreCliente" placeholder="Introduzca el nombre del cliente">
								<small claas="text-muted"></small>
								<br>
								<label>Correo</label>
								<input class="form-control"	type="text" id="correoCliente" placeholder="Introduzca el correo del cliente">
								<br>
								<label>Numero de Telefono</label>
								<input class="form-control"	type="text" id="telefonoCliente" placeholder="Introduzca el telefono del cliente">
							</div>
							<div class="col-xs-6 text-left" style="margin-top: 50px;">
								<!-- <a type="button" href="" class="btn btn-default">Cancelar</a> 
								<button type="button" id="btnapi" class="btn btn-primary">prueba</button>-->
							<!-- <button type="button" class="btn btn-primary" id="cesar">Probar</button> -->
                       	 	</div>
                            <!-- </form> -->
                        </div>
						<button type="button" id="btnapi" class="btn btn-primary">prueba</button>
                         <!--  ========================================================================================================================================
                                                                  	VISTA DE LOCALES
                          ======================================================================================================================================== -->
                        <div class="row setup-content segundo_paso" id="step-2" style="display: none; margin-top: -40px;">
							<div class="col-md-12">
								<h4>Filtrar locales</h4>
								<br>
								<div class="col-md-4">
									<label>Fecha</label>
									<input class="form-control fecha_renta" type="date" id="filtroLocal_fecha" min="0" placeholder="Fecha que desea rentar el local">
									<!-- value="2019-11-20" -->
								</div>
							</div>
							<div class="col-md-12">
								<br>								
								<h4>Seleccionar locales disponibles</h4>
								<br>
								<div class="col-md-4">
									<label>Local</label>
									<select class="form-control" id="cmbLocales">
										<option value="">Seleccionar...</option>										
										<!-- <option value="1">Local 1</option>
										<option value="2">Local 2</option>
										<option value="3">Local 3</option> -->
									</select>
								</div>
								<!-- <div class="col-md-4">
									<label>Fecha Tentativa de renta</label>
									<input class="form-control" type="date" id="txtLocal_fecha" min="0" placeholder="Fecha que desea rentar el local">
								</div> -->
								<!-- value="2019-11-20" -->
								<div class="col-md-4">
									<label>Capacidad</label>
									<input class="form-control" type="number" id="txtLocalCap" readonly="true" min="0" placeholder="Capacidad de personas del local">									
								</div>
								<div class="col-md-4">
									<label>Direccion</label>
									<input class="form-control" type="text" id="txtLocalAddress" readonly="true" placeholder="Direccion del local">
								</div>
								<div class="col-md-4">
									<label>Costo</label>
									<input class="form-control" type="number" id="txtCostoLocal" readonly="true" min="0" placeholder="Costo del local">
								</div>
							</div>
							<div class="col-md-12">
								<br>
								<button type="button" id="btnCarritoLocal" class="btn btn-primary">Agregar a Carrito</button>
							</div>

                        </div>
                        <!--  ========================================================================================================================================
                        											VISTA DE FOTOGRAFIA
                        ======================================================================================================================================== -->
                        <div class="row setup-content tercer_paso" id="step-3" style="display: none; margin-top: -40px;">                            
							<div class="col-md-12">
								<h4>Filtrar disponibilidad</h4>
								<br>
								<div class="col-md-4">
									<label>Fecha</label>
									<input class="form-control fecha_renta" type="date" id="filtroFoto_fecha" min="0" placeholder="Fecha que desea rentar el local">
									<!-- value="2019-11-20" -->
								</div>
							</div>
							<div class="col-md-12">
								<br>								
								<h4>Seleccionar paquetes disponibles</h4>
								<br>
								<div class="col-md-4">
									<label>Paquete</label>
									<select class="form-control" id="cmbPaqueteFoto">
										<option value="">Seleccionar...</option>										
										<option value="1">Paquete 1</option>
										<option value="2">Paquete 2</option>
										<option value="3">Paquete 3</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Descripcion</label>
									<textarea class="form-control" id="txtDesc_foto" placeholder="Descripcion del paquete"></textarea>
								</div>
								<div class="col-md-4">
									<label>Costo</label>
									<input class="form-control" type="number" id="txtCostoFoto" min="0" placeholder="Costo del paquete fotografico">
								</div>
							</div>
							<div class="col-md-12">
								<br>
								<button type="button" id="btnCarritoFoto" class="btn btn-primary">Agregar a Carrito</button>
							</div>
                        </div>
                        <!--  ========================================================================================================================================
                        											VISTA DE BANQUETE
                        ======================================================================================================================================== -->
                        <div class="row setup-content cuarto_paso" id="step-4" style="display: none; margin-top: -40px;">                    
						
                        </div>

                        <!--  ========================================================================================================================================
                        											VISTA DE IMPRENTA
                        ======================================================================================================================================== -->
                        <div class="row setup-content quinto_paso" id="step-5" style="display: none; margin-top: -40px;">
							<div class="col-md-12">
								<h4>Filtrar disponibilidad</h4>
								<br>
								<div class="col-md-4">
									<label>Fecha</label>
									<input class="form-control fecha_renta" type="date" id="filtroImprenta_fecha" min="0" placeholder="Fecha que desea rentar el local">
									<!-- value="2019-11-20" -->
								</div>
							</div>
							<div class="col-md-12">
								<br>								
								<h4>Seleccionar paquetes disponibles</h4>
								<br>
								<div class="col-md-4">
									<label>Paquete</label>
									<select class="form-control" id="cmbPaqueteImprenta">
										<option value="">Seleccionar...</option>										
										<option value="1">Paquete 1</option>
										<option value="2">Paquete 2</option>
										<option value="3">Paquete 3</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Descripcion</label>
									<textarea class="form-control" id="txtDesc_imprenta" placeholder="Descripcion del paquete"></textarea>
								</div>
								<div class="col-md-4">
									<label>Costo</label>
									<input class="form-control" type="number" id="txtCostoImprenta" min="0" placeholder="Costo del paquete fotografico">
								</div>
							</div>
							<div class="col-md-12">
								<br>
								<button type="button" id="btnCarritoImprenta" class="btn btn-primary">Agregar a Carrito</button>
							</div>
						</div>
					<!--========================================================================================================================================
                        											VISTA DE DECORACIONES
                        ======================================================================================================================================== -->
                        <div class="row setup-content sexto_paso" id="step-6" style="display: none; margin-top: -40px;">
							<div class="col-md-12">
								<h4>Filtrar disponibilidad</h4>
								<br>
								<div class="col-md-4">
									<label>Fecha</label>
									<input class="form-control fecha_renta" type="date" id="filtroDecoracion_fecha" min="0" placeholder="Fecha que desea rentar el local">
									<!-- value="2019-11-20" -->
								</div>
							</div>
							<div class="col-md-12">
								<br>								
								<h4>Seleccionar paquetes disponibles</h4>
								<br>
								<div class="col-md-4">
									<label>Paquete</label>
									<select class="form-control" id="cmbPaqueteDecoracion">
										<option value="">Seleccionar...</option>										
										<option value="1">Paquete Decoracion 1</option>
										<option value="2">Paquete Decoracion 2</option>
										<option value="3">Paquete Decoracion 3</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Descripcion</label>
									<textarea class="form-control" id="txtDesc_decoracion" placeholder="Descripcion del paquete"></textarea>
								</div>
								<div class="col-md-4">
									<label>Costo</label>
									<input class="form-control" type="number" id="txtCostoDecoracion" min="0" placeholder="Costo del paquete fotografico">
								</div>
							</div>
							<div class="col-md-12">
								<br>
								<button type="button" id="btnCarritoDecoracion" class="btn btn-primary">Agregar a Carrito</button>
							</div>
						</div>
					<!--========================================================================================================================================
                        											VISTA DE LOCALES
						======================================================================================================================================== -->
						<div class="row setup-content septimo_paso" id="step-7" style="display: none; margin-top: -40px;">
                            <form>							
							
							</form>
						</div>
						<!--========================================================================================================================================
                        											TABLA CARRITO
						======================================================================================================================================== -->
						<div class="col-xs-10 text-left" style="margin-top: 50px;">								
							<table>
								<thead>
									<tr>
										<th width="200px">Tipo Servicio</th>
										<th width="200px">Nombre</th>
										<!-- <th width="30%">Direccion</th> -->
										<th width="200px">Costo</th>
									</tr>
								</thead>
								<tbody id="tablaCarrito">
									
								</tbody>
							</table>
						</div>
					<!--========================================================================================================================================
                        											Botones footer
						======================================================================================================================================== -->
						<div class="col-xs-10 text-left" style="margin-top: 50px;">
							<a type="button" href="" class="btn btn-default">Cancelar</a>
							<button type="button" id="btnprueba" class="btn btn-primary">Enviar Cotizacion</button>
							<!-- <button type="button" class="btn btn-primary" id="cesar">Probar</button> -->
						</div>
						<div class="col-xs-2">
							<label id="TotalCotizacion">Costo Total:</label>
						</div>
                </div>
            </div>
        </div>
  </section>
</div>
<!-- /.content-wrapper -->


<!-- <div id="bebidas" class="col-md-4">
	<label>Bebida</label>
	<select class="form-control" id="cmbBebida">
		<option value="">Seleccionar...</option>
		<option value="1">Coca-Cola</option>
		<option value="2">Orchata</option>
		<option value="3">Alcohol</option>
	</select>
	<br>
	<label>Precio</label>
	<input class="form-control" type="number" id="txtPrecioBebida" min="0">
	<br>
	<label>Cantidad</label>
	<input class="form-control" type="number" id="txtCantidadBebida" min="0">
	<div class="col-md-10"></div>
	<div class="col-md-2">
		<button id="btnAddBebida" class="btn btn-primary">Agregar</button>
	</div>								
</div>

<div id="Comida" class="col-md-4">
	<label>Comida</label>
	<select class="form-control" id="cmbComida">
		<option value="">Seleccionar...</option>
		<option value="1">Barbacoa</option>
		<option value="2">Cabeza</option>
	</select>
	<br>
	<label>Precio</label>
	<input class="form-control" type="number" id="txtPrecioComida" min="0">
	<br>
	<label>Cantidad</label>
	<input class="form-control" type="number" id="txtCantidadComida" min="0">
	<div class="col-md-10"></div>
	<div class="col-md-2">
		<button id="btnAddComida" class="btn btn-primary">Agregar</button>
	</div>
</div>

<div id="banquete" class="col-md-4">
	<label>Postre</label>
	<select class="form-control" id="cmbPostre">
		<option value="">Seleccionar...</option>
		<option value="1">Brownie</option>
		<option value="2">Pastel</option>
	</select>
	<br>
	<label>Precio</label>
	<input class="form-control" type="number" id="txtPrecioPostre" min="0">
	<br>
	<label>Cantidad</label>
	<input class="form-control" type="number" id="txtCantidadPostre" min="0">
	<div class="col-md-10"></div>
	<div class="col-md-2">
		<button id="btnAddPostre" class="btn btn-primary">Agregar</button>
	</div>
	<br>
	<br>
</div>

<div id="" class="col-md-4">
	<table id="tablaBebidas">
		<thead>
			<tr>
				<th width="30%">Bebida</th>
				<th width="30%">Precio</th>
				<th width="30%">Cantidad</th>
				<th width="30%">Total</th>
			</tr>
		</thead>
		<tbody id="tablabebidas">
			
		</tbody>
	</table>
</div>

<div id="" class="col-md-4">
	<table>
		<thead>
			<tr>
				<th width="30%">Comida</th>
				<th width="30%">Precio</th>
				<th width="30%">Cantidad</th>
				<th width="30%">Total</th>
			</tr>
		</thead>
		<tbody id="tablaComida">
			
		</tbody>
	</table>
</div>

<div id="" class="col-md-4">
	<table>
		<thead>
			<tr>
				<th width="30%">Postre</th>
				<th width="30%">Precio</th>
				<th width="30%">Cantidad</th>
				<th width="30%">Total</th>
			</tr>
		</thead>
		<tbody id="tablapostres">
			
		</tbody>
	</table>
</div> -->
