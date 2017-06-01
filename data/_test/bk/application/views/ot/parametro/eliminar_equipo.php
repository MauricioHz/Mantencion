<div class="row">
    <div class="col-lg-12">
        <div class="bs-example" data-example-id="contextual-panels">
            <div class="panel panel-default"> 
                <div class="panel-heading clearfix"> 
                    <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Eliminar equipo</h3> 
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/parametro/listar_equipo'); ?>" class="btn btn-success btn-sm">Listar areas</a>
                    </div>
                </div>
                <?php if (isset($success) && $success == TRUE) { ?> 
                    <div class="panel-body">
                        <div class="alert alert-info" role="alert"> <strong>¡Bien!</strong>  Equipo eliminado correctamente. </div>
                    </div>
                <?php } else { ?>
                    <div class="panel-body">                 
                        <p><strong>¿Confirma eliminar el equipo?</strong></p>
                        <form method="post" action="<?php echo base_url('index.php/parametro/eliminar_equipo'); ?>">
                            <p><?php echo $equipo; ?></p>
                            <input type="hidden" name="confirma-eliminar" value="1">
                            <input type="hidden" name="id-equipo" value="<?php echo $id_equipo; ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Eliminar</button>
                        </form>                   
                    </div>
                <?php } ?>
                <div class="panel-footer"> 
                    <a href="<?php echo base_url(); ?>" class="btn btn-default btn-sm">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>