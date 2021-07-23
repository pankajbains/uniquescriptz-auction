<?php

   // initialize ob_gzhandler function to send and compress data
   ob_start ("ob_gzhandler");

   // send the requisite header information and character set
   header ("content-type: text/javascript; charset: UTF-8");

   // check cached credentials and reprocess accordingly
   header ("cache-control: must-revalidate");

   // set variable for duration of cached content
   $offset = 60 * 60;

   // set variable specifying format of expiration header
   $expire = "expires: " . gmdate ("D, d M Y H:i:s", time() + $offset) . " GMT";

   // send cache expiration header to the client broswer
   header ($expire);

?>
$(document).ready(function () {


		$("#refer_form").submit(function() {

				// ------------------- refer now

				var datastring = $("#refer_form").serialize();
					
					$.ajax({

						type: "POST",  
						url: "refer_now",  
						data: datastring,
						success: function (html) {

							if (html==1){				

								window.scrollTo(0, 500);
								$('#successrefer').show().delay(2000).fadeOut();
								$('#account_form').trigger("reset");

							}else{

								window.scrollTo(0, 500);
								$('#msgrefer').html("Unable to update. Try again later!");
								$('#successrefer').show().delay(2000).fadeOut();

							}

						}

				   });  

					return false;  
			   });


		$("#newsletter_form").submit(function() {  

		// ------------------- register now

				var datastring = $("#newsletter_form").serialize();
					
					$.ajax({

						type: "POST",  
						url: "preferences_now",  
						data: datastring,
						success: function (html) {

							if (html==1){				

								window.scrollTo(0, 500);
								$('#success').show().delay(2000).fadeOut();

							}else{

								window.scrollTo(0, 500);
								$('#msg').html("Unable to update. Try again later!");
								$('#success').show().delay(2000).fadeOut();

							}

						}

				   });  

					return false;  
			   });



});

