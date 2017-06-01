<style>
    td.fuente-equipo{color: green;}
    td.id-orden{color: #056FCC; font-weight: bold;}
</style>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title pull-left">Ordenes de trabajo</h3>
        <div class="btn-group pull-right">
            <!--<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title=""> Popover on right </button>-->
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button"
                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">
                    Información de iconos "Estado" y "Tipo mantención" <span
                        class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="list-group-item">Estado <span
                            class="label label-default">P</span> Pendiente</li>
                    <li class="list-group-item">Estado <span
                            class="label label-success">A</span> Aprobado</li>
                    <li class="list-group-item">Estado <span
                            class="label label-danger">R</span> Rechazado</li>
                    <li class="list-group-item">Mantención <span
                            class="label label-primary">P</span> Preventiva</li>
                    <li class="list-group-item">Mantención <span
                            class="label label-default">C</span> Correctiva</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="ordenes" class="table table-striped table-bordered"
                   cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>OT</th>
                        <th>ID</th>
                        <th>SEM</th>
                        <th><i class="fa fa-file-o"></i></th>
                        <th>Estado</th>
                        <th>F.Inicio</th>
                        <th>F.Termino</th>
                        <th>Equipo/Actividad</th>
                        <th>Mantenimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
