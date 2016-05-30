CREATE TABLE `oferta_categoria` (
  `id_oferta` int(11) unsigned NOT NULL,
  `id_categoria` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_oferta`,`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;