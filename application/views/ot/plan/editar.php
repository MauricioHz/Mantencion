<div class="col-lg-12">
    <?php echo (!$acceso)?'<p>No tiene acceso a este menú.</p>':''; ?>
    <?php if($acceso){?>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left">Editar plan</h4>
            <div class="btn-group pull-right">
                <a href="<?php echo base_url('index.php/plan/listar'); ?>" class="btn btn-default btn-sm">Listar programas de mantención</a>
            </div>
        </div>

        <?php if(isset($success) && $success == TRUE){?>
        <div class="panel-body">
            <div class="alert alert-success alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button> 
                    <strong>¡Bien!</strong>  Plan actualizado correctamente.
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <div class="panel-body">
            <form class="form-horizontal" action="<?php echo base_url('index.php/plan/editar'); ?>" method="post">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="codigo">Código</label>  
                    <div class="col-md-4">
                        <input id="codigo" name="codigo" type="text" class="form-control input-md" value="<?php echo $data_plan->codigo_plan; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="fecha">Fecha</label>  
                    <div class="col-md-5">
                        <input id="fecha" name="fecha" type="date" placeholder="" class="form-control input-md" value="<?php echo $data_plan->fecha_plan; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="version">Versión</label>  
                    <div class="col-md-4">
                        <input id="version" name="version" type="number" class="form-control input-md" value="<?php echo $data_plan->version; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="anio">Año</label>
                    <div class="col-md-2">
                        <select id="anio" name="anio" class="form-control">
                            <option value="2017" <?php echo ($data_plan->anio == '2017')? 'selected':''; ?>>2017</option>
                            <option value="2018" <?php echo ($data_plan->anio == '2018')? 'selected':''; ?>>2018</option>
                            <option value="2019" <?php echo ($data_plan->anio == '2019')? 'selected':''; ?>>2019</option>
                            <option value="2020" <?php echo ($data_plan->anio == '2020')? 'selected':''; ?>>2020</option>
                            <option value="2021" <?php echo ($data_plan->anio == '2021')? 'selected':''; ?>>2021</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="nombre-plan">Plan</label>  
                    <div class="col-md-8">
                        <input id="nombre-plan" name="nombre-plan" type="text" class="form-control input-md" value="<?php echo $data_plan->nombre_plan; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="observacion">Observación</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="observacion" name="observacion"><?php echo $data_plan->observacion; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8">                    
                        <input type="hidden" name="confirma-editar" value="1">
                        <input type="hidden" name="id_plan" value="<?php echo $data_plan->id_plan; ?>">
                        <button type="submit" class="btn btn-success">Enviar del nuevo plan</button>
                    </div>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>