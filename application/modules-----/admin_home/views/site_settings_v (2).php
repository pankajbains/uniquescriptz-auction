
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
									<label  class="control-label" for="site-name">Site Name</label>
									<div class="controls">
										<input type="text" id="site-name"  name="site-name" placeholder="Site Name" value="" />
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="site-title">Site Title</label>
									<div class="controls">
										<input type="text" id="site-title" name="site-title" placeholder="Site Title" value=""/>
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="site-desc">Site Description</label>
									<div class="controls">
										<input type="text" id="site-desc" name="site-desc" placeholder="Site Description" value="" />
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="timezone">Country Time zone</label>
									<div class="controls">
									<input type="text" id="timezone" name="timezone" placeholder="Country Time zone" value="" />
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="analytics">Google Analtics Code</label>
									<div class="controls">
										<input type="text" id="analytics" name="analytics" placeholder="Google Analytics" value="" />
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="big_logo">Big Size Logo</label>
									<div class="controls">
										<input type="file" id="big_logo"  name="big_logo" class="span6" />
										<!--img width="70" border="0" height="80" alt="" src="<?php echo siteAssetsUrl.'images/'.$datapage['big_logo'];?>"-->
									</div>	
								</div>

								<div class="control-group">
									<label  class="control-label" for="header_logo">Header Logo</label>
									<div class="controls">
										<input type="file" id="header_logo"  name="header_logo" class="span6" />
										<!--img width="70" border="0" height="80" alt="" src="<?php echo siteAssetsUrl.'images/'.$datapage['header_logo'];?>"-->
									</div>	
								</div>
								
								<div class="control-group">
									<label  class="control-label" for="favicon">Favicon Icon</label>
									<div class="controls">
										<input type="file" id="favicon"  name="favicon" class="span6" />
										<!--img width="70" border="0" height="80" alt="" src="<?php echo siteAssetsUrl.'images/'.$datapage['favicon'];?>"-->
									</div>	
								</div>

								<div class="form-actions">
									<button class="btn btn-info" type="button"  id="submitsite" name="submitsite">
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