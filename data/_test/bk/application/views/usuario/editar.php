<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Editar datos del usuario</div>
			<div class="panel-body">
			<?php echo $usuario->nombre_usuario; ?>
			</div>
		</div>
	</div>
</div>

			<?php if($accion == 'datos'){ ?>

			<?php } ?>

			<?php if($accion == 'inhabilitar'){ ?>

			<?php } ?>

			<?php if($accion == 'clave'){ ?>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Cambiar clave de usuario</div>
			<div class="panel-body"> 
				<form class="form-horizontal" action="" method="">
				       <div class="form-group">
						<label class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10">
							<p class="form-control-static">
							<?php echo $usuario->nombre_usuario; ?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<p class="form-control-static">
							<?php echo $usuario->correo; ?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="nueva-password" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" id="nueva-password" name="nueva-password"
								placeholder="Clave de usuario" maxlength="4" required>
						</div>
					</div>
					<div class="form-group">
						<label for="confirmar-password" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" id="confirmar-password" name="confirmar-password"
								placeholder="Repetir clave de usuario ..." maxlength="4" required>
						</div>
						<div class="col-sm-4">
						    <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
						</div>  
					</div>
                    <div class="form-group">						
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" class="btn btn-primary">Enviar</button>
						</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
							<?php } ?>