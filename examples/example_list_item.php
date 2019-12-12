<?php
session_start();

require '../Meli/meli.php';
require '../configApp.php';

$meli = new Meli ('2316858615340026','TMgbXRPXAA8p3hO9CdaionHhDXgjsRoU');;


if($_GET['code']) {

	// If the code was in get parameter we authorize
	$user = $meli->authorize($_GET['code'],"http:://" );

	// Now we create the sessions with the authenticated user
	$_SESSION['access_token'] = $user['body']->access_token;
	$_SESSION['expires_in'] = $user['body']->expires_in;
	$_SESSION['refresh_token'] = $user['body']->refresh_token;

	// We can check if the access token in invalid checking the time
	if($_SESSION['expires_in'] + time() + 1 < time()) {
		try {
			print_r($meli->refreshAccessToken());
		} catch (Exception $e) {
			echo "Exception: ",  $e->getMessage(), "\n";
		}
	}


	 // We construct the item to POST
   $item = array(
        "title" => "Item De Teste - Por Favor, No Ofertar! --kc:off",
        "category_id" => "MLA1000",
        "price" => 30,
        "currency_id" => "ARS",
        "available_quantity" => 1,
        "buying_mode" => "buy_it_now",
        "listing_type_id" => "free",
        "condition" => "new",
        "description" => array ("plain_text" => "Item de Teste. Mercado Livre's PHP SDK."),
        "video_id" => "RXWn6kftTHY",
        "warranty" => "12 month",
        "pictures" => array(
            array(
                "source" =>  "http://resources.mlstatic.com/category/images/6fc20d84-2ce6-44ee-8e7e-e5479a78eab0.png"
            )
           
        ),
        "attributes" => array(
            
        )
    );
	
	// We call the post request to list a item
	echo '<pre>';
	print_r($meli->post('/items', $item, array('access_token' =>  "APP_USR-2316858615340026-101712-904931097676c8c91455852779d641a2-464115657")));
	echo '</pre>';

} else {

	echo '<a href="' . $meli->getAuthUrl($redirectURI, Meli::$AUTH_URL['MLA']) . '">Login using MercadoLibre oAuth 2.0</a>';
}

