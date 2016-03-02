<?php

$categorias = Categoria::findAll();
$empresas = Empresa::findAll();
$editar = false;

/**
 * EDITAR OFERTA UPDATE
 */
if( isset($_POST["editar"]) ) {

	$ofertaMod = new Oferta($_POST);
	if( $ofertaMod->update() ) {

		$oferta_id = $ofertaMod->getOfertaId();

		Categoria::register($_POST["categoria"], $oferta_id);
		Tag::register($_POST["tags"], $oferta_id);

		if( isset($_FILES["imagen"]) ) {
			Oferta::deleteImagen($oferta_id);
			$image_url = Imagen::upload($_FILES["imagen"], $oferta_id);
			$ofertaMod->updateImagen($image_url);
		}
		
	} else {
		echo "<pre>";
		print_r($ofertaMod->getErrors());
		echo "</pre>";
	}

}

/**
 * ELIMINAR OFERTA
 */
if( isset($_GET["eliminar"]) && !is_null($_GET["eliminar"]) ) {
	Oferta::delete($_GET["eliminar"]);
	Categoria::deleteCategoriaOferta($_GET["eliminar"]);
	Tag::deleteTagOferta($_GET["eliminar"]);
}

/**
 * DESACTIVAR OFERTA
 */
if( isset($_GET["desactivar"]) && !is_null($_GET["desactivar"]) ) {
	Oferta::desactivate($_GET["desactivar"]);
}

/**
 * PUBLICAR OFERTA
 */
if( isset($_GET["publicar"]) && !is_null($_GET["publicar"]) ) {
	Oferta::publish($_GET["publicar"]);
}

/**
 * NUEVA OFERTA
 */
if( isset($_POST['publicar']) ) {

	$oferta = new Oferta($_POST);
	if( $oferta->save() ) {

		$oferta_id = $oferta->getOfertaId();

		Categoria::register($_POST["categoria"], $oferta_id);
		Tag::register($_POST["tags"], $oferta_id);

		$image_url = Imagen::upload($_FILES["imagen"], $oferta_id);
		$oferta->updateImagen($image_url);
		
	} else {
		echo "<pre>";
		print_r($oferta->getErrors());
		echo "</pre>";
	}

}


/**
 * LISTADO OFERTAS
 */
$results = Oferta::findAll();

/**
 * EDITAR OFERTA FORM
 */
if( isset($_GET["id"]) ) {

	$oferta = Oferta::findById($_GET["id"]);

	// Categorias
	$categoriasOferta = Categoria::findForOferta($oferta["id"]);
	foreach($categoriasOferta as $co) {
		$oferta["categorias"][] = $co["id_categoria"];
	}
	
	// Tags
	$tags = Tag::findForOferta($oferta["id"]);
	foreach($tags as $tag) {
		$oferta["tags"][] = Tag::findNombreById($tag["id_tag"])["nombre"];
	}
	$oferta["tags"] = implode(", ", $oferta["tags"]);

	$editar = true;
}

?>

<div id="empresas">

	<div class="page-header">
		<h1>Ofertas</h1>
	</div>
	
	<div class="col-md-4">
		<h2><?=(!$editar)?"Nueva":"Editar"?> oferta</h2>
		<form action="" method="POST" class="form" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Título</label>
				<input type="text" class="form-control" name="titulo" placeholder="Titulo" value="<?=($editar)?$oferta["titulo"]:""?>">
			</div>
			<div class="form-group">
				<label class="form-label">Descripción</label>
				<textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción"><?=($editar)?$oferta["descripcion"]:""?></textarea>
			</div>

			<div class="form-group">
				<label class="form-label">Inicio de publicación</label>
				<input type="date" name="fecha_inicio" class="form-control" value="<?=($editar)?$oferta["fecha_inicio"]:""?>">
			</div>

			<div class="form-group">
				<label class="form-label">Término de publicación</label>
				<input type="date" name="fecha_fin" class="form-control" value="<?=($editar)?$oferta["fecha_fin"]:""?>">
			</div>

			<div class="form-group">
				<label class="form-label">Imagen</label>
				<input type="file" name="imagen" class="form-control">
				<? if($editar): ?>
					<small><em>Ingresa una nueva imagen en caso de que quieras eliminar la actual</em></small>
					</div>
					<div class="form-group">
					<label class="form-label">Imagen actual</label>					
					<img src="<?=$oferta["imagen"]?>" class="thumbnail">
				<? endif; ?>
			</div>

			<div class="form-group">
				<label class="form-label">URL Cliente</label>
				<input type="text" class="form-control" name="url_externa" value="<?=($editar)?$oferta["url_externa"]:"http://"?>">
			</div>

			<div class="form-group">
				<label class="form-label">Categorías</label>
				<select multiple class="form-control" name="categoria[]">
					<?php foreach($categorias as $categoria) : ?>
						<option value="<?=$categoria['id']?>" <?=($editar && in_array($categoria["id"], $oferta["categorias"]))?"selected":""?>>
							<?=$categoria['nombre']?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label class="form-label">Tags</label>
				<input type="text" class="form-control" name="tags" placeholder="Tag1, tag2, tag3" value="<?=($editar)?$oferta["tags"]:""?>">
			</div>

			<div class="form-group">
				<label class="form-label">Empresa</label>
				<select class="form-control" name="empresa">
					<option value="">Selecciona</option>
					<?php foreach($empresas as $empresa) : ?>
						<option value="<?=$empresa['id']?>" <?=($editar && $oferta["id_empresa"]==$empresa["id"])?"selected":""?>>
							<?=$empresa['nombre']?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<? if($editar) : ?>
				<div class="form-group">
					<label class="form-label">Estado</label>
					<select class="form-control" name="estado">
						<option value="PUBLICADA" <?=($oferta["id_estado"]=="PUBLICADA")?"selected":""?>>Publicada</option>
						<option value="DESACTIVADA" <?=($oferta["id_estado"]=="DESACTIVADA")?"selected":""?>>Desactivada</option>
					</select>
				</div>

				<input type="hidden" name="url_interna" value="<?=$oferta["url_interna"]?>">
				<input type="hidden" name="actual_imagen" value="<?=$oferta["imagen"]?>">
				<input type="hidden" name="id" value="<?=$oferta["id"]?>">

				<input type="submit" class="btn btn-primary" name="editar" value="Modificar">
			<? endif; ?>

			<? if(!$editar) : ?>
				<input type="submit" class="btn btn-primary" name="publicar" value="Publicar">
			<? endif; ?>
		</form>
	</div>


	<div class="col-md-8">
		<h2>Ofertas registradas</h2>
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
	document.location = "/ao-panel/?mod=ofertas&id=" + id;
}

function desactivar(id) {
	document.location = "/ao-panel/?mod=ofertas&desactivar=" + id;
}

function publicar(id) {
	document.location = "/ao-panel/?mod=ofertas&publicar=" + id;
}

function eliminar(id) {
	if(confirm("¿Estás seguro que deseas eliminar la oferta?")) {
		document.location = "/ao-panel/?mod=ofertas&eliminar=" + id;
	}
}

</script>