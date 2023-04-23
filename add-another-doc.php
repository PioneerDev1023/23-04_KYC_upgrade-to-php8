<?php

	require_once("conn.php");

	require_once("user-head.php");

	require_once("user-header.php");

	

	$qry = mysql_query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

	$user = mysql_fetch_array($qry);

	

	$user_doc_qry = mysql_query("select * from `user_documents` where `user_id`='".$_SESSION['user_id']."' ");

	$user_doc_res = mysql_fetch_array($user_doc_qry);

	

	

	function reArrayFiles(&$file_post) {

	

		$file_ary = array();

		$file_count = count($file_post['name']);

		$file_keys = array_keys($file_post);

	

		for ($i=0; $i<$file_count; $i++) {

			foreach ($file_keys as $key) {

				$file_ary[$i][$key] = $file_post[$key][$i];

			}

		}

	

		return $file_ary;

	}

	

	if(isset($_REQUEST['submit_doc'])){

		

		$file_ary = reArrayFiles($_FILES['doc_file']);

		

		$doc_number = $_REQUEST['doc_number'];

		$doc_name = $_REQUEST['doc_name'];

		$i = 0;

		foreach ($file_ary as $file) {

			

			$path_parts = pathinfo($file['name']);

			$extension = $path_parts['extension'];

			$file_name = uniqid().".".$extension;

			

        	move_uploaded_file($file['tmp_name'],'documents/'.$file_name);

			

			$qry = mysql_query("insert into `user_documents` (`doc_name`,`doc_number`,`doc_file_name`,`user_id`,`added_date`) values('".$doc_name[$i]."','".$doc_number[$i]."','".$file_name."','".$_SESSION['user_id']."','".date('Y-m-d H:i:s')."') ");

			

			$i++;

		}
		
		
		$radio_name = $_POST['radio-group-name'];
		$i=0;
		foreach($_POST['radio-group'] as $value)
		{
			
			$qry = mysql_query("insert into `dynamic_value` (`user_id`,`type`,`name`,`value`,`added_date`) values('".$_SESSION['user_id']."','1','".$radio_name[$i]['radio_name']."','".$value['radio']."','".date('Y-m-d H:i:s')."')  ");
			$i++;
		}
		
		
		$checkbox_name = $_POST['checkbox-group-name'];
		$i=0;
		foreach($_POST['checkbox-group'] as $value)
		{
			
			$qry = mysql_query("insert into `dynamic_value` (`user_id`,`type`,`name`,`value`,`added_date`) values('".$_SESSION['user_id']."','2','".$checkbox_name[$i]['checkbox_name']."','".$value['checkbox']."','".date('Y-m-d H:i:s')."')  ");
			$i++;
		}
		
		$text_name = $_POST['text-group-name'];
		$i=0;
		foreach($_POST['text-group'] as $value)
		{
			
			$qry = mysql_query("insert into `dynamic_value` (`user_id`,`type`,`name`,`value`,`added_date`) values('".$_SESSION['user_id']."','3','".$text_name[$i]['text_name']."','".$value['text']."','".date('Y-m-d H:i:s')."')  ");
			$i++;
		}
		
		

		$message = "Document uploaded successfully.";

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

                                    

                                        <div class="portlet light bordered">

                                            <div class="portlet-title tabbable-line">

                                                <div class="caption caption-md">

                                                    <i class="icon-globe theme-font hide"></i>

                                                    <span class="caption-subject font-blue-madison bold uppercase">

                                                    

                                                    	Submit / Update Your KYC Detail

                                                    

                                                    </span>

                                                </div>

                                                <div class="actions">

                                                	<div class="btn-group">

														

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="portlet-body">

                                               

                                                    <!-- PERSONAL INFO TAB -->

                                                    

                                                    	

															<form role="form" action="" method="post" enctype="multipart/form-data">

                                                            

																   <?php

                                                                        $user_uploaded_doc_array = array();
																		$remain_doc = array();
																		
																		
																		$user_uploaded_radio_array = array();
																		$user_uploaded_checkbox_array = array();
																		$user_uploaded_textfield_array = array();
																		
																		$remain_radio = array();
																		$remain_checkbox = array();
																		$remain_textfield = array();

																		$user_doc_qry = mysql_query("select * from `user_documents` where `user_id`='".$_SESSION['user_id']."' ");
																		while($data =  mysql_fetch_array($user_doc_qry)){
																			 array_push($user_uploaded_doc_array,$data['doc_name']);
																		}
																		
																		$d_qry = mysql_query("select * from `dynamic_value` where `user_id`='".$_SESSION['user_id']."' ");
																		while($d_data =  mysql_fetch_array($d_qry)){
																			 if($d_data['type'] == 1){
																			 	array_push($user_uploaded_radio_array,$d_data['name']);
																			 }
																			 if($d_data['type'] == 2){
																			 	array_push($user_uploaded_checkbox_array,$d_data['name']);
																			 }
																			 if($d_data['type'] == 3){
																			 	array_push($user_uploaded_textfield_array,$d_data['name']);
																			 }
																		}

																		 
																		 
																		 $kyc_list_qry = mysql_query("select * from `kyc_list` where `country_id`='".$user['country_id']."' and `region_name`='".$user['region']."' ");

																		 $kyc_data = mysql_fetch_array($kyc_list_qry);
																		 
																		 $docs = trim($kyc_data['document_list'],",");
																		 $doc = explode(",",$docs);
																		 foreach($doc as $document){
																			 if(!in_array($document,$user_uploaded_doc_array))
																			 {
																				  array_push($remain_doc,$document);
																			 } 
																		 }
																		 
																		 $rbs = trim($kyc_data['radio_button'],",");
																		 $rbs = explode(",",$rbs);
																		 foreach($rbs as $rb){
																			 if(!in_array($rb,$user_uploaded_radio_array))
																			 {
																				  array_push($remain_radio,$rb);
																			 } 
																		 }
																		 
																		 $cbs = trim($kyc_data['checkbox'],",");
																		 $cbs = explode(",",$cbs);
																		 foreach($cbs as $cb){
																			 if(!in_array($cb,$user_uploaded_checkbox_array))
																			 {
																				  array_push($remain_checkbox,$cb);
																			 } 
																		 }
																		 
																		 $tfs = trim($kyc_data['text_field'],",");
																		 $tfs = explode(",",$tfs);
																		 foreach($tfs as $tf){
																			 if(!in_array($tf,$user_uploaded_textfield_array))
																			 {
																				  array_push($remain_textfield,$tf);
																			 } 
																		 }
																		 
																		 

																		foreach($remain_doc as $document){
																	?> 

                                                                    <div class="form-group">

                                                                        <label class="control-label"><?php echo $document ?></label>

                                                                        <input type="text" name="doc_number[]" placeholder="<?php echo $document ?> Number" class="form-control" required /> 

                                                                        <input type="hidden" name="doc_name[]" value="<?php echo $document ?>">

                                                                    </div>

                                                                    <div class="form-group">

                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                                                                <span class="btn green btn-file">

                                                                                    <span class="fileinput-new"> Provide the number & Upload </span>

                                                                                    <span class="fileinput-exists"> Change </span>

                                                                                    <input type="file" name="doc_file[]" required> </span>

                                                                                <span class="fileinput-filename"> </span> &nbsp;

                                                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>

                                                                            </div>

                                                                    </div>

                                                                   

                                                                   <?php } ?>
                                                                   
                                                                   
                                                                   <?php
																   		$i = 0;
																		foreach($remain_radio as $rb){
																   ?> 

                                                                    <div class="form-group">
																	    <label class="control-label"><?php echo ucfirst($rb); ?> :</label>
																		<input type="radio" name="radio-group[<?php echo $i ?>][radio]" value="Yes"> Yes &nbsp; 
                                                                        <input type="radio" name="radio-group[<?php echo $i ?>][radio]" value="No"> No 
																	</div>
                                                                    <input type="hidden" name="radio-group-name[<?php echo $i ?>][radio_name]" value="<?php echo $rb; ?>">

                                                                   <?php $i++; } ?>
                                                                   
                                                                   
                                                                   <?php
																   	if($remain_checkbox != null){
																   ?>
                                                                   
                                                                   <div class="form-group">
                                                                   		<label class="control-label"><?php if($kyc_data['checkbox_label'] != ""){ echo $kyc_data['checkbox_label']." : "; } ?></label>
                                                                   </div>
                                                                   
                                                                   <?php } ?>
                                                                   
                                                                   <?php
																   		$i = 0;
																		foreach($remain_checkbox as $cb){
																   ?> 

                                                                    <div class="form-group">
                                                                    	<input type="hidden" name="checkbox-group[<?php echo $i ?>][checkbox]" value="0">
																		<input type="checkbox" name="checkbox-group[<?php echo $i ?>][checkbox]" value="1"> <?php echo ucfirst($cb); ?> &nbsp; 
                                                                    </div>
                                                                    <input type="hidden" name="checkbox-group-name[<?php echo $i ?>][checkbox_name]" value="<?php echo $cb; ?>">

                                                                   <?php $i++; } ?>
                                                                   
                                                                   
                                                                   <?php
																		$i = 0;
																		foreach($remain_textfield as $tf){
																   ?> 

                                                                    <div class="form-group">
																		<label class="control-label"><?php echo ucfirst($tf) ?></label> 
																		<input type="text" name="text-group[<?php echo $i ?>][text]" class="form-control" placeholder="<?php echo ucfirst($tf) ?>">  
																	</div>
                                                                    <input type="hidden" name="text-group-name[<?php echo $i ?>][text_name]" value="<?php echo $tf; ?>">

                                                                   <?php $i++; } ?>
                                                                   

                                                                   

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

