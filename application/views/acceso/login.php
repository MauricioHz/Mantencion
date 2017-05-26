<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb18030">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="assets/imagen/favicon/favicon.ico">
<title>Acceso</title>
<link
	href="<?php echo base_url('assets/css/bootstrap4/bootstrap.min.css') ?>"
	rel="stylesheet">
<style>
body {
	background-color: #f9f9f9;
	overflow-x: hidden;
}

.nav-tabs {
	margin-bottom: 1rem;
}

.jumbotron {
	background-color: #fafafa;
}

.jumbotron H1 {
	color: #0ea414;
}

.swag-line:before {
	content: '';
	position: absolute;
	display: block;
	top: 0;
	left: 0;
	right: 0;
	height: 5px;
	z-index: 2;
	background-color: #0275d8;
	background: -webkit-linear-gradient(45deg, #c6d1db, #0275d8);
	background: linear-gradient(45deg, #5d9ed6, #0275d8);
}

.jumbotron {
	position: relative;
	background: #fff url("/assets/image/hero_large.jpg") center center;
	width: 100%;
	height: 100%;
	background-size: cover;
	overflow: hidden;
}

.jumbotron {
	margin-bottom: 1rem;
}
</style>
</head>
<body class="swag-line template-index">
	<div class="row">
		<div class="col-lg-12">
			<div class="jumbotron jumbotron-fluid text-xs-center">
				<div class="container">
					<h1 class="display-3">
						<img
							src="http://compras.mobagricola.cl/assets/images/Logo_asml.gif"
							alt="Responsive image" class="img-thumbnail">
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card text-xs-center">
					<div class="card-block">
					<?php if(isset($registrado)){?>
					<?php if($registrado == FALSE){?>
						<div class="row">
							<div class="col-lg-6 offset-lg-3">
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert"
										aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<strong>¡Info!</strong> Usuario no registrado.
								</div>
							</div>
						</div>
						<?php } ?>
						<?php }?>
						<?php if($finalizado){ ?>
						<div class="row">
							<div class="col-lg-6 offset-lg-3">
								<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert"
										aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
									<strong>¡Info!</strong> Sesión finalizada.
								</div>
							</div>
						</div>
						<?php } ?>
						<p class="card-text">Acceso a gestión integral ASML</p>
						<div class="col-lg-4 offset-lg-4">
							<form action="<?php echo base_url('index.php/acceso/login') ?>"
								method="post">
								<div class="form-group">
									<input type="text" class="form-control" id="usuario"
										name="usuario" placeholder="Nombre de usuario" maxlength="20"
										required>
								</div>
								<div class="form-group">
									<input type="password" name="clave" class="form-control"
										id="clave" maxlength="4" required>
								</div>
								<button type="submit" class="btn btn-primary">Acceder</button>
							</form>

						</div>
					</div>
					<div class="card-block">
						<a href="#" class="card-link">ASML 2017</a> <a href="#"
							class="card-link">www.mobagricola.cl</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script
		src="<?php echo base_url('assets/js/bootstrap4/bootstrap.min.js') ?>"></script>
</body>
</html>