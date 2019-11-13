
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
                                        
                                    <li id="navStep2" class="li-nav" step="#step-2" >
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 1</h4> -->
                                            <p class="list-group-item-text">Locales</p>
                                        </a>
                                    </li>
                                    <li id="navStep3" class="li-nav" step="#step-3">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 2</h4> -->
                                            <p class="list-group-item-text">Musica</p>
                                        </a>
                                    </li>
                                    <li id="navStep4" class="li-nav" step="#step-4">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 3</h4> -->
                                            <p class="list-group-item-text">Reposteria</p>
                                        </a>
                                    </li>
                                    <li id="navStep5" class="li-nav" step="#step-5">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 4</h4> -->
                                            <p class="list-group-item-text">Banquete</p>
                                        </a>
                                    </li>
                                    <li id="navStep6" class="li-nav" step="#step-6">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 5</h4> -->
                                            <p class="list-group-item-text">lo que sea</p>
                                        </a>
									</li>
									<li id="navStep7" class="li-nav" step="#step-7">
                                        <a>
                                            <!-- <h4 class="list-group-item-heading">Paso 6</h4> -->
                                            <p class="list-group-item-text">lo que sea 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">                        
                        <div class="row setup-content primer_paso" id="step-1">
                            <!-- <form name="crear_cotizacion" id="crear_cotizacion" style="margin-top: -20px;"> -->
							<div class="col-xs-6 text-left"">
								<label>Servicios</label>
								<br>
								<input type="checkbox" name="vehicle1">Local<br>
								<input type="checkbox" name="vehicle1">Musica<br>
								<input type="checkbox" name="vehicle1">Reposteria<br>
								<input type="checkbox" name="vehicle1">Banquete<br>
								<br>
							</div>
							<div id="clientes" class="col-md-6">
								<label>Cliente</label>
								<input class="form-control"	type="text" id="nombreCliente" placeholder="Introduzca el nombre del cliente">

								<label>Correo</label>
								<input class="form-control"	type="text" id="nombreCliente" placeholder="Introduzca el correo del cliente">

								<label>Numero de Telefono</label>
								<input class="form-control"	type="text" id="nombreCliente" placeholder="Introduzca el telefono del cliente">
							</div>
                            <!-- </form> -->
                        </div>
                         <!--  ========================================================================================================================================
                                                                  	VISTA DE LOCALES
                          ======================================================================================================================================== -->
                        <div class="row setup-content segundo_paso" id="step-2" style="display: none; margin-top: -40px;">
                            <form>
                                
                            </form>
                        </div>
                        <!--  ========================================================================================================================================
                        											VISTA DE MUSICA
                        ======================================================================================================================================== -->
                        <div class="row setup-content tercer_paso" id="step-3" style="display: none; margin-top: -40px;">
                            <form>
                                
                            </form>
                        </div>

                        <!--  ========================================================================================================================================
                        											VISTA DE REPOSTERIA
                        ======================================================================================================================================== -->
                        <div class="row setup-content cuarto_paso" id="step-4" style="display: none; margin-top: -40px;">                    
                            
                        </div>

                        <!--  ========================================================================================================================================
                        											VISTA DE BANQUETE
                        ======================================================================================================================================== -->
                        <div class="row setup-content quinto_paso" id="step-5" style="display: none; margin-top: -40px;">
							<div id="bebidas" class="col-md-4">
								<label>Bebida</label>
								<select class="form-control" id="cmbBebida">
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
								<table>
									<thead>
										<tr>
											<th>Bebida</th>
											<th>Cantidad</th>
											<th>Precio</th>
											<th>Total</th>
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
											<th>Comida</th>
											<th>Cantidad</th>
											<th>Precio</th>
											<th>Total</th>
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
											<th>Postre</th>
											<th>Cantidad</th>
											<th>Precio</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody id="tablapostres">
										
									</tbody>
								</table>
							</div>
						</div>
					<!--========================================================================================================================================
                        											VISTA DE LOCALES
                        ======================================================================================================================================== -->
                        <div class="row setup-content sexto_paso" id="step-6" style="display: none; margin-top: -40px;">
                            <form>
                            
                            </form>
						</div>
					<!--========================================================================================================================================
                        											VISTA DE LOCALES
						======================================================================================================================================== -->
						<div class="row setup-content septimo_paso" id="step-7" style="display: none; margin-top: -40px;">
                            <form>							
							
							</form>
						</div>
					<!--========================================================================================================================================
                        											Botones footer
						======================================================================================================================================== -->
						<div class="col-xs-6 text-left" style="margin-top: 50px;">
							<a type="button" href="" class="btn btn-default">Cancelar</a>
							<button type="button" id="btnprueba" class="btn btn-primary">Enviar Cotizacion</button>
							<!-- <button type="button" class="btn btn-primary" id="cesar">Probar</button> -->
                        </div>
                </div>
            </div>
        </div>
  </section>
</div>
<!-- /.content-wrapper -->
