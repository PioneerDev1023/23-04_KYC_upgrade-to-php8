<?php

	require_once("conn.php");

	$blog_id = $_REQUEST['blog_id'];

	$qry = mysql_query("delete from `blog` where `blog_id`='".$blog_id."'  ");

		

	$message = "Blog deleted successfully.";

	$_SESSION['message'] = $message;

	$url = "manage-blog.php";

	

	if (headers_sent()){

	  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

	}else{

	  header('Location: ' . $url);

	  die();

	}

	

?>