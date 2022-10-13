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

	

	$("#addadmin").click(function () {
		

		var datastring = $("#formpages").serialize();

        $.ajax({

            type: "POST",
            url: "../backend_admin_users/add_admin_users",
            data: datastring,
            success: function (html) {

				if(html!=""){

					$(window).scrollTop(0);
					$('#success').show().delay(1000).fadeOut();
					$('#formpages').trigger("reset");

				}

            }
        });
        
		return false;

    });


	$("#adminedit").click(function () {
		
		
	
		var datastring = $("#formpages").serialize();

        $.ajax({

            type: "POST",
            url: "../backend_admin_users/add_admin_users",
            data: datastring,
            success: function (html) {

				if(html!=""){

					$(window).scrollTop(0);
					$('#success').show().delay(1000).fadeOut();
					$('#formpages').trigger("reset");

				}

            }
        });
        
		return false;

    });


 
});

