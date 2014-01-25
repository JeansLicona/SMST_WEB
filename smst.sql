-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-01-2014 a las 17:50:51
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `activo` smallint(1) NOT NULL,
  PRIMARY KEY (`id_taxista`),
  UNIQUE KEY `fk_equipo` (`fk_equipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(8) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido_usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password_hash` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_usuario` char(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `activo` smallint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `fk_taxista_usuario` FOREIGN KEY (`id_taxista`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipo_taxista` FOREIGN KEY (`fk_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
