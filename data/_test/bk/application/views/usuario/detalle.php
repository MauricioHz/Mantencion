<style>
.label {
	display: inline;
	padding: .2em .6em .3em;
	font-size: 75%;
	font-weight: 700;
	line-height: 1;
	color: #A6B2BD;
	text-align: center;
	white-space: nowrap;
	vertical-align: baseline;
	border-radius: .25em;
}
</style>
<div class="row">
	<div class="col-lg-6">
		<div class="bs-example" data-example-id="panel-with-list-group">
			<div class="panel panel-default">
				<div class="panel-heading">Mis datos</div>
				<div class="panel-body">
				    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.2 59.33" class="d-block mx-auto mb-2" width="64"><title>teams</title>
<path d="M5.49 47.04h-.14a1 1 0 0 1-.86-1.12 9.61 9.61 0 0 1 16.82-4.87 1 1 0 1 1-1.52 1.3 7.61 7.61 0 0 0-13.31 3.84 1 1 0 0 1-.99.85z" fill="#79b8ff"></path><path d="M13.99 39.67a7.12 7.12 0 1 1 7.12-7.12 7.13 7.13 0 0 1-7.12 7.12zm0-12.24a5.12 5.12 0 1 0 5.12 5.12 5.12 5.12 0 0 0-5.12-5.11zm46.24 19.61a1 1 0 0 1-1-.87 7.61 7.61 0 0 0-13.31-3.84 1 1 0 1 1-1.52-1.3 9.61 9.61 0 0 1 16.82 4.87 1 1 0 0 1-.86 1.13h-.14z" fill="#79b8ff"></path><path d="M51.71 39.67a7.12 7.12 0 1 1 7.12-7.12 7.13 7.13 0 0 1-7.12 7.12zm0-12.24a5.12 5.12 0 1 0 5.12 5.12 5.12 5.12 0 0 0-5.12-5.11z" fill="#79b8ff"></path><path d="M43.62 59.34a1 1 0 0 1-1-.89 9.73 9.73 0 0 0-9.78-8.59 9.87 9.87 0 0 0-9.79 8.47 1.01 1.01 0 1 1-2-.27 11.88 11.88 0 0 1 11.77-10.21 11.73 11.73 0 0 1 11.79 10.39 1 1 0 0 1-.89 1.1h-.11z" fill="#2088ff"></path><path d="M32.84 49.85a8.76 8.76 0 1 1 8.76-8.76 8.77 8.77 0 0 1-8.76 8.76zm0-15.52a6.76 6.76 0 1 0 6.76 6.76 6.77 6.77 0 0 0-6.76-6.75z" fill="#2088ff"></path><path d="M32.84 25.47a7.12 7.12 0 1 1 7.12-7.12 7.13 7.13 0 0 1-7.12 7.12zm0-12.24a5.12 5.12 0 1 0 5.12 5.12 5.12 5.12 0 0 0-5.12-5.11z" fill="#79b8ff"></path><path d="M39.86 29.08a1 1 0 0 1-.82-.42 7.61 7.61 0 0 0-12.39 0 1 1 0 0 1-1.63-1.16 9.61 9.61 0 0 1 15.65 0 1 1 0 0 1-.81 1.58z" fill="#79b8ff"></path><path d="M47.35 22.33a1 1 0 0 1-1-1V5.8a5.81 5.81 0 0 1 5.8-5.8h8.24a5.81 5.81 0 0 1 5.8 5.8v5.05c0 4-2.48 6.35-6.64 6.35h-6.67l-4.83 4.83a1 1 0 0 1-.7.3zm4.8-20.32a3.8 3.8 0 0 0-3.8 3.8v13.11l3.41-3.41a1 1 0 0 1 .71-.29h7.08c3.08 0 4.64-1.46 4.64-4.35V5.82a3.8 3.8 0 0 0-3.8-3.8h-8.24zM18.84 22.33a1 1 0 0 1-.71-.29l-4.83-4.8H6.63c-4.16 0-6.64-2.37-6.64-6.35V5.84a5.81 5.81 0 0 1 5.8-5.8h8.24a5.81 5.81 0 0 1 5.8 5.8v15.52a1 1 0 0 1-.99.97zm-13-20.32a3.8 3.8 0 0 0-3.8 3.8v5.05c0 2.88 1.56 4.35 4.64 4.35h7.03a1 1 0 0 1 .71.29l3.41 3.41V5.8a3.81 3.81 0 0 0-3.8-3.8H5.79z" fill="#2088ff"></path><circle cx="53.75" cy="8.66" r="1.41" fill="#2088ff"></circle><circle cx="59.11" cy="8.66" r="1.41" fill="#2088ff"></circle><circle cx="7.24" cy="8.66" r="1.41" fill="#2088ff"></circle><circle cx="12.6" cy="8.66" r="1.41" fill="#2088ff"></circle></svg>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><span class="label">ID</span> <?php echo $this->session->id_usuario; ?>
					</li>
					<li class="list-group-item"><span class="label">Usuario</span> <?php echo $this->session->usuario; ?>
					</li>
					</li>
					<li class="list-group-item"><span class="label">Habilitado</span> <?php echo $this->session->activo; ?>
					</li>
					<li class="list-group-item"><span class="label">Nombre usuario</span>
					<?php echo $this->session->nombre_usuario; ?>
					</li>
					<li class="list-group-item"><span class="label">Cargo</span> <?php echo $this->session->cargo; ?>
					</li>
					<li class="list-group-item"><span class="label">Correo</span> <?php echo $this->session->correo; ?>
					</li>
					<li class="list-group-item"><span class="label">Perfil</span> <?php echo $this->session->perfil; ?>
					</li>
					<li class="list-group-item"><span class="label">Modulo OC</span> <?php echo $this->session->modulo_oc; ?>
					</li>
					<li class="list-group-item"><span class="label">Modulo NC</span> <?php echo $this->session->modulo_nc; ?>
					</li>
					<li class="list-group-item"><span class="label">Modulo OT</span> <?php echo $this->session->modulo_ot; ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="bs-example" data-example-id="panel-with-list-group">
			<div class="panel panel-default">
				<div class="panel-heading">Panel heading</div>
				<div class="panel-body">
					<p>Some default panel content here. Nulla vitae elit libero, a
						pharetra augue. Aenean lacinia bibendum nulla sed consectetur.
						Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
						vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
			</div>
		</div>
	</div>
</div>
