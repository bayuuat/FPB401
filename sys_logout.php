<?php

	session_start();
	
	unset($_SESSION['id_user']);
	unset($_SESSION['nama']);
	unset($_SESSION['level']);
	
	header("location: form-code.php");

?>