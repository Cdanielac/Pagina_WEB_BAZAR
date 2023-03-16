<section>
  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera"><?php echo $titulo ?></h1>
    </div>
	<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>CONTACTO</span>
        </div>
      </div>
    </div>
  </div>
      <div class ="container">


          <article>
             <?php if(isset($mensaje)) { ?>
            <div class="alert alert-success" style="font-size:1em">
              <?php echo $mensaje; ?>
            </div>
      <?php } ?>
            <br>
            <br>
            <p class="p1">Podes comunicarte con nosotros a través de nuestras Redes sociales:</p>
          <div class="p-3 border bg-light">
          <div class="row align-items-center"> 
            <br>
            <br>
            <div class="col p-2 d-light border">
              <div class="info-slide">
                <div class="mx-auto p3"> 
                <div class="img-container">
                  <a class="nav-link" href="https://api.whatsapp.com/message/RSHRNRXLVWNIG1?autoload=1&app_absent=0" target="_blank"><i class="fa-brands fa-whatsapp-square fa-2x"></i> +54 9 3782561456</a>
                </div>
              </div>
                </div>
            </div>

            <div class="col p-2 d-light border">
              <div class="info-slide"> 
                <div class="mx-auto p3">
                <div class="img-container">
                <div>
                  <a class="nav-link" href="https://www.facebook.com/iardeco.bazar" target="_blank"><i class="fa-brands fa-facebook-square fa-2x"></i> IAR Deco&Bazar</a>
                </div>
                </div>
                </div>
            </div>
            </div>

            <div class="col p-2 d-light border">
              <div class="info-slide">
                <div class="mx-auto p3">
                <div class="img-container">
                <a class="nav-link" href="https://www.instagram.com/iardeco.bazar/" target="_blank"><i class="fa-brands fa-instagram fa-2x" style="color: dark;"></i> @iardeco.bazar</a>
                </div>
                </div> 
                 </div>         
            </div>
          </div>
          </div>
          <div>
            <br>
            <br>
          <p class="p1">Para una atención más personalizada por favor completá el formulario de abajo y te estaremos respondiendo a la brevedad.</p> 
            <br>
            <br>
          </div>
        </article>

        <?php if(isset($validation)){?>
            <div class="alert alert-danger">
              <?= $validation->listErrors(); ?>
            </div>
          <?php } ?>


          <form  class="row g-3" method="POST" action="<?php echo base_url('registro_consulta'); ?>" autocomplete="off">
        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">  Nombre</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "nombre" id="nombre" placeholder="" value="<?=set_value('nombre');?>">
            </div>
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">  Apellido</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "apellido" id="apellido" placeholder="" value="<?=set_value('apellido');?>">
            </div>
        </div>
        </div>

        <div class="image-fondo3">
        <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"> Ingrese su Email</label>
          <div class="col-sm-15">
            <input type="email" class="form-control form-control-lg" name= "email" id="email" placeholder="name@example.com" value="<?= set_value('email');?>">
          </div>
        </div>
        </div>

        <div class="image-fondo3">
         <div class="mb-5">
          <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"> Motivo</label>
            <div class="col-sm-15">
              <input type="text" class="form-control form-control-lg" name= "motivo" id="motivo" placeholder="" value="<?= set_value('motivo');?>">
            </div>
        </div>
        </div>

        <div class="image-fondo3">
      <div class="mb-5">
        <label for="mensajeDeContacto" class="col-sm-2 col-form-label col-form-label-lg"> Deje su consulta</label>
       <textarea class="form-control" name= "texto_consulta" id="texto_consulta" rows="3" value="<?= set_value('texto_consulta');?>"></textarea>
      </div>
      </div>

      <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary" type="submit">EVIAR</button>
      </div>
      </form></div>

        <br>
            <br>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="container-fluid" >
              <div class="carousel-inner" style="font-weight: 100;line-height: 1.5; margin: 0; font-size: 2em;" align="center">
                <div class="carousel-item active">
                  <p>¡Gracias por comunicarte con nosotros!</p>
                </div>
                <div class="carousel-item">
                  <p>¡Gracias por comunicarte con nosotros!</p>
                </div>
              </div>
          </div> 

</section>