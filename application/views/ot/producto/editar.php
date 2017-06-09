<?php if ($producto) { ?>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Editar datos de producto</h4>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/bodega/index'); ?>" class="btn btn-primary btn-sm">Listar bodega</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url('index.php/producto/editar'); ?>" method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="categoria">Categoría</label>
                            <div class="col-md-4">
                                <select id="categoria" name="id-categoria" class="form-control">
                                    <option value="0">Seleccione ...</option>
                                    <?php foreach ($categorias as $categoria) { ?>                                
                                        <option value="<?php echo $categoria->id_categoria; ?>" <?php echo ($categoria->id_categoria == $producto->id_categoria) ? 'selected' : ''; ?>><?php echo $categoria->categoria; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="codigo">Código</label>  
                            <div class="col-md-4">
                                <input id="codigo" name="codigo" type="text" placeholder="Código de producto" class="form-control input-md" value="<?php echo $producto->codigo; ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="producto">Producto</label>  
                            <div class="col-md-8">
                                <input id="producto" name="producto" type="text" placeholder="Nombre del producto" class="form-control input-md" value="<?php echo $producto->producto; ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="id-bodega">Bodega</label>
                            <div class="col-md-6">
                                <select id="id-bodega" name="id-bodega" class="form-control">
                                    <option value="0">Seleccione ...</option>
                                    <?php foreach ($bodegas as $bodega) { ?>
                                        <option value="<?php echo $bodega->id_bodega; ?>" <?php echo ($bodega->id_bodega == $producto->id_bodega) ? 'selected' : ''; ?>><?php echo $bodega->bodega; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cantidad">Cantidad</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Q</span>
                                    <input id="cantidad" name="cantidad" class="form-control" placeholder="" type="number" value="<?php echo $producto->cantidad; ?>">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="precio">Precio</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input id="precio" name="precio" class="form-control" placeholder="" type="number" value="<?php echo $producto->precio; ?>">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cantidad-minima">Cantidad minima</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon">Q</span>
                                    <input id="cantidad-minima" name="cantidad-minima" class="form-control" placeholder="" type="number" required="" value="<?php echo $producto->cantidad_minimo; ?>">                                
                                </div>                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-lg-offset-4">
                                <span class="help-block">Cantidad minima corresponde a la unidad utilizada para notificar el stock minimo para manejar en bodega.</span>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>  
                            <div class="col-md-8">
                                <input type="hidden" name="id-producto" value="<?php echo $producto->id_producto; ?>">
                                <button type="submit" class="btn btn-success btn-sm">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <?php if ($mensaje->mensaje == 'ACTUALIZAR_OK') { ?>
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
                        <div class="alert alert-success" role="alert"> Registro actualizado.. </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($mensaje->mensaje == 'REGISTRO_EXISTE') { ?>     
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
                        <div class="alert alert-success" role="alert"> El registro nombre de producto o código ya existe. </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>     
    <?php if ($mensaje->mensaje == 'ACTUALIZAR_ERROR') { ?> 
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
                        <div class="alert alert-success" role="alert"> Error al actualizar los datos. </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>    
<?php } ?>


