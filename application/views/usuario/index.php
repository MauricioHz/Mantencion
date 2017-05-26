<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">
<title>Mantenimiento</title>
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"
	rel="stylesheet">
<link href="<?php echo base_url('assets/css/docs.css'); ?>"
	rel="stylesheet">
<link
	href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>"
	rel="stylesheet">
<link
	href="<?php echo base_url('assets/font-awesome-4.0.3/css/font-awesome.min.css'); ?>"
	rel="stylesheet">
<style>


#myTabsemana li.active {
	border-top: 2px #056FCC solid;
	border-radius: 4px 4px 0 0;
}

.dropdown-menu {
	border: 3px solid #6F42C1 /*#056FCC*/;
}

body {
	min-height: 2000px;
	padding-top: 70px;
	/*background-color: #fafafa;*/
	background-color: #fff;
}

.navbar-default {
	background-color: #FAFBFC;
}

.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:focus,.navbar-default .navbar-nav>.active>a:hover
	{
	color: #6f42c1 /*#056FCC*/;
	font-weight: bold;
	background-color: rgba(111, 66, 193, 0.05); /*#e7e7e7*/;
	border-bottom: 3px solid;
}

.navbar-default .navbar-nav>li>a {
	color: #6f42c1 /*#055da9*/;
}

.navbar-default .navbar-brand {
	color: #6f42c1 /*#056FCC*/;
}



.bs-example:after {
	content: "ASML";
}

/*estilos github*/
.panel-default>.panel-heading {
	color: #333;
	background-color: #fafbfc;
	border-color: #e1e4e8;
}

.shadow-nav {
    -webkit-box-shadow: 0 8px 6px -6px #999;
    -moz-box-shadow: 0 8px 6px -6px #999;
    box-shadow: 0 8px 6px -6px #999;

    /* the rest of your styling */
}

.navbar-fixed-top {
    border-width: 0 0 0px;
}
</style>
<script type="text/javascript">
            var urlSitio = "http://sistema.mobagricola.cl/";

        </script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top shadow-nav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">ASML Usuarios</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="http://sistema.mobagricola.cl/">Inicio</a>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Usuarios<span class="caret"></span> </a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Usuario</li>
							<li><a href="<?php echo base_url('index.php/usuario/listar'); ?>">Listar
									Usuarios</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false"> <?php
						echo $this->session->email;
						?> <span class="caret"></span> </a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Sesión</li>
							<li><a
								href="<?php echo base_url('index.php/acceso/modulo.html'); ?>">Módulo</a>
							</li>
							<li><a
								href="<?php echo base_url('index.php/acceso/logout.html'); ?>">Cerrar
									sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
	<?php
	if (isset($data)) {
		$this->load->view($contenido, $data = NULL);
	} else {
		$this->load->view($contenido);
	}
	?>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">OT</h4>
				</div>
				<div class="modal-body">
					<p>Aplicación en desarrollo</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
	<script
		src="<?php echo base_url('assets/js/dataTables.bootstrap.js'); ?>"></script>
	<script>
        $(document).ready(function () {
            var url = document.URL;
            var baseUrl = "http://sistema.mobagricola.cl/index.php";
            
            $("#confirmar-password").keyup(checkPasswordMatch);
            function checkPasswordMatch() {
                var password = $("#nueva-password").val();
                var confirmPassword = $("#confirmar-password").val();
                if (password !== confirmPassword){
                    $("#divCheckPasswordMatch").html('<p style="color:red">¡La clave no es igual!</p>');
                }else{
                    $("#divCheckPasswordMatch").html('<p style="color:green">¡La clave es igual!</p>');
                }
            }
            
        });
    </script>
</body>
</html>
