<div class="frontpage listado">

	<!-- <a href="/cyberday"><div class="col-xs-12" id="cyberday-banner"></div></a> -->

	<!-- <div class="jumbotron">

	  <h1><small>Avispate este</small> cyberday</h1>
	  <p>En AVISPATE ONLINE te buscamos las mejores ofertas disponibles durante este cyberday!... </p>
	  <p><a class="btn btn-success btn-lg" href="/cyberday" role="button"><b>OFERTAS CYBERDAY</b></a></p>
	</div> -->
	<br>
	<? $idx = 1; ?>
	<? foreach($ofertas as $oferta) : ?>

		<? if($idx == 4): ?>
		<article class="col-xs-12" id="banner-frontpage">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Adaptable homepage -->
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-3186329023014409"
			     data-ad-slot="3715700974"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</article>
		<? endif; ?>

		<article class="col-xs-12 col-sm-4">
			<a href="<?=$oferta["url_interna"]?>">				
				<div class="foto" style="background-image: url('<?=$oferta["imagen"]?>')">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
			</a>
			<p><?=$oferta["descripcion"]?></p>			
		</article>

		<? $idx++; ?>

	<? endforeach; ?>

</div>