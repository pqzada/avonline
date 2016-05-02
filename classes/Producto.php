<?php

class Producto {

	protected $data;
	protected $id;
	protected $errors;

	public function __construct($data) {
		$this->data = $data;
	}

	public function save() {

		global $db;

		$sql = "INSERT INTO producto (id_oferta, nombre, descripcion) VALUES (:id_oferta, :nombre, :descripcion)";
		$stmt = $db->prepare($sql);

		$stmt->bindParam(":id_oferta", $this->data["id_oferta"]);
		$stmt->bindParam(":nombre", $this->data["nombre"]);
		$stmt->bindParam(":descripcion", $this->data["descripcion"]);		
		$result = $stmt->execute();

		if( $result ) {
			$this->id = $db->lastInsertId();
			return true;
		} else {
			$this->errors = $stmt->errorInfo();
			return false;
		}

	}

	public function update() {

		global $db;

		$sql = "UPDATE producto SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
		$stmt = $db->prepare($sql);

		$stmt->bindParam(":nombre", $this->data["nombre"]);
		$stmt->bindParam(":descripcion", $this->data["descripcion"]);
		$stmt->bindParam(":id", $this->data["id"]);

		$result = $stmt->execute();

		if( $result ) {
			$this->id = $this->data["id"];
			return true;
		} else {
			$this->errors = $stmt->errorInfo();
			return false;
		}

	}

	public static function deleteImagen($id) {

		global $upload_images_folder;
		unlink($upload_images_folder . "/productos/$id.png");

	}

	public static function delete($id) {

		global $db;		

		// Delete imagen
		Producto::deleteImagen($id);

		// Delete oferta
		$sql = "DELETE FROM producto WHERE id = :id_producto";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_producto", $id);
		$stmt->execute();

	}

	public function updateImagen($imagen_url) {

		global $db;

		$sql = "UPDATE producto SET imagen = '$imagen_url' WHERE id = :id_producto";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_producto", $this->id);
		$stmt->execute();

	}

	public static function findAll() {

		global $db;

		$stmt = $db->query("SELECT * FROM producto ORDER BY id DESC");
		if($stmt !== false) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$results = array();
		}

		return $results;
		
	}

	public static function findById($id) {

		global $db;

		$stmt = $db->query("SELECT * FROM producto WHERE id = $id");
		if($stmt !== false) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = array();
		}

		return $result;

	}

	public static function findByOfertaId($id_oferta) {

		global $db;

		$stmt = $db->query("SELECT * FROM producto WHERE id_oferta = $id_oferta ORDER BY id DESC");
		if($stmt !== false) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$results = array();
		}

		return $results;

	}

	public function getProductoId() {
		return $this->id;
	}

	public function getErrors() {
		return $this->errors;
	}

}

?>