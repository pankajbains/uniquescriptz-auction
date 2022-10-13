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

		$("#account_form").submit(function() {  

				if ($("#first_name").val() == "") {  
						alert("Please Enter your First Name!");
						$("input#first_name").focus();  
						return false;  
					}

				if ($("#last_name").val() == "") {  
						alert("Please Enter Last Name!");
						$("input#last_name").focus();  
						return false;  
					}

				if ($("#mobile").val() == "") {  
						alert("Please Enter your Mobile!");
						$("input#mobile").focus();  
						return false;  
					}

				if ($("#country").val()=="") {  
						alert("Please select Country");
						$("input#country").focus();  
						return false;  
				}

				if ($("#npassword").val()!=""){

					if ($("#cpassword").val() == "") {  
							alert("Please Confirm your Password!");
							$("input#cpassword").focus();  
							return false;  
						}

					if ($("#npassword").val()!=$("#cpassword").val()) {  
							alert("Passowrd Doesn't Match!");
							$("input#conemailadd").focus();  
							return false;  
					}
					
					if(!$("#npassword").val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)){ 
						alert("Password Should contain one capital letter and one number and a symbol");
						return false;
					}
				
				}

		// ------------------- register now

				var datastring = $("#account_form").serialize();
					
					$.ajax({

						type: "POST",  
						url: "account_now",  
						data: datastring,
						success: function (html) {
							
							if (html==1){				

								window.scrollTo(0, 500);
								$('#success').show().delay(2000).fadeOut();
								$('#account_form').trigger("reset");

							}else{

								window.scrollTo(0, 500);
								$('#msg').html("Unable to update. Try again later!");
								$('#success').show().delay(2000).fadeOut();

							}

						}

				   });  

					return false;  
			   });

});

