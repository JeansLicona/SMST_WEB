-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2014 a las 05:53:04
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `smst`
--
CREATE DATABASE IF NOT EXISTS `smst` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smst`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacioin_taxista`
--

CREATE TABLE IF NOT EXISTS `ubicacioin_taxista` (
  `id_taxista` int(8) NOT NULL AUTO_INCREMENT,
  `latitud` varchar(10) NOT NULL,
  `longitud` varchar(10) NOT NULL,
  PRIMARY KEY (`id_taxista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ubicacioin_taxista`
--

INSERT INTO `ubicacioin_taxista` (`id_taxista`, `latitud`, `longitud`) VALUES
(1, '20.8941741', '-89.658374'),
(2, '20.9576683', '-89.568424'),
(3, '21.0236995', '-89.567051'),
(4, '21.0499756', '-89.630222'),
(5, '20.9980598', '-89.674167');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
