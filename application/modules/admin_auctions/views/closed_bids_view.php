<?php
					$configpage = explode('_',$this->router->fetch_method());
				
				?>
				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Content
							<small>
								<i class="icon-double-angle-right"></i>
								View <?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?>
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div class="alert alert-block alert-success" id="success" style="display:none;">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<p>
											<strong>
												<i class="icon-ok"></i>
												Well done!
											</strong>
											<span id="msg">Records are updated successfully!</span>
										</p>
							</div>



							<div class="row-fluid">
								
								<div class="table-header">
									Results for "<?php echo $v_auctions_bids['auction_name']; ?> Viewbids" &nbsp;&nbsp;&nbsp; Total bids:   <?php echo $v_auctions_bids['total_bids']; ?>   &nbsp;&nbsp;&nbsp;|   &nbsp;&nbsp;&nbsp;Auction ID:
                                    <?php echo $v_auctions_bids['auction_id']; ?>  &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp; Item Name: <?php echo $v_auctions_bids['auction_name']; ?> &nbsp;&nbsp;&nbsp; |
									Current <?php echo $v_auctions_bids['auction_type']; ?> Unique Bid: <?php echo $v_auctions_bids['unique']; ?>
									
								</div>

								<table id="sample-table-3" class="table table-striped table-bordered table-hover">
									<thead>
										<tr> 
											<th>User name</th>
											<th>User Login Id</th>
											<th>Email</th>
											<th>Auction Bid Date</th>
                                            <th>Auction Bid Price</th> 
										</tr>
									</thead>


									<tbody>
										<?php  
										// var_dump($v_auctions_bids['records']);
										$auction_bids = $v_auctions_bids['records'];
                                            for($i=0; $i<count($auction_bids); $i++) { 
												
											 
                                            ?>
                                    <tr> 
                                        <td><?php echo $auction_bids[$i]['first_name'].' '.$auction_bids[$i]['last_name'];  ?></td>
                                        <td><?php echo $auction_bids[$i]['user_id'] ?></td>
                                        <td><?php echo $this->admin_templates->encrypt_decrypt('decrypt',$auction_bids[$i]['email']); ?></td>
                                        <td><?php echo $auction_bids[$i]['bid_date'] ?></td>
                                        <td><?php echo $auction_bids[$i]['bid_price'] ?></td>
                                        
                                        </tr>
                                     <?php 
                                            }
                                        ?>


									</tbody>
								</table>
							</div>


						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->