<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('parametro_model');
        $this->load->model('plan_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('ot/index');
    }

    // ------------------------------------------------------------------------------------------
    // Componentes
    // ------------------------------------------------------------------------------------------

    public function componente() {
        $data['contenido'] = 'ot/componentes/index';
        $this->load->view('ot/index', $data);
    }

    // ------------------------------------------------------------------------------------------
    // Areas
    // ------------------------------------------------------------------------------------------

    public function crear_area() {
        $data['success'] = FALSE;
        $data['existe_area'] = FALSE;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $objeto = new Parametro_model();
            ucwords(strtolower(''));
            $objeto->area = strtoupper(trim($this->input->post("area")));
            $sp = $this->parametro_model->ingresar_area_model($objeto);

            if ($sp->mensaje == 'OK_INGRESADO') {
                $data['success'] = TRUE;
            } elseif ($sp->mensaje == 'SI_EXISTE') {
                $data['existe_area'] = TRUE;
            } else {
                // Registrar error en log...			    
            }
            $data['contenido'] = 'ot/parametro/crear_area';
            $this->load->view('ot/index', $data);
        } else {
            $data['contenido'] = 'ot/parametro/crear_area';
            $this->load->view('ot/index', $data);
        }
    }

    // Listar areas y sub areas.
    public function area_json() {
        $data = $this->parametro_model->listar_area_model();
        //$data = $this->parametro_model->listar_subarea2_model();
        echo json_encode($data);
    }

    public function listar_area() {
        $data['contenido'] = 'ot/parametro/listar_area';
        $this->load->view('ot/index', $data);
    }

    public function buscar_area() {
        $data['contenido'] = 'ot/parametro/buscar_area';
        $this->load->view('ot/index', $data);
    }

    public function editar_area() {
        $data['success'] = FALSE;
        $data['warning'] = FALSE;
        if (count($_POST) > 0) {
            $confirma = $this->input->post("confirma-editar");
            if ($confirma) {
                $objeto = new Parametro_model();
                $objeto->id_area = $this->input->post("id-area");
                $objeto->area = trim($this->input->post("area"));
                $resultado = $this->parametro_model->editar_area_model($objeto);
                if ($resultado) {
                    $data['success'] = TRUE;
                } else {
                    $data['warning'] = TRUE;
                }
            }
        } else {
            $id = $this->uri->segment(3);
            if (is_numeric($id)) {
                $data_area = $this->parametro_model->buscar_area_model($id);
                if ($data_area) {
                    $data['area'] = $data_area->area;
                    $data['id_area'] = $data_area->id_area;
                } else {
                    $data['encontrado'] = FALSE;
                }
            }
        }
        $data['contenido'] = 'ot/parametro/editar_area';
        $this->load->view('ot/index', $data);
    }

    public function eliminar_area() {
        $data['success'] = FALSE;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $this->input->post("id-area");
                $resultado = $this->parametro_model->eliminar_area_model($id);
                if ($resultado) {
                    $data['success'] = TRUE;
                }
            }            
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $this->uri->segment(3);
            if (is_numeric($id)) {
                $data_area = $this->parametro_model->buscar_area_model($id);
                if ($data_area) {
                    $data['area'] = $data_area->area;
                    $data['id_area'] = $data_area->id_area;
                } else {
                    $data['encontrado'] = FALSE;
                }
            }
        }
        $data['contenido'] = 'ot/parametro/eliminar_area';
        $this->load->view('ot/index', $data);
    }

    // ------------------------------------------------------------------------------------------
    // Sub areas
    // ------------------------------------------------------------------------------------------
    public function crear_subarea() {
        $data['success'] = FALSE;
        $data['existe_area'] = FALSE;
        $data['id'] = '';
        $data['area'] = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $objeto = new Parametro_model();
            $objeto->id_area = trim($this->input->post("id-area"));
            $objeto->subarea = trim($this->input->post("sub-area"));
            $sp = $this->parametro_model->ingresar_subarea_model($objeto);

            if ($sp->mensaje == 'OK_INGRESADO') {
                $data['success'] = TRUE;
            } elseif ($sp->mensaje == 'SI_EXISTE') {
                $data['existe_area'] = TRUE;
				redirect('/parametro/listar_area', 'refresh');
            } else {
                // Registrar error en log...			    
            }

            $data['contenido'] = 'ot/parametro/crear_subarea';
            $this->load->view('ot/index', $data);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $this->uri->segment(3);
            if (is_numeric(trim($id))) {
                $data_area = $this->parametro_model->buscar_area_model($id);
                $data['id'] = $data_area->id_area;
                $data['area'] = $data_area->area;
            }
            $data['contenido'] = 'ot/parametro/crear_subarea';
            $this->load->view('ot/index', $data);
        }
    }

    public function subarea_json() {
        $id = $this->uri->segment(3);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (is_numeric($id)) {
                $data = $this->parametro_model->listar_subarea_model($id);
                echo json_encode($data);
            }
        }
    }

    public function listar_subarea() {
        $id = $this->uri->segment(3);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (is_numeric($id)) {   
				$data['id'] = $id;
                $data['subareas'] = $this->parametro_model->listar_subarea_model($id);
                $data['contenido'] = 'ot/parametro/listar_subarea';
                $this->load->view('ot/index', $data);
            }
        }
    }

    public function editar_subarea() {
        $data['success'] = FALSE;
        $id = trim($this->uri->segment(3));
        if (is_numeric($id)) {
            // [GET]
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $dataSubArea = $this->parametro_model->buscar_subarea_model($id);
                if ($dataSubArea) {
                    $data['id_sub_area'] = $dataSubArea->id_sub_area;
                    $data['id_area'] = $dataSubArea->id_area;
                    $data['area'] = $dataSubArea->area;
                    $data['subarea'] = $dataSubArea->subarea;
                    $data['id_sub_area'] = $dataSubArea->id_sub_area;
                    $data['fecha_registro'] = $dataSubArea->fecha_registro;
                }
            }
        }
        // [POST]
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $objeto = new Parametro_Model();
            $objeto->subarea = trim($this->input->post('sub-area'));
            $objeto->id_subarea = $this->input->post('id-sub-area');
            $sp = $this->parametro_model->editar_subarea_model($objeto);
            if ($sp) {
                $data['success'] = TRUE;
                if ($sp->mensaje == 'MODIFICADO_OK') {
                    $data['success'] = TRUE;
                } elseif ($sp->mensaje == 'MODIFICADO_ERROR') {
                    $data['success'] = TRUE;
                }
            }
        }

        $data['id'] = $id;
        $data['contenido'] = 'ot/parametro/editar_subarea';
        $this->load->view('ot/index', $data);
    }

    public function eliminar_subarea() {
        $id = trim($this->uri->segment(3));
        if (is_numeric($id)) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data['subarea'] = $this->parametro_model->buscar_subarea_model($id);
                $data['id'] = $id;
                $data['contenido'] = 'ot/parametro/eliminar_subarea';
                $this->load->view('ot/index', $data);
            }
        }
        if (is_numeric($id)) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $this->input->post('id-subarea');
                
                $data['contenido'] = 'ot/parametro/eliminar_subarea';
                $this->load->view('ot/index', $data);
            }
        }
    }

    // ------------------------------------------------------------------------------------------
    // Equipos
    // ------------------------------------------------------------------------------------------

    public function crear_equipo() {
        $data['resultado_actualizar'] = FALSE;
        $data['success'] = FALSE;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['submit'] == 1) {
            $objeto = new Parametro_model();
            $objeto->id_area = $this->input->post("id-area");
            $objeto->id_subarea = $this->input->post("id-sub-area");
            $objeto->id_plan = $this->input->post("id-plan");
            $objeto->id_tipo = '0';
            $objeto->equipo = trim($this->input->post("equipo-actividad"));
            $objeto->id_responzable = $this->input->post("id-responzable");
            $objeto->observacion = trim($this->input->post("observacion"));
            $id = $this->parametro_model->ingresar_equipo_model($objeto);
            if ($id > 0) {
                $_SESSION['submit'] = 0;
                $data_equipo = $this->parametro_model->buscar_equipo_model($id);
                $data['id'] = $id;
                $data['plan'] = $data_equipo->nombre_plan;
                $data['tipo'] = $data_equipo->tipo;
                $data['area'] = $data_equipo->area;
                $data['subarea'] = $data_equipo->subarea;
                $data['equipo'] = $data_equipo->equipo_actividad;
                $data['observacion'] = $data_equipo->observacion;
                $data['contenido'] = 'ot/parametro/confirma_equipo';
                $this->load->view('ot/index', $data);
            } else {
                // Registrar error en log...
            }
        } else {
            $data['areas'] = $this->parametro_model->listar_area_model();
            $data['planes'] = $this->plan_model->listar_plan_model();
            $data['responsables'] = $this->parametro_model->listar_responzable_model();
            $data['contenido'] = 'ot/parametro/crear_equipo';
            $this->load->view('ot/index', $data);
        }
    }

    public function equipo_json() {
        $data = $this->parametro_model->listar_equipo_model();
        echo json_encode($data);
    }

    public function listar_equipo() {
        $data['contenido'] = 'ot/parametro/listar_equipo';
        $this->load->view('ot/index', $data);
    }

    public function buscar_equipo() {
        $data['contenido'] = 'ot/parametro/buscar_equipo';
        $this->load->view('ot/index', $data);
    }

    public function editar_equipo() {
        if (count($_POST) > 0) {
            $id = $this->input->post("id-equipo");
            $objeto = new Parametro_model();
            $objeto->id_area = $this->input->post("id-area");
            $objeto->id_plan = $this->input->post("id-plan");
            $objeto->id_equipo = $this->input->post("id-equipo");
            $objeto->tipo = $this->input->post("id-tipo");
            $objeto->equipo = trim($this->input->post("equipo-actividad"));
            $objeto->id_responzable = $this->input->post("id-responzable");
            $objeto->observacion = trim($this->input->post("observacion"));
            $resultado = $this->parametro_model->editar_equipo_model($objeto);
            if ($resultado) {
                $_SESSION['submit'] = 0;
                $data_equipo = $this->parametro_model->buscar_equipo_model($id);
                $data['id'] = $id;
                $data['plan'] = $data_equipo->nombre_plan;
                $data['tipo'] = $data_equipo->tipo;
                $data['area'] = $data_equipo->area;
                $data['equipo'] = $data_equipo->equipo_actividad;
                $data['observacion'] = $data_equipo->observacion;
                $data['resultado_actualizar'] = TRUE;
                $data['contenido'] = 'ot/parametro/confirma_equipo';
                $this->load->view('ot/index', $data);
            } else {
                // Registrar error en log...
            }
        } else {
            $id = $this->uri->segment(3);
            $data_equipo = $this->parametro_model->buscar_equipo_model($id);
            if ($data_equipo) {
                $data['id_equipo'] = $data_equipo->id_equipo;
                $data['id_plan'] = $data_equipo->id_plan;
                $data['id_area'] = $data_equipo->id_area;
                $data['tipo'] = $data_equipo->tipo;
                $data['id_responsable'] = $data_equipo->id_responzable;
                $data['equipo'] = $data_equipo->equipo_actividad;
                $data['observacion'] = $data_equipo->observacion;
                // Listas
                $data['areas'] = $this->parametro_model->listar_area_model();
                $data['planes'] = $this->plan_model->listar_plan_model();
                $data['responsables'] = $this->parametro_model->listar_responzable_model();
            } else {
                $data['encontrado'] = FALSE;
            }
            $data['contenido'] = 'ot/parametro/editar_equipo';
            $this->load->view('ot/index', $data);
        }
    }

    public function eliminar_equipo() {
        $data['success'] = FALSE;
        if (count($_POST) > 0) {
            $confirma = $this->input->post("confirma-eliminar");
            if ($confirma) {
                $id = $this->input->post("id-equipo");
                $resultado = $this->parametro_model->eliminar_equipo_model($id);
                if ($resultado) {
                    $data['success'] = TRUE;
                }
            }
        } else {
            $id = $this->uri->segment(3);
            if (is_numeric($id)) {
                $data_equipo = $this->parametro_model->buscar_equipo_model($id);
                if ($data_equipo) {
                    $data['id_equipo'] = $data_equipo->id_equipo;
                    $data['equipo'] = $data_equipo->equipo_actividad;
                } else {
                    $data['encontrado'] = FALSE;
                }
            }
        }
        $data['contenido'] = 'ot/parametro/eliminar_equipo';
        $this->load->view('ot/index', $data);
    }

}
