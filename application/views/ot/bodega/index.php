<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <div class="bs-callout bs-callout-info" id="callout-pagination-label">
            <p>Lista de bodegas</p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Bodega</th>
                    <th>Acciones</th>
                </thead>
                <tbody>	
                    <?php foreach ($bodegas as $bodega) {  ?>
                    <tr>
                    <td><?php echo $bodega->bodega; ?></td>
                    <td>
                        <a href="<?php echo base_url('index.php/producto/index'); ?>" class="btn btn-primary btn-xs">Ver productos</a>
                        <a href="<?php echo base_url('index.php/producto/ingresar'); ?>" class="btn btn-warning btn-xs">Ingresar producto a bodega</a>                        
                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
           </table>        
        </div>
    </div>
</div>