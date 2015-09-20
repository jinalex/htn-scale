	<?php
header("Content-Type: application/json");
$request = file_get_contents('php://input');
$data = json_decode($request);
$upc = $data->upc;
$url = 'http://eandata.com/lookup/';
$html = file_get_contents($url . $upc);
$product_name = explode('title', $html)[1];
$product_name = trim(explode(' - ', $product_name)[1], '</');
http_response_code(200);
echo json_encode(array(
	'item_name' => $product_name,
	'upc' => $upc
), JSON_PRETTY_PRINT);