<?php
	require_once("conn.php");
	require_once("user-head.php");
	require_once("user-header.php");
	
	$qry = mysql_query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");
	$user = mysql_fetch_array($qry);
	
?>

<?php
	require_once("user-foot.php");
?>