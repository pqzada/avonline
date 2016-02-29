<?php

$categorias = Categoria::findAll();
$empresas = Empresa::findAll();

// Nueva oferta
if( isset($_POST['crear']) ) {
	if( isset($_POST['nombre']) ) {
		$query = "INSERT INTO empresa VALUES ('" . Slug::create($_POST['nombre']) . "', '" . $_POST['nombre'] . "')";
		$db->exec($query);
	}
}

// Listado de ofertas
$stmt = $db->query('SELECT * FROM oferta');
if($stmt !== false) {
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
	$results = array();
}

// Eliminar ofertas

// Editar oferta

?>

<div id="empresas">

	<div class="page-header">
		<h1>Ofertas</h1>
	</div>
	
	<div class="col-md-4">
		<h2>Nueva oferta</h2>
		<form action="" method="POST" class="form">
			<div class="form-group">
				<label class="form-label">Título</label>
				<input type="text" class="form-control" name="titulo" placeholder="Titulo">
			</div>
			<div class="form-group">
				<label class="form-label">Descripción</label>
				<textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción"></textarea>
			</div>

			<div class="form-group">
				<label class="form-label">Inicio de publicación</label>
				<input type="date" name="fecha_inicio" class="form-control">
			</div>

			<div class="form-group">
				<label class="form-label">Término de publicación</label>
				<input type="date" name="fecha_fin" class="form-control">
			</div>

			<div class="form-group">
				<label class="form-label">Imagen</label>
				<input type="file" name="imagen" class="form-control">
			</div>

			<div class="form-group">
				<label class="form-label">URL Cliente</label>
				<input type="text" class="form-control" name="url_externa" value="http://">
			</div>

			<div class="form-group">
				<label class="form-label">Categorías</label>
				<select multiple class="form-control" name="empresa">
					<?php foreach($categorias as $categoria) : ?>
						<option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label class="form-label">Tags</label>
				<input type="text" class="form-control" name="tags" placeholder="Tag1, tag2, tag3">
			</div>

			<div class="form-group">
				<label class="form-label">Empresa</label>
				<select class="form-control" name="empresa">
					<option value="">Selecciona</option>
					<?php foreach($empresas as $empresa) : ?>
						<option value="<?=$empresa['id']?>"><?=$empresa['nombre']?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</form>
	</div>


	<div class="col-md-8">
		<h2>Ofertas registradas</h2>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<? foreach($results as $r): ?>
					<tr>
						<td><?=$r['id']?></td>
						<td><?=$r['nombre']?></td>
						<td>Eliminar Editar</td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</div>

</div>