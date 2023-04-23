<?php

	require_once("conn.php");

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

	$country_qry = mysql_query("select * from `country` where `country_id`='".$user['country_id']."' ");

	$country = mysql_fetch_array($country_qry);

	

	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

	$uri_segments = explode('/', $uri_path);

	

	$current_page = "";

	

	$dashboard = "";

	$update_info = "";

	if($uri_segments[2] == 'user-dashboard.php')

	{

		$dashboard = "active";

		$current_page = "My KYC";

	}

	else if($uri_segments[2] == 'user-update-info.php')

	{

		$update_info = "active";

		$current_page = "Update Info";

	}

	

	/*

	

	//Expire the session if user is inactive for 30

	//minutes or more.

	$expireAfter = 30;

	 

	//Check to see if our "last action" session

	//variable has been set.

	if(isset($_SESSION['user_id'])){

		

		//Figure out how many seconds have passed

		//since the user was last active.

		$secondsInactive = time() - $_SESSION['user_id'];

		

		echo "hiii=".$secondsInactive."<br>";

		echo date('H:i:s',$secondsInactive);

		//Convert our minutes into seconds.

		echo "<br>hello".$expireAfterSeconds = $expireAfter * 60;

		exit;

		//Check to see if they have been inactive for too long.

		//if($secondsInactive >= $expireAfterSeconds){

		  if($secondsInactive >= 60){	

			//User has been inactive for too long.

			//Kill their session.

			//$_SESSION['last_session_id'] = $_SESSION['user_id'];

			//unset($_SESSION["user_id"]);

			//header("Location: /kyc/lock-screen.php");

			

		}

		

	}

		*/

	

?>



<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">

        <!-- BEGIN HEADER -->

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

        <!-- END HEADER -->

        <!-- BEGIN HEADER & CONTENT DIVIDER -->

        <div class="clearfix"> </div>

        <!-- END HEADER & CONTENT DIVIDER -->

        <!-- BEGIN CONTAINER -->

        <div class="page-container">

           

            <!-- BEGIN CONTENT -->

            <div class="">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="page-head">

                        <!-- BEGIN PAGE TITLE -->

                        <div class="page-title">

                            <h1>User / Company | Account

                                

                            </h1>

                        </div>

                        <!-- END PAGE TITLE -->

                       

                    </div>

                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE BREADCRUMB -->

                    <ul class="page-breadcrumb breadcrumb">

                        <li>

                            <a href="index.html">Home</a>

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

											if($user['image']){

										?>

										

										<img src="documents/<?php echo $user['image']; ?>"  class="img-responsive" alt="" /> </div>

										

										<?php } else { ?>

										

										<img src="assets/global/img/no-image.jpg"  class="img-responsive" alt="" /> </div>

										

										<?php } ?>

                                    

                                    <!-- END SIDEBAR USERPIC -->

                                    <!-- SIDEBAR USER TITLE -->

                                    <div class="profile-usertitle">

                                        <div class="profile-usertitle-name"> <?php echo $user['user_name'] ?> </div>

                                        <div class="profile-usertitle-job"> <?php echo $country['country_name'] ?> </div>

                                    </div>

                                    <!-- END SIDEBAR USER TITLE -->

                                    <!-- SIDEBAR BUTTONS -->

                                    <div class="col-md-12">
                                    
										<div class="progress-info">
											<?php
												    $user_uploaded_doc = 0;
													$user_doc_qry = mysql_query("select * from `user_documents` where `user_id`='".$_SESSION['user_id']."' ");

													 while($data =  mysql_fetch_array($user_doc_qry)){
														$user_uploaded_doc++;
													 }
													 
													 $d_qry = mysql_query("select * from `dynamic_value` where `user_id`='".$_SESSION['user_id']."' ");
													 while($d_data =  mysql_fetch_array($d_qry)){
														$user_uploaded_doc++;	
													 }
													 
													 

													 $kyc_list_qry = mysql_query("select * from `kyc_list` where `country_id`='".$user['country_id']."' and `region_name`='".$user['region']."' ");
													 $kyc_data = mysql_fetch_array($kyc_list_qry);
													 
													 $docs = trim($kyc_data['document_list'],",");
													 $doc = explode(",",$docs);

													 $total_doc = 0;
													 foreach($doc as $document){
													 	 $total_doc ++;
													 }
													 
													 $rbs = trim($kyc_data['radio_button'],",");
													 $rbs = explode(",",$rbs);
													 $rbs = array_filter($rbs);
													 foreach($rbs as $rb){
														 $total_doc ++; 
													 }
													 
													 $cbs = trim($kyc_data['checkbox'],",");
													 $cbs = explode(",",$cbs);
													 $cbs = array_filter($cbs);
													 foreach($cbs as $cb){
														 $total_doc ++;
													 }
													 
													 $tfs = trim($kyc_data['text_field'],",");
													 $tfs = explode(",",$tfs);
													 $tfs = array_filter($tfs);
													 foreach($tfs as $tf){
														 $total_doc ++; 
													 }
													 
													 $percent =  $user_uploaded_doc * 100 / $total_doc;

											?>
                                            <div class="progress">
        
                                                <span style="width: <?php echo round($percent,0); ?>%;" class="progress-bar progress-bar-success green-sharp">
        
                                                    <span class="sr-only"><?php echo round($percent,0); ?>% progress</span>
        
                                                </span>
        
                                            </div>
        
                                            <div class="status">
        
                                                <div class="status-title"> Profile <?php echo round($percent,0); ?>% completed </div>
        
        									</div>

                                		</div>
												
                                    </div>
									<div style="clear:both;"></div>
                                    <!-- END SIDEBAR BUTTONS -->

                                    <!-- SIDEBAR MENU -->

                                    <div class="profile-usermenu">

                                        <ul class="nav">

                                            <li class="<?php echo $dashboard; ?>">

                                                <a href="./user-dashboard.php">

                                                    <i class="icon-wallet"></i> My Kyc </a>

                                            </li>

                                            <li class="<?php echo $update_info; ?>">

                                                <a href="./user-update-info.php">

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