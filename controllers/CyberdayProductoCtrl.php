<?php
date_default_timezone_set('America/Santiago');

$url = "/cyberday/" . $_GET["cyberday"];
$oferta = Cyberday::findByUrl($url);

// Categorias
$categoriasOferta = Categoria::findForCyberday($oferta["id"]);
foreach($categoriasOferta as $co) {
	$oferta["categorias"][] = Categoria::findById($co["id_categoria"]);
}

$meta = array(
	'title' => $oferta["titulo"],
	'description' => $oferta["descripcion"],
	'facebook' => array(
		'url' => 'http://www.avispateonline.cl' . $oferta["url_interna"],
		'type' => 'product.group',
		'title' => $oferta["titulo"],
		'description' => $oferta["descripcion"],
		'image' => Imagen::getImageData('http://www.avispateonline.cl' . $oferta["imagen"])
	)
);

?>