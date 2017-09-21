<?php

class Session{
	
	private $signedIn = false;
	public $userId;
	
	function __construct(){
		session_start();
		$this->checkTheLogin();
	}
	
	public function isSignedIn(){
		return $this->signedIn;
	}
	
	public function login($user){
		if($user){
			$this->userId = $_SESSION['userId'] = $user->id;
		}
	}
	
	private function checkTheLogin(){
		if(isset($_SESSION['userId'])){
			$this->userId = $_SESSION['userId'];
			$this->signedIn = true;
		}
		else{
			unset($this->userId);
			$this->signedIn = false;
		}
	}
	
}

$session = new Session();

?>