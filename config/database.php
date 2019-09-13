<?php 

class Database{
	private $host = 'localhost';
	private $db_name = 'pokemon_db';
	private $username = 'root';
	private $password = '';
	public $conn;

	public function getConnection(){
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->username,$this->password);
			
			
		} catch (PDOException $e) {
			echo "connection error: ".$e->getMessage()." in ".$e->getLine();
		}
		return $this->conn;
	}

}
