<section>
  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera"><?php echo $titulo; ?></h1>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>REGISTRARSE</span>
        </div>
      </div>
    </div>
  </div>

      <div class="container">
        <?php if(isset($validation)){?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php } ?>
      </div>
        <?php csrf_field(); ?>



          <!-- <php echo form_open('registro_usuario') ?> -->
<div class="container" align="center">
<form method="POST" action="<?php echo base_url('actualizarUsuarioAd'); ?>" autocomplete="off"> 

  <input type="hidden" id="id_usuario" value="<?php echo $usuario['id_usuario']; ?>" name="id_usuario">

  <div class="form-group mb-3">
    <div class="image-fondo3">
        <div class="mb-3">
          <label for="colFormLabelLg" class=" col-form-label col-form-label-lg">*Nombre</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $usuario['nombre']; ?>" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="" value="<?=set_value('nombre');?>">
            </div>
        </div>
        </div>

 <div class="image-fondo3">
        <div class="mb-3">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Apellido</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $usuario['apellido']; ?>" class="form-control form-control-lg" name="apellido" id="apellido" placeholder="" value="<?=set_value('apellido');?>">
            </div>
        </div>
        </div>
      </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputEmail4" class="col-sm-2 col-form-label col-form-label-lg">*Ingrese su Email</label>
          <div class="col-sm-15">
            <input type="email" value="<?php echo $usuario['email']; ?>" class="form-control form-control-lg" name="email" id="email" placeholder="name@example.com" value="<?= set_value('email');?>" disabled>
          </div>
        </div>
        </div>

            <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Usuario</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $usuario['usuario']; ?>" class="form-control form-control-lg" name="usuario" id="usuario" placeholder="" value="<?=set_value('usuario');?>" disabled>
            </div>
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Teléfono</label>
            <div class="col-sm-15">
              <input type="text" value="<?php echo $usuario['telefono']; ?>" class="form-control form-control-lg" name="telefono" id="telefono" placeholder="" value="<?=set_value('telefono');?>">
            </div>
        </div>
        </div>

  <div class="image-fondo3">
        <div class="mb-5">
          <label class="col-sm-2 col-form-label col-form-label-lg">*Provincia</label>
            <select class="form-control" multiple aria-label="multiple select example" name="provincia" id="provincia" value="<?= set_value('provincia');?>">
            <option value="">Seleccionar Provincia</option>
            <?php foreach ($provincias as $provincia){ ?>
            <option value="<?php echo $provincia['id_provincia']; ?>" <?php if($provincia['id_provincia'] == $usuario['id_provincia']) { echo 'selected'; } ?>> <?php echo $provincia['nombre']; } ?> </option> 
            </select>
          </div>
          </div>
  <br>
  <div class="image-fondo3">
  <div class="mb-5">
    <label for="inputCity" class="col-sm-2 col-form-label col-form-label-lg">Ciudad</label>
    <input type="text" value="<?php echo $usuario['ciudad']; ?>" class="form-control" name="ciudad" id="ciudad">
  </div>
</div>

  <div class="image-fondo3">
  <div class="mb-5">
    <label for="inputCity" class="col-sm-2 col-form-label col-form-label-lg">Dirección</label>
    <input type="text" value="<?php echo $usuario['direccion']; ?>" class="form-control" name="direccion" id="direccion">
  </div>
</div>

  <div class="mb-5">
    <a href="<?php echo base_url('/');?>" class="btn btn-warning">VOLVER</a>
    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
  </div>

        </div>
  </div>
 
</form>
</div>
</section>