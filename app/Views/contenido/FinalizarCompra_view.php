<?php 
$cart = \Config\Services::cart(); 
$idUsuario = session('id_usuario');?>

<div class="container">
  <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <a href="<?php echo base_url ('/'); ?>"><i class="fa-solid fa-house"></i></a>  »  <span><?php echo $titulo ?></span>
        </div>
      </div>
    </div>
<form action="<?php echo base_url('elegirMedioPago'); ?>" method="post" autocomplete>

  <input type="hidden" id="id_usuario" value="<?php echo $idUsuario; ?>" name="id_usuario">

  <?php if(isset($validation)){ ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
          <?php } ?>
                <div class="container">
       <?php if(isset($mensaje)) { ?>
            <div class="alert alert-danger" style="font-size:1em">
              <?php echo $mensaje; ?>
            </div>
      <?php } ?>
      </div>
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        1. Completar Datos Personales
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <div class="row g-3">

  <div class="col-md-6">
    <label for="inputName" class="form-label">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $usuario['nombre']; ?>" name="nombre" id="nombre" placeholder="" disabled>
  </div>
  <div class="col-md-6">
  <label for="inputLastname" class="form-label">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $usuario['apellido']; ?>" name="apellido" id="apellido" placeholder="" disabled>
  </div>
  <div class="col-md-3">
  <label for="inputUser" class="form-label">Usuario</label>
    <input type="text" class="form-control" value="<?php echo $usuario['usuario']; ?>" name="usuario" id="usuario" placeholder="" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Correo</label>
    <input type="email" class="form-control" value="<?php echo $usuario['email']; ?>" name="email" id="email" disabled>
  </div>
 <div class="col-md-3">
          <label for="colFormLabelLg" class="form-label">Teléfono</label>
              <input type="text" class="form-control" value="<?php echo $usuario['telefono']; ?>" name="telefono" id="telefono" placeholder="" value="<?=set_value('telefono');?>">
        </div>

      <div class="col-md-12 image-fondo5">
          <label class="form-label">Provincia</label>
          <select class="form-select multiple select" multiple aria-label="multiple select example" name="provincia" id="provincia" value="<?= set_value('provincia');?>">
            <option value="">Seleccionar Provincia</option>
            <?php foreach ($provincias as $provincia){ ?>
            <option value="<?php echo $provincia['id_provincia']; ?>" <?php if($provincia['id_provincia'] == $usuario['id_provincia']) { echo 'selected'; } ?>><?php echo $provincia['nombre']; } ?> </option>
            </select>
        </div>

  <div class="col-md-4">
    <label for="inputAddress2" class="form-label">Ciudad</label>
    <input type="text" class="form-control" value="<?php echo $usuario['ciudad']; ?>" name="ciudad" id="ciudad" placeholder="">
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">Dirección</label>
    <input type="text" class="form-control" value="<?php echo $usuario['direccion']; ?>" name="direccion" id="direccion">
  </div>
      </div>
    </div>
  </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        2. Lista de Productos
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
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
        <input type="hidden" name="<? echo $dato['rowid']; ?>" value="<? echo $dato['rowid']; ?>">
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
        <td>TOTAL$: <?php echo number_format($total,2,',','.');?></td>
      </tr>
    </tbody>
  </table>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        3. Forma de Pago y Envío
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
        <div class="col-md-12">
          <label class="form-label">Forma de Pago</label>
          <select class="form-select multiple select" multiple aria-label="multiple select example" name="fpago" id="fpago" value="<?= set_value('fpago');?>">
            <option value="0">Seleccionar Forma de Pago</option>
            <option value="1">Efectivo</option>
            <option value="2">Tarjeta Crédito</option>
            <option value="3">Tarjeta Débito</option>
            </select>
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-primary btn-lg active">SIGUIENTE</button> 
</form>
</div>
</div>
