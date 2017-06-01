<div class="row">
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
    <div class="col-lg-9">
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

</div>
<div class="row">
    <?php if(isset($resumen)){?>
        <?php $i = 0; ?>
        <?php foreach($resumen as $dato){?>
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