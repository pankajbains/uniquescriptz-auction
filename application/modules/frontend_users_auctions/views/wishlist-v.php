
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
															<th>End Time</th>
															<th>Bid Remains</th>
															<th>Remove</th>
														</tr>
														<?php 
														foreach($wishlist_data as $data){
														 ?>
														 
														<tr>
															<td>
																<a href="<?php echo base_url().'product/Auction-/'.$data['auction_id'].'.html'?>">
																	<?php echo $data['auction_id']?>
																</a>
															</td>
															<td>
																<a href="<?php echo base_url().'product/Auction-/'.$data['auction_id'].'.html'?>">
																	<?php echo $data['auction_name']?>
																</a>
															</td>
															<td><?php echo $data['end_date']." ".$data['end_time']?></td>
															<td><?php echo $data['auction_max_bid']-$data['auction_bid']?></a>
															</td>
															<td style="cursor:pointer;"onclick="add_wishlist('<?php echo $data['auction_id'];?>','0')">Delete</td>
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
		<script>
		function add_wishlist(auction_id,status){
               var status = $('#wishlist').val();
                
                //$("#add_wishlist").attr("class", "ion-android-favorite");


                $.ajax({

                        type: "POST",  
                        url: "<?php echo base_url();?>/auction/add_wishlist",
                        data: {
					    'auction_id':auction_id, 'status':status
				        },   
                        success: function (html) {
                            console.log(html);
                            
                            if(html==0){
                                console.log('Deleted')
								location.reload()    
                            }else{
                                console.log('Added')  
                            }
                            
                            //location.reload();
                        }
                });  

              
            }
</script>