
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
												
												<table class="table table-bordered table-hover" id="wishlist_table">
													<tbody>
														<tr>
															<th>Auction ID</th>
															<th>Item Name</th>
															<th>End Time</th>
															<th>Bid Remains</th>
															<th>Action</th>
														</tr>
														<?php 
														$total_auction_count=0;
														if(count($wishlist_data)==0){
															$total_auction_count=count($wishlist_data);
															echo"<tr><td colspan='5'>Your aution wishlist is empty</td></tr>";
														}else{
															$total_auction_count=count($wishlist_data);
														foreach($wishlist_data as $data){
														 ?>
														 
														<tr id="<?php echo 'auc'.$data['auction_id']; ?>">
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
															<td><?php echo date("d-m-Y h:s:i", strtotime($data['end_date']." ".$data['end_time']))?></td>
															<td><?php echo $data['auction_max_bid']-$data['auction_bid']?></a>
															</td>
															<td data-toggle="modal" data-target="#exampleModal" id="delete_wishlist" style="cursor:pointer;"onclick="add_wishlist2('<?php echo $data['auction_id'];?>','0', '<?php echo $data['auction_name'];?>')"><i class="icon-trash bigger-130"></i></td>
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
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Remove Wishlist</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type='hidden' id='statusM'>
					<input type='hidden' id='auction_idM'>
					<input type='hidden' id='auction_nameM'>
					Are you sure you want to remove this auction from your wishlist?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick='delete_auction()'>Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>
			<!-- Modal End-->
        </div>
        <!-- Hiraola's Page Area  End Here -->
		<script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/sweetalert.min.js"></script>

		<script>
			var total_auction_data=<?php echo $total_auction_count; ?>;
			
		function add_wishlist(auction_id,status,auction_name){
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
								$('#exampleModal').modal('toggle');
								total_auction_data=total_auction_data-1;
								$('#auc'+auction_id).hide();
								if(total_auction_data==0){
									$('#wishlist_table tbody').append("<tr><td colspan='5'>Your aution wishlist is empty</td></tr>");	
								}
								swal("Your auction '"+auction_name+"' is removed from your wishlist successfully.");
								//location.reload()    
                            }else{
                                console.log('Added')  
                            }
                            
                            //location.reload();
                        }
                });  

              
            }

			function add_wishlist2(id, status, auction_name){
				$('#auction_idM').val(id);
				$('#statusM').val(status);
				$('#auction_nameM').val(auction_name);
		
		}

		function delete_auction(){
			var auction_id = $('#auction_idM').val()
			var status = $('#statusM').val()
			var auction_name = $('#auction_nameM').val()
			add_wishlist(auction_id,status, auction_name)
			
		}

</script>