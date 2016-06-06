<?php
/**
 * Generación de Sitemap.xml
 * 
 * @filesource https://support.google.com/webmasters/answer/183668?hl=es
 * @author pablo.quezada@mercurio.cl
 */

set_time_limit(0);
date_default_timezone_set("America/Santiago");

include(dirname(__FILE__) . "/../config.php");
include(dirname(__FILE__) . "/../classes/autoload.php");

// CATEGORIAS
$categorias = Categoria::findAll();

// OFERTAS
$ofertas = Oferta::findAll();

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset/>');
$xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

/**
 * Páginas genéricas
 */
$url = $xml->addChild('url')->addChild('loc', 'http://wwww.avispateonline.cl');

// CATEGORIAS
foreach($categorias as $categoria) {
	$url = $xml->addChild('url')->addChild('loc', htmlspecialchars('http://wwww.avispateonline.cl/' . $categoria["id"]));
}

// OFERTAS
foreach($ofertas as $oferta) {
	$url = $xml->addChild('url')->addChild('loc', htmlspecialchars('http://wwww.avispateonline.cl/' . $oferta["url_interna"]));
}



// header('Content-type: text/xml');
// print($xml->asXML());
file_put_contents( dirname(__FILE__) . '/../sitemap.xml', $xml->asXML())
?>