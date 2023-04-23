<?php

	require_once("conn.php");

	require_once("head.php");

	

	if(isset($_REQUEST['change_password']))

	{

		$verify_reg_code = $_REQUEST['verify-reg-code'];
		
		
		
		$qry = $conn->query("select * from `users` where `verify_reg_code`='".$verify_reg_code."' ");

		$res = $qry->fetch_array();
		
		

		

		$password = $_REQUEST['password'];

		$rpassword = $_REQUEST['rpassword'];

		

		if($password != $rpassword )

		{

			$message = "Re-type password not match. Please try again.";

			$_SESSION['error'] = $message;

			$url = "forgot-password.php?verify-reg-code=".$verify_reg_code;

			

			if (headers_sent()){

			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

			}else{

			  header('Location: ' . $url);

			  die();

			}	

		}

		else

		{

			$qry = $conn->query("update `users` set `password`='".md5($password)."',`verify_reg_code`='".uniqid()."',`updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$res['user_id']."' ");

			$message = "Password changed successfully.";

			$_SESSION['message'] = $message;

			$url = "index.php";

			

			if (headers_sent()){

			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

			}else{

			  header('Location: ' . $url);

			  die();

			}

		}

		

	}

	

	

	

	

	

?>



         <!-- BEGIN LOGIN -->

        <div class="content">

            <!-- BEGIN LOGIN FORM -->

            

            <form class="" action="" method="post" >

                <h3 class="form-title">Reset Password</h3>

                

                

                <?php

					if(isset($_SESSION['message']))

					{

				?>

						<div class="alert alert-success" >

						  <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>

						  <strong>Success!</strong> <?php echo $_SESSION['message']; ?>

						</div>

				<?php

					unset($_SESSION["message"]);

					}

				?>

                

                <?php

					if(isset($_SESSION['error']))

					{

				?>

						<div class="alert alert-danger" >

						  <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>

						  <strong>Failed!</strong> <?php echo $_SESSION['error']; ?>

						</div>

				<?php

					unset($_SESSION["error"]);

					}

				?>

                

                <div class="form-group">

                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

                    <label class="control-label visible-ie8 visible-ie9">Password</label>

                    <div class="input-icon">

                        <i class="fa fa-lock"></i>

                        <input class="form-control placeholder-no-fix" required type="password" autocomplete="off" placeholder="Password" name="password" /> </div>

                </div>

                <div class="form-group">

                    <label class="control-label visible-ie8 visible-ie9">Re-Type Password</label>

                    <div class="input-icon">

                        <i class="fa fa-lock"></i>

                        <input class="form-control placeholder-no-fix" required type="password" autocomplete="off" placeholder="Re-Type Password" name="rpassword" /> </div>

                </div>

                

                                

                <div class="form-actions">

                    <button type="submit" class="btn green pull-right" name="change_password" > Submit </button>

                </div>

                

            

                

                

            </form>

            <!-- END LOGIN FORM -->

            

        </div>

        <!-- END LOGIN -->

        <!-- BEGIN COPYRIGHT -->

        <div class="copyright"> 2017 @ CloudStar Technologies Modern Solutions </div>

        <!-- END COPYRIGHT -->

        

<?php

	require_once("foot.php");

?>