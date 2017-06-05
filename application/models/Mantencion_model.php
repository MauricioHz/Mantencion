<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mantencion_model extends CI_Model {

    // Orden de trabajo
    public $id_orden;
    public $id_equipo;
    public $id_area;
    public $id_subarea;
    public $fecha_inicio;
    public $fecha_termino;
    public $tipo_mantencion;
    public $descripcion;
    public $observacion;
    public $tecnico;
    public $supervisor;
    public $usuario_registro;
    public $fecha_registro;
    public $estado_aprobacion;
    public $semana;
    public $ciclo;
    //Repuestos
    public $id_repuesto;
    public $cantidad;
    public $repuesto;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    // Ingresar datos de la orden de trabajo
    public function ingresar_orden_trabajo_model(Mantencion_model $objeto) {
        $sql = "CALL sp_ot_crear_orden_trabajo(:id_equipo, 
							:fecha_inicio, 
							:fecha_termino, 
							:tipo_mantencion, 
							:descripcion, 
							:observacion, 
							:tecnico, 
							:supervisor, 
							:usuario_registro,  
							:semana, 
							:ciclo
							)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_equipo", $objeto->id_equipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":fecha_inicio", $objeto->fecha_inicio, PDO::PARAM_STR, 50);
        $statement->bindParam(":fecha_termino", $objeto->fecha_termino, PDO::PARAM_STR, 50);
        $statement->bindParam(":tipo_mantencion", $objeto->tipo_mantencion, PDO::PARAM_STR, 10);
        $statement->bindParam(":descripcion", $objeto->descripcion, PDO::PARAM_STR, 400);
        $statement->bindParam(":observacion", $objeto->observacion, PDO::PARAM_STR, 400);
        $statement->bindParam(":tecnico", $objeto->tecnico, PDO::PARAM_INT, 3);
        $statement->bindParam(":supervisor", $objeto->supervisor, PDO::PARAM_INT, 3);
        $statement->bindParam(":usuario_registro", $objeto->usuario_registro, PDO::PARAM_INT, 3);
        $statement->bindParam(":semana", $objeto->semana, PDO::PARAM_STR, 10);
        $statement->bindParam(":ciclo", $objeto->ciclo, PDO::PARAM_INT, 1);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    // Ingresar detalle de repuestos de la orden de trabajo
    public function ingresar_detalle_repuestos_model(Mantencion_model $objeto) {
        $sql = "CALL sp_ot_crear_detalle_repuesto(:id_orden,:cantidad,:repuesto)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_orden", $objeto->id_orden, PDO::PARAM_INT, 8);
        $statement->bindParam(":cantidad", $objeto->cantidad, PDO::PARAM_INT, 6);
        $statement->bindParam(":repuesto", $objeto->repuesto, PDO::PARAM_STR, 80);
        if ($statement->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function listar_ordenes_model() {
        $sql = "CALL sp_ot_listar_orden_trabajo;";
        $statement = $this->db->conn_id->prepare($sql);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function buscar_orden_model($id) {
        $sql = "CALL sp_ot_buscar_orden_trabajo(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function buscar_detalle_repuestos_model($id) {
        $sql = "CALL sp_ot_buscar_detalle_repuestos(:id);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    // Actualizar datos de la orden de trabajo
    public function actualizar_orden_trabajo_model(Mantencion_model $objeto) {
        $sql = "CALL sp_ot_actualizar_orden_trabajo(:id_equipo, :id_area, :sector, :elemento, :pabellon, :atril, :fecha_inicio,
		          :fecha_termino, :tipo_mantencion, :descripcion, :observacion, :tecnico, :supervisor, :semana)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_equipo", $objeto->id_equipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_area", $objeto->id_area, PDO::PARAM_INT, 3);
        $statement->bindParam(":sector", $objeto->sector, PDO::PARAM_STR, 30);
        $statement->bindParam(":elemento", $objeto->elemento, PDO::PARAM_STR, 30);
        $statement->bindParam(":pabellon", $objeto->pabellon, PDO::PARAM_STR, 30);
        $statement->bindParam(":atril", $objeto->atril, PDO::PARAM_STR, 30);
        $statement->bindParam(":fecha_inicio", $objeto->fecha_inicio, PDO::PARAM_STR, 50);
        $statement->bindParam(":fecha_termino", $objeto->fecha_termino, PDO::PARAM_STR, 50);
        $statement->bindParam(":tipo_mantencion", $objeto->tipo_mantencion, PDO::PARAM_STR, 10);
        $statement->bindParam(":descripcion", $objeto->descripcion, PDO::PARAM_STR, 400);
        $statement->bindParam(":observacion", $objeto->observacion, PDO::PARAM_STR, 400);
        $statement->bindParam(":tecnico", $objeto->tecnico, PDO::PARAM_STR, 50);
        $statement->bindParam(":supervisor", $objeto->supervisor, PDO::PARAM_STR, 50);
        $statement->bindParam(":semana", $objeto->semana, PDO::PARAM_STR, 5);
        if ($statement->execute()) {
            $res = $statement->fetch(PDO::FETCH_ASSOC);
            return $res["@id"];
        } else {
            return FALSE;
        }
    }

    // Eliminar orden de trabajo
    public function eliminar_orden_trabajo_model($id, $semana) {
        $sql = "CALL sp_ot_eliminar_orden_trabajo(:id_orden, :semana)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_orden", $id, PDO::PARAM_INT, 8);
        $statement->bindParam(":semana", $semana, PDO::PARAM_STR, 5);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    public function autorizar_orden_trabajo_model($id, $valor) {
        $sql = "CALL sp_ot_autorizar(:id, :valor)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT, 3);
        $statement->bindParam(":valor", $valor, PDO::PARAM_INT, 1);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

    // Datos utilizados en la seccion notificaciones del inicio.
    public function obtener_registros_pendientes_model($semana) {
        $sql = "CALL sp_ot_buscar_detalle_repuestos(:semana);";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":semana", $semana, PDO::PARAM_STR, 5);
        if ($statement->execute()) {
            //$data = $statement->fetchAll(PDO::FETCH_OBJ);
            //var_dump($data);
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }

}
