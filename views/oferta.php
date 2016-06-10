<div class="oferta container">

	<div class="page-header row">
		<div class="col-xs-12 col-sm-9 col-xs-12">
			<h1><?=$oferta["titulo"]?></h1>
		</div>
		<div class="col-xs-12 col-sm-3 hidden-xs">
			<? if($oferta["id_estado"] == "PUBLICADA"): ?>
				<a href="<?=$oferta["url_externa"]?>" class="btn btn-danger btn-lg pull-right" rel="no-follow" target="_blank">Visitar oferta</a>
			<? endif; ?>
		</div>
	</div>

	<div class="row">

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

			<p><?=nl2br($oferta["descripcion"])?>.</p>	

			<? if(count($productos) > 0): ?>

				<? foreach($productos as $producto): ?>
					<div class="producto">

						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="<?=$producto["imagen"]?>" alt="<?=$producto["nombre"]?>">
							</div>
							<div class="media-body">
								<h4 class="media-heading"><?=$producto["nombre"]?></h4>
								<?=nl2br($producto["descripcion"])?>
							</div>
						</div>						

					</div>
				<? endforeach; ?>

			<? endif; ?>

			<? if($oferta["id_estado"] == "PUBLICADA"): ?>
				<div class="revisa row">
					<div class="col-xs-12">
						<a href="<?=$oferta["url_externa"]?>" class="btn btn-primary pull-right hidden-xs" rel="no-follow" target="_blank">Revisa estos y más productos...</a>
						<a href="<?=$oferta["url_externa"]?>" class="btn btn-lg btn-success pull-right visible-xs btn-block" rel="no-follow" target="_blank">VISITAR OFERTA</a>
					</div>
				</div>
			<? endif; ?>

			<div class="row">
				<div class="col-xs-12">
					<div class="fb-like" data-href="http://www.avispateonline.cl<?=$oferta["url_interna"]?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				</div>
				<br><br>
			</div>

			<div class="meta row">
				<div class="col-xs-12 col-sm-6">
					<label>Categorias</label>
					<? foreach($oferta["categorias"] as $categoria): ?>
						<h2><a href="/<?=$categoria["id"]?>"><?=$categoria["nombre"]?></a></h2>
					<? endforeach; ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<label>Tags</label>
					<? foreach($oferta["tags"] as $tag): ?>
						<h3><?=$tag["nombre"]?></h3>
					<? endforeach; ?>
				</div>
			</div>

			<br><br>

			<? if($oferta["id_estado"] == "DESACTIVADA"): ?>
				<h4>Oferta no vigente<br><!-- <small>Revisa las siguientes ofertas similares</small> --></h4>
			<? else: ?>
				<!-- <h4>Revisa las siguientes ofertas similares</small></h4> -->
			<? endif; ?>
		
			<div class="row similares">
				<? $idx = 0; ?>
				<? foreach($similares as $s) : ?>
					<article class="col-xs-12">
						<div class="media">
							<div class="media-left">
								<a href="<?=$s["url_interna"]?>">
									<img class="media-object" src="<?=$s["imagen"]?>" alt="<?=$s["titulo"]?>">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?=$s["url_interna"]?>"><?=$s["titulo"]?></a></h4>
								<?=$s["descripcion"]?>
							</div>
						</div>		
					</article>
					<? if($idx++ == 3) break; ?>
				<? endforeach; ?>
			</div>

		</div>
	</div>
</div>