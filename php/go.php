<?php
	
	/**
	 
	 The monkey that does the work
	 
	 **/
	
	if (isset($_GET['k'])) {
		
		$ClientSalt = $_GET['k'];
		settype($ClientSalt, "string");
		$ClientSalt = substr($ClientSalt,0,128); // Anti-Buffer-Overflow protection... maybe?
		
	}
	
	if (isset($_GET['dhcp'])) {
		
		$dhcpPreference = $_GET['dhcp'];
		settype($dhcpPreference, "integer"); 
		
		if ($dhcpPreference = 1) {
			
			$DHCP = true;
			
		} else {
			
			$DHCP = false;
		}
		
	} else {
		
		$DHCP = false;
		
	}
	
	if (!$DHCP) {
		if (getenv(HTTP_X_FORWARDED_FOR)) {
			$IP = getenv(HTTP_X_FORWARDED_FOR);
		} else {
			$IP = getenv(REMOTE_ADDR);
		}
	}
	
	header("Content-Type: text/plain");
	
	echo "$ClientSalt \n";
	
	if ($DHCP) {
		echo "DHCP = on \n";
	} else {
		echo "DHCP = off \n";
		echo "$IP \n";
	}
	
	?>