<?php
	session_start();

	// $conn = mysql_connect("DB_server","DB_username","password");
    // $conn = mysql_connect("localhost","root","Password123");
	// mysql_select_db("DB-Name",$conn);
	// mysql_select_db("cloudStar-kyc",$conn);
	$conn = new mysqli("localhost","root","","cloudStar-kyc");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	

	//$base_url = "Provide your URL";
	$base_url = "https://kyc.cloudstartech.com";
?>