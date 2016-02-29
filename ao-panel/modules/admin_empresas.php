<?php

// Nueva empresa
if( isset($_POST['crear']) ) {
	if( isset($_POST['nombre']) ) {
		$query = "INSERT INTO empresa VALUES ('" . Slug::create($_POST['nombre']) . "', '" . $_POST['nombre'] . "')";
		$db->exec($query);
	}
}

// Listado de empresas
$stmt = $db->query('SELECT * FROM empresa');
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Eliminar empresas

?>

<div id="empresas">

	<div class="page-header">
		<h1>Empresas</h1>
	</div>
	
	<div class="col-md-3">
		<h2>Nueva empresa</h2>
		<form action="" method="POST" class="form-inline">
			<input type="text" class="form-control" name="nombre" placeholder="Nombre">
			<button type="submit" class="btn btn-default" name="crear">Crear</button>
		</form>
	</div>


	<div class="col-md-9">
		<h2>Empresas registradas</h2>
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