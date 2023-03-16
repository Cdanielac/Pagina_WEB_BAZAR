<?php 
$cart = \Config\Services::cart();
$session; 
$session = session(); ?>
<link href="<?php echo base_url ('public/css/quienesomos.css'); ?>" rel="stylesheet">
    <div class="container">
    <div class="image-fondo3">
      <h1 class="cabecera"><?php echo $titulo; ?></h1>
    </div>
    <img src="<?php echo base_url('public/img/background1.png'); ?>" class="img-fluid" style="width: 2000px;" alt="...";>
    <div style="font-size: calc(1em + 1vw)">
    <h3><strong>EMPRESA</strong></h1>
    <h5>IAR DECO&BAZAR</h5>
    <h5>Av. Libertad 5269, Corrientes, Argentina. (+54 9 3782561456 )</h5>
    <h5><strong>Venta n°: <?php echo $venta['id_venta'] ?></strong></h5>
    <br>
    <h3><strong>DATOS CLIENTE</strong></h1>
    <h5><strong>Nombre Y Apellido: </strong><?php echo $usuario['nombre'];?> <?php echo $usuario['apellido'];?></h5>
    <h5><strong>Teléfono: </strong><?php echo $usuario['telefono'];?></h5>
    <h5><strong>Dirección: </strong><?php echo $usuario['direccion'];?> - <?php echo $usuario['ciudad']?> - 
      <?php foreach ($provincias as $provincia){
        if($provincia['id_provincia'] == $usuario['id_provincia']) { echo $provincia['nombre']; } } ?></h5>
    <h5><strong>Medio de Pago: </strong><?php foreach ($mediopagos as $dato){
        if($dato['id_medioPago'] == $venta['id_medioPago']) { echo $dato['tipo']; } } ?></h5>
    </div>
    <br>
    <table class="table caption-top" id="tabla-productos" name="Productos" cellpadding="0" width="100%">
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
      <?php $i = 1; ?>
      <?php $total = 0; ?>
      <?php foreach($cart->contents() as $dato) { ?>
      <tr>
        <td><?php print_r($i); ?></td>
        <td><?php echo $dato['name']; ?></td>
        <td><?php echo $dato['qty']; ?></td>
        <td>$ <?php echo number_format($dato['price'],2,',','.'); ?></td>
        <td>$ <?php echo number_format($dato['subtotal'],2,',','.'); ?></td>
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
        <td>TOTAL$: <?php echo number_format($venta['total'],2,',','.'); ?></td>
      </tr>
      <tr>
      </tr>
    </tbody>
  </table>
  <div class="container">
            <table class="table-resposive">
            <tr>
            <th scope="col sm-2"><small class="nav-footer-copyright">Copyright ©&nbsp;2019-2022 IAR DECO&BAZAR</small></th>
            <th scope="col sm-2"><a class="nav-link" href="https://www.facebook.com/iardeco.bazar" target="_blank"><i class="fa-brands fa-facebook-square fa-2x"></i>Iar Deco&Bazar</a></th>
            <th scope="col sm-2"><a class="nav-link" href="https://www.instagram.com/iardeco.bazar/" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i> @iardeco.bazar</a></th>
            <th scope="col sm-2"><small class="nav-footer-primaryinfo">Av. Libertad 5269, Corrientes, Argentina. (+54 9 3782561456 )</small></th>
          </tr>
          </table>
        <br> 
        </div>
        </div>    
    </div>


