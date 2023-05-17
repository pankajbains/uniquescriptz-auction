			<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Content
							<small>
								<i class="icon-double-angle-right"></i>
								<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?>
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<?php //if(isset($_GET['success'])){?>
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
							<?php // }?>
							

							<div class="row-fluid">
								<div class="table-header">
									Results for "<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?>" <span style="float:right; margin-right:20px;"><a href="<?php echo base_url();?>admin_home/add_currency.html" style="color:#FFF">Add Currency</a></span>
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
											
											
											<th><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> </th>
											<th class="hidden-480"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Code</th>
											<th class="hidden-480"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Rate</th>
											<th>Base <?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?></th>
											<th class="hidden-480">Active</th>
											<th class="hidden-480"></th>


											
										</tr>
									</thead>

									<tbody>

										<?php 
											//var_dump($currency_items);
											for($i=0;$i<count($currency_items);$i++){
											//foreach($currency_items as $key=>$value ){


										?>
										<tr id="<?php echo $currency_items[$i]['id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="hidden-480 hidden"></td>
	
											
											<td>
												<?php echo $currency_items[$i]['currency'];?>
											</td>
											<td class="hidden-480"><?php echo $currency_items[$i]['currency_code'];?></td>
                                            
											<td class="hidden-480">
                                                    <?php echo $currency_items[$i]['coversion_rate'];?>

											</td>
											<td>
												<?php echo $currency_items[$i]['base_currency'];?>
											</td>

                                            <td class="hidden-480">
                                            
                                            		<div class="span3">

														<label>
															<input name="status" id="status" class="ace-switch ace-switch-6" type="checkbox" <?php if($currency_items[$i]['active']=='1'){echo 'checked';}?> value="<?php echo $currency_items[$i]['id'].'|config_currency|id|active';?>"/>
															<span class="lbl"> </span>
														</label>

													</div>
                                                
                                            </td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="green" href="<?php echo base_url();?>admin_home/add_currency/<?php echo $currency_items[$i]['id'];?>.html" title="edit">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" id="delrec" name="delrec" value="<?php echo $currency_items[$i]['id'].'|config_currency|id';?>" style="cursor:pointer;"  title="delete">
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
																<a href="<?php echo base_url();?>admin_home/add_currency/<?php echo $currency_items[$i]['id'];?>.html" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a id="delrec" name="delrec" value="<?php echo $currency_items[$i]['id'];?>" style="cursor:pointer;" class="tooltip-error" data-rel="tooltip" title="Delete">
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


				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->