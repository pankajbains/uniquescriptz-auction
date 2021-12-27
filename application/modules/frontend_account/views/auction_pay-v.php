
 <style>
        .stripe-button-el span {
        background:#595959;
        }
        .stripe-button-el{

        background:#595959;
        width:100%;
        height:40px;
        line-height:40px;
        font-size:13px;

        font-weight:400;
        }
</style>
	
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <h2>Select Payment Gateway</h2>
                     </div>
					
                        <div class="col-lg-3">
						    <?php
								$this->load->view('frontend_templates/usernav_v');
							?>

                        </div>


                        <div class="col-lg-9">
						<?php  
							$url = $this->uri->segment(2);  
						 
						?>
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">Gatways</h4>
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															<th>Gateway</th>
															<th>Bid Amount</th>
															<th>Gateway Fee's</th>
															<th>Total Amount</th>
															<th></th>
														</tr>
														<?php
															for($i=0;$i<count($content_gateway);$i++){
																 
															if($content_record[0]['coupon_rate']!=''){
																$auction_won_amount = $content_record[0]['bid_price'];
																$price= number_format(($auction_won_amount)+$content_gateway[$i]['gateway_fee'],'2','.',' ');
																
															}else{
																$auction_won_amount = $content_record[0]['bid_price'];
																$price =  number_format(($auction_won_amount)+$content_gateway[$i]['gateway_fee'],'2','.',' ');
																
															}
														?>
														<tr>
														
															<td><a href="#"><?php echo $content_gateway[$i]['gateway_name']?></a></td>
															<td><?php echo '$'.$auction_won_amount; ?> </td>
															<td><?php echo '$'.$content_gateway[$i]['gateway_fee']; ?> </td>
															<td><?php  echo '$'.$price ?> </td>
															 
															<td>
															
															<?php  if($content_gateway[$i]['id'] == "2" ) {  ?>
																<form action="<?php echo base_url().'stripe-payment/'.$url.'/'.$content_gateway[$i]['id'].'/'.$content_record[0]['id'];?>.html">
																
																<input type="hidden" name="b_amount" id="b_amount" value="<?php echo $price;?>">
																<input type="hidden" name="bidcoupon_id" id="bidcoupon_id" value="<?php echo $this->uri->segment(3);?>">
																<script
																		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
																		data-key="<?php echo $content_gateway[$i]['public_key'] ?>"
																		data-amount="<?php echo (number_format($price, 2,'.',' ') * 100); ?>"
																		data-name="<?php echo $sitesetting[0]['site_name']; ?>"
																		data-description="<?php echo $sitesetting[0]['site_desc']; ?>"
																		data-currency="CAD"
																		>
																</script> 
															   	<script>
																	document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
																</script> 
																	<button type="submit" class="stripe-button hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>Pay Now</span></button>
																</form>	 
																
															<?php } else  { ?>
																  
																 
																<form id="paypal_form" name="paypal_form" action="<?php echo base_url().'paygateway/'.$url.'/'.$content_gateway[$i]['id'].'/'.$content_record[0]['id'];?>.html" method="POST"> 
																	<input type="hidden" name="bidcoupon_id" id="bidcoupon_id" value="<?php echo $this->uri->segment(3);?>">
																	<button type="submit" class="stripe-button hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>Pay Now</span></button>
																</form>

																<!-- <a href="<?php //echo base_url().'paygateway/'.$url.'/'.$content_gateway[$i]['id'].'/'.$content_record[0]['id'];?>.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>Pay Now</span></a> -->
																 

															<?php } ?>

															</td>
														</tr>
														<?php
															}
														?>

													</tbody>
												</table>
											</div>
										</div><br><br>


					
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->


		
		
                                  
		
