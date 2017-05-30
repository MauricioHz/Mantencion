<style>.active{font-weight: bold;color: #16288c;} .panel-default>.panel-heading {color: #110eb7;} .panel-content-tab{margin-top: 0px; border-top: 0px;} .panel{border-top-right-radius: 0px; border-top-left-radius: 0px;}</style>
<div class="row">
    <form id="" action="<?php echo base_url('index.php/mantenimiento/correctivo'); ?>" method="POST">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Mantención Correctiva</div>
            <div class="panel-body">
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <!-- menu class="active"-->
                    <li role="presentation" class="active"><a href="#paso1" id="home-tab" role="tab" data-toggle="tab" aria-controls="paso1" aria-expanded="true">#1 Datos mantención correctiva</a></li>
                    <li role="presentation"><a href="#paso2" role="tab" id="profile-tab" data-toggle="tab" aria-controls="paso2">#2 Datos actividad</a></li>
                    <li role="presentation"><a href="#paso3" role="tab" id="profile-tab" data-toggle="tab" aria-controls="paso3">#3 Repuestos utilizados</a></li>
                    <li role="presentation"><a href="#paso4" role="tab" id="profile-tab" data-toggle="tab" aria-controls="paso4">#3 Confirmar</a></li>
                </ul>
                <!-- contenido -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" role="tabpanel" id="paso1" aria-labelledby="paso1-tab">
                        <div class="panel panel-default panel-content-tab">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="sector">Equipo/actividad</label>
                                        <p class="form-control-static"  style="color: #054e8e;"><?php echo $equipo->equipo_actividad; ?></p>
                                    </div>  
                                    <div class="col-md-3">
                                        <label class="control-label" for="fecha-inicio">Fecha inicio</label>
                                        <input id="fecha-inicio" name="fecha-inicio" type="date" placeholder="" class="form-control input-md">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label" for="fecha-termino">Fecha termino</label>
                                        <input id="fecha-termino" name="fecha-termino" type="date" placeholder="" class="form-control input-md">
                                    </div> 
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label" for="sector">Area</label>
                                        <p class="form-control-static"  style="color: #054e8e;"><?php echo $equipo->area; ?></p>    
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label" for="sector">Subárea</label>
                                        <p class="form-control-static"  style="color: #054e8e;"><?php echo $equipo->area; ?></p>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="paso2" aria-labelledby="paso2-tab">
                        <div class="panel panel-default panel-content-tab">
                            <div class="panel-body">
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
                    <div class="tab-pane fade" role="tabpanel" id="paso3" aria-labelledby="paso3-tab">
                        <div class="panel panel-default panel-content-tab">
                            <div class="panel-body">
                                <button id="btn-agregar-respuesto" type="button" name="btn-agregar" class="btn btn-success">Agregar repuesto</button> 
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
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="paso4" aria-labelledby="paso4-tab">
                        <div class="panel panel-default panel-content-tab">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-offset-2">
                                        <label class="control-label" for="tecnico">Técnico</label>
                                        <select id="tecnico" name="tecnico" class="form-control">
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <?php if ($usuario->modulo_ot == '1100' && $usuario->perfil != 'global') { ?>
                                                    <option value="<?php echo $usuario->id_usuario; ?>"><?php echo $usuario->nombre_usuario; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label" for="supervisor">Supervisor</label>
                                        <select id="supervisor" name="supervisor" class="form-control">
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <?php if ($usuario->modulo_ot == '1111' && $usuario->perfil != 'global') { ?>
                                                    <option value="<?php echo $usuario->id_usuario; ?>"><?php echo $usuario->nombre_usuario; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel-body text-center">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="ciclo" value="1">
                                        <input type="hidden" name="id-equipo" value="<?php echo $equipo->id_equipo; ?>">
                                        <button type="submit" class="btn btn-success">Enviar datos orden de trabajo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<?php var_dump($equipo); ?>
