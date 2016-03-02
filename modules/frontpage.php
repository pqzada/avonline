<?php
$ofertas = Oferta::findAllFrontPage();
?>

<title>Avispate ONLINE - Las mejores ofertas a sólo un click</title>

<div class="frontpage">

	<br>

	<? foreach($ofertas as $oferta) : ?>

		<article class="col-xs-12 col-sm-4 col-md-3">
			<a href="<?=$oferta["url_interna"]?>" onclick="window.open('<?=$oferta["url_externa"]?>')">				
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>">
				</div>
				<h3><?=$oferta["titulo"]?></h3>
				<p><?=$oferta["descripcion"]?></p>
			</a>
		</article>


	<? endforeach; ?>

</div>