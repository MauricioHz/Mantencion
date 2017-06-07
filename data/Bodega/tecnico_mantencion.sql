
--
-- Estructura de tabla para la tabla mantencion_tecnico
--
DROP TABLE IF EXISTS mantencion_tecnico;
CREATE TABLE IF NOT EXISTS mantencion_tecnico (
  id_tecnico int(3) NOT NULL AUTO_INCREMENT,
  tecnico varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  especialidad varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  fecha_registro datetime DEFAULT NULL,
  vigente boolean DEFAULT NULL,
  PRIMARY KEY (id_tecnico)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

INSERT INTO mantencion_tecnico(tecnico, especialidad, fecha_registro, vigente) 
VALUES('RAUL RIOS', 'MECANICO', NOW(), TRUE),
('RAFAEL SEGOVIA', 'ELECTRICO', NOW(), TRUE),
('RUBEN ROJAS', 'MECANICO', NOW(), TRUE);


-- LISTAR TECNICOS
DROP PROCEDURE IF EXISTS sp_ot_listar_tecnico;
CREATE PROCEDURE sp_ot_listar_tecnico()
    SELECT id_tecnico, tecnico, especialidad, fecha_registro, vigente
    FROM mantencion_tecnico
    ORDER BY tecnico