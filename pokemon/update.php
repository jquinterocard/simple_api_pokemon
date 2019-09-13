<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config/database.php';
include_once '../objects/pokemon.php';

$database = new Database();
$db = $database->getConnection();

$pokemon = new Pokemon($db);

$data = json_decode(file_get_contents("php://input"));



if(!empty($data->id)){

	// Set id property of pokemon to be edited
	$pokemon->id = $data->id;

	// set pokemon property values
	$pokemon->image = $data->image;
	$pokemon->name = $data->name;
	$pokemon->type = $data->type;
	$pokemon->abilities = $data->abilities;
	$pokemon->tier = $data->tier;

	if($pokemon->update()){
		http_response_code(200);
		echo json_encode(array("message"=>"Pokemon was updated."));
	}else{
		http_response_code(503);
		echo json_encode(array("message"=>"Unable to update the pokemon."));
	}

}else{
	http_response_code(400);
	echo json_encode(array(
		"message"=>"Id is required."
	));
}


