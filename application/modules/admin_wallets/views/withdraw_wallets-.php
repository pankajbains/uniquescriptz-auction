<?php
	$this->load->view('admin_templates/header');
?>
			<div class="main-content">

<?php
	$this->load->view('admin_templates/breadcrumb');
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
							<?php if(isset($_GET['success'])){?>
									<div class="alert alert-block alert-success">
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
							<?php }?>
							<form class="form-horizontal" name="formpages" id="formpages"/>
								
								<input type="hidden" id="id" name="id" value=""/>
                           
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Name</label>
									<div class="controls">
										<input type="text" class="span6" id="page"  name="page" placeholder=" Name" value="" />


									</div>
								</div>
                            
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> URL Key</label>
									<div class="controls">
										<input type="text" class="span6" id="url_key"  name="url_key" placeholder=" url key" value="" />
									</div>
								</div>
                <div class="control-group">
					<label class="control-label" for="position"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Display Position</label>
					<div class="controls">

							<SELECT id="position" name="position">
								  <option value="0">-----Select Position-----</option>
									<option value="header">Header</option>
									<option value="footer">Footer</option>
									<option value="left">Left</option>
							 </SELECT>
							
					</div>
				</div>
								<div class="control-group">
									<label  class="control-label" for="text1"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Heading 1</label>
									<div class="controls">
										<textarea class="span6" id="text1"  name="text1" placeholder="Text 1"></textarea>

										<script>
											CKEDITOR.replace('text1');
										</script>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="text2"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Heading 2</label>
									<div class="controls">
										<textarea class="span6" id="text2"  name="text2" placeholder=" Text 2"></textarea>
										<script>
											CKEDITOR.replace('text2');
										</script>

									</div>
								</div>

								<div class="control-group">
									<label  class="control-label" for="text3"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Heading 3</label>
									<div class="controls">
										<textarea class="span6" id="text3"  name="text3" placeholder=" Text 3"></textarea>
										<script>
											CKEDITOR.replace('text3');
										</script>
									</div>
								</div>
								<div class="hr"></div>
								<?php
								for($i=4;$i<=10;$i++){
								
								?>

								<div class="control-group">
									<label  class="control-label" for="text<?php echo $i;?>"> <?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?> Paragraph <?php echo $i-3;?></label>
									<div class="controls">
										<textarea class="span6" id="text<?php echo $i;?>"  name="text<?php echo $i;?>" placeholder="Text "></textarea>
										<script>
											CKEDITOR.replace('text<?php echo $i;?>');
										</script>
									</div>
								</div>

								<?php
								
								}
								?>
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
<?php
	$this->load->view('admin_templates/view-table-footer');
?>
