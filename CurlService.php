<?php
class CurlService {
	const API_KEY = '2dc59b3d2cb753e358142911d6ec1054';

	public static $curl_instance = null;

	public static function curlConnection() {
		if (is_null(self::$curl_instance)) {
			//Create the new curl instance
			self::$curl_instance = curl_init();
		}
		return self::$curl_instance;
	}
}