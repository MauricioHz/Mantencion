<?php   
    for($i=1; $i<53; $i++){
        $semana[$i] = false;
    }  
    $semanas_programadas = NULL;        
    foreach ($programa_semanal as $value){ 
        $semana[] = array();
        $i = substr($value->semana, 3, 2);
        $semana[(int)$i] = $value->semana;
        $semanas_programadas = $semanas_programadas . ', ' . $i;
    }
?>
<div class="bs-callout bs-callout-info" id="callout-glyphicons-location">
 <h4>Datos actualizados</h4>
 <p>Se han actualizado los datos del Programa de mantenimiento preventivo para el equipo o actividad <strong><?php echo $equipo->equipo_actividad; ?></strong> perteneciente al área de <strong><?php echo $equipo->area; ?></strong>, asociado al plan <strong><?php echo 'www'; ?></strong>
 <p>El programa de mantención queda para las siguientes semanas:</p> 
 <strong><?php echo ' ' . substr($semanas_programadas, 1); ?></strong></p>
</div>
<div class="row">
    <div class="col-lg-6">
        <a href="http://sistema.mobagricola.cl/index.php/parametro/listar_equipo" class="btn btn-success btn-sm">Listar Equipo / Actividad</a>
    </div>
</div>