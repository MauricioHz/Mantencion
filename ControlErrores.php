<?php

class myClass{

    public function crearRepuestoDisponibleModel(Repuesto_disponible_model $objeto) {
        $respuesta = new stdClass();
        $sql = 'INSERT INTO mantencion_repuesto_disponible(id_repuesto, id_bodega, repuesto, cantidad, unidad, saldo, cantidad_minimo, precio, vigente)
                VALUES(:id_repuesto, :id_bodega, :repuesto, :cantidad, :unidad, :saldo, :cantidad_minimo, :precio, "1")';
        try{                
            $statement = $this->db->conn_id->prepare($sql);
            $statement->bindParam(':id_repuesto', $objeto->id_repuesto);
            $statement->bindParam(':id_bodega', $objeto->id_bodega);
            $statement->bindParam(':repuesto', $objeto->repuesto);
            $statement->bindParam(':cantidad', $objeto->cantidad);
            $statement->bindParam(':unidad', $objeto->unidad);
            $statement->bindParam(':saldo', $objeto->saldo);
            $statement->bindParam(':cantidad_minimo', $objeto->cantidad_minimo);
            $statement->bindParam(':precio', $objeto->precio);
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
