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
							<?php //}?>

						<?php  echo form_open_multipart('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>

								<input type="hidden" id="config_type" name="config_type" value="site_settings"/>

								<div class="control-group">

										<label  class="control-label" for="headerlogo">Header Logo</label>
										<div class="controls">
											<input type="file" id="headerlogo"  name="headerlogo[]" class="span6" />
											<?php if($siteinfo[0]['site_header_logo']!=''){?>
											<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $siteinfo[0]['site_header_logo'];?>">
											<?php } ?>
										</div>

								</div>

								<div class="control-group">
									
										<label  class="control-label" for="stickylogo">Sticky Header Logo</label>
										<div class="controls">
											<input type="file" id="stickylogo"  name="stickylogo[]" class="span6" />
											<?php if($siteinfo[0]['site_sticky_header_logo']!=''){?>
											<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $siteinfo[0]['site_sticky_header_logo'];?>">
											<?php } ?>
										</div>

								</div>

								<div class="control-group">
									
										<label  class="control-label" for="favicon">Favicon Image</label>
										<div class="controls">
											<input type="file" id="favicon"  name="favicon[]" class="span6" />
											<?php if($siteinfo[0]['site_favicon']!=''){?>
											<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $siteinfo[0]['site_favicon'];?>">
											<?php } ?>
										</div>

								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button" id="submitlogos" name="submitlogos">
										<i class="icon-ok bigger-110"></i>
										Submit
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Reset
									</button>
								</div>

								<div class="hr"></div>


							<?php echo form_close(); ?>

				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->