        <div class="slider-with-category_menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col grid-half order-md-2 order-lg-1">
                        <div class="category-menu">
                            <div class="category-heading">
                                <h2 class="categories-toggle"><span>Browse Auctions</span></h2>
                            </div>
                            <div id="cate-toggle" class="category-menu-list">
                                <ul>

								<?php
									for($i=0;$i<count($category);$i++){

										$subcategory = $this->frontend_templates_m->category($category[$i]['category_name']);

										//var_dump(count($subcategory));
										$rightmenu=(count($subcategory)!=0)?'right-menu':'';
								?>
									<li class="<?php echo $rightmenu;?>"><a href="<?php echo base_url().'category/'.$category[$i]['category_slug']?>.html"><?php echo $category[$i]['category_name']?></a>
									<?php if(count($subcategory)>0){?>
										<ul class="cat-mega-menu cat-mega-menu-3" style="width:260px !important;">
                                            <li class="right-menu cat-mega-title">
                                                <a href="<?php echo base_url().'category/'.$category[$i]['category_slug']?>.html"><?php echo $category[$i]['category_name']?></a>
                                                <ul>
													<?php for($s=0;$s<count($subcategory);$s++){ ?>
                                                    <li><a href="<?php echo base_url().'category/'.$subcategory[$s]['category_slug']?>.html"><?php echo $subcategory[$s]['category_name']?></a></li>
													<?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
									<?php } ?>
									</li>
								<?php 
									} 
								?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(count($content_featuredbanner)>0){
                        ?>
                    <div class="col grid-full order-md-1 order-lg-2">
                        <div class="hiraola-slider_area">
                            <div class="main-slider" style="background-color:#fff;">
                                <!-- Begin Single Slide Area -->
                                <?php
                                     for($f=0;$f<count($content_featuredbanner);$f++){
                                ?>
                                <div class="single-slide animation-style-01" style="background-image: url(<?php echo base_url().'auction_assets/'.$content_featuredbanner[$f]['auction_id'].'/'.$content_featuredbanner[$f]['auction_icon_img'];?>);
                                    background-repeat: no-repeat;
                                    background-position: center center;
                                    background-size: cover;
                                    min-height: 520px;">
                                    <div class="container" >
                                        <div class="slider-content" style="position: absolute; z-index: 100; top: 63%;">
                                            
                                            
                                            <h3><?php echo $content_featuredbanner[$f]['auction_name'];?></h3>
                                            <h4>Starting at <span><?php echo  $this->frontend_templates->convert_currency_price('currency_price', $content_featuredbanner[$f]['auction_nprice']); ?></span></h4>
                                            </div>
                                            <div class="hiraola-btn-ps_left slide-btn" style="position: absolute; z-index: 100; top: 83%; left:5%">
                                                <a class="hiraola-btn" href="<?php echo base_url().'product/'.$this->common->strreplace($content_featuredbanner[$f]['auction_name']).'/'.$content_featuredbanner[$f]['auction_id'];?>.html">Bid Now</a>
                                            </div>
                                            
                                        <div class="slider-progress"></div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- Single Slide Area End Here -->    
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col grid-half grid-md_half order-md-2 order-lg-3">
                        <div class="banner-item img-hover_effect">
                            <?php if(count($side_banner)>0){ ?>
                            <a href="<?php echo $side_banner[0]['banner_url'];?>">
                                <img class="img-full" src="<?php echo base_url();?>banner_assets/<?php echo $side_banner[0]['banner_img'];?>" alt="<?php echo $side_banner[0]['banner_name'];?>">
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<?php
			$this->load->view('featuredauction_v');

			$this->load->view('newauction_v');

			$this->load->view('shipping_v');
		?>