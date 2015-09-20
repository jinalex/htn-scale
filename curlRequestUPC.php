<?php
require_once 'CurlService.php';
$ch = CurlService::curlConnection();
$apiKey = CurlService::API_KEY;
$gtin = '060383049645';
curl_setopt($ch, CURLOPT_URL, "https://api.outpan.com/v1/products/$gtin");
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
echo curl_exec($ch);
curl_close($ch);