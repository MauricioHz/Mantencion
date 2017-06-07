-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2017 a las 05:21:21
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `santamar_desarrollo`
--
CREATE DATABASE IF NOT EXISTS `santamar_desarrollo` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `santamar_desarrollo`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_actividad_resumen`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_actividad_resumen`()
    NO SQL
SELECT usuario, 
SUBSTRING_INDEX(url,'?',-1), 
count(1) as cuenta
FROM app_usuario_actividad
WHERE usuario <> ' crodriguez@asml.cl '
GROUP BY usuario, SUBSTRING_INDEX(url,'?',-1)
ORDER BY fecha DESC$$

DROP PROCEDURE IF EXISTS `sp_actividad_usuario`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_actividad_usuario`()
    NO SQL
SELECT YEAR( fecha ) , MONTH( fecha ) , DAY( fecha ) , usuario, COUNT( 1 ) AS CUENTA
FROM  `app_usuario_actividad` 
GROUP BY YEAR( fecha ) , MONTH( fecha ) , usuario
ORDER BY cuenta DESC 
LIMIT 0 , 30$$

DROP PROCEDURE IF EXISTS `sp_exportar_actividad_usuario`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_exportar_actividad_usuario`()
    NO SQL
SELECT 
concat(id,';', fecha, ';', usuario, ';', url)
FROM app_usuario_actividad$$

DROP PROCEDURE IF EXISTS `sp_listar_tablas_db`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_listar_tablas_db`()
    NO SQL
    COMMENT 'Obtiene estadística de todas las tablas'
select * from information_schema.tables 
where table_schema in('santamar_desarrollo','santamar_gestion')$$

DROP PROCEDURE IF EXISTS `sp_listar_usuarios`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_listar_usuarios`()
    NO SQL
SELECT
id_usuario,
usuario,
clave,
clave2,
activo,
cookie,
nombre_usuario,
cargo,
correo,
perfil,
modulo_oc,
modulo_nc,
modulo_ot
FROM app_usuario
ORDER BY nombre_usuario$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_area`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_actualizar_area`(IN `var_id` INT(3), IN `var_area` VARCHAR(50))
    NO SQL
UPDATE mantencion_area 
SET area = var_area
WHERE id_area = var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_bodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_actualizar_bodega`(IN `idBodegaParam` VARCHAR(80), IN `bodegaParam` VARCHAR(80), IN `descripcionParam` VARCHAR(400), IN `idTecnicoParam` INT(3))
BEGIN
    DECLARE cuenta INT(2);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_bodega WHERE bodega = bodegaParam);
    IF cuenta > 0 THEN
        SELECT 'REGISTRO_EXISTE' as mensaje;
    ELSE
        UPDATE mantencion_bodega 
        SET bodega = bodegaParam, descripcion = descripcionParam, id_tecnico = idTecnicoParam, fecha_registro = NOW()
        WHERE id_bodega = idBodegaParam;       
        SET @id = ROW_COUNT();
        IF @id > 0 THEN
            SELECT 'ACTUALIZAR_OK' as mensaje;
        ELSE
            SELECT 'ACTUALIZAR_ERROR' as mensaje;
        END IF;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_equipo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_actualizar_equipo`(IN `var_id_equipo` INT(3), IN `var_id_area` INT(3), IN `var_id_plan` INT(3), IN `var_tipo` CHAR(1), IN `var_equipo_actividad` VARCHAR(80), IN `var_id_responzable` INT(3), IN `var_observacion` VARCHAR(200))
    NO SQL
UPDATE mantencion_equipo_actividad
SET 
    id_area = var_id_area,
    id_plan = var_id_plan,
    tipo = var_tipo,
    equipo_actividad = var_equipo_actividad,
    id_responzable = var_id_responzable,
    observacion = var_observacion,
    fecha_registro = now()
WHERE id_equipo = var_id_equipo$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_orden_trabajo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_actualizar_orden_trabajo`(IN `var_id_orden` INT(3), IN `var_sector` VARCHAR(30), IN `var_elemento` VARCHAR(30), IN `var_pabellon` VARCHAR(30), IN `var_atril` VARCHAR(30), IN `var_fecha_inicio` VARCHAR(50), IN `var_fecha_termino` VARCHAR(50), IN `var_tipo_mantencion` VARCHAR(10), IN `var_descripcion` VARCHAR(400), IN `var_observacion` VARCHAR(400), IN `var_tecnico` VARCHAR(50), IN `var_supervisor` VARCHAR(50))
UPDATE mantencion_orden_trabajo
    SET
        id_equipo = var_id_equipo,
        id_area = var_id_area,
        sector = var_sector,
        elemento = var_elemento,
        pabellon = var_pabellon,
        atril = var_atril,
        fecha_inicio = var_fecha_inicio,
        fecha_termino = var_fecha_termino,
        tipo_mantencion = var_tipo_mantencion,
        descripcion = var_descripcion,
        observacion = var_observacion,
        tecnico = var_tecnico,
        supervisor = var_supervisor,
        usuario_registro = 1,
        fecha_registro = NOW(),
        estado_aprobacion = 0,
        semana = var_semana
    WHERE id_orden = var_id_orden$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_plan`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_actualizar_plan`(IN `var_codigo` VARCHAR(15), IN `var_fecha` DATE, IN `var_version` INT(2), IN `var_anio` INT(4), IN `var_nombre_plan` VARCHAR(200), IN `var_id_usuario` INT(3), IN `var_observacion` VARCHAR(400), IN `var_id` INT(3))
    NO SQL
UPDATE mantencion_plan
SET
codigo_plan = var_codigo,
fecha_plan = var_fecha,
version = var_version,
anio = var_anio,
nombre_plan = var_nombre_plan,
fecha_registro = now(),
id_usuario_registro = var_id_usuario,
observacion = var_observacion
WHERE id_plan = var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_programa_semana`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_actualizar_programa_semana`(IN `var_id_equipo` INT(3), IN `var_anio` INT(4), IN `var_id_plan` INT(3), IN `var_semana` INT(2))
    NO SQL
INSERT INTO mantencion_programa_semana(id_equipo,anio, id_plan, semana)
VALUES(var_id_equipo, year(now), var_id_plan, var_semana)$$

DROP PROCEDURE IF EXISTS `sp_ot_actualizar_subareas`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_actualizar_subareas`(IN `p_id_sub_area` INT(3), IN `p_subarea` VARCHAR(80))
    NO SQL
BEGIN
	UPDATE mantencion_sub_area SET subarea = p_subarea, fecha_registro = now()
	WHERE id_sub_area = p_id_sub_area;            
    SET @id = ROW_COUNT();
    IF @id > 0 THEN
    	SELECT 'MODIFICADO_OK' AS mensaje;
    ELSE
    	SELECT 'MODIFICADO_ERROR' AS mensaje;    
    END IF;   
END$$

DROP PROCEDURE IF EXISTS `sp_ot_autorizar`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_autorizar`(IN `id` INT(8), IN `valor` INT(1))
    NO SQL
BEGIN
    UPDATE mantencion_orden_trabajo 
    SET estado_aprobacion = valor
    WHERE id_orden = id;
    SELECT ROW_COUNT() AS mensaje;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_areas`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_areas`(IN `var_id` INT(3))
    NO SQL
SELECT id_area, area 
FROM mantencion_area
WHERE id_area = var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_bodega_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_buscar_bodega_id`(IN `idBodegaParam` INT(2))
SELECT B.id_bodega, B.bodega, B.descripcion, C.id_tecnico, C.tecnico, B.fecha_registro, B.vigente
    FROM mantencion_bodega AS B INNER JOIN mantencion_tecnico AS C
    ON B.id_tecnico =  C.id_tecnico
    WHERE B.id_bodega = idBodegaParam
    ORDER BY B.bodega$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_detalle_repuestos`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_detalle_repuestos`(IN `var_id_orden` INT(8))
    NO SQL
SELECT 
id_repuesto, 
id_orden, 
cantidad, 
repuesto, 
fecha_registro 
FROM `mantencion_repuestos` 
WHERE id_orden = var_id_orden$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_equipo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_equipo`(IN `var_id` INT(3))
    NO SQL
SELECT
A.id_equipo,
A.equipo_actividad,
A.id_area,
S.id_sub_area,
S.subarea,
A.id_plan,
C.nombre_plan,
A.tipo,
B.area,
A.equipo_actividad,
A.observacion,
A.id_responzable,
A.fecha_registro
FROM mantencion_equipo_actividad AS A LEFT JOIN mantencion_area AS B
ON A.id_area = B.id_area
INNER JOIN mantencion_plan AS C
ON A.id_plan = C.id_plan
LEFT JOIN mantencion_sub_area AS S
ON A.id_sub_area = S.id_sub_area
WHERE id_equipo = var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_equipo_semana`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_equipo_semana`(IN `var_id_equipo` INT(3))
    NO SQL
SELECT * 
FROM mantencion_programa_semana
WHERE id_equipo = var_id_equipo
ORDER BY id_semana$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_orden_trabajo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_orden_trabajo`(IN `p_id_orden` INT(7))
    NO SQL
