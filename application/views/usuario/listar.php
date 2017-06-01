<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre Usuario</th>
					<th>Usuario</th>
					<th>Perfil</th>
					<th>Mod-OC</th>
					<th>Mod-NC</th>
					<th>Mod-OT</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($usuarios as $usuario){ ?>
				<tr>
					<td><?php echo $usuario->nombre_usuario; ?>
					</td>
					<td><?php echo $usuario->usuario; ?>
					</td>
					<td><?php echo $usuario->perfil; ?>
					</td>
					<td><?php echo $usuario->modulo_oc; ?>
					</td>
					<td><?php echo $usuario->modulo_nc; ?>
					</td>
					<td><?php echo $usuario->modulo_ot; ?>
					</td>
					<td>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button"
								id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="true">
								Acciones <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="<?php echo base_url('index.php/usuario/editar/datos/').$usuario->id_usuario;?>">Modificar</a>
								</li>
								<li><a href="<?php echo base_url('index.php/usuario/editar/inhabilitar/').$usuario->id_usuario;?>">Inhabilitar</a>
								</li>
								<li><a href="<?php echo base_url('index.php/usuario/editar/clave/').$usuario->id_usuario;?>">Cambiar clave</a>
								</li>
							</ul>
						</div></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

				<?php

				$perfil = $this->session->userdata('perfil');
				$mod_oc = $this->session->userdata('modulo_oc');
				$mod_nc = $this->session->userdata('modulo_nc');
				$mod_ot = $this->session->userdata('modulo_ot');

				?>

				<?php if($this->session->userdata('perfil') == 'global'){ ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Código</th>
					<th>Perfil</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1111</td>
					<td>Administrador</td>
				</tr>
				<tr>
					<td>1000</td>
					<td>Usuario</td>
				</tr>
				<tr>
					<td>1100</td>
					<td>Técnico</td>
				</tr>
				<tr>
					<td>1110</td>
					<td>Supervisor</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
				<?php } ?>