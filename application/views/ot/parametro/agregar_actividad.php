<style>
.fa-thumb-tack {
	color: #086ABD;
}
</style>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="bs-callout bs-callout-info" id="callout-pagination-label">
			<p>
				Datos equipo <span class="label label-success"><?php echo $equipo->equipo_actividad; ?>
				</span>
			</p>
		</div>
		<?php //echo 'Agregar actividad de mantencion al equipo : EQ' . $id; ?>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>Codigo equipo</td>
						<td><?php echo 'EQ'.$id . ' - ' . $equipo->equipo_actividad; ?></td>
					</tr>
					<tr>
						<td>Plan de mantención</td>
						<td><?php echo $equipo->nombre_plan; ?></td>
					</tr>
					<tr>
						<td>Area</td>
						<td><?php echo $equipo->area; ?></td>
					</tr>
					<tr>
						<td>Subárea</td>
						<td><?php echo $equipo->subarea; ?></td>
					</tr>
					<tr>
						<td>Observación</td>
						<td><em><?php echo $equipo->observacion; ?> </em></td>
					</tr>
					<tr>
						<td>Responsable</td>
						<td><?php echo 'falta campo'; ?></td>
					</tr>
					<tr>
						<td><a
							href="<?php echo base_url('index.php/parametro/editar_equipo/'. $id);?>"
							class="btn btn-warning btn-xs">Modificar datos del Equipo</a></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="bs-callout bs-callout-info" id="callout-pagination-label">
			<p>Operaciones de mantenimiento</p>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Actividad</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$aux = ''; $i = 1;
				foreach ($actividades as $actividad){
					?>
					<?php if($aux !== $actividad->actividad){?>
					<tr>
						<th scope="row"><?php echo $i; ?></th>
						<td><i class="fa fa-thumb-tack fa-fw"></i> <?php echo ' '.$actividad->actividad; ?>
						</td>
					</tr>
					<?php $i = $i + 1; } $aux = $actividad->actividad; ?>
					<?php } ?>
					<tr>
						<td></td>
						<td><a
							href="<?php echo base_url('index.php/mantenimiento/programa/'. $id);?>"
							class="btn btn-success btn-xs">Agregar actividad</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="bs-callout bs-callout-info" id="callout-pagination-label">
			<p>Detalle operaciones de mantenimiento semanal</p>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Actividad</th>
						<th>Semana</th>
						<th>#OT</th>
						<th>Fecha semana</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i = 1;
				$actividadAux = "";
				foreach ($actividades as $actividad){?>
					<tr>
						<th scope="row"><?php echo $i; ?></th>
						<td><i class="fa fa-thumb-tack fa-fw"></i> 
						<?php						
						if($actividadAux != $actividad->actividad){
						 $actividadAux = $actividad->actividad;
						 $i = 0;
						}
						echo $actividad->actividad;
						?>
						</td>
						<td><?php echo $actividad->semana; ?></td>
						<td><?php 
						echo ($actividad->orden_trabajo == 0)?'Pendiente':'Realizado';
						?>
						</td>
						<td><?php 
						$semana = (int)substr($actividad->semana, -2);
						$semanaCorrida = getStartAndEndDate($semana, $actividad->anio);
						echo 'Desde ' . $semanaCorrida['week_start'] . ' Hasta ' . $semanaCorrida['week_end'];
						?>
						</td>
					</tr>
					<?php $i = $i + 1; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

					<?php
					function getStartAndEndDate($week, $year) {
						$dto = new DateTime();
						$dto->setISODate($year, $week);
						$ret['week_start'] = $dto->format('d-m-Y');
						$dto->modify('+6 days');
						$ret['week_end'] = $dto->format('d-m-Y');
						return $ret;
					}
					?>					
				