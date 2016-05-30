<div class="oferta container cyberday">

	<div class="page-header row">
		<div class="col-xs-12 col-sm-9">
			<h1><?=$oferta["titulo"]?></h1>
		</div>
		<div class="col-xs-12 col-sm-3">
			<? if($oferta["id_estado"] == "PUBLICADA"): ?>
				<a href="<?=$oferta["url_externa"]?>" class="btn btn-success btn-lg pull-right btn-block" rel="no-follow" target="_blank">Visitar oferta</a>
			<? endif; ?>
		</div>
	</div>

	<div class="row">

		<div class="col-sm-4">

			<img src="<?=$oferta["imagen"]?>" style="width:100%;">
			
			<br><br><br>

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

			<h4>Antes: <?=$oferta['precio_antes']?></h4>
			<h3 style="color:red;">AHORA: <?=$oferta['precio_ahora']?></h3>
			<p><?=nl2br($oferta["descripcion"])?>.</p>

			<div class="row">
				<div class="col-xs-12">
					<div class="fb-like" data-href="http://www.avispateonline.cl<?=$oferta["url_interna"]?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				</div>
				<br><br>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-3 pull-right">
					<? if($oferta["id_estado"] == "PUBLICADA"): ?>
						<a href="<?=$oferta["url_externa"]?>" class="btn btn-success btn-lg pull-right btn-block" rel="no-follow" target="_blank">Visitar oferta</a>
					<? endif; ?>
				</div>
			</div>

			<br><br>

			<? if($oferta["id_estado"] == "DESACTIVADA"): ?>
				<h4>Oferta no vigente<br><!-- <small>Revisa las siguientes ofertas similares</small> --></h4>
			<? else: ?>
				<!-- <h4>Revisa las siguientes ofertas similares</small></h4> -->
			<? endif; ?>

		</div>
	</div>
</div>