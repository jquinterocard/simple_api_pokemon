<?php 


class Pokemon{

	private $conn;
	private $table_name = 'pokemon';

	public $id;
	public $image;
	public $name;
	public $type;
	public $abilities;
	public $tier;

	public function __construct($db){
		$this->conn = $db;
	}


 	//Create pokemon
	function create(){
		$query = "INSERT INTO ".$this->table_name." SET image=:image,name=:name,type=:type,abilities=:abilities,tier=:tier";

		$stmt = $this->conn->prepare($query);

 		//Sanitize
		$this->image = filter_var($this->image,FILTER_SANITIZE_URL);
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->type = htmlspecialchars(strip_tags($this->type));
		$this->abilities = htmlspecialchars(strip_tags($this->abilities));
		$this->tier = htmlspecialchars(strip_tags(strtoupper($this->tier)));

		$stmt->bindParam(":image",$this->image);
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":type",$this->type);
		$stmt->bindParam(":abilities",$this->abilities);
		$stmt->bindParam(":tier",$this->tier);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	function update(){
		$query = "UPDATE ".$this->table_name." 
				 SET 
					image=:image,name=:name,type=:type,abilities=:abilities,tier=:tier
				 WHERE id=:id
		";

		$stmt = $this->conn->prepare($query);

 		//Sanitize
 		$this->id = htmlspecialchars(strip_tags($this->id));
		$this->image = filter_var($this->image,FILTER_SANITIZE_URL);
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->type = htmlspecialchars(strip_tags($this->type));
		$this->abilities = htmlspecialchars(strip_tags($this->abilities));
		$this->tier = htmlspecialchars(strip_tags(strtoupper($this->tier)));

		$stmt->bindParam(":image",$this->image);
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":type",$this->type);
		$stmt->bindParam(":abilities",$this->abilities);
		$stmt->bindParam(":tier",$this->tier);
		$stmt->bindParam(":id",$this->id);

		if($stmt->execute()){
			return true;
		}
		return false;
	}



	function search($keywords){
		$query = "SELECT image,name,type,abilities,tier FROM pokemon WHERE name LIKE ? ORDER BY name ASC";
		$stmt=$this->conn->prepare($query);
 		//Sanitize
		$keywords = htmlspecialchars(strip_tags($keywords));
		$keywords = "%{$keywords}%";
		$stmt->bindParam(1,$keywords);
		$stmt->execute();
		return $stmt;
	}


}
