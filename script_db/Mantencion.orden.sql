--
-- Estructura de tabla para la tabla `mantencion_orden_trabajo`
--

DROP TABLE IF EXISTS `mantencion_orden_trabajo`;
CREATE TABLE IF NOT EXISTS `mantencion_orden_trabajo` (
  `id_orden` int(7) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(3) NOT NULL,
  `id_area` int(3) NOT NULL,
  `id_subarea` int(3) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=43 ;
