<?php

class Admin {

	public static function validateAccess() {
		if(!isset($_COOKIE["aoline"])) {
		    return false;
		} else {
		    if($_COOKIE["aoline"] == "pyv1102") {
		    	return true;
		    }
		}
	}
	
}

?>