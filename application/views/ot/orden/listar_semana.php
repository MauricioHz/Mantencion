<?php
date_default_timezone_set('America/Santiago');
// test...
//$testHoy = '2017-12-31 00:00:00';
//$hoy = date($testHoy, time());
$hoy = date('m/d/Y h:i:s a', time());
$hoy = new DateTime($hoy);
// numero de la semana actual presente.
$semana = $hoy->format("W");

// año actual de proceso
$anio = $hoy->format("Y");

function getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $ret['week_start'] = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
}

// array con dos valores: fecha de inicio y fecha de termino, 
// correspondiente al numero de semana consultado.
$week_array = getStartAndEndDate($semana, $hoy->format("Y"));

// mensaje: rango de la fecha de inicio hasta la fecha de termino semana
$rango_fecha_semana = "Semana " . $semana . " desde " . $week_array['week_start'] . " hasta " . $week_array['week_end'];

// -----------------------------------------------------------------------------
// inicio debug y pruebas
// -----------------------------------------------------------------------------
// mensaje informativo para debug de pruebas semana actual:
$semanaActual = $semana; //21;
// se debe visualizar al menos una semana anterior a la actual.
$semanasAtras = 3;
$rangoSemanaAnterior = ($semanaActual - $semanasAtras);

// ¿Que pasa si la semana actual es 1?
/*
  $semanaActual = 1;
  $semanasAtras = 3;
  $rangoSemanaAnterior = ($semanaActual - $semanasAtras);
 */

// rango de semanas que se deberan visualizar.
$semanasSiguienteVisualiza = 12;
$rangoSemanas = ($semanaActual - $semanasAtras) + $semanasSiguienteVisualiza;
echo '<pre>';
echo '<br>Semana segun fecha: ' . $semana;
echo '<br>Rango de semana: ' . $rango_fecha_semana;
echo '<br>Rango semana anterior: ' . $rangoSemanaAnterior;
echo '<br>Año de proceso: ' . $anio;
echo '</pre>';
?>
<style>
    .nav-tabs > li, .nav-pills > li{float:none;display:inline-block;*display:inline;zoom:1;}
    .nav-tabs, .nav-pills{text-align:center;}
    .badge{background-color:#0824bd;}
    .semana{color:#0824bd;}
    .panel-default{margin-top:10px;}
    .normal{background-color: #eeeeee;color:#0824bd;}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <?php for ($semana = $rangoSemanaAnterior; $semana < $rangoSemanas; $semana++) { ?>
                        <?php
                        $claseActiva = ($semana == $semanaActual) ? 'active' : '';
                        if ($semana == 53)
                            return;
                        ?>
                        <li role="presentation" class="<?php echo $claseActiva; ?>">
                            <a href="#<?php echo 'sem' . $semana; ?>" id="<?php echo 'sem' . $semana; ?>-tab" class="semana" role="tab" data-toggle="tab" aria-controls="<?php echo 'sem' . $semana; ?>" aria-expanded="true">
                                <?php echo ($semana == $semanaActual) ? '<span class="badge">' . $semana . '</span>' : '<span class="badge normal">' . $semana . '</span>'; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="tab-content" id="myTabContent">               
                    <?php for ($semana = $semanaActual; $semana < $rangoSemanas; $semana++) { ?>
                        <div class="tab-pane fade <?php echo ($semana == $semanaActual) ? 'active in' : ''; ?>" role="tabpanel" id="<?php echo 'sem' . $semana; ?>" aria-labelledby="<?php echo 'sem' . $semana; ?>-tab">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?php
                                    $week_array = getStartAndEndDate($semana, $hoy->format("Y"));
                                    echo '<span class="label label-warning">' .  "Semana " . $semana . " desde " . $week_array['week_start'] . " hasta " . $week_array['week_end'] . '</span>';
                                    ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Equipo</th>
                                                <th>Actividad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($programa_semanal as $value) { ?>                             
                                                <?php if ($value->semana == 'SEM' . $semana) { ?>                                                        <tr>
                                                        <td scope="row"><?php echo $value->semana; ?></td>
                                                        <td scope="row"><?php echo $value->equipo; ?></td>
                                                        <td scope="row"><?php echo $value->actividad; ?></td>
                                                        <td>
                                                            <?php if ($value->orden_trabajo == 0) { ?>
                                                                <a href="http://sistema.mobagricola.cl/index.php/mantenimiento/ordentrabajo/<?php echo $value->id_equipo . '/' . $value->semana; ?>" class="btn btn-default btn-xs">
                                                                    <i class="fa fa-pencil"></i> Crear orden de trabajo</a>
                                                            <?php } else { ?>
                                                                <span class="label label-success">Orden realizada <?php echo $value->semana . ' ' . $value->id_orden; ?></span>
                                                                <a href="http://sistema.mobagricola.cl/index.php/mantenimiento/pdf/<?php echo $value->id_orden; ?>" 
                                                                   target="_blank" style="border:0px solid transparent;color:red;border-color:green;margin-left: 2px;">
                                                                    <img alt="document, pdf icon" class="tiled-icon" style="max-width: 128px; max-height: 128px;" 
                                                                         src="/assets/image/document-pdf.png" data-pin-nopin="true">
                                                                </a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>    
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div
    </div>
</div>