<div class="frontpage listado">

	<!-- <a href="/cyberday"><div class="col-xs-12" id="cyberday-banner"></div></a> -->

	<!-- <div class="jumbotron">

	  <h1><small>Avispate este</small> cyberday</h1>
	  <p>En AVISPATE ONLINE te buscamos las mejores ofertas disponibles durante este cyberday!... </p>
	  <p><a class="btn btn-success btn-lg" href="/cyberday" role="button"><b>OFERTAS CYBERDAY</b></a></p>
	</div> -->
	<div class="page-header">
		<h1>Últimos descuentos</h1>
	</div>
	<? $idx = 1; ?>
	<? foreach($ofertas as $oferta) : ?>

		<? if($idx == 5): ?>
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

		<article class="col-xs-12 col-sm-3">
			<a href="<?=$oferta["url_interna"]?>">
				<div class="thumbnail"><img src="<?=$oferta["imagen"]?>" alt="<?=$oferta["titulo"]?>"></div>
				<h3><?=$oferta["titulo"]?></h3>
			</a>
			<p><?=substr($oferta["descripcion"], 0, 60)?>...</p>			
		</article>

		<? $idx++; ?>

	<? endforeach; ?>

</div>