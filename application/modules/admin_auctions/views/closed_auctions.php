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
									Results for "<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?>" 
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
											<th><?php echo ucwords($configpage[1]);?> Name</th>
											<th><?php echo ucwords($configpage[1]);?> ID</th>
											<th><?php echo ucwords($configpage[1]);?> Winning Bid</th>
											<th><?php echo ucwords($configpage[1]);?> End Date</th>
											<th><?php echo ucwords($configpage[1]);?> Status</th>
											<th class="hidden"></th>
											<th class="hidden"></th>
											<th class="hidden-480"></th>
											
											
										</tr>
									</thead>


									<tbody>
										<?php 
										if(count($auctions_list)==0){echo "No records available.";}else{
										
										for($i=0;$i<count($auctions_list);$i++){?>
										<tr id="<?php echo $auctions_list[$i]['auction_id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="view_bids/<?php echo $auctions_list[$i]['auction_id'];?>.html"><?php echo $auctions_list[$i]['auction_name'];?></a>
											</td>
											<td>
												<a href="view_bids/<?php echo $auctions_list[$i]['auction_id'];?>.html"><?php echo $auctions_list[$i]['auction_id'];?></a>
											</td>
											<td><?php echo $auctions_list[$i]['bid_price']?></td>
											<td><?php echo $auctions_list[$i]['auction_edate'].' '.$auctions_list[$i]['auction_etime'];?></td>
											<td>
											<?php if($auctions_list[$i]['auction_winner']==1){?>
											<span class="label label-success">Winner Selected</span>
											<?php }else{ ?>
											
											<span class="label label-warning">Winner Not Selected</span>
											<?php } ?>
											</td>
											 	
											<th class="hidden"></th>
											<th class="hidden"></th>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">

													<a class="green" style="cursor:pointer;" id="duprec" value="<?php echo $auctions_list[$i]['auction_id'];?>" title="copy">
														<i class="icon-retweet bigger-130"></i>
													</a>

												</div>

												<div class="hidden-desktop visible-phone">
													<div class="inline position-relative">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
															<i class="icon-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

															<li>
																<a style="cursor:pointer;" id="duprec" value="<?php echo $auctions_list[$i]['auction_id'];?>" class="tooltip-success" data-rel="tooltip" title="Copy">
																	<span class="green">
																		<i class="icon-retweet bigger-120"></i>
																	</span>
																</a>
															</li>

														</ul>
													</div>
												</div>
											</td>
										</tr>

										<?php
											}

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