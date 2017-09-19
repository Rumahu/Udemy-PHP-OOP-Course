<?php

class User{
	
	public $id;
	public $username;
	public $password;
	public $first_name; // Inconsistent naming style.. but it has to match the DB? 
	public $last_name; // DB doesn't care about capitalization - so camel case is out.
	
	public static function findAllUsers(){
		return self::findThisQuery("SELECT * FROM users");
	}
	
	public static function findUserById($id){
		$resultArray = self::findThisQuery("SELECT * FROM users WHERE users.id = $id LIMIT 1");
		return !empty($resultArray) ? array_shift($resultArray) : false;
	}
	
	public static function findThisQuery($sql){
		global $database;
		$result = $database->query($sql);
		$objectArray = array();
		
		while($row = mysqli_fetch_array($result)){
			$objectArray[] = self::instantiation($row);
		}
		return $objectArray;
	}
	
	// This method is really weird - why not just use a constructor??
	// You don't use it because it has to check all of the incoming keys?
	public static function instantiation($foundUser){
		$object = new self;
		
		foreach($foundUser as $attribute => $value){
			if($object->hasAttribute($attribute)){
				$object->$attribute = $value;
			}
		}
		
		return $object;
	}
	
	private function hasAttribute($attribute){
		$objectProperties = get_object_vars($this);
		return array_key_exists($attribute, $objectProperties);
	}
}

?>