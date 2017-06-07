<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="bs-callout bs-callout-info" id="callout-pagination-label">
            <p>Lista de bodegas</p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <th>Bodega</th>
                <th>Descripción</th>
                <th>Responsable</th>
                <th>Bodega</th>
                <th>Producto</th>
                </thead>
                <tbody>	
                    <?php foreach ($bodegas as $bodega) { ?>
                        <tr>
                            <td><?php echo $bodega->bodega; ?></td>
                            <td><?php echo $bodega->descripcion; ?></td>
                            <td><?php echo $bodega->tecnico; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/bodega/editar/' . $bodega->id_bodega); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="<?php echo base_url('index.php/producto/index/' . $bodega->id_bodega); ?>" class="btn btn-primary btn-xs">Ver productos</a>
                                <a href="<?php echo base_url('index.php/producto/ingresar'); ?>" class="btn btn-warning btn-xs">Ingresar producto a bodega</a>                        
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>        
        </div>
    </div>
</div>