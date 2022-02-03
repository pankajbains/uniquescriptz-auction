
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
                        <form method="post">
                            <div class="login-form">
                                <h4 class="login-title">Retrieve your password of <?php echo $this->config->item('sitename');?></h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address" name="reset_password_email" id="reset_password_email">
                                    </div>
                                    <div id="error_reset_password" style="color:red;">
									</div>
                                    <div class="col-md-12">
										<button class="hiraola-login_btn" onclick="reset_password()";>Send Me</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

<script>
    function reset_password(){
	var email=$("#reset_password_email").val();
	if(email==""){
		$("#error_reset_password").html('Email is required');
	}else{
		$("#error_reset_password").html('');
		$.ajax({

			type: "POST",  
			url: "<?php echo base_url();?>/check-user-mail",
			data: {
			'email_id':email
			},   
			success: function (html) {
			console.log(html);
				if(html==1){
					$("#error_reset_password").html("<span style='color:green !important'> Password Reset Email has been sent to your email address. Please follow steps in your email</span>");
				}else{
					$("#error_reset_password").html('Email is invalid');	
				}
				//location.reload();
			}
		});
	}
	console.log(email);

	
}
</script>


