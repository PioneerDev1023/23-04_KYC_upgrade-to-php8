<?php

	require_once("conn.php");

	require_once("admin-head.php");

	require_once("admin-header.php");

	

	

	if(isset($_REQUEST['add-new-blog']))
	{
		
		$blog_title = $_REQUEST['blog_title'];
		$blog_content = $_REQUEST['blog_content'];
		
		$path_parts = pathinfo($_FILES['blog_image']['name']);
		$extension = $path_parts['extension'];
		$file_name = uniqid().".".$extension;
		
		move_uploaded_file($_FILES['blog_image']['tmp_name'],'documents/'.$file_name);
		
		

		$qry = mysql_query("insert into `blog` (`blog_title`,`blog_image`,`blog_content`,`added_date`) values('".$blog_title."','".$file_name."','".$blog_content."','".date('Y-m-d H:i:s')."')  ");

		

		$message = "Blog added successfully.";

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

                                                    <span class="caption-subject font-blue-madison bold uppercase">Add New Blog</span>

                                                </div>

                                                

                                            </div>

                                            <div class="portlet-body">

                                  <form role="form" action="" method="post" class="" enctype="multipart/form-data">

                                           <div class="form-group">

                                                <label class="control-label ">Blog Title</label>
    
                                                <input type="text" name="blog_title" class="form-control" required="required">
    
                                            </div>
                                            
                                            <div class="form-group">

                                                <label class="control-label ">Blog Image</label>
    
                                                <input type="file" name="blog_image" class="form-control" required="required">
    
                                            </div>
                                            
                                            <div class="form-group">

                                                <label class="control-label ">Blog Content</label>
    
                                                <textarea name="blog_content" class="form-control" required="required" rows="10"></textarea>
    
                                            </div>

                                         

                                             <div class="margiv-top-10">

                                                   

                                                    <button type="submit" name="add-new-blog" class="btn green"> Submit </button>

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