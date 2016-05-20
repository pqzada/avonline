<?php
$ofertas = Oferta::findAllFrontPage();

$meta = array(
	'title' => 'Avispate ONLINE - Las mejores ofertas de internet',
	'description' => 'Encuentra en un sólo lugar las mejores ofertas vigentes en internet para mujeres, hombres, niños, niñas, hogar y viajes',
	'facebook' => array(
		'url' => 'http://www.avispateonline.cl',
		'type' => 'website',
		'title' => 'Avispate ONLINE - Las mejores ofertas de internet',
		'description' => 'Encuentra en un sólo lugar las mejores ofertas de internet para mujeres, hombres, niños, niñas, hogar y viajes',
		'image' => 'http://www.avispateonline.cl/assets/images/Logo_Avispate_Grande_Fondo.png'
	)
);
?>