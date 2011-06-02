<?php

	/**
	 
		Set up Script.
	 
	 **/
	
	$n = mt_rand();
	$randomstring = base_convert($n, 10, 36);
	$ProviderSalt = hash('sha256', $randomstring);
	
	$ConfigString = '<?php $ProviderSalt = "';
	$ConfigString .= $ProviderSalt;
	$ConfigString .= '" ?>;';
	
	if (!$handle = fopen("../data/config.php", 'a')) {
		die('cannot write config.php');

	}
	
	if(!fwrite($handle,$ConfigString)) {
		die('cannot save config.php');
	} 

	require_once("./welcome.php");
	
	?>