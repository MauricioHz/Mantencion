<?php $_SESSION['submit'] = 1; ?>
<style>
.glanceyear-legend span{display:inline-block;height:10px;width:10px;margin:4px;float:left}
td{height:30px;padding-right:1px;border-right-width:2px;padding-left:1px;width:80px;}
th{text-align:center;color:green;}
td{text-align:center;color:green;}
input[type=checkbox],input[type=radio]{margin:1px 2px 0;margin-top:1px\9;line-height:normal;}
.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th{padding:4px;}
.form-group{margin-bottom:0px;}
</style>
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<h4 class="panel-title pull-left">Crear programa de mantenimiento
			preventivo</h4>
		<div class="btn-group pull-right">
			<!-- -->
		</div>
	</div>

	<div class="panel-body">
		<div class="panel-group" role="tablist" id="tab-data-equipo">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="collapseListGroupHeading1">
					<h4 class="panel-title">
						<a href="#collapseListGroup1" class="" role="button"
							data-toggle="collapse" aria-expanded="true"
							aria-controls="collapseListGroup1"> Datos equipo <?php echo $equipo; ?></a>
					</h4>
				</div>
				<div class="panel-collapse collapse" role="tabpanel"
					id="collapseListGroup1" aria-labelledby="collapseListGroupHeading1"
					aria-expanded="true">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td class="col-lg-2 text-left">Equipo</td>
								<td class="col-lg-10 text-left"><?php echo $equipo; ?></td>
							</tr>
							<tr>
								<td class="col-lg-2 text-left">Area</td>
								<td class="col-lg-10 text-left"><?php echo $area; ?></td>
							</tr>
							<tr>
								<td class="col-lg-2 text-left">Subárea</td>
								<td class="col-lg-10 text-left"><?php echo $subarea; ?></td>
							</tr>	
							<tr>
								<td class="col-lg-2 text-left">Observación</td>
								<td class="col-lg-10 text-left"><?php echo $observacion; ?></td>
							</tr>	
							<tr>
								<td class="col-lg-2 text-left">Fecha registro</td>
								<td class="col-lg-10 text-left"><?php echo $fecha_registro; ?></td>
							</tr>	
							<tr>
								<td class="col-lg-2 text-left">Plan</td>
								<td class="col-lg-10 text-left"><?php echo $nombre_plan; ?></td>
							</tr>																										
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<form class="form-horizontal" id="form-crear-programa" action="<?php echo base_url('index.php/mantenimiento/crear'); ?>" method="post">
		<div class="panel-body">
		<div class="bs-callout bs-callout-info" id="callout-type-dl-truncate"> <h4>Programa mantención</h4> 
		<p>A continuación ingrese el nombre de la actividad a realizar y seleccione las semanas que se requiere la mantención del equipo, se deben ingresar hasta 100 caracteres.</p> </div>			
			<div class="form-group">
				<label class="col-md-2 control-label" for="plan">Actividad a
					realizar</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="actividad"
						name="actividad" maxlength="100"
						placeholder="Ingresar actividad a realizar para cada mes seleccionado ..."
						required>
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
					</tr>
					<td>01 02 03 04</td>
					<td>05 06 07 08</td>
					<td>09 10 11 12 13</td>
					<td>14 15 16 17</td>
					<td>18 19 20 21</td>
					<td>22 23 24 25 26</td>
					</tr>
					<!-- checkbox -->
					<tr>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 01" id="SEM01" name="semana[]"
									type="checkbox" value="SEM01"> <input title="Semana 02"
									id="SEM02" name="semana[]" type="checkbox" value="SEM02"> <input
									title="Semana 03" id="SEM03" name="semana[]" type="checkbox"
									value="SEM03"> <input title="Semana 04" id="SEM04"
									name="semana[]" type="checkbox" value="SEM04">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 05" id="SEM05" name="semana[]"
									type="checkbox" value="SEM05"> <input title="Semana 06"
									id="SEM06" name="semana[]" type="checkbox" value="SEM06"> <input
									title="Semana 07" id="SEM07" name="semana[]" type="checkbox"
									value="SEM07"> <input title="Semana 08" id="SEM08"
									name="semana[]" type="checkbox" value="SEM08">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 09" id="SEM09" name="semana[]"
									type="checkbox" value="SEM09"> <input title="Semana 10"
									id="SEM10" name="semana[]" type="checkbox" value="SEM10"> <input
									title="Semana 11" id="SEM11" name="semana[]" type="checkbox"
									value="SEM11"> <input title="Semana 12" id="SEM12"
									name="semana[]" type="checkbox" value="SEM12"> <input
									title="Semana 13" id="SEM13" name="semana[]" type="checkbox"
									value="SEM13">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 14" id="SEM14" name="semana[]"
									type="checkbox" value="SEM14"> <input title="Semana 15"
									id="SEM15" name="semana[]" type="checkbox" value="SEM15"> <input
									title="Semana 16" id="SEM16" name="semana[]" type="checkbox"
									value="SEM16"> <input title="Semana 17" id="SEM17"
									name="semana[]" type="checkbox" value="SEM17">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 18" id="SEM18" name="semana[]"
									type="checkbox" value="SEM18"> <input title="Semana 19"
									id="SEM19" name="semana[]" type="checkbox" value="SEM19"> <input
									title="Semana 20" id="SEM20" name="semana[]" type="checkbox"
									value="SEM20"> <input title="Semana 21" id="SEM21"
									name="semana[]" type="checkbox" value="SEM21">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 22" id="SEM22" name="semana[]"
									type="checkbox" value="SEM22"> <input title="Semana 23"
									id="SEM23" name="semana[]" type="checkbox" value="SEM23"> <input
									title="Semana 24" id="SEM24" name="semana[]" type="checkbox"
									value="SEM24"> <input title="Semana 25" id="SEM25"
									name="semana[]" type="checkbox" value="SEM25"> <input
									title="Semana 26" id="SEM26" name="semana[]" type="checkbox"
									value="SEM26">
							</div>
						</td>
				
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
					</tr>
					<td>27 28 29 30</td>
					<td>31 32 33 34</td>
					<td>35 36 37 38 39</td>
					<td>40 41 42 43</td>
					<td>44 45 46 47</td>
					<td>48 49 50 51 52</td>
					</tr>
					<!-- checkbox -->
					<tr>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 27" id="SEM27" name="semana[]"
									type="checkbox" value="SEM27"> <input title="Semana 28"
									id="SEM28" name="semana[]" type="checkbox" value="SEM28"> <input
									title="Semana 29" id="SEM29" name="semana[]" type="checkbox"
									value="SEM29"> <input title="Semana 30" id="SEM30"
									name="semana[]" type="checkbox" value="SEM30">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 31" id="SEM31" name="semana[]"
									type="checkbox" value="SEM31"> <input title="Semana 32"
									id="SEM32" name="semana[]" type="checkbox" value="SEM32"> <input
									title="Semana 33" id="SEM33" name="semana[]" type="checkbox"
									value="SEM33"> <input title="Semana 34" id="SEM34"
									name="semana[]" type="checkbox" value="SEM34">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 35" id="SEM35" name="semana[]"
									type="checkbox" value="SEM35"> <input title="Semana 36"
									id="SEM36" name="semana[]" type="checkbox" value="SEM36"> <input
									title="Semana 37" id="SEM37" name="semana[]" type="checkbox"
									value="SEM37"> <input title="Semana 38" id="SEM38"
									name="semana[]" type="checkbox" value="SEM38"> <input
									title="Semana 39" id="SEM39" name="semana[]" type="checkbox"
									value="SEM39">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 40" id="SEM40" name="semana[]"
									type="checkbox" value="SEM40"> <input title="Semana 41"
									id="SEM41" name="semana[]" type="checkbox" value="SEM41"> <input
									title="Semana 42" id="SEM42" name="semana[]" type="checkbox"
									value="SEM42"> <input title="Semana 43" id="SEM43"
									name="semana[]" type="checkbox" value="SEM43">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 44" id="SEM44" name="semana[]"
									type="checkbox" value="SEM44"> <input title="Semana 45"
									id="SEM45" name="semana[]" type="checkbox" value="SEM45"> <input
									title="Semana 46" id="SEM46" name="semana[]" type="checkbox"
									value="SEM46"> <input title="Semana 47" id="SEM47"
									name="semana[]" type="checkbox" value="SEM47">
							</div>
						</td>
						<td>
							<div class="glanceyear-legend">
								<input title="Semana 48" id="SEM48" name="semana[]"
									type="checkbox" value="SEM48"> <input title="Semana 49"
									id="SEM49" name="semana[]" type="checkbox" value="SEM49"> <input
									title="Semana 50" id="SEM50" name="semana[]" type="checkbox"
									value="SEM50"> <input title="Semana 51" id="SEM51"
									name="semana[]" type="checkbox" value="SEM51"> <input
									title="Semana 52" id="SEM52" name="semana[]" type="checkbox"
									value="SEM52">
							</div>
						</td>
				
				</tbody>
			</table>
			<div class="form-group">
				<div class="col-md-4">
					<input type="hidden" name="id-plan" value="<?php echo $id_plan ?>">
					<input type="hidden" name="id-equipo"
						value="<?php echo $id_equipo ?>">
					<button type="submit" class="btn btn-success"
						id="btn-crear-programa">Crear plan de mantenimiento</button>
				</div>
			</div>
		</div>
	</form>
</div>
