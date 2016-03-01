<?php

class Categoria {

	public static function findAll() {

		global $db;

		$stmt = $db->query('SELECT * FROM categoria');
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;

	}

	public static function register($categorias, $oferta_id) {

		global $db;

		foreach($categorias as $categoria) {
			$sql = "INSERT INTO oferta_categoria VALUES (:id_oferta, :id_categoria)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id_oferta", $oferta_id);
			$stmt->bindParam(":id_categoria", $categoria);
			$stmt->execute();
		}

	}

}

?>