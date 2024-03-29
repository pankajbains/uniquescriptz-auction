
        <!-- Begin Hiraola's Footer Area -->
        <div class="hiraola-footer_area">
            <div class="footer-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="footer-widgets_info">

                                <div class="footer-widgets_logo">
                                    <a href="#">
                                        <img src="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $sitesetting[0]['site_sticky_header_logo'];?>" alt="<?php echo $sitesetting[0]['site_name'];?>">
                                    </a>
                                </div>


                                <div class="widget-short_desc">
                                    <p><?php echo $sitesetting[0]['site_desc'];?>
                                    </p>
                                </div>
                                <div class="hiraola-social_link">
                                    <ul>
										<?php 
											if($socialsetting[0]['social_facebook']!=''){
										?>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/<?php echo $socialsetting[0]['social_facebook'];?>" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
										<?php 
											}
											if($socialsetting[0]['social_twitter']!=''){
										?>
                                        <li class="twitter">
                                            <a href="https://www.twitter.com/<?php echo $socialsetting[0]['social_twitter'];?>" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
										<?php 
											}
											if($socialsetting[0]['social_instagram']!=''){
										?>
                                        <li class="instagram">
                                            <a href="https://www.instagram.com/<?php echo $socialsetting[0]['social_instagram'];?>" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
										<?php 
											}
											if($socialsetting[0]['social_linkedin']!=''){
										?>
										<li class="linkedin">
                                            <a href="https://www.linkedin.com/<?php echo $socialsetting[0]['social_linkedin'];?>" data-toggle="tooltip" target="_blank" title="LinkedIn">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
										<?php 
											}
											if($socialsetting[0]['social_pinterest']!=''){
										?>
										<li class="pinterest">
                                            <a href="https://www.pinterest.com/<?php echo $socialsetting[0]['social_pinterest'];?>" data-toggle="tooltip" target="_blank" title="Pinterest">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
										<?php 
											}
											if($socialsetting[0]['social_youtube']!=''){
										?>
										<li class="youtube">
                                            <a href="https://www.youtube.com/<?php echo $socialsetting[0]['social_youtube'];?>" data-toggle="tooltip" target="_blank" title="YouTube">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
										<?php 
											}
											
										?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="footer-widgets_area">
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <div class="footer-widgets_info">
                                            <div class="footer-widgets_title">
                                                <h6>About Us</h6>
                                            </div>
                                            <div class="widgets-essential_stuff">
                                                <ul>
                                                    <li class="hiraola-address"><i class="ion-ios-location"></i><span>Address:</span> <?php echo $sitesetting[0]['site_address']?></li>
                                                    <li class="hiraola-phone"><i class="ion-ios-telephone"></i><span>Call Us:</span> <a href="tel://<?php echo $sitesetting[0]['site_phone']?>"><?php echo $sitesetting[0]['site_phone']?></a>
                                                    </li>
                                                    <li class="hiraola-email"><i class="ion-android-mail"></i><span>Email:</span> <a href="mailto:<?php echo $emailsetting[0]['email_support'];?>"><?php echo $emailsetting[0]['email_support'];?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="instagram-container footer-widgets_area">
                                            <div class="footer-widgets_title">
                                                <h6>Sign Up For Newsletter</h6>
                                            </div>
                                            <div class="widget-short_desc">
                                                <p>Subscribe to our newsletters now and stay up-to-date with new collections</p>
                                            </div>
                                            <div class="newsletter-form_wrap">
                                                <!-- <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate> -->
                                                    <!-- <form id="subscribe" method="post"> -->
                                                    <div>
                                                        <div class="mc-form subscribe-form">
                                                            <input id="mc-email2" value="" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter your email" />
                                                            <button onclick="email_subscribe()" class="newsletter-btn">
                                                                <i class="ion-android-mail" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom_area">
                <div class="container">
                    <div class="footer-bottom_nav">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer-links">
                                    <ul>

                                        <li><a href="<?php echo base_url();?>cms/how-it-works.html">How it Works</a> </li>
                                        <li> <a href="<?php echo base_url();?>cms/about-us.html">What We Do</a> </li>
                                        <li> <a href="<?php echo base_url();?>account/buy_credits.html">Buy Credits</a> </li>
                                        <li> <a href="<?php echo base_url();?>home/contact.html">Contact</a> </li>
                                        <li> <a href="<?php echo base_url();?>account/login.html">Login</a> </li>
										<li> <a href="<?php echo base_url();?>account/register.html">Register</a> </li>
                                        <li> <a href="<?php echo base_url();?>cms/terms-conditions.html">Terms</a> </li>
                                        <li> <a href="<?php echo base_url();?>cms/privacy-policy.html">Privacy Policy</a> </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="payment">
                                    <a href="#">
                                        <img src="<?php echo base_url();?>assets/frontendfiles/images/footer/payment/1.png" alt="Hiraola's Payment Method">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="copyright">
                                    <span>Copyright &copy; 2019 <a href="#"><?php echo $this->config->item('sitename');?>.</a> All rights reserved.</span><br><br>
									<span><small>Maintained / Powered By <a href="https://www.uniquescriptz.com">UniqueScriptz</a></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Footer Area End Here -->


    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Modernizer JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Popper JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/countdown.js"></script>
    <!-- Barrating JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery.counterup.js"></script>
    <!-- Nice Select JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery.nice-select.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery.ui.touch-punch.min.js"></script>
    <!-- Lightgallery JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/lightgallery.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/scroll-top.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- Waypoints JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/waypoints.min.js"></script>
    <!-- Instafeed JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/instafeed.min.js"></script>
    <!-- Instafeed JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/jquery.elevateZoom-3.0.8.min.js"></script>

    <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/sweetalert.min.js"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->


    <!-- Main JS -->
    <script src="<?php echo base_url();?>assets/frontendfiles/js/main.js"></script>
	
	<script src="<?php echo base_url();?>assets/frontendfiles/js/<?php echo $this->router->fetch_method();?>.js.php"></script>

	

	<?php
		// $this->router->fetch_method();
		//echo $this->router->fetch_class();
		if($this->router->fetch_method()=='product'){	
	?>
			
	<script>
	/*----------------Load Related Products------------------------*/

	///$(document).ready(function(){
		//alert('<?php echo $content_data[0]['auction_category']?>');
		$.get('<?php echo base_url();?>product/related/<?php echo $content_data[0]['auction_category']?>.html', function(result){
				
				//alert(result);

				$("#related").html(result); // my_table_tbody is the id of the body of your table. 

			});

	///});

		/* Hiraola's Countdown
		/*----------------------------------------*/
		setInterval(function(){
			
				//$('#bidladder').get('../latestbids.php').fadeIn('slow');
				$.get("<?php echo base_url();?>product/latestbids/<?php echo $content_data[0]['auction_id'].'/'.(isset($_SESSION['user_id'])?$_SESSION['user_id']:'0')?>.html" , function(result){
				
				//alert(result);

				$("#leaderboard").html(result); // my_table_tbody is the id of the body of your table. 

			});
			
		},3000);



	</script>

	<?php
			$autionstime=$content_data[0]['auction_sdate'].' '.$content_data[0]['auction_stime'];

			$autionetime=$content_data[0]['auction_edate'].' '.$content_data[0]['auction_etime'];
									
			//echo strtotime($autionstime).'==start==<br>'.strtotime($autionetime).'==end==<br/>'.time()."<br>";

			//echo strtotime($autionstime).'==='.time().'<br/>';

			if((strtotime($autionstime) >= time())){

				//echo "auctionm start time";
	?>

	<script>
		/* Hiraola's Countdown
		/*----------------------------------------*/


		$('.hiraola-countdown').countdown('<?php echo $autionstime;?>', function(event) {
			$(this).html(
				event.strftime(
					'<div class="count"><span class="count-amount">%D</span><span class="count-period">Days</span></div><div class="count"><span class="count-amount">%H</span><span class="count-period">Hrs</span></div><div class="count"><span class="count-amount">%M</span><span class="count-period">Mins</span></div><div class="count"><span class="count-amount">%S</span><span class="count-period">Secs</span></div>'
				)
			);
		});

		/*---------------------------------------------*/
	</script>
	<?php
			}else{

		//echo "auction end time";
		
	?>

	<script>


		$('.hiraola-countdown').countdown('<?php echo $autionetime;?>', function(event) {
			$(this).html(
				event.strftime(
					'<div class="count"><span class="count-amount">%D</span><span class="count-period">Days</span></div><div class="count"><span class="count-amount">%H</span><span class="count-period">Hrs</span></div><div class="count"><span class="count-amount">%M</span><span class="count-period">Mins</span></div><div class="count"><span class="count-amount">%S</span><span class="count-period">Secs</span></div>'
				)
			);
		});

		/*---------------------------------------------*/
	</script>
	
	<?php
			}

		}
	?>
    
    <script>
    /*----------------Load Currency Products------------------------*/ 

             
        function language(id) {
            
            $.ajax({

                type: "POST",  
                url: "<?php echo base_url();?>change-currency/"+id,  
                success: function (html) {
                    location.reload();
                }
            });  

            
        }

        function email_subscribe(){
            var email = $('#mc-email2').val();
            if(email == ''){
                swal("Email address cannot be empty");
            }else{
                $.ajax({

                    type: "POST",  
                    url: "<?php echo base_url();?>product/email_subscription",
                    // contentType: "application/json; charset=utf-8",
                    data: {
                    'email_id':email
                    },   
                    success: function (html) {
                    console.log(html);
                        if(html==0){
                            swal("Invalid Email Address");
                        }
                        if(html == 1){
                            swal("Already Subscribed");	
                        }
                        if(html == 2){
                            swal("You have successfully subscribed");	
                        }

                        //location.reload();
                    }
                    });
            }
        }

        function add_wishlist(auction_id,status,auction_name){
               //var status = $('#wishlist').val();
             
              $.ajax({

                        type: "POST",  
                        url: "<?php echo base_url();?>/auction/add_wishlist",
                        data: {
					    'auction_id':auction_id, 'status':status
				        },   
                        success: function (html) {
                            // console.log(html);
                            
                            if(html==0){
                                //console.log('Deleted')
                                $("#add_wishlist_"+auction_id).removeClass("ion-android-favorite");
                                $("#add_wishlist_"+auction_id).addClass("ion-android-favorite-outline");
                                $('#wishlist').val('1');
                                swal("Your auction '"+auction_name+"' has been removed from your wishlist successfully.");
                                //$('#anchor_wishlist').attr("title",'Hello2')
                            }else{
                                //console.log('Added')
                                $("#add_wishlist_"+auction_id).removeClass("ion-android-favorite-outline");
                                $("#add_wishlist_"+auction_id).addClass("ion-android-favorite");
                                $('#wishlist').val('0');
                                swal("Your auction '"+auction_name+"' has been added in your wishlist successfully.");
                               // $('#anchor_wishlist').attr("title",'Hello1')
                            }

                        }
                });  

              
            }
        

        
    
    </script>
</body>

</html>