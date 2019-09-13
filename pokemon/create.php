<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;charset=UTF-8");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/pokemon.php';

$database = new Database();
$db = $database->getConnection();

$pokemon = new Pokemon($db);

$data = json_decode(file_get_contents("php://input"));


if(!empty($data->image)&& !empty($data->name) && !empty($data->type) && !empty($data->abilities)){

	$pokemon->image = $data->image;
	$pokemon->name = $data->name;
	$pokemon->type = $data->type;
	$pokemon->abilities = $data->abilities;
	$pokemon->tier = $data->tier;

	if($pokemon->create()){
		//Set response 201 created
		http_response_code(201);

		echo json_encode(array(
			"message"=>"Pokemon was created."
		));
	}else{
		//Response 503 service unavailable
		http_response_code(503);
		echo json_encode(array(
			"message"=>"Unable to create pokemon"
		));
	}

}else{
	// Data incomplete 400 bad request
	http_response_code(400);
	echo json_encode(array(
		"message"=>"Unable to create pokemon. Data is incomplete"
	));
}

