<?php

class Categoria {

	public static function findAll() {

		global $db;

		$stmt = $db->query('SELECT * FROM categoria');
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;

	}

	public static function findForOferta($id) {

		global $db;

		$sql = "SELECT id_categoria FROM oferta_categoria WHERE id_oferta = $id";
		$stmt = $db->query($sql);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;

	}

	public static function findById($id) {

		global $db;

		$sql = "SELECT * FROM categoria WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

	}

	public static function deleteCategoriaOferta($oferta_id) {

		global $db;

		$sql = "DELETE FROM oferta_categoria WHERE id_oferta =  :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id_oferta', $oferta_id);   
		$stmt->execute();

	}

	public static function register($categorias, $oferta_id) {

		global $db;

		Categoria::deleteCategoriaOferta($oferta_id);

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