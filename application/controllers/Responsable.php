<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Responsable extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('responsable_model');
    }

    public function index() {
        $responsables = $this->responsable_model->listarResponsable();
        $data = array('contenido' => 'ot/responsable/index', 'responsable' => $responsables);
        $this->load->view('ot/index', $data);
    }

    public function json() {
        $responsables = $this->responsable_model->listarResponsable();
        echo json_encode($responsables);
    }

}
