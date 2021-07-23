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
                    <div class="col grid-full order-md-1 order-lg-2">
                        <div class="hiraola-slider_area">
                            <div class="main-slider">
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide animation-style-01 bg-1">
                                    <div class="container">
                                        <div class="slider-content">
                                            <h5><span>Black Friday</span> This Week</h5>
                                            <h2>Work Desk</h2>
                                            <h3>Surface Studio 2019</h3>
                                            <h4>Starting at <span>£1599.00</span></h4>
                                            <div class="hiraola-btn-ps_left slide-btn">
                                                <a class="hiraola-btn" href="shop-left-sidebar.html">Shopping Now</a>
                                            </div>
                                        </div>
                                        <div class="slider-progress"></div>
                                    </div>
                                </div>
                                <!-- Single Slide Area End Here -->
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide animation-style-02 bg-2">
                                    <div class="container">
                                        <div class="slider-content">
                                            <h5><span>-10% Off</span> This Week</h5>
                                            <h2>Phantom4</h2>
                                            <h3>Pro+ Obsidian</h3>
                                            <h4>Starting at <span>£809.00</span></h4>
                                            <div class="hiraola-btn-ps_left slide-btn">
                                                <a class="hiraola-btn" href="shop-left-sidebar.html">Shopping Now</a>
                                            </div>
                                        </div>
                                        <div class="slider-progress"></div>
                                    </div>
                                </div>
                                <div class="single-slide animation-style-02 bg-3">
                                    <div class="container">
                                        <div class="slider-content">
                                            <h5><span>Black Friday</span> This Week</h5>
                                            <h2>Work Desk</h2>
                                            <h3>Surface Studio 2019</h3>
                                            <h4>Starting at <span>£1599.00</span></h4>
                                            <div class="hiraola-btn-ps_left slide-btn">
                                                <a class="hiraola-btn" href="shop-left-sidebar.html">Shopping Now</a>
                                            </div>
                                        </div>
                                        <div class="slider-progress"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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