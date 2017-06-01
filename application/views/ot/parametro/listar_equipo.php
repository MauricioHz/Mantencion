<style>
.columna-equipo{color: green;}
.columna-observacion{font-size: 12px}
td.equipo{color: blue;font-weight: normal;}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left">Equipos</h4>
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url('index.php/parametro/crear_equipo'); ?>" class="btn btn-success btn-sm">Ingresar equipo o actividad</a>
                </div>
            </div>
            <div class="panel-body">
                <div id="loader">
                    <b>Cargando registros ... </b>
                </div> 
                <table id="tabla-equipos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Área</th>
                            <th>Equipo/Actividad</th>
                            <th>Observación</th>
                            <th><i class="fa fa-flag-o"></i></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Iconos
            </div>
            <div class="panel-body">
            <i class="fa fa-check-square" style="color:green;"></i> Indica que un equipo está asociado a un programa de manteción. <br>
            <i class="fa fa-square" style="color:silver;"></i> Indica que un equipo tiene pendiente el programa de mantención.
            </div>
        </div>
    </div>
</div>
