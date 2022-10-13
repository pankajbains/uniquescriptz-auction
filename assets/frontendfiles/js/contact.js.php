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


		$( "#contact-form" ).submit(function () {

			if($("#con_name").val()==""){$("#con_name").focus(); return false;}
			if($("#con_email").val()==""){$("#con_email").focus(); return false;}
			if($("#con_subject").val()==""){$("#con_subject").focus(); return false;}
			if($("#con_message").val()==""){$("#con_message").focus(); return false;}

			var datastring = $("#contact-form").serialize();
			//alert(datastring);
			$.ajax({

				type: "POST",
				url: "process",
				data: datastring,
				success: function (html) {
					//alert(html);
					if(html!=""){

						$('#success').show().delay(1000).fadeOut();
						$('#contact-form').trigger("reset");

					}

				}
				
			});
			
			return false;

		});

});

