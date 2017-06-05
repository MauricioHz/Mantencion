

DROP TABLE IF EXISTS mantencion_bodega;
CREATE TABLE IF NOT EXISTS mantencion_bodega (
  id_bodega int(2) NOT NULL AUTO_INCREMENT,
  bodega varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  descripcion varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  id_tecnico int(3) NOT NULL,
  fecha_registro datetime NOT NULL,
  PRIMARY KEY (id_bodega)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1;


INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro) VALUES('BODEGA MAQUINA INNOVA', 'abc1', NOW());
INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro) VALUES('BODEGA MAQUINA SUKAMI', 'abc2', NOW());
INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro) VALUES('BODEGA MAQUINA INNOVA', 'abc3', NOW());

DROP PROCEDURE IF EXISTS sp_ot_crear_bodega; 
CREATE PROCEDURE sp_ot_crear_bodega(
    IN bodegaParam varchar(80),
    IN descripcionParam varchar(400),
    IN idTecnicoParam int(3)
)
BEGIN
    DECLARE cuenta INT(2);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_bodega WHERE bodega = bodegaParam);
    IF cuenta > 0 THEN
        SELECT 'REGISTRO_EXISTE';
    ELSE
        INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro, vigente) 
        VALUES(bodegaParam, descripcionParam, idTecnicoParam, NOW(), TRUE);
        SET @id = LAST_INSERT_ID();
        IF @id > 0 THEN
            SELECT 'INSERTAR_OK';
        ELSE
            SELECT 'INSERTAR_ERROR';
        END IF;
    END IF;
END

DROP PROCEDURE IF EXISTS sp_ot_actualizar_bodega;
CREATE PROCEDURE sp_ot_actualizar_bodega(IN bodegaParam varchar(80))
BEGIN
    DECLARE cuenta INT(2);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_bodega WHERE bodega = bodegaParam);
    IF cuenta > 0 THEN
        SELECT 'REGISTRO_EXISTE';
    ELSE
        UPDATE mantencion_bodega SET bodega = bodegaParam, fecha_registro = NOW()        
        SET @id = LAST_INSERT_ID();
        IF @id > 0 THEN
            SELECT 'ACTUALIZAR_OK';
        ELSE
            SELECT 'ACTUALIZAR_ERROR';
        END IF;
    END IF;
END

DROP PROCEDURE IF EXISTS sp_ot_listar_bodega;
CREATE PROCEDURE sp_ot_listar_bodega()
    SELECT id_bodega, bodega, fecha_registr FROM mantencion_bodega ORDER BY bodega;

DROP PROCEDURE IF EXISTS sp_ot_buscar_bodega_id;
DELIMITER ;;
CREATE PROCEDURE sp_ot_buscar_bodega_id(IN idBodegaParam int(2))
BEGIN
    SELECT id_bodega, bodega, fecha_registro
    FROM mantencion_bodega
    WHERE id_bodega = idBodegaParam;
END ;;

DROP PROCEDURE IF EXISTS sp_ot_eliminar_bodega;
DELIMITER ;;
CREATE PROCEDURE sp_ot_eliminar_bodega(IN idBodegaParam varchar(80))
BEGIN
        DELETE FROM mantencion_bodega WHERE idBodegaParam = idBodegaParam;       
        SET @id = ROW_COUNT();
        IF @id > 0 THEN
            SELECT 'ELIMINAR_OK';
        ELSE
            SELECT 'ELIMINAR_ERROR';
        END IF;
END ;;
