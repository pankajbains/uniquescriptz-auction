
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
                        <form action="#" id="login_form" name="login_form" method="post">
                            <div class="login-form">
                                <h4 class="login-title">Login with <?php echo $this->config->item('sitename');?></h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" name="email" id="email">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password" id="password">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="check-box">
                                            <input type="checkbox" id="remember_me" name="remember_me">
                                            <label for="remember_me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="forgotton-password_info">
                                            <a href="<?php echo base_url();?>account/forgot_password.html"> Forgotten pasward?</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="hiraola-login_btn" id="login_now" name="login_now">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

