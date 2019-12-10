<?php

	//connect to database
	$conn = mysqli_connect('localhost', 'test123', 'test123', 'paintball_db');

	//check connection
	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error(); 
    }
?>