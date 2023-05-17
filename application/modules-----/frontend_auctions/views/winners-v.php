

		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <?php
								$this->load->view('content-v');
							?>
                     </div>
					
                        

                        <div class="col-lg-12">
                           
                                    <div class="myaccount-orders">
                                        
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															<th>Auction ID</th>
															<th>Item Name</th>
															<th>Winning Bid</th>
															<th>Winner Name</th>
															<th>Winning Date</th>
															<th></th>
														</tr>
														<?php
															if(count($content_winners)>0){

																for($i=0;$i<count($content_winners);$i++){
														?>
														<tr>
															<td><a href="<?php echo base_url().'auction/detailbids/'.$content_winners[$i]['auction_id'];?>.html"><?php echo $content_winners[$i]['auction_id']?></a></td>
															<td><?php echo $content_winners[$i]['auction_name']?></td>
															<td><?php echo $content_winners[$i]['bid_price']?></td>
															<td><?php 

															$user = $this->frontend_auctions_m->getuser($content_winners[$i]['user_id']);
															echo ucwords($user[0]['first_name'].' '.$user[0]['last_name']);

															?></a></td>
															<td><?php echo $content_winners[$i]['won_date']?></a></td>
															<td><a href="<?php echo base_url().'auction/detailbids/'.$content_winners[$i]['auction_id'];?>.html"><i class="fa fa-eye"
                                                title="Show Bids"></i></a></td>
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

