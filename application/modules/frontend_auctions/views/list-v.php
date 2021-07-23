
		<!-- Begin Hiraola's Page Area -->
        <div class="about-us-area account-page-area pb-5">
            <div class="container">
                <div class="row">
					   <div class="col-lg-12">
                        <!-- div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                            </div>
                            <div class="product-item-selection_area">
                                <div class="product-short">
                                    <label class="select-label">Short By:</label>
                                    <select class="nice-select">
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="4">Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                        <option value="5">Rating (Highest)</option>
                                        <option value="5">Rating (Lowest)</option>
                                        <option value="5">Model (A - Z)</option>
                                        <option value="5">Model (Z - A)</option>
                                    </select>
                                </div>
                            </div>
                        </div -->

						<!-- Product Grid Start Here -->
						<div class="shop-product-wrap grid gridview-4 row">
						<?php
							//echo count($content_data[0]);
							for($i=0;$i<count($content_data[0]);$i++){
						?>
                        
                            <div class="col-lg-3">
                                <div class="slide-item">
                                    <div class="single_product">
                                        <div class="product-img">
                                            <a href="<?php echo base_url().'product/'.$this->common->strreplace($content_data[0][$i]['auction_name']).'/'.$content_data[0][$i]['auction_id'];?>.html">
                                                <img class="primary-img" src="<?php echo base_url().'auction_assets/'.$content_data[0][$i]['auction_id'].'/'.$content_data[0][$i]['auction_icon_img'];?>" alt="<?php echo $content_data[0][$i]['auction_name'];?>">
                                                <img class="secondary-img" src="<?php echo base_url().'auction_assets/'.$content_data[0][$i]['auction_id'].'/'.$content_data[0][$i]['auction_icon_img'];?>" alt="<?php echo $content_data[0][$i]['auction_name'];?>">
                                            </a>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="hiraola-add_cart" href="<?php echo base_url().'product/'.$this->common->strreplace($content_data[0][$i]['auction_name']).'/'.$content_data[0][$i]['auction_id'];?>.html" data-toggle="tooltip" data-placement="top" title="Bid Now"><i class="fas fa-gavel"></i></a>
                                                    </li>

													<li><a href="<?php base_url();?>" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info pt-3">
                                                <h5><a class="product-name" href="<?php echo base_url().'product/'.$this->common->strreplace($content_data[0][$i]['auction_name']).'/'.$content_data[0][$i]['auction_id'];?>.html"><?php echo ucwords($content_data[0][$i]['auction_name']);?></a></h5>
														
                                                <!--div class="price-box">
                                                    <span class="new-price">£90.36</span>
                                                </div-->
                                               
                                                <!-- div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li><i class="fa fa-star-of-david"></i></li>
                                                        <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                    </ul>
                                                </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        

						<?php
							}	
						?>
						</div>
						<!-- Product Grid End Here -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hiraola-paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="hiraola-pagination-box">
                                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                                <li><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a class="Next" href="javascript:void(0)"><i
                                                        class="ion-ios-arrow-right"></i></a></li>
                                                <li><a class="Next" href="javascript:void(0)">>|</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="product-select-box">
                                                <div class="product-short">
                                                    <p>Showing 1 to 12 of 18 (2 Pages)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

