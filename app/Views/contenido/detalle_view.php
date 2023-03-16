  <div class="image-fondo1">
    <link href="<?php echo base_url ('public/css/productosycomercializacion.css'); ?>" rel="stylesheet">
    <h1 class="cabecera"><?php echo $titulo ?></h1>
  </div>

                    <div class="container">
                      <div class="table-resposive">
                      <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
                        <caption><?php echo $titulo ?></caption>
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">id_venta</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unidad</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php foreach ($detalles as $detalle){ ?>
                            <td><strong><?php echo $idVenta; ?></strong></td>
                            <td><?php foreach($productos as $producto){ if ($detalle['id_producto'] == $producto['id_producto']) { echo $producto['nombre']; } } ?></td>
                            <td><?php echo $detalle['detalle_cantidad'] ?></td>
                            <td>$ <?php echo number_format($detalle['detalle_precio'],2,',','.'); ?></td>
                            <td>$ <?php echo number_format($detalle['detalle_subtotal'],2,',','.'); ?></td>
                            <td></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      </div>
                    </div>

                      <div class="container">
                        <a href="<?php echo base_url('tablaVentas');?>" class="btn btn-primary">VOLVER</a>
                      </div>
                