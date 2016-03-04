<?php
$ofertas = Oferta::findAllForCategoria($_GET["categoria"]);
$categoria = Categoria::findById($_GET["categoria"]);
?>

<title><?=$categoria["titulo"]?> | Avispate ONLINE!</title>

<div class="categoria listado">

	<div class="page-header">
		<h1><?=$categoria["nombre"]?></h1>
	</div>

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

</div>