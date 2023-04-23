<?php
	require_once("conn.php");
	require_once("user-head.php");
	require_once("user-header.php");
	
	$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");
	$user = $qry->fetch_array();
	
?>

<?php
	require_once("user-foot.php");
?>