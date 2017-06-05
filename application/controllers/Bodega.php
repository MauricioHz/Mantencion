<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bodega extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bodega_model');
    }

    public function index() {        
        $bodegas = $this->bodega_model->listarBodegaModel();
        $data = array('contenido' => 'ot/bodega/index', 'bodegas' => $bodegas);
        $this->load->view('ot/index', $data);
    }

}
