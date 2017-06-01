<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left">Crear plan</h4>
            <div class="btn-group pull-right">
                <a href="<?php echo base_url('index.php/plan/listar'); ?>" class="btn btn-primary btn-sm">Listar programas de mantención</a>
            </div>
        </div>
        <div class="panel-body">
            <?php if(isset($success) && $success == TRUE){?>
            <div class="alert alert-success alert-dismissible" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button> <strong>¡Bien!</strong>  Plan ingresado correctamente.
                </div>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('index.php/plan/crear'); ?>" method="post">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="codigo">Código</label>  
                    <div class="col-md-4">
                        <input id="codigo" name="codigo" type="text" placeholder="Ingrese el código" class="form-control input-md" required="">
                        <span class="help-block">Ejemplo: PLA-G-2.1</span>  
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="fecha">Fecha</label>  
                    <div class="col-md-5">
                        <input id="fecha" name="fecha" type="date" placeholder="" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="version">Versión</label>  
                    <div class="col-md-4">
                        <input id="version" name="version" type="number" placeholder="" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="anio">Año</label>
                    <div class="col-md-2">
                        <select id="anio" name="anio" class="form-control">
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="nombre-plan">Plan</label>  
                    <div class="col-md-8">
                        <input id="nombre-plan" name="nombre-plan" type="text" placeholder="Ingrese el nombre del Plan" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="observacion">Observación</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="observacion" name="observacion" placeholder="Ingrese una observación ..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success">Enviar datos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>