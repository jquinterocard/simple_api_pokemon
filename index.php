<?php 

 include 'objects/pokemon.php';
 include 'config/database.php';

 $db = new Database();
 $pdo = $db->getConnection();

$p = new Pokemon($pdo);

$p->id = 1;
$p->image = "https://www.smogon.com/dex/media/sprites/xy/abomasnow.gif";
$p->name = "charmander";
$p->type = "fire/fly";
$p->abilities = "Fuego";
$p->tier = "oU";

$p->create();

