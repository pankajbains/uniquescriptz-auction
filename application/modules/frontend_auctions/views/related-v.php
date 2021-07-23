        <!-- Begin Hiraola's Product Area Two -->
        <div class="hiraola-product_area hiraola-product_area-2 section-space_add">
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

												<li><a href="<?php base_url();?>" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
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