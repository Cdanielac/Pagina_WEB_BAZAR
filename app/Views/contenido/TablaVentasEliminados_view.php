<div class="image-fondo1">
    <link href="<?php echo base_url ('public/css/productosycomercializacion.css'); ?>" rel="stylesheet">
    <h1 class="cabecera"><?php echo $titulo ?></h1>
  </div>
    <div class="container">
    <a href="<?php echo base_url('tablaVentas');?>" class="btn btn-warning">VOLVER</a>
  </div>

<div class="container">
  <div class="table-resposive">
  <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
    <caption>Lista de Ventas Eliminadas</caption>
    <thead class="table-dark">
      <tr>
        <th scope="col">id_venta</th>
        <th scope="col">Cliente</th>
        <th scope="col">Medio de Pago</th>
        <th scope="col">Total</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ventas as $venta) { ?>
      <tr>
        <td><strong><?php echo $venta['id_venta']; ?></strong></td>
        <?php $idventa = $venta['id_venta']; ?>
        <td><?php foreach($usuarios as $usuario){ if ($venta['id_cliente'] == $usuario['id_usuario']) { echo $usuario['apellido'];?>  <?php echo $usuario['nombre']; } }?></td>
        <td><?php foreach($mediopagos as $mediopago){ if ($venta['id_medioPago'] == $mediopago['id_medioPago']) { echo $mediopago['tipo']; } }?></td>
        <td>$ <?php echo number_format($venta['total'],2,',','.'); ?></td>
        <td><a href="<?php echo base_url('Venta_controller/activarVenta/'. $venta['id_venta']);?>" data-href="#" data-target="#modal-confirma" data-placement="top" title="Activar Registro" class="btn btn-danger"><i class="fa-solid fa-trash-can-arrow-up"></i></a></td>
      </tr>
          <?php } ?>
    </tbody>
  </table>
  </div>
</div>

