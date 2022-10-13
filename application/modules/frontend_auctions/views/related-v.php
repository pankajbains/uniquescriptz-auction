        <!-- Begin Hiraola's Product Area Two -->
        <div class="hiraola-product_area hiraola-product_area-2 section-space_add pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>Related Products</h4>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider-3">


						<?php
							for($r=0;$r<count($content_related);$r++){
						?>

                            <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                         <a href="<?php echo base_url().'product/'.$this->common->strreplace($content_related[$r]['auction_name']).'/'.$content_related[$r]['auction_id'];?>.html">
                                                <img class="primary-img" src="<?php echo base_url().'auction_assets/'.$content_related[$r]['auction_id'].'/'.$content_related[$r]['auction_icon_img'];?>" alt="<?php echo $content_related[$r]['auction_name'];?>">
                                                <img class="secondary-img" src="<?php echo base_url().'auction_assets/'.$content_related[$r]['auction_id'].'/'.$content_related[$r]['auction_icon_img'];?>" alt="<?php echo $content_related[$r]['auction_name'];?>">
                                        </a>
                                        <!--span class="sticker-2">Sale</span-->
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="<?php echo base_url().'product/'.$this->common->strreplace($content_related[$r]['auction_name']).'/'.$content_related[$r]['auction_id'];?>.html" data-toggle="tooltip" data-placement="top" title="Bid Now"><i class="fas fa-gavel"></i></a>
                                                    </li>

                                                    <?php
                                                        if(in_array($content_related[$r]['auction_id'],$wishlist_data)){?>
                                                                    
                                                                    <li>
                                                                               <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist"><i onclick="add_wishlist('<?php echo $content_related[$r]['auction_id'];?>','0','<?php echo $content_related[$r]['auction_name'];?>')" class="ion-android-favorite" id="add_wishlist_<?php echo $content_related[$r]['auction_id']?>"></i></a>
                                                                               <input type="hidden" id="wishlist_<?php echo $content_related[$r]['auction_id']?>" value="0">
                                                                       </li>
                                                  <?php  } else{?>
                                                                       <li>
                                                                       <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $content_related[$r]['auction_id'];?>','1','<?php echo $content_related[$r]['auction_name'];?>')" class="ion-android-favorite-outline" id="add_wishlist_<?php echo $content_related[$r]['auction_id']?>"></i></a>
                                                                       <input type="hidden" id="wishlist_<?php echo $content_related[$r]['auction_id']?>" value="1">
                                                  </li>

                                        <?php }?>

                                            </ul>
                                        </div>

                                        


                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info pt-4">
                                            <h6><a class="product-name" href="<?php echo base_url().'product/'.$this->common->strreplace($content_related[$r]['auction_name']).'/'.$content_related[$r]['auction_id'];?>.html"><?php echo ucwords($content_related[$r]['auction_name']);?></a></h6>
                                            
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hiraola's Slide Item Area End Here -->

							<?php
								}
							?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Product Area Two End Here -->