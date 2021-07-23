
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
                        <form id="forgot_form" name="forgot_form" method="post">
                            <div class="login-form">
                                <h4 class="login-title">Retrieve your password of <?php echo $this->config->item('sitename');?></h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" name="email" id="email">
                                    </div>
                                    <div class="col-md-12">
										<button class="hiraola-login_btn" id="forgot_now" name="forgot_now">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

