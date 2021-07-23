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

$("#testmail").click(function () {

		var datastring = $("#formpages").serialize();
		var msg = $("#editor1").html();

//alert(msg);

        $.ajax({
            type: "POST",
            url: "posttestemail.php",
            data: datastring+"&email_body="+msg,
            success: function (html) {

//alert(html);
                if (html == 1) {

                    //alert('updated successfully!');
				   
				   $("#success").show();
					//window.location.href = window.location.href + "?success";

					//exit;

                }else if (html == 3) {

                    alert('Unable to send email. Please try again.');
                    
                }else{
				
				
					alert('Sorry, unexpected error. Please try again later.');
				}


            }
        });
        return false;
    });


    // --------------------------------   Email function start-----------------------------
    $("#submitemail").click(function () {

        $.ajax({
            type: "POST",
            url: "../admin_useremail/add_email",
            data: {

					   id:$('#id').val(),
					   user_emails_type:$('#user_emails_type').val(),
					   user_emails_subject:$('#user_emails_subject').val(),
					   user_emails_body: CKEDITOR.instances['user_emails_body'].getData(),

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


    // --------------------------------   login page function end -----------------------------
	   $("#powered").html("Powered By <a href='http://www.uniquescriptz.com' target='_blank'>UniqueScriptz</a>. All right reserved.");
});

