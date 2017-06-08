<ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/mantenimiento'); ?>">Home</a></li>
    <li class="active">Bodegas materiales Maquinaría de producción</li>
</ol>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <!--
        <div class="bs-callout bs-callout-info" id="callout-pagination-label">
            <p>Bodegas materiales Maquinaría de producción</p>
        </div>	
        -->
        <?php foreach ($bodegas as $bodega) { ?>
            <div class="panel panel-default"> 
                <div class="panel-heading clearfix" style="color: #056FCC;"><?php echo $bodega->bodega; ?></div> 
                <div class="panel-body"> 
                    <?php echo $bodega->descripcion; ?>  
                    | Técnico responsable <?php echo $bodega->tecnico; ?>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo base_url('index.php/producto/index/' . $bodega->id_bodega); ?>" class="btn btn-primary btn-xs">Ver productos</a>
                    <a href="<?php echo base_url('index.php/producto/ingresar'); ?>" class="btn btn-warning btn-xs">Ingresar producto a bodega</a>  
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url('index.php/bodega/editar/' . $bodega->id_bodega); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

