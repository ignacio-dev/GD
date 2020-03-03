<?php
	
	// Load Config File
	require_once('back/config/config.php');

	// Load Classes
	spl_autoload_register(function($class) {
		$path = "back/classes/{$class}.php";
		$path = str_replace('\\', '/', $path);
		require_once($path);
	});