<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="alert alert-info" role="alert"> <strong>Sección eliminar está pendiente!</strong></div>
        <div class="panel panel-default">
            <div class="panel-heading">¿Confirma eliminar el siguiente registro?</div> 
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">Área <b><?php echo $subarea->area; ?></b></li>
                    <li class="list-group-item">Subárea <b><?php echo $subarea->subarea; ?></b></li>
                    <li class="list-group-item">Fecha de registro <b><?php echo $subarea->fecha_registro; ?></b></li>
                </ul>
                <form action="<?php echo base_url('index.php/parametro/eliminar_subarea'); ?>" method="POST">     
                    <input type="hidden" name="id-subarea" value="<?php echo $id; ?>">    
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar subárea</button>
                </form>
            </div> 
            <div class="panel-footer clearfix"> 
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url('index.php/parametro/listar_area'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Listar áreas</a>
                </div>
            </div>
        </div>
    </div>
</div>