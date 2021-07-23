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

		$("#register").submit(function() {  

				//var captcha=$('#g-recaptcha-response').val();

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
				if ($("#cpassword").val() == "") {  
						alert("Please Confirm your Password!");
						$("input#cpassword").focus();  
						return false;  
					}

				if ($("#password").val()!=$("#cpassword").val()) {  
						alert("Passowrd Doesn't Match!");
						$("input#conemailadd").focus();  
						return false;  
				}
				
				if(!$("#password").val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)){ 
					alert("Password Should contain one capital letter and one number and a symbol");
					return false;
				}

				if (!terms.checked){
					alert("You have to accept with the terms and conditions by clicking on the checkbox.");   
					return false;
				};

		// ------------------- register now

				var datastring = $("#register").serialize();

				//$("#registernow").attr('disabled', 'disabled');
					
					$.ajax({

						type: "POST",  
						url: "register_now",  
						data: datastring,
						success: function (html) {

							if (html==1){				

								$("div#regform").hide("slow");
								//show the success message
								$("div#regmsg").show("slow");

							}else if(html==2){

								alert("User already exists!");

							}else{

								alert("Registration Successful. However we are unable to Send email! Please contact Administrator!");
								$("div#regform").hide("slow");
								//show the success message
								$("div#regmsg").show("slow");
							}

						}

				   });  

					return false;  
			   });

});

