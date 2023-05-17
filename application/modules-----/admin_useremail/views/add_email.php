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

								
								<?php echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'placeholder' => 'ID', 'value'=>isset($email_list[0]['id']) ? $email_list[0]['id'] : '', 'type'=>'hidden')); ?>
                           
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Type</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'user_emails_type', 'name' => 'user_emails_type', 'class'=> 'span6', 'placeholder' => 'Enter Page Name', 'value'=>isset($email_list[0]['user_emails_type']) ? $email_list[0]['user_emails_type'] : '')); ?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Subject</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'user_emails_subject', 'name' => 'user_emails_subject', 'class'=> 'span6', 'placeholder' => 'URL Key', 'value'=>isset($email_list[0]['user_emails_subject']) ? $email_list[0]['user_emails_subject'] : '')); ?>

									</div>
								</div>
                

								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Content</label>
									<div class="controls">

										<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'user_emails_body', 'name' => 'user_emails_body', 'class'=> 'span6', 'placeholder' => 'Enter Page Heading1', 'value'=>isset($email_list[0]['user_emails_body']) ? $email_list[0]['user_emails_body'] : '')); ?>

										<script>
											CKEDITOR.replace('user_emails_body');
										</script>

									</div>
								</div>


								<div class="hr"></div>

								<div class="form-actions">

									<button class="btn btn-info" type="button"  id="testmail" name="testmail">
										<i class="icon-ok bigger-110"></i>
										Send Test Email
									</button>

									<button class="btn btn-info" type="submit"  id="submitemail" name="submitemail">
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