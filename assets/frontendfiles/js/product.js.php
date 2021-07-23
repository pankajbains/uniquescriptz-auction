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



		$("#bid_form").submit(function(){  
		
				//var bidval = $('#bid_price').val();

				if (! $('#bid_price').val().match(/^(\d{0,6})(\.\d{2})$/)) {
						alert("Please enter value with two decimal digits!");
						$("input#bid_price").focus();  
						return false;
				}

				var amount=$('#bid_price').val().replace(/,/g,'.');
				var allowed_bid = $('#allowed_bid').val();
				var auction_type = $('#auction_type').val();
				var auction_credits = $('#auction_credits').val();
				var paid_credit = $('#paid_credit').val();
				
				var free_credit = $('#free_credit').val();
				var auction_format = $('#auction_format').val();


				if((auction_type==1) && (Number(paid_credit) < Number(auction_credits))){ 

					alert("You don't have enough paid credits to place bid of amount "+amount+"!");
					return false;

				}

				if ((auction_type==0) && (Number(free_credit) < Number(auction_credits))) { 

					alert("You don't have enough free credits to place bid of amount "+amount+"!");
					return false;

				}

				if((amount < allowed_bid) || (amount == allowed_bid) && (auction_format == 'lowest')){

					alert("Please Enter Bid Amount Greater than Minimum Bid Amount "+allowed_bid+"!");
					return false;
				}

				if((amount < allowed_bid) || (amount == allowed_bid) && (auction_format == 'highest')){

					alert("Please Enter Bid Amount Lower than Maximum Bid Amount "+allowed_bid+"!");
					return false;
				}

				if (amount==0 || amount==0.00){

					alert("Please Enter Bid Amount Greater than 0!");
					return false;

				}

				if(isNaN(amount)==true){

					alert("Please Enter Numeric Number.");
					return false;

				}
				
				var datastring = $("#bid_form").serialize();

				$.ajax({

						type: "POST",  
						url: "../place_now",  
						data: datastring,  
						success: function (html) {	

							if (html!='') {
								
								var msg = html.split("-");

								if(msg[1]=='success'){

									$("#success").removeClass("alert-danger").addClass("alert-success");

									$('#bid_price').val("");

									if (auction_type==0) { 

										$('#free_credit').val(free_credit-1);

									}

									if (auction_type==1) { 

										$('#paid_credit').val(paid_credit-1);

									}

									//latest(bid_id,regid);
									//proditem(bid_id,regid);

								}else{

									$("#success").removeClass("alert-success").addClass("alert-danger");

								}

								$('#success').html(msg[0]);
								$('#success').show().delay(2000).fadeOut();



							}
							
						}
				
				});

				return false;

		});


/*
		$("#submit_bid").click(function () {


			var datastring = $("#bid-form").serialize();
			//alert(datastring);
			$.ajax({

				type: "POST",
				url: "place_bid",
				data: datastring,
				success: function (html) {
					//alert(html);
					if(html!=""){

						$('#success').show().delay(1000).fadeOut();
						$('#contact-form').trigger("reset");

					}

				}
				
			});
			
			return false;

		});
*/
});

