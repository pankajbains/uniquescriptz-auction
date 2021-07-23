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
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</th>
											<th><?php echo ucwords($configpage[1]);?> Level</th>
											<th class="hidden-480"> Point in %</th>
											<th class="hidden"></th>
											<th class="hidden"></th>
											<th class="hidden"></th>
											<th></th>
										</tr>
									</thead>

									<tbody>

									<?php for($i=0;$i<count($content_list);$i++){?>

										<tr id="<?php echo $content_list[$i]['aff_id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="<?php echo base_url();?>admin_affiliates/add_affiliates/<?php echo $content_list[$i]['aff_id'];?>.html">Affiliation Level <?php echo $content_list[$i]['aff_level'];?></a>
											</td>
											<td class="hidden-480"><?php echo $content_list[$i]['aff_points'];?></td>
										
											<th class="hidden"></th>
											<th class="hidden"></th>
											<th class="hidden"></th>
											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">

													<a class="green" href="<?php echo base_url();?>admin_affiliates/add_affiliates/<?php echo $content_list[$i]['aff_id'];?>.html">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" id="delrec" name="delrec" value="<?php echo $content_list[$i]['aff_id'].'|user_affiliates|aff_id';?>">
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
																<a href="<?php echo base_url();?>admin_affiliates/add_affiliates/<?php echo $content_list[$i]['aff_id'];?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a class="tooltip-error" data-rel="tooltip" title="Delete" id="delrec" name="delrec" value="<?php echo $content_list[$i]['aff_id'].'|user_affiliates|aff_id';?>">
																	<span class="red">
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

										<?php  } ?>

									</tbody>
								</table>
							</div>


						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->