SELECT 
A.id_orden,
B.equipo_actividad,
C.nombre_plan,
D.area,
E.subarea,
A.id_equipo,
DATE_FORMAT(A.fecha_inicio,'%d/%m/%Y') AS fecha_inicio,
DATE_FORMAT(A.fecha_termino,'%d/%m/%Y') AS fecha_termino,
A.tipo_mantencion,
A.descripcion,
A.observacion,
A.tecnico,
A.supervisor,
A.usuario_registro,
A.fecha_registro,
A.estado_aprobacion,
A.semana,
A.ciclO
FROM mantencion_orden_trabajo AS A INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo
INNER JOIN mantencion_plan AS C
ON B.id_plan = C.id_plan
INNER JOIN mantencion_area AS D
ON B.id_area = D.id_area
INNER JOIN mantencion_sub_area AS E
ON B.id_sub_area = E.id_sub_area
WHERE A.id_orden = 45$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_plan`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_plan`(IN `var_id` INT(3))
    NO SQL
SELECT
id_plan,
codigo_plan,
fecha_plan,
version,
anio,
nombre_plan,
fecha_registro,
id_usuario_registro,
observacion
FROM mantencion_plan
WHERE id_plan = var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_plan_semana`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_plan_semana`(IN `var_semana` VARCHAR(5))
    NO SQL
SELECT 
A.id_semana,
A.id_equipo,
B.id_area,
D.id_plan,
D.codigo_plan,
D.nombre_plan,
C.area,
B.equipo_actividad,
A.semana,
A.orden_trabajo AS orden_realizada,
A.orden_trabajo AS id_orden
FROM mantencion_programa_semana AS A
INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo
INNER JOIN mantencion_area AS C
ON B.id_area = C.id_area
INNER JOIN mantencion_plan AS D
ON A.id_plan = D.id_plan
WHERE semana = var_semana
ORDER BY B.id_equipo$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_programa_semana_equipo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_buscar_programa_semana_equipo`(IN `var_semana` VARCHAR(5), IN `var_id` INT(3))
    NO SQL
SELECT 
A.id_semana,
A.id_equipo,
B.id_area,
R.id_sub_area,
R.subarea,
D.id_plan,
D.codigo_plan,
D.nombre_plan,
C.area,
B.equipo_actividad,
A.semana,
A.orden_trabajo AS orden_realizada,
A.orden_trabajo AS id_orden
FROM mantencion_programa_semana AS A
INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo
INNER JOIN mantencion_area AS C
ON B.id_area = C.id_area
INNER JOIN mantencion_plan AS D
ON A.id_plan = D.id_plan
INNER JOIN mantencion_sub_area AS R
ON C.id_area = R.id_sub_area
WHERE semana = var_semana AND B.id_equipo = var_id
ORDER BY B.id_equipo$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_semana_mantencion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_buscar_semana_mantencion`(IN `p_semana` VARCHAR(5))
    NO SQL
SELECT
A.id_plan,
B.id_area,
A.id_equipo,
A.semana,
B.equipo_actividad as equipo,
A.actividad
FROM mantencion_programa_semana AS A INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo
AND A.semana = p_semana$$

