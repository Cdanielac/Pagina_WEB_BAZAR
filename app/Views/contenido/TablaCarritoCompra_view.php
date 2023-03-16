<?php 
$cart = \Config\Services::cart();
$perfil_sesion;
$perfil_sesion = session('perfil_id'); 
$id_usuario;
$id_usuario = session('id_usuario');
$i = 1;
$total = 0; ?>

<div class="container">
    <a href="<?php echo base_url ('catalogoProductos'); ?>" class="btn btn-info">Seguir Comprando</a>
</div>

<form action="<?php echo base_url('actualizarCarrito'); ?>" method="post">
<div class="container"> 
  <div class="table-resposive">
  <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
    <caption>Lista de Productos</caption>
    <thead class="table-dark">
      <tr>
        <th scope="col">N° Item</th>
        <th scope="col">Nombre</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio/unidad</th>
        <th scope="col">SubTotal</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($cart->contents() as $dato) { ?>
        <input type="hidden" name="<? echo $dato['rowid']; ?>" value="<? echo $dato['rowid']; ?>">
        <input type="hidden" name="id_producto" value="<? echo $dato['id']; ?>">
      <tr>
        <td><?php print_r($i); ?></td>
        <td><?php echo $dato['name']; ?></td>
        <td><?php echo $dato['qty']; ?></td>
        <td>$ <?php echo number_format($dato['price'],2,',','.'); ?></td>
        <td>$ <?php echo number_format($dato['subtotal'],2,',','.'); ?></td>
        <td><a href="<?php echo base_url('Carrito_controller/eliminarItem/'. $dato['rowid']);?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
        <td></td>
      </tr>
      <?php $total = $total + $dato['subtotal'];
        $i++; 
      } ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>TOTAL$: <?php echo number_format($total,2,',','.');?></td>
        <td><a href="<?php echo base_url('vaciarCarrito'); ?>" class="btn btn-danger">vaciar carrito</a></td>
      </tr>
      <?php if($total > 0){ ?>
      <tr>    
        <td>
      <a href="<?php echo base_url ('finalizarCompra'); ?>" class="btn btn-danger">Finalizar Compra</a>
       </td>
      </tr> <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</form>



<!-- <div class="modal fade" name="modal-confirma" id="modal-confirma" tabindex="-1" role="dialog" aria-labelleby="exampleModalLabel" aria-hidden="true">
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
        <a class="btn btn-primary btn-ok">Sí</a>
      </div>
    </div>
  </div>
</div> -->
    <!-- <script>
      $(document).ready(function(){
        $("#btn btn-danger").click(function(){
          $("#modal-confirma").modal("show");
        });
        $("#modal-confirma").on('shown.bs.modal', function(e){
           $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      });
      </script> -->
