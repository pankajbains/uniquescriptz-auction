<?php   ob_start(); if(!session_id()){session_start();}
	    include("../../includes/config.php");
        include("../../includes/adinc.php");

	    require_once("../header.php");
	    require_once("../left-nav.php");

	   $sqlpage = "Select * FROM `".$configpage[1].'-'.$configpage[2]."`";
	   $querypage=executeQuery($config['link'],$sqlpage);

?>

			<div class="main-content">

<?php
	require_once("../breadcrumb.php");
?>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php echo edittext($configpage[0]).' '.edittext($configpage[1]).' '.edittext($configpage[2]);?>
							<small>
								<i class="icon-double-angle-right"></i>
								<?php echo edittext($configpage[0]).' '.edittext($configpage[1]).' '.edittext($configpage[2]);?>
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<?php if(isset($_GET['success'])){?>
									<div class="alert alert-block alert-success">
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
							<?php }?>
							

							<div class="row-fluid">
								<div class="table-header">
									Results for "<?php echo edittext($configpage[1]).' '.edittext($configpage[2]);?>" 
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
											
											<th><?php echo edittext($configpage[1]).' '.edittext($configpage[2]);?> ID</th>
											<th><?php echo edittext($configpage[1]).' '.edittext($configpage[2]);?> Type </th>
											<th><?php echo edittext($configpage[1]).' '.edittext($configpage[2]);?> Subject </th>
											<th class="hidden-480">Active</th>
											
											<th></th>
											<th class="hidden-480 hidden"></th>


											
										</tr>
									</thead>

									<tbody>

										<?php 
										while($datapage=mysqli_fetch_array($querypage)){


										?>
										<tr id="<?php echo $datapage['user-emails-id'];?>">
											<td class="center">
												<label>
													<input type="checkbox" />
													<span class="lbl"></span>
												</label>
											</td>
											<td class="hidden-480 hidden"></td>
	
											<td>
												<a href="<?php echo adminRootUrl;?>user-emails/<?php echo $datapage['user-emails-type'];?>.php"><?php echo $datapage['user-emails-id'];?></a>
											</td>
											<td>
												<a href="<?php echo adminRootUrl;?>user-emails/<?php echo $datapage['user-emails-type'];?>.php"><?php echo $datapage['user-emails-type'];?></a>
											</td>
											<td class="hidden-480"><?php echo $datapage['user-emails-subject'];?></td>
                                            <td class="hidden-480 hidden"></td>
                                            
											<td class="hidden-480">

													<div class="span3">

														<label>
															<input name="status" id="status" class="ace-switch ace-switch-6" type="checkbox" <?php if($datapage['user-emails-status']=='1'){echo 'checked';}?> value="<?php echo $datapage['user-emails-id'].'|user-emails|user-emails-id|user-emails-status';?>"/>
															<span class="lbl"> </span>
														</label>

													</div>

											</td>

											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="green" href="<?php echo adminRootUrl;?>user-emails/<?php echo $datapage['user-emails-type'];?>.php" title="edit">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red" id="delemail" name="delemail" value="<?php echo $datapage['user-emails-id'];?>" style="cursor:pointer;"  title="delete">
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
																<a href="<?php echo adminRootUrl;?>user-emails/<?php echo $datapage['user-emails-type'];?>.php" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a id="delemail" name="delemail" value="<?php echo $datapage['user-emails-id'];?>" style="cursor:pointer;" class="tooltip-error" data-rel="tooltip" title="Delete">
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






							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->


<?php require_once("footer.php");?>