DROP PROCEDURE IF EXISTS `sp_ot_buscar_subareas`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_buscar_subareas`(IN `p_id_sub_area` INT(3))
    NO SQL
SELECT
A.id_sub_area,
A.id_area,
B.area,
A.subarea,
A.fecha_registro
FROM mantencion_sub_area AS A INNER JOIN mantencion_area AS B
ON A.id_area = B.id_area
WHERE A.id_sub_area = p_id_sub_area$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_area`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_crear_area`(IN `var_area` VARCHAR(50))
BEGIN
    DECLARE cuenta INT(8);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_area WHERE area = var_area);
    IF cuenta > 0 THEN
        SELECT 'SI_EXISTE' AS mensaje;
    ELSE
        INSERT INTO mantencion_area(area,fecha_registro) VALUES(var_area, now());
    SET @id = LAST_INSERT_ID();
    	IF @id > 0 THEN
            INSERT INTO mantencion_sub_area(id_area, subarea, fecha_registro) VALUES(@id, var_area, now());
        	SELECT 'OK_INGRESADO' AS mensaje;
    	END IF;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_bodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_crear_bodega`(
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
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_detalle_repuesto`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_detalle_repuesto`(IN `p_id_orden` INT(3), IN `p_cantidad` INT(6), IN `p_repuesto` VARCHAR(80))
INSERT INTO mantencion_repuestos
   (
        id_orden, 
        cantidad, 
        repuesto, 
        fecha_registro
    )
VALUES
    (
        p_id_orden, 
        p_cantidad, 
        p_repuesto, 
        NOW()
    )$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_equipo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_equipo`(IN `id_area` INT(3), IN `id_sub_area` INT(3), IN `id_plan` INT(3), IN `tipo` CHAR(1), IN `equipo_actividad` VARCHAR(80), IN `id_responzable` INT(3), IN `observacion` VARCHAR(200))
    NO SQL
BEGIN
  INSERT INTO mantencion_equipo_actividad
  (
  	id_plan, 
    id_area, 
    id_sub_area,  
    tipo, 
    equipo_actividad, 
    id_responzable, 
    observacion, 
    fecha_registro
  )
  VALUES
  (
    id_plan, 
    id_area,
    id_sub_area,
    tipo, 
    equipo_actividad, 
    id_responzable, 
    observacion, 
    NOW()
   );
  SET @id = LAST_INSERT_ID();
  SELECT @id;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_orden_trabajo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_crear_orden_trabajo`(IN `var_id_equipo` INT(3), IN `var_fecha_inicio` VARCHAR(50), IN `var_fecha_termino` VARCHAR(50), IN `var_tipo_mantencion` VARCHAR(10), IN `var_descripcion` VARCHAR(400), IN `var_observacion` VARCHAR(400), IN `var_tecnico` VARCHAR(50), IN `var_supervisor` VARCHAR(50), IN `var_usuario` INT(3), IN `var_semana` VARCHAR(5), IN `var_ciclo` INT(1))
BEGIN
DECLARE cuenta INT(8);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_orden_trabajo WHERE id_equipo = var_id_equipo AND semana = var_semana);
        IF cuenta > 0 AND var_tipo_mantencion = 'PREVENTIVA' THEN
            SELECT 'SI_EXISTE' AS mensaje;
        ELSE
        INSERT INTO mantencion_orden_trabajo(
        id_equipo,
        fecha_inicio,
        fecha_termino,
        tipo_mantencion,
        descripcion,
        observacion,
        tecnico,
        supervisor,
        usuario_registro,
        fecha_registro,
        estado_aprobacion,
        semana,
        ciclo)
        VALUES(
        var_id_equipo,
        var_fecha_inicio,
        var_fecha_termino,
        var_tipo_mantencion,
        var_descripcion,
        var_observacion,
        var_tecnico,
        var_supervisor,
        1,
        NOW(),
        0,
        var_semana,
        var_ciclo);
          SET @id = LAST_INSERT_ID();
          IF @id > 0 AND var_tipo_mantencion = 'PREVENTIVA' THEN
                UPDATE mantencion_programa_semana SET orden_trabajo = @id
                WHERE id_equipo = var_id_equipo
                AND semana = var_semana;
          END IF;
          SELECT CONCAT('OK_INGRESADO', ';', @id) AS mensaje;
      END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_plan`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_plan`(IN `var_codigo_plan` VARCHAR(15) CHARSET utf8, IN `var_fecha_plan` VARCHAR(10) CHARSET utf8, IN `var_version` INT(2), IN `var_anio` INT(4), IN `var_nombre_plan` VARCHAR(200) CHARSET utf8, IN `var_id_usuario` INT(3), IN `var_observacion` VARCHAR(400))
    NO SQL
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
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_producto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_crear_producto`(IN `idCategoriaParam` INT(11), IN `codigoParam` VARCHAR(100), IN `productoParam` VARCHAR(100), IN `idBodegaParam` INT(2), IN `cantidadParam` INT(11), IN `cantidadMinimoParam` INT(4), IN `precioParam` INT(8))
BEGIN
    DECLARE cuenta INT(2);
    SET cuenta = (SELECT COUNT(1) FROM inventario_producto WHERE producto = productoParam);
    IF cuenta > 0 THEN
        SELECT 'REGISTRO_EXISTE' as mensaje;
    ELSE
        INSERT INTO inventario_producto(id_categoria, codigo, producto, id_bodega, cantidad, cantidad_minimo, precio, fecha_registro, vigente) 
        VALUES(idCategoriaParam, codigoParam, productoParam, idBodegaParam, cantidadParam, cantidadMinimoParam, precioParam, NOW(), TRUE);
        SET @id = ROW_COUNT();
        IF @id > 0 THEN
            SELECT 'INSERTAR_OK' as mensaje;
        ELSE
            SELECT 'INSERTAR_ERROR' as mensaje;
        END IF;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_programa_semana`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_crear_programa_semana`(IN `var_id_equipo` INT(3), IN `var_id_plan` INT(3), IN `var_semana` VARCHAR(5), IN `actividadParam` VARCHAR(200))
INSERT INTO mantencion_programa_semana
(
    id_equipo, 
    id_plan, 
    anio, 
    semana, 
    orden_trabajo,
    actividad,
    fecha_ultima_modificacion
)
VALUES
(
    var_id_equipo, 
    var_id_plan, 
    YEAR(NOW()),
    var_semana, 
    0,
    actividadParam,
    NOW()
)$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_registro_mantencion`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_registro_mantencion`(IN `p_id_orden` INT(7), IN `p_id_equipo` INT(3), IN `p_elemento` VARCHAR(30), IN `p_pabellon` VARCHAR(30), IN `p_atril` VARCHAR(30), IN `p_fecha_hora_inicio` DATETIME, IN `p_fecha_hora_termino` DATETIME, IN `p_tipo_mantencion` VARCHAR(10), IN `p_piso_nivel` VARCHAR(30), IN `p_descripcion_intervencion` VARCHAR(400), IN `p_prueba_funcionamiento` CHAR(2), IN `p_orden_limpiesa` CHAR(2), IN `p_observaciones` VARCHAR(400), IN `p_acciones_correctivas` VARCHAR(400), IN `p_firma_tecnico` CHAR(2), IN `p_firma_mantencion` CHAR(2), IN `p_id_usuario` INT(3), IN `p_fecha_intervencion` DATETIME)
BEGIN
INSERT INTO mantencion_orden_registro
(
    id_orden,
    id_equipo,
    elemento,
    pabellon,
    atril,
    fecha_hora_inicio,
    fecha_hora_termino,
    tipo_mantencion,
    piso_nivel,
    descripcion_intervencion,
    prueba_funcionamiento,
    orden_limpiesa,
    observaciones,
    acciones_correctivas,
    firma_tecnico,
    firma_mantencion,
    id_usuario,
    fecha_intervencion,
    fecha_registro
)
VALUES(
    p_id_orden,
    p_id_equipo,
    p_elemento,
    p_pabellon,
    p_atril,
    p_fecha_hora_inicio,
    p_fecha_hora_termino,
    p_tipo_mantencion,
    p_piso_nivel,
    p_descripcion_intervencion,
    p_prueba_funcionamiento,
    p_orden_limpiesa,
    p_observaciones,
    p_acciones_correctivas,
    p_firma_tecnico,
    p_firma_mantencion,
    p_id_usuario,
    p_fecha_intervencion,
    now()
);
SET @id = LAST_INSERT_ID();
SELECT @id;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_crear_subarea`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_subarea`(IN `p_id_area` INT(3), IN `p_subarea` VARCHAR(80))
    NO SQL
BEGIN
    DECLARE cuenta INT(8);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_sub_area WHERE subarea = p_subarea);
    IF cuenta > 0 THEN
        SELECT 'SI_EXISTE' AS mensaje;
    ELSE
        INSERT INTO mantencion_sub_area(id_area, subarea,fecha_registro) VALUES(p_id_area, p_subarea, now());
    SET @id = LAST_INSERT_ID();
    	IF @id > 0 THEN
        	SELECT 'OK_INGRESADO' AS mensaje;
    	END IF;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_eliminar_area`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_eliminar_area`(IN `var_id` INT(3))
    NO SQL
DELETE FROM mantencion_area
WHERE id_area= var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_eliminar_bodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_eliminar_bodega`(IN idBodegaParam varchar(80))
BEGIN
        DELETE FROM mantencion_bodega WHERE idBodegaParam = idBodegaParam;       
        SET @id = ROW_COUNT();
        IF @id > 0 THEN
            SELECT 'ELIMINAR_OK';
        ELSE
            SELECT 'ELIMINAR_ERROR';
        END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_eliminar_equipo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_eliminar_equipo`(IN `var_id` INT(3))
    NO SQL
IF (SELECT COUNT(1) FROM mantencion_programa_semana WHERE id_equipo = var_id) = 0 THEN
	DELETE FROM mantencion_equipo_actividad WHERE id_equipo = var_id;
ELSE
	SELECT 'EXISTEN_REGISTROS_RELACIONADOS';
END IF$$

DROP PROCEDURE IF EXISTS `sp_ot_eliminar_orden_trabajo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_eliminar_orden_trabajo`(IN `p_id_orden` INT(6), IN `p_semana` VARCHAR(5))
    NO SQL
BEGIN
    DECLARE countRow INT;
	
    DELETE FROM mantencion_orden_trabajo 
    WHERE id_orden = p_id_orden;
	SET countRow =  ROW_COUNT();
    INSERT INTO aux(item)VALUES(countRow);

	IF(countRow > 0)THEN
        UPDATE mantencion_programa_semana
        SET orden_trabajo = 0
        WHERE orden_trabajo = p_id_orden
        AND semana = p_semana;
        SELECT ROW_COUNT() AS mensaje;
        INSERT INTO aux(item)
        VALUES(CONCAT('UPDATE',ROW_COUNT()));
    ELSE
		SELECT 0 AS mensaje;
	END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_eliminar_plan`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_eliminar_plan`(IN `var_id` INT(3))
    NO SQL
DELETE FROM mantencion_plan WHERE id_plan = var_id$$

DROP PROCEDURE IF EXISTS `sp_ot_eliminar_programa_semana`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_eliminar_programa_semana`(IN `var_id_equipo` INT)
    NO SQL
DELETE FROM mantencion_programa_semana 
WHERE id_equipo = var_id_equipo
/*
Agregar como parametro el año, 
ya que se debe elimiar un programa que sea anual del año no otro.
*/$$

DROP PROCEDURE IF EXISTS `sp_ot_existe_orden`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_existe_orden`(IN `orden` INT(6), IN `sem` VARCHAR(5))
BEGIN
    DECLARE cuenta INT(6);
    SET cuenta = (SELECT COUNT(1) FROM mantencion_orden_trabajo
    WHERE id_orden = orden AND semana = sem);
    IF cuenta > 0 THEN
    	SELECT 'ORDEN_REGISTRADA';
    ELSE
    	SELECT 'INSERTAR...';
    END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_existe_plan`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_existe_plan`(IN `codigo_plan` VARCHAR(15), IN `nombre_plan` VARCHAR(300))
    NO SQL
BEGIN
SELECT 1;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_indicador_cumplimiento`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_indicador_cumplimiento`(IN `p_semana` VARCHAR(5))
    NO SQL
    COMMENT 'Estadistica'
BEGIN
    DECLARE total INT(8);
    DECLARE terminado INT(8);
    DECLARE indicador DECIMAL(2, 2);
    SET total = (
    SELECT COUNT(1) FROM mantencion_programa_semana 
    WHERE semana = p_semana);
    SET terminado = (
    SELECT COUNT(1) FROM mantencion_programa_semana 
    WHERE orden_trabajo = 0 AND semana = p_semana);
    -- SELECT total;
    -- SELECT terminado;    
    SET indicador = 1-(terminado/total);
    SELECT CONCAT(indicador,'%');
END$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_areas`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_areas`()
    NO SQL
SELECT id_area, area FROM mantencion_area ORDER BY area$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_bodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_listar_bodega`()
SELECT B.id_bodega, B.bodega, B.descripcion, C.id_tecnico, C.tecnico, B.fecha_registro, B.vigente
    FROM mantencion_bodega AS B INNER JOIN mantencion_tecnico AS C
    ON B.id_tecnico =  C.id_tecnico
    ORDER BY bodega$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_categoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_listar_categoria`()
    NO SQL
SELECT
id_categoria,
categoria,
descripcion,
fecha_registro,
vigente
FROM inventario_categoria
ORDER BY categoria$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_equipos`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_equipos`()
    NO SQL
SELECT 
A.id_equipo,
A.id_area,
B.area,
A.equipo_actividad, 
A.observacion,
A.fecha_registro,
(SELECT COUNT(1) FROM mantencion_programa_semana WHERE id_equipo = A.id_equipo) AS programa
FROM mantencion_equipo_actividad AS A INNER JOIN 
     mantencion_area AS B
ON A.id_area = B.id_area
ORDER BY 
id_equipo$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_orden_trabajo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_orden_trabajo`()
    NO SQL
