<?php

if( isset($_GET['mod']) ) {

	switch ($_GET['mod']) {
		case 'ofertas':
			include("modules/admin_ofertas.php");
			break;

		case 'empresas':
			include("modules/admin_empresas.php");
			break;

		case 'categorias':
			include("modules/admin_categorias.php");
			break;

		case 'productos':
			include("modules/admin_productos.php");
			break;

		case 'cyberday':
			include("modules/admin_cyberday.php");
			break;
		
		default:
			include("modules/admin_index.php");
			break;
	}

} else {

	include("modules/admin_index.php");

}

?>