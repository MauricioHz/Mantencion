<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function listarTecnico() {
        $sql = "CALL sp_ot_listar_tecnico;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function ingresarTecnico(Tecnico_model $tecnico) {
        return;
    }

    public function modificarTecnico(Tecnico_model $tecnico) {
        return;
    }

    public function eliminarTecnico($id) {
        return;
    }

}
