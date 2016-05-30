CREATE TABLE `cyberday_categoria` (
  `id_cyberday` int(11) unsigned NOT NULL,
  `id_categoria` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_cyberday`,`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;