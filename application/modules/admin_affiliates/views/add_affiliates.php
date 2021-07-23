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
								
					echo form_input(array('id' => 'aff_id', 'name' => 'aff_id', 'type'=>'hidden', 'value'=>isset($content_list[0]['aff_id']) ? $content_list[0]['aff_id'] : '')); 
								

					?>

								<div class="control-group">
									<label  class="control-label" for="gateway_name">Affiliation Level</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'Number', 'id' => 'aff_level', 'name' => 'aff_level', 'class'=> 'span6', 'placeholder' => 'Level Number', 'value'=>isset($content_list[0]['aff_level']) ? $content_list[0]['aff_level'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="gateway_name">Affiliation Points in %</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'Number', 'id' => 'aff_points', 'name' => 'aff_points', 'class'=> 'span6', 'placeholder' => 'Level Points', 'value'=>isset($content_list[0]['aff_points']) ? $content_list[0]['aff_points'] : '')); ?>

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