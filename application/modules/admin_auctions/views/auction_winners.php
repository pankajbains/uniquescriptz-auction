				<?php
					$configpage = explode('_',$this->router->fetch_method());
				
				?>
				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php echo ucwords($configpage[1]).' '.ucwords($configpage[0]);?> Content
							<small>
								<i class="icon-double-angle-right"></i>
								View <?php echo ucwords($configpage[1]).' '.ucwords($configpage[0]);?>
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
									Results for "<?php echo ucwords($configpage[1]).' '.ucwords($configpage[0]);?>" 
								</div>

								<table id="sample-table-3" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th><?php echo ucwords($configpage[1]);?> Name/ID</th>
											<th><?php echo ucwords($configpage[0]);?> Name</th>
											<th><?php echo ucwords($configpage[0]);?> Email</th>
											<th><?php echo ucwords($configpage[1]);?> Winning Bid</th>
											<th>Winning Date</th>
											<th>Payment Delivery Status</th>
											<th class="hidden"></th>
											<th class="hidden"></th>
											
											
										</tr>
									</thead>


									<tbody>
										<?php 
										for($i=0;$i<count($winner_list);$i++){?>
										<tr id="<?php echo $winner_list[$i]['auction_id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="view_bids/<?php echo $winner_list[$i]['auction_id'];?>.html"><?php echo $winner_list[$i]['auction_name'];?></a>
											</td>
											<td>
												<a href="<?php echo base_url();?>admin_users/add_users/<?php echo $winner_list[$i]['reg_id'];?>.html"><?php echo $winner_list[$i]['first_name'].' '.$winner_list[$i]['last_name'];?></a>
											</td>
											<td><?php echo $this->common->encrypt_decrypt('decrypt',$winner_list[$i]['email']);?> </td>
											<td><?php echo $winner_list[$i]['bid_price'];?></td>
											<td>
											<?php echo $winner_list[$i]['won_date'];?>
											</td>
											 	
											<td> <?php echo ($winner_list[$i]['payment']==0)?'Not Paid':'Paid';?> / <?php echo ($winner_list[$i]['delivered']==0)?'Not Delivered':'Delivered';?></th>
											<th class="hidden"></td>

											<td class="td-actions hidden">
												
											</td>
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