
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <?php
								$this->load->view('content-v');
							?>
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
															<th>Transaction ID</th>
															<th>Transaction Date</th>
															<th>Transaction Amount </th>
															<th>Plan Purchased</th>
														</tr>
														<?php
														
															if(count($content_payments)>0){
																for($i=0;$i<count($content_payments);$i++){
																 
																
														?>
														<tr>
															<td><?php echo $content_payments[$i]['txn_id']?></td>
															<td><?php echo date("d-m-Y", strtotime($content_payments[$i]['purchase_date'])); ?></td>
															<td><?php echo  $this->frontend_templates->convert_currency_price('currency_price', $content_payments[$i]['amount']); ?> </td>
															<?php if($content_payments[$i]['plan_type'] == "credit_pay") { ?>
															<td><?php echo 'Credit Pay'.' of '.$this->frontend_templates->convert_currency_price('currency_price', $content_payments[$i]['paid_amount']); ?></a>
															<?php  }  else { ?>
																<td><?php echo  'Coupon Pay'.' of '.$this->frontend_templates->convert_currency_price('currency_price', $content_payments[$i]['paid_amount']); ?></a>
															<?php  }  ?>

															</td>
														</tr>
														<?php
															}
														}
															else{
														?>
														<tr>
															<td colspan="4"> No records available.
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

