<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

public $id_usuario;
public $usuario;
public $clave;
public $clave2;
public $activo;
public $cookie;
public $nombre_usuario;
public $cargo;
public $correo;
public $perfil;
public $modulo_oc;
public $modulo_nc;
public $modulo_ot;
public $modulo;

    public function __construct() {
        parent::__construct();
        $this->load->database('pdo');
    }

    public function buscar_usuario_model(Usuario_model $usuario) {
        $sql = "CALL sp_usr_buscar_usuario(:usuario, :clave)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":usuario", $usuario->usuario, PDO::PARAM_STR, 20);
        $statement->bindParam(":clave", $usuario->clave, PDO::PARAM_STR, 4);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }
    
    public function buscar_usuario_por_id_model($id_usuario) {
        $sql = "CALL sp_usr_buscar_usuario_por_id(:id)";
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindParam(":id", $id_usuario, PDO::PARAM_INT, 3);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_OBJ);
        } else {
            return FALSE;
        }
    }
    
    public function listar_usuarios_model() {
		$sql = "CALL sp_listar_usuarios;";
		$statement = $this->db->conn_id->prepare($sql);
		if ($statement->execute()) {
			return $statement->fetchAll(PDO::FETCH_OBJ);
		} else {
			return FALSE;
		}
	}
	
	public function actualizar_usuario_model(){
		$sql = "CALL sp_ot_actualizar_equipo(:id_usuario, :clave1, :clave2);";
		$statement = $this->db->conn_id->prepare($sql);
		$statement->bindParam(":id_usuario", $objeto->id_usuario, PDO::PARAM_INT, 3);
		$statement->bindParam(":id_clave", $objeto->clave, PDO::PARAM_STR, 3);
		$statement->bindParam(":id_clave2", $objeto->clave2, PDO::PARAM_STR, 3);
		if ($statement->execute()) {
			return $statement->rowCount();
		} else {
			return FALSE;
		}
	}
	
	

}