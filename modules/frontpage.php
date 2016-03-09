<?php
$ofertas = Oferta::findAllFrontPage();
?>

<title>Avispate ONLINE! - Las mejores ofertas a sólo un click</title>

<div class="frontpage listado">

	<br>

	<article class="col-xs-12 col-sm-4 col-md-3">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- @Pagina Desktop - Left -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:250px"
		     data-ad-client="ca-pub-3186329023014409"
		     data-ad-slot="9227416175"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</article>

	<? foreach($ofertas as $oferta) : ?>

		<article class="col-xs-12 col-sm-4 col-md-3">
			<a href="<?=$oferta["url_interna"]?>" onclick="window.open('<?=$oferta["url_externa"]?>')">				
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
				<p><?=$oferta["descripcion"]?></p>
			</a>
		</article>


	<? endforeach; ?>

	<script type="text/javascript">

		function callReorder() {
			$('.listado').reorder({
				'initialtop': 20,
				'extratop': 15,
				'selector': '.listado article',
				'wait': 1000,
				'wrapperselector': '.listado',
			});
		}

		$(document).ready(function(){
			callReorder();
			setTimeout(function() {
				callReorder();
			}, 3000);
		})
	</script>

</div>