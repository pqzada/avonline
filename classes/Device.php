<?php

class Device {

	public static function isMobile() {

		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if( preg_match('/iPhone|Android/',$useragent) ) {
			return true;
		}
		return false;
		
	}

}

?>