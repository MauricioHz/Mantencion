<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('notificar');
        $this->load->model('parametro_model');
    }

    public function index() {
        $data['finalizado'] = FALSE;
        $this->load->view('acceso/login', $data);
    }

    public function login() {
        $data['finalizado'] = FALSE;
        $this->form_validation->set_rules('usuario', 'usuario', 'required');
        $this->form_validation->set_rules('clave', 'clave', 'required');
        if ($this->form_validation->run()) {
            $instancia = new Usuario_model();
            $instancia->usuario = $this->input->post("usuario");
            $instancia->clave = $this->input->post("clave");
            $data = $this->usuario_model->buscar_usuario_model($instancia);
            if ($data) {
                $sessiondata = array(
                    'id_usuario' => $data->id_usuario,
                    'usuario' => $data->usuario,
                    'activo' => $data->activo,
                    'nombre_usuario' => $data->nombre_usuario,
                    'cargo' => $data->cargo,
                    'email' => $data->correo,
                    'perfil' => $data->perfil,
                    'modulo_oc' => $data->modulo_oc,
                    'modulo_nc' => $data->modulo_nc,
                    'modulo_ot' => $data->modulo_ot,
                    'clave'  => $data->clave,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sessiondata);
                $this->mailInicioSessionAPP();
                redirect('acceso/modulo');
                //redirect('mantenimiento/index');
            } else {
                $data['finalizado'] = FALSE;
                $data['registrado'] = FALSE;
                $this->load->view('acceso/login', $data);
            }
        } else {
            $this->load->view('acceso/login', $data);
        }
    }

    public function logout() {
        session_destroy();
        unset(
                $_SESSION['usuario'], $_SESSION['email'], $_SESSION['logged_in']
        );
        $data['finalizado'] = TRUE;
        $this->load->view('acceso/login', $data);
    }

    public function modulo() {
        if($this->session->logged_in == FALSE){
            redirect('acceso/login');
        }else{
            $data['modulos'] = 'Modulos OK';
            $this->load->view('acceso/modulo', $data);
        }
    }

    public function mantencion() {
        $mod = $this->input->post('mantencion');
        if (isset($_SESSION['logged_in'])) {
            if ($_SESSION['logged_in']) {
                $data['resumen'] = $this->parametro_model->listar_resumen_model();
                $data['contenido'] = 'ot/bienvenida';
                $this->load->view('ot/index', $data);
            } else {
                $data['finalizado'] = FALSE;
                $this->load->view('acceso/login', $data);
            }
        }else{
                $data['finalizado'] = FALSE;
                $this->load->view('acceso/login', $data);
        }
    }
    
    public function mailInicioSessionAPP(){
        	date_default_timezone_set('America/Santiago');
			$date = date('m/d/Y h:i:s a', time());
		    $usuario = $this->session->userdata('usuario');
		    $nombre_usuario = $this->session->userdata('nombre_usuario');
		    log_message('INFO', $nombre_usuario . ' ha iniciado sesion.');
		    log_message('debug', 'Some variable was correctly set <---');
		    log_message('error', $nombre_usuario . ' ha iniciado sesion. ***');
		    log_message('info', 'The purpose of some variable is to provide some value.');
		    if(Notificar::mailInicioSession($usuario, $date)){
		       return TRUE;
		    }else{
		       return FALSE;
		    }
	}

}