<?php

	require_once("conn.php");

	require_once("admin-head.php");

	require_once("admin-header.php");

	$blog_id = $_REQUEST['blog_id'];
	$blog_qry = mysql_query("select * from `blog` where `blog_id`='".$blog_id."' ");
	$blog_data = mysql_fetch_array($blog_qry);
	

	if(isset($_REQUEST['edit-blog']))
	{
		
		$blog_title = $_REQUEST['blog_title'];
		$blog_content = $_REQUEST['blog_content'];
	
		if($_FILES['blog_image']['name']){
		
		$path_parts = pathinfo($_FILES['blog_image']['name']);
		$extension = $path_parts['extension'];
		$file_name = uniqid().".".$extension;
		
		move_uploaded_file($_FILES['blog_image']['tmp_name'],'documents/'.$file_name);
		
		

		$qry = mysql_query("update `blog` set `blog_title`='".$blog_title."', `blog_image`='".$file_name."', `blog_content`='".$blog_content."',`updated_date`='".date('Y-m-d H:i:s')."' where `blog_id`='".$blog_id."' ");

		}
		else
		{
			$qry = mysql_query("update `blog` set `blog_title`='".$blog_title."', `blog_content`='".$blog_content."', `updated_date`='".date('Y-m-d H:i:s')."' where `blog_id`='".$blog_id."' ");
		}

		$message = "Blog updated successfully.";

		$_SESSION['message'] = $message;

		$url = "manage-blog.php";

		

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

                                                    <span class="caption-subject font-blue-madison bold uppercase">Edit Blog</span>

                                                </div>

                                                

                                            </div>

                                            <div class="portlet-body">

                                  <form role="form" action="" method="post" class="" enctype="multipart/form-data">

                                           <div class="form-group">

                                                <label class="control-label ">Blog Title</label>
    
                                                <input type="text" name="blog_title" value="<?php echo $blog_data['blog_title']; ?>" class="form-control" required="required">
    
                                            </div>
                                            
                                            <div class="form-group">

                                                <label class="control-label ">Blog Image</label>
                                                <br>
                                                <img src="documents/<?php echo $blog_data['blog_image']; ?>" height="100px" width="100px"> 
    
                                                <input type="file" name="blog_image" class="form-control" >
    
                                            </div>
                                            
                                            <div class="form-group">

                                                <label class="control-label ">Blog Content</label>
    
                                                <textarea name="blog_content" class="form-control" required="required" rows="10"><?php echo $blog_data['blog_content']; ?></textarea>
    
                                            </div>

                                         

                                             <div class="margiv-top-10">

                                                   

                                                    <button type="submit" name="edit-blog" class="btn green"> Submit </button>

                                                    <a href="./manage-blog.php" class="btn default"> Cancel </a>

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