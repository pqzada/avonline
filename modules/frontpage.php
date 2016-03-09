<?php
$ofertas = Oferta::findAllFrontPage();
?>

<title>Avispate ONLINE! - Las mejores ofertas a sólo un click</title>

<div class="frontpage listado">

	<br>
	
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

	<? if(Device::isMobile() && false): ?>
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
			<a href="<?=$oferta["url_interna"]?>" onclick="window.open('<?=$oferta["url_externa"]?>')">				
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
				<p><?=$oferta["descripcion"]?></p>
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

		<? if($idx == 6 && !Device::isMobile() && false): ?>
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