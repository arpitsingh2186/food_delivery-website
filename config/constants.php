<?php

	//Start Session
	session_start();

	//Create Constants to Store Non Repeating Values
	define('SITEURL', 'http://localhost/web-project/');
	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'food-order');

	/*define('SITEURL', 'http://localhost/web-project/');
	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'grofoodb_grocery');
	define('DB_PASSWORD', '!x1SmNmfobEU');
	define('DB_NAME', 'grofoodb_food');*/
	


	$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
	$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database

?>