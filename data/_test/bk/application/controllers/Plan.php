   <?php

   defined('BASEPATH') OR exit('No direct script access allowed');

   class Plan extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('plan_model');
        $this->load->model('parametro_model');
        $this->load->model('programa_model');
    }

    public function index() {
        $this->load->view('ot/index');
    }

    public function crear() {
        $data['success'] = FALSE;
        if (count($_POST) > 0) {
            $objeto = new Plan_model();
            $objeto->codigo_plan = $this->input->post("codigo");
            $objeto->fecha_plan = $this->input->post("fecha");
            $objeto->version = $this->input->post("version");
            $objeto->anio = $this->input->post("anio");
            $objeto->nombre_plan = $this->input->post("nombre-plan");
            $objeto->id_usuario_registro = 1;
            $objeto->observacion = $this->input->post("observacion");
            $resultado = $this->plan_model->ingresar_plan_model($objeto);
            if ($resultado > 0) {
                $data['success'] = TRUE;
            } else {
                // Registrar error en log...
            }
            $data['contenido'] = 'ot/plan/crear';
            $this->load->view('ot/index', $data);
        } else {
            $data['contenido'] = 'ot/plan/crear';
            $this->load->view('ot/index', $data);
        }
    }

    public function json() {
        $data = $this->plan_model->listar_plan_model();
        echo json_encode($data);
    }

    public function listar() {
        $data['planes'] = $this->plan_model->listar_plan_model();
        $data['contenido'] = 'ot/plan/listar';
        $this->load->view('ot/index', $data);
    }

    public function buscar() {
        $data['contenido'] = 'ot/plan/buscar';
        $this->load->view('ot/index', $data);
    }

    public function editar() {  
        $data['success'] = FALSE;
        $data['warning'] = FALSE;        
        if (count($_POST) > 0) {     
            $confirma = $this->input->post("confirma-editar");
            if (true) {
                $objeto = new Plan_model();
                $objeto->id_plan = $this->input->post("id_plan");
                $objeto->codigo_plan = $this->input->post("codigo");
                $objeto->fecha_plan = $this->input->post("fecha");
                $objeto->version = $this->input->post("version");
                $objeto->anio = $this->input->post("anio");
                $objeto->nombre_plan = $this->input->post("nombre-plan");
                $objeto->id_usuario_registro = 1;
                $objeto->observacion = $this->input->post("observacion");
                $resultado = $this->plan_model->editar_plan_model($objeto);
                if ($resultado) {
                    $data['success'] = TRUE;
                } else {
                    $data['warning'] = TRUE;
                }
            }
        } else {
            $id = $this->uri->segment(3);
            if (is_numeric($id)) {
                $data['data_plan'] = $this->plan_model->buscar_plan_model($id);
                if ($data['data_plan']) {

                } else {
                    $data['encontrado'] = FALSE;
                }
            }
        }
        $data['acceso'] = Plan_model::obtenerPermisoAccesoPlan($this->session->userdata('usuario'));
        $data['contenido'] = 'ot/plan/editar';
        $this->load->view('ot/index', $data);
    }

    public function eliminar() {
        $data['success'] = FALSE;
        if (count($_POST) > 0) {
            $confirma = $this->input->post("confirma-elimninar");
            if ($confirma) {
                $id = $this->input->post("id-plan");
                $resultado = $this->plan_model->eliminar_plan_model($id);
                if ($resultado) {
                    $data['success'] = TRUE;
                }
            }
        } else {
            $id = $this->uri->segment(3);
            if (is_numeric($id)) {
                $data_plan = $this->plan_model->buscar_plan_model($id);
                if ($data_plan ) {
                    $data['nombre_plan'] = $data_plan->nombre_plan;
                    $data['id_plan'] = $data_plan ->id_plan;
                } else {
                    $data['encontrado'] = FALSE;
                }
            }
        }
        $data['contenido'] = 'ot/plan/eliminar';
        $this->load->view('ot/index', $data);
    }

    public function detalle(){
        $data['no_encontrado'] = FALSE;
        $id = $this->uri->segment(3);
        if (is_numeric($id)) {
            $data_equipo = $this->parametro_model->buscar_equipo_model($id);
            if($data_equipo){                                
            $data_programa_semanal =  $this->programa_model->buscar_plan_equipo_model($id);
            $data['programa_semanal'] = $data_programa_semanal;
            /**/
            $control = TRUE;
            foreach ($data_programa_semanal as $value) {
                if($control){
                   $data['id_plan'] = $value->id_plan;
                   $control = FALSE;
               }
           }
               $data['id_equipo'] = $data_equipo->id_equipo;
               $data['id_area'] = $data_equipo->id_area;
               $data['equipo'] = $data_equipo->equipo_actividad;
               $data['area'] = $data_equipo->area;
               $data['observacion'] = $data_equipo->observacion;
               $data['fecha_registro'] = $data_equipo->fecha_registro;
               $data['nombre_plan'] = $data_equipo->nombre_plan;
               //$data['planes'] = $this->plan_model->listar_plan_model($id);
            }else{
                $data['no_encontrado'] = TRUE;
           }
           $data['contenido'] = 'ot/programa/detalle';
           $this->load->view('ot/index', $data);
       }
   }


}