<section>
  <link href="<?php echo base_url ('public/css/productosycomercializacion.css'); ?>" rel="stylesheet">
  <div class="image-fondo">
    <h1 class="cabecera"><?php echo $titulo ?></h1>
  </div>
  
  <br> 
  <div class="container" style="bg-dark">
      <div class="row">
        <div class="col-xs-12">
          <div class="breadcrumbs">
            <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span>PRODUCTOS</span>
          </div>
        </div>
      </div>
      <br> 
             <?php if(isset($mensaje)) { ?>
            <div class="alert alert-danger" style="font-size:1em">
              <?php echo $mensaje; ?>
            </div>
            <?php } ?>

  <?php $perfil_sesion; ?>
  <?php $perfil_sesion = session('perfil_id'); ?>
  
<div class="container">

  <div class="form-floating">
  <form class="d-flex" method="POST" action="<?php echo base_url('buscarProductos'); ?>" autocomplete="off">
      <label for="floatingSelect">Buscar por Categoria</label>
  <select class="form-select" id="floatingSelect" name="idCategoria" aria-label="Floating label select example">
    <option value="">Seleccione Categoría</option>
        <?php foreach ($categorias as $categoria){ ?>
    <option value="<?php echo $categoria['id_categoría']; ?>"><?php echo $categoria['id_categoría']; ?> - <?php echo $categoria['nombre'];} ?> </option>
  </select>
  <button class="btn btn-primary" type="submit">Buscar</button>
</div>
<br>

<div class="row row-cols-2 row-cols-md-3 g-4">
   <?php foreach($datos as $dato) { ?>
    <?php if($dato['stock'] > 0){ ?>
  <div class="col">
    <div class="card" >
      <img src="<?php echo base_url('public/img/productos/'.$dato['img_producto']); ?>" class="card-img-top" alt="" height-max="100" width-max="100">
        <div class="card-body" align="center">
        <h5 class="card-title"><?php echo $dato['nombre']; ?></h5>
        <p>$ <?php echo number_format($dato['precio_unidad'],2,',','.'); ?></p>
        <p class="card-text"><?php echo $dato['descripcion']; ?></p>
             
        <?php if(session('login') && $perfil_sesion == 2){ 
        echo form_open('Carrito_Controller/agregarItem'); 
        echo form_hidden('id_producto', $dato['id_producto']); 
        echo form_hidden('nombre', $dato['nombre']); 
        echo form_hidden('precio_unidad', $dato['precio_unidad']); 
        echo form_submit('comprar','Agregar a carrito', "class='btn btn-success'");  
        echo form_close(); } ?>
        
      </div>
    </div>
  </div>
  <?php } ?>
  <?php }//cierrra foreach ?>

</div>
</div>
</section>