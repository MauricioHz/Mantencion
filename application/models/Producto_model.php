<?php

/* 
  -- Modelo Producto corresponde a los repuestos utilizados
 
  DROP TABLE IF EXISTS inventario_producto;
  CREATE TABLE IF NOT EXISTS inventario_producto (
  id_producto int(11) NOT NULL AUTO_INCREMENT,
  id_categoria int(11) NOT NULL,
  codigo_producto varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  producto varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  bodega varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  cantidad int(11) NOT NULL,
  PRIMARY KEY (id_producto)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    public $id_producto;
    public $id_categoria;
    public $codigo_producto;
    public $producto;
    public $bodega;
    public $cantidad;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function buscarDetalleRepuestosPorBodega($bodega) {        
        return;
    }
  
    public function ingresarDetalleRepuestos(Producto_model $repuesto) {        
        return;
    }
  
    public function modificarDetalleProductos(Producto_model $repuesto) {
        return;
    }  
  
    public function eliminarDetalleRepuestos($id) {        
        return;
    }
    
}
