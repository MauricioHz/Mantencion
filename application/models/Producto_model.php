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
    public $codigo;
    public $producto;
    public $id_bodega;
    public $cantidad;
    public $cantidad_minimo;
    public $precio;
    public $fecha_registro;
    public $vigente;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function buscarProductoPorBodega($bodega) {
        return;
    }

    public function ingresarProducto(Producto_model $objeto) {
        $sql = "CALL sp_ot_crear_producto(:id_categoria, :codigo, :producto, :id_bodega, :cantidad, :cantidad_minimo, :precio)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_categoria", $objeto->id_categoria, PDO::PARAM_INT, 3);
        $statement->bindParam(":codigo", $objeto->codigo, PDO::PARAM_STR, 100);
        $statement->bindParam(":producto", $objeto->producto, PDO::PARAM_STR, 100);
        $statement->bindParam(":id_bodega", $objeto->id_bodega, PDO::PARAM_INT, 3);
        $statement->bindParam(":cantidad", $objeto->cantidad, PDO::PARAM_INT, 11);
        $statement->bindParam(":cantidad_minimo", $objeto->cantidad_minimo, PDO::PARAM_INT, 4);
        $statement->bindParam(":precio", $objeto->precio, PDO::PARAM_INT, 8);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

 public function buscarProductosPorBodega($idBodega) {
        $sql = "CALL sp_ot_listar_producto_por_bodega(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $idBodega, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    function modificarProductoModel(Producto_model $objeto) {
 
         $sql = "CALL sp_ot_actualizar_producto(:id_producto, :id_categoria, :codigo, :producto, :id_bodega, :cantidad, :cantidad_minimo, :precio)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_producto", $objeto->id_producto, PDO::PARAM_INT, 8);
        $statement->bindParam(":id_categoria", $objeto->id_categoria, PDO::PARAM_INT, 3);
        $statement->bindParam(":codigo", $objeto->codigo, PDO::PARAM_STR, 100);
        $statement->bindParam(":producto", $objeto->producto, PDO::PARAM_STR, 100);
        $statement->bindParam(":id_bodega", $objeto->id_bodega, PDO::PARAM_INT, 3);
        $statement->bindParam(":cantidad", $objeto->cantidad, PDO::PARAM_INT, 11);
        $statement->bindParam(":cantidad_minimo", $objeto->cantidad_minimo, PDO::PARAM_INT, 4);
        $statement->bindParam(":precio", $objeto->precio, PDO::PARAM_INT, 8);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    function buscarProductosPorId($idProducto) {
      $sql = "CALL sp_ot_buscar_producto_id(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $idProducto, PDO::PARAM_INT, 8);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

}
