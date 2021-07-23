<?php   ob_start(); if(!session_id()){session_start();}
	    include("../../includes/config.php");
        include("../../includes/adinc.php");

		require_once("../header.php");
		require_once("../left-nav.php");

        //$configpage=explode('-',pagename());
        //$configpage=explode('-',$_GET['url']);




        $sqlpage = "Select * FROM `user-".$configpage[0]."` WHERE `user-emails-type`='".$configpage[1]."'";
        $querypage=executeQuery($config['link'],$sqlpage);
        $datapage=mysqli_fetch_array($querypage);


?>
			<div class="main-content">

<?php
	require_once("../breadcrumb.php");
?>
<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>

				<div class="page-content" >
					<div class="page-header position-relative">
						<h1>
							<?php echo edittext($page);?> Content
							<small>
								<i class="icon-double-angle-right"></i>
								Edit <?php echo edittext($page);?>
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12" >
							<!--PAGE CONTENT BEGINS-->
							<?php if(isset($_GET['success'])){?>
									<div class="alert alert-block alert-success" id="success" style="display:none">
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
							<form name="formpages" id="formpages">
								<input type="hidden" id="pagename"  name="pagename" value="<?php echo $page;?>"/>

				
								<?php 
									if($page=='emails-user'){
								?>
								<div class="control-group">
									<label  class="control-label" for="email_subject">User Email</label>
									<div class="controls">
										<input type="text" id="user_email"  name="user_email" placeholder="User Email" value="" />
									</div>

								</div>
								<?php
									}
								?>
								<div class="control-group">
									<label  class="control-label" for="email_subject">Email Subject</label>
									<div class="controls">
										<input type="text" id="user-emails-subject"  name="user-emails-subject" placeholder="Email Subject" value="<?php echo $datapage['user-emails-subject'];?>" />
									</div>

								</div>

								<div class="control-group">
									<label  class="control-label" for="	editor1">Email Message</label>
									<div class="controls">

										<textarea  id="user_emails_body" name="user_emails_body" placeholder="Email Message"><?php echo $datapage['user-emails-body'];?></textarea>
										<script>
											CKEDITOR.replace('user_emails_body');
										</script>

									</div>
									
									<div class="hr hr-double dotted"></div>


								</div>


								
								<div class="form-actions">
								<button class="btn btn-info" type="button"  id="testmail" name="testmail">
										<i class="icon-ok bigger-110"></i>
										Send Test Email
									</button>

									<button class="btn btn-info" type="button"  id="submitemail" name="submitemail">
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





							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->


<?php require_once("footer.php");?>