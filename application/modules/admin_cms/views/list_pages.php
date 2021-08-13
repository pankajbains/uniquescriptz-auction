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
											<th>Page Name</th>
											<th>Page URL</th>
											<th class="hidden-480">Status</th>

											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php for($i=0;$i<count($cms_items);$i++){?>
										<tr id="<?php echo $cms_items[$i]['cms_id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="<?php echo base_url();?>admin_cms/add_pages/<?php echo $cms_items[$i]['cms_id'];?>.html"><?php echo $cms_items[$i]['cms_page_name'];?></a>
											</td>
											<td><?php echo $cms_items[$i]['cms_page_url'];?></td>


											<td class="hidden-480">
												<!--span class="label <?php if($cms_items[$i]['active']==1){echo 'label-success';}else{echo 'label-warning';};?>"><?php if($cms_items[$i]['active']==1){echo 'Active';}else{echo 'Inactive';};?></span-->

												
														<label>
															<input name="status" id="status" class="ace-switch ace-switch-6" type="checkbox" <?php if($cms_items[$i]['active']=='1'){echo 'checked';}?> value="<?php echo $cms_items[$i]['cms_id'].'|cms_pages|cms_id|active';?>"/>
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
													<a class="green" href="<?php echo base_url();?>admin_cms/add_pages/<?php echo $cms_items[$i]['cms_id'];?>.html">
														<i class="icon-pencil bigger-130"></i>
													</a>
													<?php } ?>  
													<?php if(in_array('delete', $permissions)){ ?>
													<a class="red" id="delrec" name="delrec" value="<?php echo $cms_items[$i]['cms_id'].'|cms_pages|cms_id';?>">
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
																<a href="<?php echo base_url();?>admin_cms/add_pages/<?php echo $cms_items[$i]['cms_id'];?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php } ?>  
															<?php if(in_array('delete', $permissions)){ ?>  
															<li>
																<a class="tooltip-error" data-rel="tooltip" title="Delete" id="delrec" name="delrec" value="<?php echo $cms_items[$i]['cms_id'].'|cms_pages|cms_id';?>">
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