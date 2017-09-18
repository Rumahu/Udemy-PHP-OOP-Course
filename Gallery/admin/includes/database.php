<?php

require_once("newConfig.php");

class Database{
	public $connection;
	
	function __construct(){
		$this->open_db_connection();
	}
	
	public function open_db_connection(){
		$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		if(mysqli_connect_errno()){
			die("Database connection failed" . mysqli_error());
		}		
	}
	
	public function query($sql){
		$result = mysqli_query($this->connection, $sql);
		
		
		return $result;
	}
	
	private function confirmQuery($result){
		if(!$result){
			die("DB Query failed.");
		}
	}
	
	public function escapeString($string){
		return mysqli_real_escape_string($this->connection, $string);		
	}

}

$database = new Database();

?>