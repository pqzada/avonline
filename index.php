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
		<div class="header row">
			<div id="logo" class="col-sm-12 col-xs-8">
				<a href="/">
					<img src="/assets/images/Logo_Avispate_Chico_Fondo.png">
				</a>
			</div>
			<div id="btn-nav" class="visible-xs-block col-xs-4">
				<button class="btn btn-link btn-md pull-right">
					<i class="glyphicon glyphicon-menu-hamburger"></i>
				</button>
			</div>
			<nav class="col-xs-12" id="navbar">
				<ul>
					<? foreach($categorias as $categoria) : ?>
						<li onclick="document.location='/<?=$categoria["id"]?>'">
							<a href="/<?=$categoria["id"]?>"><?=$categoria["nombre"]?></a>
						</li>
					<? endforeach; ?>
				</ul>
			</nav>
		</div>

		<div class="container-fluid" id="main">	
			<?php include("modules.php"); ?>
		</div>

		<div class="footer" class="row">
			<a href="/tag">Tags</a>
		</div>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn-nav').click(function(){
				$('#navbar').toggle();
			});
		})
	</script>

</html>