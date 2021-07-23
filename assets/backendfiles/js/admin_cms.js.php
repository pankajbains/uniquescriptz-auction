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


				$("#submitcms").click(function (){

					 $.ajax({
					   type: "POST",
					   url: "../admin_cms/add_pages",
					   data: {

					   cms_id:$('#cms_id').val(),
					   cms_page_name:$('#cms_page_name').val(),
					   cms_page_url:$('#cms_page_url').val(),
					   cms_page_heading1: CKEDITOR.instances['cms_page_heading1'].getData(),
					   cms_page_heading2: CKEDITOR.instances['cms_page_heading2'].getData(),
					   cms_page_heading3: CKEDITOR.instances['cms_page_heading3'].getData(),
					   cms_page_paragraph1: CKEDITOR.instances['cms_page_paragraph1'].getData(),
					   cms_page_paragraph2: CKEDITOR.instances['cms_page_paragraph2'].getData(),
					   cms_page_paragraph3: CKEDITOR.instances['cms_page_paragraph3'].getData(),
					   cms_page_paragraph4: CKEDITOR.instances['cms_page_paragraph4'].getData(),
					   cms_page_paragraph5: CKEDITOR.instances['cms_page_paragraph5'].getData(),
					   cms_page_paragraph6: CKEDITOR.instances['cms_page_paragraph6'].getData(),
					   cms_page_paragraph7: CKEDITOR.instances['cms_page_paragraph7'].getData(),

					   
					   },
			 
						success: function (html) {

							$(window).scrollTop(0);
							$('#success').show().delay(1000).fadeOut();

						}
			 
					 });
			 
					 return false;  //stop the actual form post !important!
			 
				});


 
});

