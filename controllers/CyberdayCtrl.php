<?php
$ofertas = Cyberday::findAllFrontPage();

$meta = array(
	'title' => 'Cyberday en Avispate ONLINE - Las mejores ofertas del día',
	'description' => 'Encuentra en un sólo lugar las mejores ofertas de este Cyberday',
	'facebook' => array(
		'url' => 'http://www.avispateonline.cl/cyberday',
		'type' => 'website',
		'title' => 'Cyberday en Avispate ONLINE - Las mejores ofertas del día',
		'description' => 'Encuentra en un sólo lugar las mejores ofertas de este Cyberday',
		'image' => 'http://www.avispateonline.cl/assets/images/cyberday_mini.png'
	)
);
?>