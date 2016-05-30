<div class="frontpage cyberday listado">

	<br>
	
	<p class="alert alert-success">En <em>AVISPATE ONLINE</em> te buscamos las mejores ofertas disponibles durante este cyberday!... Revísalas a continuación:</p>

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

		<article class="col-xs-12 col-sm-4 col-lg-3">
			<div class="row precios">
				<div class="col-xs-6" style="text-align: right;">
					<small>Antes</small><br>
					<?=$oferta["precio_antes"]?>
				</div>
				<div class="col-xs-6" style="">
					<small>Ahora</small><br>
					<?=$oferta["precio_ahora"]?>
				</div>
			</div>
			<a href="<?=$oferta["url_interna"]?>">				
				<div class="foto" style="background-image: url('<?=$oferta["imagen"]?>')">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
			</a>
			<p><?=substr($oferta["descripcion"], 0, 100)?>...</p>			
		</article>

		<? $idx++; ?>

	<? endforeach; ?>

</div>