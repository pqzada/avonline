<?php
$ofertas = Oferta::findAllForCategoria($_GET["categoria"]);
$categoria = Categoria::findById($_GET["categoria"]);

// $meta = array(
// 	'title' => 'Descuentos en productos de ' . $categoria["titulo"],
// 	'description' => 'Descuentos en ' . $categoria["titulo"] . ' en tiendas de internet.',
// 	'facebook' => array(
// 		'url' => 'http://www.avispateonline.cl/' . $categoria["id"],
// 		'type' => 'website',
// 		'title' => 'Descuentos en productos de ' . $categoria["titulo"] . ' en Avispate Online!', 
// 		'description' => 'Encuentra en un sólo lugar las mejores ofertas de internet para ' . $categoria["titulo"],
// 		'image' => Imagen::getImageData('http://www.avispateonline.cl/assets/images/Logo_Avispate_Grande_Fondo.png')
// 	)
// );
?>
