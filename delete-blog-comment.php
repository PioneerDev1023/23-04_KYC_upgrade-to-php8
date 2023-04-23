<?php

	require_once("conn.php");

	$blog_comment_id = $_REQUEST['blog_comment_id'];

	$qry = $conn->query("delete from `blog_comment` where `blog_comment_id`='".$blog_comment_id."'  ");

		

	$message = "Comment deleted successfully.";

	$_SESSION['message'] = $message;

	$url = "blog-comment.php?blog_id=".$_REQUEST['blog_id'];

	

	if (headers_sent()){

	  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

	}else{

	  header('Location: ' . $url);

	  die();

	}

	

?>