<?php
$ofertas = Oferta::findAllForTag($_GET["tag"]);
$tag = Tag::findById($_GET["tag"]);
?>

<title>Descuentos en <?=$tag["nombre"]?> | Avispate ONLINE!</title>

<div class="tag listado">

	<div class="page-header">
		<h1><?=$tag["nombre"]?></h1>
	</div>

	<? $idx = 1; ?>

	<? foreach($ofertas as $oferta) : ?>

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