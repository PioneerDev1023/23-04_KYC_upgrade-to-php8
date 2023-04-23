<?php
require_once("conn.php");
require_once("user-head.php");
//require_once("user-header.php");
$qry = mysql_query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

$user = mysql_fetch_array($qry);

if(!$user || $user['type'] != 0)
	{
		$url = "index.php";
		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}
	}

$blog_id = $_REQUEST['blog_id'];

if(isset($_REQUEST['comment_save'])){

		
		$comment = $_REQUEST['comment'];
		$user_id = $_SESSION['user_id'];
		
		$contact_qry = mysql_query("insert into `blog_comment` (`blog_id`,`user_id`,`comment`,`added_date`) values('".$blog_id."','".$user_id."','".$comment."','".date('Y-m-d H:i:s')."') ");

		$message = "Comment send successfully.";

		$_SESSION['message'] = $message;

		$url = "view-comment.php?blog_id=".$blog_id;

		

		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}

	}

?>

<style>
.thumbnail {
    padding:0px;
}
.panel {
	position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
</style>

<link href="assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">

<div class="page-header navbar navbar-fixed-top">

            <!-- BEGIN HEADER INNER -->

            <div class="page-header-inner ">

                <!-- BEGIN LOGO -->

                <div class="page-logo">

                    <a href="./user-dashboard.php">

                        <img src="assets/pages/img/logo-big.png" alt="logo" style="padding:10px;" /> </a>

                   

                </div>

                <!-- END LOGO -->

                <!-- BEGIN RESPONSIVE MENU TOGGLER -->

                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

                <!-- END RESPONSIVE MENU TOGGLER -->

                <!-- BEGIN PAGE ACTIONS -->

                <!-- DOC: Remove "hide" class to enable the page header actions -->

                

                <!-- END PAGE ACTIONS -->

                <!-- BEGIN PAGE TOP -->

                <div class="page-top">

                    <!-- BEGIN HEADER SEARCH BOX -->

                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->

                    

                    <!-- END HEADER SEARCH BOX -->

                    <!-- BEGIN TOP NAVIGATION MENU -->

                    <div class="top-menu">

					<style>
						.link{
							color:#aeb2c4 !important;
						}
						.link:hover{
							background-color:#3B3F51 !important;	
						}
						.link:active{
							background-color:#3B3F51 !important;	
						}
					</style>

                        <ul class="nav navbar-nav pull-right">
			
                            <li class="separator hide"> </li>

                            
                            <li class="separator hide"> </li>
                            
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">

                                <a href="./about.php" class="dropdown-toggle link" >About Us</a>
							
                            </li>

                            
                            <li class="separator hide"> </li>

                            
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">

                                <a href="./contact.php" class="dropdown-toggle link" >Contact Us</a>
							
                            </li>

                            <li class="separator hide"> </li>
                            
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">

                                <a href="./blog.php" class="dropdown-toggle link" >Blog</a>
							
                            </li>

                            <li class="separator hide"> </li>
                            
                            <li class="dropdown dropdown-user dropdown-dark">

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                    <span class="username username-hide-on-mobile"> <?php echo $user['user_name'] ?> </span>

                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->

                                    <?php

										if($user['image']){

									?>

									

									<img src="documents/<?php echo $user['image']; ?>"  class="img-circle" alt="" /> 

									

									<?php } else { ?>

									

									<img src="assets/global/img/no-image.jpg" class="img-circle" alt="" /> 

									

									<?php } ?>

                                    

                                </a>

                                    

                                

                            </li>

                            <!-- END USER LOGIN DROPDOWN -->

                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->

                            <li class="dropdown dropdown-extended quick-sidebar-toggler">

                                <span class="sr-only">Toggle Quick Sidebar</span>

                                <style>
									.logout-css:hover{
										background-color:#3B3F51 !important;	
									}
									.logout-css:active{
										background-color:#3B3F51 !important;	
									}
								</style>
                                <a href="./logout.php" class="logout-css" style="padding:0 !important; color:#FFF;"><i class="icon-logout"></i></a>

                            </li>

                            <!-- END QUICK SIDEBAR TOGGLER -->

                        </ul>

                    </div>

                    <!-- END TOP NAVIGATION MENU -->

                </div>

                <!-- END PAGE TOP -->

            </div>

            <!-- END HEADER INNER -->

        </div>

<div class="page-container">
            <!-- BEGIN SIDEBAR -->
            
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
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

                <!-- BEGIN CONTENT BODY -->
                <div class="">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Blog
                                
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="./user-dashboard.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">General</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="blog-page blog-content-1">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                            
                            	
                                <?php
								
									$blog_qry = mysql_query("select * from `blog` where `blog_id`='".$blog_id."' ");
									
									$blog_res = mysql_fetch_array($blog_qry);
									
									
								?>
                                
                            
                                <div class="blog-post-lg bordered blog-container">
                                    <div class="blog-img-thumb">
                                        <a href="javascript:;">
                                            <img src="documents/<?php echo $blog_res['blog_image'] ?>" />
                                        </a>
                                    </div>
                                    <div class="blog-post-content">
                                        <h2 class="blog-title blog-post-title">
                                            <a href="javascript:;"><?php echo $blog_res['blog_title'] ?></a>
                                        </h2>
                                        <p class="blog-post-desc"> 
                                        <?php echo $blog_res['blog_content'] ?>
                                        </p>
                                        <div class="blog-post-foot">
                                            <div class="blog-post-meta">
                                                <i class="icon-calendar font-blue"></i>
                                                <a href="javascript:;"><?php echo date('M d Y', strtotime($blog_res['added_date']))  ?></a>
                                            </div>
                                            <div class="blog-post-meta">
                                                <i class="fa fa-chevron-left font-blue"></i>
                                                <a href="./blog.php"> Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
								
                                $comment_qry = mysql_query("select * from `blog_comment` where `blog_id`='".$blog_id."' ");

								while($comment_res = mysql_fetch_array($comment_qry))																
                                {
									
									$comment_user_qry = mysql_query("select * from `users` where `user_id`='".$comment_res['user_id']."' ");

									$comment_user_data = mysql_fetch_array($comment_user_qry);
								?> 
                                
                                   <div class="col-sm-2">
                                    <div class="thumbnail">
                                   
                                    <?php

										if($comment_user_data['image']){

									?>

									<img src="documents/<?php echo $comment_user_data['image']; ?>" class="img-responsive"  alt="" /> 


									<?php } else { ?>
									

									<img src="assets/global/img/no-image.jpg" class="img-responsive" alt="" /> 
									

									<?php } ?>
                                    
                                    </div><!-- /thumbnail -->
                                    </div><!-- /col-sm-1 -->
                                    
                                    <div class="col-sm-10">
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <strong><?php echo $comment_user_data['user_name']; ?></strong> <span class="text-muted"><?php echo date('M d Y',strtotime($comment_user_data['added_date'])); ?></span>
                                    </div>
                                    <div class="panel-body">
                                   <?php echo $comment_res['comment']; ?>
                                    </div><!-- /panel-body -->
                                    </div><!-- /panel panel-default -->
                                    </div><!-- /col-sm-5 -->
                                
                                
                                <?php } ?>
                                
                                
                                
                                <div style="clear:both;"></div>
                                <br><br />
                                	 <div class="blog-post-lg bordered blog-container">
                                	<form action="" method="post">
                                        
                                        <div class="form-group">
                                            <textarea rows="3" name="comment" required placeholder="Write comment here ..." class="form-control input-md"></textarea>
                                        </div>
                                        <button type="submit" class="btn grey" name="comment_save">Submit</button>
                                    </form>
                                    </div>
                                
                            </div>
                            
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