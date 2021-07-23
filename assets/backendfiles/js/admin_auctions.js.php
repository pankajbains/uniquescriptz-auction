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

	
	$("#formpages").submit(function(e){
	return false;
	});


	$("#addauction").click(function () {

		if($("#auction_name").val()==''){
			alert("Please Enter Auction Name");
			$("#auction_name").focus();
		}

		if($("#auction_nprice").val()==''){
			alert("Please Enter Retail Price");
			$("#auction_nprice").focus();
		}

		if($("#auction_price").val()==''){
			alert("Please Enter Bid Price");
			$("#auction_price").focus();
		}

		if($("#auction_credits").val()==''){
			alert("Please Enter Credits Required");
			$("#auction_credits").focus();
		}

		if($("#auction_max_bid").val()==''){
			alert("Please Enter Bids to Close Auction");
			$("#auction_max_bid").focus();
		}

		var datastring = $("#formpages").serialize();

		var auction_terms = CKEDITOR.instances.auction_terms.getData();
		var auction_desc = CKEDITOR.instances.auction_desc.getData();


		var featured= $("#featured").is(':checked') ?	1 : 0;
		var sretail= $("#sretail").is(':checked') ?	1 : 0;
		var sallowed_bids= $("#sallowed_bids").is(':checked') ?	1 : 0;
		var sreq_bids= $("#sreq_bids").is(':checked') ?	1 : 0;
		var stotal_bids= $("#stotal_bids").is(':checked') ?	1 : 0;
		var sremaining_bids= $("#sremaining_bids").is(':checked') ?	1 : 0;
		var scurrent_bids=$("#scurrent_bids").is(':checked') ?	1 : 0;

        $.ajax({

            type: "POST",
            url: "../admin_auctions/add_auctions",
            data: datastring+"&auction_terms="+auction_terms+"&auction_desc="+auction_desc+"&featured="+featured+"&sretail="+sretail+"&sallowed_bids="+sallowed_bids+"&sreq_bids="+sreq_bids+"&stotal_bids="+stotal_bids+"&sremaining_bids="+sremaining_bids+"&scurrent_bids="+scurrent_bids,
            success: function (html) {

				if(html==1){

					$(window).scrollTop(0);
					$('#success').show().delay(1000).fadeOut();
					$('#formpages').trigger("reset");

				}

            }

        });

		return false;

    });


				$('#auction_icon_img').ace_file_input({
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

				$('#auction_img, #video').ace_file_input({

					style:'well',
					btn_choose:'Select atleast two or more files here - click to choose',
					thumbnail:true, //| true | large
					btn_change:null,
					no_icon: "icon-picture",
					droppable:true,
					thumbnail:'small'
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				});//.on('change', function(){
				//alert("hi");
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				//});



				$("#editmedia").click(function () {

					$.ajax({

						url: "../upload_media", // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: new FormData(formpages), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
									//	alert(data);
									if (data == 1) {
										$(window).scrollTop(0);
										$('#success').show();//.delay(1000).fadeOut();
										$('#formpages').trigger("reset");
									}

						}

					});


				});



 
});

