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

		function isValidEmailAddress(emailAddress) {
			var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			return pattern.test(emailAddress);
		}

		$("#login_form").submit(function() {  


				if ($("#email").val() == "") {  
						alert("Please Enter your Email!");
						$("input#email").focus();  
						return false;  
					}

				if(!isValidEmailAddress($("#email").val())){alert("Please Enter your Valid Email!");}

				if ($("#password").val() == "") {  
						alert("Please Enter your Password!");
						$("input#upassword").focus();  
						return false;  
					}


		// ------------------- register now

				var datastring = $("#login_form").serialize();
					
					$.ajax({

						type: "POST",  
						url: "login_now",  
						data: datastring,
						success: function (html) {

								if (html == 1) {

									window.location.href = "../user/account_details.html";
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

