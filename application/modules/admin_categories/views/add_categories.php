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

					<?php 
								
					echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'value'=>isset($content_list[0]['id']) ? $content_list[0]['id'] : '')); 
								
					echo form_input(array('id' => 'category_id', 'name' => 'category_id', 'type'=>'hidden', 'value'=>isset($content_list[0]['category_id']) ? $content_list[0]['id'] : '')); 

					?>

								<div class="control-group">
									<label  class="control-label" for="gateway_name">Category Name</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'category_name', 'name' => 'category_name', 'class'=> 'span6', 'placeholder' => 'Category Name', 'value'=>isset($content_list[0]['category_name']) ? $content_list[0]['category_name'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="category_parent"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Parents</label>
									<div class="controls">

									<?php

									$multioptions = array('None');

									foreach ($content_parent as $row) {

									  $multioptions[$row['category_name']] = $row['category_name'];

									}

									if(isset($content_list[0]['category_parent'])){
										$selected = $content_list[0]['category_parent'];
									}else{
										$selected = '';
									}
									//echo $result[0]['category_name'];

									echo form_multiselect(array('type'=> 'select', 'id' => 'category_parent', 'name' => 'category_parent[]', 'class'=> 'span6', 'placeholder' => 'Category Parent'),$multioptions, $selected); 
									
									?>


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