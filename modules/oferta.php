<?php
date_default_timezone_set('America/Santiago');

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

$productos = Producto::findByOfertaId($oferta["id"]);

$similares = array();
foreach($oferta["categorias"] as $oc) {
	$tmp = Oferta::findAllForCategoria($oc["id"]);
	foreach($tmp as $t) {
		if($t["id"] != $oferta["id"]) {
			$similares[$t["id"]] = $t;
		}
	}
}

if(date('Y-m-d') > $oferta['fecha_fin']) {
	$oferta['id_estado'] = 'DESACTIVADA';
}

?>

<title><?=$oferta["titulo"]?></title>

<div class="oferta container">
	<div class="page-header">
		<h1><?=$oferta["titulo"]?></h1>
	</div>

	<div class="col-sm-4">
		<img src="<?=$oferta["imagen"]?>" style="width:100%;">
		
		<br><br>

		<? if($oferta['id_estado'] == 'PUBLICADA')  : ?>
			<article class=" banner">
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
	</div>

	<div class="col-sm-8">
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
			<a href="<?=$oferta["url_externa"]?>" class="btn btn-danger btn-lg pull-right" rel="no-follow" target="_blank">Visitar oferta</a>
		<? endif; ?>

		<? if(count($productos) > 0): ?>
			<h2>Algunos productos que encontrarás...</h2>

			<? foreach($productos as $producto): ?>
				<div class="producto row">
					<div class="producto-imagen col-xs-2 thumbnail">	
						<img src="<?=$producto["imagen"]?>">
					</div>
					<div class="producto-info col-xs-10">
						<h3><?=$producto["nombre"]?></h3>
						<p><?=$producto["descripcion"]?></p>
					</div> 
				</div>
			<? endforeach; ?>

		<? endif; ?>

		<? if($oferta["id_estado"] == "PUBLICADA"): ?>
			<div class="row">
				<a href="<?=$oferta["url_externa"]?>" class="btn btn-primary btn-lg pull-right" rel="no-follow" target="_blank">Revisa estos y más productos...</a>
			</div>
		<? endif; ?>

		<? if($oferta["id_estado"] == "DESACTIVADA"): ?>
			<h4>Oferta no vigente<br><small>Revisa las siguientes ofertas similares</small></h4>
		<? else: ?>
			<h4>Revisa las siguientes ofertas similares</small></h4>
		<? endif; ?>
	
		<div class="row similares">
			<? foreach($similares as $s) : ?>
				<article class="col-xs-12">
					<div class="media">
						<div class="media-left">
							<a href="<?=$s["url_interna"]?>">
								<img class="media-object" src="<?=$s["imagen"]?>" alt="<?=$s["titulo"]?>">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><a href="<?=$oferta["url_interna"]?>"><?=$s["titulo"]?></a></h4>
							<?=$s["descripcion"]?>
						</div>
					</div>		
				</article>
			<? endforeach; ?>
		</div>	

	</div>
</div>