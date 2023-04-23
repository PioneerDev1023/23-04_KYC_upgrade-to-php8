<?php
require_once("conn.php");
require_once("user-head.php");
//require_once("user-header.php");
$qry = $conn->query("select * from `users` where `user_id`='".$_SESSION['user_id']."' ");

$user = $qry->fetch_array();

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

?>
<link href="assets/pages/css/about.min.css" rel="stylesheet" type="text/css" />

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
            
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>About Us
                                
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            
                            <!-- END THEME PANEL -->
                        </div>
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
                            <span class="active">About Us</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- BEGIN CONTENT HEADER -->
                    <div class="row margin-bottom-40 about-header">
                        <div class="col-md-12">
                            <h1>About Us</h1>
                            <h2>Life is either a great adventure or nothing</h2>
                            <button type="button" class="btn btn-danger">JOIN US TODAY</button>
                        </div>
                    </div>
                    <!-- END CONTENT HEADER -->
                    <!-- BEGIN CARDS -->
                    <div class="row margin-bottom-20">
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="card-icon">
                                    <i class="icon-user-follow font-red-sunglo theme-font"></i>
                                </div>
                                <div class="card-title">
                                    <span> Best User Expierence </span>
                                </div>
                                <div class="card-desc">
                                    <span> The best way to find yourself is
                                        <br> to lose yourself in the service of others </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="card-icon">
                                    <i class="icon-trophy font-green-haze theme-font"></i>
                                </div>
                                <div class="card-title">
                                    <span> Awards Winner </span>
                                </div>
                                <div class="card-desc">
                                    <span> The best way to find yourself is
                                        <br> to lose yourself in the service of others </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="card-icon">
                                    <i class="icon-basket font-purple-wisteria theme-font"></i>
                                </div>
                                <div class="card-title">
                                    <span> eCommerce Components </span>
                                </div>
                                <div class="card-desc">
                                    <span> The best way to find yourself is
                                        <br> to lose yourself in the service of others </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="card-icon">
                                    <i class="icon-layers font-blue theme-font"></i>
                                </div>
                                <div class="card-title">
                                    <span> Adaptive Components </span>
                                </div>
                                <div class="card-desc">
                                    <span> The best way to find yourself is
                                        <br> to lose yourself in the service of others </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CARDS -->
                    <!-- BEGIN TEXT & VIDEO -->
                    <div class="row margin-bottom-40">
                        <div class="col-lg-6">
                            <div class="portlet light about-text">
                                <h4>
                                    <i class="fa fa-check icon-info"></i> About Metronic</h4>
                                <p class="margin-top-20"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
                                    odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled margin-top-10 margin-bottom-10">
                                            <li>
                                                <i class="fa fa-check"></i> Nam liber tempor cum soluta </li>
                                            <li>
                                                <i class="fa fa-check"></i> Mirum est notare quam </li>
                                            <li>
                                                <i class="fa fa-check"></i> Lorem ipsum dolor sit amet </li>
                                            <li>
                                                <i class="fa fa-check"></i> Mirum est notare quam </li>
                                            <li>
                                                <i class="fa fa-check"></i> Mirum est notare quam </li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled margin-top-10 margin-bottom-10">
                                            <li>
                                                <i class="fa fa-check"></i> Nam liber tempor cum soluta </li>
                                            <li>
                                                <i class="fa fa-check"></i> Mirum est notare quam </li>
                                            <li>
                                                <i class="fa fa-check"></i> Lorem ipsum dolor sit amet </li>
                                            <li>
                                                <i class="fa fa-check"></i> Mirum est notare quam </li>
                                            <li>
                                                <i class="fa fa-check"></i> Mirum est notare quam </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="about-quote">
                                    <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</h3>
                                    <p class="about-author">Tom Hardy, 2015</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <iframe src="http://player.vimeo.com/video/22439234" style="width:100%; height:500px;border:0" allowfullscreen> </iframe>
                        </div>
                    </div>
                    <!-- END TEXT & VIDEO -->
                    <!-- BEGIN MEMBERS SUCCESS STORIES -->
                    <div class="row margin-bottom-40 stories-header" data-auto-height="true">
                        <div class="col-md-12">
                            <h1>Members Success Stories</h1>
                            <h2>Life is either a great adventure or nothing</h2>
                        </div>
                    </div>
                    <div class="row margin-bottom-20 stories-cont">
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="photo">
                                    <img src="assets/pages/media/users/teambg1.jpg" alt="" class="img-responsive" /> </div>
                                <div class="title">
                                    <span> Mark Wahlberg </span>
                                </div>
                                <div class="desc">
                                    <span> We are at our very best, and we are happiest, when we are fully engaged in work we enjoy on the journey toward the goal we've established for ourselves. </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="photo">
                                    <img src="assets/pages/media/users/teambg2.jpg" alt="" class="img-responsive" /> </div>
                                <div class="title">
                                    <span> Lindsay Lohan </span>
                                </div>
                                <div class="desc">
                                    <span> Do what you love to do and give it your very best. Whether it's business or baseball, or the theater, or any field. If you don't love what you're doing and you can't give it your best, get out of it. </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="photo">
                                    <img src="assets/pages/media/users/teambg5.jpg" alt="" class="img-responsive" /> </div>
                                <div class="title">
                                    <span> John Travolta </span>
                                </div>
                                <div class="desc">
                                    <span> To be nobody but yourself in a world which is doing its best, to make you everybody else means to fight the hardest battle which any human being can fight; and never stop fighting. </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="portlet light">
                                <div class="photo">
                                    <img src="assets/pages/media/users/teambg8.jpg" alt="" class="img-responsive" /> </div>
                                <div class="title">
                                    <span> Tom Brady </span>
                                </div>
                                <div class="desc">
                                    <span> You have to accept whatever comes and the only important thing is that you meet it with courage and with the best that you have to give. Never give up, never surrender. Go all out or gain nothing. </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row margin-bottom-40 stories-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger">SEE MORE STORIES</button>
                        </div>
                    </div>
                    <!-- END MEMBERS SUCCESS STORIES -->
                    <!-- BEGIN LINKS BLOCK -->
                    <div class="row about-links-cont" data-auto-height="true">
                        <div class="col-md-6 about-links">
                            <div class="row">
                                <div class="col-sm-6 about-links-item">
                                    <h4>UX & Design</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Ui Features</a>
                                        </li>
                                        <li>
                                            <a href="#">Ui Components</a>
                                        </li>
                                        <li>
                                            <a href="#">Flat UI Colors</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 about-links-item">
                                    <h4>eCommerce</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="#">Orders</a>
                                        </li>
                                        <li>
                                            <a href="#">Products</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 about-links-item">
                                    <h4>Page Layouts</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Boxed Page</a>
                                        </li>
                                        <li>
                                            <a href="#">Full Width</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 about-links-item">
                                    <h4>Form Stuff</h4>
                                    <ul>
                                        <li>
                                            <a href="#">Material Forms</a>
                                        </li>
                                        <li>
                                            <a href="#">Form Wizard</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 about-links-item">
                                    <h4>Charts</h4>
                                    <ul>
                                        <li>
                                            <a href="#">amChart</a>
                                        </li>
                                        <li>
                                            <a href="#">Flotchart</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 about-links-item">
                                    <h4>Portlets</h4>
                                    <ul>
                                        <li>
                                            <a href="#">General Portlets</a>
                                        </li>
                                        <li>
                                            <a href="#">Ajax Portlets</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="about-image" style="background: url(assets/pages/media/works/img4.jpg) center no-repeat;"></div>
                        </div>
                    </div>
                    <!-- END LINKS BLOCK -->
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