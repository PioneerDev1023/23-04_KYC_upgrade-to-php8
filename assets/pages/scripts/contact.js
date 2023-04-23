var Contact = function () {



    return {

        //main function to initiate the module

        init: function () {

			var map;

			$(document).ready(function(){

			  map = new GMaps({

				div: '#gmapbg',

				lat: 12.9716,

				lng: 77.5946

			  });

			   var marker = map.addMarker({

		            lat: 12.9716,

					lng: 77.5946,

		            title: 'Loop, Inc.',

		            infoWindow: {

		                content: "<b>Cloudstar</b> 795 Park Ave, Suite 120<br>San Francisco, CA 94107"

		            }

		        });



			   marker.infoWindow.open(map, marker);

			});

        }

    };



}();



jQuery(document).ready(function() {    

   Contact.init(); 

});



