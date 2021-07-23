<?php
		if(count($content_newauction)>0){
?>
        <!-- Begin Hiraola's Product Area -->
        <div class="hiraola-product_area pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>New Auctions</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider">

						<?php
							for($n=0;$n<count($content_newauction);$n++){
						?>
							
                            <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="<?php echo base_url().'product/'.$this->common->strreplace($content_featuredauction[$f]['auction_name']).'/'.$content_newauction[$n]['auction_id'];?>.html">
                                                <img class="primary-img" src="<?php echo base_url().'auction_assets/'.$content_newauction[$n]['auction_id'].'/'.$content_newauction[$n]['auction_icon_img'];?>" alt="<?php echo $content_newauction[$n]['auction_name'];?>">
                                                <img class="secondary-img" src="<?php echo base_url().'auction_assets/'.$content_newauction[$n]['auction_id'].'/'.$content_newauction[$n]['auction_icon_img'];?>" alt="<?php echo $content_newauction[$n]['auction_name'];?>">
                                        </a>
                                        <span class="sticker">New</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="<?php echo base_url().'product/'.$this->common->strreplace($content_newauction[$n]['auction_name']).'/'.$content_newauction[$n]['auction_id'];?>.html" data-toggle="tooltip" data-placement="top" title="Bid Now"><i class="fas fa-gavel"></i></a>
                                                    </li>

												<li><a href="<?php base_url();?>" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name" href="<?php echo base_url().'product/'.$this->common->strreplace($content_newauction[$n]['auction_name']).'/'.$content_newauction[$n]['auction_id'];?>.html"><?php echo ucwords($content_newauction[$n]['auction_name']);?></a></h6>
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
        <!-- Hiraola's Product Area End Here -->

	<?php
	
		}
	
	?>
