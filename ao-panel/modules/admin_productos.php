<?php

$editar = false;

if(!isset($_GET['id_oferta']) || (isset($_GET['id_oferta']) && !is_numeric($_GET['id_oferta'])) ) {
	header('HTTP/1.0 403 Forbidden');
	die;
} else {
	$id_oferta = $_GET['id_oferta'];
}

$oferta = Oferta::findById($id_oferta);

/**
 * EDITAR PRODUCTO
 */
if( isset($_POST["editar"]) ) {

	$productoMod = new Producto($_POST);
	if( $productoMod->update() ) {

		$producto_id = $productoMod->getProductoId();

		if( isset($_FILES["imagen"]) && !is_null($_FILES["imagen"]["name"]) && $_FILES["imagen"]["name"] != "" ) {
			Producto::deleteImagen($producto_id);
			$image_url = Imagen::uploadWithFolder($_FILES["imagen"], $producto_id, 'productos');
			$productoMod->updateImagen($image_url);
		}
		
	} else {
		echo "<pre>";
		print_r($productoMod->getErrors());
		echo "</pre>";
	}

}

/**
 * AGREGAR PRODUCTO
 */
if( isset($_POST['agregar']) ) {

	$producto = new Producto($_POST);
	if( $producto->save() ) {

		$producto_id = $producto->getProductoId();
		$image_url = Imagen::uploadWithFolder($_FILES["imagen"], $producto_id, 'productos');
		$producto->updateImagen($image_url);
		
	} else {
		echo "<pre>";
		print_r($producto->getErrors());
		echo "</pre>";
	}

}

/**
 * ELIMINAR PRODUCTO
 */
if( isset($_GET["eliminar"]) && !is_null($_GET["eliminar"]) ) {
	Producto::delete($_GET["eliminar"]);
}

/**
 * EDITAR PRODUCTO FORM
 */
if(isset($_GET["id"])) {
	$producto = Producto::findById($_GET["id"]);
	$editar = true;
}

/**
 * LISTADO PRODUCTOS
 */
$results = Producto::findByOfertaId($id_oferta);

?>

<div id="empresas">

	<div class="page-header">
		<h1>Productos</h1>
		<h4>OFERTA: <i><?=$oferta["titulo"]?></i></h4>
	</div>
	
	<div class="col-md-4">
		<h2><?=(!$editar)?"Nuevo":"Editar"?> producto</h2>
		<form action="" method="POST" class="form" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?=($editar)?$producto["nombre"]:""?>">
			</div>
			<div class="form-group">
				<label class="form-label">Descripción</label>
				<textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción"><?=($editar)?$producto["descripcion"]:""?></textarea>
			</div>

			<div class="form-group">
				<label class="form-label">Imagen</label>
				<input type="file" name="imagen" class="form-control">
				<? if($editar): ?>
					<small><em>Ingresa una nueva imagen en caso de que quieras eliminar la actual</em></small>
					</div>
					<div class="form-group">
					<label class="form-label">Imagen actual</label>					
					<img src="<?=$producto["imagen"]?>" class="thumbnail">
				<? endif; ?>
			</div>

			<input type="hidden" name="id_oferta" value="<?=$id_oferta?>">

			<? if($editar) : ?>
				<input type="hidden" name="actual_imagen" value="<?=$producto["imagen"]?>">
				<input type="hidden" name="id" value="<?=$producto["id"]?>">
				<input type="submit" class="btn btn-primary" name="editar" value="Modificar">
			<? endif; ?>

			<? if(!$editar) : ?>
				<input type="submit" class="btn btn-primary" name="agregar" value="Agregar">
			<? endif; ?>
		</form>
	</div>


	<div class="col-md-8">
		<h2>Productos registrados</h2>
		<button onclick="nuevo(<?=$id_oferta?>)" class="btn btn-primary pull-right">Nuevo</button>
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<? foreach($results as $r): ?>
					<tr>
						<td><?=$r['id']?></td>
						<td><img src="<?=$r['imagen']?>" class="thumbnail col-xs-12"></td>
						<td><?=$r['nombre']?></td>
						<td><?=$r['descripcion']?></td>
						<td>
							<button onclick="editar(<?=$id_oferta?>, <?=$r['id']?>)" class="btn btn-default btn-md" data-toggle="tooltip" data-placement="top" title="Editar">
								<i class="glyphicon glyphicon-edit"></i>
							</button>

							<button onclick="eliminar(<?=$id_oferta?>, <?=$r['id']?>)" class="btn btn-danger btn-md" data-toggle="tooltip" data-placement="top" title="Eliminar">
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

function editar(id_oferta, id) {
	document.location = "/ao-panel/?mod=productos&id=" + id + "&id_oferta=" + id_oferta;
}

function eliminar(id_oferta, id) {
	if(confirm("¿Estás seguro que deseas eliminar el producto?")) {
		document.location = "/ao-panel/?mod=productos&eliminar=" + id + "&id_oferta=" + id_oferta;
	}
}

function nuevo(id_oferta) {
	document.location = "/ao-panel/?mod=productos&id_oferta=" + id_oferta;
}

</script>