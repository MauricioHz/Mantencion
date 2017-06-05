insert into inventario_producto(
id_categoria,
codigo_producto,
producto,
id_bodega,
cantidad,
fecha_registro) values
(1, 'ABC0001', 'TALADRO', 1, 205, NOW()),
(1, 'ABC0002', 'MARTILLO', 1, 67, NOW()),
(1, 'ABC0003', 'ALICATE', 1, 78, NOW());

DROP PROCEDURE IF EXISTS sp_ot_listar_bodega;
CREATE PROCEDURE sp_ot_listar_bodega()
    SELECT id_bodega, bodega, fecha_registr FROM mantencion_bodega ORDER BY bodega;
