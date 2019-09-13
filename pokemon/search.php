<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/pokemon.php';

$database = new Database();
$db = $database->getConnection();

$pokemon = new Pokemon($db);

$keywords = isset($_GET['search'])?$_GET['search']:'';

$stmt = $pokemon->search($keywords);
$num = $stmt->rowCount();

if($num>0){
	$pokemon_arr = array();
	$pokemon_arr['records'] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    	extract($row);

    	$pkm = array(
    		"image"=>$image,
    		"name"=>$name,
    		"type"=>$type,
    		"abilities"=>$abilities,
    		"tier"=>$tier
    	);

    	array_push($pokemon_arr['records'], $pkm);
    }

    http_response_code(200);
    echo json_encode($pokemon_arr);


}else{
	http_response_code(404);
	echo json_encode(array(
		"message"=>"No pokemons found."
	));
}

