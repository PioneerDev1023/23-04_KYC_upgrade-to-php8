<?php

	require_once("conn.php");

	require_once("admin-head.php");

	require_once("admin-header.php");

?>

<!-- BEGIN PROFILE CONTENT -->

                            <div class="profile-content">

                                <div class="row">

                                    <div class="col-md-12">

                            <!-- Begin: life time stats -->

                            <div class="portlet light portlet-fit portlet-datatable bordered">

                                <div class="portlet-title">

                                    <div class="caption">

                                        <i class="icon-settings font-green"></i>

                                        <span class="caption-subject font-green sbold uppercase">Users</span>

                                    </div>

                                    <div class="actions">

                                        

                                        

                                    </div>

                                </div>

                                <div class="portlet-body">

                                    <div class="table-container">

                                        <table class="table table-striped table-bordered table-hover" id="datatable">

                                            <thead>

                                                <tr>

                                                    <th> User Name </th>

                                                    <th> Email </th>

                                                    <th> Country </th>

                                                    <th> Region </th>
                                                    
                                                    <th> Date </th>
                                                    
                                                    <th> Action </th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

													$report_qry = $conn->query("select * from `users` where `type`='0' ");

													while($res = $report_qry->fetch_array())

													{

														$country_qry = $conn->query("select * from `country` where `country_id`='".$res['country_id']."' ");

														$country_data = $country_qry->fetch_array();

												?>

                                                

                                                <tr>

                                                    <td> <?php echo $res['user_name'] ?> </td>

                                                    <td> <?php echo $res['email'] ?> </td>

                                                    <td> <?php echo $country_data['country_name'] ?></td>
                                                    
                                                    <td> <?php echo $res['region'] ?> </td>

                                                    <td> <?php echo $res['added_date'] ?> </td>
                                                    
                                                    <td> <a href="./edit-user.php?user_id=<?php echo $res['user_id'] ?>" data-toggle="tooltip" title="Edit"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                                    	 <a href="./delete-user.php?user_id=<?php echo $res['user_id'] ?>" onclick="return confirm('Are you sure to delete this record ?')" data-toggle="tooltip" title="Delete"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a> 

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

<script src="assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script> 

<script>
$("#datatable").DataTable();
</script>