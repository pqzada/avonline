<?php

class Tag {

	public static function register($tag_list, $oferta_id) {

		global $db;

		$tag_list = str_replace(", ", ",", $tag_list);
		$tag_list = explode(",", $tag_list);

		// Delete all first
		Tag::deleteTagOferta($oferta_id);

		foreach($tag_list as $nombre) {

			// Normalizo Tag
			$tag = Tag::findByNombre($nombre);
			if($tag === false) {
				$tag = Tag::save($nombre);
			} 

			// Inserto TagOferta
			$sql = "INSERT INTO oferta_tag VALUES (:id_oferta, :id_tag)";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id_oferta", $oferta_id);
			$stmt->bindParam(":id_tag", $tag["id"]);
			$stmt->execute();

		}

	}

	public static function findByNombre($nombre) {

		global $db;

		$stmt = $db->query("SELECT * FROM tag WHERE nombre LIKE '$nombre'");
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if( count($results) == 0 ) {	
			return false;
		}

		return $results[0];

	}

	public static function save($nombre) {

		global $db;

		$query = "INSERT INTO tag VALUES ('" . Slug::create($nombre) . "', '" . $nombre . "')";
		$db->exec($query);

		return array("id" => Slug::create($nombre), "nombre" => $nombre);

	}

	public static function deleteTagOferta($oferta_id) {

		global $db;

		$sql = "DELETE FROM oferta_tag WHERE id_oferta =  :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id_oferta', $oferta_id);   
		$stmt->execute();

	}

	public static function findForOferta($id) {

		global $db;

		$sql = "SELECT id_tag FROM oferta_tag WHERE id_oferta = $id";
		$stmt = $db->query($sql);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;

	}

	public static function findNombreById($id) {

		global $db;

		$sql = "SELECT nombre FROM tag WHERE id = '$id'";
		$stmt = $db->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

	}

	public static function findById($id) {

		global $db;

		$sql = "SELECT * FROM tag WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;

	}

	public static function findAll() {

		global $db;

		$sql = "SELECT * FROM tag ORDER BY nombre ASC";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}


}

?>