<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programa_model extends CI_Model {

    public $id_semana;
    public $id_equipo;
    public $id_plan;
    public $semana;
    public $actividad;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    /*
    public function listar_plan_model() {
        $sql = "CALL sp_ot_listar_planes;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }
    */

    public function ingresar_programa_model(Programa_model $objeto) {
        $sql = "CALL sp_ot_crear_programa_semana(:id_equipo, :id_plan, :semana, :actividad)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_equipo", $objeto->id_equipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_plan", $objeto->id_plan, PDO::PARAM_INT, 3);
        $statement->bindParam(":semana", $objeto->semana, PDO::PARAM_STR, 5);
        $statement->bindParam(":actividad", $objeto->actividad, PDO::PARAM_STR, 200);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function eliminar_programa_model($id) {
        $sql = "CALL sp_ot_eliminar_programa_semana(:id_equipo)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_equipo", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function buscar_plan_equipo_model($id) {
        $sql = "CALL sp_ot_buscar_equipo_semana(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }
    
    
    public function buscar_semana_mantencion_model(Programa_model $objeto) {
        $sql = "CALL sp_ot_buscar_semana_mantencion(:id, :semana);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $objeto->id_equipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":semana", $objeto->semana, PDO::PARAM_INT, 2);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

}