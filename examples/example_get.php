<?php
require '../Meli/meli.php';
require '../configApp.php';

$meli = new Meli('2316858615340026','TMgbXRPXAA8p3hO9CdaionHhDXgjsRoU');


$params = array();

$url = '/sites/' . $siteId;

$result = $meli->get($url, $params);

echo '<pre>';
print_r($result);
echo '</pre>';


