<?php $_SESSION['submit'] = 1; ?>
<?php if (isset($success) && $success == TRUE) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>¡Bien!</strong> Equipo modificado correctamente.
    </div>
<?php } ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left">Modificar datos equipo</h4>
                <div class="btn-group pull-right">
                    <a
                        href="<?php echo base_url('index.php/parametro/listar_equipo'); ?>"
                        class="btn btn-success btn-sm">Listar equipos o actividades</a>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="crear-equipo-actividad"
                      action="<?php echo base_url('index.php/parametro/crear_equipo'); ?>"
                      method="post">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id-plan"
                               style="color: #0081C8">Plan mantenimiento</label>
                        <div class="col-md-8">
                            <select id="id-plan" name="id-plan" class="form-control">
                                <?php foreach ($planes as $value) { ?>
                                    <option value="<?php echo $value->id_plan ?>" <?php echo($value->id_plan == $id_plan) ? 'seleted' : '' ?>>
                                        <?php echo $value->nombre_plan ?>
                                    </option>
                                <?php } ?>
                            </select> 
                            <span class="help-block">Plan de apoyo mantenimiento preventivo</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id-area"
                               style="color: #0081C8">Área asignada</label>
                        <div class="col-md-5">
                            <select id="id-area" name="id-area" class="form-control">
                                <?php foreach ($areas as $value) { ?>
                                    <option value="<?php echo $value->id_area; ?>"
                                            <?php echo ($value->id_area == $id_area) ? 'seleted' : ''; ?>>
                                                <?php echo $value->area; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id-sub-area" style="color: #0081C8">Subárea</label>
                        <div class="col-md-2">
                            <select id="id-sub-area" name="id-sub-area" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-4">
                            <span class="help-block" id="mensaje-subarea"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="equipo-actividad">Equipo
                        </label>
                        <div class="col-md-6">
                            <input id="equipo-actividad" name="equipo-actividad" type="text"
                                   placeholder="Ingrese el nombre del equipo o activida."
                                   class="form-control input-md" maxlength="80" required="" value="<?php echo $equipo; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id-responzable">Responsable</label>
                        <div class="col-md-5">
                            <select id="id-responzable" name="id-responzable" class="form-control">
                                <?php foreach ($responsables as $value) { ?>
                                    <option value="<?php $value->id_usuario; ?>"
                                            <?php echo($value->id_usuario == $id_responsable) ? ' seleted' : '' ?>>
                                                <?php echo $value->nombre_usuario; ?>
                                    </option>
                                <?php } ?>
                            </select> <span class="help-block">Responzable acargo del equipo</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="observacion">Observación</label>
                        <div class="col-md-8">
                            <input id="observacion" name="observacion" type="text"
                                   maxlength="200"
                                   placeholder="Ingrese alguna observación adicional."
                                   class="form-control input-md" value="<?php echo $observacion; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-8">
                            <input type="hidden" name="id-equipo" value="<?php echo $id_equipo; ?>">
                            <button type="submit" class="btn btn-success">Enviar datos</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
