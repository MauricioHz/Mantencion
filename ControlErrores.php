<?php

class myClass{

    public function getData(Repuesto_disponible_model $objeto) {
        $respuesta = new stdClass();
        $sql = 'INSERT INTO mantencion_repuesto_disponible(id_repuesto, id_bodega, repuesto, cantidad, unidad, saldo, cantidad_minimo, precio, vigente)
                VALUES(:id_repuesto, :id_bodega, :repuesto, :cantidad, :unidad, :saldo, :cantidad_minimo, :precio, "1")';
        try{                
            $statement = $this->db->conn_id->prepare($sql);
            $statement->bindParam(':id_repuesto', $objeto->id_repuesto);

            if ($statement->execute()) {
                $respuesta->mensaje = 'OK';
                $respuesta->codigo = '1';
            } else {
                $errorInfo = $statement->errorInfo();
                $respuesta->mensaje = 'ERROR ' . $errorInfo[2];
                $respuesta->codigo = '0';
            }
        }catch(PDOException $e){
            $respuesta->mensaje = 'PDOException ' . $info;
            $respuesta->codigo = '999';
        }
        return $respuesta;
    }
    
}
