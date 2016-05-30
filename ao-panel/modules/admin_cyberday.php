<?php

$categorias = Categoria::findAll();
$empresas = Empresa::findAll();
$editar = false;

/**
 * EDITAR cyberday UPDATE
 */
if( isset($_POST["editar"]) ) {

	$cyberdayMod = new Cyberday($_POST);
	if( $cyberdayMod->update() ) {

		$cyberday_id = $cyberdayMod->getcyberdayId();

		Categoria::register($_POST["categoria"], $cyberday_id);

		if( isset($_FILES["imagen"]) && !is_null($_FILES["imagen"]["name"]) && $_FILES["imagen"]["name"] != "" ) {
			cyberday::deleteImagen($cyberday_id);
			$image_url = Imagen::uploadWithFolder($_FILES["imagen"], $cyberday_id, 'cyberday');
			$cyberdayMod->updateImagen($image_url);
		}

		$cyberday = Cyberday::findById($cyberday_id);
		$result = Facebook::debug('http://www.avispateonline.cl' . $cyberday['url_interna']);
		
	} else {
		echo "<pre>";
		print_r($cyberdayMod->getErrors());
		echo "</pre>";
	}

}

/**
 * ELIMINAR cyberday
 */
if( isset($_GET["eliminar"]) && !is_null($_GET["eliminar"]) ) {
	Cyberday::delete($_GET["eliminar"]);
	Categoria::deleteCategoriacyberday($_GET["eliminar"]);
}

/**
 * DESACTIVAR cyberday
 */
if( isset($_GET["desactivar"]) && !is_null($_GET["desactivar"]) ) {
	Cyberday::desactivate($_GET["desactivar"]);
}

/**
 * PUBLICAR cyberday
 */
if( isset($_GET["publicar"]) && !is_null($_GET["publicar"]) ) {
	Cyberday::publish($_GET["publicar"]);
}

/**
 * NUEVA cyberday
 */
if( isset($_POST['publicar']) ) {

	$cyberday = new Cyberday($_POST);
	if( $cyberday->save() ) {

		$cyberday_id = $cyberday->getcyberdayId();

		Categoria::register($_POST["categoria"], $cyberday_id);

		$image_url = Imagen::uploadWithFolder($_FILES["imagen"], $cyberday_id, 'cyberday');
		$cyberday->updateImagen($image_url);

		$cyberday = Cyberday::findById($cyberday_id);
		$result = Facebook::debug('http://www.avispateonline.cl' . $cyberday['url_interna']);
		
	} else {
		echo "<pre>";
		print_r($cyberday->getErrors());
		echo "</pre>";
	}

}


/**
 * LISTADO cyberdayS
 */
$results = Cyberday::findAll();

/**
 * EDITAR cyberday FORM
 */
if( isset($_GET["id"]) ) {

	$cyberday = Cyberday::findById($_GET["id"]);

	// Categorias
	$categoriascyberday = Categoria::findForCyberday($cyberday["id"]);
	foreach($categoriascyberday as $co) {
		$cyberday["categorias"][] = $co["id_categoria"];
	}

	$editar = true;
}

?>

