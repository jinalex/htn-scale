<?php
class Item {
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
		$this->sale = (is_bool($args['sale'])) ? $arg['sale'] : false;
		$this->item_name = $args['item_name'];
		$this->item_image = $args['item_image'];
	}
}