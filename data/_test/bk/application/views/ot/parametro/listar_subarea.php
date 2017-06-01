<?php
//var_dump($subareas);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                Subáreas
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url('index.php/parametro/crear_subarea/'.$id);?>" class="btn btn-success btn-sm"><i class="fa fa-circle"></i> Agregar Subárea</a> 
                    <a href="<?php echo base_url('index.php/parametro/listar_area');?>" class="btn btn-primary btn-sm"><i class="fa fa-list-ul"></i> Listar áreas</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Subárea</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subareas as $item) { ?>
                        <tr>
                            <td><?php echo $item->subarea; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/parametro/editar_subarea/' . $item->id_sub_area); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url('index.php/parametro/eliminar_subarea/' . $item->id_sub_area); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
