<ul class="nav nav-tabs" id="myTabs" role="tablist">
	<li role="presentation"><a href="#home" id="home-tab"
		role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Próxima</a>
	</li>
	<li role="presentation" class="active"><a href="#profile" role="tab" id="profile-tab"
		data-toggle="tab" aria-controls="profile">Actual</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent" style="margin-top: 10px;">
	<div class="tab-pane fade" role="tabpanel" id="home"
		aria-labelledby="home-tab">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h3 class="panel-title pull-left" style="padding-top: 7.5px;">
						<?php echo $titulo; ?>
						</h3>
						<div class="btn-group pull-right">
							<a href="/mantenimiento/listar" class="btn btn-primary btn-sm">Listar
								ordenes de trabajo</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="" method="post">
							<div class="panel panel-default" style="margin-top: 10px;">
								<div class="panel-heading clearfix">
									<h3 class="panel-title pull-left"></h3>
									<!-- <div class="btn-group pull-left"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Agregar repuesto</button></div>-->
									<button id="btn-agregar-respuesto" type="button"
										name="btn-agregar" class="btn btn-success">Agregar repuesto</button>
								</div>
								<div class="panel-body" id="panel-repuesto">
									<div class="table-responsive">
										<table class="table" id="tabla-repuestos">
											<thead class="row">
												<tr>
													<th class="col-md-1">#</th>
													<th class="col-md-1">Código</th>
													<th class="col-md-6">Repuesto</th>
													<th class="col-md-1">Cantidad</th>
													<th class="col-md-1">Stock</th>
													<th class="col-md-1">Saldo</th>
													<th class="col-md-1">Acciones</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $id; ?>"> <input
								type="hidden" name="ciclo" value="2">
							<button type="button" class="btn btn-success">Enviar datos</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade in active" role="tabpanel" id="profile"
		aria-labelledby="profile-tab">

		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h3 class="panel-title pull-left" style="padding-top: 7.5px;">
						<?php echo $titulo; ?>
							(VERSION SIMPLIFICADA)
						</h3>
						<div class="btn-group pull-right">
							<a href="/mantenimiento/listar" class="btn btn-primary btn-sm">Listar
								ordenes de trabajo </a>
						</div>
					</div>
					<div class="panel-body">
						<form action="mantencion/agregar_repuestos" method="post">
							<div class="panel panel-default" style="margin-top: 10px;">
								<div class="panel-heading clearfix">
									<h3 class="panel-title pull-left"></h3>
									<!-- <div class="btn-group pull-left"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Agregar repuesto</button></div>-->
									<button id="btn-agregar-respuesto-simple" type="button"
										name="btn-agregar" class="btn btn-success">Agregar repuesto</button>
								</div>
								<div class="panel-body" id="panel-repuesto-simple">
									<div class="table-responsive">
										<table class="table" id="tabla-repuestos-simple">
											<thead class="row">
												<tr>
													<th class="col-md-6">Repuesto</th>
													<th class="col-md-1">Cantidad</th>
													<th class="col-md-1">Acciones</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $id; ?>"> 
							<input type="hidden" name="ciclo" value="2">
							<input type="hidden" name="componente" value="2">
							<button type="submit" class="btn btn-success">Enviar datos</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php

?>