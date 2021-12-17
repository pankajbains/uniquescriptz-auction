
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <?php
								$this->load->view('content-v');
							?> 
                    <span> Your account has: <strong> <?php echo $content_user[0]['paid_credit']; ?></strong> Paid and <strong><?php echo $content_user[0]['free_credit']; ?></strong> Free Credits</span>             
                     </div>
                        <div class="col-lg-3">
						    <?php
								$this->load->view('frontend_templates/usernav_v');
							?>

                        </div>
                       

                        <div class="col-lg-9">
                       
                            <div class="tab-pane active" id="account-details">
                                    <div class="myaccount-details">

                                        <?php 
                                            $msg=  $this->session->flashdata('pay_success');
                                            if($msg == "success"){
                                                ?>
                                                <div class="alert alert-block alert-success"  id="p_success">
                                                    <span id="msg"><strong>Well done!</strong> Payment successfully done please check the account credits!</span>
                                                </div>    
                                            <?php }  ?>

                                        <?php 
                                            $msg=  $this->session->flashdata('pay_error');
                                            if($msg == "error"){  ?>
                                                <div class="alert alert-block alert-danger" id="p_error" >
                                                    <span id="msg"><strong>Ooops!</strong> Payment cancelled please check the account! if any  amount debited then within 24 hours will be back</span>
                                                </div> 
                                        <?php  }   ?>
                                        
										<div class="alert alert-block alert-success" id="success" style="display:none;">
											<span id="msg"><strong>Well done!</strong> Records are updated successfully!</span>
										</div>

										<form autocomplete="off" id="account_form" name="account_form" method="post" class="hiraola-form">

                                            <div class="hiraola-form-inner">

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">First Name*</label>
                                                    <input type="text" id="first_name" name="first_name" value="<?php echo $content_account[0]['first_name']?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-lastname">Last Name*</label>
                                                    <input type="text" id="last_name" name="last_name" value="<?php echo $content_account[0]['last_name']?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-email">Email*</label>
                                                    <input type="email" id="email" name="email" value="<?php echo $this->common->encrypt_decrypt('decrypt',$content_account[0]['email']);?>" readonly>
                                                </div>

												<div class="single-input single-input-half">
                                                    <label for="account-details-nickname">Nickname*</label>
                                                    <input type="text" id="nickname" name="nickname" value="<?php echo $this->common->encrypt_decrypt('decrypt',$content_account[0]['user_name'])?>"readonly>
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-mobile">Mobile*</label>
                                                    <input type="number" id="mobile" name="mobile" value="<?php echo $content_account[0]['mobile']?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-mobile">Address*</label>
                                                    <input type="text" id="address" name="address" value="<?php echo $content_address[0]['address']?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-mobile">City*</label>
                                                    <input type="text" id="city" name="city" value="<?php echo $content_address[0]['city']?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-mobile">State*</label>
                                                    <input type="text" id="state" name="state" value="<?php echo $content_address[0]['state']?>">
                                                </div>

                                                <div class="single-input single-input-half">
                                                    <label for="account-details-mobile">Pincode*</label>
                                                    <input type="number" id="pin" name="pin" value="<?php echo $content_address[0]['pin']?>">
                                                </div>

												<div class="single-input single-input-half">
                                                    <label for="account-details-country">Country*</label>
                                                    <select class="nice-select wide" id="country" name="country">
														<option value="">Select Country</option>
														<?php 
														 $country=$this->frontend_templates->country();
														 //var_dump($country);
														 //echo count($country);
														  for($i=0;$i<count($country);$i++){
															
															if($content_account[0]['country']==$country[$i]['Code2']){$selected="selected";}else{$selected="";}

															 echo "<option value='".$country[$i]['Code2']."' ".$selected.">".$country[$i]['Name']."</option>";

														 }
														
														?>
													</select>
                                                </div>


                                                <div class="single-input">
                                                    <label for="npassword">New Password (leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" name="npassword" id="npassword" placeholder="&nbsp" autocomplete="off">
                                                </div>

                                                <div class="single-input">
                                                    <label for="cnpassword">Confirm New Password</label>
                                                    <input type="password" name="cpassword" id="cpassword">
                                                </div>

                                                <div class="single-input">
                                                    <button class="hiraola-btn hiraola-btn_dark" type="submit"><span>SAVE
                                                    CHANGES</span></button>
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



	
