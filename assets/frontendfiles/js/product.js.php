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
				var auction_id = $('#auction_id').val();
				var auction_name = $('#auction_name').val();
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
								console.log(html); 

								if(msg[1]=='success'){

									$("#success").removeClass("alert-danger").addClass("alert-success");

									$('#bid_price').val("");
									$("#add_wishlist").attr("class", "ion-android-favorite-outline");
                                	$('#wishlist').val('1');
									get_manual_graph_data(auction_id, msg[2],amount)
									/*
									if (auction_type==0) { 

										$('#dfreecredits').val(free_credit-auction_credits);

									}

									if (auction_type==1) { 
										
										$('#dpaidcredits').val(Number(paid_credit)-Number(auction_credits));

									}
									 */
								
									prod_desc(auction_id);
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


		function prod_desc(auction_id) { 

			var paid_credit = $('#paid_credit').val();
			var free_credit = $('#free_credit').val();
			var amount=$('#bid_price').val().replace(/,/g,'.');
			$.ajax({
				type: "POST",  
				url: "../get_prod_desc",  
				data: {
					'auction_id':auction_id,
				},   

				success: function(response) {
					 
				 
					var dataret = jQuery.parseJSON(response);
				  
					$('#bid_placed').html(dataret.auction_bid+" Bids"); 
					
				
					var start_bid =  parseFloat(dataret.unique)-parseFloat(dataret.auction_price);
					var end_bid =  parseFloat(dataret.unique)+parseFloat(dataret.auction_price);
				
					//alert('--'+start_bid+'++'+end_bid+'--'+start_bid.toFixed(2)+'++'+end_bid.toFixed(2));
					 
					$('#start_bids_price').html('$'+start_bid.toFixed(2)); 
					$('#end_bids_price').html('$'+end_bid.toFixed(2)); 
					
					if(dataret.auction_type==0) {
						$('#dfreecredits').html(free_credit-dataret.auction_credits); 
					}
					if(dataret.auction_type==1) {
						$('#dpaidcredits').html(paid_credit-dataret.auction_credits); 
					}
					
				 
				}				
			 

			});

		}

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

