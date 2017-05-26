<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('usuario_model');
	}

	public function listar(){
	    /*
		$usuario = $this->session->usuario;
		$perfil = $this->session->perfil;
		$modulo = $this->session->modulo;
		$entidad = new Usuario_model();
		$entidad->usuario = $usuario;
		$entidad->perfil = $perfil;
		$entidad->modulo = $modulo;
		$data['usuarios'] = $this->usuario_model->listar_usuarios_model($entidad);
		*/
		$data['usuarios'] = $this->usuario_model->listar_usuarios_model();
		$data['contenido'] = 'usuario/listar';
		$this->load->view('usuario/index', $data);
		
	}

	public function  json(){
		$data['contenido'] = 'usuario/listar';
		$this->load->view('usuario/index', $data);
	}

	public function  editar(){
	    $accion = $this->uri->segment(3);
        $id_usuario = $this->uri->segment(4);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($accion == 'clave'){
                // actualizar clave.
                $clave1 = $this->input->post('nueva-password');
                $clave2 = $this->input->post('confirmar-password');
                $id = $id_usuario;
                
            }
            if($accion == 'inhabilitar'){
                // inhabilitar usuario
            }
            if($accion == 'datos'){
                // actualizar datos del usuario.
            }
        }
        
        $data['usuario'] = $this->usuario_model->buscar_usuario_por_id_model($id_usuario);
        $data['accion'] = $accion;
		$data['contenido'] = 'usuario/editar';
		$this->load->view('usuario/index', $data);
	}

	public function  activar(){
		$data['contenido'] = 'usuario/activar';
		$this->load->view('usuario/index', $data);
	}

	public function  detalle(){
		$data['contenido'] = 'usuario/detalle';
		$this->load->view('usuario/index', $data);
	}

public function sessionUsuario(){
    return 'ok';
}

}