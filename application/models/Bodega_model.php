<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bodega_model extends CI_Model {

    public $bodega;
    public $descripcion;
    public $id_tecnico;
    public $fecha_registro;
    public $vigente;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function listarBodegaModel() {
        $sql = "CALL sp_ot_listar_bodega;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function buscarBodegaPorID($id) {
        $sql = "CALL sp_ot_buscar_bodega_id(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    // sp_ot_actualizar_bodega
    public function editar_equipo_model(Bodega_model $objeto) {
        $sql = "CALL sp_ot_actualizar_bodega(:id_bodega, :bodega, :descripcion, :id_tecnico);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_bodega", $objeto->id_bodega, PDO::PARAM_INT, 3);
        $statement->bindParam(":bodega", $objeto->bodega, PDO::PARAM_STR, 100);
        $statement->bindParam(":descripcion", $objeto->descripcion, PDO::PARAM_STR, 200);
        $statement->bindParam(":id_tecnico", $objeto->id_tecnico, PDO::PARAM_INT, 2);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }
}
