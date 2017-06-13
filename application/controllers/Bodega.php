<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bodega extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bodega_model');
        $this->load->model('tecnico_model');
    }

    public function index() {
        $bodegas = $this->bodega_model->listarBodegaModel();
        $data = array('contenido' => 'ot/bodega/index', 'bodegas' => $bodegas);
        $this->load->view('ot/index', $data);
    }

    public function editar() {
        $id = $this->uri->segment(3);
        $bodega = "";
        $tecnico = "";
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $bodega = $this->bodega_model->buscarBodegaPorID($id);    
            $tecnico = $this->tecnico_model->listarTecnico();
            $data = array('contenido' => 'ot/bodega/editar', 'tecnicos' => $tecnico, 'bodega' => $bodega, 'mensaje' => '');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mensaje = 'ACTUALIZAR_OK';
            $bodega = new Bodega_model();
            $bodega->id_bodega = $this->input->post('id-bodega');
            $bodega->bodega = $this->input->post('bodega');
            $bodega->descripcion = $this->input->post('descripcion');
            $bodega->id_tecnico = $this->input->post('tecnico');
            $sp = $this->bodega_model->editar_bodega_model($bodega);
var_dump($sp);            
            $data = array('contenido' => 'ot/bodega/editar', 'bodega' => '', 'mensaje' => $sp->mensaje);
        }       
        $this->load->view('ot/index', $data);
    }

}
