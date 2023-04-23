<?php

	require_once("conn.php");

	$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

	$admin = $qry->fetch_array();
	
	if(!$admin || $admin['type'] != 1)
	{
		$url = "index.php";
		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}
	}

	

	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

	$uri_segments = explode('/', $uri_path);

	

	$current_page = "";

	

	$dashboard = "";

	$report = "";

	$kyc_form = "";

	$update_info = "";
	
	$contact = "";
	
	$blog = "";
	
	$manage_users = "";

    if($uri_segments[1] == 'admin-dashboard.php')

	{

		$dashboard = "active";

		$current_page = "Dashboard";

	}

	else if($uri_segments[1] == 'report.php')

	{

		$report = "active";

		$current_page = "Report";

	}

	else if($uri_segments[1] == 'kyc-form.php' )

	{

		$kyc_form = "active";

		$current_page = "KYC Form";

	}

	else if($uri_segments[1] == 'new-kyc.php' )

	{

		$kyc_form = "active";

		$current_page = "Add New KYC Form";

	}

	else if($uri_segments[1] == 'edit-kyc.php' )

	{

		$kyc_form = "active";

		$current_page = "Update KYC Form";

	}

	else if($uri_segments[1] == 'update-info.php')

	{

		$update_info = "active";

		$current_page = "Update Info";

	}
	
	else if($uri_segments[1] == 'contacts.php')

	{

		$contact = "active";

		$current_page = "Contact";

	}
	
	else if($uri_segments[1] == 'manage-blog.php' || $uri_segments[1] == 'new-blog.php' || $uri_segments[1] == 'edit-blog.php' || $uri_segments[1] =='blog-comment.php')

	{

		$blog = "active";

		$current_page = "Blog";

	}
	
	else if($uri_segments[1] == 'manage-users.php')

	{

		$manage_users = "active";

		$current_page = "Manage Users";

	}

    else

    {
        echo "ocurred error in uri_segments(contact email: pioneerdev1023@gmail.com)";
    }

		

	

?>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">

        <!-- BEGIN HEADER -->

        <div class="page-header navbar navbar-fixed-top">

            <!-- BEGIN HEADER INNER -->

            <div class="page-header-inner ">

                <!-- BEGIN LOGO -->

                <div class="page-logo">

                    <a href="./admin-dashboard.php">

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





                        <ul class="nav navbar-nav pull-right">

                            <li class="separator hide"> </li>

                            <!-- BEGIN NOTIFICATION DROPDOWN -->

                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                            <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->

                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

                            

                            <!-- END NOTIFICATION DROPDOWN -->

                            <li class="separator hide"> </li>

                            <!-- BEGIN INBOX DROPDOWN -->

                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                            

                            <!-- END INBOX DROPDOWN -->

                            <li class="separator hide"> </li>

                            <!-- BEGIN TODO DROPDOWN -->

                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                            

                            <!-- END TODO DROPDOWN -->

                            <!-- BEGIN USER LOGIN DROPDOWN -->

                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                            <li class="dropdown dropdown-user dropdown-dark">

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                                    <span class="username username-hide-on-mobile"> <?php echo $admin['user_name'] ?> </span>

                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->

                                    

                                    <?php

										if($admin['image']){

									?>

									

									<img alt="" class="img-circle" src="documents/<?php echo $admin['image']; ?>" /> 

									

									<?php } else { ?>

									

									<img alt="" class="img-circle" src="assets/global/img/no-image.jpg" /> 

									

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

        <!-- END HEADER -->

		<!-- BEGIN HEADER & CONTENT DIVIDER -->

        <div class="clearfix"> </div>

        <!-- END HEADER & CONTENT DIVIDER -->

        

        

        

        

        <!-- BEGIN HEADER & CONTENT DIVIDER -->

        <div class="clearfix"> </div>

        <!-- END HEADER & CONTENT DIVIDER -->

        <!-- BEGIN CONTAINER -->

        <div class="page-container">

            <!-- BEGIN SIDEBAR -->

          

            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->

            <div class="">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="page-head">

                        <!-- BEGIN PAGE TITLE -->

                        <div class="page-title">

                            <h1>Admin | Account

                                <!--<small>user account page</small>-->

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

                            <a href="./admin-dashboard.php">Home</a>

                            <i class="fa fa-circle"></i>

                        </li>

                        <li>

                            <span class="active"><?php echo $current_page; ?></span>

                        </li>

                    </ul>

                    <!-- END PAGE BREADCRUMB -->

                    <!-- BEGIN PAGE BASE CONTENT -->

                    <div class="row">

                        <div class="col-md-12">

                            <!-- BEGIN PROFILE SIDEBAR -->

                            <div class="profile-sidebar">

                                <!-- PORTLET MAIN -->

                                <div class="portlet light profile-sidebar-portlet bordered">

                                    <!-- SIDEBAR USERPIC -->

                                    <div class="profile-userpic">

                                    	

                                        <?php

											if($admin['image']){

										?>

										

										<img src="documents/<?php echo $admin['image']; ?>"  class="img-responsive" alt="" /> </div>

										

										<?php } else { ?>

										

										<img src="assets/global/img/no-image.jpg"  class="img-responsive" alt="" /> </div>

										

										<?php } ?>

                                    

                                        

                                    <!-- END SIDEBAR USERPIC -->

                                    <!-- SIDEBAR USER TITLE -->

                                    <div class="profile-usertitle">

                                        <div class="profile-usertitle-name"> <?php echo $admin['user_name'] ?> </div>

                                        <div class="profile-usertitle-job"> Administrator </div>

                                    </div>

                                    <!-- END SIDEBAR USER TITLE -->

                                    <!-- SIDEBAR BUTTONS -->

                                    
                                    <!-- END SIDEBAR BUTTONS -->

                                    <!-- SIDEBAR MENU -->

                                    <div class="profile-usermenu">

                                        <ul class="nav">

                                            <li class="<?php echo $dashboard; ?>">

                                                <a href="./admin-dashboard.php">

                                                    <i class="icon-home"></i> Dashboard </a>

                                            </li>

                                            <li class="<?php echo $report; ?>">

                                                <a href="./report.php">

                                                    <i class="icon-bar-chart"></i> Report </a>

                                            </li>

                                            <li class="<?php echo $kyc_form; ?>">

                                                <a href="./kyc-form.php">

                                                    <i class="icon-wallet"></i> KYC Form </a>

                                            </li>
											
                                            <li class="<?php echo $contact; ?>">

                                                <a href="./contacts.php">

                                                    <i class="icon-user"></i> Contact </a>

                                            </li>
                                            
                                            <li class="<?php echo $manage_users; ?>">

                                                <a href="./manage-users.php">

                                                    <i class="icon-user"></i> Manage Users </a>

                                            </li>
                                            
                                            <li class="<?php echo $blog; ?>">

                                                <a href="./manage-blog.php">

                                                    <i class="fa fa-newspaper-o"></i> Blog </a>

                                            </li>
                                            
                                            <li class="<?php echo $update_info; ?>">

                                                <a href="./update-info.php">

                                                    <i class="icon-settings"></i> Update Info </a>

                                            </li>

                                        </ul>

                                    </div>

                                    <!-- END MENU -->

                                </div>

                                <!-- END PORTLET MAIN -->

                                <!-- PORTLET MAIN -->

                                

                                <!-- END PORTLET MAIN -->

                            </div>

                            <!-- END BEGIN PROFILE SIDEBAR -->

        

        

        

        

        

        