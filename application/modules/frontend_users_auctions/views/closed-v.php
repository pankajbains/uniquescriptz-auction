

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
															<th>Auction ID</th>
															<th>Item Name</th>
															<th>Winning Bid</th>
															
															<th>My Bids</th>
														</tr>
														<?php
															if(count($content_auction)>0){

																for($i=0;$i<count($content_auction);$i++){
														?>
														<tr>
															<td><a href="<?php echo base_url().'auction/showbids/'.$content_auction[$i]['auction_id'];?>.html"><?php echo $content_auction[$i]['auction_id']?></a></td>
															<td><?php echo $content_auction[$i]['auction_name']?></td>
															<td><?php echo $content_auction[$i]['bid_price']?></td>
															
															<td><a href="<?php echo base_url().'auction/showbids/'.$content_auction[$i]['auction_id'];?>.html"><i class="fa fa-eye"
                                                title="Remove"></i></a></td>
														</tr>
														<?php 
																}

															}else{
														?>
														<tr>
															<td colspan="6">No Records Available</td>
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
        </div>
        <!-- Hiraola's Page Area  End Here -->

