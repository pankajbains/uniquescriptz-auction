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

		var categoryparent = [''];
        $.each($("select#category_parent option:selected"), function(){            
            categoryparent.push($(this).val());
        });


        $.ajax({
            type: "POST",
            url: "../admin_categories/add_categories",
            data: {

					   id:$('#id').val(),
					   category_id:$('#category_id').val(),
					   category_name:$('#category_name').val(),
					   category_parent:categoryparent,

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

