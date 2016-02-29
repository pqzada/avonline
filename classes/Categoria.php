<?php

class Categoria {

	public static function findAll() {
		global $db;
		$stmt = $db->query('SELECT * FROM categoria');
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

}

?>