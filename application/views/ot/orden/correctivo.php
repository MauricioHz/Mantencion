<style>
.active {
	/*font-weight: bold;*/
	color: #16288c;
}

.panel-default>.panel-heading {
	color: #110eb7;
}

.panel-content-tab {
	margin-top: 0px;
	border-top: 0px;
}

.panel {
	border-top-right-radius: 0px;
	border-top-left-radius: 0px;
}
.badge{background-color: #0F26C7;}
</style>
<?php if($success){ ?>
<p>datos ingresados ...</p>
<?php } ?>

<?php if(!$success){ ?>
<div class="row">
	<form class="form-horizontal"
		action="<?php echo base_url('index.php/mantenimiento/correctivo'); ?>"
		method="POST">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading text-center">Mantención Correctiva</div>
				<div class="panel-body">
					<ul class="nav nav-tabs" id="myTabs" role="tablist">
						<!-- menu class="active"-->
						<li role="presentation" class="active"><a href="#paso1"
							id="home-tab" role="tab" data-toggle="tab" aria-controls="paso1"
							aria-expanded="true"><span class="badge">1</span> Datos mantención correctiva</a></li>
						<li role="presentation"><a href="#paso2" role="tab"
							id="profile-tab" data-toggle="tab" aria-controls="paso2"><span class="badge">2</span> Datos
								actividad</a></li>
						<?php if($ciclo != 1){?>
						<li role="presentation"><a href="#paso3" role="tab"
							id="profile-tab" data-toggle="tab" aria-controls="paso3"><span class="badge">3</span>
								Repuestos utilizados</a></li>
						<?php } ?>		
						<li role="presentation"><a href="#paso4" role="tab"
							id="profile-tab" data-toggle="tab" aria-controls="paso4"><span class="badge">4</span>
								Confirmar</a></li>
					</ul>
					<!-- contenido -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade active in" role="tabpanel" id="paso1"
							aria-labelledby="paso1-tab">
							<div class="panel panel-default panel-content-tab">
								<div class="panel-body" style="margin-top: 10px;">
									<div class="form-group">
										<label class="col-sm-4 control-label">Plan de mantenimiento</label>
										<div class="col-sm-8">
											<p class="form-control-static"><?php echo $equipo->nombre_plan; ?></p>
										</div>
									</div>									
									<div class="form-group">
										<label class="col-sm-4 control-label">Area</label>
										<div class="col-sm-8">
											<p class="form-control-static"><?php echo $equipo->area; ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Subárea</label>
										<div class="col-sm-8">
											<p class="form-control-static"><?php echo $equipo->subarea; ?></p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Equipo</label>
										<div class="col-sm-8">
											<p class="form-control-static">
											<?php echo $equipo->equipo_actividad; ?>
											</p>
										</div>
									</div>									
									<div class="form-group">
										<label class="col-sm-4 control-label">Fecha inicio</label>
										<div class="col-sm-4">
											<input id="fecha-inicio" name="fecha-inicio" type="date"
												class="form-control input-md">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Fecha termino</label>
										<div class="col-sm-4">
											<input id="fecha-termino" name="fecha-termino" type="date"
												class="form-control input-md">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" role="tabpanel" id="paso2"
							aria-labelledby="paso2-tab">
							<div class="panel panel-default panel-content-tab">
								<div class="panel-body">
									<div class="panel-body">
										<div class="form-group">
											<label class="col-md-2 control-label" for="descripcion">Descripción</label>
											<div class="col-md-10">
												<textarea class="form-control" id="descripcion"
													name="descripcion"
													placeholder="Descripción de la actividad" maxlength="400"></textarea>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-md-2 control-label" for="observaciones">Observaciones</label>
											<div class="col-md-10">
												<textarea class="form-control" id="observaciones"
													name="observaciones"
													placeholder="Observaciones de la actividad" maxlength="400"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php if($ciclo !== 1){?>
						<div class="tab-pane fade" role="tabpanel" id="paso3"
							aria-labelledby="paso3-tab">
							<div class="panel panel-default panel-content-tab">
								<div class="panel-body">
									<button id="btn-agregar-respuesto" type="button"
										name="btn-agregar" class="btn btn-success">Agregar repuesto</button>
									<div class="panel-body" id="panel-repuesto">
										<div class="table-responsive">
											<table class="table" id="tabla-repuestos">
												<thead class="row">
													<tr>
														<th class="col-md-2">Cantidad</th>
														<th class="col-md-6">Repuesto</th>
														<th class="col-md-4">Acciones</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="tab-pane fade" role="tabpanel" id="paso4"
							aria-labelledby="paso4-tab">
							<div class="panel panel-default panel-content-tab">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4 col-lg-offset-2">
											<label class="control-label" for="tecnico">Técnico</label> <select
												id="tecnico" name="tecnico" class="form-control">
												<option value="1">PRUEBA_1</option>
												<?php foreach ($usuarios as $usuario) { ?>
												<?php if ($usuario->modulo_ot == '1100' && $usuario->perfil != 'global') { ?>
												<option value="<?php echo $usuario->id_usuario; ?>">
												<?php echo $usuario->nombre_usuario; ?>
												</option>
												<?php } ?>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-4">
											<label class="control-label" for="supervisor">Supervisor</label>
											<select id="supervisor" name="supervisor"
												class="form-control">
												<option value="2">PRUEBA_2</option>
												<?php foreach ($usuarios as $usuario) { ?>
												<?php if ($usuario->modulo_ot == '1111' && $usuario->perfil != 'global') { ?>
												<option value="<?php echo $usuario->id_usuario; ?>">
												<?php echo $usuario->nombre_usuario; ?>
												</option>
												<?php } ?>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<hr>
								<div class="panel-body text-center">
									<div class="row">
										<div class="col-lg-12">
											<input type="hidden" name="ciclo" value="1"> <input
												type="hidden" name="id-equipo"
												value="<?php echo $equipo->id_equipo; ?>"> <input
												type="hidden" name="id-area"
												value="<?php echo $equipo->id_area; ?>"> <input
												type="hidden" name="id-subarea"
												value="<?php echo $equipo->id_sub_area; ?>">
											<button type="submit" class="btn btn-success">Enviar datos
												orden de trabajo</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?php } ?>

<?php var_dump($equipo); ?>
