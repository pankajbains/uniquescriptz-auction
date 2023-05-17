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
							
							<?php  echo form_open('',array('id'=>'formpages', 'name'=>'formpages', 'class'=>'form-horizontal')); ?>

								
								<?php echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'placeholder' => 'ID', 'value'=>isset($coupons_list[0]['id']) ? $coupons_list[0]['id'] : '', 'type'=>'hidden')); ?>

								<?php echo form_input(array('id' => 'type', 'name' => 'type', 'type'=>'hidden', 'value'=>isset($coupons_list[0]['id']) ? 'edit' : 'add'));  ?>
								
                           
								<div class="control-group">
									<label  class="control-label" for="coupon_sdate"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Validity Start Date:</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'coupon_sdate', 'name' => 'coupon_sdate', 'class'=> 'span6  date-picker' , 'placeholder' => 'yyyy-mm-dd', 'data-date-format'=>'yyyy-mm-dd', 'value'=>isset($coupons_list[0]['coupon_sdate']) ? $coupons_list[0]['coupon_sdate'] : '')); ?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="coupon_edate"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Validity End Date:</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'coupon_edate', 'name' => 'coupon_edate', 'class'=> 'span6 date-picker', 'placeholder' => 'yyyy-mm-dd', 'data-date-format'=>'yyyy-mm-dd', 'value'=>isset($coupons_list[0]['coupon_edate']) ? $coupons_list[0]['coupon_edate'] : '')); ?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="coupon_code"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Unique Code:</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'coupon_code', 'maxlength'=>'3', 'name' => 'coupon_code', 'class'=> 'span6', 'placeholder' => 'unique code', 'value'=>isset($coupons_list[0]['coupon_code']) ? substr($coupons_list[0]['coupon_code'], 0, 3) : '')); ?>

									</div>
								</div>                

                            
								<div class="control-group">
									<label  class="control-label" for="stseries"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Starting Series:</label>
									<div class="controls">
										
										<?php 
										
										if(isset($coupons_list[0]['coupon_code'])){

											echo form_input(array('type'=> 'text', 'id' => 'stseries', 'readonly'=>'readonly', 'name' => 'stseries', 'class'=> 'span6', 'placeholder' => 'start series', 'value'=>isset($coupons_list[0]['coupon_code']) ? substr($coupons_list[0]['coupon_code'], 3) : '')); 

										}else{

											echo form_input(array('type'=> 'text', 'id' => 'stseries', 'name' => 'stseries', 'class'=> 'span6', 'placeholder' => 'start series', 'value'=>isset($coupons_list[0]['coupon_code']) ? substr($coupons_list[0]['coupon_code'], 3) : '')); 

										}
										
										?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="endseries"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> End Series:</label>
									<div class="controls">

									<?php 
										
										if(isset($coupons_list[0]['coupon_code'])){

											echo form_input(array('type'=> 'text', 'id' => 'endseries', 'readonly'=>'readonly', 'name' => 'endseries', 'class'=> 'span6', 'placeholder' => 'End Series', 'value'=>isset($coupons_list[0]['coupon_code']) ? substr($coupons_list[0]['coupon_code'], 3) : ''));

										}else{

											echo form_input(array('type'=> 'text', 'id' => 'endseries', 'name' => 'endseries', 'class'=> 'span6', 'placeholder' => 'End Series', 'value'=>isset($coupons_list[0]['coupon_code']) ? substr($coupons_list[0]['coupon_code'], 3) : ''));

										}
										
										?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="coupon_value"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Value Worth:</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'coupon_value', 'name' => 'coupon_value', 'class'=> 'span6', 'placeholder' => 'Value Worth', 'value'=>isset($coupons_list[0]['coupon_value']) ? $coupons_list[0]['coupon_value'] : '')); ?>

									</div>
								</div>

                            
								<div class="control-group">
									<label  class="control-label" for="points_earned"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Points Earned:</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'points_earned', 'name' => 'points_earned', 'class'=> 'span6', 'placeholder' => 'points earned', 'value'=>isset($coupons_list[0]['points_earned']) ? $coupons_list[0]['points_earned'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="status"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Status:</label>
									<div class="controls">
										<div class="span3">
										<label>
	
										<?php 

										if(isset($coupons_list[0]['status']) && $coupons_list[0]['status']==1){
											
											echo form_input(array('type'=> 'checkbox', 'id' => 'status', 'name' => 'status', 'class'=> 'ace-switch ace-switch-6', 'checked'=>'checked'));

										}else{

											echo form_input(array('type'=> 'checkbox', 'id' => 'status', 'name' => 'status', 'class'=> 'ace-switch ace-switch-6')); 

										}
										
										?>

										<span class="lbl"></span>
										</label>
										</div>
									</div>
								</div>


								<div class="hr"></div>

								<div class="form-actions">

									<button class="btn btn-info" type="submit"  id="submitcoupons" name="submitcoupons">
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