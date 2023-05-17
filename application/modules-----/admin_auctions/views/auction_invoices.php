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

								<table id="sample-table-4" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th><?php echo ucwords($configpage[1]);?> Name/ID</th>
											<th>Winner Name</th>
											<th>Winner Email</th>
											<th>Invoice Number</th>
											<th>Payment Recieved</th>
											<th>Delivered</th>
											<th class="hidden"></th>
											<th class="hidden-480"></th>
											
											
										</tr>
									</thead>


									<tbody>
										<?php 
										// var_dump($invoice_list);
										for($i=0;$i<count($invoice_list);$i++){ 
										?>
										<tr id="<?php echo $invoice_list[$i]['auction_id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="view_bids/<?php echo $invoice_list[$i]['auction_id'];?>.html"><?php echo $invoice_list[$i]['auction_name'];?> / <?php echo $invoice_list[$i]['auction_id'];?></a>
											</td>
											<td>
												<a href="<?php echo base_url();?>admin_users/add_users/<?php echo $invoice_list[$i]['reg_id'];?>.html"><?php echo $invoice_list[$i]['first_name'].' '.$invoice_list[$i]['last_name'];?></a>
											</td>
											<td><?php echo $this->common->encrypt_decrypt('decrypt',$invoice_list[$i]['email']);?> </td>
											<td><?php echo $invoice_list[$i]['invoice_no'];?></td> 
											 	
											<td> <?php echo ($invoice_list[$i]['payment']==0)?'Not Paid':'Paid';?> </th>
											<td> <?php echo ($invoice_list[$i]['delivered']==0)?'Not Delivered':'Delivered';?> </td>
											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													 
													<a class="green" href="view_invoices/<?php echo $invoice_list[$i]['auction_id'];?>.html">
														<i class="icon-envelope bigger-130"></i>
													</a>
													<a class="green" href="view_invoices/<?php echo $invoice_list[$i]['auction_id'];?>.html">
														<i class="icon-truck bigger-130"></i>
													</a>
													 
													 
													<a id="delrec" name="delrec" value="<?php echo $invoice_list[$i]['auction_id'].'|auction_items|auction_id';?>"  >
														<i class="icon-trash bigger-130"></i>
													</a>
													 
												</div>

												<div class="hidden-desktop visible-phone">
													 
												</div>
												

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