SELECT 
A.id_orden,
B.equipo_actividad,
C.nombre_plan,
D.area,
E.subarea,
A.id_equipo,
DATE_FORMAT(A.fecha_inicio,'%d/%m/%Y') AS fecha_inicio,
DATE_FORMAT(A.fecha_termino,'%d/%m/%Y') AS fecha_termino,
A.tipo_mantencion,
A.descripcion,
A.observacion,
A.tecnico,
A.supervisor,
A.usuario_registro,
A.fecha_registro,
A.estado_aprobacion,
A.semana,
A.ciclO
FROM mantencion_orden_trabajo AS A INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo
INNER JOIN mantencion_plan AS C
ON B.id_plan = C.id_plan
INNER JOIN mantencion_area AS D
ON B.id_area = D.id_area
INNER JOIN mantencion_sub_area AS E
ON B.id_sub_area = E.id_sub_area
ORDER BY A.id_orden DESC$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_planes`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_planes`()
    NO SQL
SELECT
    id_plan,
    codigo_plan,
    fecha_plan,
    version,
    anio,
    nombre_plan,
    fecha_registro,
    id_usuario_registro,
    observacion
FROM mantencion_plan
ORDER BY id_plan DESC$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_producto_por_bodega`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_listar_producto_por_bodega`(IN `idBodegaParam` INT(2))
    NO SQL
SELECT P.id_producto, P.id_bodega, P.id_categoria, 
B.bodega, C.categoria,
P.codigo, P.producto, P.cantidad, P.precio, P.cantidad_minimo, P.fecha_registro, P.vigente
FROM inventario_producto AS P INNER JOIN mantencion_bodega AS B
ON P.id_bodega = B.id_bodega
INNER JOIN inventario_categoria AS C
ON P.id_categoria = C.id_Categoria
WHERE P.id_bodega = idBodegaParam
ORDER BY P.producto$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_programa_por_semana`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_listar_programa_por_semana`(IN `semanaParam` VARCHAR(5))
    NO SQL
SELECT
A.id_semana,
A.id_equipo,
B.equipo_actividad AS equipo,
A.id_plan,
A.anio,
A.semana,
A.orden_trabajo,
A.actividad
FROM mantencion_programa_semana AS A INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo
WHERE A.semana = semanaParam
ORDER BY semana, id_equipo$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_programa_semanal`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_programa_semanal`()
    NO SQL
SELECT
A.id_semana,
A.id_equipo,
B.equipo_actividad AS equipo,
A.id_plan,
A.anio,
A.semana,
A.orden_trabajo,
A.actividad
FROM mantencion_programa_semana AS A INNER JOIN mantencion_equipo_actividad AS B
ON A.id_equipo = B.id_equipo 
ORDER BY semana, id_equipo$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_reponsable_equipo`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_reponsable_equipo`()
SELECT id_usuario, usuario, nombre_usuario FROM app_usuario WHERE perfil <> 'global' ORDER BY nombre_usuario$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_subareas`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_subareas`(IN `p_id_area` INT(3))
    NO SQL
SELECT
id_sub_area,
id_area,
subarea
FROM mantencion_sub_area
WHERE id_area = p_id_area
ORDER BY subarea$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_subareas2`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_listar_subareas2`()
    NO SQL
SELECT
A.id_area,
A.id_sub_area,
B.area,
A.subarea,
A.fecha_registro
FROM mantencion_sub_area AS A RIGHT JOIN mantencion_area AS B
ON A.id_area = B.id_area
ORDER BY B.area, A.subarea$$

DROP PROCEDURE IF EXISTS `sp_ot_listar_tecnico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ot_listar_tecnico`()
SELECT id_tecnico, tecnico, especialidad, fecha_registro, vigente
    FROM mantencion_tecnico
    ORDER BY tecnico$$

DROP PROCEDURE IF EXISTS `sp_ot_registros_pendientes`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_registros_pendientes`(IN `p_semana` VARCHAR(5))
    NO SQL
BEGIN
CREATE TEMPORARY TABLE registros(
item VARCHAR(20),
cantidad int(4)
);

INSERT INTO registros(item, cantidad)
SELECT 'equipo_actividad', COUNT(DISTINCT(B.id_equipo)) AS cantidad
FROM mantencion_equipo_actividad AS A LEFT JOIN mantencion_programa_semana AS B
ON A.id_equipo = B.id_equipo;

INSERT INTO registros(item, cantidad)
SELECT 'programa_semana', COUNT(1) AS cantidad 
FROM mantencion_programa_semana 
WHERE orden_trabajo = 0 AND semana = p_semana;

SELECT * FROM registros;
END$$

DROP PROCEDURE IF EXISTS `sp_ot_resumen`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_resumen`()
    NO SQL
BEGIN
    CREATE TEMPORARY TABLE resumen 
    (
        item VARCHAR(50),
        cantidad INT(8)
    );

    INSERT INTO resumen(item, cantidad)
    SELECT 'equipos' AS item, COUNT(1) as cantidad 
    FROM mantencion_equipo_actividad WHERE tipo = 'E';
    
    INSERT INTO resumen(item, cantidad)
    SELECT 'actividades' AS item, COUNT(1) as cantidad 
    FROM mantencion_equipo_actividad WHERE tipo = 'A';
    
    INSERT INTO resumen(item, cantidad)
    SELECT 'areas' AS item, COUNT(1) as cantidad 
    FROM mantencion_area;
    
    INSERT INTO resumen(item, cantidad)
    SELECT 'planes' AS item, COUNT(1) as cantidad 
    FROM mantencion_plan;

    SELECT item, cantidad FROM resumen;
END$$

DROP PROCEDURE IF EXISTS `sp_solicitudes_pendientes`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_solicitudes_pendientes`()
    NO SQL
    COMMENT 'Obtiene una lista con las solicitudes pendientes por usuario.'
SELECT solicitud_solicitante, 
       solicitud_fecha, 
       COUNT( 1 ) AS cantidad
FROM compra_solicitud
WHERE recepcion_estado = 0 
AND solicitud_fecha BETWEEN NOW() - INTERVAL 180 DAY AND NOW() 
GROUP BY solicitud_solicitante, solicitud_fecha
ORDER BY solicitud_solicitante, solicitud_fecha
LIMIT 30 , 300$$

DROP PROCEDURE IF EXISTS `sp_solicitudes_pendientes_por_solicitante`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_solicitudes_pendientes_por_solicitante`(IN `solicitante` TEXT CHARSET utf8, OUT `datos` VARCHAR(1000))
    DETERMINISTIC
BEGIN
SELECT solicitud_solicitanten into datos from compra_solicitud where solicitud_solicitante = solicitante;
END$$

DROP PROCEDURE IF EXISTS `sp_test`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_test`()
SELECT 1$$

DROP PROCEDURE IF EXISTS `sp_usr_actividad_ot`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_usr_actividad_ot`()
    NO SQL
SELECT
id,
fecha,
URL
FROM app_usuario_actividad
WHERE modulo = 'OT'$$

DROP PROCEDURE IF EXISTS `sp_usr_buscar_usuario`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_usr_buscar_usuario`(IN `usr_usuario` VARCHAR(20), IN `usr_clave` VARCHAR(4))
    NO SQL
SELECT 
	id_usuario,
	usuario,
	activo,
	nombre_usuario,
	cargo,
	correo,
	perfil,
    clave,
	modulo_oc,
	modulo_nc,
	modulo_ot
FROM santamar_desarrollo.app_usuario
WHERE usuario = usr_usuario 
AND clave = usr_clave$$

DROP PROCEDURE IF EXISTS `sp_usr_buscar_usuario_por_id`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_usr_buscar_usuario_por_id`(IN `p_id` INT(3))
    NO SQL
SELECT *
FROM app_usuario
WHERE id_usuario = p_id 
AND perfil <> 'global'$$

DROP PROCEDURE IF EXISTS `sp_usr_crear_actividad_ot`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_usr_crear_actividad_ot`(IN `fecha_hora` DATETIME, IN `registro` VARCHAR(500))
    NO SQL
INSERT INTO app_usuario_actividad(fecha, modulo, url) 
VALUES(fecha_hora, 'OT', registro)$$

DROP PROCEDURE IF EXISTS `sp_usr_listar_usuarios_compras`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_usr_listar_usuarios_compras`()
    NO SQL
SELECT	
id,
usuario,
nombre_usuario,
perfil,
cargo,
clave,
correo,
activo
FROM oc_usuario_solicitud
WHERE clave <> 0 AND activo <> 0
ORDER BY id$$

