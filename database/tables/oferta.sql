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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;