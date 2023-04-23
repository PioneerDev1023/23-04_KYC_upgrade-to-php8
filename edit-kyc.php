<?php

	require_once("conn.php");

	require_once("admin-head.php");

	require_once("admin-header.php");
	
	require_once('PHPMailerAutoload.php');


	

	$kyc_list_id = $_REQUEST['kyc_list_id'];

	

	

	if(isset($_REQUEST['add-new-document']))

	{

		$country_id = $_REQUEST['country_id'];
		$region_name = $_REQUEST['region_name'];
		
		$document_list = "";
		$radio_button_list = "";
		$checkbox_list = "";
		$text_field_list = "";

		foreach($_POST['group-b'] as $value)
		{
			if($value['document'] != ""){
			$document_list.=$value['document'].","; 
			}
			if($value['radio_button'] != ""){
			$radio_button_list.=$value['radio_button'].","; 
			}
			if($value['checkbox'] != ""){
			$checkbox_list.=$value['checkbox'].","; 
			}
			if($value['text_field'] != ""){
			$text_field_list.=$value['text_field'].","; 
			}
		}

		

		$qry = mysql_query("update `kyc_list` set  `country_id`='".$country_id."', `region_name`='".$region_name."', `document_list`='".$document_list."',`radio_button`='".$radio_button_list."',`checkbox`='".$checkbox_list."',`text_field`='".$text_field_list."',`checkbox_label`='".$_REQUEST['checkbox_label']."',`updated_date`='".date('Y-m-d H:i:s')."' where `kyc_list_id`='".$kyc_list_id."'  ");

		
		$user_qry = mysql_query("select * from `users` where `country_id`='".$country_id."' ");
		
		while($user_data = mysql_fetch_array($user_qry))
		{
			$mail = new PHPMailer; 

			$mail->SMTPDebug = 0;
			
			$mail->isSMTP();
			
			$mail->Host = 'localhost';
			
			$mail->Port = 25;
			
			$mail->ssl = false;
			
			$mail->authentication = false;
			
			
	
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "'".$username."'";
	
			//Password to use for SMTP authentication
			$mail->Password = "'".$password."'";
	
			//Set who the message is to be sent from
			$mail->setFrom("'".$user_name."'", 'KYC');
	
			//Set an alternative reply-to address
			$mail->addReplyTo("'".$user_name."'",'KYC');
	
			//Set who the message is to be sent to
			$mail->addAddress("'".$user_data['email']."'", 'KYC');
	
			//Set the subject line
			$mail->Subject = 'KYC Upload Remaining Documents';
	
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			
			
			
			
			
			$message='
					KYC updated data, Please upload your remaining documents. 
			';
			
			
			
			
			$mail->msgHTML($message, dirname(__FILE__));
	
			//Replace the plain text body with one created manually
			$mail->AltBody = 'KYC';
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		$message = "KYC form updated successfully.";

		$_SESSION['message'] = $message;

		$url = "kyc-form.php";

		

		if (headers_sent()){

		  die('<script type="text/javascript">window.location.href="' . $url . '";</script>');

		}else{

		  header('Location: ' . $url);

		  die();

		}

		

	}

	

	$qry = mysql_query("select * from `kyc_list` where `kyc_list_id`='".$kyc_list_id."' ");

	$data = mysql_fetch_array($qry);

	

?>

<style>
.mt-repeater1 {
    display: table;
    width: 100%
}

.mt-repeater1 .mt-repeater-item {
    border-bottom: 1px solid #ddd;
    padding-bottom: 15px;
    margin-bottom: 15px
}

.mt-repeater1 .mt-repeater-item.mt-overflow {
    overflow: auto
}

.mt-repeater1 .mt-repeater-title {
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    font-weight: 600
}

.mt-repeater1 .mt-repeater-input {
    display: table-cell;
    vertical-align: top;
    padding: 0 10px 10px;
    width: 1%
}

.mt-repeater1 .mt-repeater-input input[type=text],
.mt-repeater1 .mt-repeater-input select,
.mt-repeater1 .mt-repeater-input textarea {
    width: 100%
}

.mt-repeater1 .mt-repeater-input .control-label {
    padding-top: 0;
    margin-bottom: 5px
}

.mt-repeater1 .mt-repeater-input.mt-repeater-textarea {
    width: 3%
}

.mt-repeater1 .mt-repeater-input:first-child {
    padding-left: 0
}

.mt-repeater1 .mt-repeater-input:last-child {
    padding-right: 0
}

.mt-repeater1 .mt-repeater-delete {
    margin-top: 1.8em
}

.mt-repeater1 .mt-repeater-delete.mt-repeater-del-right {
    float: right;
    margin-top: 10px
}

.mt-repeater1 .mt-repeater-cell {
    display: table;
    width: 100%
}

.mt-repeater1 .mt-repeater-cell .mt-repeater-btn-inline,
.mt-repeater1 .mt-repeater-cell .mt-repeater-input-inline {
    display: table-cell
}

.mt-repeater1 .mt-repeater-cell .mt-repeater-input-inline {
    width: 100%;
    border-right: none
}

.mt-repeater1 .mt-repeater-cell .mt-repeater-btn-inline {
    width: 1%;
    float: none
}

.mt-repeater1 .mt-repeater-row {
    margin-right: 0
}

@media (max-width:991px) {
    .mt-repeater1 .mt-repeater-input {
        width: 100%;
        display: block;
        padding-left: 0;
        padding-right: 0
    }
    .mt-repeater1 .mt-repeater-input.mt-repeater-textarea {
        width: 100%
    }
    .mt-repeater1 .mt-repeater-input .control-label {
        text-align: left!important
    }
    .mt-repeater1 .mt-repeater-input .mt-repeater-delete {
        margin-top: 0
    }
}
</style>


                            <!-- BEGIN PROFILE CONTENT -->

                            <div class="profile-content">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="portlet light bordered">

                                        	

                                             <div class="portlet-title tabbable-line">

                                                <div class="caption caption-md">

                                                    <i class="icon-globe theme-font hide"></i>

                                                    <span class="caption-subject font-blue-madison bold uppercase">Update KYC Form</span>

                                                </div>

                                                

                                            </div>

                                            <div class="portlet-body">

                                  <form role="form" action="" method="post" class="">

                                           <div class="form-group">

                                            <label class="control-label visible-ie8 visible-ie9">Country</label>

                                            <select name="country_id" id="country_list" class="select2 form-control" required="required">

                                                <option value=""></option>

                                                <?php

													$country = mysql_query("select * from `country`");

													while($res = mysql_fetch_array($country)){

														if($res['country_id'] == $data['country_id'])

														{

															$selected = "selected";

														}

														else

														{

															$selected = "";

														}

												?>

                                                	<option value="<?php echo $res['country_id'] ?>" attr_country_code="<?php echo $res['country_code'] ?>" <?php echo $selected ?>><?php echo $res['country_name'] ?></option>

                                                <?php } ?>

                                                

                                            </select>

                                        </div>
                                        
                                        
                                        <div class="form-group">

                                            <label class="">Region Name</label>

                                            <input type="text" name="region_name" class="form-control" value="<?php echo $data['region_name']; ?>" required="required">


                                        </div>
                                        

                                         <div class="form-group mt-repeater">

                                            <div data-repeater-list="group-b">

                                               

                                                <?php

													$docs = trim($data['document_list'],",");

													$doc = explode(",",$docs);

													foreach($doc as $document){

												?>

                                                

                                                            <div data-repeater-item class="mt-repeater-item">
            
                                                                <label class="control-label">Document Name</label>
            
                                                                <div class="mt-repeater-cell">
            
                                                                    <input type="text" name="document" placeholder="Name of Document" class="form-control mt-repeater-input-inline" value="<?php echo $document ?>" required="required" />
            
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
            
                                                                        <i class="fa fa-close"></i>
            
                                                                    </a>
            
                                                                </div>
            
                                                            </div>

                                                

                                                <?php } ?>

                                            </div>

                                            <a href="javascript:;" data-repeater-create class="btn grey-mint mt-repeater-add">

                                                <i class="fa fa-plus"></i> Add New Document Type</a>

                                        	</div>
                                            
                                            
                                            
                                            
                                            
                                            <div class="form-group mt-repeater1">

                                            <div data-repeater-list="group-b">

                                                
                                                <?php

													$rbs = trim($data['radio_button'],",");

													$rbs = explode(",",$rbs);
													$rbs = array_filter($rbs);
													foreach($rbs as $rb){

												?>
                                                
                                                <div data-repeater-item class="mt-repeater-item" style="display:<?php if(!$rbs){ echo "none"; }else{ echo "block"; } ?>" >

                                                    <label class="control-label">Radio Button</label>

                                                    <div class="mt-repeater-cell">

                                                        <input type="text" name="radio_button" placeholder="Name of Radio Button" class="form-control mt-repeater-input-inline" value="<?php echo $rb ?>" />

                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">

                                                            <i class="fa fa-close"></i>

                                                        </a>

                                                    </div>

                                                </div>
                                                
                                                <?php } ?>

                                            </div>

                                            <a href="javascript:;" data-repeater-create class="btn grey-mint mt-repeater-add">

                                                <i class="fa fa-plus"></i> Add New Radio Button</a>

                                        </div>
                                        
                                        <div class="form-group">

                                            <label class="">Checkbox Label</label>

                                            <input type="text" name="checkbox_label" value="<?php echo $data['checkbox_label'] ?>" class="form-control">


                                        </div>
                                        
                                        <div class="form-group mt-repeater1">

                                            <div data-repeater-list="group-b">
												
                                                <?php

													$cbs = trim($data['checkbox'],",");

													$cbs = explode(",",$cbs);
													$cbs = array_filter($cbs);
													foreach($cbs as $cb){

												?>
                                                
                                                <div data-repeater-item class="mt-repeater-item" style="display:<?php if(!$cbs){ echo "none"; }else{ echo "block"; } ?>">

                                                    <label class="control-label">CheckBox</label>

                                                    <div class="mt-repeater-cell">

                                                        <input type="text" name="checkbox" placeholder="Name of CheckBox" class="form-control mt-repeater-input-inline" value="<?php echo $cb; ?>" />

                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">

                                                            <i class="fa fa-close"></i>

                                                        </a>

                                                    </div>

                                                </div>
                                                
                                                <?php } ?>

                                            </div>

                                            <a href="javascript:;" data-repeater-create class="btn grey-mint mt-repeater-add">

                                                <i class="fa fa-plus"></i> Add New CheckBox</a>

                                        </div>
                                        
                                        
                                        <div class="form-group mt-repeater1">

                                            <div data-repeater-list="group-b">
												
                                                <?php

													$tfs = trim($data['text_field'],",");

													$tfs = explode(",",$tfs);
													$tfs = array_filter($tfs);
													foreach($tfs as $tf){

												?>
                                                
                                                <div data-repeater-item class="mt-repeater-item" style="display:<?php if(!$tfs){ echo "none"; }else{ echo "block"; } ?>">

                                                    <label class="control-label">Text Field</label>

                                                    <div class="mt-repeater-cell">

                                                        <input type="text" name="text_field" placeholder="Name of Text Field" class="form-control mt-repeater-input-inline" value="<?php echo $tf; ?>" />

                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">

                                                            <i class="fa fa-close"></i>

                                                        </a>

                                                    </div>

                                                </div>
												<?php } ?>
                                            </div>

                                            <a href="javascript:;" data-repeater-create class="btn grey-mint mt-repeater-add">

                                                <i class="fa fa-plus"></i> Add New Text Field</a>

                                        </div>
                                            
                                            
                                            
                                            

                                                            <div class="margiv-top-10">

                                                               

                                                                <button type="submit" name="add-new-document" class="btn green"> Save Changes </button>

                                                                <a href="./kyc-form.php" class="btn default"> Cancel </a>

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

<script>
$('.mt-repeater1').repeater({ 


show: function () {
    $(this).slideDown();
  },
  hide: function (remove) {
    if(confirm('Are you sure you want to remove this item?')) {
      $(this).slideUp(remove);
    }
  }

});
</script>