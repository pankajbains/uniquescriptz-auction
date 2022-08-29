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

							<form class="form-horizontal" action="../admin_banner/upload_banner" method="post" enctype="multipart/form-data" name="formpages" id="formpages">

					<?php 
								
					echo form_input(array('id' => 'id', 'name' => 'id', 'type'=>'hidden', 'value'=>isset($content_list[0]['id']) ? $content_list[0]['id'] : '')); 
								
					echo form_input(array('id' => 'banner_id', 'name' => 'banner_id', 'type'=>'hidden', 'value'=>isset($content_list[0]['banner_id']) ? $content_list[0]['banner_id'] : '')); 

					?>

								<div class="control-group">
									<label  class="control-label" for="gateway_name">Banner Name</label>
									<div class="controls">

									<?php echo form_input(array('type'=> 'text', 'id' => 'banner_name', 'name' => 'banner_name', 'class'=> 'span6', 'placeholder' => 'Banner Name', 'value'=>isset($content_list[0]['banner_name']) ? $content_list[0]['banner_name'] : '')); ?>

									</div>
								</div>

								<div class="control-group">
										<div class="controls" style="margin-left: 10px;">
											<label  class="control-label" for="banner_img">Banner Images</label>
											<div class="controls">
												<input multiple="" type="file" id="banner_img" name="banner_img" />
												<?php
												
												$img=explode(',',$content_list[0]['banner_img']);
												for($im=0;$im<count($img);$im++){
													
													if($img[$im]!=''){

												?>
												<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>/banner_assets/<?php echo $img[$im];?>">

												<?php } }?>
											</div>	
										</div>
							</div>
	

								<div class="form-actions">
									<button class="btn btn-info" type="submit"  id="submitbanner" name="submitbanner">
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