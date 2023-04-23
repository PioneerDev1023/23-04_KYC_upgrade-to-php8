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


if(isset($_REQUEST['contact_save'])){

		
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$contact = $_REQUEST['contact'];
		$comment = $_REQUEST['comment'];
		
		$contact_qry = mysql_query("insert into `contact_us` (`name`,`email`,`contact`,`comment`,`added_date`) values('".$name."','".$email."','".$contact."','".$comment."','".date('Y-m-d H:i:s')."') ");

		$message = "Contact form submited successfully. we'll contact you soon. ";

		$_SESSION['message'] = $message;

		$url = "contact.php";

		

		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}

	}

?>
<link href="assets/pages/css/contact.min.css" rel="stylesheet" type="text/css" />

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
                            <h1>Contact Us
                               
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                       
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="./user-dashboard.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Contact Us</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="c-content-contact-1 c-opt-1">
                        <div class="row" data-auto-height=".c-height">
                            <div class="col-lg-8 col-md-6 c-desktop"></div>
                            <div class="col-lg-4 col-md-6">
                                <div class="c-body">
                                    <div class="c-section">
                                        <h3>Cloudstar</h3>
                                    </div>
                                    <div class="c-section">
                                        <div class="c-content-label uppercase bg-blue">Address</div>
                                        <p>25, Lorem Lis Street,
                                            <br/>Orange C, California,
                                            <br/>United States of America</p>
                                    </div>
                                    <div class="c-section">
                                        <div class="c-content-label uppercase bg-blue">Contacts</div>
                                        <p>
                                            <strong>T</strong> 800 123 0000
                                            <br/>
                                            <strong>F</strong> 800 123 8888</p>
                                    </div>
                                    <div class="c-section">
                                        <div class="c-content-label uppercase bg-blue">Social</div>
                                        <br/>
                                        <ul class="c-content-iconlist-1 ">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 615px;"></div>
                    </div>
                    <div class="c-content-feedback-1 c-option-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="c-container bg-green">
                                    <div class="c-content-title-1 c-inverse">
                                        <h3 class="uppercase">Need to know more?</h3>
                                        <div class="c-line-left"></div>
                                        <p class="c-font-lowercase">Try visiting our FAQ page to learn more about our greatest ever expanding theme, Metronic.</p>
                                        <button class="btn grey-cararra font-dark">Learn More</button>
                                    </div>
                                </div>
                                <div class="c-container bg-grey-steel">
                                    <div class="c-content-title-1">
                                        <h3 class="uppercase">Have a question?</h3>
                                        <div class="c-line-left bg-dark"></div>
                                        
                                        <p>Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="c-contact">
                                    <div class="c-content-title-1">
                                        <h3 class="uppercase">Keep in touch</h3>
                                        <div class="c-line-left bg-dark"></div>
                                        <p class="c-font-lowercase">Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you as soon as we can.</p>
                                    </div>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" required placeholder="Your Name" class="form-control input-md"> </div>
                                        <div class="form-group">
                                            <input type="email" name="email" required placeholder="Your Email" class="form-control input-md"> </div>
                                        <div class="form-group">
                                            <input type="text" name="contact" required placeholder="Contact Phone" class="form-control input-md"> </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="comment" required placeholder="Write comment here ..." class="form-control input-md"></textarea>
                                        </div>
                                        <button type="submit" class="btn grey" name="contact_save">Submit</button>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaTaxpkkQlfytcCgDhN6Ymk7dJky_63S0&callback=initMap" type="text/javascript"></script>
<!--<script src="assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>-->
<script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
<!--<script src="assets/pages/scripts/contact.js" type="text/javascript"></script>-->

<script>
  function initMap() {
	var uluru = {lat: 12.9716, lng: 77.5946};
	var map = new google.maps.Map(document.getElementById('gmapbg'), {
	  zoom: 10,
	  center: uluru
	});
	var marker = new google.maps.Marker({
	  position: uluru,
	  map: map
	});
  }
</script>