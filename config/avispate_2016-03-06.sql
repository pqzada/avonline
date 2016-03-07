-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: avispateonline
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.12.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` varchar(25) NOT NULL DEFAULT '',
  `nombre` varchar(25) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES ('hogar','Hogar','Mejora tu Hogar con las mejores ofertas'),('hombre','Hombre','Las mejores ofertas para Hombres'),('mujer','Mujer','Mujer, los mejores descuentos en un sólo lugar'),('nino','Niño','Las mejores ofertas para Niño, niña y bebé'),('viajes','Viajes','Viajes al mejor precio');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES ('cocha','Cocha'),('colloky','Colloky'),('dafiti','Dafiti'),('easy','Easy'),('falabella','Falabella'),('infanti','Infanti'),('la-polar','La Polar'),('pars','París'),('ripley','Ripley');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta`
--

DROP TABLE IF EXISTS `oferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta`
--

LOCK TABLES `oferta` WRITE;
/*!40000 ALTER TABLE `oferta` DISABLE KEYS */;
INSERT INTO `oferta` VALUES (1,'Hasta 45% descuento para hoteles del Caribe en Cocha','Encontrarás descuentos en lugares como: Punta Cana, Bayahibe, Puerto Plata entre otros destinos','2016-03-03','2016-03-31','/upload/1.png','http://cms.cocha.com/ofertas/hoteles?t=hotel&pais=59','/viajes/hasta-45-descuento-para-hoteles-del-caribe-en-cocha','cocha','PUBLICADA'),(2,'70% descuento en todas las baterías de cocina Zibel y Casanova en La Polar','Aprovecha esta oportunidad, porque sólo son 5000 unidades en stock.','2016-03-03','2016-03-31','/upload/2.png','http://www.lapolar.cl/internet/catalogo/todolistados/decohogar/menaje_cocina/baterias_de_cocina','/hogar/70-descuento-en-todas-las-bateras-de-cocina-zibel-y-casanova-en-la-polar','la-polar','PUBLICADA'),(3,'Hasta 40% descuento en productos Rosen seleccionados en Falabella','Encontrarás productos como: Colchones, Diván cama y Box spring.','2016-03-03','2016-03-31','/upload/3.png','http://www.falabella.com/falabella-cl/category/cat4380023/?sid=HO_V2_BOX_0025083','/hogar/hasta-40-descuento-en-productos-rosen-seleccionados-en-falabella','falabella','PUBLICADA'),(4,'Hasta 50% descuento en tecnología con Ripley','Encontrarás productos como: Parlantes, tablet, cámara de vídeo, smartphone, minicomponente y mucho más.\r\n','2016-03-03','2016-03-31','/upload/4.png','http://www.ripley.cl/ripley-chile/tecnologia/especiales-tecnologia/verano?ev3','/hogar/hasta-50-descuento-en-tecnologa-con-ripley','ripley','PUBLICADA'),(5,'80% descuento en alfombras windsor en La Polar','Encontrarás alfombras de todos los diseños, colores y tamaños.','2016-03-03','2016-03-31','/upload/5.png','http://www.lapolar.cl/buscar/buscar/?busInt=windsor&filtros=categoria*alfombras','/hogar/70-descuento-en-alfombras-windsor-en-la-polar','la-polar','PUBLICADA'),(6,'Hasta 70% descuento en muebles de tiendas La Polar','Aprovecha esta oportunidad, porque sólo son 500 unidades en stock.','2016-03-03','2016-03-09','/upload/6.png','http://www.lapolar.cl/internet/catalogo/todolistados/muebles/muebles_de_living/liquidacion','/hogar/60-descuento-en-todos-los-juegos-de-living-en-la-polar','la-polar','PUBLICADA'),(7,'60% descuento en juegos al aire libre en Easy','Encontrarás juegos inflables, piscinas, centro de entretenciones y mucho más.','2016-03-03','2016-03-31','/upload/7.png','http://www.easy.cl/oferta-juegos','/hogar/60-descuento-en-juegos-al-aire-libre-en-easy','easy','PUBLICADA'),(8,'Hasta 70% descuento en productos de moda en tiendas Paris','Encontrarás una amplia variedad de productos, con la posibilidad de llevar 10 productos de moda, pagando sólo un despacho.','2016-03-03','2016-03-31','/upload/8.jpg','http://www.paris.cl/tienda/es/paris/search/sale-moda','/hombre/hasta-70-descuento-en-productos-de-moda-en-tiendas-paris','pars','PUBLICADA'),(9,'Hasta 50% descuento en bicicletas en Ripley','Encontrarás una amplia variedad de marcas en descuento. Entre ellas están: Oxford, Besatti, Gama, Trek, entre otras.','2016-03-03','2016-03-31','/upload/9.png','http://www.ripley.cl/ripley-chile/deporte/bicicletas/liqui-bicicletas?h1-deporte','/hombre/hasta-50-descuento-en-bicicletas-en-ripley','ripley','PUBLICADA'),(10,'Hasta un 50% descuento en poleras con Dafiti','Variedad de marcas en Dafiti, se encuentran con descuentos imperdibles.\r\n','2016-03-03','2016-03-31','/upload/10.png','http://www.dafiti.cl/masculino/vestuario/poleras-masculino/?discount_range=0-50','/hombre/hasta-un-50-descuento-en-poleras-con-dafiti','dafiti','PUBLICADA'),(11,'Descuentos hasta un 50% en productos Colloky','Podrás encontrar productos como: Zapatos, sandalias y una amplia variedad en vestuario infantil.','2016-03-03','2016-03-31','/upload/11.png','http://www.colloky.cl/sale','/nino/descuentos-hasta-un-50-en-productos-colloky','colloky','DESACTIVADA'),(12,'40% Descuento en productos escolares en Ripley','Encontraras descuentos en: Uniformes, mochilas y calzado escolar.\r\n','2016-03-03','2016-03-31','/upload/12.png','http://www.ripley.cl/minisitios/landing/especial/escolar/?h1-especial-escolares','/nino/40-descuento-en-productos-escolares-en-ripley','ripley','PUBLICADA'),(13,'Hasta 50% descuentos en productos Infanti en tiendas Paris','Encontrarás productos como: Sillas de comer, sillas de auto, bañeras, coches, cunas, centro de actividades y muchas cosas más.\r\n','2016-03-03','2016-03-31','/upload/13.png','http://www.paris.cl/tienda/es/paris/search/infantil-sale-rodados','/nino/hasta-50-descuentos-en-productos-infanti-en-tiendas-paris','pars','PUBLICADA'),(14,'Hasta 60% descuento en calzado mujer temporada verano en Paris','Encontrarás marcas como: Alaniz, Reef, Nine west, Azaleia, 16 hrs, Gacel y muchos más.\r\n','2016-03-03','2016-03-31','/upload/14.png','http://www.paris.cl/tienda/es/paris/search/sale-mujer-zapatos','/mujer/hasta-60-descuento-en-calzado-mujer-temporada-verano-en-paris','pars','PUBLICADA'),(15,'Hasta un 70% descuento en perfumería en La Polar','Entre los productos con descuentos encuentras: Cacharel, Sweet secret, Lancome y Hugo Boss.','2016-03-03','2016-03-31','/upload/15.png','http://www.lapolar.cl/internet/catalogo/categorias/belleza/perfumeria','/mujer/hasta-un-70-descuento-en-perfumera-en-la-polar','la-polar','DESACTIVADA'),(16,'Hasta 70% descuento ropa de cama en tiendas La Polar','Aprovecha esta oportunidad que sólo tiene un stock de 500 unidades','2016-03-04','2016-03-05','/upload/16.png','http://www.lapolar.cl/internet/catalogo/todolistados/dormitorio/ropa_de_cama/ver_todo6','/hogar/hasta-70-descuento-ropa-de-cama-en-tiendas-la-polar','la-polar','PUBLICADA'),(17,'Hasta 50% descuentos en livings y sofá en tiendas Paris','Encontrarás una variedad de marcas, entre ellas están: Rosen, Attimo, Alaniz Home, Sarah Miller y muchas más.','2016-03-04','2016-03-31','/upload/17.png','http://http://www.paris.cl/tienda/es/paris/search/living-landing','/hogar/hasta-50-descuentos-en-livings-y-sof-en-tiendas-paris','pars','PUBLICADA'),(18,'Hasta 50% descuento en terrazas en Easy','Obtén increíbles descuentos en productos de terraza con todo medio de pago en Easy. ','2016-03-04','2016-03-31','/upload/18.png','http://www.easy.cl/easy/CategoryDisplay?mundo=1&tpCa=4&caN0=3720&caN1=4469&caN2=7961&caN3=8200&ordenSel=precioMayorAMenor&marcaSel=0&pagina=1&sel_orden=0&orden=precioMayorAMenor&marcas=0','/hogar/hasta-50-descuento-en-terrazas-en-easy','easy','PUBLICADA'),(19,'50% Descuento en sábanas en Ripley','Descuento aplicado en productos seleccionados.','2016-03-04','2016-03-06','/upload/19.png','http://www.ripley.cl/ripley-chile/dormitorio/especiales-dorm/ol-dormitorio?ev','/hogar/50-descuento-en-sbanas-en-ripley','ripley','PUBLICADA'),(20,'Hasta 50% descuento en perfumería en tiendas Paris','Aprovechas estos increíbles descuentos en productos seleccionados.','2016-03-04','0000-00-00','/upload/20.png','http://http://www.ripley.cl/ripley-chile/belleza/esp-belleza-lanz/esp--perfumeria?ev5b','/hombre/hasta-50-descuento-en-perfumera-en-paris','ripley','PUBLICADA'),(21,'Hasta 60% descuento en sábanas en Falabella','Encontrarás productos increíbles  y las mejores marcas','2016-03-06','2016-03-31','/upload/21.png','http://www.falabella.com/falabella-cl/category/cat4970026/','/hogar/hasta-60-descuento-en-sbanas-en-falabella','falabella','PUBLICADA'),(22,'Hasta 50% descuento en accesorios Lounge Anaya en Falabella','Podrás encontrar productos como: Aros, collares, carteras, gorros y muchas cosas más','2016-03-06','2016-03-31','/upload/22.png','http://www.falabella.com/falabella-cl/category/cat4970045/Carteras-y-Accesorios--Sale-/N-1z13k3s?Nrpp=16','/mujer/hasta-50-descuento-en-accesorios-lounge-anaya-en-falabella','falabella','PUBLICADA'),(23,'Hasta 70% descuento en ropa de verano mujer en Falabella','Aprovecha esta increíble oportunidad y obtén productos de excelentes marcas.','2016-03-06','2016-03-31','/upload/23.png','http://www.falabella.com/falabella-cl/category/cat4990018/Vestuario-Mujer-%C2%A1Sale!','/mujer/hasta-70-descuento-en-ropa-de-verano-mujer-en-falabella','falabella','PUBLICADA'),(24,'Hasta 70% descuento en menaje cocina en Ripley','Encontrarás una amplia variedad de productos para tu hogar con excelentes precios.','2016-03-06','2016-03-31','/upload/24.png','http://www.ripley.cl/ripley-chile/decohogar/menaje-cocina/ver-todo-menaje-cocina?ev2b','/hogar/hasta-70-descuento-en-menaje-cocina-en-ripley','ripley','PUBLICADA');
/*!40000 ALTER TABLE `oferta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta_categoria`
--

DROP TABLE IF EXISTS `oferta_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oferta_categoria` (
  `id_oferta` int(11) unsigned NOT NULL,
  `id_categoria` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_oferta`,`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta_categoria`
--

LOCK TABLES `oferta_categoria` WRITE;
/*!40000 ALTER TABLE `oferta_categoria` DISABLE KEYS */;
INSERT INTO `oferta_categoria` VALUES (1,'viajes'),(2,'hogar'),(3,'hogar'),(4,'hogar'),(4,'hombre'),(5,'hogar'),(6,'hogar'),(7,'hogar'),(7,'nino'),(8,'hombre'),(8,'mujer'),(9,'hombre'),(9,'mujer'),(9,'nino'),(10,'hombre'),(11,'nino'),(12,'nino'),(13,'nino'),(14,'mujer'),(15,'mujer'),(16,'hogar'),(17,'hogar'),(18,'hogar'),(19,'hogar'),(20,'hombre'),(20,'mujer'),(21,'hogar'),(22,'mujer'),(23,'mujer'),(24,'hogar');
/*!40000 ALTER TABLE `oferta_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta_tag`
--

DROP TABLE IF EXISTS `oferta_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oferta_tag` (
  `id_oferta` int(11) unsigned NOT NULL,
  `id_tag` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_oferta`,`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta_tag`
--

LOCK TABLES `oferta_tag` WRITE;
/*!40000 ALTER TABLE `oferta_tag` DISABLE KEYS */;
INSERT INTO `oferta_tag` VALUES (1,'caribe'),(1,'vacaciones'),(1,'viajes'),(2,'batera-de-cocina'),(3,'box-spring'),(3,'colchones'),(4,'cmara-de-video'),(4,'minicomponente'),(4,'parlantes'),(4,'smartphone'),(5,'alfombras'),(6,'muebles'),(7,'centros-de-entretenciones'),(7,'juegos-inflables'),(7,'piscinas'),(8,'carteras'),(8,'cinturones'),(8,'faldas'),(8,'poleras'),(9,'bicicletas'),(10,'poleras'),(11,'sandalias'),(11,'vestuario-infantil'),(11,'zapatos'),(12,'calzado-escolar'),(12,'escolares'),(12,'mochilas'),(12,'uniformes'),(13,'baera'),(13,'centro-de-actividades'),(13,'coches'),(13,'cunas'),(13,'sillas-de-comer'),(14,'zapatos'),(15,'perfumes'),(16,'ropa-de-cama'),(17,'livings'),(17,'sof'),(18,'terraza'),(19,'sabnas'),(20,'perfumes'),(21,'sabnas'),(22,'aros'),(22,'carteras'),(22,'collares'),(23,'blusa'),(23,'chaleco'),(23,'pantalones'),(23,'poleras'),(24,'delantales'),(24,'set-de-cocina'),(24,'set-de-repostera'),(24,'set-de-utensilios');
/*!40000 ALTER TABLE `oferta_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES ('alfombras','Alfombras'),('aros','aros'),('baera','Bañera'),('batera-de-cocina','Batería de cocina'),('bicicletas','Bicicletas'),('blusa','blusa'),('box-spring','Box spring'),('calzado-escolar','Calzado escolar'),('caribe','Caribe'),('carteras','Carteras'),('centro-de-actividades','Centro de actividades'),('centros-de-entretenciones','Centros de entretenciones'),('chaleco','chaleco'),('cinturones','Cinturones'),('cmara-de-video','Cámara de video'),('coches','Coches'),('colchones','Colchones'),('collares','collares'),('cunas','Cunas'),('delantales','delantales'),('escolares','escolares'),('faldas','Faldas'),('juegos-inflables','Juegos inflables'),('living','Living'),('livings','livings'),('minicomponente','Minicomponente'),('mochilas','mochilas'),('muebles','muebles '),('pantalones','pantalones'),('parlantes','Parlantes'),('perfumes','Perfumes'),('piscinas','piscinas'),('poleras','Poleras'),('ropa-de-cama','ropa de cama'),('sabnas','sabánas'),('sandalias','Sandalias'),('set-de-cocina','set de cocina'),('set-de-repostera','set de repostería'),('set-de-utensilios','set de utensilios'),('sillas-de-comer','Sillas de comer'),('smartphone','Smartphone'),('sof','sofá'),('terraza','terraza'),('uniformes','uniformes'),('vacaciones','Vacaciones'),('vestuario-infantil','Vestuario infantil'),('viajes','Viajes'),('zapatos','Zapatos');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-07  1:52:44
