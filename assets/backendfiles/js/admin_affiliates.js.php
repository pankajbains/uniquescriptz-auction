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

	

    $("#submitpage").click(function () {


        $.ajax({
            type: "POST",
            url: "../admin_affiliates/add_affiliates",
            data: {

					  
					   aff_id:$('#aff_id').val(),
					   aff_level:$('#aff_level').val(),
					   aff_points:$('#aff_points').val(),
				 },


            success: function (html) {

                if (html == 1) {

							$(window).scrollTop(0);
							$('#success').show().delay(1000).fadeOut();

				}


            }
        });
        return false;
    });
 
});

