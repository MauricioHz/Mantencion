<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model {
    public $id_registro;
    public $id_orden;
    public $id_equipo;
    public $elemento;
    public $pabellon;
    public $atril;
    public $fecha_hora_inicio;
    public $fecha_hora_termino;
    public $tipo_mantencion;
    public $piso_nivel;
    public $descripcion_intervencion;
    public $prueba_funcionamiento;
    public $orden_limpiesa;
    public $observaciones;
    public $acciones_correctivas;
    public $firma_tecnico;
    public $firma_mantencion;
    public $id_usuario;
    public $fecha_intervencion;
    public $fecha_registro;

	public function __construct() {
		parent::__construct();
		$this->load->database('pdo');
	}
	
	public function crear_registro_mantencion(Registro_model $objeto){
	    $sql = "CALL sp_ot_crear_registro_mantencion(:id_orden,:id_equipo,:elemento,:pabellon,:atril,:fecha_hora_inicio,:fecha_hora_termino,:tipo_mantencion,:piso_nivel,
	                                                 :descripcion_intervencion,:prueba_funcionamiento,:orden_limpiesa,:observaciones,:acciones_correctivas,:firma_tecnico,
	                                                 :firma_mantencion,:id_usuario,:fecha_intervencion,:fecha_registro)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id_orden", $objeto->id_orden, PDO::PARAM_INT, 3);
        $statement->bindParam(":id_equipo", $objeto->id_equipo, PDO::PARAM_INT, 3);
        $statement->bindParam(":elemento", $objeto->elemento, PDO::PARAM_STR, 30);
        $statement->bindParam(":pabellon", $objeto->pabellon, PDO::PARAM_STR, 30);
        $statement->bindParam(":atril", $objeto->atril, PDO::PARAM_STR, 30);
        $statement->bindParam(":fecha_hora_inicio", $objeto->fecha_hora_inicio, PDO::PARAM_STR, 50);
        $statement->bindParam(":fecha_hora_termino", $objeto->fecha_hora_termino, PDO::PARAM_STR, 50);
        $statement->bindParam(":tipo_mantencion", $objeto->tipo_mantencion, PDO::PARAM_STR, 10);
        $statement->bindParam(":piso_nivel", $objeto->piso_nivel, PDO::PARAM_STR, 400);
        $statement->bindParam(":descripcion_intervencion", $objeto->descripcion_intervencion, PDO::PARAM_STR, 400);
        $statement->bindParam(":prueba_funcionamiento", $objeto->prueba_funcionamiento, PDO::PARAM_STR, 2);
        $statement->bindParam(":orden_limpiesa", $objeto->orden_limpiesa, PDO::PARAM_STR, 2);
        $statement->bindParam(":observaciones", $objeto->observaciones, PDO::PARAM_STR, 400);
        $statement->bindParam(":acciones_correctivas", $objeto->acciones_correctivas, PDO::PARAM_STR, 400);
        $statement->bindParam(":firma_tecnico", $objeto->firma_tecnico, PDO::PARAM_STR, 2);
        $statement->bindParam(":firma_mantencion", $objeto->firma_mantencion, PDO::PARAM_STR, 2);
        $statement->bindParam(":id_usuario", $objeto->id_usuario, PDO::PARAM_INT, 3);
        $statement->bindParam(":fecha_intervencion", $objeto->fecha_intervencion, PDO::PARAM_STR, 50);
        $statement->bindParam(":fecha_registro", $objeto->fecha_registro, PDO::PARAM_STR, 50);
        if ($statement->execute()) {
			return $statement->fetch(PDO::FETCH_OBJ);
		} else {
			return FALSE;
		}                                        
	}

}