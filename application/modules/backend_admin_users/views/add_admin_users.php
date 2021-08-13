<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> 
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
							
							<?php  echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>

								
								<?php echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'placeholder' => 'ID', 'value'=>isset($admin_users[0]['id']) ? $admin_users[0]['id'] : '', 'type'=>'hidden')); ?>
						   <?php
						   	if(isset($admin_users[0]['admin_username'])) {
								$add_parts = explode(' ', $admin_users[0]['admin_username']); 
								$first_name =  array_shift($add_parts);
								$last_name = join(' ', $add_parts);
							}  
							
						   ?>
								<div class="row-fluid">
									<div class="span6">
										<label class="control-label" for="first_name">First Name:</label>
										<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'first_name', 'name' => 'first_name', 'class'=> 'span6', 'placeholder' => 'Enter First Name', 'value'=>isset($first_name) ? $first_name : '', 'required'=>'required')); ?>
										</div>
									</div>
									<div class="span6">
											<label class="control-label" for="last_name">Last Name:</label>
										<div class="controls">
											<?php echo form_input(array('type'=> 'text', 'id' => 'last_name', 'name' => 'last_name', 'class'=> 'span6', 'placeholder' => 'Enter Last Name', 'value'=>isset($last_name) ? $last_name : '')); ?>
										</div>
									</div>
								</div>

							<br>
							<div class="row-fluid">
                            
									<div class="span6">
										<div class="control-group">
											<label  class="control-label" for="text1">Email Id</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'admin_email', 'name' => 'admin_email', 'class'=> 'span6', 'placeholder' => 'Email Id', 'value'=>isset($admin_users[0]['admin_email']) ? $admin_users[0]['admin_email'] : '')); ?>

											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label  class="control-label" for="text1">Password</label>
											<div class="controls">
											 
												<!-- <?php echo form_input(array('type'=> 'password', 'id' => 'admin_password', 'name' => 'admin_password', 'class'=> 'span6', 'placeholder' => 'Enter User Name', 'value'=>isset($admin_users[0]['admin_password']) ? $admin_users[0]['admin_password'] : '')); ?> -->
												<?php echo form_input(array('type'=> 'password', 'id' => 'admin_password', 'name' => 'admin_password', 'class'=> 'span6', 'placeholder' => 'Enter User Name')); ?>

											</div>
										</div>
								</div>

								
								<div class="row-fluid">
									<div class="span6">
										<label class="control-label" for="admin_role">Role:</label>
										<div class="controls">
										<SELECT id="admin_role" name="admin_role">
												<option value="">Select Role</option>
												<option value="masteradmin" <?php echo isset($admin_users[0]['admin_role']) ? (($admin_users[0]['admin_role']=='masteradmin')?'selected':'') : '';?>>Master Admin</option>
												<option value="admin" <?php echo isset($admin_users[0]['admin_role']) ? (($admin_users[0]['admin_role']=='admin')?'selected':'') : '';?>>Admin</option>
												<option value="role" <?php echo isset($admin_users[0]['admin_role']) ? (($admin_users[0]['admin_role']=='staff')?'selected':'') : '';?>>Staff</option>
												
														
										</SELECT>

										</div>
									</div> 
								</div>
								<br>
							   

								<div class="row-fluid">
									 
										<div class="control-group">
											<label  class="control-label" for="admin_access"> Module Sections</label>
											<div class="controls">

												<?php

												$multioptions = array(
													"manage_content"=>"Manage Content","manage_users"=>"Manage Users",
													"manage_emails"=>"User Emails","manage_categories"=>"Manage Categories",
													"manage_auctions"=>"Manage Auctions","manage_credits"=>"Manage Credits",
													"manage_payments"=>"Manage Payments","manage_coupons"=>"Manage Coupons",
													"manage_wallets"=>"Manage Wallets","manage_affiliates"=>"Manage Affiliates",
													 
													);
 
												// var_dump($admin_users[0]['admin_access']);
												if(isset($admin_users[0]['admin_access'])){
													$selected = json_decode($admin_users[0]['admin_access']);
												}else{
													$selected = '';
												}
												// var_dump($selected);
												//echo $result[0]['category_name'];

												echo form_multiselect(array('type'=> 'select', 'id' => 'admin_access', 'name' => 'admin_access[]', 'class'=> 'span6', 'placeholder' => 'Select Access','style'=>'height: 240px;'),$multioptions, $selected); 
												
												?>


											</div>
										</div>
								 
										<div class="control-group">
											<label  class="control-label" for="admin_permission"> Module Permissions</label>
											<div class="controls">

												<?php

												$multioptions = array("read"=>"Read","write"=>"Write","create"=>"Create","delete"=>"Delete");

											

												if(isset($admin_users[0]['admin_permission'])){
													$selected = json_decode($admin_users[0]['admin_permission']);
												}else{
													$selected = '';
												}
												//echo $result[0]['category_name'];

												echo form_multiselect(array('type'=> 'select', 'id' => 'admin_permission', 'name' => 'admin_permission[]', 'class'=> 'span6', 'placeholder' => 'Select Role Permissions'),$multioptions, $selected); 
												
												?>


											</div>
										</div>
									 
								</div>


								<div class="hr"></div>




								<div class="form-actions">
									<!-- <button class="btn btn-info" type="submit"  id="submitaddusers" name="submitaddusers"> -->
											<?php 	
												if(isset($admin_users[0]['admin_username'])){
													echo '<button class="btn btn-info" type="button"  id="adminedit" name="adminedit">';
												}else{
													echo '<button class="btn btn-info" type="button"  id="addadmin" name="addadmin">';
												}
											?>
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