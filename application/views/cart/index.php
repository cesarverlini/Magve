<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Articulos</h3>
                </div>
                <!-- /.card-header -->
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
                            <th style="width: 100px">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item) { ?>
                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['service']; ?></td>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['price']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['price'] * $item['quantity']; ?></td>
                                <td align="center">
                                    <a href="<?php echo site_url('carrito/quitar/'.$item['id']); ?>">X</a>
                                </td>
                            </tr>
                        <?php } ?>
                            <tr>
        			            <td colspan="5" align="right">Total</td>
        			            <td colspan="2">$<?php echo $total; ?></td>
        		            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer clearfix">
                    <a href="<?php echo site_url('servicios'); ?>">Continuar comprando</a>
                    &nbsp;|&nbsp;
                    <a href="<?php echo site_url('informacion-del-cliente'); ?>">Guardar Cotización</a>
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
