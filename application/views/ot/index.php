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
      <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/docs.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/css/mantencion/mantencion.app.css'); ?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/font-awesome-4.0.3/css/font-awesome.min.css'); ?>" rel="stylesheet">
      <script type="text/javascript">
         var baseUrl = document.location.origin + '/index.php/';
         var urlParametroEditarArea = baseUrl + 'parametro/editar_area/';
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
               <a class="navbar-brand" href="#">ASML Mantenimiento</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="<?php echo base_url('index.php/mantenimiento'); ?>">Inicio</a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Orden de trabajo<span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="dropdown-header">Equipo</li>
                        <li><a
                           href="<?php echo base_url('index.php/parametro/crear_equipo'); ?>"><i
                           class="fa fa-tablet" style="color: #0366d6;"></i> Ingresar
                           equipos</a>
                        </li>
                        <li><a
                           href="<?php echo base_url('index.php/parametro/listar_equipo'); ?>"><i
                           class="fa fa-tablet" style="color: #0366d6;"></i> Listar
                           equipos/actividad</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Orden de trabajo</li>                      
                        <!--<li>
                           <a href="<?php echo base_url('index.php/mantenimiento/semana'); ?>"><i class="fa fa-thumb-tack" style="color: green;"></i> Programa semanal</a>
                        </li> -->
                        <li>
                           <a href="<?php echo base_url('index.php/mantenimiento/programasemana'); ?>"><img src="/assets/image/user.svg" width="25" height="25">  Programa semanal (test)</a>
                        </li>
                        <li><a
                           href="<?php echo base_url('index.php/mantenimiento/listar'); ?>"><i class="fa fa-list" style="color: green;"></i> Listar
                           ordenes de trabajo</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Costos</li>
                        <li><a
                           href="<?php echo base_url('index.php/mantenimiento/costo'); ?>">Costos
                           de mantención</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Indicadores de desempeño</li>
                        <li><a
                           href="<?php echo base_url('index.php/mantenimiento/indicador'); ?>"><i class="fa fa-foursquare" style="color: green;"></i> Cumplimiento
                           Programa de Mantención Preventivo</a>
                        </li>
                     </ul>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Parámetros<span class="caret"></span> </a>
                     <ul class="dropdown-menu">
                        <li class="dropdown-header">Planes de mantención</li>
                        <li><a href="<?php echo base_url('index.php/plan/crear'); ?>">Ingresar
                           plan de mantención</a>
                        </li>
                        <li><a href="<?php echo base_url('index.php/plan/listar'); ?>">Listar
                           planes de mantención</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Parámetros</li>
                        <li><a
                           href="<?php echo base_url('index.php/parametro/listar_area'); ?>">Areas</a>
                        </li>
                     </ul>
                  </li>
                  <li><a
                     href="<?php echo base_url('index.php/mantenimiento/manual'); ?>">Manuales
                     normativa</a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-circle" style="color: #05B905;"></i> <?php
                        echo $this->session->email;
                        ?> <span class="caret"></span> </a>
                     <ul class="dropdown-menu">
                        <li class="dropdown-header">Sesión</li>
                        <li><a
                           href="<?php echo base_url('index.php/acceso/modulo.html'); ?>"><i class="fa fa-laptop" style="color: green;"></i> Modulos</a></li>
                        <?php if ($this->session->userdata('modulo_ot') == '1111') { ?>
                        <li><a
                           href="<?php echo base_url('index.php/usuario/detalle'); ?>"><i class="fa fa-user" style="color: green;"></i> Detalle
                           Usuario</a>
                        </li>
                        <?php } ?>
                        <li><a href="<?php echo base_url('index.php/acceso/logout'); ?>"><i class="fa fa-circle" style="color: red;"></i> Cerrar
                           sesión</a>
                        </li>
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
      <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/dataTables.bootstrap.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/mantencion/mantencion.app.js'); ?>"></script>
   </body>
</html>