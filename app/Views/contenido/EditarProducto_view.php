
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h4 class="mt-4"><?php echo $titulo; ?></h4>

		</div>
	</main>
</div>

  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera">Editar Producto</h1>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>EDITAR PRODUCTO</span>
        </div>
      </div>
    </div>
  </div>


<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('actualizarProducto'); ?>"> 
<div class="container">
        <?php if(isset($validation)){ ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
          <?php } ?>
          <!--  if(isset($validaImagen)){ ?>
            <div class="alert-danger">
               = $validation->listErrors(); ?>
            </div>
          <? } ?> -->
          <!-- php if(isset($mensaje)) { ?>
            <div class="alert-danger">
              php echo $mensaje; ?>
            </div>
          php } ?> -->
          <?php csrf_field(); ?>

          <input type="hidden" id="id_producto" value="<?php echo $producto['id_producto']; ?>" name="id_producto">

      <div class="form-group">
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputEmail4" class="form-label">*Código de Producto</label>
          <div class="col-sm-15">
            <input type="text" disabled value="<?php echo $producto['cod_producto']; ?>" class="form-control form-control-lg" name="cod_producto" id="cod_producto" placeholder="" autofocus value="<?= set_value('cod_producto');?>">
          </div>
        </div>
        </div>
       <div class="image-fondo3">
        <div class="col-md-4">
          <label>*Categoría</label>
          </div>
          <select class="form-control" name= "categoria" id="categoria" value="<?= set_value('categoría');?>">
            <option value="">Seleccionar Categoria</option>
            <?php foreach ($categorias as $categoria){ ?>
            <option value="<?php echo $categoria['id_categoría']; ?>" <?php if($categoria['id_categoría'] == $producto['categoría']) { echo 'selected'; } ?>> <?php echo $categoria['nombre']; } ?> </option> 
            </select>
          </div>
          </div>
 <br>
 <br>
        <div class="form-group">
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Nombre</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $producto['nombre']; ?>" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="" value="<?=set_value('nombre');?>">
            </div>
        </div>
        </div>
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputEmail4" class="form-label">*Stock</label>
          <div class="col-sm-15">
            <input type="text" value="<?php echo $producto['stock']; ?>" class="form-control form-control-lg" name="stock" id="stock" placeholder="" value="<?= set_value('stock');?>">
          </div>
        </div>
        </div>
        </div>

        <div class="form-group">        
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Precio por unidad</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $producto['precio_unidad']; ?>" class="form-control form-control-lg" name="precio_unidad" id="precio_unidad" placeholder="0,00" value="<?=set_value('precio_unidad');?>">
            </div>
        </div>
        </div>
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Descripción</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $producto['descripcion']; ?>" class="form-control form-control-lg" name="descripcion" id="descripcion" placeholder="..." value="<?=set_value('descripcion');?>">
            </div>
        </div>
        </div>
        </div>
        <div class="container">
        <img src="<?php echo base_url('public/img/productos/'.$producto['img_producto']); ?>" alt="" height="100" width="100"></div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="formFileLg" class="form-label">*Imagen de Producto</label>
          <input class="form-control form-control-lg" value="<?php echo $producto['img_producto']; ?>" id="img_producto" name="img_producto" type="file" value="<?=set_value('img_producto');?>" >
      </div>
      </div>
  

  <div class="col-12">
  	<a href="<?php echo base_url('tablaProductos');?>" class="btn btn-warning">VOLVER</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
  </div>

  </div>
</form> 