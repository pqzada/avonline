<?php
$ofertas = Oferta::findAllFrontPage();
?>

<title>Avispate ONLINE! - Las mejores ofertas a sólo un click</title>

<div class="frontpage listado">

	<br>

	<? $idx = 1; ?>
	<? foreach($ofertas as $oferta) : ?>

		<article class="col-xs-12 col-sm-4 col-md-3">
			<a href="<?=$oferta["url_interna"]?>">				
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>" class="img-rounded">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
			</a>
			<p><?=$oferta["descripcion"]?></p>			
		</article>

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