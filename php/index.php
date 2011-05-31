<?php
	
	/**
	 
		Secret Key - Key Generation for the Cloud?
	 
	 **/
	
	if (!file_exists("./config.php")) { 
		
		require_once("./setup.php"); // If no Config - run setup
		exit;
		
	}
	
	if (isset($_GET['k'])) {
		
		require_once("./go.php");
		
	} else {
		
		require_once("./welcome.php");
	}
	
	?>
