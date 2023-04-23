<!-- BEGIN FOOTER -->

         

        <!-- END FOOTER -->

        <!-- BEGIN QUICK NAV -->

        

        <div class="quick-nav-overlay"></div>

        <!-- BEGIN CORE PLUGINS -->

        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

        <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>

        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <script src="assets/pages/scripts/profile.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->

        

		

		

		<script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>

        <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>

        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

        <script src="assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>

		<script src="assets/global/scripts/bootstrap-session-timeout.js" type="text/javascript"></script>        

        <!-- END THEME LAYOUT SCRIPTS -->

        <script>

            $(document).ready(function()

            {

                function format(state) {

            if (!state.id) { return state.text; }

            

			var $state = $(

			'<span><img src="assets/global/img/flags/' + state.element.getAttribute("attr_country_code").toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'

            );

            

            return $state;

        }



        if (jQuery().select2 && $('#country_list').size() > 0) {

            $("#country_list").select2({

	            placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',

	            templateResult: format,

                templateSelection: format,

                width: 'auto', 

	            escapeMarkup: function(m) {

	                return m;

	            }

	        });





	       

    	}

        $('.mt-repeater').each(function(){

                $(this).repeater({

        			show: function () {

	                	$(this).slideDown();

                        

		            },



		            hide: function (deleteElement) {

		                if(confirm('Are you sure you want to delete this element?')) {

		                    $(this).slideUp(deleteElement);

		                }

		            },



		            ready: function (setIndexes) {



		            }



        		});

        	});

                

                $('#clickmewow').click(function()

                {

                    $('#radio1003').attr('checked', 'checked');

                });

            });
			
			
			<?php
				$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
				$uri_segments = explode('/', $uri_path);
			?>
			
			
			$.sessionTimeout({
                keepAliveUrl: '<?php echo $uri_segments[2]; ?>',
				logoutUrl: 'logout.php',
				redirUrl: 'lock-screen.php',
				warnAfter: 900000,
				redirAfter: 900000,
				countdownMessage: 'Redirecting in {timer} seconds.',
				countdownBar: true
            });
			
			
			

        </script>

        

<script>

	$(document).ready(function(){

		$('[data-toggle="tooltip"]').tooltip(); 

	});

</script>



    </body>



</html>