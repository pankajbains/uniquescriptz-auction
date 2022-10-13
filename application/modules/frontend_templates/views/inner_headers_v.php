<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $sitesetting[0]['site_title']?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="<?php echo $sitesetting[0]['site_desc']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $sitesetting[0]['site_favicon'];?>">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/backendfiles/css/font-awesome.min.css" />
    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/vendor/font-awesome.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/plugins/nice-select.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/vendor.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontendfiles/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/style.css">
    <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/frontendfiles/css/style.min.css">-->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- Loading Area End Here -->
        <!-- Begin Hiraola's Newsletter Popup Area -->
        <!--div class="popup_wrapper">
            <div class="test">
                <span class="popup_off"><i class="ion-android-close"></i></span>
                <div class="subscribe_area text-center">
                    <h2>Sign up for send newsletter?</h2>
                    <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
                    <div class="subscribe-form-group">
                        <form action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div-->
        <!-- Hiraola's Newsletter Popup Area Here -->

        <!-- Begin Hiraola's Header Main Area -->
        <header class="header-main_area">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="ht-left_area">
                                <div class="header-shipping_area">
                                    <ul>
                                        <li>
                                            <span>Telephone Enquiry:</span>
                                            <a href="callto:<?php echo $sitesetting[0]['site_phone']?>"><?php echo $sitesetting[0]['site_phone']?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="ht-right_area">
                                <div class="ht-menu">

                                    <ul>
                                        <?php 
                                        $s_currency =  $this->session->userdata('currency_datas');
                                        if(isset($s_currency[0]['currency'])){$active_curr=$s_currency[0]['currency'];}else{
                                            $active_curr='usd';
                                        }
                                        if(count($currency)>1){ 
                                        ?>
                                           <li><a href="javascript:void(0)">Currency<i class="fa fa-chevron-down"></i></a>
                                                <ul class="ht-dropdown ht-currency">
                                                    <?php for($i=0; $i<count($currency);$i++){?>
                                                    <li <?php echo ($currency[$i]['currency']==$active_curr)?' class="active"':'';?>  ><a href="javascript:void(0)" onclick="language(<?php echo $currency[$i]['id'] ;?>);" ><?php echo $currency[$i]['currency'].' ('.$currency[$i]['currency_code'].')';?></a></li>
                                                <?php } ?>
                                                </ul>
                                            </li>
                                        <?php
                                            }
                                        ?>

                                        <!--li><a href="javascript:void(0)">Language <i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown">
                                                <li class="active"><a href="javascript:void(0)"><img src="<?php echo base_url();?>assets/frontendfiles/images/menu/icon/1.jpg" alt="JB's Language Icon">English</a></li>
                                                <li><a href="javascript:void(0)"><img src="<?php echo base_url();?>assets/frontendfiles/images/menu/icon/2.jpg" alt="JB's Language Icon">Fran�ais</a>
                                                </li>
                                            </ul>
                                        </li-->
                                        <li><a href="<?php echo base_url()?>user/account_details.html">My Account<i class="fa fa-chevron-down"></i></a>
                                            <ul class="ht-dropdown ht-my_account">
												<?php if(!isset($_SESSION['user_id'])){?>
                                                <li class="<?php echo ($this->router->fetch_method()=='register')?'active':'';?>"><a href="<?php echo base_url();?>account/register.html">Register</a></li>
                                                <li class="<?php echo ($this->router->fetch_method()=='login')?'active':'';?>"><a href="<?php echo base_url();?>account/login.html">Login</a></li>
												<?php }else{ ?>
												<li><a href="<?php echo base_url();?>account/logout.html">Logout</a></li>
												<?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="header-logo">
                                <a href="<?php echo base_url();?>">
                                     <img src="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $sitesetting[0]['site_header_logo'];?>" alt="<?php echo $sitesetting[0]['site_name'];?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="hm-form_area">
                                <form action="<?php echo base_url().'search/auction-search/';?>" class="hm-searchbox">
                                    <select class="nice-select select-search-category" name="category_name">
                                        <option value="all">All</option>
                                        <?php
                                        if(isset($category)){
                                            foreach($category AS $category_data){
                                               ?>
                                                <option value="<?php echo $category_data['category_name'] ;?>"><?php echo $category_data['category_name'] ; ?></option> 
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="text" required name="keyword" placeholder="Enter your search key ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom_area header-sticky stick">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 d-lg-none d-block">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img src="<?php echo base_url();?>assets/frontendfiles/images/<?php echo $sitesetting[0]['site_header_logo'];?>" alt="<?php echo $sitesetting[0]['site_name'];?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 d-none d-lg-block position-static">
                            <div class="main-menu_area">
                                <nav>
                                    <ul>
										
                                        <li class="dropdown-holder"><a href="<?php echo base_url();?>">Home</a></li>
										<li><a href="#">List Auctions</a>
											<ul class="hm-dropdown">
											
												<?php
													for($i=0;$i<count($category);$i++){

														$subcategory = $this->frontend_templates_m->category($category[$i]['category_name']);

														//var_dump(count($subcategory));
														$rightmenu=(count($subcategory)!=0)?'right-menu':'';
												?>
													 <li><a href="<?php echo base_url().'category/'.$category[$i]['category_name']?>.html"><?php echo $category[$i]['category_name']?></a>
													<?php if(count($subcategory)>0){?>
														<ul class="hm-dropdown hm-sub_dropdown">
															<?php for($s=0;$s<count($subcategory);$s++){ ?>
																	<li><a href="<?php echo base_url().'category/'.$subcategory[$s]['category_name']?>.html"><?php echo $subcategory[$s]['category_name']?></a></li>
															<?php } ?>
														</ul>
													<?php } ?>
													</li>
												<?php 
													} 
												?>
                                                
                                            </ul>
										</li>
										<li><a href="<?php echo base_url();?>cms/how-it-works.html">How it Works</a></li>

                                        <li><a href="#">Bid Credits</a>
                                            <ul class="hm-dropdown">
                                                <li><a href="<?php echo base_url();?>account/buy_credits.html">Buy Bid Credits</a></li>
                                                <li><a href="<?php echo base_url();?>account/gift_credits.html">Gift Bid Credits</a></li>
                                            </ul>
                                        </li>
										<li><a href="<?php echo base_url();?>product/winners.html">Winners</a></li>
                                        <li><a href="<?php echo base_url();?>cms/about-us.html">About Us</a></li>
                                        <li><a href="<?php echo base_url();?>home/contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-8 col-sm-8">
                            <div class="header-right_area">
                                <ul>
									<?php if(!isset($_SESSION['user_id'])){?>
                                    <li>
                                        <a href="<?php echo base_url();?>account/login.html" class="wishlist-btn" title="login">
                                            <i class="ion-log-in"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>account/register.html" class="" title="register">
                                            <i class="ion-person"></i>
                                        </a>
                                    </li>
									<?php }else{ ?>
									<li>
                                        <a href="<?php echo base_url();?>user/account_details.html" class="" title="My Account">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo base_url();?>account/logout.html" class="" title="logout">
                                            <i class="ion-log-out"></i>
                                        </a>
                                    </li>
									<?php } ?>
									<li>
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_search">
                            <form action="#" class="hm-searchbox">
                                <input type="text" placeholder="Search for item...">
                                <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="index.html"><span
                                        class="mm-text">Home</span></a>
                                </li>
                                <li class="menu-item-has-children"><a href="#"><span class="mm-text">List Auctions</span></a>
											<ul class="sub-menu">
											
												<?php
													for($i=0;$i<count($category);$i++){

														$subcategory = $this->frontend_templates_m->category($category[$i]['category_name']);

														//var_dump(count($subcategory));
														$rightmenu=(count($subcategory)!=0)?'right-menu':'';
												?>
													 <li  class="menu-item-has-children"><a href="<?php echo base_url().'category/'.$category[$i]['category_name']?>.html"><span class="mm-text"><?php echo $category[$i]['category_name']?></span></a>
													<?php if(count($subcategory)>0){?>
														<ul class="sub-menu">
															<?php for($s=0;$s<count($subcategory);$s++){ ?>
																	<li><a href="<?php echo base_url().'category/'.$subcategory[$s]['category_name']?>.html"><span class="mm-text"><?php echo $subcategory[$s]['category_name']?></span></a></li>
															<?php } ?>
														</ul>
													<?php } ?>
													</li>
												<?php 
													} 
												?>
                                                
                                            </ul>
										</li>

                                <li class="menu-item-has-children"><a href="<?php echo base_url();?>cms/how-it-works.html"><span
                                        class="mm-text">How it Works</span></a></li>

                                        <li class="menu-item-has-children"><a href="#">Bid Credits</a>
                                            <ul class="sub-menu">
                                                <li  class="menu-item-has-children"><a href="<?php echo base_url();?>account/buy_credits.html"><span class="mm-text">Buy Bid Credits</a></span></li>
                                                <li class="menu-item-has-children"><a href="<?php echo base_url();?>account/gift_credits.html"><span class="mm-text">Gift Bid Credits</a></span></li>
                                            </ul>
                                        </li>

								<li class="menu-item-has-children"><a href="<?php echo base_url();?>product/winners.html"><span class="mm-text">Winners</span></a></li>
                                <li class="menu-item-has-children"><a href="<?php echo base_url();?>cms/about-us.html"><span  class="mm-text">About Us</span></a></li>
                                <li class="menu-item-has-children"><a href="<?php echo base_url();?>home/contact.html"><span class="mm-text">Contact</span></a></li>





                            </ul>
                        </nav>
                        <nav class="offcanvas-navigation user-setting_area">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="javascript:void(0)"><span
                                        class="mm-text">User Setting</span></a>
                                        <ul class="sub-menu">
                                            <?php if(!isset($_SESSION['user_id'])){?>
                                                <li>
                                                    <a href="<?php echo base_url();?>account/login.html" title="login">
                                                        <span class="mm-text">Login</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url();?>account/register.html" class="" title="register">
                                                        <span class="mm-text">Register</span>
                                                    </a>
                                                </li>
                                                <?php }else{ ?>
                                                <li>
                                                    <a href="<?php echo base_url();?>user/account_details.html" class="" title="My Account">
                                                        <span class="mm-text">My Account</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url();?>account/logout.html" class="" title="logout">
                                                    <span class="mm-text">Logout</span>
                                                    </a>
                                                </li>
                                            <?php } ?>

                                    </ul>
                                </li>
                                <?php 
                                        $s_currency =  $this->session->userdata('currency_datas');
                                        if(count($currency)>1){ 
                                        ?>
                                           <li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                                class="mm-text">Currency</span></a>
                                                <ul  class="sub-menu">
                                                    <?php for($i=0; $i<count($currency);$i++){?>
                                                        <li <?php echo ($currency[$i]['currency']==$active_curr)?' class="active"':'';?>>
                                                            <a href="javascript:void(0)" onclick="language(<?php echo $currency[$i]['id'] ;?>);">
                                                                <span class="mm-text"><?php echo $currency[$i]['currency'].' ('.$currency[$i]['currency_code'].')';?></span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        <?php
                                            }
                                        ?>

                                <!--li class="menu-item-has-children"><a href="javascript:void(0)"><span
                                        class="mm-text">Language</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Fran�ais</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Romanian</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Japanese</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li-->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Hiraola's Header Main Area End Here -->



        <?php 

		$exclude = array("cms", "index", "product", "category");

			if(!in_array($this->router->fetch_method(), $exclude)){

				$this->load->view('frontend_templates/breadcrumb_v');

			}
		?>