<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_model extends CI_Model {

    public $id_plan;
    public $codigo_plan;
    public $fecha_plan;
    public $version;
    public $anio;
    public $nombre_plan;
    public $fecha_registro;
    public $id_usuario_registro;
    public $observacion;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function listar_plan_model() {
        $sql = "CALL sp_ot_listar_planes;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function ingresar_plan_model(Plan_model $objeto) {
        $sql = "CALL sp_ot_crear_plan(:codigo_plan, :fecha_plan, :version, :anio, :nombre_plan, :id_usuario_registro, :observacion)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":codigo_plan", $objeto->codigo_plan, PDO::PARAM_STR, 15);
        $statement->bindParam(":fecha_plan", $objeto->fecha_plan, PDO::PARAM_STR, 10);
        $statement->bindParam(":version", $objeto->version, PDO::PARAM_INT, 2);
        $statement->bindParam(":anio", $objeto->anio, PDO::PARAM_INT, 4);
        $statement->bindParam(":nombre_plan", $objeto->nombre_plan, PDO::PARAM_STR, 200);
        $statement->bindParam(":id_usuario_registro", $objeto->id_usuario_registro, PDO::PARAM_INT, 3);
        $statement->bindParam(":observacion", $objeto->observacion, PDO::PARAM_STR, 400);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function buscar_plan_model($id) {
        $sql = "CALL sp_ot_buscar_plan(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function buscar_plan_semana_model($semana) {
        $sql = "CALL sp_ot_buscar_plan_semana(:semana);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":semana", $semana, PDO::PARAM_STR, 5);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }
    
    // lista todas las actividades a realizar para cada semana
    public function listar_programa_semana_model() {
        $sql = "CALL sp_ot_listar_programa_semanal;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function editar_plan_model($objeto) {
        $sql = "CALL sp_ot_actualizar_plan(:codigo, :fecha, :version, :anio, :nombre_plan, :id_usuario, :observacion, :id_plan)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":codigo", $objeto->codigo_plan, PDO::PARAM_STR, 15);
        $statement->bindParam(":fecha", $objeto->fecha_plan, PDO::PARAM_STR, 10);
        $statement->bindParam(":version", $objeto->version, PDO::PARAM_INT, 2);
        $statement->bindParam(":anio", $objeto->anio, PDO::PARAM_INT, 4);
        $statement->bindParam(":nombre_plan", $objeto->nombre_plan, PDO::PARAM_STR, 200);
        $statement->bindParam(":id_usuario", $objeto->id_usuario_registro, PDO::PARAM_INT, 3);
        $statement->bindParam(":observacion", $objeto->observacion, PDO::PARAM_STR, 400);
        $statement->bindParam(":id_plan", $objeto->id_plan, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }

    public function eliminar_plan_model($id) {
        $sql = "CALL sp_ot_eliminar_plan(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->rowCount();
        } else {
            return FALSE;
        }
    }
    
    /*
    ----------------------------------------------------------------------------
    Configuracion de perfil para visualizar formulario
    Solo el usuario dromero tiene acceso a la gestion de planes.
    ----------------------------------------------------------------------------
    */
    public static function obtenerPermisoAccesoPlan($usuario){
        if($usuario == 'dromero' || $usuario == 'jlmoureb'){
            return TRUE;
        }
    }

}