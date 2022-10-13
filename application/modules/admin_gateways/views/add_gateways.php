				<?php
					$configpage = explode('_',$this->router->fetch_method());
				
				?>
				
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

							<form class="form-horizontal" name="formpages" id="formpages"/>
								
								

								<?php echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'placeholder' => 'ID', 'value'=>isset($gateway_list[0]['id']) ? $gateway_list[0]['id'] : '')); ?>

								<?php echo form_input(array('id' => 'type', 'name' => 'type', 'type'=>'hidden', 'placeholder' => 'type', 'value'=>isset($gateway_list[0]['id']) ? 'edit' : 'add')); ?>

				
								<div class="control-group">
									<label  class="control-label" for="gateway_name">Payment Gateway Name</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'gateway_name', 'name' => 'gateway_name', 'class'=> 'span6', 'placeholder' => 'Payment Gateway Name', 'value'=>isset($gateway_list[0]['gateway_name']) ? $gateway_list[0]['gateway_name'] : '')); ?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="gateway_fee"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Fee's ( % )</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'gateway_fee', 'name' => 'gateway_fee', 'class'=> 'span6', 'placeholder' => 'Payment Gateway Fees', 'value'=>isset($gateway_list[0]['gateway_fee']) ? $gateway_list[0]['gateway_fee'] : '')); ?>

									</div>
								</div>
                

								<div class="control-group">
									<label  class="control-label" for="gateway_other_fee"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Other Fee's (<?php //echo $this->admin_templates->active_curr();?>)</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'gateway_other_fee', 'name' => 'gateway_other_fee', 'class'=> 'span6', 'placeholder' => 'Payment Gateway Other Fees', 'value'=>isset($gateway_list[0]['gateway_other_fee']) ? $gateway_list[0]['gateway_other_fee'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="public_key"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Public Key </label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'public_key', 'name' => 'public_key', 'class'=> 'span6', 'placeholder' => 'Payment Gateway  Public Key', 'value'=>isset($gateway_list[0]['public_key']) ? $gateway_list[0]['public_key'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="secret_key"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Secret Key </label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'secret_key', 'name' => 'secret_key', 'class'=> 'span6', 'placeholder' => 'Payment Gateway  Secret Key', 'value'=>isset($gateway_list[0]['secret_key']) ? $gateway_list[0]['secret_key'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="gateway_email"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Email ID </label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'gateway_email', 'name' => 'gateway_email', 'class'=> 'span6', 'placeholder' => 'Payment Gateway  Email', 'value'=>isset($gateway_list[0]['gateway_email']) ? $gateway_list[0]['gateway_email'] : '')); ?>

									</div>
								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="submitpage" name="submitpage">
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


							

</form>

				</div><!--/.page-content-->


			</div><!--/.main-content-->
		</div><!--/.main-container-->