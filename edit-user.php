<?php

	require_once("conn.php");

	require_once("admin-head.php");

	require_once("admin-header.php");

	$user_id = $_REQUEST['user_id'];
	$user_qry = $conn->query("select * from `users` where `user_id`='".$user_id."' ");
	$user_data = $user_qry->fetch_array();
	

	if(isset($_REQUEST['edit-user']))
	{
		
		$user_name = $_REQUEST['user_name'];
		$country_id = $_REQUEST['country_id'];
		$region = $_REQUEST['region'];
		$city = $_REQUEST['city'];
		$password = $_REQUEST['password'];
		
	
		if($_FILES['user_image']['name']){
		
		$path_parts = pathinfo($_FILES['user_image']['name']);
		$extension = $path_parts['extension'];
		$file_name = uniqid().".".$extension;
		
		move_uploaded_file($_FILES['user_image']['tmp_name'],'documents/'.$file_name);
		
				if($password == ""){
					$qry = $conn->query("update `users` set `user_name`='".$user_name."',`country_id`='".$country_id."',`region`='".$region."',`city`='".$city."', `image`='".$file_name."', `updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$user_id."' ");
				}else{
					$qry = $conn->query("update `users` set `user_name`='".$user_name."',`country_id`='".$country_id."',`region`='".$region."',`city`='".$city."', `image`='".$file_name."',`password`='".md5($password)."', `updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$user_id."' ");
				}

		}
		else
		{
				if($password == ""){
					$qry = $conn->query("update `users` set `user_name`='".$user_name."',`country_id`='".$country_id."',`region`='".$region."',`city`='".$city."',  `updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$user_id."' ");
				}else{
					$qry = $conn->query("update `users` set `user_name`='".$user_name."',`country_id`='".$country_id."',`region`='".$region."',`city`='".$city."', `password`='".md5($password)."', `updated_date`='".date('Y-m-d H:i:s')."' where `user_id`='".$user_id."' ");
				}
		}
		
		if($user_data['country_id'] != $country_id || $user_data['region'] != $region)
		{
			$qry = $conn->query("delete from `user_documents` where `user_id`='".$user_id."'  ");
			$qry = $conn->query("delete from `dynamic_value` where `user_id`='".$user_id."'  ");
		}
		
		$message = "User updated successfully.";

		$_SESSION['message'] = $message;

		$url = "manage-users.php";

		

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

                                        <div class="portlet light bordered">

                                        	

                                            <div class="portlet-title tabbable-line">

                                                <div class="caption caption-md">

                                                    <i class="icon-globe theme-font hide"></i>

                                                    <span class="caption-subject font-blue-madison bold uppercase">Edit User</span>

                                                </div>

                                                

                                            </div>

                                            <div class="portlet-body">

                                  <form role="form" action="" method="post" class="" enctype="multipart/form-data">

                                            <div class="form-group">

                                                <label class="control-label ">User Name</label>
    
                                                <input type="text" name="user_name" value="<?php echo $user_data['user_name']; ?>" class="form-control" required="required">
    
                                            </div>
                                            
                                            <div class="form-group">
                                            
                                                <label class="control-label ">Country</label>
                                                <select name="country_id" id="country_list" class="select2 form-control">
                                                    <option value=""></option>
                                                    <?php
                                                        $country = $conn->query("select DISTINCT(`country_id`) from `kyc_list`");
                                                        while($res = $country->fetch_array()){
                                                            $country_qry = $conn->query("select * from `country` where `country_id`='".$res['country_id']."' ");
                                                            $country_data = $country_qry->fetch_array();
															
															if($res['country_id'] == $user_data['country_id'] )
															{
																$selected = "selected";
															}
															else
															{
																$selected = "";
															}
                                                    ?>
                                                        <option value="<?php echo $country_data['country_id'] ?>" <?php echo $selected; ?> attr_country_code="<?php echo $country_data['country_code'] ?>" ><?php echo $country_data['country_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            
                                            </div>
                                            
                                            <div class="form-group">
                                            
                                            	<label class="control-label ">Region</label>
                                                <select name="region" id="signup_region" class="form-control" > 
                                                    <option value="">Select Region</option>
                                                    <?php
														$region = $conn->query("select `region_name` from `kyc_list` where `country_id`='".$user_data['country_id']."' ");
                                                        while($res = $region->fetch_array()){
                                                            if($res['region_name'] == $user_data['region'] )
															{
																$selected = "selected";
															}
															else
															{
																$selected = "";
															}
													?>
                                                    <option value="<?php echo $res['region_name']; ?>" <?php echo $selected; ?>><?php echo $res['region_name']; ?></option>		
                                                    <?php } ?>
                                                </select>
                                            
                                            </div>
                                            
                                            <div class="form-group">

                                                <label class="control-label ">City / Town</label>
    
                                                <input type="text" name="city" value="<?php echo $user_data['city']; ?>" class="form-control" required="required">
    
                                            </div>
                                            
                                            <div class="form-group">

                                                <label class="control-label ">Image</label>
                                                <br>
                                                
                                                   <?php

														if($user_data['image']){
		
													?>
		
													
		
													<img src="documents/<?php echo $user_data['image']; ?>" height="100px" width="100px" alt="" /> </div>
		
													
		
													<?php } else { ?>
		
													
		
													<img src="assets/global/img/no-image.jpg" height="100px" width="100px" alt="" /> </div>
		
													
		
													<?php } ?>
    
                                                <input type="file" name="user_image"  >
    
                                            </div>
                                            
											<div class="form-group">

                                                <label class="control-label ">Password</label>
    
                                                <input type="password" name="password" class="form-control" >
    
                                            </div>
                                         

                                             <div class="margiv-top-10">

                                                   

                                                    <button type="submit" name="edit-user" class="btn green"> Submit </button>

                                                    <a href="./manage-users.php" class="btn default"> Cancel </a>

                                             </div>

                                            </form>

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

<script type="text/javascript">
	$("#country_list").change(function(){
		$("#signup_region").load("get_region.php?country_id="+$(this).val());	
	});
</script>