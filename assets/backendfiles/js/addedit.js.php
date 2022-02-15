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

		$('input[id=status]').change(function () { 

			var active=$(this).is(':checked');
			var value=$(this).attr('value');

				$.ajax({
		
					type: "POST",
					url: "../admin/poststatus",
					data: "value="+value+"&status="+active,
					success: function (html) {
					
						$('#success').show().delay(2000).fadeOut();
						$(".even").removeClass('selected');
						

					}

				});
				
				return false;

		});

		$('input[id=featured]').change(function () { 

			var active=$(this).is(':checked');
			var value=$(this).attr('value');

				$.ajax({
		
					type: "POST",
					url: "../admin/postfeatured",
					data: "value="+value+"&featured="+active,
					success: function (html) {
					
						$('#success').show().delay(2000).fadeOut();
						

					}

				});
				
				return false;

		});

		$('input[id=newsletters]').change(function () { 

			var active=$(this).is(':checked');
			var value=$(this).attr('value');

				$.ajax({
		
					type: "POST",
					url: "../admin/poststatus",
					data: "value="+value+"&status="+active,
					success: function (html) {
					
						$('#success').show().delay(1000).fadeOut();
						

					}

				});
				
				return false;

		});

		$('a[id=delrec]').click(function () {
				
				var value=$(this).attr('value');

				if(confirm("Sure you want to delete? There is NO undo!")){
						
						$.ajax({
		
							type: "POST",
							url: "../admin/delrec",
							data: "value="+value,
							success: function (html) {
							
								$('#success').show().delay(1000).fadeOut();
								$("#"+html).hide();

							}

						});

				}
			
		});

		
		$('a[id=duprec]').click(function () {
				
				var value=$(this).attr('value');
				
				if(confirm("Sure you want to duplicate this auction?")){
						
						$.ajax({
		
							type: "POST",
							url: "admin_auctions/duplicate",
							data: "auction_id="+value,
							success: function (html) {

								$('#success').show().delay(1000).fadeOut();

							}

						});

				}
			
		})

 
});

