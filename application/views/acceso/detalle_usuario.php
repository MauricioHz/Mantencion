<div class="bs-example" data-example-id="panel-with-list-group">
	<div class="panel panel-default">
		<div class="panel-heading">Panel heading</div>
		<ul class="list-group">
			<li class="list-group-item">Cras justo odio</li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Morbi leo risus</li>
			<li class="list-group-item">Porta ac consectetur ac</li>
			<li class="list-group-item">Vestibulum at eros</li>
			<li class="list-group-item"><?php echo $this->session->id_usuario; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->usuario; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->clave; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->clave2; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->activo; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->cookie; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->nombre_usuario; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->cargo; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->correo; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->perfil; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->modulo_oc; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->modulo_nc; ?>
			</li>
			<li class="list-group-item"><?php echo $this->session->modulo_ot; ?>
			</li>
		</ul>
	</div>
</div>
