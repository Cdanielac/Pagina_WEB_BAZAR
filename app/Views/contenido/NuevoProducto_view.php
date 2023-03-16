
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h4 class="mt-4"><?php echo $titulo; ?></h4>

		</div>
	</main>
</div>

  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera">Agregar Producto</h1>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>NUEVO PRODUCTO</span>
        </div>
      </div>
    </div>
  </div>

<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('registrarProducto'); ?>" autocomplete="off"> 

<!-- php echo form_open_multipart ('registrar_producto') ?> -->

<div class="container">
        <?php if(isset($validation)){ ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
          <?php } ?>

          <?php csrf_field(); ?>

      <div class="form-group">
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputEmail4" class="form-label">*Código de Producto</label>
          <div class="col-sm-15">
            <input type="text" class="form-control form-control-lg" name="cod_producto" id="cod_producto" placeholder="" autofocus value="<?= set_value('cod_producto');?>">
          </div>
        </div>
        </div>
       <div class="image-fondo3">
        <div class="col-md-4">
          <label>*Categoría</label>
          </div>
          <select class="form-control" name="categoria" id="categoria" value="<?= set_value('categoria');?>">
            <option value="">Seleccionar Categoría</option>
            <?php foreach ($categorias as $categoria){ ?>
            <option value="<?php echo $categoria['id_categoría']; ?>"><?php echo $categoria['id_categoría']; ?> - <?php echo $categoria['nombre']; } ?> </option> 
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
              <input type="text" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="" value="<?=set_value('nombre');?>">
            </div>
        </div>
        </div>
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputEmail4" class="form-label">*Stock</label>
          <div class="col-sm-15">
            <input type="text" class="form-control form-control-lg" name="stock" id="stock" placeholder="" value="<?= set_value('stock');?>">
          </div>
        </div>
        </div>
        </div>

        <div class="form-group">        
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Precio por unidad</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name="precio_unidad" id="precio_unidad" placeholder="0,00" value="<?=set_value('precio_unidad');?>">
            </div>
        </div>
        </div>
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Descripción</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name="descripcion" id="descripcion" placeholder="..." value="<?=set_value('descripcion');?>">
            </div>
        </div>
        </div>
        </div>


       <div class="image-fondo3">
        <div class="mb-5">
          <label for="formFileLg" class="form-label">*Imagen de Producto</label>
          <input class="form-control form-control-lg" accept="image/png" id="img_producto" name="img_producto" type="file" value="<?=set_value('img_producto');?>">
      </div>
      </div>
  

  <div class="col-12">
  	<a href="<?php echo base_url('tablaProductos');?>" class="btn btn-warning">VOLVER</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
  </div>

  </div>
</form> 

