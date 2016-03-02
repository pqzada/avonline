<?php

if( isset($_GET['mod']) ) {

	switch ($_GET['mod']) {
		case 'ofertas':
			include("modules/ofertas.php");
			break;

		case 'empresas':
			include("modules/empresas.php");
			break;

		case 'categorias':
			include("modules/categorias.php");
			break;
		
		default:
			include("modules/frontpage.php");
			break;
	}

} else {

	include("modules/frontpage.php");

}

?>