
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
                          
                                    <div class="myaccount-orders">
                                        <h4 class="small-title"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?></h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>S. No.</th>
                                                        <th>Offer Price</th>
                                                        <th>Offer Plan</th>
                                                        <th></th>
                                                    </tr>
													<?php 
															for($i=0;$i<count($content_credits);$i++){
														?>
                                                    <tr>
                                                    
                                                        <td><?php echo $i+1;?>.</td>
                                                        <td><?php echo  $this->frontend_templates->convert_currency_price('currency_price', $content_credits[$i]['credit_rate']); ?> </td>
                                                        <td><?php echo $content_credits[$i]['paid_credit'];  ?> Paid Credits & <?php echo $content_credits[$i]['free_credit']?> Free Credits</td>
                                                        <td><a href="<?php echo base_url().'account/credit_pay/'.$content_credits[$i]['id'];?>.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>Buy Now</span></a>
                                                        </td>
                                                    </tr>
														<?php
															}
														?>
                                                </tbody>
                                            </table>

										</div><br><br>
										<h4 class="small-title">Get Gift Coupon Credits</h4>
										<p>Please enter your coupon/voucher code with last 4 digits of your mobile number to get credits.</p>
										<div class="myaccount-details">
											<form id="buy_form" name="buy_form" class="hiraola-form">
												<div class="alert alert-block alert-success" id="success" style="display:none;">
													<span id="msg"><strong>Well done!</strong> Records are updated successfully!</span>
												</div>
												<div class="hiraola-form-inner">
													
													<div class="single-input">
														<label for="creditcoupon">Enter Coupon Code</label>
														<input type="text" id="creditcoupon" name="creditcoupon" required>
													</div>
													<div class="single-input">
														<button class="hiraola-btn hiraola-btn_dark" type="submit"><span>Get Credits</span></button>
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

