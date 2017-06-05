<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
    }

    public function index() {  
        $bodega = $this->uri->segment(3);
        $bodegas = $this->producto_model->buscarDetalleRepuestosPorBodega($bodega);
        $data = array('contenido' => 'ot/producto/index', 'bodegas' => $bodegas);
        $this->load->view('ot/index', $data);
    }

}
