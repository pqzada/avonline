<?php

class Oferta {

	protected $data;
	protected $id;
	protected $errors;

	public function __construct($data) {
		$this->data = $data;
	}

	public function save() {

		global $db;

		$url_interna = "/" . $this->data["categoria"][0] . "/" . Slug::create($this->data["titulo"]);
		$id_estado = "PUBLICADA";

		$sql = "INSERT INTO oferta (titulo, descripcion, fecha_inicio, fecha_fin, url_externa, url_interna, id_empresa, id_estado) 
				VALUES (:titulo, :descripcion, :fecha_inicio, :fecha_fin, :url_externa, :url_interna, :id_empresa, :id_estado)";
		$stmt = $db->prepare($sql);

		$stmt->bindParam(":titulo", $this->data["titulo"]);
		$stmt->bindParam(":descripcion", $this->data["descripcion"]);
		$stmt->bindParam(":fecha_inicio", $this->data["fecha_inicio"]);
		$stmt->bindParam(":fecha_fin", $this->data["fecha_fin"]);
		$stmt->bindParam(":url_externa", $this->data["url_externa"]);
		$stmt->bindParam(":url_interna", $url_interna);
		$stmt->bindParam(":id_empresa", $this->data["empresa"]);
		$stmt->bindParam(":id_estado", $id_estado);
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

		$sql = "UPDATE oferta SET titulo = :titulo, descripcion = :descripcion, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, url_externa = :url_externa, url_interna = :url_interna, id_empresa = :id_empresa, id_estado = :id_estado WHERE id = :id";
		$stmt = $db->prepare($sql);

		$stmt->bindParam(":titulo", $this->data["titulo"]);
		$stmt->bindParam(":descripcion", $this->data["descripcion"]);
		$stmt->bindParam(":fecha_inicio", $this->data["fecha_inicio"]);
		$stmt->bindParam(":fecha_fin", $this->data["fecha_fin"]);
		$stmt->bindParam(":url_externa", $this->data["url_externa"]);
		$stmt->bindParam(":url_interna", $this->data["url_interna"]);
		$stmt->bindParam(":id_empresa", $this->data["empresa"]);
		$stmt->bindParam(":id_estado", $this->data["estado"]);
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
		unlink($upload_images_folder . "/$id.png");

	}

	public static function delete($id) {

		global $db;		

		// Delete imagen
		Oferta::deleteImagen($id);

		// Delete oferta
		$sql = "DELETE FROM oferta WHERE id = :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_oferta", $id);
		$stmt->execute();

	}

	public static function desactivate($id) {

		global $db;

		$sql = "UPDATE oferta SET id_estado = 'DESACTIVADA' WHERE id = :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_oferta", $id);
		$stmt->execute();
		
	}

	public static function publish($id) {

		global $db;

		$sql = "UPDATE oferta SET id_estado = 'PUBLICADA' WHERE id = :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_oferta", $id);
		$stmt->execute();
		
	}

	public function updateImagen($imagen_url) {

		global $db;

		$sql = "UPDATE oferta SET imagen = '$imagen_url' WHERE id = :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_oferta", $this->id);
		$stmt->execute();

	}

	public static function findAll() {

		global $db;

		$stmt = $db->query("SELECT * FROM oferta ORDER BY id DESC");
		if($stmt !== false) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$results = array();
		}

		return $results;
		
	}

	public static function findAllFrontPage() {

		global $db;

		$stmt = $db->query('SELECT * FROM oferta WHERE id_estado = "PUBLICADA" AND fecha_inicio <= now() AND fecha_fin >= now() ORDER BY id DESC');
		if($stmt !== false) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$results = array();
		}

		return $results;
		
	}

	public static function findAllForCategoria($categoria) {

		global $db;

		$stmt = $db->prepare('SELECT o.* FROM oferta o, oferta_categoria oc WHERE id_estado = "PUBLICADA" AND fecha_inicio <= now() AND fecha_fin >= now() AND o.id = oc.id_oferta AND oc.id_categoria = :categoria ORDER BY id DESC');
		$stmt->bindParam(":categoria", $categoria);
		$stmt->execute();

		if($stmt !== false) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$results = array();
		}

		return $results;
		
	}

	public static function findById($id) {

		global $db;

		$stmt = $db->query("SELECT * FROM oferta WHERE id = $id");
		if($stmt !== false) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = array();
		}

		return $result;

	}

	public static function findByUrl($url) {

		global $db;

		$stmt = $db->prepare("SELECT * FROM oferta WHERE url_interna = :url");
		$stmt->bindParam(":url", $url);
		$stmt->execute();

		if($stmt !== false) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = array();
		}

		return $result;

	}

	public function getOfertaId() {
		return $this->id;
	}

	public function getErrors() {
		return $this->errors;
	}

}

?>