<?php
	require_once("conn.php");
	$kyc_list_id = $_REQUEST['kyc_list_id'];
	$qry = $conn->query("delete from `kyc_list` where `kyc_list_id`='".$kyc_list_id."'  ");
		
	$message = "KYC form deleted successfully.";
	$_SESSION['message'] = $message;
	$url = "kyc-form.php";
	
	if (headers_sent()){
	  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
	}else{
	  header('Location: ' . $url);
	  die();
	}
	
?>