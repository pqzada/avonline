<?php

if( isset($_GET['categoria']) && !is_null($_GET['categoria']) && $_GET['categoria']!="" ) {

	if( isset($_GET['oferta']) ) {
		include(dirname(__FILE__) . '/controllers/OfertaCtrl.php');
		$view = 'oferta';
	} else {
		include(dirname(__FILE__) . '/controllers/CategoriaCtrl.php');
		$view = 'categoria';
	}

} else if( isset($_GET['tag']) ) {

	if( $_GET['tag'] == "" ) {
		include(dirname(__FILE__) . '/controllers/TagCtrl.php');
		$view = 'tag';
	} else {
		include(dirname(__FILE__) . '/controllers/TagOfertaCtrl.php');
		$view = 'tag_oferta';
	}

} else {
	include(dirname(__FILE__) . '/controllers/FrontpageCtrl.php');
	$view = 'frontpage';
}

?>