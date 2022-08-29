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

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th>User Name</th>
											<th>Email</th>
											<th>Role</th>
											<th class="hidden-480">Status</th>
											<th> </th>
											<th ></th>
										</tr>
									</thead>

									<tbody>
									
									<?php for($i=0;$i<count($admin_users);$i++){?>
										<tr id="<?php echo $admin_users[$i]['reg_id'];?>"> 
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>
 
											<td><?php echo ucwords($admin_users[$i]['admin_username']);?></td>
											<td><?php echo $admin_users[$i]['admin_email'];?></td> 
											<td><?php echo ucwords($admin_users[$i]['admin_role']);?></td> 
											

  
											<td class="hidden-480">
												<!--span class="label <?php if($admin_users[$i]['admin_status']==1){echo 'label-success';}else{echo 'label-warning';};?>"><?php if($admin_users[$i]['admin_status']==1){echo 'Active';}else{echo 'Inactive';};?></span-->

												
														<label>
															<input name="admin_status" id="admin_status" class="ace-switch ace-switch-6" type="checkbox" <?php if($admin_users[$i]['admin_status']=='1'){echo 'checked';}?> value="<?php echo $admin_users[$i]['id'].'|admin_users|id|admin_status';?>"/>
															<span class="lbl"> </span>
														</label>


											</td>
											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
										
													<a class="green" href="<?php echo base_url();?>backend_admin_users/add_admin_users/<?php echo $admin_users[$i]['id'];?>.html">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" id="delrec" name="delrec" value="<?php echo $admin_users[$i]['id'].'|admin_users|id';?>"style="cursor:pointer;" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="icon-trash bigger-130"></i>
													</span>
													</a>
												</div>

											</td>
											<td></td> 
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