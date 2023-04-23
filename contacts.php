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

                                        <span class="caption-subject font-green sbold uppercase">Contacts</span>

                                    </div>

                                    <div class="actions">

                                        

                                        <div class="btn-group">

                                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">

                                                <i class="fa fa-share"></i>

                                                <span class="hidden-xs"> Export </span>

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

                                               
                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                <div class="portlet-body">

                                    <div class="table-container">

                                        <table class="table table-striped table-bordered table-hover" id="sample_3">

                                            <thead>

                                                <tr>

                                                    <th> Name </th>

                                                    <th> Email </th>

                                                    <th> Contact </th>

                                                    <th> Comment </th>

                                                    <th> Date </th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

													$contact_qry = mysql_query("select * from `contact_us`");

													while($res = mysql_fetch_array($contact_qry))

													{

														
												?>

                                                

                                                <tr>

                                                    <td> <?php echo $res['name'] ?> </td>

                                                    <td> <?php echo $res['email'] ?> </td>

                                                    <td> <?php echo $res['contact'] ?></td>

                                                    <td> <?php echo $res['comment'] ?> </td>
                                                    
                                                    <td> <?php echo $res['added_date'] ?> </td>


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