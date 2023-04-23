<?php

	require_once("conn.php");

	require_once("head.php");
	
	$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

	$user = $qry->fetch_array();
	
	
	if(isset($_REQUEST['login']))
	{
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		
		$qry = $conn->query("select * from `users` where `email`='".$email."' and `password`='".md5($password)."' ");
		$res = $qry->fetch_array();
		
		if($res)
		{
			
			$_SESSION["user_id"] = $res['user_id'];
			
			if($res['type'] == '1')
			{
				header("Location: /kyc/admin-dashboard.php");
			}
			else if($res['type'] == '0')
			{
				header("Location: /kyc/user-dashboard.php");
			}
		}
		else
		{
			$message = "Invalid Credentials";
			$_SESSION['error'] = $message;
			$url = "index.php";
			
			if (headers_sent()){
			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
			}else{
			  header('Location: ' . $url);
			  die();
			}
		}
		
	}
	
	
	/*if(!$user)
	{
		$url = "index.php";
		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}
	}*/
	
	
	
	
	//unset($_SESSION["user_id"]);

?>

<link href="assets/pages/css/lock-2.min.css" rel="stylesheet" type="text/css" />
 

<body class="">

        <div class="page-lock">

            

            <div class="page-body">
				
                
                 <?php

					if($user['image']){

				?>

				

				<img src="documents/<?php echo $user['image']; ?>"  class="page-lock-img" alt="" /> 

				

				<?php } else { ?>

				

				<img src="assets/global/img/no-image.jpg" class="page-lock-img" alt="" /> 

				

				<?php } ?>
                
				
                
                
                <div class="page-lock-info">

                    <h1><?php echo $user['user_name']; ?></h1>

                    <span class="email"> <?php echo $user['email']; ?> </span>

                    <span class="locked"> Locked </span>

                    <form class="form-inline" method="post" >

                        <div class="input-group input-medium">
							
                            <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                            <input type="password" name="password" class="form-control" placeholder="Password">

                            <span class="input-group-btn">

                                <button type="submit" name="login" class="btn green icn-only">

                                    <i class="m-icon-swapright m-icon-white"></i>

                                </button>

                            </span>

                        </div>

                        <!-- /input-group -->

                        <div class="relogin">

                            <a href="./index.php"> Not <?php echo $user['user_name']; ?> ? </a>

                        </div>

                    </form>

                </div>

            </div>

            <div class="page-footer-custom">2017 @ CloudStar Technologies Modern Solutions </div>
           
        </div>


<?php

	require_once("foot.php");

?>        

<script src="assets/pages/scripts/lock-2.min.js" type="text/javascript"></script>