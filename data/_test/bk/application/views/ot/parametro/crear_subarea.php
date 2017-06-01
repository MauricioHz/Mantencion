<?php if (isset($success) && $success == TRUE) { ?>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
        	<div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Ingresar sub-área</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/parametro/listar_area'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list-ul"></i> Listar área</a>
                    </div>
            </div>
            <div class="panel-body">
            	<div class="alert alert-success" role="alert"><strong>¡Bien!</strong>  Area ingresada correctamente.</div>
            </div> 
        </div>    
        </div>
    </div>
<?php } ?>
<?php if (isset($existe_area) && $existe_area == TRUE) { ?>
    <div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Mensaje</strong>  El área ya existe. </div>
<?php } ?>
<?php if (isset($success) && $success == FALSE) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Ingresar sub-área</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/parametro/listar_area'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list-ul"></i> Listar área</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url('index.php/parametro/crear_subarea'); ?>" method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label">ID</label>
                            <div class="col-md-6">
                                <p class="form-control-static"><?php echo $id; ?></p>
                            </div>
                        </div>            
                        <div class="form-group">
                            <label class="col-md-4 control-label">Área</label>
                            <div class="col-md-6">
                                <p class="form-control-static"><?php echo $area; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="sub-area">Sub Área</label>  
                            <div class="col-md-6">
                                <input id="sub-area" name="sub-area" type="text" placeholder="Ingrese el nombre de al sub área." class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <input type="hidden" name="id-area" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-success">Enviar datos</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
