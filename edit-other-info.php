<?php

	require_once("conn.php");

	require_once("user-head.php");

	require_once("user-header.php");

	

	$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

	$user = $qry->fetch_array();

	

	$user_doc_qry = $conn->query("select * from `user_documents` where `user_id`='".$_SESSION['user_id']."' ");

	$user_doc_res = $user_doc_qry->fetch_array();

	

	

	
	

	if(isset($_REQUEST['submit_doc'])){
			
			
			
		
			$qry = $conn->query("update `dynamic_value` set `value`='".$_REQUEST['name']."',`updated_date`='".date('Y-m-d H:i:s')."' where `dynamic_value_id`='".$_REQUEST['data_id']."' ");

			

			

		

		

		$message = "Your KYC updated successfully.";

		$_SESSION['message'] = $message;

		$url = "user-dashboard.php";

		

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

                                                    <span class="caption-subject font-blue-madison bold uppercase">

                                                    

                                                    	Update Your KYC Detail

                                                    

                                                    </span>

                                                </div>

                                                

                                            </div>

                                            <div class="portlet-body">

                                               

                                                    <!-- PERSONAL INFO TAB -->

                                                    

                                                    	

															<form role="form" action="" method="post" enctype="multipart/form-data">

                                                            

																   <?php

                                                                        $d_qry = $conn->query("select * from `dynamic_value` where `dynamic_value_id`='".$_REQUEST['data_id']."' ");

                                                                        $data = $d_qry->fetch_array();

                                                                        

                                                                   ?> 

                                                                    <?php
																		if($data['type'] == 1){
																	?>

                                                                    	<div class="form-group">
                                                                            <label class="control-label"><?php echo ucfirst($data['name']); ?> :</label>
                                                                            <input type="radio" name="name" value="Yes" <?php if($data['value']=='Yes'){ echo "checked"; } ?>> Yes &nbsp; 
                                                                            <input type="radio" name="name" value="No" <?php if($data['value']=='No'){ echo "checked"; } ?>> No 
                                                                        </div>

                                                                   <?php } ?>
                                                                   
                                                                   <?php
																		if($data['type'] == 2){
																	?>

                                                                    	<div class="form-group">
                                                                        	<input type="hidden" name="name" value="0">
                                                                            <input type="checkbox" name="name" value="1" <?php if($data['value']=='1'){ echo "checked"; } ?>> <?php echo ucfirst($data['name']); ?> &nbsp; 
                                                                        </div>

                                                                   <?php } ?>
                                                                   
                                                                   <?php
																		if($data['type'] == 3){
																	?>

                                                                    	<div class="form-group">
                                                                            <label class="control-label"><?php echo ucfirst($data['name']); ?></label> 
                                                                            <input type="text" name="name" class="form-control" placeholder="<?php echo ucfirst($data['name']); ?>" value="<?php echo ucfirst($data['value']); ?>">  
                                                                        </div>

                                                                   <?php } ?>

                                                                                                                                     

                                                                    <div class="margiv-top-10">

                                                                        <button type="submit" name="submit_doc" class="btn green"> Save Changes </button>

                                                                        <a href="./user-dashboard.php" class="btn default"> Cancel </a>

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

	require_once("user-foot.php");

?>

