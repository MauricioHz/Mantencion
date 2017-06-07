<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
        $this->load->model('categoria_model');
        $this->load->model('bodega_model');
    }

    public function index() {
        $idBodega = $this->uri->segment(3);
        $productos = $this->producto_model->buscarProductosPorBodega($idBodega);
        $data = array('contenido' => 'ot/producto/index', 'mensaje' => '', 'productos' => $productos, 'idBodega' => $idBodega);
        $this->load->view('ot/index', $data);
    }

    public function json() {
        $idBodega = 1; //$this->uri->segment(3);
        $productos = $this->producto_model->buscarProductosPorBodega($idBodega);
        //header('content-Type: application/json');
        //header('content-type: text/html');
        echo json_encode($productos);
    }

    // [POST] Ingresar producto a bodega
    public function ingresar() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categorias = $this->categoria_model->listarCategoria();
            $bodegas = $this->bodega_model->listarBodegaModel();
            $data = array('contenido' => 'ot/producto/ingresar', 'mensaje' => '', 'categorias' => $categorias, 'bodegas' => $bodegas);
            $this->load->view('ot/index', $data);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $producto = new Producto_model();
            $producto->id_categoria = $this->input->post('categoria');
            $producto->codigo = $this->input->post('codigo');
            $producto->producto = $this->input->post('producto');
            $producto->id_bodega = $this->input->post('id-bodega');
            $producto->cantidad = $this->input->post('cantidad');
            $producto->precio = $this->input->post('precio');
            $producto->cantidad_minimo = $this->input->post('cantidad-minima');
            $sp = $this->producto_model->ingresarProducto($producto);
            $data = array('contenido' => 'ot/producto/ingresar', 'mensaje' => $sp->mensaje);
            $this->load->view('ot/index', $data);
        }
    }

}
