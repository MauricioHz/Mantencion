DROP TABLE IF EXISTS `mantencion_plan`;
CREATE TABLE IF NOT EXISTS `mantencion_plan` (
  `id_plan` int(3) NOT NULL AUTO_INCREMENT,
  `codigo_plan` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_plan` date NOT NULL,
  `version` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `nombre_plan` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `id_usuario_registro` int(3) NOT NULL,
  `observacion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `mantencion_plan`
--

INSERT INTO `mantencion_plan` (`id_plan`, `codigo_plan`, `fecha_plan`, `version`, `anio`, `nombre_plan`, `fecha_registro`, `id_usuario_registro`, `observacion`) VALUES
(1, 'PLA-001', '2017-05-25', 1, 2017, 'PLAN DE MANTENIMIENTO TRANSPORTE DISTRIBUCION', '2017-05-25 16:18:02', 1, 'SE APLICA A CAMIONETAS Y CAMIONES DE DISTRIBUCION');
