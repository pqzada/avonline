<?php
$ofertas = Oferta::findAllForCategoria($_GET["categoria"]);
$categoria = Categoria::findById($_GET["categoria"]);
?>

<title><?=$categoria["titulo"]?> | Avispate ONLINE!</title>

<div class="categoria listado">

	<div class="page-header">
		<h1><?=$categoria["nombre"]?></h1>
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

	<script type="text/javascript">

		// function callReorder() {
		// 	$('.listado').reorder({
		// 		'initialtop': 50,
		// 		'extratop': 15,
		// 		'selector': '.listado article',
		// 		'wait': 1000,
		// 		'wrapperselector': '.listado'				
		// 	});
		// }

		// $(document).ready(function() {

		// 	callReorder();
		// 	setTimeout(function() {
		// 		callReorder()
		// 	}, 3000);
			
		// })
	</script>

</div>