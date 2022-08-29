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
                        if(count($content_featuredauction)>0){
                        ?>
                    <div class="col grid-full order-md-1 order-lg-2">
                        <div class="hiraola-slider_area">
                            <div class="main-slider">
                                <!-- Begin Single Slide Area -->
                                <?php
                                     for($f=0;$f<count($content_featuredauction);$f++){
                                ?>
                                <div class="single-slide animation-style-01 bg-1">
                                    <div class="container" >
                                        <div class="slider-content" style="position: absolute; z-index: 100;">
                                            
                                            
                                            <h3><?php echo $content_featuredauction[$f]['auction_name'];?></h3>
                                            <h4>Starting at <span><?php echo  $this->frontend_templates->convert_currency_price('currency_price',$content_featuredauction[$f]['auction_nprice']); ?></span></h4>
                                            </div>
                                            <div class="hiraola-btn-ps_left slide-btn" style="position: absolute; z-index: 100; top: 63%;">
                                                <a class="hiraola-btn" href="<?php echo base_url().'product/'.$this->common->strreplace($content_featuredauction[$f]['auction_name']).'/'.$content_featuredauction[$f]['auction_id'];?>.html">Shopping Now</a>
                                            </div>
                                            <div>
                                                <img class="primary-img" style="width:1110px; height:520px" src="<?php echo base_url().'auction_assets/'.$content_featuredauction[$f]['auction_id'].'/'.$content_featuredauction[$f]['auction_icon_img'];?>" alt="<?php echo $content_featuredauction[$f]['auction_name'];?>">
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
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="<?php echo base_url();?>assets/frontendfiles/images/banner/1_1.jpg" alt="Hiraola's Banner">
                               
                            </a>
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