<section>
  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera"><?php echo $titulo ?></h1>
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


          <!-- <php echo form_open('registro_usuario') ?> -->
<div class="container" align="center">
<form  class="row g-3" method="POST" action="<?php echo base_url(); ?>/Usuario_controller/registrar_usuario" autocomplete="off"> 


        <div class="col-md-4 image-fondo5">
          <label for="inputName" class="form-label">*Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="<?=set_value('nombre');?>">
        </div>

        <div class="col-md-4 image-fondo5">
          <label for="inputName" class="form-label">*Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="<?=set_value('apellido');?>">
        </div>

         <div class="col-md-4 image-fondo5">
          <label for="colFormLabel" class="form-label">*Usuario</label>
              <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" value="<?=set_value('usuario');?>">
        </div>

        <div class="col-md-6 image-fondo5">
          <label for="inputEmail4" class="form-label">*Ingrese su Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?= set_value('email');?>">
        </div>

        <div class="col-md-6 image-fondo5">
          <label for="inputPassword4" class="form-label">*Contraseña</label>
         <input type="password" class="form-control" name="pass" id="pass" value="<?=set_value('pass');?>">
        </div>

        <div class="col-md-6 image-fondo5">
          <label for="colFormLabelLg" class="form-label">Teléfono</label>
              <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" value="<?=set_value('telefono');?>">
        </div>

  <div class="col-md-6 image-fondo5">
    <label for="inputCity" class="form-label">Ciudad</label>
    <input type="text" class="form-control" name="ciudad" id="ciudad">
  </div>

        <div class="col-md-12 image-fondo5">
          <label class="form-label">Provincia</label>
          <select class="form-select" multiple aria-label="multiple select example" name= "provincia" id="provincia" value="<?= set_value('provincia');?>">
            <option value="">Seleccionar Provincia</option>
            <?php foreach ($provincias as $provincia){ ?>
            <option value="<?php echo $provincia['id_provincia']; ?>"><?php echo $provincia['id_provincia']; ?> - <?php echo $provincia['nombre']; } ?> </option> 
            </select>
        </div>

  <div class="col-md-12 image-fondo5">
    <label for="inputCity" class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion" id="direccion">
  </div>

  <div class="col-md-12 form-check" align="left">
    <input type="checkbox" class="form-check-input" name="checkboxn" id="checkboxn">
    <label class="form-check-label" for="exampleCheck1">*Acepto Términos y Condiciones</label>
    <a class="nav-link" href="<?php echo base_url ('terminosycondiciones'); ?>" target="_blank">Leer Términos y Condiciones</a>
  </div>

 

  <div class="col-md-12">
    <button type="submit" class="btn btn-primary">REGISTRARME</button>
  </div>

        </div>
  </div>
 
</form>
</div>
</section>