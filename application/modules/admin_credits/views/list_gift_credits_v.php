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
											<th><?php echo ucwords($configpage[1]);?> Email</th>
											<th><?php echo ucwords($configpage[1]);?> Coupon Code</th>
											<th class="hidden"></th>
											<th>Coupon Value</th>
											<th>Coupon Credit</th>
											 
											<th class="hidden-480">Coupon Validity</th>
											<th class="hidden-480">Coupon Used</th>
										
										</tr>
									</thead>


									<tbody>
										<?php for($i=0;$i<count($gift_credits);$i++){?>
										<tr id="<?php echo $gift_credits[$i]['auction_id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<?php echo $gift_credits[$i]['first_name'];?>
											</td>
											<td>
												<?php echo $this->common->encrypt_decrypt('decrypt',$gift_credits[$i]['email']) ;?>
											</td>
											<td><?php echo $gift_credits[$i]['coupon_code'];?></td>
											<td><?php echo $gift_credits[$i]['coupon_value'];?> </td>
											<td  class="hidden"></td>
										
											<td  class="hidden-480"><?php echo $gift_credits[$i]['coupon_credit'];?> 	</td>

											<td class="td-actions">
												<?php echo $gift_credits[$i]['coupon_validity'].' Month';?>
											</td>
											<td class="hidden-480"> <?php echo $gift_credits[$i]['coupon_used'];?> </td>
											
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