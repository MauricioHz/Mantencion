<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bodega_model extends CI_Model {

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

}
