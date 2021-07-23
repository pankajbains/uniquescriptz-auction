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

//----------------------------------------Test Email -----------------------------//



    // --------------------------------   gateway function start-----------------------------

    $("#submitpage").click(function () {

        $.ajax({
            type: "POST",
            url: "../admin_gateways/add_gateways",
            data: {

					   id:$('#id').val(),
					   gateway_name:$('#gateway_name').val(),
					   gateway_fee:$('#gateway_fee').val(),
					   gateway_other_fee:$('#gateway_other_fee').val(),
					   gateway_email:$('#gateway_email').val(),
					   secret_key:$('#secret_key').val(),
					   public_key:$('#public_key').val(),

				 },


            success: function (html) {

					//alert(html);
                if (html == 1) {

							$(window).scrollTop(0);
							$('#success').show().delay(1000).fadeOut();

				}


            }
        });
        return false;
    });


    // --------------------------------   login page function end -----------------------------
	   $("#powered").html("Powered By <a href='http://www.uniquescriptz.com' target='_blank'>UniqueScriptz</a>. All right reserved.");
});

