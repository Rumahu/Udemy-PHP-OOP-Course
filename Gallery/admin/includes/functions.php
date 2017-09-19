<?php

	// A new function that is recommended over __autoload() in the php.net doc. 	
	spl_autoload_register(function($class){
		$class = strtolower($class);
		
		$classPath = "includes/{$class}.php";
		
		if(is_file($classPath) && !class_exists($class)){
			include($classPath);
		}
	});
	
?>