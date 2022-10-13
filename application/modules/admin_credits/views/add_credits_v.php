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

							<?php  echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>
							<?php //echo form_open('home/edit/', "class='form-horizontal'"); ?>
								
							<?php 
								
								echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'value'=>isset($credit_items[0]['id']) ? $credit_items[0]['id'] : '')); 

			
								echo form_input(array('id' => 'type', 'name' => 'type', 'type'=>'hidden', 'value'=>isset($credit_items[0]['id']) ? 'edit' : 'add')); 

							?>

								<div class="control-group">
									<label  class="control-label" for="currency">User Paid Credits</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'paid_credit', 'name' => 'paid_credit', 'class'=> 'ace-switch ace-switch-6 required', 'placeholder' => 'User Paid Credit', 'value'=>(isset($credit_items[0]['paid_credit']))?$credit_items[0]['paid_credit']:'')); ?>
										
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="currency-code">User Free Credits</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'free_credit', 'name' => 'free_credit', 'class'=> 'ace-switch ace-switch-6', 'placeholder' => 'Free Credit', 'value'=>(isset($credit_items[0]['free_credit']))?$credit_items[0]['free_credit']:''));?>
										
									</div>

								</div>

								<div class="control-group">

									<label  class="control-label" for="currency">Credits Cost</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'credit_rate', 'name' => 'credit_rate', 'class'=> 'ace-switch ace-switch-6', 'placeholder' => 'Credit Rate', 'value'=>(isset($credit_items[0]['credit_rate']))?$credit_items[0]['credit_rate']:'')); ?>

									</div>

								</div>


								<div class="control-group">
									<label  class="control-label" for="active">Active</label>
                                    <div class="controls">
                                        <div class="span3">
                                        <label>

										<?php //echo form_input(array('id' => 'active', 'name' => 'active', 'placeholder' => 'Active', 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox')) 
										
											if(isset($credit_items[0]['active'])=='1'){
												
												echo form_input(array('id' => 'active', 'name' => 'active', 'placeholder' => 'Active', 'value'=>$credit_items[0]['active'], 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox', 'checked'=>'checked'));
												
											}else{
											
												echo form_input(array('id' => 'active', 'name' => 'active', 'placeholder' => 'Active', 'value'=>'0', 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox'));
											
											}
										
										?>

                                        <span class="lbl"></span>
                                        </label>
                                        </div>
                                    </div>
                                    

								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="submitcredits" name="submitcredits">
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