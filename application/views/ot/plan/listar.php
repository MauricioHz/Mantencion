<style>
    .nombre-plan{color: blue; font-weight: bold;}
    .codigo-plan{color: blue; font-weight: bold;}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="bs-example" data-example-id="contextual-panels">
            <div class="panel panel-default"> 
                <div class="panel-heading clearfix"> 
                    <h3 class="panel-title pull-left">Listar programa de mantención</h3> 
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/plan/crear'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Nuevo plan</a>
                    </div>
                </div>
                <div class="panel-body"> 
                    <table id="tabla-plan" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Fecha</th>
                                <th>Version</th>
                                <th>Fecha última modificación</th>
                                <th>Plan</th>
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