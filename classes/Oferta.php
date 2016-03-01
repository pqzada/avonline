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

	public function updateImagen($imagen_url) {

		global $db;

		$sql = "UPDATE oferta SET imagen = '$imagen_url' WHERE id = :id_oferta";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":id_oferta", $this->id);
		$stmt->execute();

	}

	public function getOfertaId() {
		return $this->id;
	}

	public function getErrors() {
		return $this->errors;
	}

}

?>