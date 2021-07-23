
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					<div class="overview-content col-sm-12 col-md-12 col-xs-12 col-lg-12  pb-5">
                            <?php
								$this->load->view('content-v');
							?>
                     </div>
					
                        <div class="col-lg-3">
						    <?php
								$this->load->view('frontend_templates/usernav_v');
							?>

                        </div>


                        <div class="col-lg-9">
                           
                                    <div class="myaccount-orders">
                                        <h4 class="small-title"><?php echo ucwords(str_replace('_',' ',$this->router->fetch_method()));?></h4>
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															<th>Auction ID</th>
															<th>Item Name</th>
															<th>End Time</th>
															<th>Bid Remains</th>
															<th>Remove</th>
														</tr>
														<tr>
															<td><a href="#">SFFS4568SF</a></td>
															<td>On Hold</td>
															<td>£162.00 for 2 items</td>
															<td>234</a>
															</td>
															<td>On Hold</td>
														</tr>

													</tbody>
												</table>
											</div>
									</div><br><br>

						</div>
					
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

