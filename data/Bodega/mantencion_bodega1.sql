
DROP TABLE IF EXISTS mantencion_bodega;
CREATE TABLE IF NOT EXISTS mantencion_bodega (
  id_bodega int(2) NOT NULL AUTO_INCREMENT,
  bodega varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  descripcion varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  id_tecnico int(3) NOT NULL,
  fecha_registro datetime NOT NULL,
  vigente boolean,
  PRIMARY KEY (id_bodega)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1;


INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro, vigente) VALUES('BODEGA MAQUINA INNOVA', 'abc1', 1, NOW(), TRUE);
INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro, vigente) VALUES('BODEGA MAQUINA SUKAMI', 'abc2', 1, NOW(), FALSE);
INSERT INTO mantencion_bodega(bodega, descripcion, id_tecnico, fecha_registro, vigente) VALUES('BODEGA MAQUINA INNOVA', 'abc3', 1, NOW(), TRUE);

DROP PROCEDURE IF EXISTS sp_ot_crear_bodega; 
DELIMITER ;;
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
END ;;

DROP PROCEDURE IF EXISTS sp_ot_actualizar_bodega;
<<<<<<< HEAD
DELIMITER ;;
CREATE PROCEDURE sp_ot_actualizar_bodega(IN idBodegaParam varchar(80), IN bodegaParam varchar(80), IN descripcionParam varchar(400), IN idTecnicoParam int(3))
=======
CREATE PROCEDURE sp_ot_actualizar_bodega(
    IN idBodegaParam varchar(80)
    IN bodegaParam varchar(80),
    IN descripcionParam varchar(400),
    IN idTecnicoParam int(3)
)
>>>>>>> 183dbf3312a322e57eda7d1fe5d9d40d12278092
BEGIN
    DECLARE cuenta INT(2);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_bodega WHERE bodega = bodegaParam);
    IF cuenta > 0 THEN
        SELECT 'REGISTRO_EXISTE';
    ELSE
        UPDATE mantencion_bodega 
<<<<<<< HEAD
        SET bodega = bodegaParam, descripcion = descripcionParam, id_tecnico = idTecnicoParam, fecha_registro = NOW();       
=======
        SET bodega = bodegaParam, descripcion = descripcionParam, id_tecnico = idTecnicoParam, fecha_registro = NOW()       
>>>>>>> 183dbf3312a322e57eda7d1fe5d9d40d12278092
        SET @id = LAST_INSERT_ID();
        IF @id > 0 THEN
            SELECT 'ACTUALIZAR_OK';
        ELSE
            SELECT 'ACTUALIZAR_ERROR';
        END IF;
    END IF;
END ;;

DROP PROCEDURE IF EXISTS sp_ot_listar_bodega;
CREATE PROCEDURE sp_ot_listar_bodega()
    SELECT B.id_bodega, B.bodega, B.decripcion, C.id_tecnico, C.tecnico, B.fecha_registro, B.vigente
    FROM mantencion_bodega AS B INNER JOIN mantencion_tecnico AS C
    ON B.id_tecnico =  C.id_tecnico
    ORDER BY bodega;

DROP PROCEDURE IF EXISTS sp_ot_buscar_bodega_id;
DELIMITER ;;
CREATE PROCEDURE sp_ot_buscar_bodega_id(IN idBodegaParam int(2))
<<<<<<< HEAD
    SELECT B.id_bodega, B.bodega, B.descripcion, C.id_tecnico, C.tecnico, B.fecha_registro, B.vigente
    FROM mantencion_bodega AS B INNER JOIN mantencion_tecnico AS C
    ON B.id_tecnico =  C.id_tecnico
    WHERE B.id_bodega = 1
    ORDER BY B.bodega

=======
BEGIN
    SELECT B.id_bodega, B.bodega, B.decripcion, C.id_tecnico, C.tecnico, B.fecha_registro, B.vigente
    FROM mantencion_bodega AS B INNER JOIN mantencion_tecnico AS C
    ON B.id_tecnico =  C.id_tecnico
    WHERE B.id_bodega = idBodegaParam;
    ORDER BY B.bodega;    
END ;;
>>>>>>> 183dbf3312a322e57eda7d1fe5d9d40d12278092

DROP PROCEDURE IF EXISTS sp_ot_eliminar_bodega;
DELIMITER ;;
CREATE PROCEDURE sp_ot_eliminar_bodega(IN idBodegaParam varchar(80))
BEGIN
        UPDATE mantencion_bodega SET vigente = FALSE WHERE idBodegaParam = idBodegaParam;       
        SET @id = ROW_COUNT();
        IF @id > 0 THEN
            SELECT 'ELIMINAR_OK';
        ELSE
            SELECT 'ELIMINAR_ERROR';
        END IF;
END ;;
