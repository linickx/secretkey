<?php

	/**
	 
		Set up Script.
	 
	 **/
	
	$n = mt_rand();
	$randomstring = base_convert($n, 10, 36);
	$ProviderSalt = hash('sha256', $randomstring);
	
	echo $ProviderSalt;
	
	#if (!$handle = fopen("./config.php", 'a')) {
	#	echo "Cannot write file (config.php)";
	#}
	
	
	?>