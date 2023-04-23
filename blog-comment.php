<?php

	require_once("conn.php");

	require_once("admin-head.php");

	require_once("admin-header.php");

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

                                    

                            <!-- Begin: life time stats -->

                            <div class="portlet light portlet-fit portlet-datatable bordered">

                            	

                                <div class="portlet-title">

                                    <div class="caption">

                                        <i class="icon-settings font-green"></i>

                                        <span class="caption-subject font-green sbold uppercase">Blog Comments</span>

                                    </div>

                                    

                                    <div class="actions">

                                                                                

                                        <!--<div class="btn-group">

                                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">

                                                <i class="fa fa-share"></i>

                                                <span class="hidden-xs"> Trigger Tools </span>

                                                <i class="fa fa-angle-down"></i>

                                            </a>

                                            <ul class="dropdown-menu pull-right" id="sample_3_tools">

                                                <li>

                                                    <a href="javascript:;" data-action="0" class="tool-action">

                                                        <i class="icon-printer"></i> Print</a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;" data-action="1" class="tool-action">

                                                        <i class="icon-check"></i> Copy</a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;" data-action="2" class="tool-action">

                                                        <i class="icon-doc"></i> PDF</a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;" data-action="3" class="tool-action">

                                                        <i class="icon-paper-clip"></i> Excel</a>

                                                </li>

                                                <li>

                                                    <a href="javascript:;" data-action="4" class="tool-action">

                                                        <i class="icon-cloud-upload"></i> CSV</a>

                                                </li>

                                                <li class="divider"> </li>

                                                <li>

                                                    <a href="javascript:;" data-action="5" class="tool-action">

                                                        <i class="icon-refresh"></i> Reload</a>

                                                </li>

                                                </li>

                                            </ul>

                                        </div>-->

                                    </div>

                                </div>

                                <div class="portlet-body">

                                    <div class="table-container">

                                        <table class="table table-striped table-bordered table-hover" id="sample_3">

                                            <thead>

                                                <tr>

                                                    <th> User Name </th>

                                                    <th> User Email </th>
                                                    
                                                    <th> Comment </th>
                                                    
                                                    <th> Date </th>

                                                    <th> Action </th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

													$qry = $conn->query("select * from `blog_comment` where `blog_id` = '".$_REQUEST['blog_id']."' ");

													while($res =  $qry->fetch_array()){

														$user_qry = $conn->query("select * from `users` where `user_id` = '".$res['user_id']."' ");
														$user_data = $user_qry->fetch_array();
												?>

                                                <tr>

                                                    <td><?php echo $user_data['user_name']; ?></td>

                                                    <td> <?php echo $user_data['email']; ?> </td>
                                                    
                                                    <td> <?php echo $res['comment']; ?> </td>
                                                    
                                                    <td> <?php echo $res['added_date']; ?> </td>

                                                    <td> 
                                                    	
                                                        <a href="./delete-blog-comment.php?blog_comment_id=<?php echo $res['blog_comment_id'] ?>&blog_id=<?php echo $res['blog_id'] ?>" onclick="return confirm('Are you sure to delete this record ?')" data-toggle="tooltip" title="Delete"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a> 

                                                    </td>

                                                </tr>

                                                <?php } ?>

                                                

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                            <!-- End: life time stats -->

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

<?php

	require_once("admin-foot.php");

?>

<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>

<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>


<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script src="assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script> 