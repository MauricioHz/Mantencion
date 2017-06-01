<style>
    input[type='checkbox'] .anterior{ 
        border:red;
    }
    
    input[type="checkbox"] { 
        border:red;
    }
    .anterior{ 
        border:red;
    }
</style>

<?php   
if ($no_encontrado == FALSE) {
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
}
?>
<?php if ($no_encontrado == FALSE) { ?>
<div class="bs-callout bs-callout-info" id="callout-glyphicons-location">
 <h4>Nota:</h4>
 <p>Esta opción modificará los datos del "Programa de mantenimiento preventivo del equipo o actividad".</p>
 <p>Actualmente el equipo <strong><?php echo $equipo; ?></strong> tiene las siguientes semanas de mantencion: <strong><?php echo ' ' . substr($semanas_programadas, 1); ?></strong></p>
</div>

<style>
    .glanceyear-legend span {display: inline-block;height: 10px;width: 10px;margin: 4px;float: left}
    td{height: 30px;padding-right: 1px;border-right-width: 2px;padding-left: 1px;width: 80px;}
    th{text-align: center;color: green;}
    td{text-align: center;color: green;}
    input[type=checkbox], input[type=radio] {margin: 1px 2px 0;margin-top: 1px\9;line-height: normal;} 
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 4px;}
</style>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left">Modificar programa de mantenimiento preventivo</h4>
        <div class="btn-group pull-right">
            <!-- -->
        </div>
    </div>
    <form class="form-horizontal" action="<?php echo base_url('index.php/mantenimiento/editar'); ?>" method="post">   
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Equipo y/o actividad</label> 
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo $equipo; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Observación</label> 
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo $observacion; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Fecha registro</label> 
                <div class="col-sm-10">
                    <p class="form-control-static"><?php echo $fecha_registro; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="plan">Plan</label>
                <div class="col-md-8">
                    <p class="form-control-static"><?php echo $nombre_plan; ?></p>
                </div>
            </div>     
        </div>       
        <div class="panel-body">            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ene</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Abr</th>
                        <th>May</th>
                        <th>Jun</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            01 02 03 04
                        </td>
                        <td>
                            05 06 07 08
                        </td>
                        <td>
                            09 10 11 12 13
                        </td>
                        <td>
                            14 15 16 17
                        </td>
                        <td>
                            18 19 20 21
                        </td>
                        <td>
                            22 23 24 25 26
                        </td>
                    </tr>
                    <!-- checkbox -->
                    <tr>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 01" id="SEM01" name="semana[]" type="checkbox" class="anterior" value="SEM01" <?php echo ($semana[1] == 'SEM01')? 'checked':'false' ?>>
                                <input title="Semana 02" id="SEM02" name="semana[]" type="checkbox" class="anterior" value="SEM02" <?php echo ($semana[2]  == 'SEM02')? 'checked':'false' ?>>
                                <input title="Semana 03" id="SEM03" name="semana[]" type="checkbox" class="anterior" value="SEM03" <?php echo ($semana[3]  == 'SEM03')? 'checked':'false' ?>>
                                <input title="Semana 04" id="SEM04" name="semana[]" type="checkbox" class="anterior" value="SEM04" <?php echo ($semana[4]  == 'SEM04')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 05" id="SEM05" name="semana[]" type="checkbox" value="SEM05" <?php echo ($semana[5]  == 'SEM05')? 'checked':'false' ?>>
                                <input title="Semana 06" id="SEM06" name="semana[]" type="checkbox" value="SEM06" <?php echo ($semana[6]  == 'SEM06')? 'checked':'false' ?>>
                                <input title="Semana 07" id="SEM07" name="semana[]" type="checkbox" value="SEM07" <?php echo ($semana[7]  == 'SEM07')? 'checked':'false' ?>>
                                <input title="Semana 08" id="SEM08" name="semana[]" type="checkbox" value="SEM08" <?php echo ($semana[8]  == 'SEM08')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 09" id="SEM09" name="semana[]" type="checkbox" value="SEM09" <?php echo ($semana[9]  == 'SEM09')? 'checked':'false' ?>>
                                <input title="Semana 10" id="SEM10" name="semana[]" type="checkbox" value="SEM10" <?php echo ($semana[10]  == 'SEM10')? 'checked':'false' ?>>
                                <input title="Semana 11" id="SEM11" name="semana[]" type="checkbox" value="SEM11" <?php echo ($semana[11]  == 'SEM11')? 'checked':'false' ?>>
                                <input title="Semana 12" id="SEM12" name="semana[]" type="checkbox" value="SEM12" <?php echo ($semana[12]  == 'SEM12')? 'checked':'false' ?>>
                                <input title="Semana 13" id="SEM13" name="semana[]" type="checkbox" value="SEM13" <?php echo ($semana[13]  == 'SEM13')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 14" id="SEM14" name="semana[]" type="checkbox" value="SEM14" <?php echo ($semana[14]  == 'SEM14')? 'checked':'false' ?>>
                                <input title="Semana 15" id="SEM15" name="semana[]" type="checkbox" value="SEM15" <?php echo ($semana[15]  == 'SEM15')? 'checked':'false' ?>>
                                <input title="Semana 16" id="SEM16" name="semana[]" type="checkbox" value="SEM16" <?php echo ($semana[16]  == 'SEM16')? 'checked':'false' ?>>
                                <input title="Semana 17" id="SEM17" name="semana[]" type="checkbox" value="SEM17" <?php echo ($semana[17]  == 'SEM17')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 18" id="SEM18" name="semana[]" type="checkbox" value="SEM18" <?php echo ($semana[18]  == 'SEM18')? 'checked':'false' ?>>
                                <input title="Semana 19" id="SEM19" name="semana[]" type="checkbox" value="SEM19" <?php echo ($semana[19]  == 'SEM19')? 'checked':'false' ?>>
                                <input title="Semana 20" id="SEM20" name="semana[]" type="checkbox" value="SEM20" <?php echo ($semana[20]  == 'SEM20')? 'checked':'false' ?>>
                                <input title="Semana 21" id="SEM21" name="semana[]" type="checkbox" value="SEM21" <?php echo ($semana[21]  == 'SEM21')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 22" id="SEM22" name="semana[]" type="checkbox" value="SEM22" <?php echo ($semana[22]  == 'SEM22')? 'checked':'false' ?>>
                                <input title="Semana 23" id="SEM23" name="semana[]" type="checkbox" value="SEM23" <?php echo ($semana[23]  == 'SEM23')? 'checked':'false' ?>>
                                <input title="Semana 24" id="SEM24" name="semana[]" type="checkbox" value="SEM24" <?php echo ($semana[24]  == 'SEM24')? 'checked':'false' ?>>
                                <input title="Semana 25" id="SEM25" name="semana[]" type="checkbox" value="SEM25" <?php echo ($semana[25]  == 'SEM25')? 'checked':'false' ?>>
                                <input title="Semana 26" id="SEM26" name="semana[]" type="checkbox" value="SEM26" <?php echo ($semana[26]  == 'SEM26')? 'checked':'false' ?>>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jul</th>
                        <th>Ago</th>
                        <th>Set</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            27 28 29 30
                        </td>
                        <td>
                            31 32 33 34
                        </td>
                        <td>
                            35 36 37 38 39
                        </td>
                        <td>
                            40 41 42 43                    
                        </td>
                        <td>
                            44 45 46 47                    
                        </td>
                        <td>
                            48 49 50 51 52                    
                        </td>
                    </tr>
                    <!-- checkbox -->
                    <tr>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 27" id="SEM27" name="semana[]" type="checkbox" value="SEM27" <?php echo ($semana[27]  == 'SEM27')? 'checked':'false' ?>>
                                <input title="Semana 28" id="SEM28" name="semana[]" type="checkbox" value="SEM28" <?php echo ($semana[28]  == 'SEM28')? 'checked':'false' ?>>
                                <input title="Semana 29" id="SEM29" name="semana[]" type="checkbox" value="SEM29" <?php echo ($semana[29]  == 'SEM29')? 'checked':'false' ?>>
                                <input title="Semana 30" id="SEM30" name="semana[]" type="checkbox" value="SEM30" <?php echo ($semana[30]  == 'SEM30')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 31" id="SEM31" name="semana[]" type="checkbox" value="SEM31" <?php echo ($semana[31]  == 'SEM31')? 'checked':'false' ?>>
                                <input title="Semana 32" id="SEM32" name="semana[]" type="checkbox" value="SEM32" <?php echo ($semana[32]  == 'SEM32')? 'checked':'false' ?>>
                                <input title="Semana 33" id="SEM33" name="semana[]" type="checkbox" value="SEM33" <?php echo ($semana[33]  == 'SEM33')? 'checked':'false' ?>>
                                <input title="Semana 34" id="SEM34" name="semana[]" type="checkbox" value="SEM34" <?php echo ($semana[34]  == 'SEM34')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 35" id="SEM35" name="semana[]" type="checkbox" value="SEM35" <?php echo ($semana[35]  == 'SEM35')? 'checked':'false' ?>>
                                <input title="Semana 36" id="SEM36" name="semana[]" type="checkbox" value="SEM36" <?php echo ($semana[36]  == 'SEM36')? 'checked':'false' ?>>
                                <input title="Semana 37" id="SEM37" name="semana[]" type="checkbox" value="SEM37" <?php echo ($semana[37]  == 'SEM37')? 'checked':'false' ?>>
                                <input title="Semana 38" id="SEM38" name="semana[]" type="checkbox" value="SEM38" <?php echo ($semana[38]  == 'SEM38')? 'checked':'false' ?>>
                                <input title="Semana 39" id="SEM39" name="semana[]" type="checkbox" value="SEM39" <?php echo ($semana[39]  == 'SEM39')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 40" id="SEM40" name="semana[]" type="checkbox" value="SEM40" <?php echo ($semana[40]  == 'SEM40')? 'checked':'false' ?>>
                                <input title="Semana 41" id="SEM41" name="semana[]" type="checkbox" value="SEM41" <?php echo ($semana[41]  == 'SEM41')? 'checked':'false' ?>>
                                <input title="Semana 42" id="SEM42" name="semana[]" type="checkbox" value="SEM42" <?php echo ($semana[42]  == 'SEM42')? 'checked':'false' ?>>
                                <input title="Semana 43" id="SEM43" name="semana[]" type="checkbox" value="SEM43" <?php echo ($semana[43]  == 'SEM43')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 44" id="SEM44" name="semana[]" type="checkbox" value="SEM44" <?php echo ($semana[44]  == 'SEM44')? 'checked':'false' ?>>
                                <input title="Semana 45" id="SEM45" name="semana[]" type="checkbox" value="SEM45" <?php echo ($semana[45]  == 'SEM45')? 'checked':'false' ?>>
                                <input title="Semana 46" id="SEM46" name="semana[]" type="checkbox" value="SEM46" <?php echo ($semana[46]  == 'SEM46')? 'checked':'false' ?>>
                                <input title="Semana 47" id="SEM47" name="semana[]" type="checkbox" value="SEM47" <?php echo ($semana[47]  == 'SEM47')? 'checked':'false' ?>>
                            </div>
                        </td>
                        <td>
                            <div class="glanceyear-legend">
                                <input title="Semana 48" id="SEM48" name="semana[]" type="checkbox" value="SEM48" <?php echo ($semana[48]  == 'SEM48')? 'checked':'false' ?>>
                                <input title="Semana 49" id="SEM49" name="semana[]" type="checkbox" value="SEM49" <?php echo ($semana[49]  == 'SEM49')? 'checked':'false' ?>>
                                <input title="Semana 50" id="SEM50" name="semana[]" type="checkbox" value="SEM50" <?php echo ($semana[50]  == 'SEM50')? 'checked':'false' ?>>
                                <input title="Semana 51" id="SEM51" name="semana[]" type="checkbox" value="SEM51" <?php echo ($semana[51]  == 'SEM51')? 'checked':'false' ?>>
                                <input title="Semana 52" id="SEM52" name="semana[]" type="checkbox" value="SEM52" <?php echo ($semana[52]  == 'SEM52')? 'checked':'false' ?>>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <div class="col-md-4">                
                    <input type="hidden" name="id-plan" value="<?php echo $id_plan ?>">
                    <input type="hidden" name="id-equipo" value="<?php echo $id_equipo ?>">
                    <button type="submit" class="btn btn-success">Modificar plan de mantenimiento</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php }else{?>
<p>!Equipo o actividad no encontrado!</p>
<?php } ?>