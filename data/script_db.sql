/*
Procedimientos almacenados que realicen las acciones de insertar deberá tener la siguiente estructura:

CREATE PROCEDURE spCrearProducto(IN productoParam VARCHAR(50), IN cantidadParam INT(8))
BEGIN 
    SET @count = (SELECT COUNT(1) FROM producto WHERE producto = productoParam);
    IF @count = 0 THEN    
        INSERT INTO producto(producto, cantidad) VALUES(productoParam, cantidadParam);
        SELECT 'REGISTRO_INSERTADO' as mensaje;
    ELSE
        SELECT 'REGISTRO_EXISTE' AS mensaje;
    END IF;
END

Devolvera 'REGISTRO_INSERTADO' o para evitar duplicados'REGISTRO_EXISTE'.

*/

-- ---------------------------------------------------------------------------------------
-- Nueva seccion bodega
-- ---------------------------------------------------------------------------------------
DROP TABLE IF EXISTS inventario_bodega;
CREATE TABLE IF NOT EXISTS inventario_bodega (
  idBodega int(2) NOT NULL AUTO_INCREMENT,
  nombreBodega varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  descripcion varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  fechaRegistro datetime DEFAULT NULL,
  usuarioRegistro int(3) DEFAULT NULL,
  PRIMARY KEY (`idBodega`)
) ENGINE=innodb  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

INSERT INTO inventario_bodega(nombreBodega, descripcion, fechaRegistro, usuarioRegistro) 
VALUES('BODEGA REPUESTOS','Almacena todos los repuestos de las maquinas de la avícola','2017-05-25 01:01:01', 1),
VALUES('BODEGA MAQUINARIA AGRICOLA','Almacena todos los repuestos de tractores y maquinas agrícolas','2017-05-25 01:01:01', 1),
VALUES('BODEGA INSUMOS','Almacena todos los insumos de la avícola','2017-05-25 01:01:01', 1);

DROP PROCEDURE IF EXISTS spCrearBodega;
DELIMITER ;;
CREATE PROCEDURE spCrearBodega(IN nombreBodegaParam VARCHAR(80), IN descripcionParam varchar(200), IN usuarioRegistroParam INT(1))
BEGIN 
    SET @count = (SELECT COUNT(1) FROM inventario_bodega WHERE nombreBodega = nombreBodegaParam);
    IF @count = 0 THEN    
    INSERT INTO inventario_bodega(nombreBodega, descripcion, fechaRegistro, usuarioRegistro) 
    VALUES(nombreBodegaParam, descripcionParam, NOW(), usuarioRegistroParam);
    SELECT 'REGISTRO_INSERTADO' as mensaje;
    ELSE
    SELECT 'REGISTRO_EXISTE' AS mensaje;
    END IF;
END;;

CALL spCrearBodega('BODEGA REPUESTOS','Almacena todos los repuestos de las maquinas de la avícola', 1);
CALL spCrearBodega('BODEGA MAQUINARIA AGRICOLA','Almacena todos los repuestos de tractores y maquinas agrícolas', 1);
CALL spCrearBodega('BODEGA INSUMOS','Almacena todos los insumos de la avícola', 1);

-- Actualizar
DROP PROCEDURE IF EXISTS spActualizarBodega;
DELIMITER ;;
CREATE PROCEDURE spActualizarBodega()









-- ---------------------------------------------------------------------------------------
-- FIN SECCION BODEGA
-- ---------------------------------------------------------------------------------------


-- Vaciar tablas de parametros
TRUNCATE TABLE mantencion_plan;
TRUNCATE TABLE mantencion_area;
TRUNCATE TABLE mantencion_sub_area;

-- Tablas de resultado
TRUNCATE TABLE mantencion_equipo_actividad;
TRUNCATE TABLE mantencion_programa_semana;
TRUNCATE TABLE mantencion_orden_trabajo;

DELETE TABLE  mantencion_orden_registro;


INSERT INTO mantencion_plan
(codigo_plan, fecha_plan, version, anio, nombre_plan, fecha_registro, id_usuario_registro, observacion) 
VALUES('PLA-G-0.0', '2017-05-25', '1', '2017', 'PLAN DE PRUEBAS', now(), 1, 'Plan para realizar pruebas.');


BEGIN
    DECLARE cuenta INT(8);
    SET cuenta = (SELECT count(1) FROM mantencion_plan WHERE nombre_plan = var_nombre_plan);
    IF cuenta > 0 THEN
        SELECT 'SI_EXISTE' AS mensaje;
    ELSE
        INSERT INTO mantencion_plan
        (
        codigo_plan,
        fecha_plan,
        version,
        anio,
        nombre_plan,
        fecha_registro,
        id_usuario_registro,
        observacion
            ) 
        VALUES(
        var_codigo_plan,
        var_fecha_plan,
        var_version,
        var_anio,
        var_nombre_plan,
        now(),
        var_id_usuario,
        var_observacion
           );
        SET @id = LAST_INSERT_ID();
    	IF @id > 0 THEN
        	SELECT 'OK_INGRESADO' AS mensaje;
    	END IF;
    END IF;
END
