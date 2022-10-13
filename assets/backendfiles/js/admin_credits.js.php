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

	
	$("#formpages").submit(function(e){
	return false;
	});


	$("#submitcredits").click(function () {

		var datastring = $("#formpages").serialize();
		var active=($("#active").is(':checked')?'1':'0');

        $.ajax({

            type: "POST",
            url: "add_credits",
            data: datastring+"&active="+active,

            success: function (html) {

				if(html==1){

					$(window).scrollTop(0);
					$('#success').show().delay(1000).fadeOut();
					$('#formpages').trigger("reset");

				}else{
                    alert("Check all values.");
                }

            }

        });

		return false;

    });




	$("#submitcouponcredits").click(function () {

		var datastring = $("#formpages").serialize();
		var active=($("#active").is(':checked')?'1':'0');

        $.ajax({

            type: "POST",
            url: "add_coupon_credits",
            data: datastring+"&active="+active,

            success: function (html) {

				if(html==1){

					$(window).scrollTop(0);
					$('#success').show().delay(1000).fadeOut();
					$('#formpages').trigger("reset");

				}else{
                    alert("Check all values.");
                }

            }

        });

		return false;

    });



 
});

