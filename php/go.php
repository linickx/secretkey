<?php
	
	/**
	 
	 The monkey that does the work
	 
	 **/
	
	if (isset($_GET['k'])) { // Mandatory Component 1 - The clients secret salt.
		
		$ClientSalt = $_GET['k'];
		settype($ClientSalt, "string");
		$ClientSalt = substr($ClientSalt,0,128); // Anti-Buffer-Overflow protection... maybe?
		
	}
	
	if (isset($_GET['dhcp'])) { // Optional Component - The clients IP Address
		
		$dhcpPreference = $_GET['dhcp'];
		settype($dhcpPreference, "integer"); // numbers only, 1 = on ... anything else = off.
		
		if ($dhcpPreference = 1) {
			
			$DHCP = true;
			
		} else {
			
			$DHCP = false;
		}
		
	} else {
		
		$DHCP = false;
		
	}
	
	if (!$DHCP) {
		if (getenv(HTTP_X_FORWARDED_FOR)) { // Proxy Server Detection/
			$IP = getenv(HTTP_X_FORWARDED_FOR); // Proxy
		} else {
			$IP = getenv(REMOTE_ADDR); // No Proxy.
		}
	}
	
	
		// Mandatory Component 2 - The Clients User Agent String.
	$UserAgent = getenv(HTTP_USER_AGENT);
	$Numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
	$UserAgent = str_replace($Numbers, '', $UserAgent); // We strip version numbers to produce the same results after upgrades.
	
	
	
		// Output.
	header("Content-Type: text/plain");
	
	echo "$ClientSalt \n";
	
	if ($DHCP) {
		echo "DHCP = on \n";
	} else {
		echo "DHCP = off \n";
		echo "$IP \n";
	}
	
	echo "$UserAgent \n";
	
	?>