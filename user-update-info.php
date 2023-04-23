<?php

	require_once("conn.php");

	require_once("user-head.php");

	require_once("user-header.php");

	

	

	$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

	$user = $qry->fetch_array();

	

	if(isset($_REQUEST['update_image']))

	{

		$path_parts = pathinfo($_FILES['image']['name']);

		$extension = $path_parts['extension'];

		$file_name = uniqid().".".$extension;

		

		move_uploaded_file($_FILES['image']['tmp_name'],'documents/'.$file_name);

		

		$qry = $conn->query("update `users` set `image`='".$file_name."',`updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$_SESSION['user_id']."' ");

		

		$message = "Image updated successfully.";

		$_SESSION['message'] = $message;

		$url = "user-update-info.php";

		

		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}

		

	}

	

	

	if(isset($_REQUEST['change_password']))

	{

		$current_password = $_REQUEST['password'];

		$npassword = $_REQUEST['npassword'];

		$rpassword = $_REQUEST['rpassword'];

		

		

		if($user['password'] != md5($current_password) )

		{

			$message = "Current password not match. Please try again.";

			$_SESSION['error'] = $message;

			$url = "user-update-info.php";

			

			if (headers_sent()){

			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

			}else{

			  header('Location: ' . $url);

			  die();

			}	

		}

		else if($npassword != $rpassword )

		{

			$message = "Re-type password not match. Please try again.";

			$_SESSION['error'] = $message;

			$url = "user-update-info.php";

			

			if (headers_sent()){

			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

			}else{

			  header('Location: ' . $url);

			  die();

			}	

		}

		else

		{

			$qry = $conn->query("update `users` set `password`='".md5($npassword)."',`updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$_SESSION['user_id']."' ");

			$message = "Password changed successfully.";

			$_SESSION['message'] = $message;

			$url = "user-update-info.php";

			

			if (headers_sent()){

			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

			}else{

			  header('Location: ' . $url);

			  die();

			}

		}

			

	}

	

	

	if(isset($_REQUEST['update_personal_details']))

	{

			$email = $_REQUEST['email'];

			$user_name = $_REQUEST['user_name'];

			$qry = $conn->query("update `users` set `user_name`='".$user_name."',`email`='".$email."',`updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$_SESSION['user_id']."' ");

			$message = "Profile updated successfully.";

			$_SESSION['message'] = $message;

			$url = "user-update-info.php";

			

			if (headers_sent()){

			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

			}else{

			  header('Location: ' . $url);

			  die();

			}

	}

	

?>

	<!-- BEGIN PROFILE CONTENT -->

                            <div class="profile-content">

                                <div class="row">

                                    <div class="col-md-12">

                                    	

                                        <?php

											if(isset($_SESSION['message']))

											{

										?>

												<div class="alert alert-success" style="color:#FFF;">

												  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color:#FFF !important;">&times;</a>

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

												<div class="alert alert-danger">

												  <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>

												  <strong>Failed!</strong> <?php echo $_SESSION['error']; ?>

												</div>

										<?php

											unset($_SESSION["error"]);

											}

										?>

                                    

                                        <div class="portlet light bordered">

                                             <div class="portlet-title tabbable-line">

                                                <div class="caption caption-md">

                                                    <i class="icon-globe theme-font hide"></i>

                                                    <span class="caption-subject font-blue-madison bold uppercase">Update Information</span>

                                                </div>

                                                <ul class="nav nav-tabs">

                                                    

                                                    <li class="active">

                                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>

                                                    </li>

                                                    <li>

                                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>

                                                    </li>

                                                    <li>

                                                        <a href="#tab_1_4" data-toggle="tab">Personal Details</a>

                                                    </li>

                                                </ul>

                                            </div>

                                            <div class="portlet-body">

                                                <div class="tab-content">

                                                     <!-- CHANGE AVATAR TAB -->

                                                    <div class="tab-pane active" id="tab_1_2">

                                                        <p>  </p>

                                                        <form action="" method="post" role="form" enctype="multipart/form-data">

                                                            <div class="form-group">

                                                                <div class="fileinput fileinput-new" data-provides="fileinput">

                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                                                                        <?php

																			if($user['image']){

																		?>

                                                                        

                                                                        <img src="documents/<?php echo $user['image']; ?>" alt="" /> </div>

                                                                        

                                                                        <?php } else { ?>

                                                                        

                                                                        <img src="assets/global/img/no-image.jpg" alt="" /> </div>

                                                                        

                                                                        <?php } ?>

                                                                        

                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>

                                                                    <div>

                                                                        <span class="btn default btn-file">

                                                                            <span class="fileinput-new"> Select image </span>

                                                                            <span class="fileinput-exists"> Change </span>

                                                                            <input type="file" name="image" required="required"> </span>

                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>

                                                                    </div>

                                                                </div>

                                                                

                                                            </div>

                                                            <div class="margin-top-10">

                                                                <button type="submit" name="update_image" class="btn green"> Submit </button>

                                                                <a href="./user-dashboard.php" class="btn default"> Cancel </a>

                                                            </div>

                                                        </form>

                                                    </div>

                                                    <!-- END CHANGE AVATAR TAB -->

                                                    <!-- CHANGE PASSWORD TAB -->

                                                    <div class="tab-pane" id="tab_1_3">

                                                        <form action="" method="post">

                                                            <div class="form-group">

                                                                <label class="control-label">Current Password</label>

                                                                <input name="password" type="password" class="form-control" required="required" /> </div>

                                                            <div class="form-group">

                                                                <label class="control-label">New Password</label>

                                                                <input name="npassword" type="password" class="form-control" required="required" /> </div>

                                                            <div class="form-group">

                                                                <label class="control-label">Re-type New Password</label>

                                                                <input name="rpassword" type="password" class="form-control" required="required" /> </div>

                                                            <div class="margin-top-10">

                                                                <button type="submit" class="btn green" name="change_password"> Change Password </button>

                                                                <a href="./user-dashboard.php" class="btn default"> Cancel </a>

                                                            </div>

                                                        </form>

                                                    </div>

                                                    <!-- END CHANGE PASSWORD TAB -->

                                                    <!-- PRIVACY SETTINGS TAB -->

                                                    <div class="tab-pane" id="tab_1_4">

                                                        <form action="" method="post">

                                                            <div class="form-group">

                                                                <label class="control-label">User Name</label>

                                                                <input name="user_name" value="<?php echo $user['user_name'] ?>" type="text" class="form-control" required="required" /> </div>

                                                            <div class="form-group">

                                                                <label class="control-label">Email</label>

                                                                <input name="email" value="<?php echo $user['email'] ?>" type="email" class="form-control" required="required" /> </div>

                                                            <!--end profile-settings-->

                                                            <div class="margin-top-10">

                                                                <button class="btn red" type="submit" name="update_personal_details"> Save Changes </button>

                                                                <a href="./user-dashboard.php" class="btn default"> Cancel </a>

                                                            </div>

                                                        </form>

                                                    </div>

                                                    <!-- END PRIVACY SETTINGS TAB -->

                                                </div>

                                            </div>

                                                      

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- END PROFILE CONTENT -->

                        </div>

                    </div>

                    <!-- END PAGE BASE CONTENT -->

                </div>

                <!-- END CONTENT BODY -->

            </div>

            <!-- END CONTENT -->

            <!-- BEGIN QUICK SIDEBAR -->

           

            <!-- END QUICK SIDEBAR -->

        </div>

        <!-- END CONTAINER -->

<?php

	require_once("user-foot.php");

?>