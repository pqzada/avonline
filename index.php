<?php
include(dirname(__FILE__) . "/config.php");
include(dirname(__FILE__) . "/classes/autoload.php");
include(dirname(__FILE__) . "/router.php");

$categorias = Categoria::findAll();
?>

<html>

	<head profile="http://gmpg.org/xfn/11" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product.group: http://ogp.me/ns/product.group#">	
		<title><?=$meta['title']?></title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="<?=$meta['description']?>" />

		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

		<script type="text/javascript" src="/assets/js/jquery-2.2.1.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/functions.js"></script>
		<script type="text/javascript" src="/assets/js/reorder-articles.js"></script>

		<? if(isset($meta['facebook'])): ?>
			<meta property="og:url" content="<?=$meta['facebook']['url']?>" />
			<meta property="og:type" content="<?=$meta['facebook']['type']?>" />
			<meta property="og:title" content="<?=$meta['facebook']['title']?>" />
			<meta property="og:description" content="<?=$meta['facebook']['description']?>" />
			<meta property="og:image" content="<?=$meta['facebook']['image']['url']?>" />
			<meta property="og:image:width" content="<?=$meta['facebook']['image']['width']?>" />
			<meta property="og:image:height" content="<?=$meta['facebook']['image']['height']?>" />
			<meta property="og:site_name" content="Avíspate ONLINE!" />
    		<meta property="fb:app_id" content="139706469517509" />
		<? endif; ?>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-74380478-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-3186329023014409",
		    enable_page_level_ads: true
		  });
		</script>
	</head>

	<body>
	
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=139706469517509";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div class="header row">
			<div class="container">
				<div id="logo" class="col-sm-8 col-xs-8">
					<a href="/">
						<img src="/assets/images/Logo_Avispate_Chico_Fondo.png">
					</a>
				</div>
				<div id="megusta" class="col-sm-4 hidden-xs">
					<div class="fb-page" data-href="https://www.facebook.com/avispateonline/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/avispateonline/"><a href="https://www.facebook.com/avispateonline/">Avispate Online</a></blockquote></div></div>
				</div>
				<div id="btn-nav" class="visible-xs-block col-xs-4">
					<button class="btn btn-link btn-md pull-right">
						<i class="glyphicon glyphicon-menu-hamburger"></i>
					</button>
				</div>
			</div>

			<nav class="col-xs-12" id="navbar">
				<div class="container">
					<ul>
						<? foreach($categorias as $categoria) : ?>
							<li onclick="document.location='/<?=$categoria["id"]?>'">
								<a href="/<?=$categoria["id"]?>"><?=$categoria["nombre"]?></a>
							</li>							
						<? endforeach; ?>
						<!-- <li><a href="/cyberday" class="btn btn-success"><b>Ofertas Cyberday</b></a></li> -->
					</ul>
				</div>
			</nav>

		</div>

		<div class="container" id="main">	
			<?php include(dirname(__FILE__) . '/views/' . $view . '.php'); ?>
		</div>

		<div class="footer" class="row">
			<!-- <a href="/tag">Tags</a> -->
		</div>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){
			toogleNavbar();			
		})
	</script>

</html>