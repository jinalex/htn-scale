<?php
require_once 'autoload.php';
$sample_item = new FirebaseItem(array(
	'item_name' => 'hi')
);

//Push
FirebasePusher::push_item($sample_item);

