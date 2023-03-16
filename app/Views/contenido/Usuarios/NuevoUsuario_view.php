<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h4 class="mt-4"><?php echo $titulo; ?></h4>

			<?php if(isset($validation)){?>
            <div class="alert-danger">
              <?= $validation->listErrors(); ?>
            </div>
          <?php } ?>

		</div>
	</main>
</div>

<section>
  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera">CREAR CUENTA DE USUARIO</h1>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>NUEVO USUARIO</span>
        </div>
      </div>
    </div>
  </div>

<div class="container">
        <?php if(isset($validation)){?>
            <div class="alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
          <?php } ?>

          <?php echo form_open('nuevoUsuario') ?>

  <div class="col-md-6">
    <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Nombre</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "nombre" id="nombre" placeholder="" value="<?=set_value('nombre');?>">
            </div>
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Apellido</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "apellido" id="apellido" placeholder="" value="<?=set_value('apellido');?>">
            </div>
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputEmail4" class="form-label">*Ingrese Email</label>
          <div class="col-sm-15">
            <input type="email" class="form-control form-control-lg" name= "email" id="email" placeholder="name@example.com" value="<?= set_value('email');?>">
          </div>
        </div>
        </div>

            <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">*Usuario</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "usuario" id="usuario" placeholder="" value="<?=set_value('usuario');?>">
            </div>
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="inputPassword4" class="form-label">*Contraseña</label>
         <input type="password" class="form-control" name = "contraseña" id="inputPassword4" value="<?=set_value('contraseña');?>">
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Teléfono</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "telefono" id="telefono" placeholder="" value="<?=set_value('telefono');?>">
            </div>
        </div>
        </div>

  <div class="image-fondo3">
  <div class="col-md-4">
    <label for="inputState" class="form-label">Provincia</label>
    </div>
    <select id="inputState" class="form-select">
      <option selected>Seleccionar</option>
      <option>Buenos Aires</option>
      <option>Ciudad Autónoma de Buenos Aires</option>
      <option>Catamarca</option>
      <option>Chaco</option>
      <option>Chubut</option>
      <option>Córdoba</option>
      <option>Corrientes</option>
      <option>Entre Ríos</option>
      <option>Formosa</option>
      <option>Jujuy</option>
      <option>La Pampa</option>
      <option>La Rioja</option>
      <option>Mendoza</option>
      <option>Misiones</option>
      <option>Neuquén</option>
      <option>Río Negro</option>
      <option>Salta</option>
      <option>San Juan</option>
      <option>San Luís</option>
      <option>Santa Cruz</option>
      <option>Santa Fe</option>
      <option>Santiago del  Estero</option>
      <option>Tierra del Fuego, Antátida e Islas de Atlántico Sur</option>
      <option>Tucumán</option>
    </select>
  </div>
  
  <div class="image-fondo3">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ciudad</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
</div>

  <div class="image-fondo3">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
</div>


  <div class="col-12">
  	<a href="<?php echo base_url();?>/Usuario(admin)_view" class="btn btn-primaryy">VOLVER</a>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
  </div>

        </div>
  </div>
 
</form>
</div>
</section>