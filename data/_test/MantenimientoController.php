<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('programa_model');
        $this->load->model('parametro_model');
        $this->load->model('plan_model');
        $this->load->model('mantencion_model');
        $this->load->model('registro_model');
        $this->load->library('session');
        $this->load->library('pdf');
        $this->load->library('notificar');
        $this->load->model('usuario_model');
    }

    public function index() {
        //$semana = $this->obtenerSemanaActual();
        //$d = $this->mantencion_model->obtener_registros_pendientes_model('SEM'.$semana);
        //$data['registros_pendientes'] = $d;
        $data['resumen'] = $this->parametro_model->listar_resumen_model();
        $data['contenido'] = 'ot/bienvenida';
        $this->load->view('ot/index', $data);
    }

    // mantenimiento/ordentrabajo/4
    public function ordentrabajo() {
        $data['no_encontrado'] = FALSE;
        $id = $this->uri->segment(3);
        $semana = $this->uri->segment(4);
        if (is_numeric($id)) {
            $entidad = new Programa_model();
            $entidad->id_equipo = $id;
            $entidad->semana = $semana;
            $data_equipo = $this->programa_model->buscar_semana_mantencion_model($entidad);
            $data['usuarios'] = $this->usuario_model->listar_usuarios_model();
            $data['equipo_actividad'] = $data_equipo;
            if ($data_equipo) {
                $data['id_area'] = $data_equipo->id_area;
                $data['id_equipo'] = $data_equipo->id_equipo;
                $data['equipo_actividad'] = $data_equipo->equipo_actividad;
                //$data['observacion'] = $data_equipo->observacion;
                $data['semana'] = $data_equipo->semana;
            } else {
                $data['no_encontrado'] = TRUE;
            }
        } else {
            $data['no_encontrado'] = TRUE;
        }
        $data['contenido'] = 'ot/orden/asistente';
        $this->load->view('ot/index', $data);
    }

    public function crear_orden() {
        $data['existe_area'] = FALSE;
        $data['valida_proceso_repuestos'] = FALSE;
        $data['valida_proceso_orden'] = FALSE;
        // Asegurar que ningun campo este en blanco para orden y detalle.
        if ($_SESSION['submit'] == 1) {
            $_SESSION['submit'] = 0;
            $objeto = new Mantencion_model();
            $id_equipo = $this->input->post('id_equipo');
            $id_area = $this->input->post('id_area');
            $objeto->id_equipo = $id_equipo;
            $objeto->id_area = $id_area;
            $objeto->sector = trim($this->input->post('sector'));
            $objeto->elemento = trim($this->input->post('elemento'));
            $objeto->pabellon = trim($this->input->post('pabellon'));
            $objeto->atril = trim($this->input->post('atril'));
            $objeto->fecha_inicio = $this->input->post('fecha-inicio');
            $objeto->fecha_termino = $this->input->post('fecha-termino');
            $objeto->tipo_mantencion = $this->input->post('tipo-mantencion');
            $objeto->descripcion = trim($this->input->post('descripcion'));
            $objeto->observacion = trim($this->input->post('observaciones'));
            $objeto->tecnico = $this->input->post('tecnico');
            $objeto->supervisor = $this->input->post('supervisor');
            $semana = $this->input->post('semana');
            $objeto->semana = $semana;
            $sp = $this->mantencion_model->ingresar_orden_trabajo_model($objeto);
            $data_sp = explode(";", $sp->mensaje);
            $sp_mensaje = $data_sp[0];
            //
            $lista_cantidad = $this->input->post('cantidad');
            $lista_repuesto = $this->input->post('repuesto');
            // Detalle repuestos de la orden
            if ($sp_mensaje == 'OK_INGRESADO') {
                $resultado_id = $data_sp[1];
                if ($resultado_id > 0) {
                    $data['id'] = $resultado_id;
                    $data['semana'] = $semana;
                    $data['valida_proceso_orden'] = TRUE;
                    $j = count($lista_cantidad);
                    $k = 0;
                    for ($i = 0; $i < $j; $i++) {
                        $objeto->id_orden = $resultado_id;
                        $objeto->cantidad = $lista_cantidad[$i];
                        $objeto->repuesto = $lista_repuesto[$i];
                        $resultado = $this->mantencion_model->ingresar_detalle_repuestos_model($objeto);
                        if (!$resultado) {
                            echo 'Error insertando el registro de repuesto';
                            // log de registro errores
                        } else {
                            $k = $k + 1;
                        }
                    }
                    if ($j == $k) {
                        $data['valida_proceso_repuestos'] = TRUE;
                    }
                } else {
                    echo 'Error insertando datos de la orden';
                }
            } elseif ($sp_mensaje == 'SI_EXISTE') {
                $data['existe_area'] = TRUE;
            } else {
                // log de registro errores
            }
            $_SESSION['submit'] = 0;
            // Visor PDF
            $data['es_valido'] = TRUE;
            $data['contenido'] = 'ot/orden/pdf';
            $this->load->view('ot/index', $data);
        } else if ($_SESSION['submit'] == 0) {
            redirect('/mantenimiento/semana', 'refresh');
        }
    }

    public function programa() {
        $id = $this->uri->segment(3);
        // verificar que el segmento sea numerico...
        $data_equipo = $this->parametro_model->buscar_equipo_model($id);
        $data['id_equipo'] = $data_equipo->id_equipo;
        $data['id_area'] = $data_equipo->id_area;
        $data['equipo'] = $data_equipo->equipo_actividad;
        $data['area'] = $data_equipo->area;
        $data['subarea'] = $data_equipo->subarea;
        $data['observacion'] = $data_equipo->observacion;
        $data['fecha_registro'] = $data_equipo->fecha_registro;
        $data['nombre_plan'] = $data_equipo->nombre_plan;
        $data['id_plan'] = $data_equipo->id_plan;
        //$data['planes'] = $this->plan_model->listar_plan_model($id);

        $data['contenido'] = 'ot/programa/index';
        $this->load->view('ot/index', $data);
    }

    public function crear() {
        $data['resultado_crear'] = FALSE;
        $data['resultado_editar'] = FALSE;
        //
        $id = $this->input->post('id-equipo');
        if ($_SESSION['submit'] == 1) {
            $objeto = new Programa_model();
            $id_equipo = $this->input->post('id-equipo');
            $id_plan = $this->input->post('id-plan');
            $actividad = $this->input->post('actividad');
            foreach ($_POST['semana'] as $semana) {
                $objeto->id_equipo = $id_equipo;
                $objeto->id_plan = $id_plan;
                $objeto->semana = $semana;
                $objeto->actividad = $actividad;
                $resultado = $this->programa_model->ingresar_programa_model($objeto);
                if ($resultado) {
                    $data['resultado_crear'] = TRUE;
                    $data['resultado_editar'] = FALSE;
                }
            }
            $_SESSION['submit'] = 0;
        }
        // Retorno de datos
        $data['equipo'] = $this->parametro_model->buscar_equipo_model($id);
        $data['programa_semanal'] = $this->programa_model->buscar_plan_equipo_model($id);
        $data['contenido'] = 'ot/programa/crear';
        $this->load->view('ot/index', $data);
    }

    // Editar datos de la orden
    public function asistente_editar() {
        $data['no_encontrado'] = FALSE;
        $id_orden = $this->uri->segment(3);
        if (is_numeric($id_orden)) {
            $orden = $this->mantencion_model->buscar_orden_model($id_orden);
            $lista_repuestos = $this->mantencion_model->buscar_detalle_repuestos_model($id_orden);
            if ($orden) {
                $data['orden'] = $orden;
                $data['repuestos'] = $lista_repuestos;
                $data['usuarios'] = $this->usuario_model->listar_usuarios_model();
            } else {
                $data['no_encontrado'] = TRUE;
            }
        } else {
            $data['no_encontrado'] = TRUE;
        }
        $data['contenido'] = 'ot/orden/editar';
        $this->load->view('ot/index', $data);
    }

    // Procesa los datos para Editar datos de la orden
    public function procesar_orden() {
        $data['valida_proceso_repuestos'] = FALSE;
        $data['valida_proceso_orden'] = FALSE;
        // Asegurar que ningun campo este en blanco para orden y detalle.
        if ($_SESSION['submit'] == 1) {
            $objeto = new Mantencion_model();
            $id_equipo = $this->input->post('id_equipo');
            $id_area = $this->input->post('id_area');
            $objeto->id_equipo = $id_orden;
            $objeto->id_equipo = $id_equipo;
            $objeto->id_area = $id_area;
            $objeto->sector = trim($this->input->post('sector'));
            $objeto->elemento = trim($this->input->post('elemento'));
            $objeto->pabellon = trim($this->input->post('pabellon'));
            $objeto->atril = trim($this->input->post('atril'));
            $objeto->fecha_inicio = $this->input->post('fecha-inicio');
            $objeto->fecha_termino = $this->input->post('fecha-termino');
            $objeto->tipo_mantencion = $this->input->post('tipo-mantencion');
            $objeto->descripcion = trim($this->input->post('descripcion'));
            $objeto->observacion = trim($this->input->post('observaciones'));
            $objeto->tecnico = $this->input->post('tecnico');
            $objeto->supervisor = $this->input->post('supervisor');
            $objeto->semana = $this->input->post('semana');
            $resultado_id = $this->mantencion_model->actualizar_orden_trabajo_model($objeto);
            //
            $lista_cantidad = $this->input->post('cantidad');
            $lista_repuesto = $this->input->post('repuesto');
            // Detalle repuestos de la orden
            if ($resultado_id > 0) {
                $data['valida_proceso_orden'] = TRUE;
                $j = count($lista_cantidad);
                $k = 0;
                for ($i = 0; $i < $j; $i++) {
                    $objeto->id_orden = $resultado_id;
                    $objeto->cantidad = $lista_cantidad[$i];
                    $objeto->repuesto = $lista_repuesto[$i];
                    $resultado = $this->mantencion_model->ingresar_detalle_repuestos_model($objeto);
                    if (!$resultado) {
                        echo 'Error insertando el registro de repuesto';
                        // log de registro errores
                    } else {
                        $k = $k + 1;
                    }
                }
                if ($j == $k) {
                    $data['valida_proceso_repuestos'] = TRUE;
                }
            } else {
                echo 'Error insertando datos de la orden';
            }
            $_SESSION['submit'] = 0;
            // Visor PDF
            $data['id'] = $resultado_id;
            $data['es_valido'] = TRUE;
            $data['contenido'] = 'ot/orden/pdf';
            $this->load->view('ot/index', $data);
        }
    }

    public function eliminar_orden() {
        $data['success'] = FALSE;
        $id = $this->uri->segment(3);
        $semana = $this->uri->segment(4);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data['orden'] = $id;
            $data['semana'] = $semana;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->input->post('id-orden');
            $semana = $this->input->post('semana');
            $resultado = $this->mantencion_model->eliminar_orden_trabajo_model($id, $semana);
            if ($resultado->mensaje > 0) {
                $data['success'] = TRUE;
            }
        }
        $data['contenido'] = 'ot/orden/eliminar';
        $this->load->view('ot/index', $data);
    }

    public function editar() {
        $data['success'] = FALSE;
        $objeto = new Programa_model();
        $id_equipo = $this->input->post('id-equipo');
        $id_plan = $this->input->post('id-plan');
        $resultado = $this->programa_model->eliminar_programa_model($id_equipo);
        foreach ($_POST['semana'] as $semana) {
            $objeto->id_equipo = $id_equipo;
            $objeto->id_plan = $id_plan;
            $objeto->semana = $semana;
            $resultado = $this->programa_model->ingresar_programa_model($objeto);
            if ($resultado) {
                $data['resultado_editar'] = TRUE;
            }
        }
        // Retorno de datos
        $data['equipo'] = $this->parametro_model->buscar_equipo_model($id_equipo);
        $data['programa_semanal'] = $this->programa_model->buscar_plan_equipo_model($id_equipo);

        $data['contenido'] = 'ot/programa/resultado';
        $this->load->view('ot/index', $data);
    }

    public function listar() {
        $data['ordenes'] = $this->mantencion_model->listar_ordenes_model();
        $data['contenido'] = 'ot/orden/listar';
        $this->load->view('ot/index', $data);
    }

    public function autorizar() {
        // Se necesitan permisos de supervisor
        $this->verificarPermisos();
        $data['estado'] = FALSE;
        $data['httpPost'] = FALSE;
        $data['mensaje_aprobacion'] = 'PENDIENTE';
        //
        $id = $this->uri->segment(3);
        $data['id'] = $id;
        if (is_numeric($id)) {
            $orden = $this->mantencion_model->buscar_orden_model($id);
            $data['estado'] = $orden->estado_aprobacion;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $accion = $this->input->post('accion');
            $estado = $this->input->post('estado');
            $id = $this->input->post('id-orden');
            if ($accion == 'APROBAR_ORDEN') {
                $data['id'] = $id;
                $data['httpPost'] = TRUE;
                $resulatdo = $this->mantencion_model->autorizar_orden_trabajo_model($id, $estado);
                if ($resulatdo->mensaje != 0) {
                    if ($estado == 1) {
                        $data['mensaje_aprobacion'] = 'APROBADO';
                    } elseif ($estado == 2) {
                        $data['mensaje_aprobacion'] = 'RECHAZADO';
                    } elseif ($estado == 0) {
                        $data['mensaje_aprobacion'] = 'PENDIENTE';
                    }
                }

                // Codigo para aprobar orden   
            }
        }
        $data['contenido'] = 'ot/orden/autorizar';
        $this->load->view('ot/index', $data);
    }

    public function json() {
        $ordenes = $this->mantencion_model->listar_ordenes_model();
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        echo json_encode($ordenes);
    }

    public function semanajson() {
        $programaSemanal = $this->plan_model->listar_programa_semana_model();
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods:GET');
        echo json_encode($programaSemanal);
    }

    public function programasemana() {
        $data['contenido'] = 'ot/orden/programa_semanal';
        $this->load->view('ot/index', $data);
    }

    public function semana() {
        date_default_timezone_set('America/Santiago');
        $date = date('m/d/Y h:i:s a', time());
        $date = new DateTime($date);
        $semana = $date->format("W");
        $anterior = $semana - 1;
        if ($semana == 1) {
            $anterior = 52;
        }
        $actual = $semana;
        $siguiente = $semana + 1;
        if ($semana == 52) {
            $siguiente = 1;
        }
        $data['semana_anterior'] = $this->plan_model->buscar_plan_semana_model('SEM' . $anterior);
        $data['semana_actual'] = $this->plan_model->buscar_plan_semana_model('SEM' . $actual);
        $data['semana_siguiente'] = $this->plan_model->buscar_plan_semana_model('SEM' . $siguiente);

        $data['programa_semanal'] = $this->plan_model->listar_programa_semana_model();

        $data['contenido'] = 'ot/orden/listar_semana';
        $this->load->view('ot/index', $data);
    }

    public function costo() {
        $data['contenido'] = 'ot/costos/resumen_costos';
        $this->load->view('ot/index', $data);
    }

    public function indicador() {
        $data['contenido'] = 'ot/indicador/indicador';
        $this->load->view('ot/index', $data);
    }

    public function manual() {
        $data['contenido'] = 'ot/normativa/manuales';
        $this->load->view('ot/index', $data);
    }

    public function registro() {
        $data['contenido'] = 'ot/orden/registro';
        $this->load->view('ot/index', $data);
    }

    public function visor() {
        $data['es_valido'] = TRUE;
        $data['contenido'] = 'ot/orden/pdf';
        $this->load->view('ot/index', $data);
    }

    public function pdf() {
        // ¡Importarte! ... no permitir visualizar el pdf desde exterior de la aplicacion.
        $id = $this->uri->segment(3);
        $data['es_valido'] = TRUE;
        if (is_numeric($id)) {
            $ordenes = $this->mantencion_model->buscar_orden_model($id);
            $repuestos = $this->mantencion_model->buscar_detalle_repuestos_model($id);
            if ($ordenes) {
                $this->pdf = new Pdf();
                $this->pdf->AddPage();
                $this->pdf->reporte1($ordenes, $repuestos);
                $this->pdf->Output("OT" . $id . ".pdf", 'I');
            } else {
                $data['es_valido'] = FALSE;
            }
        }
    }

    public function pdfSemana() {
        date_default_timezone_set('America/Santiago');
        $date = date('m/d/Y h:i:s a', time());
        $date = new DateTime($date);
        $semana = $date->format("W");
        $data = $this->plan_model->buscar_plan_semana_model('SEM' . $semana);
        if ($data) {
            $this->pdf = new Pdf();
            $this->pdf->AddPage();
            $this->pdf->reporteSemanal($semana, $data);
            $this->pdf->Output("Programa_Mantencion_Semanal_SEM'.$semana.'.pdf", 'I');
        }
    }

    public function test() {
        $orden = rand(100, 999);
        ;
        $tecnico = 'mauriciohz2002@gmail.com';
        $supervisor = 'compras.asml@gmail.com';
        $email = new Notificar();
        if ($email->mailNuevaOrdenTrabajo($orden, $tecnico, $supervisor)) {
            echo 'OK' . $orden;
        } else {
            echo 'NO...';
        }
    }

    public function supervisar() {
        $data['orden'] = FALSE;
        $data['success'] = FALSE;
        $this->verificarPermisos();
        $id = $this->uri->segment(3);
        //
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Almacenar registros ...
            $id = $this->input->post('id-orden');
            $mantenimiento = $this->input->post('mantenimiento');
            $piso_nivel = $this->input->post('piso-nivel');
            $descripcion = $this->input->post('descripcion');
            $prueba_funcionamiento = $this->input->post('prueba-funcionamiento');
            $orden_limpiesa = $this->input->post('orden-limpiesa');
            $observaciones = $this->input->post('observaciones');
            $accion_correctiva = $this->input->post('acciones-correctivas');

            //ORDEN
            $orden = $this->mantencion_model->buscar_orden_model($id);
            //OBJETO
            $instancia = new Registro_model();
            $instancia->id_orden = '1';
            $instancia->id_equipo = '2';
            $instancia->elemento = '3';
            $instancia->pabellon = '4';
            $instancia->atril = '5';
            $instancia->fecha_hora_inicio = '6';
            $instancia->fecha_hora_termino = '7';
            $instancia->tipo_mantencion = '8';
            $instancia->piso_nivel = '9';
            $instancia->descripcion_intervencion = '10';
            $instancia->prueba_funcionamiento = '11';
            $instancia->orden_limpiesa = '12';
            $instancia->observaciones = '13';
            $instancia->acciones_correctivas = '14';
            $instancia->firma_tecnico = '15';
            $instancia->firma_mantencion = '16';
            $instancia->id_usuario = '17';
            $instancia->fecha_intervencion = '18';
            $instancia->fecha_registro = '19';
            $resultado = $this->registro_model->crear_registro_mantencion($instancia);
            var_dump($resultado);
            $data['id'] = $id;
            $data['success'] = TRUE;
        } else {
            if (is_numeric($id)) {
                $data['orden'] = $this->mantencion_model->buscar_orden_model($id);
            }
            $data['id'] = $id;
            $data['contenido'] = 'ot/orden/supervisor';
            $this->load->view('ot/index', $data);
        }
    }

    private function verificarPermisos() {
        if ($this->session->userdata('modulo_ot') != '1111') {
            redirect('/mantenimiento/permiso', 'refresh');
        }
    }

    public function permiso() {
        $data['contenido'] = '/acceso/permiso';
        $this->load->view('ot/index', $data);
    }

    private function obtenerSemanaActual() {
        date_default_timezone_set('America/Santiago');
        $date = date('m/d/Y h:i:s a', time());
        $date = new DateTime($date);
        return $date->format("W");
    }
    
    public function agregar_actividad(){
    	$id = $this->uri->segment(3);
    	if(is_numeric($id)){
    		$data['equipo'] = $this->parametro_model->buscar_equipo_model($id);
    		$data['id'] = $id;
    		$data['actividades'] = $this->programa_model->buscar_plan_equipo_model($id);
	        $data['contenido'] = 'ot/parametro/agregar_actividad';
	        $this->load->view('ot/index', $data);    		
    	}
    }

}
