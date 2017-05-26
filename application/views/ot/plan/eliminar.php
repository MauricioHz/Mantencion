<div class="row">
  <div class="col-lg-12">
    <div class="bs-example" data-example-id="contextual-panels">
      <div class="panel panel-default"> 
        <div class="panel-heading clearfix"> 
          <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Eliminar plan</h3> 
          <div class="btn-group pull-right">
            <a href="<?php echo base_url('index.php/plan/listar'); ?>" class="btn btn-success btn-sm">Listar plan</a>
          </div>
        </div>
        <div class="panel-body">
         <?php if(isset($success) && $success == TRUE){?> 
		<div class="alert alert-info" role="alert"> 
		  <strong>¡Correcto!</strong> El plan ha sido eliminado correctamente. 
		</div>
         <?php } else{?>
         <p><strong>¿Confirma eliminar el Plan?</strong></p>
         <form method="post" action="<?php echo base_url(); ?>index.php/plan/eliminar">
          <p><?php echo $nombre_plan; ?></p>
          <input type="hidden" name="confirma-elimninar" value="1">
          <input type="hidden" name="id-plan" value="<?php echo $id_plan; ?>">
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