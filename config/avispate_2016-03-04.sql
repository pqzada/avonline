# ************************************************************
# Sequel Pro SQL dump
# Versión 4500
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.24)
# Base de datos: avispate
# Tiempo de Generación: 2016-03-04 03:15:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` varchar(25) NOT NULL DEFAULT '',
  `nombre` varchar(25) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;

INSERT INTO `categoria` (`id`, `nombre`, `titulo`)
VALUES
	('hogar','Hogar','Mejora tu Hogar con las mejores ofertas'),
	('hombre','Hombre','Las mejores ofertas para Hombres'),
	('mujer','Mujer','Mujer, los mejores descuentos en un sólo lugar'),
	('nino','Niño','Las mejores ofertas para Niño, niña y bebé'),
	('viajes','Viajes','Viajes al mejor precio');

/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla empresa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla oferta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oferta`;

CREATE TABLE `oferta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `descripcion` text,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `url_externa` varchar(255) DEFAULT NULL,
  `url_interna` varchar(255) DEFAULT NULL,
  `id_empresa` varchar(50) DEFAULT NULL,
  `id_estado` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla oferta_categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oferta_categoria`;

CREATE TABLE `oferta_categoria` (
  `id_oferta` int(11) unsigned NOT NULL,
  `id_categoria` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_oferta`,`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla oferta_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oferta_tag`;

CREATE TABLE `oferta_tag` (
  `id_oferta` int(11) unsigned NOT NULL,
  `id_tag` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_oferta`,`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
