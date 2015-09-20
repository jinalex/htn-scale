<?php
abstract class FirebaseFactory {

}

class FirebaseService {
	const DEFAULT_URL = 'https://crackling-torch-9164.firebaseio.com/';
	const DEFAULT_TOKEN = 'YsXKsnwJ62qEbhtyCJnJSKXfI3MjuKAHSsuMAqsO';
	const DEFAULT_PATH = '/';
	const ROOT_PATH = '/';

	public static $firebase_instance = null; //To avoid connection pooling

	public static function fireConnection() {
		if (is_null(self::$firebase_instance)) {
			self::$firebase_instance = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
		}
		return self::$firebase_instance;
	}

	public static function stdClassToArray(stdClass $object) {
		$array = array();
		foreach ($object as $attribute=>$val) {
			$array[$attribute] = $val;
		}
		return $array;
	}
}


class FirebasePusher {
	/*
	All helper services related to pushing items to the firebase server
	*/
	public static function push_item(FirebaseItem $item) {
		$fireInstance = FirebaseService::fireConnection();
		$writeableArray = $item->__toArray();

		//Write the data
		$fireInstance->set(FirebaseService::DEFAULT_PATH . $writeableArray['item_name'], $writeableArray);
	}
}


class FirebasePuller {
	/*
	Pulls Information from the firebase db
	*/
	public static function pull_all() {
		$fireInstance = FirebaseService::fireConnection();
		$all_data = json_decode($fireInstance->get(FirebaseService::ROOT_PATH));
		$firebaseStack = new FirebaseCollection();
		if ($all_data) {
			foreach ($all_data as $key=>$item) {
				// $item = FirebaseService::stdClassToArray(array(
				// 	'upc' => $item->upc)
				// );
				$item = new FirebaseItem(array(
					'upc' => $item->upc)
				);
				// $item = new FirebaseItem(array(
				// 	'upc' => $item)
				// );
				$firebaseStack->push($item);
			}
		}
		return $firebaseStack;
	}
}
