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


		$("#buy_form").submit(function() {

				// ------------------- refer now

				var datastring = $("#buy_form").serialize();
					
					$.ajax({

						type: "POST",  
						url: "buy_now",  
						data: datastring,
						success: function (html) {

							if (html==1){				

								window.scrollTo(0, 700);
								$('#msg').html("<strong>Well done!</strong> Records are updated successfully!")
								$('#success').show().delay(2000).fadeOut();
								$('#buy_form').trigger("reset");

							}else{

								window.scrollTo(0, 700);
								$('#msg').html(html);
								$('#success').show().delay(2000).fadeOut();

							}

						}

				   });  

					return false;  
		});

});

