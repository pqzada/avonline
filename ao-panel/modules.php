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
		
		default:
			echo "Selecciona una opción válida";
			break;
	}

} else {

	echo "Selecciona una opción";

}

?>