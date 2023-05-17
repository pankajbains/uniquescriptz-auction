

		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <?php
								//$this->load->view('content-v');
							?>
                     </div>
					
                        <div class="col-lg-3">
						    <?php
								$this->load->view('frontend_templates/usernav_v');
							?>

                        </div>


                        <div class="col-lg-9">
                           
                                    <div class="myaccount-orders">
                                        <h4 class="small-title"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> for <a href="<?php 
										

										echo base_url().'product/'.str_replace(' ','-',$content_data[0]['auction_name']).'/'.$content_data[0]['auction_id'];?>.html"><?php echo $content_data[0]['auction_name'].'('.$content_data[0]['auction_id'].')  auction '?></a></h4>
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															
															<th>Bid Price</th>
															<th>Bid Date</th>
															<th>Bid Status</th>
															
														</tr>
														<?php
															if(count($content_data)>0){

																for($i=0;$i<count($content_data);$i++){
														?>
														<tr>
															<td><?php echo $content_data[$i]['bid_price']?></td>
															<td><?php echo $content_data[$i]['bid_date']?></td>
															<td><?php 
																	
																	echo ($content_data[$i]['bid_status']==0)?'Lowest Unique Bid':'';
																	echo ($content_data[$i]['bid_status']==1)?'Unique Bid':'';
																	echo ($content_data[$i]['bid_status']==2)?'Duplicate Bid':'';
																	
																?></td>
														</tr>
														<?php 

																}
															}else{
														?>
														<tr>
															<td colspan="5">No Records Available</td>
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

