<?php

	//connect to database
	$conn = mysqli_connect('localhost', 'test123', 'test123', 'paintball_db'); 
/*	$conn = mysqli_connect('mysql78.unoeuro.com', 'johnnytran_dk', 'dybkr6pg', 'johnnytran_dk_db'); */

	//check connection
	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error(); 
    }
?>