<?php
$ofertas = Oferta::findAllFrontPage();
?>

<div class="frontpage">

	<? foreach($ofertas as $oferta) : ?>

		<article class="col-xs-12 col-sm-4 col-md-3">
			<a href="<?=$oferta["url_interna"]?>" onclick="window.open('<?=$oferta["url_externa"]?>')">
				<h3><?=$oferta["titulo"]?></h3>
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>">
				</div>
				<p><?=$oferta["descripcion"]?></p>
			</a>
		</article>


	<? endforeach; ?>

</div>