CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_orden_trabajo`(IN `var_id_equipo` INT(3), IN `var_id_area` INT(3), IN `var_sector` VARCHAR(30), IN `var_elemento` VARCHAR(30), IN `var_pabellon` VARCHAR(30), IN `var_atril` VARCHAR(30), IN `var_fecha_inicio` VARCHAR(50), IN `var_fecha_termino` VARCHAR(50), IN `var_tipo_mantencion` VARCHAR(10), IN `var_descripcion` VARCHAR(400), IN `var_observacion` VARCHAR(400), IN `var_tecnico` VARCHAR(50), IN `var_supervisor` VARCHAR(50), IN `var_semana` VARCHAR(5))
BEGIN
DECLARE cuenta INT(8);
SET cuenta = (SELECT COUNT(1) FROM mantencion_orden_trabajo WHERE id_equipo = var_id_equipo AND semana = var_semana);
    IF cuenta > 0 THEN
        SELECT 'SI_EXISTE' AS mensaje;
    ELSE
INSERT INTO mantencion_orden_trabajo(
    id_equipo,
    id_area,
    sector,
    elemento,
    pabellon,
    atril,
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
    semana
	)
    VALUES(
    var_id_equipo,
    var_id_area,
    var_sector,
    var_elemento,
    var_pabellon,
    var_atril,
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
        var_semana
    );
    
      SET @id = LAST_INSERT_ID();
      IF @id > 0 THEN
        UPDATE mantencion_programa_semana SET orden_trabajo = @id
        WHERE id_equipo = var_id_equipo
        AND semana = var_semana;
      END IF;
      SELECT CONCAT('OK_INGRESADO', ';', @id) AS mensaje;
  END IF;
END