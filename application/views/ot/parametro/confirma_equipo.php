<style>
.atributo {
	font-weight: normal;
	color: #056FCC;
}
</style>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h4 class="panel-title pull-left">Resultado ingreso datos</h4>
				<div class="btn-group pull-right">
					<a
						href="<?php echo base_url('index.php/parametro/listar_equipo');?>"
						class="btn btn-success btn-sm">Listar equipos o actividades</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td>ID</td>
						<td class="atributo"><?php echo $id; ?></td>
					
					
					<tr>
						<td>Equipo</td>
						<td class="atributo"><?php echo $equipo; ?></td>
					
					
					<tr>
						<td>Area</td>
						<td class="atributo"><?php echo $area; ?></td>
				   <tr>
						<td>Sub-Area</td>
						<td class="atributo"><?php echo $subarea; ?></td>
					
					<tr>
						<td>Plan</td>
						<td class="atributo"><?php echo $plan; ?></td>
					</tr>

					<tr>
						<td>Observación</td>
						<td class="atributo"><?php echo $observacion; ?></td>
					</tr>
				</table>
			</div>
			<div class="panel-footer clearfix">
				<div class="btn-group pull-left">
					<a
						href="<?php echo base_url('index.php/mantenimiento/programa/'.$id); ?>"
						class="btn btn-warning btn-sm">Crear plan de Mantención</a>
				</div>
			</div>
		</div>
	</div>
</div>
