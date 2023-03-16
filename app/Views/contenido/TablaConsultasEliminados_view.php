<section>
  <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera"><?php echo $titulo ?></h1>
    </div>
<div class="container">
  <div class="table-resposive">
  <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
    <caption>Lista de Consultas Eliminadas</caption>
    <thead class="table-dark">
      <tr>
       <th scope="col">id_consulta</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Motivo</th>
        <th scope="col">Consulta</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos as $dato) { ?>
      <tr>
        <td><?php echo $dato['id_consulta']; ?></td>
        <td><?php echo $dato['nombre']; ?></td>
        <td><?php echo $dato['apellido']; ?></td>
        <td><?php echo $dato['email']; ?></td>
        <td><?php echo $dato['motivo']; ?></td>
        <td><?php echo $dato['texto_consulta']; ?></td>

        <td><a href="<?php echo base_url('Consulta_controller/activarConsulta/'. $dato['id_consulta']);?>" data-href="#" data-target="#modal-confirma" data-placement="top" title="Activar Registro" class="btn btn-danger"><i class="fa-solid fa-trash-can-arrow-up"></i></a></td>
      </tr>

      <?php } ?>
    </tbody>
  </table>
  </div>
  </div>

  <div class="container">
    <a href="<?php echo base_url('tablaConsultas');?>" class="btn btn-primary">VOLVER</a>
  </div>


</section>