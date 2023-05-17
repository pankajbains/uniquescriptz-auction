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


				$("#submitsettings").click(function (){
					
					//alert('hi');
					dataString = $("#formpages").serialize();
 
					 $.ajax({
					   type: "POST",
					   url: "admin_home/post_sitesettings",
					   data: dataString,
			 
					   success: function(data){

							$('#success').show().delay(1000).fadeOut();

					   }
			 
					 });
			 
					 return false;  //stop the actual form post !important!
			 
				});


				$("#pointsettings").click(function (){
					
					//alert('hi');
					dataString = $("#formpages").serialize();
 
					 $.ajax({
					   type: "POST",
					   url: "admin_home/post_pointsettings",
					   data: dataString,
			 
					   success: function(data){

							$('#success').show().delay(1000).fadeOut();

					   }
			 
					 });
			 
					 return false;  //stop the actual form post !important!
			 
				});

				$("#socialsettings").click(function (){
					
					//alert('hi');
					dataString = $("#formpages").serialize();
 
					 $.ajax({
					   type: "POST",
					   url: "admin_home/post_socialsettings",
					   data: dataString,
			 
					   success: function(data){

							$('#success').show().delay(1000).fadeOut();

					   }
			 
					 });
			 
					 return false;  //stop the actual form post !important!
			 
				});


				$("#submitprofile").click(function (){
					
					//alert('hi');
					dataString = $("#formpages").serialize();

					 $.ajax({
					   type: "POST",
					   url: "admin_home/post_profile",
					   data: dataString,
			 
					   success: function(data){
							
							window.location.href = window.location.href;

					   }
			 
					 });
			 
					 return false;  //stop the actual form post !important!
			 
				});



				// --------------------------------   Currency page function start-----------------------------
					$("#submitcurrency").click(function (){

						var datastring = $("#formpages").serialize();

						if($("#active").is(':checked')){
							var active="1";
						}

						if($("#base_currency").is(':checked')){
							var base="1";
						}
						
						
							$.ajax({
								type: "POST",
								url: "add_currency",
								data: datastring+"&active="+active+"&base_currency="+base,

								success: function (html) {

									$('#success').show().delay(1000).fadeOut();

								}
							});

						return false;
					});


				$('#headerlogo, #stickylogo, #favicon').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:true,
					//onchange:null,
					thumbnail:false, //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					blacklist:'exe|php',
					//url:'upload.php?prod_code=THE1-2016',
					//
				});	




				$("#submitlogos").click(function () {

					$.ajax({

						url: "upload_media", // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: new FormData(formpages), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
									//alert(data);
									if (data == 1) {
										$(window).scrollTop(0);
										$('#success').show();//.delay(1000).fadeOut();
										$('#formpages').trigger("reset");
									}

						}

					});


				});


});

