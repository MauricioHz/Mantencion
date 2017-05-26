<?php var_dump($equipo)?>

<?php echo $equipo->nombre_plan;?>

<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="bs-callout bs-callout-info" id="callout-pagination-label">
			<p>Datos equipo</p>
		</div>
		<?php echo 'Agregar actividad de mantencion al equipo : EQ' . $id; ?>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
					<tr><td>Codigo equipo</td><td><?php echo 'EQ'.$id; ?></td></tr>					
					<tr><td>Equipo</td><td><?php echo $equipo->equipo_actividad; ?></td></tr>
					<tr><td>Plan de mantención</td><td><?php echo $equipo->nombre_plan; ?></td></tr>
					<tr><td>Area</td><td><?php echo $equipo->area; ?></td></tr>
					<tr><td>Subárea</td><td><?php echo $equipo->subarea; ?></td></tr>
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
						<td><i class="fa fa-thumb-tack fa-fw"></i> <?php echo ' '.$actividad->actividad; ?></td>
					</tr>
					<?php $i = $i + 1; } $aux = $actividad->actividad; ?>
					<?php } ?>
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
						<th><?php echo $i; ?></th>
						<th>Actividad</th>
						<th>Semana</th>
						<th>OT</th>
						<th>Fecha semana</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i = 1;
				foreach ($actividades as $actividad){?>
					<tr>
						<th scope="row">1</th>
						<td><i class="fa fa-thumb-tack fa-fw"></i> <?php echo $actividad->actividad; ?></td>
						<td><?php echo $actividad->semana; ?></td>
						<td><?php echo $actividad->orden_trabajo; ?></td>
						<td><?php echo $actividad->anio; ?></td>
						<td><?php echo $actividad->id_equipo; ?></td>
					</tr>
					<?php $i = $i + 1; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
