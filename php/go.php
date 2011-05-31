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
		
	}
	
	header("Content-Type: text/plain");
	
	echo "$ClientSalt \n";
	
	if ($DHCP) {
		echo "DHCP = on \n";
	} else {
		echo "DHCP = off \n";
	}
	?>