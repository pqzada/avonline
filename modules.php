<?php

if( isset($_GET['categoria']) && !is_null($_GET['categoria']) && $_GET['categoria']!="" ) {

	if( isset($_GET['oferta']) ) {
		include("modules/oferta.php");
	} else {
		include("modules/categoria.php");
	}

} else if( isset($_GET['tag']) ) {

	if( $_GET['tag'] == "" ) {
		include("modules/tag.php");
	} else {
		include("modules/tag_oferta.php");
	}

} else {
	include("modules/frontpage.php");
}

?>