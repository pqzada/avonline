<?php
$ofertas = Oferta::findAllFrontPage();
?>

<title>Avispate ONLINE! - Las mejores ofertas a sólo un click</title>

<div class="frontpage listado">

	<br>

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
		$(document).ready(function(){
			$('.listado').reorder({
				'initialtop': 20,
				'extratop': 15,
				'selector': '.listado article',
				'wait': 300,
				'wrapperselector': '.listado',
			});
		})
	</script>

</div>