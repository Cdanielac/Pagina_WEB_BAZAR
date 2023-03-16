<section>

<link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera">INICIAR SESIÓN</h1>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>INICIAR SESIÓN</span>
        </div>
      </div>
    </div>
  </div>


    <form method="POST" action="<?php echo base_url(); ?>/Usuario_controller/valida">
      <div class="container">

  <?php if(isset($mensaje)) { ?>
            <div class="alert alert-success" style="font-size:1em">
              <?php echo $mensaje; ?>
            </div>
      <?php } ?>
        <?php if(isset($error)) { ?>
            <div class="alert alert-danger" style="font-size:1em">
              <?php echo $error; ?>
            </div>
      <?php } ?>
      
    <div class="mb-3">
      <label for="exampleDropdownFormEmail1" class="form-label">Ingrese su Email</label>
      <input type="email" class="form-control" name ="email" id="email" placeholder="email@example.com" value="<?= set_value('email');?>">
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword1" class="form-label">Contraseña</label>
      <input type="password" class="form-control" name ="pass" id="pass" placeholder="Ingrese Contraseña" value="<?= set_value('pass');?>">
    </div>
    <div class="mb-3">
    </div>
    <button type="submit" class="btn btn-primary">INGRESAR</button>
      <?php if(isset($validation)) { ?>
            <div class="alert-danger">
              <?php echo $validation->listErrors(); ?>
            </div>
      <?php } ?>

  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="<?php echo base_url ('Usuario_Controller/nuevoUsuario'); ?>">  ¿Es nuevo por aquí? Registrarse</a>
</div>
</section>