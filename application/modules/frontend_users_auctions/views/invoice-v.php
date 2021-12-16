<style>
    .left{
        text-align:left;
    }
    .right{
        text-align:right;
    }
    .center{
        text-align:center;
    }
</style>
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                    <div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            						<div class="overview-content">
                        <!-- Login Content-->
							<h2><strong>Payment <span>Invoice</span></strong></h2>
														                            <!-- <p class="short_desc">Update your profile information now to get latest update and communications.<br></p> -->

                            
						</div> 
                    <!-- <span> Your account has: <strong> 46</strong> Paid and <strong>60</strong> Free Credits</span>              -->
                     </div>             
                     </div>
                        <div class="col-lg-3">
						    <?php
								$this->load->view('frontend_templates/usernav_v');
							?>

                        </div>
                       

                        <div class="col-lg-9">
                       
                            <div class="tab-pane active" id="account-details">
                                    <div class="myaccount-details">

                                        <?php 
                                            $msg=  $this->session->flashdata('pay_success');
                                            if($msg == "success"){
                                                ?>
                                                <div class="alert alert-block alert-success"  id="p_success">
                                                    <span id="msg"><strong>Well done!</strong> Payment successfully done please check the account credits!</span>
                                                </div>    
                                            <?php }  ?>

                                        <?php 
                                            $msg=  $this->session->flashdata('pay_error');
                                            if($msg == "error"){  ?>
                                                <div class="alert alert-block alert-danger" id="p_error" >
                                                    <span id="msg"><strong>Ooops!</strong> Payment cancelled please check the account! if any  amount debited then within 24 hours will be back</span>
                                                </div> 
                                        <?php  }   ?>
                                        
										<div class="alert alert-block alert-success" id="success" style="display:none;">
											<span id="msg"><strong>Well done!</strong> Records are updated successfully!</span>
										</div>

										<form id="account_form" name="account_form" method="post" class="hiraola-form">

                                            <div class="hiraola-form-inner">

                                            <div id='printInvoice' style='width: 100%;'>

                                            <div class="card-header">
                Invoice
                <strong><?php echo $content_auction[0]['auction_id'];?></strong>
                <span class="float-right"> <strong>Status:</strong> Pending</span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong><?php echo $site_setting[0]['site_name'];?></strong>
                        </div>
                        <div><?php echo $site_setting[0]['site_address'];?></div>
                        <div>Email: <?php echo $email_setting[0]['email_support'];?></div>
                        <div>Phone: <?php echo $site_setting[0]['site_phone'];?></div>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong><?php  echo strtoupper($username);?></strong>
                        </div>
                        <div><?php echo $user_address[0]['address'];?></div>
                        <div><?php echo $user_address[0]['city'];?></div>
                        <div>Email: <?php echo $this->common->encrypt_decrypt('decrypt',$user_data[0]['email']);?></div>
                        <div>Phone: <?php echo $user_data[0]['mobile'];?></div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th class="right">Unit Cost</th>
                                <!-- <th class="center">Qty</th> -->
                                <th class="right">Bid Price</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td class="center">1</td>
                                <td class="left"><?php echo $content_auction[0]['auction_name'];?></td>
                                <td class="left"><?php echo $content_auction[0]['auction_desc'];?></td>
                                <td class="right"><?php echo $content_auction[0]['auction_nprice'];?></td>
                                <!-- <td class="center">20</td> -->
                                <td class="right">$<?php echo $content_auction[0]['bid_price'];?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">$<?php echo $content_auction[0]['bid_price'];?></td>
                                </tr>
                                <!-- <tr>
                                    <td class="left">
                                        <strong>Discount (20%)</strong>
                                    </td>
                                    <td class="right">$1,699,40</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>VAT (10%)</strong>
                                    </td>
                                    <td class="right">$679,76</td>
                                </tr> -->
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>$<?php echo $content_auction[0]['bid_price'];?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                                                                                    
<!-- <span> Dear <?php  echo strtoupper($username);?>,</span><br><br>

Thank you for your bids in our auction.<br><br>

The document is also available under "My Account" in "Invoices" on the website of <a style="font-size: 15px;" href='<?php echo base_url();?>uniquescriptz-auction/' ><?php echo base_url();?>uniquescriptz-auction/</a>. </br>

Payments<br><br>

We request that you transfer the total amount due to our account at the _______________ bank.<br><br>

* Account number: __________________<br><br>

* On behalf of: _________________<br><br>

* IBAN:<br><br>

* BIC/SWIFT:<br><br>

* Reference number: <?php echo $content_auction[0]['auction_id'];?><br><br>


Please note that no transfers are made between banks on weekends (Friday from 16.00 hrs).<br><br>

We thank you for the confidence shown in our company.<br><br>

Yours sincerely,<br>
Administrator <br><br>                    -->
</div>
<div>
    <a href="<?php echo base_url().'generatepdf/'.$content_auction[0]['auction_id'].'.html'?>">
<button class="hiraola-btn hiraola-btn_dark" type="button" style='width:250px'> Download Invoice</button>
                                            </a>
</div>
</div>

                                                

                                            </div>
                                        </form>
                                    </div>
                                </div>

						
                        </div>

					
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->



	
