<?php
class CurlService {
	public static $curl_instance = null;

	public static function curlConnection() {
		if (is_null($curl_instance)) {
			//Create the new curl instance
			self::$curl_instance = curl_init();
		}
		return self::$curl_instance;
	}
}