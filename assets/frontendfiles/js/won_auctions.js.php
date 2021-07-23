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




		function toggle_username(userid) { 

             $.ajax({

                type: "POST", 
				url: "ajax.php",
				data: "do=check_username_exists&nickname="+userid,
               
				success: function (html) {

						if(html=="exists"){

							$('#nickname').css('background', 'url("http://www.fmingo.com/img/icon-wrong.gif") no-repeat right');

						}else if(html=="avail"){

							$('#nickname').css('background', 'url("http://www.fmingo.com/img/RightIcon.gif") no-repeat right');
							$('#nickname').css('margin-right', '20px');

						}

				}

           }); 

		} 

		$("#remove").click(function(){  
			
			var href = $(this).attr('value');
			alert(href);
			$.ajax({
				type: "POST",
				url: "../auction/hidebid.html",
				data: "action=auction_won&auction="+href,
				success: function (html) {
alert(html);
					if (html == 1) {

						$("#"+href).hide();

					}else{

						alert('Sorry, unexpected error. Please try again later.');
						
					}

				}
			});
			
			return false;


		});

});

