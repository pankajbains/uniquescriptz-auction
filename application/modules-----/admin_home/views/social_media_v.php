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
							<?php // if(isset($_GET['success'])){?>
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
							
							<?php echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>
								
								<input type="hidden" id="config_type" name="config_type" value="<?php echo $this->router->fetch_method();?>"/>
                           
								<div class="control-group">
									<label  class="control-label" for="social_facebook">Facebook Page ID</label>
									<div class="controls">
										
										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_facebook', 'name' => 'social_facebook', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_facebook'])); ?>
										<i class="icon-facebook"></i>
										</span>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="social_twitter">Twitter Page ID</label>
									<div class="controls">

										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_twitter', 'name' => 'social_twitter', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_twitter'])); ?>
										<i class="icon-twitter"></i>
										</span>

									</div>
								</div>

								<!--div class="control-group">
									<label  class="control-label" for="social_gplus"> Google+ Page Id</label>
									<div class="controls">

										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_gplus', 'name' => 'social_gplus', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_gplus'])); ?>
										<i class="icon-google-plus"></i>
										</span>

									</div>
								</div-->
                            
								<div class="control-group">
									<label  class="control-label" for="social_linkedin">LinkedIn Page ID</label>
									<div class="controls">

										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_linkedin', 'name' => 'social_linkedin', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_linkedin'])); ?>
										<i class="icon-linkedin"></i>
										</span>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="social_instagram">Instagram Page ID</label>
									<div class="controls">

										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_instagram', 'name' => 'social_instagram', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_instagram'])); ?>
										<i class="icon-instagram"></i>
										</span>

									</div>
								</div>
                           
								<div class="control-group">
									<label  class="control-label" for="social_pinterest">Pinterest Page ID</label>
									<div class="controls">

										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_pinterest', 'name' => 'social_pinterest', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_pinterest'])); ?>
										<i class="icon-pinterest"></i>
										</span>

									</div>
								</div>
                           
								<div class="control-group">
									<label  class="control-label" for="social_youtube">YouTube Page ID</label>
									<div class="controls">
										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_youtube', 'name' => 'social_youtube', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_youtube'])); ?>
										<i class="icon-youtube"></i>
										</span>
		
									</div>
								</div>
                           
								<div class="control-group">
									<label  class="control-label" for="social_facebook-app-id">Facebook App Id</label>
									<div class="controls">
										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_facebook-app-id', 'name' => 'social_facebook-app-id', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_facebook-app-id'])); ?>
										<i class="icon-facebook"></i>
										</span>

									</div>
								</div>
                           
								<div class="control-group">
									<label  class="control-label" for="social_facebook-secret">Facebook Secret</label>
									<div class="controls">
										<span class="input-icon">
										<?php echo form_input(array('id' => 'social_facebook-secret', 'name' => 'social_facebook-secret', 'placeholder' => 'Input as (10 or 20)', 'value'=>$socialinfo[0]['social_facebook-secret'])); ?>
										<i class="icon-facebook"></i>
										</span>

									</div>
								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="socialsettings" name="socialsettings">
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


							

						<?php echo form_close();?>

				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->