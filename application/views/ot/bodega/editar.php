<?php if (!empty($bodega)) { ?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Editar datos de bodega</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/bodega/index'); ?>" class="btn btn-primary btn-sm">Listar bodega</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url('index.php/bodega/editar'); ?>" method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="bodega">Bodega</label>  
                            <div class="col-md-6">
                                <input id="bodega" name="bodega" type="text" placeholder="Nombre asignado a la bodega" class="form-control input-md" value="<?php echo $bodega->bodega; ?>" required="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="descripcion">Descripcion</label>  
                            <div class="col-md-8">
                                <input id="descripcion" name="descripcion" type="text" placeholder="Breve descripción del uso de bodega ..." class="form-control input-md" value="<?php echo $bodega->descripcion; ?>" required="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tecnico">Técnico</label>
                            <div class="col-md-4">
                                <select id="tecnico" name="tecnico" class="form-control">
                                    <?php foreach ($tecnicos as $tecnico) { ?>
                                        <option value="<?php echo $tecnico->id_tecnico; ?>" <?php echo ($bodega->id_tecnico == $tecnico->id_tecnico) ? 'selected' : '' ?>> <?php echo $tecnico->tecnico; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>  
                            <div class="col-md-8">
                                <input type="hidden" name="id-bodega" value="<?php echo $bodega->id_bodega; ?>">
                                <button type="submit" class="btn btn-success btn-sm">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($mensaje == 'ACTUALIZAR_OK') { ?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Mensaje</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/bodega/index'); ?>" class="btn btn-primary btn-sm">Listar bodega</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="alert alert-success" role="alert"> Datos actualizados. </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($mensaje == 'ACTUALIZAR_ERROR') { ?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Mensaje</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/bodega/index'); ?>" class="btn btn-primary btn-sm">Listar bodega</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger" role="alert"> Error al actualizar los datos. </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($mensaje == 'REGISTRO_EXISTE') { ?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Mensaje</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/bodega/index'); ?>" class="btn btn-primary btn-sm">Listar bodega</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="alert alert-warning" role="alert"> El nombre de bodega ya existe. </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
