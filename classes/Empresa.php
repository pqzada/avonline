<?php

class Empresa {

	public static function findAll() {
		global $db;
		$stmt = $db->query('SELECT * FROM empresa');
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

}

?>