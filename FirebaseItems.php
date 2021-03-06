<?php
class FirebaseCollection implements JsonSerializable {
	/*
	Some stack that holds return data from firebase
	*/
	public function __construct() {
		$this->items = array();
	}

	public function push(FirebaseItem $item_to_push) {
		array_push($this->items, $item_to_push);
		return true;
	}

	public function pop() {
		return array_pop($this->items);
	}

	public function __toArray() {
		return $this->items;
	}

	public function jsonSerialize() {
		return $this->__toArray();
	}
}


class FirebaseItem implements JsonSerializable {
	public $upc, $weight, $where_to_buy, $sale, $item_name, $item_images;

	public static $defaults = array(
		'upc' => null,
		'weight' => null,
		'where_to_buy' => null,
		'sale' => false,
		'item_name' => null,
		'item_image' => null
	);

	public function __construct(array $args = array()) {
		$defaults = self::$defaults;
		$args = array_merge($defaults, $args);

		$this->upc = $args['upc'];
		$this->weight = $args['weight'];
		$this->where_to_buy = $args['where_to_buy'];
		$this->sale = (is_bool($args['sale'])) ? $args['sale'] : false;
		$this->item_name = $args['item_name'];
		$this->item_image = $args['item_image'];
	}

	public function __toArray() {
		$array = array();
		foreach ($this as $attribute=>$value) {
			$array[$attribute] = $value;
		}
		return $array;
	}

	public function jsonSerialize() {
		return $this->__toArray();
	}
}