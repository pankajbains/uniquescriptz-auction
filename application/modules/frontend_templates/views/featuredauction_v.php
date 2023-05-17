<style>
    .ion-android-favorite{
        color:red;
        display: inline-block;
        font-family: "Ionicons";
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        text-rendering: auto;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
    }
    .slick-slide{
        position: inherit !important;
    }
</style>
<?php


$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//print_r($uriSegments); die;
//print_r($wishlist_data); die;
/*$i=0;
$wData=array(1,2);
if($wishlist_data && count($wishlist_data)>1){
foreach($wishlist_data as $data){ 
//$wdata[$i]=$data['auction_id'];
array_push($wData,$data['auction_id']);
$i++;
}
}*/
//print_r($wishlist_data); die;
?>
    
    <?php


		
		if(count($content_featuredauction)>0){
	?>
        <!-- Begin Hiraola's Product Area -->
        <div class="hiraola-product_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>Featured Auctions</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider">
						    <?php
							    for($f=0;$f<count($content_featuredauction);$f++){
						    ?>
                            <!-- Begin Hiraola's Slide Item Area -->
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="<?php echo base_url().'product/'.$this->common->strreplace($content_featuredauction[$f]['auction_name']).'/'.$content_featuredauction[$f]['auction_id'];?>.html">
                                                <img class="primary-img" src="<?php echo base_url().'auction_assets/'.$content_featuredauction[$f]['auction_id'].'/'.$content_featuredauction[$f]['auction_icon_img'];?>" alt="<?php echo $content_featuredauction[$f]['auction_name'];?>">
                                                <img class="secondary-img" src="<?php echo base_url().'auction_assets/'.$content_featuredauction[$f]['auction_id'].'/'.$content_featuredauction[$f]['auction_icon_img'];?>" alt="<?php echo $content_featuredauction[$f]['auction_name'];?>">
                                        </a>
                                        <span class="sticker" style="width:35%">Featured</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="<?php echo base_url().'product/'.$this->common->strreplace($content_featuredauction[$f]['auction_name']).'/'.$content_featuredauction[$f]['auction_id'];?>.html" data-toggle="tooltip" data-placement="top" title="Bid Now"><i class="fas fa-gavel"></i></a>
                                                    </li>

                                                    
                                                    <?php if(isset($_SESSION['user_id'])){$tmpusername = $_SESSION['user_id'];}
                                                     $auction_id = $content_featuredauction[$f]['auction_id'];
                                                     $auction_name = $content_featuredauction[$f]['auction_name']
                                                    ?>

                                                        <!-- <li class="pl-3"><a class="qty-wishlist_btn" href="javascript:void(0)" data-toggle="tooltip" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','<?php echo $tmpusername;?>')" class="ion-android-favorite-outline" id="add_wishlist"></i></a></li> -->

                                                        <?php if(in_array($content_featuredauction[$f]['auction_id'],$wishlist_data)){?>
                                                                    
                                                                     <li class="pl-3">
                                                                                <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist"><i onclick="add_wishlist('<?php echo $content_featuredauction[$f]['auction_id'];?>','0','<?php echo $content_featuredauction[$f]['auction_name'];?>')" class="ion-android-favorite" id="add_wishlist_<?php echo $content_featuredauction[$f]['auction_id']?>"></i></a>
                                                                                <input type="hidden" id="wishlist_<?php echo $content_featuredauction[$f]['auction_id']?>" value="0">
                                                                        </li>
                                                                    <?php } else{?>
                                                                        <li class="pl-3">
                                                                        <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $content_featuredauction[$f]['auction_id'];?>','1','<?php echo $content_featuredauction[$f]['auction_name'];?>')" class="ion-android-favorite-outline" id="add_wishlist_<?php echo $content_featuredauction[$f]['auction_id']?>"></i></a>
                                                                        <input type="hidden" id="wishlist_<?php echo $content_featuredauction[$f]['auction_id']?>" value="1">
                                                                    </li>

                                                       <?php }?>

                                    

												<!-- <li><a href="<?php base_url();?>" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name" href="<?php echo base_url().'product/'.$this->common->strreplace($content_featuredauction[$f]['auction_name']).'/'.$content_featuredauction[$f]['auction_id'];?>.html"><?php echo ucwords($content_featuredauction[$f]['auction_name']);?></a></h6>
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
	
		}else{

?>
<div class="hiraola-product_area"> <div class="container"></div></div>
<?php

        }
	
	?>
 <script src="<?php echo base_url();?>assets/frontendfiles/js/vendor/sweetalert.min.js"></script>