<div id="empresas">

	<div class="page-header">
		<h1>Productos Cyberday</h1>
	</div>
	
	<div class="col-md-4">
		<h2><?=(!$editar)?"Nuevo":"Editar"?> Producto</h2>
		<form action="" method="POST" class="form" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Título</label>
				<input type="text" class="form-control" name="titulo" placeholder="Titulo" value="<?=($editar)?$cyberday["titulo"]:""?>">
			</div>
			<div class="form-group">
				<label class="form-label">Descripción</label>
				<textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción"><?=($editar)?$cyberday["descripcion"]:""?></textarea>
			</div>

			<div class="form-group">
				<label class="form-label">Precio antes</label>
				<input type="text" name="precio_antes" class="form-control" value="<?=($editar)?$cyberday["precio_antes"]:""?>">
			</div>

			<div class="form-group">
				<label class="form-label">Precio ahora</label>
				<input type="text" name="precio_ahora" class="form-control" value="<?=($editar)?$cyberday["precio_ahora"]:""?>">
			</div>

			<div class="form-group">
				<label class="form-label">Imagen</label>
				<input type="file" name="imagen" class="form-control">
				<? if($editar): ?>
					<small><em>Ingresa una nueva imagen en caso de que quieras eliminar la actual</em></small>
					</div>
					<div class="form-group">
					<label class="form-label">Imagen actual</label>					
					<img src="<?=$cyberday["imagen"]?>" class="thumbnail">
				<? endif; ?>
			</div>

			<div class="form-group">
				<label class="form-label">URL Cliente</label>
				<input type="text" class="form-control" name="url_externa" value="<?=($editar)?$cyberday["url_externa"]:"http://"?>">
			</div>

			<div class="form-group">
				<label class="form-label">Categorías</label>
				<select multiple class="form-control" name="categoria[]">
					<?php foreach($categorias as $categoria) : ?>
						<option value="<?=$categoria['id']?>" <?=($editar && in_array($categoria["id"], $cyberday["categorias"]))?"selected":""?>>
							<?=$categoria['nombre']?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label class="form-label">Empresa</label>
				<select class="form-control" name="empresa">
					<option value="">Selecciona</option>
					<?php foreach($empresas as $empresa) : ?>
						<option value="<?=$empresa['id']?>" <?=($editar && $cyberday["id_empresa"]==$empresa["id"])?"selected":""?>>
							<?=$empresa['nombre']?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<? if($editar) : ?>
				<div class="form-group">
					<label class="form-label">Estado</label>
					<select class="form-control" name="estado">
						<option value="PUBLICADA" <?=($cyberday["id_estado"]=="PUBLICADA")?"selected":""?>>Publicada</option>
						<option value="DESACTIVADA" <?=($cyberday["id_estado"]=="DESACTIVADA")?"selected":""?>>Desactivada</option>
					</select>
				</div>

				<input type="hidden" name="url_interna" value="<?=$cyberday["url_interna"]?>">
				<input type="hidden" name="actual_imagen" value="<?=$cyberday["imagen"]?>">
				<input type="hidden" name="id" value="<?=$cyberday["id"]?>">

				<input type="submit" class="btn btn-primary" name="editar" value="Modificar">
			<? endif; ?>

			<? if(!$editar) : ?>
				<input type="submit" class="btn btn-primary" name="publicar" value="Publicar">
			<? endif; ?>
		</form>
	</div>


	<div class="col-md-8">
		<h2>Productos registrados</h2>
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Categoría</th>
					<th>Titulo</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<? foreach($results as $r): ?>
					<tr>
						<td><?=$r['id']?></td>
						<td><?=$r['titulo']?></td>
						<td>
							<button onclick="editar(<?=$r['id']?>)" class="btn btn-default btn-md" data-toggle="tooltip" data-placement="top" title="Editar">
								<i class="glyphicon glyphicon-edit"></i>
							</button>

							<? if($r["id_estado"] == "PUBLICADA"): ?>
								<button onclick="desactivar(<?=$r['id']?>)" class="btn btn-default btn-md" data-toggle="tooltip" data-placement="top" title="Desactivar">
									<i class="glyphicon glyphicon-eye-close"></i>
								</button>
							<? endif; ?>

							<? if($r["id_estado"] != "PUBLICADA"): ?>
								<button onclick="publicar(<?=$r['id']?>)" class="btn btn-default btn-md" data-toggle="tooltip" data-placement="top" title="Publicar">
									<i class="glyphicon glyphicon-eye-open"></i>
								</button>
							<? endif; ?>

							&nbsp;&nbsp;

							<button onclick="eliminar(<?=$r['id']?>)" class="btn btn-danger btn-md" data-toggle="tooltip" data-placement="top" title="Eliminar">
								<i class="glyphicon glyphicon-trash"></i>
							</button>
						</td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>

</div>

<script type="text/javascript">
	
$(document).ready(function() {

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});

});

function editar(id) {
	document.location = "/ao-panel/?mod=cyberday&id=" + id;
}

function productos(id) {
	document.location = "/ao-panel/?mod=productos&id_cyberday=" + id;
}

function desactivar(id) {
	document.location = "/ao-panel/?mod=cyberdays&desactivar=" + id;
}

function publicar(id) {
	document.location = "/ao-panel/?mod=cyberdays&publicar=" + id;
}

function eliminar(id) {
	if(confirm("¿Estás seguro que deseas eliminar el producto?")) {
		document.location = "/ao-panel/?mod=cyberdays&eliminar=" + id;
	}
}

</script>