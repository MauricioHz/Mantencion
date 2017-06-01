<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #039;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	h2 {
		padding-bottom: 0.3em;
		font-size: 1.5em;
		border-bottom: 1px solid #eaecef;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

	<div id="container">
		<h1>Welcome to CodeIgniter!</h1>

		<div id="body">
			<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

			<p>If you would like to edit this page you'll find it located at:</p>
			<code>application/views/welcome_message.php</code>

			<p>The corresponding controller for this page is found at:</p>
			<code>application/controllers/Welcome.php</code>

			<p>Si está explorando CodeIgniter por primera vez, debe comenzar leyendo la <a href="user_guide/">User Guide</a>.</p>
		</div>

		<h1>Documentación de desarrollo</h1>
		<div id="body">
			<h2>Procedimientos almacenados</h2>
			<p>Los procedimientos deben nombrarse de la siguiente forma:</p>
			<p><em>sp_[modulo]_[accion]</em>, por ejemplo:</p>
			<code>sp_ot_listar_equipos</code>

			<h2>Modelo</h2>
			<p>Los nombres de las acciones del modelo deben ser de la siguiente forma:</p>
			<p><em>[accion]_[entidad]_model(){}</em>, por ejemplo:</p>
			<code>public function crear_producto_model(){}</code>
			<code>public function crear_producto_model(Producto_model $producto){ return 1; }</code>

			<h2>Controlador</h2>
			<p>Los nombres de las acciones del controlador deben ser de la siguiente forma:</p>
			<p><em>public function [accion](){}</em>, por ejemplo:</p>
			


			<code>public function crear(){}<br>public function listar(){}<br>public function buscar(){}<br>public function actualizar(){}<br>public function eliminar(){}</code>
			
			<h2>Vistas</h2>
			<p>Las vistas deberán estar contenidas en una carpeta con el nombre de entidad, por ejemplo:</p>
			Producto/
			<ul>
				<li>crear</li>
				<li>listar</li>
				<li>buscar</li>
				<li>actualizar</li>
				<li>eliminar</li>
			</ul>

<h1>Base de datos</h1>

			<h2>Tablas</h2>
			<p>Los nombres de las tablas deben ser de la siguiente forma:</p>
			<em>[modulo]_[entidad]</em>
<ul>
				<li>gestion_[entidad]</li>
				<li>ordencomra_[entidad]</li>
				<li>mantencion_[entidad]</li>
			</ul>	

<h1>Estilos</h1>
			<h2>CSS</h2>
<p>Panel</p>
<a href="https://github.com/bcit-ci/CodeIgniter4/network/dependents">Pabel Github</a><br>
<a href="https://github.myshopify.com/cart">Pabel2 Github</a><br>

		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

</body>
</html>