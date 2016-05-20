<div class="frontpage listado">

	<br>
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