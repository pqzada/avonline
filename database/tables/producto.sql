CREATE TABLE `producto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_oferta` int(11) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;