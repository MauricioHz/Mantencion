
<!--
<div class="col-lg-3">
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-circle" style="color: #056FCC;"></i> Notificaciones</div>			
        <div class="panel-body">
            <p>En esta sección se visualizan las actividades pendientes.</p>
        </div>
        <div class="panel-body">
                <div class="alert alert-info" role="alert"> Existen 5 equipos sin su plan de mantenimiento. 
                    <a href="www.example.com" class="title">
                        <i class="fa fa-long-arrow-right"></i> 
                    </a>
                </div>
            <div class="alert alert-info" role="alert"> Existen 8 mantenciones pendientes. 
                <i class="fa fa-long-arrow-right"></i> 
            </div>
            
        </div>
    </div>
</div>
-->
<!--
<div class="row"></div>
<div class="info-box">
    <a href="service_orders.php">
        <img src="<?php echo base_url('assets/image/maintenance1.png'); ?>" alt="Virb maintenance">
    </a><div class="info-box-content"><a href="service_orders.php">
            <span class="info-box-text">ORDENES DE TRABAJO</span></a>
        <span class="info-box-number">222</span>
        <span class="progress-description">
            Aplicación Web para la gestión del
            mantenimiento de maquinarias, equipos y actividades de todas las
            aéreas de la empresa Agrícola Santa Marta de Liray S.A.            
        </span>
    </div>
     
</div>
-->

<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Mantenimiento ASML</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><img src="<?php echo base_url('assets/image/hexagon-icon.svg'); ?>" class="img-circle" alt="User Image"> Sistema</strong>

                    <p class="text-muted">
                        Aplicación Web para la gestión del
                        mantenimiento de maquinarias, equipos y actividades de todas las
                        aéreas de la empresa Agrícola Santa Marta de Liray S.A. 
                    </p>

                    <hr>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<!--
    <div class="col-lg-12">
        <img src="maintenance1.png" alt="Virb maintenance">
        <div class="jumbotron" id="jumbotron-inicio">
            <div class="page-header">
                <h1>
                    ASML <small>Gestión del mantenimiento</small>
                </h1>
            </div>
            <p>
                <img id="detail-icon-img"
                     src="https://cdn3.iconfinder.com/data/icons/seo-and-marketing-3-10/97/109-32.png"
                     alt="customize, gear, maintenance, repair, wrench icon" width="32"
                     height="32" data-pin-nopin="true"> Aplicación Web para la gestión del
                mantenimiento de maquinarias, equipos y actividades de todas las
                aéreas de la empresa Agrícola Santa Marta de Liray S.A.
            </p>
        </div>
    </div>
-->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">90<small>%</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">41,410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Sales</span>
                    <span class="info-box-number">760</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">New Members</span>
                    <span class="info-box-number">2,000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    
    

    
    
    
    </section>
<div class="row">
    <?php if (isset($resumen)) { ?>
        <?php $i = 0; ?>
        <?php foreach ($resumen as $dato) { ?>
            <?php //$i ?>
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body" style="color: #056FCC;font-weight: bold;">
                        <?php echo $dato->item . ' ' . $dato->cantidad; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>