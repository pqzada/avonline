CREATE TABLE `oferta_tag` (
  `id_oferta` int(11) unsigned NOT NULL,
  `id_tag` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_oferta`,`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;