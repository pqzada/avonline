<?php
include(dirname(__FILE__) . "/config.php");
include(dirname(__FILE__) . "/classes/autoload.php");

$categorias = Categoria::findAll();
?>

<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

		<script type="text/javascript" src="/assets/js/jquery-2.2.1.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="header">
			<div id="logo">
				<a href="/">
					<img src="/assets/images/Logo_Avispate_Chico_Fondo.png">
				</a>
			</div>
			<nav>
				<ul>
					<? foreach($categorias as $categoria) : ?>
						<li><a href="/<?=$categoria["id"]?>"><?=$categoria["nombre"]?></a></li>
					<? endforeach; ?>
				</ul>
			</nav>
		</div>
		<div class="container-fluid">	
			<?php include("modules.php"); ?>
		</div>
		<div class="footer">
			Avispate OnLine 2016 &copy Todos los derechos reservados
		</div>
	</body>

</html>