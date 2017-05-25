/* Tablas modulo mantencion */

-- crear programa de mantencion

DROP PROCEDURE IF EXISTS `sp_ot_crear_programa_semana` ;

CREATE PROCEDURE `sp_ot_crear_programa_semana`(
  IN `var_id_equipo` INT(3), 
  IN `var_id_plan` INT(3), 
  IN `var_semana` VARCHAR(5),
  IN `actividadParam` VARCHAR(200)
)
INSERT INTO mantencion_programa_semana
(
    id_equipo, 
    id_plan, 
    anio, 
    semana, 
    orden_trabajo,
    actividad,
    fecha_registro
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
);

-- seleccionar registros

DROP PROCEDURE IF EXISTS `sp_ot_buscar_equipo_semana`
DELIMITER ;;
CREATE PROCEDURE `sp_ot_buscar_equipo_semana`(IN `var_id_equipo` INT(3))
SELECT id_semana, id_equipo, id_plan, anio, semana, orden_trabajo, actividad, fecha_registro
FROM mantencion_programa_semana
WHERE id_equipo = var_id_equipo
ORDER BY id_semana ;;
DELIMITER ;



--
-- Estructura de la tabla `mantencion_programa_semana`
--
DROP TABLE IF EXISTS mantencion_programa_semana;
CREATE TABLE mantencion_programa_semana (
  id_semana int(2) NOT NULL AUTO_INCREMENT,
  id_equipo int(3) NOT NULL,
  id_plan int(3) NOT NULL,
  anio int(4) NOT NULL,
  semana varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  orden_trabajo int(8) NOT NULL,
  actividad varchar(200),
  fecha_ultima_modificacion DATETIME,
  PRIMARY KEY (id_semana)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Eliminar tabla calendario
--
DROP TABLE mantencion_calendario;

--
-- Eliminar tabla registro mantencion
--
DROP TABLE mantencion_orden_registro;

-- Esquema INVENTARIO

-- Tabla para alamacenar los nombres de distintas bodegas utilizadas en la empresa
CREATE TABLE inventario_bodega
(
  id_bodega int(2),
  bodega varchar(100),
  descripcion varchar(200),
  fecha_registro DATETIME,
  PRIMARY KEY (id_bodega)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT= 1 ;

CREATE PROCEDURE spCrearBodega(in bodegaParam varchar(100), in descripcionParam varchar(200))
BEGIN  
  INSERT INTO inventario_bodega(bodega, descripcion, fecha_registro)
  VALUES(bodegaParam, descripcionParam, now());
  SET @count = ROW_COUNT();
END

