<?php //var_dump($orden); ?>
<?php //var_dump($repuestos); ?>
<?php $_SESSION['submit'] = 1; ?>
<?php if (!$no_encontrado) { ?>
<style>
#separador {
	margin-top: 10px;
	margin-button: 10px
}

#myTabsemana li.active {
	border-top: 2px #4CAF50 solid;
	border-radius: 4px 4px 0 0;
}
</style>
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="panel panel-default">
                <div class="panel-heading text-center">Asistente Ordenes de trabajo</div>
                <div class="panel-body">
                    <ul class="nav nav-tabs nav-justified" id="myTabsemana"
                        role="tablist">
                        <li role="presentation" class="active">
                            <a href="#paso1"
                               id="paso1-tab" role="tab" data-toggle="tab" data-tab="paso1" aria-controls="paso1"
                               aria-expanded="true"><strong>Paso 1</strong><br>Orden</a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#paso2" role="tab"
                               id="paso2-tab" data-toggle="tab" data-tab="paso2" aria-controls="paso2"
                               aria-expanded="false"><strong>Paso 2</strong><br>Repuestos</a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#paso3" role="tab"
                               id="paso3-tab" data-toggle="tab" data-tab="paso3" aria-controls="paso3"
                               aria-expanded="false"><strong>Paso 3</strong><br>¡Confirar!</a>
                        </li>
                        <form id="form-crear-orden"
                              action="<?php
                              echo base_url('index.php/mantenimiento/crear_orden');
                              ?>"
                              method="post">
                            <!-- contenido -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="paso1" aria-labelledby="paso1-tab">
                                    <div class="panel panel-default" id="panel-primero" style="margin-top: 10px;">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" style="color: #054e8e; font-weight: bold;">
                                                            <i class="fa fa-bookmark-o"></i> Datos
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="sector">Equipo/actividad</label>
                                                                    <p class="form-control-static"  style="color: #054e8e;"><?php echo $orden->equipo_actividad; ?></p>
                                                                </div>  
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="fecha-inicio">Fecha inicio</label>
                                                                    <input id="fecha-inicio" name="fecha-inicio" type="date" value="<?php echo $orden->fecha_inicio; ?>" class="form-control input-md">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="fecha-termino">Fecha termino</label>
                                                                    <input id="fecha-termino" name="fecha-termino" type="date" value="<?php echo $orden->fecha_termino; ?>" class="form-control input-md">
                                                                </div>             
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="tipo-mantencion">Tipo mantención</label>
                                                                    <select id="tipo-mantencion" name="tipo-mantencion" class="form-control">
                                                                        <option value="PREVENTIVA" <?php echo ($orden->tipo_mantencion == 'PREVENTIVA')? 'seleted':''; ?>>PREVENTIVA</option>
                                                                        <option value="CORRECTIVA" <?php echo ($orden->tipo_mantencion == 'CORRECTIVA')? 'seleted':''; ?>>CORRECTIVA</option>
                                                                        <option value="PREDICTIVA" <?php echo ($orden->tipo_mantencion == 'PREDICTIVA')? 'seleted':''; ?>>PREDICTIVA</option>
                                                                    </select>    
                                                                </div>

                                                            </div>
                                                        </div>    
                                                        <div class="panel-body">    
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="sector">Sector</label>
                                                                    <input id="sector" name="sector" type="text" class="form-control input-md"  maxlength="50" value="<?php echo $orden->sector; ?>">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="elemento">Elemento</label>
                                                                    <input id="elemento" name="elemento" type="text" class="form-control input-md" maxlength="50" value="<?php echo $orden->elemento; ?>">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="pabellon">Pabellon</label>
                                                                    <input id="pabellon" name="pabellon" type="text" class="form-control input-md" maxlength="50" value="<?php echo $orden->pabellon; ?>">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="atril">Atril</label>
                                                                    <input id="atril" name="atril" type="text" class="form-control input-md" maxlength="50" value="<?php echo $orden->atril; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="color: #054e8e; font-weight: bold;">
                                                    <i class="fa fa-bookmark-o"></i> Datos de la actividad
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="descripcion">Descripción</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" id="descripcion"
                                                                      name="descripcion"
                                                                      placeholder="Descripción de la actividad" maxlength="400"><?php echo $orden->descripcion; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="observaciones">Observaciones</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" id="observaciones"
                                                                      name="observaciones"
                                                                      placeholder="Observaciones de la actividad" maxlength="400"><?php echo $orden->observacion; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="paso2" aria-labelledby="paso2-tab">
                                    <div class="panel panel-default" style="margin-top: 10px;">
                                        <div class="panel-heading clearfix">
                                            <h3 class="panel-title pull-left"></h3>
                                            <!-- <div class="btn-group pull-left"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Agregar repuesto</button></div>-->
                                            <button id="btn-agregar-respuesto" type="button"
                                                    name="btn-agregar" class="btn btn-success">Agregar repuesto</button>
                                        </div>
                                        <div class="panel-body" id="panel-repuesto">
                                            <div class="table-responsive">    
                                                <table class="table" id="tabla-repuestos">
                                                    <thead class="row">
                                                        <tr>
                                                            <th class="col-md-2">Cantidad</th>
                                                            <th class="col-md-6">Repuesto</th>
                                                            <th class="col-md-4">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($repuestos as $repuesto){ ?>
                                                            <tr>
                                                            	<td class="col-md-2"><input type="number" class="form-control"
                                                            		name="cantidad[]" maxlength="6" min="1" max="999" required="" value="<?php echo $repuesto->cantidad; ?>">
                                                            	</td>
                                                            	<td class="col-md-6"><input type="text" class="form-control"
                                                            		name="repuesto[]" maxlength="100"
                                                            		placeholder="Ingrese descripción del repuesto" required="" value="<?php echo $repuesto->repuesto; ?>">
                                                            	</td>
                                                            	<td class="col-md-4"><button type="button"
                                                            			class="btn btn-primary btn-sm eliminar-fila">Remover</button>
                                                            	</td>
                                                            </tr>
                                                        <?php } ?>    
                                                    </tbody>
                                                </table>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="paso3" aria-labelledby="paso3-tab">
                                    <div class="panel panel-default" style="margin-top: 10px">
                                        <div class="panel-body">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="color: #054e8e; font-weight: bold;">
                                                    <i class="fa fa-bookmark-o"></i> Datos de la actividad
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="tecnico">Técnico</label>
                                                            <select id="tecnico" name="tecnico" class="form-control">
                                                                <?php foreach($usuarios as $usuario){?>
                                                                    <?php if($usuario->modulo_ot == '1100' && $usuario->perfil != 'global'){ ?>
                                                                        <option value="<?php echo $usuario->usuario;?>" <?php echo ($orden->tecnico == $usuario->nombre_usuario)?'seleted':''; ?>><?php echo $usuario->nombre_usuario;?></option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="supervisor">Supervisor</label>
                                                            <select id="supervisor" name="supervisor" class="form-control">
                                                                <?php foreach($usuarios as $usuario){?>
                                                                <?php if($usuario->modulo_ot == '1111' && $usuario->perfil != 'global'){ ?>
                                                                       <option value="<?php echo $usuario->usuario;?>" <?php echo ($orden->tecnico == $usuario->nombre_usuario)?'seleted':''; ?>><?php echo $usuario->nombre_usuario;?></option>
                                                                   <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body text-center">
                                            <input type="hidden" name="semana" value="<?php echo $orden->semana; ?>">
                                            <input type="hidden" name="id_equipo"
                                                   value="<?php echo $orden->id_equipo; ?>"> <input type="hidden"
                                                   name="id_area" value="<?php echo $orden->id_area; ?>">
                                            <button type="submit" class="btn btn-success">Enviar datos
                                                orden de trabajo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- fin -->
                    </ul>
                </div>
            </div>
	</div>
</div>

<?php } else { ?>
	<p>Registro no encontrado.</p>
<?php } ?>