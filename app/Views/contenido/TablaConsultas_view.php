<section>
    <link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="image-fondo3">
      <h1 class="cabecera"><?php echo $titulo ?></h1>
    </div>
    <div class="container">
    <a href="<?php echo base_url('tablaConsultasEliminados');?>" class="btn btn-danger">ELIMINADOS</a>
</div>

<div class="container">
  <div class="table-resposive">
  <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
    <caption>Lista de Productos</caption>
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
        <td><a href="#"class="btn btn-warning">Reponder</a></td>

        <td><a href="<?php echo base_url('Consulta_controller/eliminarConsulta/'. $dato['id_consulta']);?>" data-href="<?php echo base_url().'/contenido/EliminarProducto_view'; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar Registro" class="btn btn-danger">Eliminar</a></td>
      </tr>

      <?php } ?>
    </tbody>
  </table>
  </div>
  </div>

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelleby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eiminar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea eliminar este registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
        <a class="btn btn-danger btn-ok">Si</a>
      </div>
    </div>
  </div>
</div>


</section>