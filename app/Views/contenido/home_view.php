<section>
  <link href="<?php echo base_url ('public/css/home.css'); ?>" rel="stylesheet">
  <div>
  <img src="<?php echo base_url('public/img/background1.png'); ?>" class="img-fluid" style="width: 2000px;" alt="...";>
</div>
      
      <div class="container">
       <?php if(isset($mensaje)) { ?>
            <div class="alert alert-success" style="font-size:1em">
              <?php echo $mensaje; ?>
            </div>
      <?php } ?>
      </div>

<div class="container">
<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url('public/img/vasos2.jpg'); ?>" class="d-block w-100" style="height: 90vh; " alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('public/img/azucarero.jpg'); ?>" class="d-block w-100" style="height: 90vh;" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('public/img/mates.jpg'); ?>" class="d-block w-100" style="height: 90vh;" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>

<br><br>
<div class="container">
  <div class="">
    <h1 class="cabecera" style="font-size: calc(1em + 1vw)">Somos todo lo que necesitas para tu tiempo libre o home office</h1>
  </div>

  <div  class="container" style="object-position: center;">
     <div class="card mb-2" >
    <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="<?php echo base_url('public/img/CatalogoProductos/home3.png'); ?>" class="card-img-top" style="max-width: 600px;">
      <div class="card-body" align="center">
        <h5 class="card-title">SABIAS QUE...</h5>
        <p class="card-text">En nuestra tienda tenemos todo lo que necesitas para disfrutar de un buen mate. <i class="fa-solid fa-face-surprise"></i> ¡No podes quedarte atrás!</p>
        <a href="<?php echo base_url ('catalogoProductos'); ?>" class="btn btn-primary btn-lg active" tabindex="-1" role="button" aria-disabled="false">COMPRAR</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="<?php echo base_url('public/img/CatalogoProductos/home2.png'); ?>" class="card-img-top" style="max-width: 600px;">
      <div class="card-body" align="center">
        <h5 class="card-title">SABIAS QUE...</h5>
        <p class="card-text">Podes seguirnos en nuestras Redes Sociales para estar al tanto de los nuevos ingresos y las últimas novedades.</p>
        <a href="<?php echo base_url ('contacto'); ?>" class="btn btn-primary btn-lg active" tabindex="-1" role="button" aria-disabled="false">SEGUIR</a>
      </div>
    </div>
  </div>
   </div>
   </div>
  </div>
</div>

<div class="container" align="center"><img src="<?php echo base_url('public/img/logo.jpg'); ?>" style="max-width: 540px;"></div>

</section>
 
