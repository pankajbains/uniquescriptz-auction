

		<!-- Begin Hiraola's Page Area -->

        <style>
    .ion-android-favorite{
        color:red;
    }
</style>

<?php
/*
$i=0;
$wData=array(1);
if(count($wishlist_data)>1){
foreach($wishlist_data as $data){ 
//$wdata[$i]=$data['auction_id'];
array_push($wData,$data['auction_id']);
$i++;
}
}*/
//var_dump($content_data);
?>

		<div class="sp-area ">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="sp-img_area">
                                <div class="zoompro-border">
                                    <img class="zoompro" src="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$content_data[0]['auction_icon_img'];?>" data-zoom-image="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$content_data[0]['auction_icon_img'];?>" alt="<?php echo $content_data[0]['auction_name'];?>" />
                                </div>
                                <div id="gallery" class="sp-img_slider">
									<?php 
										$imgs = explode(',',$content_data[0]['auction_img']);
										for($im=0;$im<count($imgs);$im++){
									?>
                                    <a class="active" data-image="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$imgs[$im];?>" data-zoom-image="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$imgs[$im];?>">
                                        <img src="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$imgs[$im];?>" alt="<?php echo $content_data[0]['auction_name'];?>">
                                    </a>

                                    <?php
										}
									?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content about-us-area pt-0">
                                <div class="sp-heading overview-content">
                                    <h2><?php echo $content_data[0]['auction_name'];?></h2>
                                </div>
                                
                                <div class="rating-box">
                                    <!--ul>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                    </ul-->
									Auction Credit Type: <?php echo ($content_data[0]['auction_type']==1)?'Paid':'Free';?> Credits
                                </div>
                                <div class="sp-essential_stuff" id="product_desc">

                                    <?php $this->load->view('product_desc');?>
									
                                </div>
								<?php if(isset($_SESSION['user_id'])){?>
								<h5 class="pt-4">Your account has: <span id="dpaidcredits"><?php echo $content_user[0]['paid_credit'];?></span> Paid and <span id="dfreecredits"><?php echo $content_user[0]['free_credit'];?></span> Free Credits</h5>
								<?php } ?>

								<?php
									$autionstime=$content_data[0]['auction_sdate'].' '.$content_data[0]['auction_stime'];

									$autionetime=$content_data[0]['auction_edate'].' '.$content_data[0]['auction_etime'];
									
									//echo strtotime($autionstime).'==start==<br>'.strtotime($autionetime).'==end==<br/>'.time();

									if((strtotime($autionetime) <= time())){
									
								?>
								<h4 class="pt-4">Auction Closed</h4>
								<?php
									}else if((strtotime($autionstime) <= time())){


								?>
								<h4 class="pt-4">Auction End Time</h4>
								<div class="hiraola-countdown"></div>
								<?php }else{ ?>
								<h4 class="pt-4">Auction Start Time</h4>
								<div class="hiraola-countdown"></div>
								<?php } ?>
                                

                                <div class="qty-btn_area pt-0">

									<?php if(!isset($_SESSION['user_id'])){?>
									
										<div class="coupon-all">
											<div class="coupon">
												<a class="button hiraola-btn_dark" type="button"  href="<?php echo base_url();?>account/login.html"><span>Login Now</span></a>
											</div>
										</div>
											<br><br>
									<?php }else if(strtotime($autionstime) <= time() && (strtotime($autionetime) >= time())){ ?>

									<form class="form-group" id="bid_form" name="bid_form" method="POST">
										<div class="coupon-all">
											<div class="coupon">
												<strong><?php echo $this->frontend_templates->convert_currency_price('currency_code', ''); ?></strong> 
                                                <input id="bid_price" class="input-text" name="bid_price" value="" placeholder="1.65" type="text">&nbsp;&nbsp;

												<input id="auction_id" class="input-text" name="auction_id" value="<?php echo $content_data[0]['auction_id'];?>" type="hidden">

												<input id="auction_name" class="input-text" name="auction_name" value="<?php echo $content_data[0]['auction_name'];?>" type="hidden">

												<input id="allowed_bid" class="input-text" name="allowed_bid" value="<?php echo $this->frontend_templates->convert_currency_price_only('currency_price',$content_data[0]['auction_price']);?>" type="hidden">

												<input id="free_credit" class="input-text" name="free_credit" value="<?php echo $content_user[0]['free_credit'];?>" type="hidden">
												<input id="paid_credit" class="input-text" name="paid_credit" value="<?php echo $content_user[0]['paid_credit'];?>" type="hidden">
												<input id="auction_type" class="input-text" name="auction_type" value="<?php echo $content_data[0]['auction_type'];?>" type="hidden">
												<input id="auction_credits" class="input-text" name="auction_credits" value="<?php echo $content_data[0]['auction_credits'];?>" type="hidden">

												<input id="auction_format" class="input-text" name="auction_format" value="<?php echo $sitesetting[0]['auction_type']?>" type="hidden">

												<!--input class="button" name="submit_bid" id="submit_bid" value="Bid Now" type="button"-->
												<button class="button hiraola-btn_dark" type="submit" id="submit_bid" name="submit_bid" style="float:right"><span>Bid Now</span></button>
											</div>
										</div>
									</form>
									
									<ul>
                                    <?php if(isset($_SESSION['user_id'])){$tmpusername = $_SESSION['user_id'];} 
                                    $auction_id = $content_data[0]['auction_id'];
                                    $auction_name = $content_data[0]['auction_name']
                                    ?>

                                        <!-- <li class="pl-3"><a class="qty-wishlist_btn" href="javascript:void(0)" data-toggle="tooltip" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','<?php echo $tmpusername;?>')" class="ion-android-favorite-outline" id="add_wishlist"></i></a></li> -->

                                        <?php if(in_array($auction_id,$wishlist_data)){?>
                                                    
                                                        <li class="pl-3">
                                                                <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','0','<?php echo $auction_name;?>')" class="ion-android-favorite" id="add_wishlist_<?php echo $auction_id;?>"></i></a>
                                                                <input type="hidden" id="wishlist" value="0">
                                                        </li>
                                                    <?php } else{?>
                                                        <li class="pl-3">
                                                        <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','1','<?php echo $auction_name;?>')" class="ion-android-favorite-outline" id="add_wishlist_<?php echo $auction_id;?>"></i></a>
                                                        <input type="hidden" id="wishlist" value="1">
                                                    </li>
 
                                                        <?php }?>

                                    </ul>
									
                                </div>
										<br>
										<div class="alert alert-block" id="success" style="display:none; mt-4;">
											<span id="msg"><strong>Well done!</strong> Records are updated successfully!</span>
										</div>

									<?php } ?>
									
								
                                <div class="hiraola-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url().'product/'.$this->common->strreplace($content_data[0]['auction_name']).'/'.$content_data[0]['auction_id'];?>.html" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        
                                        <li class="instagram">
                                            <a href="https://www.instagram.com/?url=<?php echo base_url().'product/'.$this->common->strreplace($content_data[0]['auction_name']).'/'.$content_data[0]['auction_id'];?>.html" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

		        <!-- Begin Hiraola's Single Product Tab Area -->
        <div class="hiraola-product-tab_area-2 sp-product-tab_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
					



                        <div class="sp-product-tab_nav ">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                    </li>
                                    <li><a data-toggle="tab" href="#terms"><span>Terms</span></a></li>
									<li><a data-toggle="tab" href="#bidpattern"><span>Bid Pattern Chart</span></a></li>
									<li><a data-toggle="tab" href="#leaderboard"><span>Leaderboard</span></a></li>
                                    <!---li><a data-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li-->
                                </ul>
                            </div>
                            <div class="tab-content hiraola-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">

                                        <?php echo $content_data[0]['auction_desc']?>

                                    </div>
                                </div>
                                <div id="terms" class="tab-pane" role="tabpanel">
                                    <?php echo $content_data[0]['auction_terms']?>
                                </div>
                                <div id="bidpattern" class="tab-pane" role="tabpanel">

								
									<div id="chartdiv" style="width: 100%; height: 400px;"></div>


                                </div>
                                <div id="leaderboard" class="tab-pane" role="tabpanel">
                                    
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Tab Area End Here -->

		 <?php
			$this->load->view('related-v');
		?>

		<?php
				$randvalue=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				$randvalueplus=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				$randvalueneg=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				//var_dump($content_bids);
				for($i=0;$i<count($content_bids);$i++){

					$bids[]=$content_bids[$i]['bid_price'];
				    $counts[]=$content_bids[$i]['total'];
//echo $content_bids[$i]['total'];
					if($content_bids[$i]['bid_status']==0){
						$msg='Lowest Unique Bid';
                        $customBullet="https://www.thestockmarket.guru/img/redstar.png";
					}else if($content_bids[$i]['bid_status']==2){
                        $customBullet="https://www.thestockmarket.guru/img/star.png";
						$msg='Duplicate Bid';
					}else if($content_bids[$i]['bid_status']==1){
                        $customBullet="https://www.thestockmarket.guru/img/star.png";
						$msg='Unique Bid';
					}
                    
					$dataprovider[] = '{"Bid": "'.($this->frontend_templates->convert_currency_price('currency_price',$content_bids[$i]['bid_price']+$randvalue)).'","Between":"'.($this->frontend_templates->convert_currency_price('currency_price',$content_bids[$i]['bid_price']-$randvalueneg)).' - '.($this->frontend_templates->convert_currency_price('currency_price',$content_bids[$i]['bid_price']+$randvalueplus)).'","message": "'.$msg.'","value":'.$content_bids[$i]['total'].',"customBullet":"'.$customBullet.'"}';
				}
				
				

				$datagraph = (count($content_bids)>0)?implode(',',$dataprovider):'';
                //print_r($datagraph);
                //var_dump($dataprovider);
		?>
