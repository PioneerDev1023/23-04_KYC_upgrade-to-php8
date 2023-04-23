<?php
	require_once("conn.php");
	unset($_SESSION["user_id"]);
	header("Location: /"); 
?>