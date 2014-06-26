<?php

	session_start();

	if(isset($_SESSION["login"])){
		require 'web/views/home.php';
	}
	else{
		require 'web/views/login.php';
	}

?>