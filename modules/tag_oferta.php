<?php
$ofertas = Oferta::findAllForTag($_GET["tag"]);
$tag = Tag::findById($_GET["tag"]);
?>

<title><?=$tag["nombre"]?> en descuento | Avispate ONLINE!</title>

<div class="tag listado">

	<div class="page-header">
		<h1><?=$tag["nombre"]?></h1>
	</div>

	<? if(!Device::isMobile()): ?>
		<article class="col-xs-12 col-sm-4 col-md-3 banner">
			<div class="thumbnail">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- @Pagina Desktop - Left AND Mobile-->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:300px;height:250px"
				     data-ad-client="ca-pub-3186329023014409"
				     data-ad-slot="9227416175"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</article>
	<? endif; ?>

	<? if(Device::isMobile()): ?>
		<article class="col-xs-12 col-sm-4 col-md-3 banner">
			<div class="thumbnail">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Mobile - Top -->
				<ins class="adsbygoogle"
				     style="display:inline-block;width:320px;height:100px"
				     data-ad-client="ca-pub-3186329023014409"
				     data-ad-slot="2901680976"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</article>
	<? endif; ?>

	<? $idx = 1; ?>

	<? foreach($ofertas as $oferta) : ?>

		<article class="col-xs-12 col-sm-4 col-md-3">
			<a href="<?=$oferta["url_interna"]?>">				
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
				<p><?=$oferta["descripcion"]?></p>
				<? if($oferta["id_estado"] == "DESACTIVADA") : ?>
					<p>NO VIGENTE</p>
				<? endif; ?>
			</a>
		</article>

		<? if($idx == 2 && Device::isMobile()): ?>
			<article class="col-xs-12 col-sm-4 col-md-3 banner">
				<div class="thumbnail" style="text-align: center;">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- @Pagina Desktop - Left AND Mobile-->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:300px;height:250px"
					     data-ad-client="ca-pub-3186329023014409"
					     data-ad-slot="9227416175"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</article>
		<? endif; ?>

		<? if($idx == 6 && !Device::isMobile()): ?>
			<article class="col-xs-12 col-sm-4 col-md-3 banner">
				<div class="thumbnail" style="text-align: center;">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Skyscraper Desktop - Right -->
					<ins class="adsbygoogle"
					     style="display:inline-block;width:300px;height:600px"
					     data-ad-client="ca-pub-3186329023014409"
					     data-ad-slot="4657615770"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</article>
		<? endif; ?>

		<? $idx++; ?>


	<? endforeach; ?>

</div>