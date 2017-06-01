<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/imagen/favicon.ico">
        <title>Modulos</title>
        <link href="<?php echo base_url('assets/css/bootstrap46/bootstrap.min.css') ?>"	rel="stylesheet">
        <link href="<?php echo base_url('assets/font-awesome-4.0.3/css/font-awesome.min.css') ?>" rel="stylesheet">	
        <style>
            body{background-color:#f9f9f9;overflow-x:hidden;}
            .nav-tabs{margin-bottom:1rem;}
            .jumbotron{background-color:#fafafa;}
            .jumbotron H1{color:#0ea414;}
            .jumbotron{position:relative;background:#fff url("/assets/image/hero_large.jpg") center center;width:100%;height:100%;background-size:cover;overflow:hidden;}
            .jumbotron{margin-bottom:1rem;}
            .text-center{text-align:center !important;}
            .mod-compras{color:red;}
            .mod-gestion{color:#03a93a;}
            .mod-mantenimiento{color:#0275d8;}
            .btn-gestion{color:#fff;background-color:#32c563;border-color:#32c563;padding:6px 20px;}
            .btn-mantencion{color:#fff;background-color:#02a2e1;border-color:#02a2e1;padding:6px 20px;}
            .btn-compras{color:#fff;background-color:#f86859;border-color:#f86859;padding:6px 20px;}
            .shadow-nav{-webkit-box-shadow:0 8px 6px -6px #999;-moz-box-shadow:0 8px 6px -6px #999;box-shadow:0 8px 6px -6px #999;}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-light shadow-nav">
            <button class="navbar-toggler navbar-toggler-right" type="button"
                    data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">ASML</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#">Inicio <span
                                class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Usuario </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo base_url('index.php/acceso/logout'); ?>"><i class="fa fa-circle" style="color: red;"></i> Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron jumbotron-fluid text-xs-center">
                    <div class="container">
                        <h1 class="display-3"></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 offset-lg-1">
                    <div class="card text-center">
                        <div class="card-header mod-compras">Ordenes de compra</div>
                        <div class="card-block">
                            <form
                                action="http://compras.mobagricola.cl/test.php"
                                method="post">
                                <h4 class="card-title">Módulo</h4>
                                <p class="card-text">Gestión de compras.</p>
                                <input type="hidden" name="modulo" value="oc">
                                <input type="hidden" name="accion" value="acceder">
                                <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                                <input type="hidden" name="clave" value="<?php echo $_SESSION['clave']; ?>">
                                <button type="submit" class="btn btn-primary btn-sm btn-compras">Acceder</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-header mod-gestion">No Conformidades</div>
                        <div class="card-block">
                            <h4 class="card-title">Módulo</h4>
                            <p class="card-text">Gestión de calidad.</p>
                            <a href="http://www.example.com/gestion" class="btn btn-primary btn-sm btn-gestion">Acceder</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header mod-mantenimiento">Ordenes de Trabajo</div>
                        <div class="card-block">
                            <h4 class="card-title">Módulo</h4>
                            <p class="card-text">Gestión del mantenimiento.</p>
                            <form action="<?php echo site_url('acceso/mantencion'); ?>"
                                  method="post">
                                <input type="hidden" name="modulo" value="mantencion">
                                <button type="submit" class="btn btn-primary btn-sm btn-mantencion">Acceder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <div class="card text-center">
                        <div class="card-header">Pagina Web</div>
                        <div class="card-block">
                            <h4 class="card-title">Sitio</h4>
                            <a href="http://pruebas.mobagricola.cl/sitio/" class="btn btn-primary btn-sm">Acceder</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card text-center">
                        <div class="card-header">Maps</div>
                        <div class="card-block">
                            <h4 class="card-title">Google Maps</h4>
                            <p class="card-text">Gestión</p>
                            <a href="http://www.example.com/maps" class="btn btn-primary btn-sm">Acceder</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>	
        <script	src="<?php echo base_url('assets/js/bootstrap46/bootstrap.min.js') ?>"></script>
    </body>
</html>