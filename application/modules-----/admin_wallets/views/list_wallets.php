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

								<table id="sample-table-1" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center hidden">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th>User ID</th>
											<th>User Name</th>
											<th>User Email</th>
											<th><?php echo ucwords($configpage[1]);?> Points Earned</th>
											<th><?php echo ucwords($configpage[1]);?> Points Used</th>
											<th class="hidden-480"><?php echo ucwords($configpage[1]);?> Total Points</th>

										</tr>
									</thead>


									<tbody>
										<?php for($i=0;$i<count($wallets_list);$i++){?>
										<tr id="<?php $i?>">
											<td class="center hidden">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>
											
											<td><?php echo $wallets_list[$i]['user_id'];?></td>
											<td><?php echo $wallets_list[$i]['username'];?></td>
											<td><?php echo $this->admin_templates->encrypt_decrypt('decrypt',$wallets_list[$i]['email']);?></td>

											<td><?php echo $wallets_list[$i]['points_earned'];?></td>

											<td><?php echo $wallets_list[$i]['points_used'];?></td>

											<td class="hidden-480"><?php echo $wallets_list[$i]['points_total'];?></td>


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