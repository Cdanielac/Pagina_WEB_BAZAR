<section>
  <div class="image-fondo1">
    <link href="<?php echo base_url ('public/css/productosycomercializacion.css'); ?>" rel="stylesheet">
    <h1 class="cabecera"><?php echo $titulo ?></h1>
  </div>
<div class="container">
  <div class="table-resposive">
  <table class="table caption-top" id="tabla-usuarios" name="Usuarios" cellpadding="0" width="100%">
    <caption>Lista de Usuarios Eliminados</caption>
    <thead class="table-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Usuario</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Provincia</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Dirección</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos as $dato) { ?>
      <tr>
        <td><?php echo $dato['id_usuario']; ?></td>
        <td><?php echo $dato['nombre']; ?></td>
        <td><?php echo $dato['apellido']; ?></td>
        <td><?php echo $dato['email']; ?></td>
        <td><?php echo $dato['usuario']; ?></td>
        <td><?php echo $dato['telefono']; ?></td>
        <td><?php foreach($provincias as $provincia) { if($provincia['id_provincia'] == $dato['id_provincia'] ) { echo $provincia['nombre']; } } ?></td>
        <td><?php echo $dato['ciudad']; ?></td>
        <td><?php echo $dato['direccion']; ?></td>

        <td><a href="<?php echo base_url('Usuario_controller/activarUsuario/'. $dato['id_usuario']);?>" type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can-arrow-up"></i></a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  </div>

    <div class="container">
    <a href="<?php echo base_url();?>/Admin_controller/verUsuarios" class="btn btn-primary">VOLVER</a>
  </div>

</section>