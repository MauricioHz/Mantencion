/* Tablas modulo mantencion */

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

