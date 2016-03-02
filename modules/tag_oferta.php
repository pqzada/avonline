<?php
$ofertas = Oferta::findAllForTag($_GET["tag"]);
$tag = Tag::findById($_GET["tag"]);
?>

<div class="page-header">
	<h1><?=$tag["nombre"]?></h1>
</div>

<div class="tag">

	<? foreach($ofertas as $oferta) : ?>

		<article class="col-xs-12 col-sm-4 col-md-3">
			<a href="<?=$oferta["url_interna"]?>">				
				<div class="thumbnail">
					<img src="<?=$oferta["imagen"]?>">
				</div>
				<h2><?=$oferta["titulo"]?></h2>
				<p><?=$oferta["descripcion"]?></p>
				<? if($oferta["id_estado"] == "DESACTIVADA") : ?>
					<p>NO VIGENTE</p>
				<? endif; ?>
			</a>
		</article>


	<? endforeach; ?>

</div>