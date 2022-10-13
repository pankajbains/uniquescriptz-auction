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

	

	$("#submitcoupons").click(function () {
		
		if($("#coupon_sdate").val()==""){$("#coupon_sdate").focus(); return false;}
		if($("#coupon_edate").val()==""){$("#coupon_edate").focus(); return false;}
		if($("#coupon_code").val()==""){$("#coupon_code").focus(); return false;}
		if($("#coupon_value").val()==""){$("#coupon_value").focus(); return false;}
		if($("#points_earned").val()==""){$("#points_earned").focus(); return false;}
        var status=($("#status").is(':checked')?'1':'0');
        

		var datastring = $("#formpages").serialize();

        $.ajax({

            type: "POST",
            url: "../admin_coupons/add_coupons",
            data: datastring+"&status="+status,
            success: function (html) {
				
				//alert(html);

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

