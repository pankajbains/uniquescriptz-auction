		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.html">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>

					<li>
						<a href="#"  class="dropdown-toggle">
							<i class="icon-list"></i>
							<span class="menu-text"> Config Website </span>
							<b class="arrow icon-angle-down"></b>
						</a>

						
						<ul class="submenu" <?php if($this->router->fetch_class()=="admin_home"){echo "style='display:block'";}?>>
							
							<li>
								<a href="<?php echo base_url()?>admin_home/site_logo.html">
									<i class="icon-double-angle-right"></i>
									Site Logo
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url()?>admin_home/site_settings.html">
									<i class="icon-double-angle-right"></i>
									Site Settings
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_home/email_settings.html">
									<i class="icon-double-angle-right"></i>
									Email Settings
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_home/user_points.html">
									<i class="icon-double-angle-right"></i>
									User Points Settings
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_home/social_media.html">
									<i class="icon-double-angle-right"></i>
									Social Media Settings
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url()?>admin_home/currency.html">
									<i class="icon-double-angle-right"></i>
									Currency Settings
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_home/profile.html">
									<i class="icon-double-angle-right"></i>
									Profile Settings
								</a>
							</li>


						</ul>

					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Manage Content </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if($this->router->fetch_class()=="admin_cms"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_cms/add_pages.html">
									<i class="icon-double-angle-right"></i>
									Add New Pages
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_cms/list_pages.html">
									<i class="icon-double-angle-right"></i>
									View Pages
									
								</a>
							</li>

						</ul>
					</li>

					<li>
						<a href="#"  class="dropdown-toggle">
							<i class="icon-user"></i>
							<span class="menu-text"> Manage Users </span>
							<b class="arrow icon-angle-down"></b>
						</a>

						
						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_users"){echo "style='display:block'";}?>>
							
							<li>
								<a href="<?php echo base_url()?>admin_users/add_users.html">
									<i class="icon-double-angle-right"></i>
									Add Users
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url()?>admin_users/registered_users.html">
									<i class="icon-double-angle-right"></i>
									Registered Users
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_users/subscribed_users.html">
									<i class="icon-double-angle-right"></i>
									Subscribed Users
								</a>
							</li>
						</ul>

					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-envelope"></i>
							
							<span class="menu-text"> User Emails </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if($this->router->fetch_class()=="admin_useremail"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_useremail/add_email.html">
									<i class="icon-double-angle-right"></i>
									Add User Emails
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_useremail/list_email.html">
									<i class="icon-double-angle-right"></i>
									View User Emails
								</a>
							</li>

						</ul>
					</li>
				
				<!-- Manage Categories -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span class="menu-text"> Manage Categories </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_categories"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_categories/add_categories.html">
									<i class="icon-double-angle-right"></i>
									Add Categories
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_categories/list_categories.html">
									<i class="icon-double-angle-right"></i>
									View Categories
								</a>
							</li>

						</ul>
					</li>

				<!-- Manage Auction Settings -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-tasks"></i>
							<span class="menu-text"> Manage Auctions </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_auctions"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_auctions/add_auctions.html">
									<i class="icon-double-angle-right"></i>
									Add Auctions
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_auctions/list_auctions.html">
									<i class="icon-double-angle-right"></i>
									Live Auctions 
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_auctions/auction_media.html">
									<i class="icon-double-angle-right"></i>
									Add Auction Images
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_auctions/closed_auctions.html">
									<i class="icon-double-angle-right"></i>
									Closed Auctions
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_auctions/winner_auctions.html">
									<i class="icon-double-angle-right"></i>
									Auction Winners 
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_auctions/invoice_auctions.html">
									<i class="icon-double-angle-right"></i>
									Auction Invoices
								</a>
							</li>



						</ul>
					</li>

<!-- Manage Auction Settings -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-dollar"></i>
							<span class="menu-text"> Manage Credits </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_credits"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_credits/list_credits.html">
									<i class="icon-double-angle-right"></i>
									Show Bid Credits
								</a>
							</li>
							<li>
								<a href="<?php echo base_url()?>admin_credits/add_credits.html">
									<i class="icon-double-angle-right"></i>
									Add Bid Credits
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_credits/list_coupon_credits.html">
									<i class="icon-double-angle-right"></i>
									Show Gift Coupon Credits
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_credits/add_coupon_credits.html">
									<i class="icon-double-angle-right"></i>
									Add Gift Coupon Credits
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_credits/list_gift_credits.html">
									<i class="icon-double-angle-right"></i>
									Show Gift Credits Purchased
								</a>
							</li>

						</ul>
					</li>
<!-- Manage Ecommerce Pages>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-shopping-cart"></i>
							<span class="menu-text"> Manage Shopping </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_shops"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_shops/add_products.html">
									<i class="icon-double-angle-right"></i>
									Add Shopping Products
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_shops/list_products.html">
									<i class="icon-double-angle-right"></i>
									View Shopping Products
								</a>
							</li>

						</ul>
					</li-->

<!-- Manage Payment Gateway -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-credit-card"></i>
							<span class="menu-text"> Manage Payment Gateways </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_gateways"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_gateways/add_gateways.html">
									<i class="icon-double-angle-right"></i>
									Add Gateway
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_gateways/list_gateways.html">
									<i class="icon-double-angle-right"></i>
									View Gateway
								</a>
							</li>

						</ul>
					</li>

<!-- Manage Coupons -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-tag"></i>
							<span class="menu-text"> Manage Coupons </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_coupons"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_coupons/add_coupons.html">
									<i class="icon-double-angle-right"></i>
									Add Coupons
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_coupons/list_coupons.html">
									<i class="icon-double-angle-right"></i>
									View Coupons
								</a>
							</li>

						</ul>
					</li>

<!-- Manage User  Wallets -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-folder-close"></i>
							<span class="menu-text"> Manage Wallets </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if($this->router->fetch_class()=="admin_wallets"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_wallets/list_wallets.html">
									<i class="icon-double-angle-right"></i>
									Wallet Points
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_wallets/withdraw_wallets.html">
									<i class="icon-double-angle-right"></i>
									Withdrawal Requests
								</a>
							</li>

						</ul>
					</li>

<!-- Manage Affilitates -->

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-group"></i>
							<span class="menu-text"> Manage Affiliates </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu"  <?php if($this->router->fetch_class()=="admin_affiliates"){echo "style='display:block'";}?>>
							<li>
								<a href="<?php echo base_url()?>admin_affiliates/add_affiliates.html">
									<i class="icon-double-angle-right"></i>
									Add Affiliation Settings
								</a>
							</li>

							<li>
								<a href="<?php echo base_url()?>admin_affiliates/view_affiliate.html">
									<i class="icon-double-angle-right"></i>
									View Affiliation Settings
								</a>
							</li>


						</ul>
					</li>



				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
