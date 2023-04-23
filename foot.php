<!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        

        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>

<script type="text/javascript">
    <?php
		if($captcha_data['status'] == 1)
		{
	?> 
      var widgetId1;
      var widgetId2;
      var onloadCallback = function() {
        // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
        // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
        widgetId1 = grecaptcha.render('example1', {
          'sitekey' : '<?php echo $captcha_data['sitekey'] ?>',
        });
        widgetId2 = grecaptcha.render('example2', {
          'sitekey' : '<?php echo $captcha_data['sitekey'] ?>'
        });
        
      };
	<?php } ?>

$('.login-form').submit(function(e) {
	
  var login_email = 0;
  var login_password = 0;
  
  var login_captcha = 0;
  	<?php
		if($captcha_data['status'] == 1)
		{
	?>
		if($("#g-recaptcha-response").val() == "") {
			$(".login_captcha_error").show();
			login_captcha = 1;
		  }else{
			$(".login_captcha_error").hide();
			login_captcha = 0;
		  }	
	
	<?php } ?>
  
  
  if($("#login_email").val() == "")
  {
	$(".login_email_error").show();
	login_email = 1;
  }
  else
  {
	$(".login_email_error").hide();
	login_email = 0;
  }
  
  if($("#login_password").val() == "")
  {
	$(".login_password_error").show();
	login_password = 1;
  }
  else
  {
	$(".login_password_error").hide();
	login_password = 0;
  }
  
  if(login_captcha == 0 && login_email == 0 && login_password == 0)
  {
	  $('.login-form').submit();
  }
  else
  {
	  return false;
  }
  
});


$('.register-form').submit(function(e) {
 
  
  var signup_user_name = 0;
  var signup_email = 0;
  var signup_region = 0;
  var signup_city = 0;
  var signup_country = 0;
  var signup_password = 0;
  var signup_rpassword = 0;
  var signup_match_password = 0;
  var signup_tnc = 0;
 
 	var signup_captcha = 0;
  	<?php
		if($captcha_data['status'] == 1)
		{
	?>
	   if($("#g-recaptcha-response-1").val() == "") {
		$(".signup_captcha_error").show();
		signup_captcha = 1;
	  }else{
		$(".signup_captcha_error").hide();
		signup_captcha = 0;
	  }	
  <?php } ?>
  
  if($("#signup_user_name").val() == ""){
	$(".signup_user_name_error").show();
	signup_user_name = 1;
  }else{
	$(".signup_user_name_error").hide();
	signup_user_name = 0;
  }
  
  if($("#signup_email").val() == ""){
	$(".signup_email_error").show();
	signup_email = 1;
  }else{
	$(".signup_email_error").hide();
	signup_email = 0;
  }
  
  if($("#signup_region").val() == ""){
	$(".signup_region_error").show();
	signup_region = 1;
  }else{
	$(".signup_region_error").hide();
	signup_region = 0;
  }
  
  if($("#signup_city").val() == ""){
	$(".signup_city_error").show();
	signup_city = 1;
  }else{
	$(".signup_city_error").hide();
	signup_city = 0;
  }
  
  if($("#country_list").val() == ""){
	$(".signup_country_error").show();
	signup_city = 1;
  }else{
	$(".signup_country_error").hide();
	signup_city = 0;
  }
  
   if($("#register_password").val() == ""){
	$(".signup_password_error").show();
	signup_password = 1;
  }else{
	$(".signup_password_error").hide();
	signup_password = 0;
  }
  
  if($("#rpassword").val() == ""){
	$(".signup_rpassword_error").show();
	signup_rpassword = 1;
  }else{
	$(".signup_rpassword_error").hide();
	signup_rpassword = 0;
  }
  
  if($("#rpassword").val() != $("#register_password").val()){
	$(".signup_match_password_error").show();
	signup_match_password = 1;
  }else{
	$(".signup_match_password_error").hide();
	signup_match_password = 0;
  }
  
  if($("#signup_tnc").is(':checked')){
	$(".signup_tnc_error").hide();
	signup_tnc = 0;
  }else{
	$(".signup_tnc_error").show();
	signup_tnc = 1;
  }
  
 
  
  if(signup_user_name == 0 && signup_email == 0 && signup_region == 0 && signup_city == 0 && signup_country == 0 && signup_password == 0 && signup_rpassword == 0 && signup_captcha == 0 && signup_match_password == 0 && signup_tnc == 0 )
  {
	  $('.register-form').submit();
  }
  else
  {
	  return false;
  }
  
});
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

<script type="text/javascript">
	$("#country_list").change(function(){
		$("#signup_region").load("get_region.php?country_id="+$(this).val());	
	});
</script>