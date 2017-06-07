-- Estructura de tabla para la tabla inventario_categoria
DROP TABLE IF EXISTS inventario_categoria;
CREATE TABLE IF NOT EXISTS inventario_categoria (
  id_categoria int(11) NOT NULL AUTO_INCREMENT,
  categoria varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  descripcion varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  fecha_registro datetime NOT NULL,
  vigente boolean,
  PRIMARY KEY (id_categoria)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

insert into inventario_categoria(categoria, descripcion, fecha_registro, vigente) values
('HERRAMIENTA', 'Todas las herramientas como martillos, alicates, etc.', NOW(), TRUE),
('REPUESTO', 'Repuestos utilizados por maquinaria de producción avícola.', NOW(), TRUE),
('MAQUINARIA', 'Maquinaria agrícola.', NOW(), TRUE);