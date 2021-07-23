<ul>
										<?php if($content_featured[0]['sretail']==1){?>
                                        <li>Retail Price: <a name="#"><span>$<?php echo $content_data[0]['auction_nprice'];?></span></a></li>
										<?php } ?>
                                        <li><?php echo ($sitesetting[0]['auction_type']=='lowest')?'Min':'Max';?> Bid Value: <a name="#">$<?php echo $content_data[0]['auction_price'];?></a></li>
                                        <li>Cost Per Bid: <a name="#"><?php echo $content_data[0]['auction_credits'];?> Credit</a></li>
										<?php if($content_featured[0]['sallowed_bids']==1){?>
                                        <li>Bid Allowed Per Users: <a name="#"><?php echo ($content_data[0]['auction_users_bid']==0)?'Unlimited':$content_data[0]['auction_users_bid'];?></a></li>
										<?php } ?>
										<?php if($content_featured[0]['sreq_bids']==1){?>
                                        <li>Bid Required: <a name="#"><?php echo $content_data[0]['auction_max_bid'];?> Bids</a></li>
										<?php } ?>
										<?php if($content_featured[0]['stotal_bids']==1){?>
										<li>Bid Placed: <a name="#"><?php echo $content_data[0]['auction_bid'];?> Bids</a></li>
										<?php } ?>
										<?php if($content_featured[0]['sremaining_bids']==1){?>
										<li>Remaining Bids: <a name="#">
										<?php
											if($content_data[0]['auction_bid']>=$content_data[0]['auction_max_bid']){
										?>
										Auction will close on schedule time. You can Still Place bid on it.
										<?php 
											}else{
											echo $content_data[0]['auction_max_bid']-$content_data[0]['auction_bid'].' Bids';
										}
										?>
										</a></li>
										<?php } ?>
										<?php if($content_featured[0]['scurrent_bids']==1){?>
										<li>Current Bid Between: <a name="#">$2.79 - $4.98</a></li>
										<?php } ?>
                                    </ul>