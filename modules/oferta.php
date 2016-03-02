<?php
$url = "/" . $_GET["categoria"] . "/" . $_GET["oferta"];
$oferta = Oferta::findByUrl($url);

// Categorias
$categoriasOferta = Categoria::findForOferta($oferta["id"]);
foreach($categoriasOferta as $co) {
	$oferta["categorias"][] = Categoria::findById($co["id_categoria"]);
}

// Tags
$tags = Tag::findForOferta($oferta["id"]);
foreach($tags as $tag) {
	$oferta["tags"][] = Tag::findById($tag["id_tag"]);
}

if( $oferta["id_estado"] == "DESACTIVADA" ) {

	$similares = array();
	foreach($oferta["categorias"] as $oc) {
		$tmp = Oferta::findAllForCategoria($oc["id"]);
		$similares = array_merge($similares, $tmp);
	}

}

?>

<div class="oferta">
	<div class="page-header">
		<h1><?=$oferta["titulo"]?></h1>
	</div>

	<div class="col-md-4">
		<img src="<?=$oferta["imagen"]?>" style="width:100%;">
	</div>

	<div class="col-md-8">
		<p><?=$oferta["descripcion"]?></p>

		<div class="meta">
			<label>Categorias</label>
			<? foreach($oferta["categorias"] as $categoria): ?>
				<h2><a href="/<?=$categoria["id"]?>"><?=$categoria["nombre"]?></a></h2>
			<? endforeach; ?>

			<br>

			<label>Tags</label>
			<? foreach($oferta["tags"] as $tag): ?>
				<h3><a href="/tag/<?=$tag["id"]?>"><?=$tag["nombre"]?></a></h3>
			<? endforeach; ?>
		</div>

		<hr>

		<? if($oferta["id_estado"] == "PUBLICADA"): ?>
			<a href="<?=$oferta["url_externa"]?>" class="btn btn-primary" rel="no-follow" target="_blank">Visitar oferta</a>
		<? endif; ?>

		<? if($oferta["id_estado"] == "DESACTIVADA"): ?>
			<h4>Oferta no vigente<br><small>Revisa las siguientes ofertas similares</small></h4>
	
			<? foreach($similares as $s) : ?>
				<article class="col-xs-12 col-sm-4 col-md-3">
					<a href="<?=$s["url_interna"]?>" onclick="window.open('<?=$s["url_externa"]?>')">				
						<div class="thumbnail">
							<img src="<?=$s["imagen"]?>">
						</div>
						<h5><?=$s["titulo"]?></h5>
					</a>
				</article>
			<? endforeach; ?>

		<? endif; ?>
	</div>
</div>