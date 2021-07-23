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
								
								<?php echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>
								
								<input type="hidden" id="config_type" name="config_type" value="<?php echo $this->router->fetch_method();?>"/>
                           


								<div class="control-group">
									<label  class="control-label" for="password">Password</label>
									<div class="controls">
										<input type="password" id="password"  name="password" placeholder="Password" />
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="cpassword">Confirm Password</label>
									<div class="controls">
										<input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" />
									</div>

								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="submitprofile" name="submitprofile">
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