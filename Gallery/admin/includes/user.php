<?php

class User{
	
	public static function findAllUsers(){
		global $database; // TODO: Check and see if the course removed this global variable!!
		return $database->query("SELECT * FROM users");
	}
	
	public static function findUserById($id){
		global $database;
		$result = $database->query("SELECT * FROM users WHERE users.id = $id LIMIT 1");
		return mysqli_fetch_array($result);
	}
}

?>