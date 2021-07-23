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
											<th><?php echo ucwords($configpage[1]);?> Code</th>
											<th><?php echo ucwords($configpage[1]);?> Value / Points</th>
											<th>Valid Plan</th>
											<th>Used By</th>
											<th class="hidden-480"><i class="icon-time bigger-110 hidden-phone"></i>Start Date</th>
											<th class="hidden-480">
												<i class="icon-time bigger-110 hidden-phone"></i>
												End Date
											</th>
											<th class="hidden-480">Active</th>
											<th class="hidden-480"></th>
										</tr>
									</thead>


									<tbody>
										<?php for($i=0;$i<count($coupons_list);$i++){?>
										<tr id="<?php echo $coupons_list[$i]['id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="add_coupons/<?php echo $coupons_list[$i]['id'];?>.html"><?php echo $coupons_list[$i]['coupon_code'];?></a>
											</td>
											<td>
												<a href="add_coupons/<?php echo $coupons_list[$i]['id'];?>.html"><?php echo $coupons_list[$i]['coupon_value'].' Cost / '.$coupons_list[$i]['points_earned'].' Points';?></a>
											</td>
											<td><?php if(($coupons_list[$i]['valid_plan']!='0')&($coupons_list[$i]['valid_plan']!='')){echo $coupons_list[$i]['valid_plan'].' - '.$dc['plan-name'];}else{echo 'All';}?></td>
											<td><a href="admin_users/add_users/<?php echo $coupons_list[$i]['reg_id'];?>.html"><?php echo $coupons_list[$i]['user_id'];?></a></td>

											<td class="hidden-480"><?php echo $coupons_list[$i]['coupon_sdate'];?></td>
											<td  class="hidden-480">
													<?php echo $coupons_list[$i]['coupon_edate'];?>

											</td>

											<td class="hidden-480">

													<div class="span3">

														<label>
															<input name="status" id="status" class="ace-switch ace-switch-6" type="checkbox" <?php if($coupons_list[$i]['status']=='1'){echo 'checked';}?> value="<?php echo $coupons_list[$i]['id'].'|manage_coupons|id|status';?>"/>
															<span class="lbl"> </span>
														</label>

													</div>
													
											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">

													<a class="green" href="add_coupons/<?php echo $coupons_list[$i]['id'];?>.html" title="edit"  data-rel="tooltip" >
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a id="delrec" name="delrec" value="<?php echo $coupons_list[$i]['id'].'|manage_coupons|id';?>" style="cursor:pointer;" class="tooltip-error" data-rel="tooltip" title="Delete">
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
																<a href="add_coupons/<?php echo $coupons_list[$i]['id'];?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a id="delrec" name="delrec" value="<?php echo $coupons_list[$i]['id'].'|manage_coupons|id';?>" style="cursor:pointer;" class="tooltip-error" data-rel="tooltip" title="Delete">
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