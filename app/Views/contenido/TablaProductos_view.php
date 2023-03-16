<section>
  <div class="image-fondo">
    <link href="<?php echo base_url ('public/css/productosycomercializacion.css'); ?>" rel="stylesheet">
    <h1 class="cabecera"><?php echo $titulo ?></h1>
  </div>

  <div class="container">
    <a href="<?php echo base_url('nuevoProducto');?>" class="btn btn-info">AGREGAR</a>
    <a href="<?php echo base_url('tablaProductosEliminados');?>" class="btn btn-danger">ELIMINADOS</a>
</div>
          <div class="container">
          <?php if(isset($mensaje)) { ?>
            <div class="alert alert-success">
              <?php echo $mensaje; ?>
            </div>
          <?php } ?>
          </div>
  <div class="container table-resposive">
  <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
    <caption>Lista de Productos</caption>
    <thead class="table-dark">
      <tr>
        <th scope="col">cod_producto</th>
        <th scope="col">Categoría</th>
        <th scope="col">Nombre</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio/unidad</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Imagen</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos as $dato) { ?>
      <tr>
        <td><?php echo $dato['cod_producto']; ?></td>
        <td><?php foreach($categorias as $categoria) { if($categoria['id_categoría'] == $dato['categoría'] ) { echo $categoria['nombre']; } } ?></td>
        <td><?php echo $dato['nombre']; ?></td>
        <td><?php echo $dato['stock']; ?></td>
        <td>$ <?php echo number_format($dato['precio_unidad'],2,',','.'); ?></td>
        <td><?php echo $dato['descripcion']; ?></td>
        <td><div class="container">
        <img src="<?php echo base_url('public/img/productos/'.$dato['img_producto']); ?>" alt="" height="100" width="100"></div></td>

        <td>
          <form method="POST" action="<?php echo base_url('editarProducto');?>">
          <input type="hidden" id="id_producto" value="<?php echo $dato['id_producto']; ?>" name="id_producto">
          <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button>
        </form>
        </td>

        <td><a href="<?php echo base_url('Producto_controller/eliminarProducto/'. $dato['id_producto']);?>" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
      </tr>
   <?php } ?>
    </tbody>
  </table>
  </div>


</section>