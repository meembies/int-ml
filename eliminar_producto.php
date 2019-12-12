<?php
session_start();
require 'Meli/meli.php';
require 'configApp.php';

$appiD='8407250558779943';

$secretkey= 'QerrXVT1UpeHEbspNFGMNfiPuhJFt0ei';
$meli = new Meli($appiD, $secretkey);


$body = array("deleted"=>"true",);


$params = array('access_token' => "APP_USR-8407250558779943-121214-7f07eccb864ed62b844e36f6a48022eb-464115657");
         
$response = $meli->put('/items/MLA821154701', $body, $params); 
  //$response = $meli->post('/items', $body, $params);
echo json_encode($response);
  
  ?>
