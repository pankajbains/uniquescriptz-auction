
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
															<th>Action</th>
														</tr>
														<?php 
														if(count($wishlist_data)==0){
															echo"<tr><td colspan='5'>There is no data in your wishlist</td></tr>";
														}else{
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
															<td id="delete_wishlist" style="cursor:pointer;"onclick="add_wishlist2('<?php echo $data['auction_id'];?>','0')"><i class="icon-trash bigger-130"></i></td>
														</tr>
														<?php
														}
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

			function add_wishlist2(id, status){
				
				var value=$(this).attr('value');

				if(confirm("Are you sure you want to remove this auction from your wishlist? \nThere is NO undo!")){
					add_wishlist(id,status)		

				}
			
		}
</script>