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


		$("#gift_form").submit(function() {

				if($("input[type='radio']").is(':checked')){
					var coupon=$("input[type='radio']:checked").val();
				}else{
					alert("Please Select Coupon Value!");
					return false;  
				
				}

				// ------------------- gift now
				$('form#gift_form').submit();

				/*
				var datastring = $("#gift_form").serialize();
					
					$.ajax({

						type: "POST",  
						url: "gift_now",  
						data: datastring,
						success: function (html) {

							if (html==1){				

								window.scrollTo(0, 500);
								$('#success').show().delay(2000).fadeOut();
								$('#gift_form').trigger("reset");

							}else{

								window.scrollTo(0, 500);
								$('#msg').html("Unable to update. Try again later!");
								$('#success').show().delay(2000).fadeOut();

							}

						}

				   });  */

					return false;  
		});


});

