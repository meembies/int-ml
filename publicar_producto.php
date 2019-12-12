<?php

session_start();
require 'Meli/meli.php';
require 'configApp.php';

$appiD='8407250558779943';

$secretkey= 'QerrXVT1UpeHEbspNFGMNfiPuhJFt0ei';
$meli = new Meli($appiD, $secretkey);

            $body = array(
              "condition" => "new", 
              "warranty" => "60 dias", 
              "currency_id" => "ARS", 
              "accepts_mercadopago" => true, 
              "description" => "Lindo Ray_Ban_Original_Wayfarer", 
              "listing_type_id" => "bronze", 
              "title" => "oculos ", 
              "available_quantity" => 64, 
              "price" => 289,  
              "buying_mode" => "buy_it_now", 
             "category_id"=> "MLA3530",
              "pictures" => array(
                array(
                  "source" => "http://upload.wikimedia.org/wikipedia/commons/f/fd/Ray_Ban_Original_Wayfarer.jpg"
                ), 
                array(
                  "source" => "http://en.wikipedia.org/wiki/File:Teashades.gif"
                )
              )
            );
            $params = array('access_token' => "APP_USR-8407250558779943-121214-7f07eccb864ed62b844e36f6a48022eb-464115657");
          
          $response = $meli->post('/items', $body, $params);
echo json_encode($response);
    
 



