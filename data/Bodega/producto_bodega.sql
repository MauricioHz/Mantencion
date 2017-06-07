-- Estructura de tabla para la tabla inventario_producto
DROP TABLE IF EXISTS inventario_producto;
CREATE TABLE IF NOT EXISTS inventario_producto (
  id_producto int(11) NOT NULL AUTO_INCREMENT,
  id_categoria int(11) NOT NULL,
  codigo varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  producto varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  id_bodega int(2) NOT NULL,
  cantidad int(11) NOT NULL,
  cantidad_minimo int(4) NOT NULL,
  precio int(8) NOT NULL,
  fecha_registro datetime NOT NULL,
  vigente tinyint(1) NOT NULL,
  PRIMARY KEY (id_producto)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;


DROP PROCEDURE IF EXISTS sp_ot_crear_producto; 
DELIMITER ;;
CREATE PROCEDURE sp_ot_crear_producto(
  IN idCategoriaParam int(11),
  IN codigoParam varchar(100),
  IN productoParam varchar(100),
  IN idBodegaParam int(2),
  IN cantidadParam int(11),
  IN cantidadMinimoParam int(4),
  IN precioParam int(8)
)
BEGIN
    DECLARE cuenta INT(2);
    SET cuenta = (SELECT COUNT(1) FROM inventario_producto WHERE producto = productoParam);
    IF cuenta > 0 THEN
        SELECT 'REGISTRO_EXISTE';
    ELSE
        INSERT INTO inventario_producto(id_categoria, codigo, producto, id_bodega, cantidad, cantidad_minimo, precio, fecha_registro, vigente) 
        VALUES(idCategoriaParam, codigoParam, productoParam, idBodegaParam, cantidadParam, cantidadMinimoParam, precioParam, NOW(), TRUE);
        SET @id = ROW_COUNT();
        IF @id > 0 THEN
            SELECT 'INSERTAR_OK';
        ELSE
            SELECT 'INSERTAR_ERROR';
        END IF;
    END IF;
END

