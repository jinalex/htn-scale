<?php
header("Content-Type: application/json");
require_once 'autoload.php';
echo json_encode(FirebasePuller::pull_history(), JSON_PRETTY_PRINT);