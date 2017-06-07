<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro_model extends CI_Model {

    public $id_equipo;
    public $equipo;
    public $id_tipo;
    public $tipo;
    public $observacion;
    public $id_area;
    public $area;
    // Subarea
    public $id_subarea;
    public $subarea;
    //
    public $id_plan;
    public $plan;
    public $id_responzable;
    public $responzable;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function listar_responzable_model() {
        $sql = "CALL sp_ot_listar_reponsable_equipo;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function listar_equipo_model() {
        $sql = "CALL sp_ot_listar_equipos;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function ingresar_equipo_model(Parametro_model $objeto) {
        $sql = "CALL sp_ot_crear_equipo(:id_area, :id_sub_area, :id_plan, :id_tipo, :equipo, :id_responzable, :observacion)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_area", $objeto->id_area, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_sub_area", $objeto->id_subarea, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_plan", $objeto->id_plan, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_tipo", $objeto->id_tipo, PDO::PARAM_STR, 1);
        $statement->bindParam(":equipo", $objeto->equipo, PDO::PARAM_STR, 80);
        $statement->bindParam(":id_responzable", $objeto->id_responzable, PDO::PARAM_INT, 3);
        $statement->bindParam(":observacion", $objeto->observacion, PDO::PARAM_STR, 200);
        if ($statement->execute()) {
            $res = $statement->fetch(PDO::FETCH_ASSOC);
            return $res["@id"];
        } else {
            return FALSE;
        }
    }

    public function buscar_equipo_model($id) {
        $sql = "CALL sp_ot_buscar_equipo(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function editar_equipo_model($objeto) {
        $sql = "CALL sp_ot_actualizar_equipo(:id_equipo, :id_plan, :id_area, :id_subarea, :tipo, :equipo_actividad, :id_responzable, :observacion);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_equipo", $objeto->id_equipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_area", $objeto->id_area, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_subarea", $objeto->id_subarea, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_plan", $objeto->id_plan, PDO::PARAM_INT, 3);
        $statement->bindParam(":tipo", $objeto->tipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":equipo_actividad", $objeto->equipo, PDO::PARAM_STR, 80);
        $statement->bindParam(":id_responzable", $objeto->id_responzable, PDO::PARAM_INT, 3);
        $statement->bindParam(":observacion", $objeto->observacion, PDO::PARAM_STR, 200);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function eliminar_area_model($id) {
        $sql = "CALL sp_ot_eliminar_area(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function listar_area_model() {
        $sql = "CALL sp_ot_listar_areas;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function buscar_area_model($id) {
        $sql = "CALL sp_ot_buscar_areas(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function eliminar_equipo_model($id) {
        $sql = "CALL sp_ot_eliminar_equipo(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function editar_area_model($objeto) {
        $sql = "CALL sp_ot_actualizar_area(:id, :area);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $objeto->id_area, PDO::PARAM_INT, 3);
        $statement->bindParam(":area", $objeto->area, PDO::PARAM_STR, 50);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function ingresar_area_model(Parametro_model $objeto) {
        $sql = "CALL sp_ot_crear_area(:area)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":area", $objeto->area, PDO::PARAM_STR, 50);
        if ($statement->execute()) {
            // Retorna mensaje store procedure
            return $statement->fetch(PDO::FETCH_OBJ);
            //return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function ingresar_subarea_model(Parametro_model $objeto) {
        $sql = "CALL sp_ot_crear_subarea(:id_area, :subarea)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_area", $objeto->id_area, PDO::PARAM_INT, 3);
        $statement->bindParam(":subarea", $objeto->subarea, PDO::PARAM_STR, 80);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function listar_resumen_model() {
        $sql = "CALL sp_ot_resumen;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    // sub areas.
    public function editar_subarea_model(Parametro_model $objeto) {
        $sql = "CALL sp_ot_actualizar_subareas(:id_subarea, :subarea);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_subarea", $objeto->id_subarea, PDO::PARAM_INT, 3);
        $statement->bindParam(":subarea", $objeto->subarea, PDO::PARAM_STR, 50);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function listar_subarea_model($id) {
        $sql = "CALL sp_ot_listar_subareas(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function listar_subarea2_model() {
        $sql = "CALL sp_ot_listar_subareas2();";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function buscar_subarea_model($id) {
        $sql = "CALL sp_ot_buscar_subareas(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

}
