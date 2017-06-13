<!--<ol class="breadcrumb">
  <li><a href="<?php echo base_url('index.php/mantenimiento');?>">Home</a></li>
  <li><a href="<?php echo base_url('index.php/bodega/index');?>">Bodegas materiales Maquinaría de producción</a></li>
  <li class="active">Listar productos</li>
</ol>-->
<input type="hidden" id="idbodega" value="<?php echo $idBodega; ?>">
<div class="row">
    <div class="col-lg-12 col-lg-offset-0">  
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">    
                    <table class="table table-bordered" id="tabla-productos">
                        <caption>Repuestos, Bodega :<?php echo $idBodega; ?></caption>
                        <thead>
                        <th>Bodega</th>
                        <th>Código</th>
                        <th>Repuesto</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                        </thead>
                        <tbody>	
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>    
</div>