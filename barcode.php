<?php

require('../lib/Semantics3.php');
 
$key = 'SEM33D47130F8AF27E9E47879C4E57E10D23';
$secret = 'MDI1ODdhZTY2ZTYyYzA1OTExZDFmNmQxNjBiNDM5Y2Y';
$requestor = new Semantics3_Products($key,$secret);
 
$requestor->products_field("upc", "068274000218");
$results = $requestor->get_products();
echo $results;