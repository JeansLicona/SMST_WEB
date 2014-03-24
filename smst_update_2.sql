-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2014 a las 03:53:25
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `smst`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_errores`
--

CREATE TABLE IF NOT EXISTS `catalogo_errores` (
  `id_tipo_error` int(8) NOT NULL AUTO_INCREMENT,
  `nombre_error` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_general` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_error`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `costo_solicitud` float NOT NULL,
  `frecuencia_balance_taxista` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `id_equipo` int(8) NOT NULL AUTO_INCREMENT,
  `modelo_equipo` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `marca_equipo` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_compra` date NOT NULL,
  `activo` smallint(1) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `modelo_equipo`, `marca_equipo`, `fecha_compra`, `activo`) VALUES
(1, 'asd', 'asda', '2014-01-26', 1),
(2, '1231', 'asda', '2014-02-22', 1),
(3, 'Z2340', 'Huaeii', '2014-04-26', 1),
(4, 'asd', 'asda', '2014-03-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error`
--

CREATE TABLE IF NOT EXISTS `error` (
  `id_error` int(8) NOT NULL AUTO_INCREMENT,
  `fk_solicitud` int(8) NOT NULL,
  `codigo_error` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_error` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_hora_error` datetime NOT NULL,
  PRIMARY KEY (`id_error`),
  KEY `fk_error_solicitud_idx` (`fk_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_configuracion`
--

CREATE TABLE IF NOT EXISTS `registro_configuracion` (
  `id_registro` int(8) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(8) NOT NULL,
  `fecha_hora_registro` datetime NOT NULL,
  `configuracion_cambiada` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `valor_viejo` float NOT NULL,
  `valor_nuevo` float NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `fk_config_usuario_idx` (`fk_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_solicitud` int(8) NOT NULL AUTO_INCREMENT,
  `fk_taxista` int(8) NOT NULL,
  `fk_usuario` int(8) NOT NULL,
  `latitud_solicitud` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `longitud_solicitud` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `estado_solicitud` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `hora_fecha_solicitud` datetime NOT NULL,
  `costo_solcitud` float NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  UNIQUE KEY `fk_taxista` (`fk_taxista`),
  KEY `fk_usuario_solicitud_idx` (`fk_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxista`
--

CREATE TABLE IF NOT EXISTS `taxista` (
  `id_taxista` int(8) NOT NULL,
  `fk_equipo` int(8) NOT NULL,
  `direccion_taxista` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono_taxista` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `company_taxista` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `numero_taxista` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email_taxista` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `activo` smallint(1) NOT NULL,
  PRIMARY KEY (`id_taxista`),
  UNIQUE KEY `fk_equipo` (`fk_equipo`),
  UNIQUE KEY `email_taxista` (`email_taxista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `taxista`
--

INSERT INTO `taxista` (`id_taxista`, `fk_equipo`, `direccion_taxista`, `telefono_taxista`, `company_taxista`, `numero_taxista`, `email_taxista`, `activo`) VALUES
(4, 1, '21', '32', '2131', '213213', 'taxista@taxi.com', 1),
(9, 2, '34324', '432423', 'jpo', 'pojpojp', 'taxista2@taxi.com', 1),
(17, 3, '-', '-', '-', '-', '-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacioin_taxista`
--

CREATE TABLE IF NOT EXISTS `ubicacioin_taxista` (
  `id_taxista` int(8) NOT NULL,
  `latitud` varchar(10) NOT NULL,
  `longitud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(8) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido_usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password_hash` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_usuario` char(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `activo` smallint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `username`, `password_hash`, `tipo_usuario`, `activo`) VALUES
(4, 'Jose', 'Licona', 'JoseL', '$1$Th..ga5.$bFY/zjbtjUWfnCb1yw', 'taxista', 1),
(5, 'Juan ', 'Borges', 'Juanito', '$1$0Z/.Hp..$20/KVksZu78VE38BgslHB0', 'operador', 0),
(6, 'Jeans', 'Licona Dorantes', 'Jeans', '$1$7A1.CY0.$ylEyC4WaCXCGrJoVPZVwV0', 'operador', 1),
(8, 'Jose Hernan', 'Licona Albronoz', 'Josesito', '$1$fV4.6z1.$tOhii6eFIaWPTSZAkydxe0', 'operador', 1),
(9, 'Jose Hernan c', 'Borges', 'Cehc', '$1$Hz1.EQ0.$8sXUATwMMT1ws2CLA5Ho5/', 'taxista', 1),
(10, 'SMST', 'SMST', 'admin', '$1$fV4.6z1.$tOhii6eFIaWPTSZAkydxe0', 'administrador', 1),
(11, 'Alex', 'Vieyra', 'avieyra', '$1$0Y2.H64.$TaZYNvAKk0piRlZEZ2CgO.', 'operador', 1),
(12, 'Juan', 'Perez', 'jperez', '$1$El1.7t1.$Mi9NBX9zG5yAue9KodXRE.', 'taxista', 1),
(13, 'Juan', 'Rodriguez', 'jrodriguez', '$1$cM5./x0.$KEqiee5Ys9rSCjTJ.t4sU0', 'taxista', 1),
(14, 'Luis', 'Vieyra', 'lvieyra', '$1$ZA5.un5.$.6nNIMbHpc6FIZKe3wd541', 'taxista', 1),
(15, 'asdasdas', 'asdasdasdsa', 'adasdasd', '$1$XI4.Uc4.$Cx6EpVGDbfUFicou9Q0yW1', 'taxista', 1),
(16, 'Rodrigo', 'Esparza', 'rodespan', '$1$9J..cg2.$lMy/TedinIcSVEUxzg2YM0', 'operador', 0),
(17, 'J. D.', 'Veloper', 'jdveloper', '$1$//4.ab5.$jq/kaVaLyHV9WNfR5jpwY.', 'taxista', 1),
(18, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '$1$bg0.I55.$RHzVJDc5XLtfje6PQnkRb0', 'taxista', 1),
(19, 'qqqqqqqq', 'qqqqqqqqq', 'qqqqqqqqq', '$1$N2..SL2.$WgrVkMf45UnIydDzhCW.E.', 'taxista', 1),
(20, 'ppppppppppp', 'pppppppppppppp', 'ppppppppppp', '$1$xx1.mt2.$uxcl6nxYPT/7ieKnr1LkY.', 'taxista', 0),
(21, 'ppppppppp', 'ppppppppp', 'paaahh', '$1$7o0.Cg/.$L.GeoM8rFMUYmFwjjzHdf0', 'taxista', 1),
(22, 'kkkkkkkkkk', 'llllllll', 'iiiiiiiiii', '$1$zC/.Ae2.$vcKjfUetfJOVWWchjoyPU1', 'taxista', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `error`
--
ALTER TABLE `error`
  ADD CONSTRAINT `fk_error_solicitud` FOREIGN KEY (`fk_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_configuracion`
--
ALTER TABLE `registro_configuracion`
  ADD CONSTRAINT `fk_config_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_taxista_solicitud` FOREIGN KEY (`fk_taxista`) REFERENCES `taxista` (`id_taxista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_solicitud` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `taxista`
--
ALTER TABLE `taxista`
  ADD CONSTRAINT `fk_equipo_taxista` FOREIGN KEY (`fk_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_taxista_usuario` FOREIGN KEY (`id_taxista`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
