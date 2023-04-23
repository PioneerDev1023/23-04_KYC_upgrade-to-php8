<?php
	require_once("conn.php");
	require_once("admin-head.php");
	require_once("admin-header.php");
	
	
	$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");
	$admin = $qry->fetch_array();
	
	if(isset($_REQUEST['update_image']))
	{
		$path_parts = pathinfo($_FILES['image']['name']);
		$extension = $path_parts['extension'];
		$file_name = uniqid().".".$extension;
		
		move_uploaded_file($_FILES['image']['tmp_name'],'documents/'.$file_name);
		
		$qry = $conn->query("update `users` set `image`='".$file_name."',`updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$_SESSION['user_id']."' ");
		
		$message = "Image updated successfully.";
		$_SESSION['message'] = $message;
		$url = "update-info.php";
		
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
		
		
		if($admin['password'] != md5($current_password) )
		{
			$message = "Current password not match. Please try again.";
			$_SESSION['error'] = $message;
			$url = "update-info.php";
			
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
			$url = "update-info.php";
			
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
			$url = "update-info.php";
			
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
			$url = "update-info.php";
			
			if (headers_sent()){
			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
			}else{
			  header('Location: ' . $url);
			  die();
			}
	}
	
	if(isset($_REQUEST['site_setting']))
	{
		$sitekey = $_REQUEST['sitekey'];
		$status = $_REQUEST['status'];
		$qry = $conn->query("update `site_setting` set `status`='".$status."',`sitekey`='".$sitekey."' where `site_setting_id`='1' ");
			$message = "Site setting updated successfully.";
			$_SESSION['message'] = $message;
			$url = "update-info.php";
			
			if (headers_sent()){
			  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
			}else{
			  header('Location: ' . $url);
			  die();
			}
	}
	
	if(isset($_REQUEST['smtp_update']))
	{
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		
		$qry = $conn->query("update `site_setting` set `email`='".$email."', `password`='".$password."' where `site_setting_id`='2' ");
			$message = "SMTP updated successfully.";
			$_SESSION['message'] = $message;
			$url = "update-info.php";
			
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
                                                    <span class="caption-subject font-blue-madison bold uppercase">Update Admin Information</span>
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
                                                    <li>
                                                        <a href="#tab_1_5" data-toggle="tab">Site Setting</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_6" data-toggle="tab">SMTP</a>
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
																			if($admin['image']){
																		?>
                                                                        
                                                                        <img src="documents/<?php echo $admin['image']; ?>" alt="" /> </div>
                                                                        
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
                                                                <a href="./admin-dashboard.php" class="btn default"> Cancel </a>
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
                                                                <a href="./admin-dashboard.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
                                                    <div class="tab-pane" id="tab_1_4">
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label class="control-label">User Name</label>
                                                                <input name="user_name" value="<?php echo $admin['user_name'] ?>" type="text" class="form-control" required="required" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input name="email" value="<?php echo $admin['email'] ?>" type="email" class="form-control" required="required" /> </div>
                                                            <!--end profile-settings-->
                                                            <div class="margin-top-10">
                                                                <button class="btn red" type="submit" name="update_personal_details"> Save Changes </button>
                                                                <a href="./admin-dashboard.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PRIVACY SETTINGS TAB -->
                                                    
                                                    <div class="tab-pane" id="tab_1_5">
                                                        <form action="" method="post">
                                                        
                                                        	<?php
																$site_setting_qry = $conn->query("select * from `site_setting` where `site_setting_id`='1' ");
																$site_setting_data = $site_setting_qry->fetch_array();
															?>
                                                        	<div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input name="" type="text" readonly="readonly" class="form-control" value="<?php echo $site_setting_data['name'] ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Site Key</label>
                                                                <input name="sitekey" type="text" class="form-control" value="<?php echo $site_setting_data['sitekey'] ?>" /> </div>
                                                            <div class="form-group">
                                                                <input type="radio" name="status" value="1" <?php if($site_setting_data['status'] == '1'){ echo"checked"; } ?>> ON
                                                                <input type="radio" name="status" value="0" <?php if($site_setting_data['status'] == '0'){ echo"checked"; } ?>> OFF
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <button type="submit" class="btn green" name="site_setting"> Save </button>
                                                                <a href="./admin-dashboard.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    <div class="tab-pane" id="tab_1_6">
                                                        <form action="" method="post">
                                                        
                                                        	<?php
																$site_setting_qry = $conn->query("select * from `site_setting` where `site_setting_id`='2' ");
																$site_setting_data = $site_setting_qry->fetch_array();
															?>
                                                        	<div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input name="" type="text" readonly="readonly" class="form-control" value="<?php echo $site_setting_data['name'] ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input name="email" type="email" class="form-control" value="<?php echo $site_setting_data['email'] ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Password</label>
                                                                <input name="password" type="text" class="form-control" value="<?php echo $site_setting_data['password'] ?>" /> </div>
                                                           
                                                            <div class="margin-top-10">
                                                                <button type="submit" class="btn green" name="smtp_update"> Save </button>
                                                                <a href="./admin-dashboard.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
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
	require_once("admin-foot.php");
?>