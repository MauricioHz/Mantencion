<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <div class="bs-example" data-example-id="contextual-panels">
      <div class="panel panel-default"> 
        <div class="panel-heading clearfix"> 
          <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Eliminar repuesto</h3> 
          <div class="btn-group pull-right">
            <a href="<?php echo base_url('index.php/bodega/index')?>" class="btn btn-success btn-sm">Listar bodegas</a>
          </div>
        </div>
        <div class="panel-body">
         <?php if(isset($success) && $success == TRUE){?> 
         <div class="alert alert-success alert-dismissible" role="alert"> 
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
             <strong>Mensaje</strong>  Repuesto eliminado. </div>
         <?php } else{?>
         <p><strong>¿Confirma eliminar el repuesto?</strong></p>
         <form method="post" action="<?php echo base_url(); ?>index.php/producto/eliminar">
          <p><?php echo $repuesto; ?></p>
          <input type="hidden" name="id-producto" value="<?php echo $id; ?>">
          <button type="submit" class="btn btn-warning btn-sm">Eliminar</button>
        </form>
        <?php }?>
      </div>
      <div class="panel-footer"> 
        <a href="http://sistema.mobagricola.cl" class="btn btn-default btn-sm">Cancelar</a>
      </div>
    </div>
  </div>
</div>
</div>
