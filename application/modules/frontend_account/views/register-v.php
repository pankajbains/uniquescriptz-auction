
		<!-- Begin Hiraola's Page Area -->
        <div class="hiraola-login-register_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                        <?php
							$this->load->view('content-v');
						?>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="#" name="register" id="register">
                            <div class="login-form">
                                <h4 class="login-title">Register with <?php echo $this->config->item('sitename');?></h4>
								<div class="row" id="regmsg" style="display:none">
									<div class="col-md-12 col-12">
										<p>A confirmation mail has been sent successfully to your email account. Please click on the link given in your email to make your account active.<br><br>

										<span >Click <a href="<?php echo base_rul().'account/login.html';?>"><strong>here</strong></a> to login into your account.</span></p>
									</div>
								</div>
                                <div class="row" id="regform">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name</label>
										<input type="hidden" placeholder="First Name" id="referral" name="referral" value="0">
                                        <input type="text" placeholder="First Name" id="first_name" name="first_name">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Last Name" id="last_name" name="last_name">
                                    </div>
									<div class="col-md-12">
                                        <label>Nick Name*</label>
                                        <input type="text" placeholder="Nick Name" id="nickname" name="nickname" onchange="toggle_username('nickname')">
									</div>
                                    <div class="col-md-12">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address"  id="email" name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password"  id="password" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password"  id="cpassword" name="cpassword">
                                    </div>
									<div class="col-md-12 pt-3 pb-3">
										<div class="check-box">
                                            <input type="checkbox" id="terms" name="terms">
                                            <label for="terms">I have read and agree with <a href='<?php echo base_url();?>cms/terms-conditions.html' target="_blank" class="links">terms and conditions</a></label>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button class="hiraola-register_btn" id="registernow" name="registernow">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

