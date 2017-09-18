<?php

require_once("newConfig.php");

class Database{
	public $connection;
	
	function __construct(){
		$this->open_db_connection();
	}
	
	public function open_db_connection(){
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		if($this->connection->connect_errno){
			die("Database connection failed " . $this->connection->connect_error);
		}		
	}
	
	public function query($sql){
		$result = $this->connection->query($sql);
		
		$this->confirmQuery($result);
		
		return $result;
	}
	
	private function confirmQuery($result){
		if(!$result){
			die("DB Query failed " . $this->connection->error);
		}
	}
	
	public function escapeString($string){
		return $this->connection->real_escape_string($string);	
	}
	
	public function theInsertId(){
		return $this->connection->insert_id;
	}

}

$database = new Database();

?>