 <?php if ($value == 2) {?>
             <input type="hidden" id="value" value="2" name="value">
             <div class="container">
                <?php if(isset($validation)){ ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php } ?>
             </div>
            <form action="<?php echo base_url('FacturaTC'); ?>" method="post" autocomplete="off">

            <div class="container">
            <div class="col-md-3">
              <label for="inputTel" class="form-label">Ingrese Número de Tarjeta</label> 
              <input type="text" class="form-control" value="<?=set_value('tarjeta');?>" name="tarjeta" id="tarjeta">
            </div>
            <div class="col-md-3">
              <label for="inputTel" class="form-label">Dígitos de seguridad</label>
              <input type="text" class="form-control" value="<?=set_value('digitoSeguridad');?>" name="digitoSeguridad" id="digitoSeguridad">
            </div>
            <div class="col-md-3">
              <label for="inputTel" class="form-label">Cuotas</label>
              <input type="text" class="form-control" value="<?=set_value('cuotas');?>" name="cuotas" id="cuotas">
            </div> <br>
            <button class="btn btn-primary btn-lg active">GENERAR FACTURA</button>
          </div>
        </form>
        
        <?php } else if($value == 3){?>
           <input type="hidden" id="value" value="3" name="value">
          <form action="<?php echo base_url('FacturaTD'); ?>" method="post" autocomplete="off">
              
             <div class="container">
                <?php if(isset($validation)){ ?>
                    <div class="alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php } ?>
             </div>            

          <div class="container">
          <div class="col-md-3">
              <label for="inputTel" class="form-label">Ingrese Número de Tarjeta</label>
              <input type="text" class="form-control" value="<?=set_value('tarjeta');?>" name="tarjeta" id="tarjeta">
            </div>
            <div class="col-md-3">
              <label for="inputTel" class="form-label">Dígitos de seguridad</label>
              <input type="text" class="form-control" value="<?=set_value('digitoSeguridad');?>" name="digitoSeguridad" id="digitoSeguridad">
            </div> <br>
            <button class="btn btn-primary btn-lg active">GENERAR FACTURA</button>
          </div>
        </form>
       
        <?php } else if($value == 1){?>
           <input type="hidden" id="value" value="1" name="value">
          <form action="<?php echo base_url('FacturaEf'); ?>" method="post" autocomplete="off">
          <div class="container">
          <?php $codigo = uniqid();?>
          <p>Su código de factura es:</p>
          <h1 ><?php echo base64_encode($codigo); ?> </h1>
          <input type="hidden" id="codigo" value="<?php echo $codigo; ?>" name="codigo">
          <p>Por favor efectúe el pago antes de las 48hs hábiles.</p> <br>
          <button class="btn btn-primary btn-lg active">GENERAR FACTURA</button>
        </div>
      </form>
        <?php } ?>
