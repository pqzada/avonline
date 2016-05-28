<?php

class Facebook {

	public static function debug($url) {

	    $ch = curl_init();
	          curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v1.0/?id='. urlencode($url). '&scrape=1');
	          curl_setopt($ch, CURLOPT_POST, 1);
	          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $r = curl_exec($ch);
	    return $r;

	}
}

?>