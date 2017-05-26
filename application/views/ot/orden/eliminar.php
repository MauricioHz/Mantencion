<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Eliminar orden de trabajo</div>
            <?php if ($success == FALSE) { ?>   
                <div class="panel-body">                
                    <form action="<?php echo base_url('index.php/mantenimiento/eliminar_orden'); ?>" method="post">
                        <p>¿Confirma eliminar la orden de trabajo?</p>
                        <p><strong>#OT<?php echo $orden; ?></strong></p>   
                        <input type="hidden" name="semana" value="<?php echo $semana; ?>">
                        <input type="hidden" name="id-orden" value="<?php echo $orden; ?>">
                        <button type="submit" class="btn btn-success">Enviar datos</button>
                    </form>
                </div>
            <?php } else { ?>
            <div class="alert alert-success" role="alert" style="margin: 10px 10px 10px 10px;"> <strong>Mensaje</strong> Orden eliminada. </div>
                <div class="panel-footer">
                    <a href="<?php echo base_url('index.php/mantenimiento/listar'); ?>" class="btn btn-success btn-sm">Listar ordenes de trabajo</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>