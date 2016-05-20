<?php
date_default_timezone_set('America/Santiago');

$url = "/" . $_GET["categoria"] . "/" . $_GET["oferta"];
$oferta = Oferta::findByUrl($url);

// Categorias
$categoriasOferta = Categoria::findForOferta($oferta["id"]);
foreach($categoriasOferta as $co) {
	$oferta["categorias"][] = Categoria::findById($co["id_categoria"]);
}

// Tags
$tags = Tag::findForOferta($oferta["id"]);
foreach($tags as $tag) {
	$oferta["tags"][] = Tag::findById($tag["id_tag"]);
}

$productos = Producto::findByOfertaId($oferta["id"]);

$similares = array();
foreach($oferta["categorias"] as $oc) {
	$tmp = Oferta::findAllForCategoria($oc["id"]);
	foreach($tmp as $t) {
		if($t["id"] != $oferta["id"]) {
			$similares[$t["id"]] = $t;
		}
	}
}

if(date('Y-m-d') > $oferta['fecha_fin']) {
	$oferta['id_estado'] = 'DESACTIVADA';
}

$meta = array(
	'title' => $oferta["titulo"],
	'description' => $oferta["descripcion"],
	'facebook' => array(
		'url' => 'http://www.avispateonline.cl' . $oferta["url_interna"],
		'type' => 'product.group',
		'title' => $oferta["titulo"],
		'description' => $oferta["descripcion"],
		'image' => 'http://www.avispateonline.cl' . $oferta["imagen"]
	)
);

?>