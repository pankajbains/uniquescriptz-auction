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
									<!-- <a href="download_users/" style="float:right; margin-right:40px;color:#fff; font-weight:bold;">Download <?php echo ucwords($configpage[1]);?></a> -->
									<a href="<?php echo base_url();?>admin_users/downloadxls" style="float:right; margin-right:40px;color:#fff; font-weight:bold;">Download <?php echo ucwords($configpage[1]);?></a>
									<a href="add_users.html" style="float:right; margin-right:40px;color:#fff; font-weight:bold;">Add <?php echo ucwords($configpage[1]);?></a>
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

											<th><?php echo ucwords($configpage[1]);?> Name</th>
											<th><?php echo ucwords($configpage[1]);?> Email</th>
											<th><?php echo ucwords($configpage[1]);?> From</th>
											<th><?php echo ucwords($configpage[1]);?> IP</th>
											<th class="hidden-480">
												Active <?php echo ucwords($configpage[1]);?>
											</th>
											<th class="hidden-480">
												Subscribed
											</th>

											<th class="hidden-480">Banned</th>


										</tr>
									</thead>

									<tbody>
										<?php for($i=0;$i<count($user_list);$i++){?>
										<tr id="<?php echo $user_list[$i]['reg_id'];?>"> 
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="<?php echo base_url();?>admin_users/add_users/<?php echo $user_list[$i]['reg_id'];?>.html"><?php echo ucwords($user_list[$i]['first_name'].' '.$user_list[$i]['last_name']);?></a>
											</td>
											<td><?php echo $this->admin_templates->encrypt_decrypt('decrypt',$user_list[$i]['email']);?></td>
											<td><?php echo $user_list[$i]['country'];?></td>
											<td><?php echo $user_list[$i]['ipaddress'];?></td>


											<td class="hidden-480">
												<!--span class="label <?php if($user_list[$i]['active']==1){echo 'label-success';}else{echo 'label-warning';};?>"><?php if($user_list[$i]['active']==1){echo 'Active';}else{echo 'Inactive';};?></span-->

												
														<label>
															<input name="status" id="status" class="ace-switch ace-switch-6" type="checkbox" <?php if($user_list[$i]['active']=='1'){echo 'checked';}?> value="<?php echo $user_list[$i]['reg_id'].'|user_register|reg_id|active';?>"/>
															<span class="lbl"> </span>
														</label>


											</td>
											<td class="hidden-480">
												<!--span class="label <?php if($user_list[$i]['active']==1){echo 'label-success';}else{echo 'label-warning';};?>"><?php if($user_list[$i]['active']==1){echo 'Active';}else{echo 'Inactive';};?></span-->

												
														<label>
															<input name="newsletters" id="newsletters" class="ace-switch ace-switch-6" type="checkbox" <?php if($user_list[$i]['newsletters']=='1'){echo 'checked';}?> value="<?php echo $user_list[$i]['reg_id'].'|user_register|reg_id|newsletters';?>"/>
															<span class="lbl"> </span>
														</label>


											</td>
											<?php 
														$user_datas =  $this->session->userdata();   
														$permissions = json_decode($user_datas['admin_permission']);
											?>
											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
												<?php if(in_array('write', $permissions)){ ?> 
													<a class="green" href="<?php echo base_url();?>admin_users/add_users/<?php echo $user_list[$i]['reg_id'];?>.html">
														<i class="icon-pencil bigger-130"></i>
													</a>
													<?php } ?>  
													<?php if(in_array('delete', $permissions)){ ?> 
													<a class="red" id="delrec" name="delrec" value="<?php echo $user_list[$i]['reg_id'].'|user_register|reg_id';?>">
														<i class="icon-trash bigger-130"></i>
													</a>
													<?php } ?>  
												</div>

												<div class="hidden-desktop visible-phone">
													<div class="inline position-relative">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
															<i class="icon-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
														
															<?php if(in_array('write', $permissions)){ ?>   
															<li>
																<a href="<?php echo base_url();?>admin_users/add_users/<?php echo $user_list[$i]['reg_id'];?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php } ?>  
															<?php if(in_array('delete', $permissions)){ ?>  
															<li>
																<a class="tooltip-error" data-rel="tooltip" title="Delete" id="delrec" name="delrec" value="<?php echo $user_list[$i]['reg_id'].'|user_register|reg_id';?>">
																	<span class="red">
																		<i class="icon-trash bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php } ?> 
														</ul>
													</div>
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