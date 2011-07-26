<?php
	
	/**
	 
		Secret Key - Key Generation for the Cloud?
	 
	 **/
	
	
	if (!file_exists("../../data/config.php")) { 
		
		require_once("./setup.php"); // If no Config - run setup
		exit;
		
	} else {
		require_once("../../data/config.php"); // require our config file
	}
	
	if (isset($_GET['k'])) {
		
		require_once("./go.php"); // Run the App
		
	} else {
		
		require_once("./welcome.php"); // Hello World!
	}
	
	?>
