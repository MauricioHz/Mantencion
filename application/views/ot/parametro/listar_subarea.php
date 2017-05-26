<?php
//var_dump($subareas);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
       <div class="panel-heading">Panel heading</div>
       <table class="table">
          <thead>
             <tr>
                <th>Sub Area</th>
                <th>Acciones</th>
             </tr>
          </thead>
          <tbody>
             <?php foreach($subareas as $item){?>
             <tr>
                <td><?php echo $item->subarea; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/parametro/editar_subarea/' . $item->id_sub_area); ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url('index.php/parametro/editar_subarea/' . $item->id_sub_area); ?>" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>
                </td>
             </tr>
             <?php } ?>
          </tbody>
       </table>
    </div>
    </div>
</div>
