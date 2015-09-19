<?php
header("Content-Type: application/json");
require_once 'autoload.php';
$all_items = FirebasePuller::pull_all();
http_response_code(200);
echo json_encode($all_items, JSON_PRETTY_PRINT);
?>