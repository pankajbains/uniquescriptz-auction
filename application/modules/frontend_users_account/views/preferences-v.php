
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <?php
								$this->load->view('content-v');
							?>
                     </div>
					
                        <div class="col-lg-3">
						    <?php
								$this->load->view('frontend_templates/usernav_v');
							?>

                        </div>


                        <div class="col-lg-9">
                           <h4>Refer Friend</h4>
                            <div class="tab-pane active" id="account-details">
                                    <div class="myaccount-details">
										<div class="alert alert-block alert-success" id="successrefer" style="display:none;">
											<span id="msgrefer"><strong>Well done!</strong> Records are updated successfully!</span>
										</div>

                                        <form id="refer_form" name="refer_form" class="hiraola-form">
                                            <div class="hiraola-form-inner">
                                                <div class="single-input single-input-half">
                                                    <label for="first_name">Friend First Name*</label>
                                                    <input type="text" id="first_name" name="first_name" required>
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="last_name">Last Name*</label>
                                                    <input type="text" id="last_name" name="last_name" required>
                                                </div>
                                                <div class="single-input">
                                                    <label for="email">Friend Email*</label>
                                                    <input type="email" id="email" name="email" required>
                                                </div>
                                                
                                                <div class="single-input">
                                                    <button class="hiraola-btn hiraola-btn_dark" type="submit"><span>Refer Friend</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
								<br><br>
								<h4>Newsletter Settings</h4><br>
								 <div class="tab-pane active" id="account-details">
									
                                    <div class="myaccount-details ">

										<div class="alert alert-block alert-success" id="success" style="display:none;">
											<span id="msg"><strong>Well done!</strong> Records are updated successfully!</span>
										</div>

                                        <form id="newsletter_form" name="newsletter_form" class="hiraola-form login-form" style='-webkit-box-shadow: none !important; box-shadow: none !important;'>
                                            <div class="hiraola-form-inner">
												<div class="col-md-12">
													<div class="check-box single-input single-input-half">
                                                        <?php
                                                        //print_r($subscription_data);
                                                        ?>
                                                        <input type="hidden" id="mc-email2" value="<?php echo $email; ?>">
                                                        <?php
                                                            if(isset($subscription_data) && $subscription_data[0]['status'] == 'subscribed'){   
                                                        ?>
														<input checked type="checkbox" id="newsletters" name="newsletters" >
														<?php
                                                            }else{    
                                                        ?>
                                                            <input type="checkbox" id="newsletters" name="newsletters" >
                                                        <?php
                                                            }
                                                        ?>                
                                                        <label for="newsletters">Subscribe to our newsletter. </label>
													</div>
												</div>
                                          
												<div class="col-md-12">
													<div class="check-box single-input single-input-half">
														<input type="checkbox" id="activitystatus" name="activitystatus" <?php echo ($content_preference[0]['activitystatus']==1)?'checked':''?>>
														<label for="activitystatus">Send me My Current Auctions status messages.</label>
													</div>
												</div>

                                                
                                                <div class="single-input pt-3">
                                                    <button class="hiraola-btn hiraola-btn_dark" onclick="update_newsletter_status()" type="submit"><span>Update Settings</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                        </div>

					
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

        <script>
            function update_newsletter_status(){
             var ischeck =  $('#newsletters').is(":checked")
                if(ischeck){
                    console.log('checkbox is checked');
                    email_subscribe2();
                }else{
                    console.log('checkbox is not checked');
                    email_unsubscribe();
                }
            }
            function email_subscribe2(){
            var email = $('#mc-email2').val();
            if(email == ''){
                //swal("Email address cannot be empty");
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
                            //swal("Invalid Email Address");
                        }
                        if(html == 1){
                            //swal("Already Subscribed");	
                        }
                        if(html == 2){
                            //swal("You have successfully subscribed");	
                        }

                        //location.reload();
                    }
                    });
            }
        }

        function email_unsubscribe(){
            var email = $('#mc-email2').val();
            if(email == ''){
                //swal("Email address cannot be empty");
            }else{
                $.ajax({

                    type: "POST",  
                    url: "<?php echo base_url();?>product/email_unsubscription",
                    // contentType: "application/json; charset=utf-8",
                    data: {
                    'email_id':email
                    },   
                    success: function (html) {
                    console.log(html);
                        if(html==0){
                            //swal("Invalid Email Address");
                        }
                        if(html == 1){
                            //swal("Already Subscribed");	
                        }
                        if(html == 2){
                            //swal("You have successfully subscribed");	
                        }

                        //location.reload();
                    }
                    });
            }
        }
        </script>

