<div class="frontpage listado">

	<br>
	<? $idx = 1; ?>
	<? foreach($ofertas as $oferta) : ?>

		<? if($idx == 4): ?>
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