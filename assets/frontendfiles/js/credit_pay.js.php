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

     
    $("#paypal_form").submit(function() {

             
            $('form#paypal_form').submit();


            var datastring = $("#paypal_form").serialize();
                
                $.ajax({

                    type: "POST",  
                    url: "paypalgateway",  
                    data: datastring,
                    success: function (html) {


                    }

            });  

            return false;  
    });


});

