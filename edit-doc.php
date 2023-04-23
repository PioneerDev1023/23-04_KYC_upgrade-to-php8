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

			

			$qry = mysql_query("update `user_documents` set `doc_number`='".$doc_number[$i]."',`doc_file_name`='".$file_name."',`updated_date`='".date('Y-m-d H:i:s')."' where `user_document_id`='".$_REQUEST['user_document_id']."' ");

			

			$i++;

		}

		

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

                                                                        $doc_qry = mysql_query("select * from `user_documents` where `user_document_id`='".$_REQUEST['user_document_id']."' ");

                                                                        $doc_data = mysql_fetch_array($doc_qry);

                                                                        

                                                                   ?> 

                                                                    <div class="form-group">

                                                                        <label class="control-label"><?php echo $doc_data['doc_name'] ?></label>

                                                                        <input type="text" name="doc_number[]" placeholder="<?php echo $doc_data['doc_name'] ?> Number" class="form-control" required value="<?php echo $doc_data['doc_number'] ?>" /> 

                                                                        <input type="hidden" name="doc_name[]" value="<?php echo $doc_data['doc_name'] ?>">

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

