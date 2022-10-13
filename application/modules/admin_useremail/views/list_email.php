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
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											
											
											<th><?php echo ucwords($configpage[1]);?> Type </th>
											<th><?php echo ucwords($configpage[1]);?> Subject </th>
											<th class="hidden-480">Active</th>
											
											<th  class="hidden-480"></th>
											


											
										</tr>
									</thead>

									<tbody>
										<?php for($i=0;$i<count($email_list);$i++){?>
										<tr id="<?php echo $email_list[$i]['id'];?>"> 
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											
											<td><?php echo $email_list[$i]['user_emails_type'];?></td>
											<td><?php echo $email_list[$i]['user_emails_subject'];?></td>
											

											<td class="hidden-480">
												<!--span class="label <?php if($user_list[$i]['active']==1){echo 'label-success';}else{echo 'label-warning';};?>"><?php if($user_list[$i]['active']==1){echo 'Active';}else{echo 'Inactive';};?></span-->

												
														<label>
															<input name="status" id="status" class="ace-switch ace-switch-6" type="checkbox" <?php if($email_list[$i]['status']=='1'){echo 'checked';}?> value="<?php echo $email_list[$i]['id'].'|user_emails|id|status';?>"/>
															<span class="lbl"> </span>
														</label>


											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
										
													<a class="green" href="<?php echo base_url();?>admin_useremail/add_email/<?php echo $email_list[$i]['id'];?>.html">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" id="delrec" name="delrec" value="<?php echo $email_list[$i]['id'].'|user_emails|id';?>">
														<i class="icon-trash bigger-130"></i>
													</a>
												</div>

												<div class="hidden-desktop visible-phone">
													<div class="inline position-relative">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
															<i class="icon-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">

															<li>
																<a href="<?php echo base_url();?>admin_useremail/add_email/<?php echo $email_list[$i]['id'];?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a class="tooltip-error" data-rel="tooltip" title="Delete" id="delrec" name="delrec" value="<?php echo $email_list[$i]['id'].'|user_emails|id';?>">
																	<span class="red">
																		<i class="icon-trash bigger-120"></i>
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
										?>


									</tbody>
								</table>
							</div>


						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->