				<?php
				
				$configpage = explode('_',$this->router->fetch_method());
				
				?>
		<!--link rel="stylesheet" href="http://localhost/CodeIgniter/assets/backendfiles/css/jquery-ui-1.10.3.custom.min.css" />


		<link rel="stylesheet" href="http://localhost/CodeIgniter/assets/backendfiles/css/datepicker.css" />
		<link rel="stylesheet" href="http://localhost/CodeIgniter/assets/backendfiles/css/bootstrap-timepicker.css" />
		<script language="javascript" src="http://localhost/CodeIgniter/ssets/backendfiles/js/jquery.min.js.php" type="text/javascript"></script-->
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
							
								<?php  echo form_open('#',array('id'=>'formpages', 'name'=>'formpages')); ?>

								<div class="control-group">

								<?php echo form_input(array('id' => 'auction_id', 'name' => 'auction_id', 'placeholder' => 'auction id', 'value'=>isset($auction_items[0]['auction_id']) ? $auction_items[0]['auction_id'] : '', 'type'=>'hidden')); ?>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="first_name">Auction Title:</label>
											<div class="controls">
													<?php echo form_input(array('type'=> 'text', 'id' => 'auction_name', 'name' => 'auction_name', 'class'=> 'span6', 'placeholder' => 'Enter Auction Title', 'value'=>isset($auction_items[0]['auction_name']) ? $auction_items[0]['auction_name'] : '', 'required'=>'required')); ?>
											</div>
										</div>
										
										<div class="span6">
											<label class="control-label" for="auction_category">Select Category</label>
											<div class="controls">

											  <SELECT id="auction_category" name="auction_category">
													<option value="">-----Select Category-----</option>
													<?php 
														 $category=$this->admin_categories_m->get_categories_list();

														  for($i=0;$i<count($category);$i++){

															  if(($auction_items[0]['auction_category']==$category[$i]['category_id'])){
																$selected='selected';
															  }else{
																$selected='';
															  }
															  
																echo "<option value='".$category[$i]['category_id']."' ".$selected.">".$category[$i]['category_name']."</option>";

														 }
														
													?>				
														   
											  </SELECT>

											</div>
										</div>

									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="normal_mrp">Auction Retail Price:</label>
											<div class="controls">
													<?php echo form_input(array('type'=> 'text', 'id' => 'auction_nprice', 'name' => 'auction_nprice', 'class'=> 'span6', 'required'=>'required', 'placeholder' => 'Enter Retail Price of Item', 'value'=>isset($auction_items[0]['auction_nprice']) ? $auction_items[0]['auction_nprice'] : '')); ?>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="referedby">

											<?php echo ($siteinfo[0]['auction_type']=='lowest')?'Min':'Max';?> Bid Price:</label>
											<div class="controls"  id="subcat"  name="subcat">
													<?php echo form_input(array('type'=> 'text', 'id' => 'auction_price', 'name' => 'auction_price', 'class'=> 'span6', 'placeholder' => 'Enter Min Bid Value', 'value'=>isset($auction_items[0]['auction_price']) ? $auction_items[0]['auction_price'] : '')); ?>
											</div>
										</div>
									</div>

									<div class="row-fluid">
										<!--div class="span6">
											<label class="control-label" for="email">Min Bid Inc</label>
											<div class="controls">
												<?php echo form_input(array('type'=> 'text', 'id' => 'auction_bid_inc', 'name' => 'auction_bid_inc', 'class'=> 'span6', 'required'=>'required', 'placeholder' => 'Enter Miin Bid Inc', 'value'=>isset($auction_items[0]['auction_bid_inc']) ? $auction_items[0]['auction_bid_inc'] : '')); ?>				
											</div>
										</div-->
										<div class="span6">
											<label class="control-label" for="password">Auction Type</label>
											
											<div class="controls">
												<?php
													$options = array(
															'1'         => 'Paid Auction',
															'0'           => 'Free Auction',

													);
													$selected = isset($auction_items[0]['auction_type']) ? $auction_items[0]['auction_type'] : '';
													echo form_dropdown('auction_type', $options, $selected);
												?>
												

											</div>
										</div>

										<div class="span6">
											<label class="control-label" for="cemail">Bid Credit Required to Place Bid :</label>
											<div class="controls">
											<?php 
												
													echo form_input(array('type'=> 'text', 'id' => 'auction_credits', 'name' => 'auction_credits', 'class'=> 'span6', 'placeholder' => 'Enter Credit Required for Bidding', 'value'=>isset($auction_items[0]['auction_credits']) ? $auction_items[0]['auction_credits'] : ''));

												?>

													<?php  ?>
													</div>
										</div>
									</div>

									<div class="row-fluid">
										<div class="span6">
											<label class="control-label" for="password">Max Bids Per User</label>
											
											<div class="controls">
												<?php 

													echo form_input(array('type'=> 'text', 'id' => 'auction_users_bid', 'name' => 'auction_users_bid', 'class'=> 'span6', 'placeholder' => 'Enter Max Valid Bid per user', 'value'=>isset($auction_items[0]['auction_users_bid']) ? $auction_items[0]['auction_users_bid'] : ''));
												
												?><small><em>Enter 0 for unlimited max bids per user.</em></small>
											</div>
										</div>
										<div class="span6">
											<label class="control-label" for="cpassword">Total Required Bid to Close Auction:</label>
											<div class="controls">

												<?php 

													echo form_input(array('type'=> 'text', 'id' => 'auction_max_bid', 'name' => 'auction_max_bid', 'class'=> 'span6', 'placeholder' => 'Enter Bids to Close Auction', 'value'=>isset($auction_items[0]['auction_max_bid']) ? $auction_items[0]['auction_max_bid'] : ''));
												
												?>

											</div>
										</div>
									</div>



									<div class="row-fluid">
										<div class="span6">
											<!--label class="control-label" for="password">Auction Type</label>
											
											<div class="controls">
												<?php
													$options = array(
															'1'         => 'Paid Auction',
															'0'           => 'Free Auction',

													);
													$selected = isset($auction_items[0]['auction_type']) ? $auction_items[0]['auction_type'] : '';
													echo form_dropdown('auction_type', $options, $selected);
												?>
												

											</div-->
										</div>

										<div class="span6">
											
										</div>
									</div>
								</div>
								<h3 class="header smaller lighter blue">
									Choose Auction Settings
								</h3>
								<div class="control-group">
									<div class="row-fluid">
										<div class="span3">

											<label>

											

											<input name="featured" id="featured" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['featured'])==1){echo 'checked';}?>>

											<span class="lbl">&nbsp;&nbsp;&nbsp;Featured Items</span>
											</label>

										</div>
										<div class="span3">
												<label>
													<?php 
														//echo form_input(array('type'=> 'checkbox', 'id' => 'sretail', 'name' => 'sretail', 'class'=> 'ace-switch ace-switch-6'));
													?>
													<input name="sretail" id="sretail" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['sretail'])==1){echo 'checked';}?>>

													<span class="lbl">&nbsp;&nbsp;&nbsp;Show Retail Price</span>
												</label>
										</div>
										
										<div class="span3">
												<label>
													<?php 
														//echo form_input(array('type'=> 'checkbox', 'id' => 'sallowed_bids', 'name' => 'sallowed_bids', 'class'=> 'ace-switch ace-switch-6'));
													?>
													<input name="sallowed_bids" id="sallowed_bids" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['sallowed_bids'])==1){echo 'checked';}?>>

													<span class="lbl">&nbsp;&nbsp;&nbsp;Show Allowed Bid/User</span>
												</label>
										</div>

										<div class="span3">
											<label>

											<?php 
												//echo form_input(array('type'=> 'checkbox', 'id' => 'sreq_bids', 'name' => 'sreq_bids', 'class'=> 'ace-switch ace-switch-6'));
											?>
											<input name="sreq_bids" id="sreq_bids" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['sreq_bids'])==1){echo 'checked';}?>>

											<span class="lbl">&nbsp;&nbsp;&nbsp;Show Required Bids</span>
											</label>
										</div>


									</div>

								</div>

											
								<hr />	

								 <div class="row-fluid">

									

									<div class="span3">
											<label>

											<?php 
												//echo form_input(array('type'=> 'checkbox', 'id' => 'stotal_bids', 'name' => 'stotal_bids', 'class'=> 'ace-switch ace-switch-6'));
											?>
											<input name="stotal_bids" id="stotal_bids" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['stotal_bids'])==1){echo 'checked';}?>>

											<span class="lbl">&nbsp;&nbsp;&nbsp;Show Total Bid Placed</span>
											</label>
									</div>

									<div class="span3">
										<label>

											<?php 
												//echo form_input(array('type'=> 'checkbox', 'id' => 'sremaining_bids', 'name' => 'sremaining_bids', 'class'=> 'ace-switch ace-switch-6'));
											?>
											<input name="sremaining_bids" id="sremaining_bids" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['sremaining_bids'])==1){echo 'checked';}?>>

										<span class="lbl">&nbsp;&nbsp;&nbsp;Show Remaining Bids</span>
										</label>
									</div>

									<div class="span3">
											<label>
											<?php 
												//echo form_input(array('type'=> 'checkbox', 'id' => 'scurrent_bids', 'name' => 'scurrent_bids', 'class'=> 'ace-switch ace-switch-6'));
											?>
											<input name="scurrent_bids" id="scurrent_bids" class="ace-switch ace-switch-6" type="checkbox" <?php if(isset($auction_items[0]['scurrent_bids'])==1){echo 'checked';}?>>

											<span class="lbl">&nbsp;&nbsp;&nbsp; Show Current Bid</span>
											</label>
									</div>



									<div class="span3">
											<label>
												<?php 

													echo form_input(array('type'=> 'text', 'id' => 'extend_auction', 'name' => 'extend_auction', 'class'=> 'input-mini', 'value'=>(isset($auction_items[0]['extend_auction']))? $auction_items[0]['extend_auction']:'0'));
												?>

												<small class="lbl">&nbsp;&nbsp;Day's&nbsp; Increase time if no Winner</small>
											</label>
									</div>


								  </div><!-- row-fluid-->

								</div>

								<h3 class="header smaller lighter blue">
									Current Server Time
									<small id="servertime">July 02, 2015 20:57</small>
								</h3>
			

