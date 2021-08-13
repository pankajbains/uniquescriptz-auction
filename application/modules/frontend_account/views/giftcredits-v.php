<style>
input[type="radio"] {
    -ms-transform: scale(1.5); /* IE 9 */
    -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
    transform: scale(1.5);
}
</style>
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area checkout-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12">
                            <?php
								$this->load->view('content-v');
							?>
                     </div>
					
						<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" id="creditform">

							<form id="gift_form" name="gift_form" action="gift_now" method="POST">

								<div class="login-form">
									<div class="col-sm-12 col-md-12 col-xs-12 col-lg-7 float-right">
										<h4 class="small-title"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?></h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
														<th></th>
                                                        <th>Coupon Cost</th>
                                                        <th>Coupon Credits</th>
                                                        <th>Coupon Validity</th>
                                                        
                                                    </tr>
														<?php 
															for($i=0;$i<count($content_credits);$i++){
														?>
                                                    <tr>
														<td><input type="radio" name="couponid" id="couponid" value="<?php echo $content_credits[$i]['id']?>"></td>
                                                        <td><?php  echo $this->frontend_templates->convert_currency_price('currency_price',$content_credits[$i]['coupon_rate']); ?>  </td>
                                                        <td><?php echo $content_credits[$i]['coupon_credit']?> Credits</td>
                                                        <td><?php echo $content_credits[$i]['coupon_validity']?> Month</td>
                                                    </tr>
														<?php
															}
														?>
                                                </tbody>
                                            </table>

										</div><br><br>
									</div>
									<div class="col-sm-12 col-md-12 col-xs-12 col-lg-5  mt-0">
										<h4 class="login-title">Gift your friends <?php echo $this->config->item('sitename');?> coupons </h4>
										<div class="row checkbox-form">
											<div class="col-md-6 col-12 mb--20">
												<label>Friend First Name</label>
												<input type="text" placeholder="First Name" name="first_name" id="first_name" required>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Friend Last Name</label>
												<input type="text" placeholder="Last Name" name="last_name" id="last_name" required>
											</div>
											<div class="col-md-12">
												<label>Friend Email Address*</label>
												<input type="email" placeholder="Email Address"  name="email" id="email" required>
											</div>
											<div class="col-md-12">
												<label>Your Name</label>
												<input type="name" placeholder="Your Name" name="name" id="name" required>
											</div>
											<div class="checkout-form-list checkout-form-list-2 col-md-12 order-notes">
												<label>Message</label>
												<textarea name="message" id="message" cols="30" rows="10"></textarea>
												
											</div>
											
											<div class="col-12">
												<button class="hiraola-register_btn">Gift Nows</button>
											</div>
										</div>
									</div>
								</div>
						   </form>
						</div>

					
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

