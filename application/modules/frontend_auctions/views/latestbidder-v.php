										<h4 class="small-title">Bids in Auction - <?php echo $content_latest[0]['auction_name'];?></h4>
										
										<div class="table-responsive">

												<table class="table table-bordered table-hover">
													<tbody>
														<tr>
															<th>User Name</th>
															<th>Bid Status</th>
															<th>Bid Price</th>
															

														</tr>
														<?php
													
															if(count($content_latest)>0){

																for($i=0;$i<count($content_latest);$i++){
														?>
														<tr>
															<td><?php echo $this->common->encrypt_decrypt('decrypt',$content_latest[$i]['user_name']);?></td>
															<td><?php 
																	echo ($content_latest[$i]['bid_status']==0)?'Lowest Unique Bid':'';
																	echo ($content_latest[$i]['bid_status']==1)?'Unique Bid':'';
																	echo ($content_latest[$i]['bid_status']==2)?'Duplicate Bid':'';
																?>
															</td>
															<td><?php 
																	echo ($content_latest[$i]['user_id']==$_SESSION['user_id'])?$content_latest[$i]['bid_price']:'XXXXXX';
																	//echo $content_latest[$i]['bid_price'];

																?>
															</td>
														</tr>
														<?php 

																}
															}else{
														?>
														<tr>
															<td colspan="3">No Records Available</td>
														</tr>
														<?php
															}
														?>

													</tbody>
												</table>
											</div>