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

								
								<?php echo form_input(array('id' => 'cms_id', 'name' => 'cms_id', 'type'=>'hidden', 'placeholder' => 'cms_ ID', 'value'=>isset($currency_items[0]['cms_id']) ? $currency_items[0]['cms_id'] : '', 'type'=>'hidden')); ?>
                           
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Name</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'cms_page_name', 'name' => 'cms_page_name', 'class'=> 'span6', 'placeholder' => 'Enter Page Name', 'value'=>isset($currency_items[0]['cms_page_name']) ? $currency_items[0]['cms_page_name'] : '')); ?>

									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> URL Key</label>
									<div class="controls">
										<?php echo form_input(array('type'=> 'text', 'id' => 'cms_page_url', 'name' => 'cms_page_url', 'class'=> 'span6', 'placeholder' => 'URL Key', 'value'=>isset($currency_items[0]['cms_page_url']) ? $currency_items[0]['cms_page_url'] : '')); ?>

									</div>
								</div>
                

								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Heading 1</label>
									<div class="controls">

										<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'cms_page_heading1', 'name' => 'cms_page_heading1', 'class'=> 'span6', 'placeholder' => 'Enter Page Heading1', 'value'=>isset($currency_items[0]['cms_page_heading1']) ? $currency_items[0]['cms_page_heading1'] : '')); ?>

										<script>
											CKEDITOR.replace('cms_page_heading1');
										</script>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="text2"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Heading 2</label>
									<div class="controls">
										<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'cms_page_heading2', 'name' => 'cms_page_heading2', 'class'=> 'span6', 'placeholder' => 'Enter Page Heading2', 'value'=>isset($currency_items[0]['cms_page_heading2']) ? $currency_items[0]['cms_page_heading2'] : '')); ?>
										<script>
											CKEDITOR.replace('cms_page_heading2');
										</script>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="text3"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Heading 3</label>
									<div class="controls">
										<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'cms_page_heading3', 'name' => 'cms_page_heading3', 'class'=> 'span6', 'placeholder' => 'Enter Page Heading3', 'value'=>isset($currency_items[0]['cms_page_heading3']) ? $currency_items[0]['cms_page_heading3'] : '')); ?>
										<script>
											CKEDITOR.replace('cms_page_heading3');
										</script>
									</div>
								</div>
								<div class="hr"></div>
								<?php
								for($i=1;$i<=7;$i++){
								
								?>

								<div class="control-group">
									<label  class="control-label" for="text<?php echo $i;?>"> <?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Paragraph <?php echo $i;?></label>
									<div class="controls">
										<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'cms_page_paragraph'.$i, 'name' => 'cms_page_paragraph'.$i, 'class'=> 'span6', 'placeholder' => 'Enter Page Paragraph', 'value'=>isset($currency_items[0]['cms_page_paragraph'.$i]) ? $currency_items[0]['cms_page_paragraph'.$i] : '')); ?>
										<script>
											CKEDITOR.replace('cms_page_paragraph<?php echo $i;?>');
										</script>

									</div>
								</div>

								<?php
									}
								?>
								<div class="form-actions">
									<button class="btn btn-info" type="submit"  id="submitcms" name="submitcms">
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