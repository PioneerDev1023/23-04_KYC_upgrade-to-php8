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

                                        <span class="caption-subject font-green sbold uppercase">User Details</span>

                                    </div>

                                    

                                </div>

                                <div class="portlet-body">

                                    <div class="table-container">

                                        <table class="table table-striped table-bordered table-hover" id="sample_3">

                                            

                                            <tbody>

                                                <?php

													$user_qry = mysql_query("select * from `users` where `user_id`='".$_REQUEST['user_id']."' ");

													$user_data = mysql_fetch_array($user_qry);

													

													$country_qry = mysql_query("select * from `country` where `country_id`='".$user_data['country_id']."' ");

													$country_data = mysql_fetch_array($country_qry);

												?>

                                                

                                                <tr>

                                                	<td> User Image : </td>

                                                    <td colspan="2"> 

                                                    <?php

														if($user_data['image']){

													?>

													

													<img src="documents/<?php echo $user_data['image']; ?>" height="100px" width="100px" alt="" /> </div>

													

													<?php } else { ?>

													

													<img src="assets/global/img/no-image.jpg" alt="" /> </div>

													

													<?php } ?>

                                                    </td>

                                                </tr>

                                                <tr>

                                                	<td> User Name : </td>

                                                    <td colspan="2"> <?php echo $user_data['user_name'] ?> </td>

                                                </tr>

                                                <tr>

                                                	<td> Email : </td>

                                                    <td colspan="2"> <?php echo $user_data['email'] ?> </td>

                                                </tr>

                                                <tr>

                                                	<td> Region : </td>

                                                    <td colspan="2"> <?php echo $user_data['region'] ?> </td>

                                                </tr>

                                                <tr>

                                                	<td> City / Town : </td>

                                                    <td colspan="2"> <?php echo $user_data['city'] ?> </td>

                                                </tr>

                                                <tr>

                                                	<td> Country Name : </td>

                                                    <td colspan="2"> <?php echo $country_data['country_name'] ?> </td>

                                                </tr>

												<tr>

                                                	<td> Profile Completion : </td>

                                                    <td colspan="2"> 
                                                    <div class="col-md-12">
                                    
                                                        <div class="progress-info">
                                                            <?php
                                                                    $user_uploaded_doc = 0;
                                                                    $user_doc_qry = mysql_query("select * from `user_documents` where `user_id`='".$user_data['user_id']."' ");
                
                                                                     while($data =  mysql_fetch_array($user_doc_qry)){
                                                                        $user_uploaded_doc++;
                                                                     }
																	 
																	 $d_qry = mysql_query("select * from `dynamic_value` where `user_id`='".$user_data['user_id']."' ");
																	 while($d_data =  mysql_fetch_array($d_qry)){
																		$user_uploaded_doc++;	
																	 }
                
                                                                     $kyc_list_qry = mysql_query("select * from `kyc_list` where `country_id`='".$country_data['country_id']."' and `region_name`='".$user_data['region']."' ");
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
                                                    </td>

                                                </tr>
                                                
                                                <tr>

                                                	<td> Registration Date : </td>

                                                    <td colspan="2"> <?php echo $user_data['added_date'] ?> </td>

                                                </tr>
                                                
                                                <tr>

                                                	<td> Last Update Date : </td>

                                                    <td colspan="2"> <?php echo $user_data['updated_date'] ?> </td>

                                                </tr>    

                                                    

                                                <?php

													$doc_qry = mysql_query("select * from `user_documents` where `user_id`='".$user_data['user_id']."' ");

													while($doc_data = mysql_fetch_array($doc_qry)){

												?>    

                                                <tr>

                                                	<td> <?php echo $doc_data['doc_name'] ?> : </td>

                                                    <td> <?php echo $doc_data['doc_number'] ?>  </td>

                                                    <td> <a download href="documents/<?php echo $doc_data['doc_file_name']; ?>"><?php echo $doc_data['doc_file_name']; ?></a> </td>	

                                                </tr>

                                                <?php } ?>
                                                
                                                
                                                
                                                <?php

													$d_qry = mysql_query("select * from `dynamic_value` where `user_id`='".$user_data['user_id']."' ");

													while($d_data = mysql_fetch_array($d_qry)){

												?>    

                                                <tr>

                                                	<td> <?php echo $d_data['name'] ?>  </td>

                                                    <?php /*?><td> <?php 
															if($d_data['type'] == 1){
																echo "Radio Button";
															}elseif($d_data['type'] == 2){
																echo "CheckBox";
															}elseif($d_data['type'] == 3){
																echo "Text Field";
															}
														  ?>  
                                                    </td><?php */?>

                                                    <td  colspan="2"> <?php 
															
															if($d_data['type'] == 2){
																if($d_data['value'] == 0)
																{
																	echo "False";
																}elseif($d_data['value'] == 1)
																{
																	echo "True";
																}
															}
															else
															{
																echo $d_data['value'] ;
															}
															
															?> </td>	

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