DROP PROCEDURE IF EXISTS `sp_usr_modificar_clave_usuario`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_usr_modificar_clave_usuario`(IN `p_clave1` VARCHAR(4), IN `p_clave2` VARCHAR(4), IN `p_id` INT(6))
    NO SQL
UPDATE app_usuario
SET clave = p_clave, clave2 = p_clave2
WHERE id_usuario = p_id$$

DROP PROCEDURE IF EXISTS `sp_validar_fecha_defecto`$$
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_validar_fecha_defecto`()
    NO SQL
    COMMENT 'Obtiene registros para fecha 0000-00-00'
SELECT *
FROM compra_solicitud
WHERE recepcion_estado =0
AND solicitud_fecha_registro = '0000-00-00'
ORDER BY solicitud_id, solicitud_solicitante DESC
LIMIT 30 , 300$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_usuario`
--

DROP TABLE IF EXISTS `app_usuario`;
CREATE TABLE IF NOT EXISTS `app_usuario` (
  `id_usuario` int(2) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave2` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` int(1) NOT NULL,
  `cookie` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modulo_oc` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modulo_nc` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modulo_ot` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Truncar tablas antes de insertar `app_usuario`
--

TRUNCATE TABLE `app_usuario`;
--
-- Volcado de datos para la tabla `app_usuario`
--

