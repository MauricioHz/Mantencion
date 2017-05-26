<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left">Editar área</h4>
        <div class="btn-group pull-right">
          <a href="http://sistema.mobagricola.cl/index.php/parametro/listar_area" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Listar areas</a>
        </div>
      </div>
      <div class="panel-body">
      <?php if(isset($success) && $success == TRUE){?>
 <div class="alert alert-info" role="alert"> <strong>¡Bien!</strong> Área actualiza correctamente.</div>        
      <?php }else if(!$warning){ ?>     
        <form class="form-horizontal" action="http://sistema.mobagricola.cl/index.php/parametro/editar_area" method="post">
          <div class="form-group">
            <label class="col-md-4 control-label" for="area">Área</label>  
            <div class="col-md-6">
              <input type="hidden" name="confirma-editar" value="1">
              <input type="hidden" name="id-area" value="<?php echo $id_area; ?>">
              <input id="area" name="area" type="text" class="form-control input-md" value="<?php echo $area; ?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-success">Enviar datos</button>
            </div>
          </div>
        </form>
      <?php }else{ ?> 
      <div class="alert alert-danger" role="alert"> <strong>¡Error!</strong> Hubo problemas actualizando el Área.</div>
      <?php }?> 
      </div>
    </div>
  </div>
</div>