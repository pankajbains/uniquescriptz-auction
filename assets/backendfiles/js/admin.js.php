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



	$("#adlogin").click(function () {

		var datastring = $("#formpages").serialize();


        $.ajax({

            type: "POST",
            url: "admin/post_adlogin",
            data: datastring,
            success: function (html) {

				 if (html == 1) {

                    window.location.href = "admin_home";
					exit;

                } else if (html == 0) {

                    alert('Invalid Username or Password. Please try again.');

				} else {

                    alert('Sorry, unexpected error. Please try again later.');
                    
                }

                

            }
        });
        
		return false;

    });


 
});

