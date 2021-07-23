
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
                           
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">Gatways</h4>
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															<th>Gateway</th>
															<th>Gateway Fee's</th>
															<th>Total Amount</th>
															<th></th>
														</tr>
														<?php
															for($i=0;$i<count($content_gateway);$i++){
																
																if($content_record[0]['coupon_rate']!=''){
																$price= $content_gateway[$i]['gateway_fee']+$content_gateway[$i]['gateway_other_fee']+$content_record[0]['coupon_rate'];
																}else{
																$price= $content_gateway[$i]['gateway_fee']+$content_gateway[$i]['gateway_other_fee']+$content_record[0]['credit_rate'];
																}
														?>
														<tr>
															<td><a href="#"><?php echo $content_gateway[$i]['gateway_name']?></a></td>
															<td>$<?php echo $content_gateway[$i]['gateway_fee'].'+$'.$content_gateway[$i]['gateway_other_fee']?></td>
															<td>$<?php echo number_format($price,2);?></td>
															<td><a href="<?php echo base_url().'gateway/'.$content_gateway[$i]['id'].'/'.$content_record[0]['id'];?>.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>Pay Now</span></a>
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