<div class="control-group">
				<label class="control-label" for="asdate">Auction Start Date:</label>
<?php 
		if(isset($auction_items[0]['auction_id'])){

			$sdate=$auction_items[0]['auction_sdate'];
			$edate=$auction_items[0]['auction_edate'];
			$astime=$auction_items[0]['auction_stime'];
			$aetime=$auction_items[0]['auction_etime'];
		
		}
?>
				<div class="controls">
					<div class="row-fluid input-append">
							<input class="span3 date-picker" id="auction_sdate" name="auction_sdate" type="text" data-date-format="yyyy-mm-dd" value="<?php if(isset($auction_items[0]['auction_id'])){echo $sdate;}?>"/>
							<span class="add-on">
									<i class="icon-calendar"></i>
							</span>
							
							&nbsp;&nbsp;
							<div class="input-append bootstrap-timepicker" style="padding-left:20px;">
									<input id="auction_stime" name="auction_stime" type="text" class="input-small" value="<?php if(isset($auction_items[0]['auction_id'])){echo $astime;}?>"/>
									<span class="add-on">
											<i class="icon-time"></i>
									</span>
							</div>

					</div>
						
				</div>

		</div>

		<div class="control-group">
				<label class="control-label" for="acdate">Auction End Date:</label>

				<div class="controls">
					<div class="row-fluid input-append">
							<input class="span3 date-picker" id="auction_edate" name="auction_edate" type="text" data-date-format="yyyy-mm-dd" value="<?php if(isset($auction_items[0]['auction_id'])){echo $edate;}?>"/>
							<span class="add-on">
									<i class="icon-calendar"></i>
							</span>

							&nbsp;&nbsp;
							<div class="input-append bootstrap-timepicker" style="padding-left:20px;">
									<input id="auction_etime" name="auction_etime" type="text" class="input-small" value="<?php if(isset($auction_items[0]['auction_id'])){echo $aetime;}?>"/>
									<span class="add-on">
											<i class="icon-time"></i>
									</span>
							</div>



					</div>
				</div>

		</div>
			

								
								
								<h3 class="header smaller lighter blue">
									Item Description
									<small>Shipping & Terms</small>
								</h3>
								
	<div class="control-group">
			<div class="controls">
				
					<label class="control-label" for="item_desc">Auction Description: </label>

					<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'auction_desc', 'name' => 'auction_desc', 'class'=> 'span6', 'placeholder' => 'Enter Description', 'value'=>isset($auction_items[0]['auction_desc']) ? $auction_items[0]['auction_desc'] : '')); ?>

										<script>
											CKEDITOR.replace('auction_desc');
										</script>

				
			</div>
		</div>			

	<div class="control-group">
			<div class="controls">
				
					<label class="control-label" for="item_desc">Auction Terms: </label>

					<?php echo form_textarea(array('type'=> 'textarea', 'id' => 'auction_terms', 'name' => 'auction_terms', 'class'=> 'span6', 'placeholder' => 'Enter Terms', 'value'=>isset($auction_items[0]['auction_terms']) ? $auction_items[0]['auction_terms'] : '')); ?>

										<script>
											CKEDITOR.replace('auction_terms');
										</script>

				
			</div>
		</div>		
		

								<div class="form-actions">
											<?php 	
												if(isset($auction_items[0]['auction_id'])){
													echo '<button class="btn btn-info" type="button"  id="addauction" name="editauction">';
												}else{
													echo '<button class="btn btn-info" type="button"  id="addauction" name="addauction">';
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





								</div>
								<?php echo form_close();?>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		