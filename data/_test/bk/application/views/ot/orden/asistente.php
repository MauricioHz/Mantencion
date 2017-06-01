<?php $_SESSION['submit'] = 1; ?>
<?php if (!$no_encontrado) { ?>
    <style>
        #separador {
            margin-top: 10px;
            margin-button: 10px
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
                                                                    <p class="form-control-static"  style="color: #054e8e;"><?php echo $equipo_actividad; ?></p>
                                                                </div>  
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="fecha-inicio">Fecha inicio</label>
                                                                    <input id="fecha-inicio" name="fecha-inicio" type="date" placeholder="" class="form-control input-md">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="fecha-termino">Fecha termino</label>
                                                                    <input id="fecha-termino" name="fecha-termino" type="date" placeholder="" class="form-control input-md">
                                                                </div>             
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="tipo-mantencion">Tipo mantención</label>
                                                                    <select id="tipo-mantencion" name="tipo-mantencion" class="form-control">
                                                                        <option value="PREVENTIVA">PREVENTIVA</option>
                                                                        <option value="CORRECTIVA">CORRECTIVA</option>
                                                                        <option value="PREVENTIVA">PREDICTIVA</option>
                                                                    </select>    
                                                                </div>
                                                            </div>
                                                        </div>    
                                                        <div class="panel-body">    
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p class="form-control-static"  style="color: #054e8e;"><?php echo $equipo_actividad; ?></p>
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
                                                                      placeholder="Descripción de la actividad" maxlength="400"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="observaciones">Observaciones</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" id="observaciones"
                                                                      name="observaciones"
                                                                      placeholder="Observaciones de la actividad" maxlength="400"></textarea>
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
                                                                        <option value="<?php echo $usuario->id_usuario;?>"><?php echo $usuario->nombre_usuario;?></option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="supervisor">Supervisor</label>
                                                            <select id="supervisor" name="supervisor" class="form-control">
                                                                <?php foreach($usuarios as $usuario){?>
                                                                <?php if($usuario->modulo_ot == '1111' && $usuario->perfil != 'global'){ ?>
                                                                <option value="<?php echo $usuario->id_usuario;?>"><?php echo $usuario->nombre_usuario;?></option>
                                                                   <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body text-center">
                                            <input type="hidden" name="semana" value="<?php echo $semana; ?>">
                                            <input type="hidden" name="id_equipo"
                                                   value="<?php echo $id_equipo; ?>"> <input type="hidden"
                                                   name="id_area" value="<?php echo $id_area; ?>">
                                            <button type="submit" class="btn btn-success">Enviar datos orden de trabajo</button>
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