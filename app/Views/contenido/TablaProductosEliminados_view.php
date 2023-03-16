<section>
  <div class="image-fondo">
    <link href="<?php echo base_url ('public/css/productosycomercializacion.css'); ?>" rel="stylesheet">
    <h1 class="cabecera"><?php echo $titulo ?></h1>
  </div>
<div class="container">
  <div class="table-resposive">
  <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
    <caption>Lista de Productos Eliminados</caption>
    <thead class="table-dark">
      <tr>
        <th scope="col">id_producto</th>
        <th scope="col">Categoría</th>
        <th scope="col">Nombre</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio/unidad</th>
        <th scope="col">Imagen</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos as $dato) { ?>
      <tr>
        <td><?php echo $dato['id_producto']; ?></td>
        <td><?php foreach($categorias as $categoria) { if($categoria['id_categoría'] == $dato['categoría'] ) { echo $categoria['nombre']; } } ?></td>
        <td><?php echo $dato['nombre']; ?></td>
        <td><?php echo $dato['stock']; ?></td>
        <td>$ <?php echo $dato['precio_unidad']; ?></td>
        <td><div class="container">
        <img src="<?php echo base_url('public/img/productos/'.$dato['img_producto']); ?>" alt="" height="100" width="100"></div></td>

        <td><a href="<?php echo base_url('Producto_controller/activarProducto/'. $dato['id_producto']);?>" data-href="<?php echo base_url('Producto_controller/activar/'. $dato['id_producto']);?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Activar Registro" class="btn btn-danger"><i class="fa-solid fa-trash-can-arrow-up"></i></a></td>
      </tr>

      <?php } ?>
    </tbody>
  </table>
  </div>
  </div>

  <div class="container">
    <a href="<?php echo base_url('tablaProductos');?>" class="btn btn-warning">VOLVER</a>
  </div>

</section>