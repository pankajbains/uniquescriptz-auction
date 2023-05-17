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
									if(count($currency_items)==0){
									
								?>
							<?php echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'placeholder' => 'ID', 'value'=>'0')); ?>

								<?php echo form_input(array('id' => 'process', 'name' => 'process', 'type'=>'hidden', 'placeholder' => 'process', 'value'=>'add')); ?>

								<div class="control-group">
									<label  class="control-label" for="currency">Currency</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'currency', 'name' => 'currency', 'class'=> 'ace-switch ace-switch-6 required', 'placeholder' => 'Currency - USD')); ?>
										
										
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="currency-code">Currency Code</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'currency_code', 'name' => 'currency_code', 'class'=> 'ace-switch ace-switch-6', 'placeholder' => 'Currency Rate')); ?>
										Code ($)
									</div>

								</div>

								<div class="control-group">

									<label  class="control-label" for="currency">Coversion Rate</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'coversion_rate', 'name' => 'coversion_rate', 'class'=> 'ace-switch ace-switch-6', 'placeholder' => 'Coversion Rate')); ?>

									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="base-currency">Base Currency</label>

                                        <div class="controls">
                                            <div class="span3">
                                            <label>

											<?php echo form_input(array('id' => 'base_currency', 'name' => 'base_currency', 'placeholder' => 'Base Currency', 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox')) ?>


                                            <span class="lbl"></span>
                                            </label>
                                            </div>
                                        </div>
                                        
								</div>

								<div class="control-group">
									<label  class="control-label" for="active">Active</label>
                                    <div class="controls">
                                        <div class="span3">
                                        <label>

										<?php echo form_input(array('id' => 'active', 'name' => 'active', 'placeholder' => 'Active', 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox')) ?>

                                        <span class="lbl"></span>
                                        </label>
                                        </div>
                                    </div>
                                    

								</div>

								
								<?php
									
									}else{
										
										
										foreach($currency_items as $key=>$value ){
								?>

								
                            <?php echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'placeholder' => 'ID', 'value'=>$currency_items[0]['id'])); ?>

							<?php echo form_input(array('id' => 'process', 'name' => 'process', 'type'=>'hidden', 'placeholder' => 'process', 'value'=>'edit')); ?>

								<div class="control-group">
									<label  class="control-label" for="currency">Currency</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'currency', 'name' => 'currency', 'placeholder' => 'Currency - USD', 'value'=>$currency_items[0]['currency'])); ?>
										
										
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="currency-code">Currency Code</label>
									<div class="controls">
										<?php echo form_input(array('id' => 'currency_code', 'name' => 'currency_code', 'placeholder' => 'Currency Rate', 'value'=>$currency_items[0]['currency_code'])); ?>
										Code ($)
									</div>

								</div>

								<div class="control-group">

									<label  class="control-label" for="currency">Coversion Rate</label>
									<div class="controls">

										<?php echo form_input(array('id' => 'coversion_rate', 'name' => 'coversion_rate', 'placeholder' => 'Coversion Rate', 'value'=>$currency_items[0]['coversion_rate'])); ?>

									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="base-currency">Base Currency</label>

                                        <div class="controls">
                                            <div class="span3">
                                            <label>

											<?php 
											if($currency_items[0]['base_currency']=='1'){
											
											echo form_input(array('id' => 'base_currency', 'name' => 'base_currency', 'placeholder' => 'Base Currency', 'value'=>$currency_items[0]['base_currency'], 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox', 'checked'=>'checked'));

											}else{


											echo form_input(array('id' => 'base_currency', 'name' => 'base_currency', 'placeholder' => 'Base Currency', 'value'=>$currency_items[0]['base_currency'], 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox'));
											}
											
											?>


                                            <span class="lbl"></span>
                                            </label>
                                            </div>
                                        </div>
                                        
								</div>

								<div class="control-group">
									<label  class="control-label" for="active">Active</label>
                                    <div class="controls">
                                        <div class="span3">
                                        <label>

										<?php 
										
										if($currency_items[0]['active']=='1'){
											
											echo form_input(array('id' => 'active', 'name' => 'active', 'placeholder' => 'Active', 'value'=>$currency_items[0]['active'], 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox', 'checked'=>'checked'));
											
										}else{
										
											echo form_input(array('id' => 'active', 'name' => 'active', 'placeholder' => 'Active', 'value'=>$currency_items[0]['active'].'|user_register|reg_id|status', 'class'=> 'ace-switch ace-switch-6', 'type'=>'checkbox'));
										
										}
										
										?>
                                        <span class="lbl"></span>
                                        </label>
                                        </div>
                                    </div>
                                    

								</div>

								<?php 
										}
								
									}
									
								?>
								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="submitcurrency" name="submitcurrency">
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