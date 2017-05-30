CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_equipo`(IN `id_area` INT(3), IN `id_sub_area` INT(3), IN `id_plan` INT(3), IN `tipo` CHAR(1), IN `equipo_actividad` VARCHAR(80), IN `id_responzable` INT(3), IN `observacion` VARCHAR(200))
    NO SQL
BEGIN
SET @cuenta = (SELECT COUNT(1) FROM mantencion_equipo_actividad WHERE  equipo_actividad = equipo_actividad);
IF @cuenta = 0 THEN
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
  SELECT 'INSERTA_OK'+@id;
ELSE
  SELECT 'EXISTE_OK' AS mensaje;
END IF;
END

-----------------------------------------------------------

DELIMITER ;;
CREATE DEFINER=`santamar`@`localhost` PROCEDURE `sp_ot_crear_equipo`(IN `id_area` INT(3), IN `id_sub_area` INT(3), IN `id_plan` INT(3), IN `tipo` CHAR(1), IN `equipoParam` VARCHAR(80), IN `id_responzable` INT(3), IN `observacion` VARCHAR(200))
    NO SQL
BEGIN
SET @cuenta = (SELECT COUNT(1) FROM mantencion_equipo_actividad WHERE  equipo_actividad = equipoParam); 
IF (@cuenta = 0) THEN
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
    equipoParam, 
    id_responzable, 
    observacion, 
    NOW()
   );
  SET @id = LAST_INSERT_ID();
  SELECT 'INSERTA_OK'  AS mensaje;
ELSE
  SELECT 'EXISTE_OK' AS mensaje;
END IF;
END ;;
