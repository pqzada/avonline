<?php
$ofertas = Oferta::findAllForCategoria($_GET["categoria"]);
$categoria = Categoria::findById($_GET["categoria"]);
?>

<div class="page-header">
		<h1><?=$categoria["nombre"]?></h1>
	</div>

<div class="categoria">

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