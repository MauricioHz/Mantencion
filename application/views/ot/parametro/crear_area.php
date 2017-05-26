<?php if(isset($success) && $success == TRUE){?>
<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>¡Bien!</strong>  Area ingresada correctamente. </div>
<?php } ?>
<?php if(isset($existe_area) && $existe_area == TRUE){?>
<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Mensaje</strong>  El área ya existe. </div>
<?php } ?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left">Ingresar área</h4>
        <div class="btn-group pull-right">
          <a href="<?php echo base_url('parametro/listar_area'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Listar areas</a>
        </div>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="<?php echo base_url('index.php/parametro/crear_area'); ?>" method="post">
          <div class="form-group">
            <label class="col-md-4 control-label" for="nombre-equipo-actividad">Área</label>  
            <div class="col-md-6">
              <input id="nombre-equipo-actividad" name="area" type="text" placeholder="Ingrese el nombre del área." class="form-control input-md" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-success">Enviar datos</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
