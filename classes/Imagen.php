<?php

class Imagen {

	/**
	 * @param FILE $file
	 * @return mixed URL Imagen or FALSE
	 */
	public static function upload($image, $filename) {

		global $upload_images_folder;
		global $upload_images_path;

		$extension = pathinfo($image["name"],PATHINFO_EXTENSION);
		$target_file = $upload_images_folder . "/" . $filename . "." . $extension;
		$target_url = $upload_images_path . "/" . $filename . "." . $extension;

		// Delete if exists
		if( file_exists($target_file) ) {
			unlink($target_file);
		}

		// Upload
		if( move_uploaded_file($image["tmp_name"], $target_file) ) {
			return $target_url;
		} else {
			return false;
		}

	}

	public static function uploadWithFolder($image, $filename, $folder) {

		global $upload_images_folder;
		global $upload_images_path;

		$extension = pathinfo($image["name"],PATHINFO_EXTENSION);
		$target_file = $upload_images_folder . "/" . $folder . "/" . $filename . "." . $extension;
		$target_url = $upload_images_path . "/" . $folder . "/" . $filename . "." . $extension;

		// Delete if exists
		if( file_exists($target_file) ) {
			unlink($target_file);
		}

		// Upload
		if( move_uploaded_file($image["tmp_name"], $target_file) ) {
			return $target_url;
		} else {
			return false;
		}

	}

	public static function getImageData($imageUrl) {

		$data = getimagesize($imageUrl);
		return array(
			'url' => $imageUrl,
			'width' => $data[0],
			'height' => $data[1],
		);
		
	}

}

?>
