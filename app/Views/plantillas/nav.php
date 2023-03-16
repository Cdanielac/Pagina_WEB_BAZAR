<body>
    <div class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">IAR Deco&Bazar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url ('quienesomos'); ?>">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo base_url ('catalogoProductos'); ?>">Productos</a>
        </li>


        <?php $perfil_sesion; ?>
        <?php $perfil_sesion = session('perfil_id') ?>
        <?php $id_usuario; ?>
        <?php $id_usuario = session('id_usuario') ?>
        <?php if(session('login') && $perfil_sesion == 1){ ?> <!-- Admin -->
                <li class="navbar-nav  nav-item dropdown mb-2 mb-lg-0">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Registros
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="<?php echo base_url ('tablaUsuarios'); ?>">Usuarios</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url ('tablaProductos'); ?>">Productos</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url ('tablaConsultas'); ?>">Consultas</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url ('tablaVentas'); ?>">Ventas</a></li>
                </ul>
                </li>
                </ul>

                <li class="navbar-nav  nav-item dropdown mb-2 mb-lg-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo session('nombre');?><i class="fa-regular fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarScrollingDropdown">
                <li>
                  <form method="POST" action="<?php echo base_url('modificarUsuarioAd'); ?>">
                      <input type="hidden" id="id_usuario" value="<?php echo $id_usuario; ?>" name="id_usuario">
                    <button class="dropdown-item">Modificar Perfil</button></form>
                </li>
                <li><a class="dropdown-item" href="<?php echo base_url ('Usuario_Controller/cerrarSesion'); ?>">Cerrar Sesión</a></li>
              </ul>
              </li>
                
        <?php } else if (session('login') && $perfil_sesion == 2){ ?> <!-- Usuario -->
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url ('comercializacion'); ?>">Comercialización</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url ('contacto'); ?>">Contacto</a></li>
                <li class="nav-item" >
                <a class="nav-link active" href="<?php echo base_url ('carrito'); ?>">Ver Carrito</a></li>
            </ul>

                <form class="d-flex" method="POST" action="<?php echo base_url('buscarProductos'); ?>" autocomplete="off">
                  <input class="form-control me-2" type="search" name="idCategoria" placeholder="n° Categoría (1/2/3)" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>

                <li class="navbar-nav  nav-item dropdown mb-2 mb-lg-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo session('nombre');?> <i class="fa-regular fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarScrollingDropdown" align="center">
                <li>
                  <form method="POST" action="<?php echo base_url('modificarUsuario'); ?>">
                      <input type="hidden" id="id_usuario" value="<?php echo $id_usuario; ?>" name="id_usuario">
                    <button class="dropdown-item">Modificar Perfil</button></form>
                </li>
                <li><a class="dropdown-item" href="<?php echo base_url ('Usuario_Controller/cerrarSesion'); ?>">Cerrar Sesión</a></li>
              </ul>
              </li>

        <?php } else{ ?> <!-- Visita -->
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url ('comercializacion'); ?>">Comercialización</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url ('contacto'); ?>">Contacto</a></li>
            </ul>

             <li class="navbar-nav  nav-item dropdown mb-2 mb-lg-0">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-user"></i>
              </a>
        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarScrollingDropdown">
        <li><a class="dropdown-item" href="<?php echo base_url ('login'); ?>">Iniciar Sesión</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url ('crearcuenta'); ?>">Registrarse</a></li>
        </ul>
              </li>
        <?php } ?>

    </div>
  </div>
</nav>
</div>

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<div class="container-fluid" >
    <div class="carousel-inner" style="font-weight: 100;line-height: 1.5; margin: 0; font-size: 2em;" align="center">
      <div class="carousel-item active">
        <p><i class="fa-solid fa-truck-fast"></i>Envios gratis en compras superiores a $2000</p>
      </div>
      <div class="carousel-item">
        <p><i class="fa-solid fa-heart"></i>¡Gracias por elegirnos!<i class="fa-solid fa-heart"></i></p>
      </div>
    </div>
</div>     
</div>