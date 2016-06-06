<?php
$ofertas = Oferta::findAllFrontPage();

$meta = array(
	'title' => 'Avispate ONLINE - Los mejores descuentos de las tiendas en internet',
	'description' => 'Descuentos en tus compras en internet de hasta un 80% en tiendas como Ripley, Paris, Falabella, y otras.',
	'facebook' => array(
		'url' => 'http://www.avispateonline.cl',
		'type' => 'website',
		'title' => 'Avispate ONLINE - Las mejores ofertas de internet en un sólo lugar',
		'description' => 'Encuentra en un sólo lugar las mejores ofertas de internet para mujeres, hombres, niños, niñas, hogar y viajes',
		'image' => Imagen::getImageData($site_url . '/assets/images/Logo_Avispate_Grande_Fondo.png')
	)
);
?>