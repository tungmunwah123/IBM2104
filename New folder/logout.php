<?php

//start session
session_start();

if (isset($_SESSION['log'])) {
	
		if ($_SESSION['log'] == true) {
		
			session_unset();	
			session_destroy();
			
			echo"<script type='text/javascript'>
				  alert('You are now logged out.');
				  window.location = 'home.php';
				</script>";
				
			//header("Refresh:0;url=home.php");
		}
	
}

?>