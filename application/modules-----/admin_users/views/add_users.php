				<?php
				$configpage = explode('_',$this->router->fetch_method());
				
				?>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							<?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?>
							<small>
								<i class="icon-double-angle-right"></i>
								View/Add <?php echo ucwords($configpage[1]);?>
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
							
								<?php  echo form_open('',array('id'=>'formpages', 'name'=>'formpages')); ?>

								<div class="control-group">

								<?php echo form_input(array('id' => 'user_id', 'name' => 'user_id', 'placeholder' => 'user_id', 'value'=>isset($user_list[0]['user_id']) ? $user_list[0]['user_id'] : '', 'type'=>'hidden')); ?>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="first_name">First Name:</label>
											<div class="controls">
													<?php echo form_input(array('type'=> 'text', 'id' => 'first_name', 'name' => 'first_name', 'class'=> 'span6', 'placeholder' => 'Enter First Name', 'value'=>isset($user_list[0]['first_name']) ? $user_list[0]['first_name'] : '', 'required'=>'required')); ?>
											</div>
										</div>
										<div class="span6">
												<label class="control-label" for="main_category">Last Name:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'last_name', 'name' => 'last_name', 'class'=> 'span6', 'placeholder' => 'Enter Last Name', 'value'=>isset($user_list[0]['last_name']) ? $user_list[0]['last_name'] : '', 'required'=>'required')); ?>
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="normal_mrp">User Name:</label>
											<div class="controls">
													<?php echo form_input(array('type'=> 'text', 'id' => 'user_name', 'name' => 'user_name', 'class'=> 'span6', 'required'=>'required', 'placeholder' => 'Enter User Name', 'value'=>isset($user_list[0]['user_name']) ? $this->admin_templates->encrypt_decrypt('decrypt',$user_list[0]['user_name']) : '')); ?>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="referedby">Referred By:</label>
											<div class="controls"  id="subcat"  name="subcat">
													<?php echo form_input(array('type'=> 'text', 'id' => 'referral', 'name' => 'referral', 'class'=> 'span6', 'placeholder' => 'Enter Referral ID', 'value'=>isset($user_list[0]['referral']) ? $user_list[0]['referral'] : '')); ?>
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="email">Email:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'email', 'id' => 'email', 'name' => 'email', 'class'=> 'span6', 'required'=>'required', 'placeholder' => 'Enter Email ID', 'value'=>isset($user_list[0]['email']) ? $this->admin_templates->encrypt_decrypt('decrypt',$user_list[0]['email']) : '')); ?>				
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="cemail">Confirm Email:</label>
											<div class="controls">
											<?php 
												
												if(isset($user_list[0]['user_id'])){
												
													echo form_input(array('type'=> 'email', 'id' => 'cemail', 'name' => 'cemail', 'class'=> 'span6', 'placeholder' => 'Enter Email ID', 'value'=>$this->admin_templates->encrypt_decrypt('decrypt',$user_list[0]['email'])));

												}else{
												
													echo form_input(array('type'=> 'email', 'id' => 'cemail', 'name' => 'cemail', 'class'=> 'span6', 'required'=>'required', 'placeholder' => 'Enter Email ID', 'value'=>''));
												}
												
												
												?>

													<?php  ?>
													</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="password">Password:</label>
											<div class="controls">

											
												<?php 
												
												if(isset($user_list[0]['user_id'])){
												
													echo form_input(array('type'=> 'password', 'id' => 'password', 'name' => 'password', 'class'=> 'span6', 'placeholder' => 'Enter Password', 'value'=>''));

												}else{
												
													echo form_input(array('type'=> 'password', 'id' => 'password', 'name' => 'password', 'class'=> 'span6', 'placeholder' => 'Enter Password', 'value'=>'', 'required'=>'false'));
												}
												
												
												?>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="cpassword">Confirm Password:</label>
											<div class="controls">

											<?php 
												
												if(isset($user_list[0]['user_id'])){
												
													echo form_input(array('type'=> 'password', 'id' => 'cpassword', 'name' => 'cpassword', 'class'=> 'span6', 'placeholder' => 'Enter Password', 'value'=>''));

												}else{
												
													echo form_input(array('type'=> 'password', 'id' => 'cpassword', 'name' => 'cpassword', 'class'=> 'span6', 'placeholder' => 'Enter Password', 'value'=>'', 'required'=>'required'));
												}
												
												
												?>


											</div>
										</div>
									</div>

									<!-- div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="address">Address:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'address', 'name' => 'address', 'class'=> 'span6', 'placeholder' => 'Enter address', 'value'=>isset($user_list[0]['address']) ? $this->admin_templates->encrypt_decrypt('decrypt',$user_list[0]['address']) : '')); ?>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="address2">Street:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'street', 'name' => 'street', 'class'=> 'span6', 'placeholder' => 'Enter Street', 'value'=>isset($user_list[0]['street']) ? $this->admin_templates->encrypt_decrypt('decrypt',$user_list[0]['street']) : '')); ?>
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="city">City:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'city', 'name' => 'city', 'class'=> 'span6', 'placeholder' => 'Enter city', 'value'=>isset($user_list[0]['city']) ? $this->admin_templates->encrypt_decrypt('decrypt',$user_list[0]['city']) : '')); ?>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="state">State:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'state', 'name' => 'state', 'class'=> 'span6', 'placeholder' => 'Enter State', 'value'=>isset($user_list[0]['state']) ? $user_list[0]['state'] : '')); ?>
											</div>
										</div>
									</div-->

									<div class="row-fluid">
										<!--div class="span6">
											<label class="control-label" for="pincode">Pin Code:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'pincode', 'name' => 'pincode', 'class'=> 'span6', 'placeholder' => 'Enter Pin Code', 'value'=>isset($user_list[0]['pincode']) ? $user_list[0]['pincode']: '')); ?>
											</div>
										</div-->
										<div class="span6">
											<label class="control-label" for="country">Country:</label>
											<div class="controls">

											  <SELECT id="country" name="country">
													<option value="">-----Select Country-----</option>
													<?php 
														 $country=$this->admin_templates->country();
														 //var_dump($country);
														 //echo count($country);
														  for($i=0;$i<count($country);$i++){
															
															if($user_list[0]['country']==$country[$i]['Code2']){$selected="selected";}else{$selected="";}
															 echo "<option value='".$country[$i]['Code2']."' ".$selected.">".$country[$i]['Name']."</option>";

														 }
														
													?>				
														   
											  </SELECT>

											</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="mobile">Mobile:</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'tel', 'id' => 'mobile', 'name' => 'mobile', 'class'=> 'span6', 'placeholder' => '+91-999-999-9999', 'value'=>isset($user_list[0]['mobile']) ?  $user_list[0]['mobile']: '')); ?>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="gender">Select Gender </label>
											<div class="controls">
											
												<SELECT id="gender" name="gender">
													<option value="">Select Gender</option>
													<option value="Male" <?php isset($user_list[0]['gender']) ? ($user_list[0]['gender']=='Male') ? 'selected' : '' : ''?>>Male</option>
													<option value="Female" <?php isset($user_list[0]['gender']) ? ($user_list[0]['gender']=='Female') ? 'selected' : '' : ''?>>Female</option>
													<option value="Transgender" <?php isset($user_list[0]['gender']) ? ($user_list[0]['gender']=='Transgender') ? 'selected' : '' : ''?>>Transgender</option>
														   
											  </SELECT>

											</div>
										</div>
									</div>

								</div>
								<div class="form-actions">
											<?php 	
												if(isset($user_list[0]['user_id'])){
													echo '<button class="btn btn-info" type="button"  id="edituser" name="edituser">';
												}else{
													echo '<button class="btn btn-info" type="button"  id="adduser" name="adduser">';
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


								</div>
								<?php echo form_close();?>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->