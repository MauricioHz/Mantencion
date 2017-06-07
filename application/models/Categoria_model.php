<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    public $id_categoria;
    public $categoria;
    public $descripcion;
    public $fecha_registro;
    public $vigente;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function listarCategoria() {
        $sql = "CALL sp_ot_listar_categoria;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

}
