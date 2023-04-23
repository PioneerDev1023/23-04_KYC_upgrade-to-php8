<?php
	require_once("conn.php");
	$user_id = $_REQUEST['user_id'];
	$qry = $conn->query("delete from `users` where `user_id`='".$user_id."'  ");
		
	$message = "User deleted successfully.";
	$_SESSION['message'] = $message;
	$url = "manage-users.php";
	
	if (headers_sent()){
	  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
	}else{
	  header('Location: ' . $url);
	  die();
	}
	
?>