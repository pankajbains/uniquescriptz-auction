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
							<?php // }?>
							<?php echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>
								
								<input type="hidden" id="config_type" name="config_type" value="<?php echo $this->router->fetch_method();?>"/>
                           
								<div class="control-group">
									<label  class="control-label" for="points_register">Credit Points for Registration</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'points_register', 'name' => 'points_register', 'placeholder' => 'Input as (10 or 20)', 'value'=>$pointinfo[0]['points_register'])); ?>

									</div>
									<span></span>

								</div>

								<div class="control-group">
									<label  class="control-label" for="loginpoint">Credit Points for Login</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'points_login', 'name' => 'points_login', 'placeholder' => 'Input as (10)', 'value'=>$pointinfo[0]['points_login'])); ?>

									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="point_refer">Credit Points for Referring</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'point_refer', 'name' => 'point_refer', 'placeholder' => 'Inoput as (10)', 'value'=>$pointinfo[0]['point_refer'])); ?>

									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="points_fblikes">Credit Points for Facebook Like</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'points_fblikes', 'name' => 'points_fblikes', 'placeholder' => 'Input as (10)', 'value'=>$pointinfo[0]['points_fblikes'])); ?>

									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="points_fbshare">Credit Points for Facebook Share</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'points_fbshare', 'name' => 'points_fbshare', 'placeholder' => 'Input a (10)', 'value'=>$pointinfo[0]['points_fbshare'])); ?>

									</div>

								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="points_tweet">Credit Points for Tweets</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'points_tweet', 'name' => 'points_tweet', 'placeholder' => 'Input as ( 10 )', 'value'=>$pointinfo[0]['points_tweet'])); ?>

									</div>

								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="points_value">Points Equal to <?php //echo $active_curr;?> 1</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'points_value', 'name' => 'points_value', 'placeholder' => 'Input as (10)', 'value'=>$pointinfo[0]['points_value'])); ?>

									</div>

								</div>
								

								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="pointsettings" name="pointsettings">
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