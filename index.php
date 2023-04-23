<?php
	require_once("conn.php");
	require_once("head.php");
	require_once('PHPMailerAutoload.php');
	
	
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
				header("Location: /admin-dashboard.php");
			}
			else if($res['type'] == '0')
			{
				header("Location: /user-dashboard.php");
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
	
	
	if(isset($_REQUEST['signup']))
	{
		
		$email = $_REQUEST['email'];
		$qry = $conn->query("select * from `users` where `email`='".$email."' ");
		$res = $qry->fetch_array();
		
		if($res)
		{
			$message = "Email was already exist.";
			$_SESSION['error'] = $message;
			$url = "index.php";
			
			if (headers_sent()){
			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
			}else{
			  header('Location: ' . $url);
			  die();
			}
			
		}
		else
		{
			$user_name = $_REQUEST['user_name'];
			$email = $_REQUEST['email'];
			$region = $_REQUEST['region'];
			$city = $_REQUEST['city'];
			$country_id = $_REQUEST['country_id'];
			$password = $_REQUEST['password'];
			$rpassword = $_REQUEST['rpassword'];
			$verify_reg_code = uniqid();
			
			$qry = $conn->query("insert into `users` (`user_name`,`email`,`password`,`region`,`city`,`country_id`,`type`,`verify_reg_code`,`added_date`) values('".$user_name."','".$email."','".md5($password)."','".$region."','".$city."','".$country_id."','0','".$verify_reg_code."','".date('Y-m-d H:i:s')."') ");
			
			
			
			
			$mail = new PHPMailer; 

			$mail->SMTPDebug = 0;
			
			$mail->isSMTP();
			
			$mail->Host = 'localhost';
			
			$mail->Port = 25;
			
			$mail->ssl = false;
			
			$mail->authentication = false;
			
			
	
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "'".$username."'";
	
			//Password to use for SMTP authentication
			$mail->Password = "'".$password."'";
	
			//Set who the message is to be sent from
			$mail->setFrom("'".$user_name."'", 'KYC');
	
			//Set an alternative reply-to address
			$mail->addReplyTo("'".$user_name."'",'KYC');
	
			//Set who the message is to be sent to
			$mail->addAddress("$email", 'KYC');
	
			//Set the subject line
			$mail->Subject = 'Welcome to KYC';

                        $mail->From = "support@cloudstartech.com";
                        $mail->FromName = "Support Team";
	
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			
			
			
			
			
			$message='
					You are successfully registered in KYC, Please fillup your other information.
			';
			
			
			
			
			$mail->msgHTML($message, dirname(__FILE__));
	
			//Replace the plain text body with one created manually
			$mail->AltBody = 'KYC';
			
			
			$message = "You have successfully signed up, Please login.";
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
	
	
	if(isset($_REQUEST['forget_password']))
	{
		$email = $_REQUEST['email'];
		
		$qry = $conn->query("select * from `users` where `email`='".$email."' ");
		$res = $qry->fetch_array();
		
		if($res)
		{
			/*$to = $email;
			$subject = "KYC | Forget Password";
			$txt = '<a href="/forget-password.php?verify-reg-code='.$res['verify_reg_code'].'"></a>';
			$headers = "From: tp.vijayparmar@gmail.com";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html\r\n";
			$retval = mail($to,$subject,$txt,$headers);*/
			 
			$site_setting_qry = $conn->query("select * from `site_setting` where `site_setting_id`='2' ");
		    $site_setting_data = $site_setting_qry->fetch_array(); 
			$username = $site_setting_data['email'];
			$password = $site_setting_data['password'];
			
			
			 
			$mail = new PHPMailer; 

			$mail->SMTPDebug = 0;
			
			$mail->isSMTP();
			
			$mail->Host = 'localhost';
			
			$mail->Port = 25;
			
			$mail->ssl = false;
			
			$mail->authentication = false;
			
			
	
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "'".$username."'";
	
			//Password to use for SMTP authentication
			$mail->Password = "'".$password."'";

                        $mail->From = "support@cloudstartech.com";
                        $mail->FromName = "Support Team";
	
			//Set who the message is to be sent from
			$mail->setFrom("'".$user_name."'", 'KYC');
	
			//Set an alternative reply-to address
			$mail->addReplyTo("'".$user_name."'",'KYC');
	
			//Set who the message is to be sent to
			$mail->addAddress("$email", 'KYC');
	
			//Set the subject line
			$mail->Subject = 'KYC Forget Password';


	
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			
			
			
			
			
			$message='
					Reset your password from this link.
					
					'.$base_url.'/forgot-password.php?verify-reg-code='.$res['verify_reg_code'].'
			';
			
			
			
			
			$mail->msgHTML($message, dirname(__FILE__));
	
			//Replace the plain text body with one created manually
			$mail->AltBody = 'KYC';
	
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			
			//send the message, check for errors
			if (!$mail->send()) 
			{
				
				
				
				$message = "Email not send, please try again.";
				$_SESSION['error'] = $message;
				$url = "index.php";
				
				
				if (headers_sent()){
				  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
				}else{
				  header('Location: ' . $url);
				  die();
				}
			} 
			else
			{
				$message = "Email sent successfully, please check email and reset your password.";
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
		else
		{
			$message = "Email is not exist.";
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
	
	$captcha_qry = $conn->query("select * from `site_setting` where `site_setting_id`='1'");
	$captcha_data = $captcha_qry->fetch_array();

	// $captcha_data = [];
	// $captcha_query = "SELECT * FROM `site_setting` WHERE `site_setting_id` = '1'";

	// $captcha_data = $result->fetch_assoc();
	// $result->free();
?>
<style>.login .logo {display:none;}.login .content {margin-top: 30px !important;}</style>

         <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            
            <form class="login-form" action="" name="login-form" method="post" id="login">
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any email and password. </span>
                </div>
                
                
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
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" id="login_email" type="email" autocomplete="off" placeholder="Email" name="email" /> </div>
                    <div class="help-block login_email_error" style="color:red; display:none;" >Email is required.</div>        
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" id="login_password" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                        <div class="help-block login_password_error" style="color:red; display:none;" >Password is required.</div>    
                </div>
                
                <div class="form-group">
                	<div id="example1"></div>
                    <div class="help-block login_captcha_error" style="color:red; display:none;" >Captcha is required.</div>    
      			</div>
                
                
                <div class="form-actions">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label>
                    <button type="submit" class="btn green pull-right" name="login" > Login </button>
                </div>
                
            
                
                <!--<div class="login-options">
                    <h4>Or login with</h4>
                    <ul class="social-icons">
                        <li>
                            <a class="facebook" data-original-title="facebook" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="twitter" data-original-title="Twitter" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="googleplus" data-original-title="Goole Plus" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="linkedin" data-original-title="Linkedin" href="javascript:;"> </a>
                        </li>
                    </ul>
                </div>-->
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p> no worries, click
                        <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>
                </div>
                <div class="create-account">
                    <p> Don't have an account yet ?&nbsp;
                        <a href="javascript:;" id="register-btn"> Create an account </a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="" method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
                    <button type="submit" name="forget_password" class="btn green pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="" method="post">
                <h3>Sign Up</h3>
                <p> Enter your personal details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" id="signup_user_name" name="user_name" /> </div>
                        <div class="help-block signup_user_name_error" style="color:red; display:none;" >Full name is required.</div>    
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" id="signup_email" name="email" /> </div>
                        <div class="help-block signup_email_error" style="color:red; display:none;" >Email is required.</div>    
                </div>
               
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">City/Town</label>
                    <div class="input-icon">
                        <i class="fa fa-location-arrow"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" id="signup_city" name="city" /> </div>
                        <div class="help-block signup_city_error" style="color:red; display:none;" >City/Town is required.</div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Country</label>
                    <select name="country_id" id="country_list" class="select2 form-control">
                        <option value=""></option>
                        <?php
							$country = $conn->query("select DISTINCT(`country_id`) from `kyc_list`");
							while($res = $country->fetch_array()){
								$country_qry = $conn->query("select * from `country` where `country_id`='".$res['country_id']."' ");
								$country_data = $country_qry->fetch_array();
						?>
							<option value="<?php echo $country_data['country_id'] ?>" attr_country_code="<?php echo $country_data['country_code'] ?>" ><?php echo $country_data['country_name'] ?></option>
						<?php } ?>
                    </select>
                    <div class="help-block signup_country_error" style="color:red; display:none;" >Country is required.</div>
                </div>
                
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Region</label>
                    <div class="input-icon">
                        <i class="fa fa-check"></i>
                        
                        <select name="region" id="signup_region" class="form-control" > 
                        	<option value="">Select Region</option>
                        </select>
                        </div>
                        <div class="help-block signup_region_error" style="color:red; display:none;" >Region is required.</div>
                </div>
                
                <p> Enter your account details below: </p>
               
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
                        <div class="help-block signup_password_error" style="color:red; display:none;" >Password is required.</div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" id="rpassword" /> </div>
                    </div>
                    <div class="help-block signup_rpassword_error" style="color:red; display:none;" >Re-type pasword is required.</div>
                    <div class="help-block signup_match_password_error" style="color:red; display:none;" >Password not match.</div>
                </div>
                
                <div class="form-group">
                	<!--<div class="g-recaptcha" data-sitekey="6LfsQDMUAAAAAP-66TvBHZgymrn7OF6moOB8XFdu"></div>-->
                    
                    <div id="example2"></div>
                	<div class="signup_captcha_error" style="color:#e73d4a; display:none;" >Captcha is required.</div>	    
      			</div>
                
                
                <div class="form-group">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="tnc" id="signup_tnc" /> I agree to the
                        <a href="./documents/Terms & Conditions.docx" download>Terms & Conditions </a> 
                        <span></span>
                        <div class="help-block signup_tnc_error" style="color:red; display:none;" >TNC is required.</div>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div>
                <div class="form-actions">
                    <button id="register-back-btn" type="button" class="btn red btn-outline"> Back </button>
                    <button type="submit" id="register-submit-btn" name="signup" class="btn green pull-right"> Sign Up </button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2017 @ CloudStar Technologies Modern Solutions </div>
        <!-- END COPYRIGHT -->
        
<?php
	require_once("foot.php");
?>