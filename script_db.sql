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