INSERT INTO `app_usuario` (`id_usuario`, `usuario`, `clave`, `clave2`, `activo`, `cookie`, `nombre_usuario`, `cargo`, `correo`, `perfil`, `modulo_oc`, `modulo_nc`, `modulo_ot`) VALUES
(1, 'cdiaz', '1006', '', 1, '', 'CRISTINA DIAZ', 'Sub Gerente de producci', 'cdiaz@asml.cl', 'usuario', '0000', '0000', '1000'),
(2, 'jlmoureb', '8277', '', 1, '', 'JOSE LUIS MOURE BARROS', 'Gerente General ', 'jlmoureb@asml.cl', 'usuario', '0000', '0000', '1000'),
(3, 'dromero', '2030', '', 1, '', 'DANIEL ROMERO VELASQUEZ', 'Jefe Calidad y Seguridad', 'dromero@asml.cl', 'usuario', '0000', '0000', '1000'),
(4, 'cmillaqueo', '1004', '', 1, '', 'CLAUDIA MILLAQUEO LAUTRAMAN', 'Auditor interno', 'cmillaqueo@asml.cl', 'usuario', '0000', '0000', '1000'),
(5, 'crodriguez', '1019', '', 1, '', 'CAROLINA RODRIGUEZ ROZAS', 'Contador General', 'crodriguez@asml.cl', 'usuario', '0000', '0000', '1000'),
(6, 'fvergara', '8279', '', 1, '', 'FERNANDO VERGARA', 'Jefe de Mantención', 'fvergara@asml.cl', 'administrador', '0000', '0000', '1111'),
(7, 'mantencion', '3190', '', 1, '', 'ASISTENTE MANTENCION', 'Asistente de Mantenci', 'mantencion@asml.cl', 'usuario', '0000', '0000', '1100'),
(8, 'jpsanudo', '1009', '', 1, '', 'JUAN PABLO SANUDO', 'Jefe de producci', 'jpsanudo@asml.cl', 'usuario', '0000', '0000', '1000'),
(9, 'abastias', '1013', '', 1, '', 'ANGELA BASTIAS', 'Asistente de producci', 'abastias@asml.cl', 'usuario', '0000', '0000', '1000'),
(10, 'jpino', '1010', '', 1, '', 'JUANA PINO VASQUEZ', 'Jefe de Clasificadora', 'jpino@asml.cl', 'usuario', '0000', '0000', '1000'),
(11, 'mbalart', '1015', '', 1, '', 'MAXIMILIANO BALART', 'Jefe Agr', 'mbalart@asml.cl', 'usuario', '0000', '0000', '1000'),
(13, 'mhernandez', '9978', '9978', 1, '', 'MAURICIO HERNANDEZ', 'Ingeniero de sistemas', 'mauriciohz2002@gmail.com', 'global', '1111', '1111', '1111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_categoria`
--

DROP TABLE IF EXISTS `inventario_categoria`;
CREATE TABLE IF NOT EXISTS `inventario_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Truncar tablas antes de insertar `inventario_categoria`
--

TRUNCATE TABLE `inventario_categoria`;
--
-- Volcado de datos para la tabla `inventario_categoria`
--

INSERT INTO `inventario_categoria` (`id_categoria`, `categoria`, `descripcion`, `fecha_registro`, `vigente`) VALUES
(1, 'HERRAMIENTA', 'Todas las herramientas como martillos, alicates, etc.', '2017-06-05 21:27:17', 1),
(4, 'REPUESTO', 'Repuestos utilizados por maquinaria de producción avícola.', '2017-06-05 21:27:17', 1),
(5, 'MAQUINARIA', 'Maquinaria agrícola.', '2017-06-05 21:27:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_producto`
--

DROP TABLE IF EXISTS `inventario_producto`;
CREATE TABLE IF NOT EXISTS `inventario_producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_bodega` int(2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_minimo` int(4) NOT NULL,
  `precio` int(8) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `vigente` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Truncar tablas antes de insertar `inventario_producto`
--

TRUNCATE TABLE `inventario_producto`;
--
-- Volcado de datos para la tabla `inventario_producto`
--

INSERT INTO `inventario_producto` (`id_producto`, `id_categoria`, `codigo`, `producto`, `id_bodega`, `cantidad`, `cantidad_minimo`, `precio`, `fecha_registro`, `vigente`) VALUES
(1, 1, 'RRR', 'TTT', 2, 45, 3, 5000, '2017-06-05 22:18:43', 1),
(2, 1, 'fdgvfdgfd', 'gfdgdfgaertew', 1, 3, 5, 4, '2017-06-05 22:25:32', 1),
(3, 1, 'Código', 'Producto', 1, 2, 4, 3, '2017-06-05 22:25:44', 1),
(4, 1, 'kkk', 'ppp', 1, 1, 3, 2, '2017-06-05 22:30:49', 1),
(5, 1, 'kkk', 'pppoooooooo', 1, 1, 3, 2, '2017-06-05 22:49:49', 1),
(6, 1, 'eee', 'rttetert', 1, 1, 3, 2, '2017-06-05 22:52:43', 1),
(7, 1, 'ALFA-1', 'TALADRO', 1, 9, 6, 7000, '2017-06-05 22:54:19', 1),
(8, 1, 'PLA', 'gsdfgsdfg', 1, 2, 3, 1, '2017-06-05 23:08:21', 1),
(9, 1, 'ppppppppppp', 'uuuuuuuuuuu', 1, 1, 5, 3, '2017-06-05 23:23:26', 1),
(10, 1, 'go', 'to', 1, 1, 1, 2, '2017-06-05 23:28:26', 1),
(11, 5, 'PLA_8', 'azul', 4, 2, 4, 3, '2017-06-06 10:55:28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_area`
--

DROP TABLE IF EXISTS `mantencion_area`;
CREATE TABLE IF NOT EXISTS `mantencion_area` (
  `id_area` int(3) NOT NULL AUTO_INCREMENT,
  `area` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Truncar tablas antes de insertar `mantencion_area`
--

TRUNCATE TABLE `mantencion_area`;
--
-- Volcado de datos para la tabla `mantencion_area`
--

INSERT INTO `mantencion_area` (`id_area`, `area`, `fecha_registro`) VALUES
(1, 'AVICOLA', '2017-05-04 14:55:01'),
(2, 'VARIOS', '2017-05-04 14:55:21'),
(3, 'OFICINA', '2017-05-04 14:55:31'),
(4, 'MOLINO', '2017-05-04 14:55:41'),
(14, 'SALA DE VENTAS', '2017-05-23 16:32:45'),
(16, 'FABRICA DE ALIMENTOS', '2017-05-23 16:33:20'),
(19, 'HERRAMIENTAS', '2017-05-30 21:55:16'),
(18, 'CONTINENTES', '2017-05-30 20:55:59'),
(17, 'TRANSPORTE', '2017-05-25 21:44:00'),
(20, 'PABELLONES', '2017-06-03 10:09:14'),
(21, 'ALFA', '2017-06-03 18:37:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_bodega`
--

DROP TABLE IF EXISTS `mantencion_bodega`;
CREATE TABLE IF NOT EXISTS `mantencion_bodega` (
  `id_bodega` int(2) NOT NULL AUTO_INCREMENT,
  `bodega` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `id_tecnico` int(3) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `vigente` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_bodega`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Truncar tablas antes de insertar `mantencion_bodega`
--

TRUNCATE TABLE `mantencion_bodega`;
--
-- Volcado de datos para la tabla `mantencion_bodega`
--

INSERT INTO `mantencion_bodega` (`id_bodega`, `bodega`, `descripcion`, `id_tecnico`, `fecha_registro`, `vigente`) VALUES
(1, 'BODEGA MAQUINA INNOVA 3', 'abc1', 1, '2017-06-05 20:32:07', 1),
(5, 'BODEGA MAQUINA INNOVA 5', 'abc1888888888888', 2, '2017-06-05 20:39:32', 0),
(6, 'BODEGA MAQUINA INNOVA 2', 'abc1', 1, '2017-06-05 20:29:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_detalle_repuestos`
--

DROP TABLE IF EXISTS `mantencion_detalle_repuestos`;
CREATE TABLE IF NOT EXISTS `mantencion_detalle_repuestos` (
  `id_repuesto` int(8) NOT NULL AUTO_INCREMENT,
  `id_orden` int(8) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `repuesto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id_repuesto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=40 ;

--
-- Truncar tablas antes de insertar `mantencion_detalle_repuestos`
--

TRUNCATE TABLE `mantencion_detalle_repuestos`;
--
-- Volcado de datos para la tabla `mantencion_detalle_repuestos`
--

INSERT INTO `mantencion_detalle_repuestos` (`id_repuesto`, `id_orden`, `cantidad`, `repuesto`, `fecha_registro`) VALUES
(1, 1, 1, 'R111', '2017-05-02 16:34:15'),
(2, 1, 2, 'R222', '2017-05-02 16:34:15'),
(3, 1, 3, 'R333', '2017-05-02 16:34:15'),
(4, 2, 4, 'REPUESTO_1', '2017-05-03 10:42:00'),
(5, 2, 8, 'REPUESTO_2', '2017-05-03 10:42:00'),
(6, 2, 112, 'REPUESTO_3', '2017-05-03 10:42:00'),
(7, 4, 1, 'R111', '2017-05-03 12:01:11'),
(8, 4, 2, 'R222', '2017-05-03 12:01:11'),
(9, 7, 1, 'dddd', '2017-05-03 12:07:24'),
(10, 8, 3, 'ff', '2017-05-03 12:09:03'),
(11, 8, 5, 'gg', '2017-05-03 12:09:03'),
(12, 8, 6, 'jj', '2017-05-03 12:09:03'),
(13, 9, 1, 'fs', '2017-05-03 12:09:42'),
(14, 12, 1, 'uu', '2017-05-03 12:34:32'),
(15, 13, 1, 'sd', '2017-05-03 14:20:52'),
(16, 14, 1, 'sd', '2017-05-03 14:21:09'),
(17, 15, 1, 'das', '2017-05-03 14:27:18'),
(18, 15, 1, 'sad', '2017-05-03 14:27:18'),
(19, 19, 1, 'sdas', '2017-05-03 14:31:21'),
(20, 23, 1, 'eweqw', '2017-05-04 11:44:04'),
(21, 24, 1, 'h', '2017-05-04 12:08:45'),
(22, 26, 1, 'ASDFAS', '2017-05-04 14:47:43'),
(23, 28, 100, 'REPUESTO_1', '2017-05-09 10:25:19'),
(24, 28, 200, 'REPUESTO_2', '2017-05-09 10:25:19'),
(25, 28, 300, 'REPUESTO_3', '2017-05-09 10:25:19'),
(26, 29, 700, 'REPUESTO_1', '2017-05-09 12:14:47'),
(27, 30, 1, 'Repuesto', '2017-05-09 12:20:39'),
(28, 31, 1, 'Repuesto', '2017-05-09 12:23:51'),
(29, 32, 1, 'R', '2017-05-09 12:31:34'),
(30, 33, 1, 'r', '2017-05-09 12:34:06'),
(31, 34, 200, 'Repuesto', '2017-05-09 12:37:06'),
(32, 35, 1, 'r', '2017-05-09 12:38:27'),
(33, 36, 1, 'o', '2017-05-09 12:39:11'),
(34, 37, 1, 'sa', '2017-05-09 12:40:04'),
(35, 38, 2, 'dsad', '2017-05-09 12:44:50'),
(36, 39, 1, 'g', '2017-05-09 12:46:05'),
(37, 40, 2, 'cambio de filtros y cambio orrines motores', '2017-05-09 15:20:14'),
(38, 41, 2, 'Correas y rodamientos', '2017-05-12 14:45:21'),
(39, 42, 2, '2 cooreas y peñones', '2017-05-12 14:51:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_equipo_actividad`
--

DROP TABLE IF EXISTS `mantencion_equipo_actividad`;
CREATE TABLE IF NOT EXISTS `mantencion_equipo_actividad` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `id_plan` int(3) NOT NULL,
  `id_area` int(3) NOT NULL,
  `id_sub_area` int(3) NOT NULL,
  `tipo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `equipo_actividad` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `id_responzable` int(3) NOT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=38 ;

--
-- Truncar tablas antes de insertar `mantencion_equipo_actividad`
--

TRUNCATE TABLE `mantencion_equipo_actividad`;
--
-- Volcado de datos para la tabla `mantencion_equipo_actividad`
--

INSERT INTO `mantencion_equipo_actividad` (`id_equipo`, `id_plan`, `id_area`, `id_sub_area`, `tipo`, `equipo_actividad`, `id_responzable`, `observacion`, `fecha_registro`) VALUES
(29, 1, 8, 0, 'E', 'SERVIDOR_A', 7, 'NUEVO SERVIDOR ...', '2017-05-18 15:30:19'),
(3, 10, 18, 0, 'E', 'PABELLÓN 1 CRIANZA P1C', 7, 'DATOS PARA EL EQUIPO PABELLÓN 1 CRIANZA P1C', '2017-04-25 17:41:58'),
(21, 14, 26, 0, 'E', 'EQUIPO_VIERNES', 7, 'EJEMPLO DE EQUIPO VIERNES 28 DE ABRIL', '2017-04-28 12:10:48'),
(27, 17, 6, 0, 'E', 'Alfa-1.1', 7, 's/i', '2017-05-17 21:29:31'),
(28, 17, 6, 0, 'E', 'REVISAR MAQUINA ALFA-A', 0, 'PRUEBA', '2017-05-17 23:54:19'),
(6, 10, 5, 0, 'E', 'PABELLON 2 AUTOMATICO', 7, 'PABELLÓN 2 AUTOMÁTICO CÓDIGO P2A', '2017-04-25 17:01:16'),
(7, 16, 1, 0, 'E', 'PABELLON 3 AUTOMATICO', 7, 'PABELLÓN 3 AUTOMÁTICO CÓDIGO P3A', '2017-05-12 11:04:40'),
(8, 10, 5, 0, 'E', 'PABELLON 4 AUTOMATICO', 7, 'PABELLÓN 4 AUTOMÁTICO CÓDIGO P4A', '2017-04-25 17:02:28'),
(9, 10, 5, 0, 'E', 'PABELLON 5 AUTOMATICO', 7, 'PABELLÓN 5 AUTOMÁTICO CÓDIGO P5A', '2017-04-25 17:03:02'),
(10, 10, 5, 0, 'E', 'PABELLON 6 AUTOMATICO', 7, 'PABELLÓN 6 AUTOMÁTICO CÓDIGO P6A', '2017-04-25 17:03:29'),
(11, 10, 5, 0, 'E', 'PABELLON 7 AUTOMATICO', 7, 'PABELLÓN 7 AUTOMÁTICO CÓDIGO P7A', '2017-04-25 17:04:14'),
(12, 10, 5, 0, 'E', 'PABELLON 8 AUTOMATICO', 7, 'PABELLÓN 8 AUTOMÁTICO CÓDIGO P8A', '2017-04-25 17:04:43'),
(13, 10, 5, 0, 'E', 'PABELLON 9 AUTOMATICO', 7, 'PABELLÓN 9 AUTOMÁTICO CÓDIGO P9A', '2017-04-25 17:05:07'),
(14, 10, 5, 0, 'A', 'PABELLÓN 10 CRIANZA P10C', 7, 'PABELLÓN 10 AUTOMÁTICO CÓDIGO P10A', '2017-04-25 17:05:31'),
(15, 10, 5, 0, 'E', 'PABELLÓN 11 CRIANZA P11C', 7, 'PABELLÓN 11 AUTOMÁTICO CÓDIGO P11A', '2017-04-25 17:06:11'),
(16, 10, 5, 0, 'E', 'PABELLÓN 1 MANUAL', 7, 'PABELLÓN 1 MANUAL P1M', '2017-04-25 17:07:38'),
(17, 10, 5, 0, 'E', 'PABELLÓN 2 MANUAL P2M', 7, 'PABELLÓN 2 MANUAL P2M', '2017-04-25 17:08:20'),
(18, 10, 5, 0, 'E', 'PABELLÓN 3 MANUAL P3M', 7, 'PABELLÓN 3 MANUAL P3M', '2017-04-25 17:08:45'),
(19, 10, 5, 0, 'A', 'CLASIFICADORA', 7, 'CLASIFICADORA REVISIÓN TODAS LAS SEMANAS', '2017-04-25 17:09:25'),
(20, 10, 5, 0, 'A', 'COMPOSTADORA', 7, 'COMPOSTADORA REVISIÓN TODAS LAS SEMANAS', '2017-04-25 17:09:53'),
(22, 1, 4, 0, 'A', 'LAVADERO DE VEHICULOS', 7, 'SIN OBSERVACIONES.', '2017-04-28 15:07:26'),
(23, 15, 31, 0, 'E', 'REVISAR FILTRO MAQUINA 1C', 7, 'EJEMPLO INGRESO DE DATOS PARA LA ACTIVIDAD REVISIÓN FILTRO MAQUINA_A', '2017-05-02 18:11:58'),
(24, 1, 1, 0, 'E', 'LLAVES DE AGUA BANOS HOMBRES', 7, 'SIN OBSERVACIONES.', '2017-05-04 14:56:49'),
(26, 17, 7, 0, 'E', 'Elevador de Fabrica de Alimentos', 7, 'Elevador 1 de Fabrica de alimentos', '2017-05-12 14:41:55'),
(30, 17, 6, 9, 'A', 'Equipo1', 9, 'Observación...........1111111', '2017-05-23 11:06:38'),
(31, 17, 1, 8, 'E', '88888888', 7, '9999999', '2017-05-23 11:12:30'),
(32, 1, 14, 22, 'A', 'REVISAR MAQUINA DE VENTAS', 9, 'PRUEBA UNO ...', '2017-05-23 16:48:47'),
(33, 19, 17, 23, 'E', 'CAMIONETA PEUGEOT PARNERT - DIESEL 2017', 1, 'Camioneta patente WWPP-99', '2017-05-25 23:54:36'),
(34, 19, 17, 23, '0', 'CAMIONETA MITSUBISHI L200', 8, 'CAMIONETA PARA USO AGRICOLA', '2017-05-29 20:38:44'),
(35, 19, 17, 23, '0', 'CAMIONETA MITSUBISHI L200 KKPP-99', 6, 'PRUEBA', '2017-05-29 20:40:08'),
(36, 20, 17, 23, '0', 'CAMIONETA MITSUBISHI L200 KKPP-55', 3, 'PRUEBA', '2017-05-29 20:40:58'),
(37, 10, 20, 29, '0', 'CINTA DE HUEVOS', 6, 'TENZAR, LUBRICAR Y REVISAR PARA CAMBIAR.', '2017-06-03 10:19:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_orden_trabajo`
--

DROP TABLE IF EXISTS `mantencion_orden_trabajo`;
CREATE TABLE IF NOT EXISTS `mantencion_orden_trabajo` (
  `id_orden` int(7) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(3) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_termino` datetime NOT NULL,
  `tipo_mantencion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `tecnico` int(3) NOT NULL,
  `supervisor` int(3) NOT NULL,
  `usuario_registro` int(3) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `estado_aprobacion` int(1) NOT NULL,
  `semana` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `ciclo` int(1) NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=52 ;

--
-- Truncar tablas antes de insertar `mantencion_orden_trabajo`
--

TRUNCATE TABLE `mantencion_orden_trabajo`;
--
-- Volcado de datos para la tabla `mantencion_orden_trabajo`
--

INSERT INTO `mantencion_orden_trabajo` (`id_orden`, `id_equipo`, `fecha_inicio`, `fecha_termino`, `tipo_mantencion`, `descripcion`, `observacion`, `tecnico`, `supervisor`, `usuario_registro`, `fecha_registro`, `estado_aprobacion`, `semana`, `ciclo`) VALUES
(25, 22, '2017-05-01 00:00:00', '2017-05-04 00:00:00', 'PREVENTIVA', 'dd', 'oo', 7, 6, 1, '2017-05-04 11:40:41', 0, 'SEM17', 0),
(2, 4, '2017-05-01 00:00:00', '2017-05-08 00:00:00', 'PREVENTIVA', 'SE HACE MANTENCION ###', 'ALGUNAS OBSERVACIONES ###', 7, 6, 1, '2017-05-03 10:42:00', 1, 'SEM18', 0),
(3, 4, '2017-05-01 00:00:00', '2017-05-08 00:00:00', 'PREVENTIVA', 'SE HACE MANTENCION ###', 'ALGUNAS OBSERVACIONES ###', 7, 6, 1, '2017-05-03 11:00:56', 1, 'SEM19', 0),
(36, 22, '2017-05-09 00:00:00', '2017-05-09 00:00:00', 'PREVENTIVA', 'd', 'y', 7, 6, 1, '2017-05-09 12:39:11', 1, 'SEM19', 0),
(39, 24, '2017-05-09 00:00:00', '2017-05-09 00:00:00', 'PREVENTIVA', 'gf', 'hgfh', 7, 6, 1, '2017-05-09 12:46:05', 0, 'SEM19', 0),
(41, 26, '2017-05-12 00:00:00', '2017-05-31 00:00:00', 'PREVENTIVA', 'Arreglo de correas de elevador para maiz', 'Arreglos en altura, usar EPP y arnés.', 7, 6, 1, '2017-05-12 14:45:21', 0, 'SEM19', 0),
(42, 26, '2017-05-12 00:00:00', '2017-05-31 00:00:00', 'PREVENTIVA', 'Cambio de correas y mantenciòn de elevador F.A', 'Trabajo en altura, usar EPP y arnes', 7, 6, 1, '2017-05-12 14:51:22', 0, 'SEM18', 0),
(43, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'dcdsfsadfs', 'fsdfdgffdgfdgfd', 1, 2, 1, '2017-05-30 22:26:20', 0, '00000', 1),
(44, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'DESCRIPCION DE EJEMPLO ....', 'OBSERVACIONES DE EJEMPLO ...', 1, 2, 1, '2017-05-30 22:40:40', 0, '00000', 1),
(45, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'DESCRIPCION DE EJEMPLO ....', 'OBSERVACIONES DE EJEMPLO ...', 1, 2, 1, '2017-05-30 22:42:57', 0, '00000', 1),
(46, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'DESCRIPCION DE EJEMPLO ....', 'OBSERVACIONES DE EJEMPLO ...', 1, 2, 1, '2017-05-30 22:43:38', 0, '00000', 1),
(47, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'DESCRIPCION DE EJEMPLO ....', 'OBSERVACIONES DE EJEMPLO ...', 1, 2, 1, '2017-05-30 22:44:23', 0, '00000', 1),
(48, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'JIHLKJVCGFJKHLJÑL', 'KOÑJIHLGKFJHXCNVMBJ', 1, 2, 1, '2017-05-30 23:04:05', 0, '00000', 1),
(49, 36, '2017-05-31 00:00:00', '2017-05-30 00:00:00', 'CORRECTIVA', 'DESCRIPCION DE EJEMPLO ....', 'OBSERVACIONES DE EJEMPLO ...', 1, 2, 1, '2017-05-30 23:06:09', 0, '00000', 1),
(50, 35, '2017-06-03 00:00:00', '2017-06-03 00:00:00', 'CORRECTIVA', 'dsadasd', 'asdasd', 1, 2, 1, '2017-06-03 09:01:40', 0, '00000', 1),
(51, 37, '2017-06-03 00:00:00', '2017-06-03 00:00:00', 'CORRECTIVA', 'cambio de cinta por corte.', 'se encuentra cinta enredada.', 1, 2, 1, '2017-06-03 10:29:23', 0, '00000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_plan`
--

DROP TABLE IF EXISTS `mantencion_plan`;
CREATE TABLE IF NOT EXISTS `mantencion_plan` (
  `id_plan` int(3) NOT NULL AUTO_INCREMENT,
  `codigo_plan` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_plan` date NOT NULL,
  `version` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `nombre_plan` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `id_usuario_registro` int(3) NOT NULL,
  `observacion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

--
-- Truncar tablas antes de insertar `mantencion_plan`
--

TRUNCATE TABLE `mantencion_plan`;
--
-- Volcado de datos para la tabla `mantencion_plan`
--

INSERT INTO `mantencion_plan` (`id_plan`, `codigo_plan`, `fecha_plan`, `version`, `anio`, `nombre_plan`, `fecha_registro`, `id_usuario_registro`, `observacion`) VALUES
(1, 'PLA-G-2.1', '2017-01-18', 6, 2017, 'Plan de Apoyo Mantenimiento preventivo servicios generales', '2017-04-19 22:04:02', 1, 'Prueba para registrar un plan de mantención.'),
(9, 'PLA-G-2.5', '2017-01-18', 2, 2017, 'Plan de apoyo Mantenimiento preventivo de equipos Fábrica de alimentos', '2017-04-21 09:27:59', 1, 'Es un nuevo plan!!'),
(10, 'PLA-G-2.2', '2017-01-18', 8, 2017, 'Plan de apoyo Programa de mantenimiento preventivo equipos de producción', '2017-04-22 23:17:52', 1, 'Plan de apoyo'),
(16, 'PLA_2017', '2017-05-09', 1, 2017, 'Plan de mantencion casetas de Riego', '2017-05-09 15:08:50', 1, 'Riego campo...santa marta'),
(17, 'PLA-F.A-2017', '2017-05-12', 1, 2017, 'Plan mantenciòn Fabrica de alimentos', '2017-05-19 21:31:51', 1, 'equipo elevador 1'),
(19, 'PLA-EJEMPLO', '2017-05-25', 1, 2017, 'PLAN DE MANTENCION VEHÍCULOS LIVIANOS', '2017-05-25 23:03:42', 1, 'ESTE PLAN APLICA PARA CAMIONETAS Y AUTOS.'),
(20, 'PLA-G-0.0', '2017-05-25', 1, 2017, 'PLAN DE PRUEBAS', '2017-05-25 23:48:35', 1, 'Plan para realizar pruebas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_programa_semana`
--

DROP TABLE IF EXISTS `mantencion_programa_semana`;
CREATE TABLE IF NOT EXISTS `mantencion_programa_semana` (
  `id_semana` int(2) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(3) NOT NULL,
  `id_plan` int(3) NOT NULL,
  `anio` int(4) NOT NULL,
  `semana` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `orden_trabajo` int(8) NOT NULL,
  `actividad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_ultima_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_semana`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Truncar tablas antes de insertar `mantencion_programa_semana`
--

TRUNCATE TABLE `mantencion_programa_semana`;
--
-- Volcado de datos para la tabla `mantencion_programa_semana`
--

INSERT INTO `mantencion_programa_semana` (`id_semana`, `id_equipo`, `id_plan`, `anio`, `semana`, `orden_trabajo`, `actividad`, `fecha_ultima_modificacion`) VALUES
(1, 7, 16, 2017, 'SEM04', 0, 'ACTIVIDAD DE PRUEBA 1 ...', '2017-05-27 23:42:09'),
(2, 7, 16, 2017, 'SEM08', 0, 'ACTIVIDAD DE PRUEBA 1 ...', '2017-05-27 23:42:09'),
(3, 7, 16, 2017, 'SEM13', 0, 'ACTIVIDAD DE PRUEBA 1 ...', '2017-05-27 23:42:09'),
(4, 7, 16, 2017, 'SEM17', 0, 'ACTIVIDAD DE PRUEBA 1 ...', '2017-05-27 23:42:09'),
(5, 7, 16, 2017, 'SEM21', 0, 'ACTIVIDAD DE PRUEBA 1 ...', '2017-05-27 23:42:09'),
(6, 7, 16, 2017, 'SEM26', 0, 'ACTIVIDAD DE PRUEBA 1 ...', '2017-05-27 23:42:09'),
(7, 35, 19, 2017, 'SEM01', 0, 'Revisión correa auxiliar de alternador.', '2017-05-29 21:00:20'),
(8, 35, 19, 2017, 'SEM05', 0, 'Revisión correa auxiliar de alternador.', '2017-05-29 21:00:20'),
(9, 35, 19, 2017, 'SEM22', 0, 'Revisión correa auxiliar de alternador.', '2017-05-29 21:00:20'),
(10, 7, 19, 2017, 'SEM22', 0, 'Revisión correa auxiliar de alternador.', '2017-05-29 21:00:20'),
(11, 35, 19, 2017, 'SEM22', 0, 'Revisión correa auxiliar de alternador.', '2017-05-29 21:00:20'),
(12, 35, 19, 2017, 'SEM22', 0, 'Revisión correa auxiliar de alternador.', '2017-05-29 21:00:20'),
(13, 37, 10, 2017, 'SEM31', 0, 'Cambio de polines de cinta', '2017-06-03 10:26:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_responsable`
--

DROP TABLE IF EXISTS `mantencion_responsable`;
CREATE TABLE IF NOT EXISTS `mantencion_responsable` (
  `id_responzable` int(3) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(3) NOT NULL,
  `responzable` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_responzable`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Truncar tablas antes de insertar `mantencion_responsable`
--

TRUNCATE TABLE `mantencion_responsable`;
--
-- Volcado de datos para la tabla `mantencion_responsable`
--

INSERT INTO `mantencion_responsable` (`id_responzable`, `id_usuario`, `responzable`) VALUES
(1, 1, 'JUAN LOPEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_sub_area`
--

DROP TABLE IF EXISTS `mantencion_sub_area`;
CREATE TABLE IF NOT EXISTS `mantencion_sub_area` (
  `id_sub_area` int(3) NOT NULL AUTO_INCREMENT,
  `id_area` int(3) NOT NULL,
  `subarea` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`id_sub_area`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=31 ;

--
-- Truncar tablas antes de insertar `mantencion_sub_area`
--

TRUNCATE TABLE `mantencion_sub_area`;
--
-- Volcado de datos para la tabla `mantencion_sub_area`
--

INSERT INTO `mantencion_sub_area` (`id_sub_area`, `id_area`, `subarea`, `fecha_registro`) VALUES
(1, 1, 'ppp', '2017-05-21 22:08:34'),
(2, 6, 'hhho', '2017-05-21 22:09:39'),
(3, 9, 'hoja', '2017-05-21 22:12:46'),
(4, 6, 'jjjj', '2017-05-21 22:13:10'),
(5, 1, 'ffff', '2017-05-21 22:14:00'),
(6, 6, 'WWW', '2017-05-21 22:16:14'),
(7, 7, 'sdsad', '2017-05-21 22:17:47'),
(8, 1, 'dzasDC', '2017-05-21 22:18:52'),
(9, 6, 'ddd', '2017-05-22 21:17:31'),
(10, 6, 'www1', '2017-05-22 22:47:08'),
(11, 6, 'PABELLON A-1', '2017-05-23 11:17:43'),
(12, 1, 'PRUEBA-3', '2017-05-23 15:32:02'),
(13, 9, 'SOMALIA', '2017-05-23 16:01:09'),
(14, 9, 'LIBIA', '2017-05-23 16:01:38'),
(15, 0, 'ALEMANIA', '2017-05-23 16:06:53'),
(16, 0, 'FRANCIA', '2017-05-23 16:07:19'),
(17, 10, 'HOLANDA-PAISES BAJOS', '2017-05-23 16:14:42'),
(18, 0, 'ITALIA', '2017-05-23 16:15:21'),
(19, 10, 'ITALIA-333', '2017-05-23 16:16:54'),
(20, 14, 'VENTAS_1', '2017-05-23 16:47:40'),
(21, 14, 'VENTAS_2', '2017-05-23 16:47:54'),
(22, 14, 'VENTAS_3', '2017-05-23 16:48:02'),
(23, 17, 'TRANSPORTE LIVIANO', '2017-05-25 21:45:26'),
(24, 17, 'TRANSPORTE PESADO', '2017-05-25 21:45:43'),
(25, 17, 'TRANSPORTE AGRÍCOLA TRACTORES MF', '2017-05-25 22:13:48'),
(26, 17, 'TEST PARA ELIMINAR', '2017-05-25 22:15:04'),
(27, 19, 'HERRAMIENTAS', '2017-05-30 21:55:16'),
(28, 20, 'PABELLONES', '2017-06-03 10:09:14'),
(29, 20, 'PABELLON 1', '2017-06-03 10:09:35'),
(30, 21, 'ALFA', '2017-06-03 18:37:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion_tecnico`
--

DROP TABLE IF EXISTS `mantencion_tecnico`;
CREATE TABLE IF NOT EXISTS `mantencion_tecnico` (
  `id_tecnico` int(3) NOT NULL AUTO_INCREMENT,
  `tecnico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `vigente` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_tecnico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Truncar tablas antes de insertar `mantencion_tecnico`
--

TRUNCATE TABLE `mantencion_tecnico`;
--
-- Volcado de datos para la tabla `mantencion_tecnico`
--

INSERT INTO `mantencion_tecnico` (`id_tecnico`, `tecnico`, `especialidad`, `fecha_registro`, `vigente`) VALUES
(1, 'RAUL RIOS', 'MECANICO', '2017-06-05 12:02:42', 1),
(2, 'RAFAEL SEGOVIA', 'ELECTRICO', '2017-06-05 12:02:42', 1),
(3, 'RUBEN ROJAS', 'MECANICO', '2017-06-05 12:02:42', 1);

