<?php
include(dirname(__FILE__) . "/config.php");
include(dirname(__FILE__) . "/classes/autoload.php");

$categorias = Categoria::findAll();
?>

<html>

	<head>		
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

		<script type="text/javascript" src="/assets/js/jquery-2.2.1.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/functions.js"></script>
		<script type="text/javascript" src="/assets/js/reorder-articles.js"></script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-74380478-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>

	<body>
		<div class="header row">
			<div id="logo" class="col-sm-12 col-xs-8">
				<a href="/">
					<img src="/assets/images/Logo_Avispate_Chico_Fondo.png">
				</a>

				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Skyscraper Desktop - Header -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3186329023014409"
     data-ad-slot="1704149375"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

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
			toogleNavbar();			
		})
	</script>

</html>