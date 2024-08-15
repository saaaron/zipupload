<?php  
	function loggedin() {
		if (isset($_SESSION["id"]) || isset($_COOKIE["email"])) {
			$loggedin = true;
			return $loggedin;
		}
	}
?>