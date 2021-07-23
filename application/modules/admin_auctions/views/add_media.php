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
							
							
								<?php  echo form_open_multipart('',array('id'=>'formpages', 'name'=>'formpages')); ?>

								<div class="control-group">

								<?php echo form_input(array('id' => 'img_id', 'name' => 'img_id', 'placeholder' => 'img_id', 'value'=>isset($auction_list[0]['img_id']) ? $auction_list[0]['img_id'] : '', 'type'=>'hidden')); ?>

								<?php echo form_input(array('id' => 'auction_id', 'name' => 'auction_id', 'placeholder' => 'auction_id', 'value'=>isset($auction_list[0]['auction_id']) ? $auction_list[0]['auction_id'] : '', 'type'=>'hidden')); ?>

								<div class="control-group">
									<div class="controls">

										<label  class="control-label" for="logo_img">Logo Image</label>
										<div class="controls">
											<input type="file" id="auction_icon_img"  name="auction_icon_img[]" class="span6" />
											<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>/auction_assets/<?php echo $auction_list[0]['auction_id'].'/'.$auction_list[0]['auction_icon_img'];?>">
										</div>	
										
									</div>
								</div>

							<div class="control-group">
										<div class="controls">
											<label  class="control-label" for="auction_img">Item Images</label>
											<div class="controls">
												<input multiple="" type="file" id="auction_img" name="auction_img[]" />
												<?php
												
												$img=explode(',',$auction_list[0]['auction_img']);
												for($im=0;$im<count($img);$im++){
													
													if($img[$im]!=''){

												?>
												<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>/auction_assets/<?php echo $auction_list[0]['auction_id'].'/'.$img[$im];?>">

												<?php } }?>
											</div>	
										</div>
							</div>
							

							<div class="control-group">
										<div class="controls">
											<label  class="control-label" for="video">Video</label>
											<div class="controls">
												<input multiple="" type="file" id="video" name="video[]" />
												<?php
												$img=explode(';',$auction_list[0]['auction_video']);
												for($im=0;$im<count($img);$im++){
													
													if($img[$im]!=''){

												?>
												<img width="70" border="0" height="80" alt="" src="<?php echo base_url();?>/auction_assets/<?php echo $auction_list[0]['auction_id'].'/'.$img[$im];?>">

												<?php } }?>
											</div>	
										</div>
							</div>


							<div class="control-group">
								<div class="form-actions">
											
													<button class="btn btn-info" type="button"  id="editmedia" name="editmedia">
												
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