
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
                    
                            <div class="login-form">
                                <h4 class="login-title">Please Enter New Password for <?php echo $this->config->item('sitename');?></h4>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label>New Password</label>
                                        <input type="password" placeholder="New Password" name="user_password" id="user_password">
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password" name="c_user_password" oninput="isPasswordMatch()" id="c_user_password">
                                    </div>
                                    <div id="error_reset_password" style="color:red;">
									</div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="token" value="<?php echo $result[0]['token'] ?>" name="token">
										<button class="hiraola-login_btn" onclick="update_password()";>Update</button>
                                        
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

<script>
    function update_password(){
	var password=$("#user_password").val();
    var c_password=$("#c_user_password").val();
    var token=$("#token").val();
    if(password==c_password){
        $.ajax({

                type: "POST",  
                url: "<?php echo base_url();?>/update-user-password",
                data: {
                'password':password,
                'token': token
                },   
                success: function (html) {
                console.log(html);
            if(html==1){
                var answer = confirm ("Your Password has been updated successfully. Please click OK to Login");
                if (answer){
                window.location="<?php echo base_url().'account/login.html'; ?>";
                }	
            }
            //location.reload();
        }
        });
    }else{
        alert('password does not match')
        return false;
    }
}

function isPasswordMatch() {
    var password = $("#user_password").val();
    var confirmPassword = $("#c_user_password").val();

    if (password != confirmPassword){
	 $("#error_reset_password").html("<span style='color:red'>Password does not match!<span>");
	 $("#reg").prop('disabled', true);
	}
    else{ 
		$("#error_reset_password").html("<span style='color:green'>Password match.<span>");
		$("#reg").prop('disabled', false);
	}
}
</script>


