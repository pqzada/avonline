<?php

class Tag {

	public static function register($tag_list, $oferta_id) {

		global $db;

		$tag_list = str_replace(", ", ",", $tag_list);
		$tag_list = explode(",", $tag_list);

		// Delete all first
		Tag::delete_tag_oferta($oferta_id);

		foreach($tag_list as $nombre) {

			// Normalizo Tag
			$tag = Tag::find_by_nombre($nombre);
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

	public static function find_by_nombre($nombre) {

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

	public static function delete_tag_oferta($oferta_id) {

		global $db;

		$sql = "DELETE FROM oferta_tag WHERE id_oferta =  :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id_oferta', $oferta_id);   
		$stmt->execute();

	}


}

?>