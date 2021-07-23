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

						<?php  echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>

							

								<input type="hidden" id="config_type" name="config_type" value="<?php echo $this->router->fetch_method();?>"/>

								<div class="control-group">
									<label  class="control-label" for="site-name">Site Name</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'site_name', 'name' => 'site_name', 'placeholder' => 'Site Name', 'value'=>$siteinfo[0]['site_name'])); ?>
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="site-title">Site Title</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'site_title', 'name' => 'site_title', 'placeholder' => 'Site Title', 'type'=>'text', 'value'=>$siteinfo[0]['site_title'])); ?>
										
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="site-desc">Site Description</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'site_desc', 'name' => 'site_desc', 'placeholder' => 'Site Description', 'type'=>'text', 'value'=>$siteinfo[0]['site_desc'])); ?>
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="site_phone">Site Phone</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'site_phone', 'name' => 'site_phone', 'placeholder' => 'Site Phone', 'type'=>'text', 'value'=>$siteinfo[0]['site_phone'])); ?>
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="site_address">Site Address</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'site_address', 'name' => 'site_address', 'placeholder' => 'Site Address', 'type'=>'text', 'value'=>$siteinfo[0]['site_address'])); ?>
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="timezone">Country Time zone</label>
									<div class="controls">
									<?php echo form_input(array('id' => 'site_timezone', 'name' => 'site_timezone', 'placeholder' => 'Country Time zone', 'type'=>'text', 'value'=>$siteinfo[0]['site_timezone'])); ?>
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="analytics">Google Analtics Code</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'site_analytics', 'name' => 'site_analytics', 'placeholder' => 'Google Analytics', 'type'=>'text', 'value'=>$siteinfo[0]['site_analytics'])); ?>
									</div>

								</div>


								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="submitsettings" name="submitsettings">
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