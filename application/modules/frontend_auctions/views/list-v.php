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
    
</style>
<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//print_r($uriSegments); die;
//print_r($wishlist_data); die;
$i=0;
$wData=array(1,2);
if($wishlist_data && count($wishlist_data)>1){
foreach($wishlist_data as $data){ 
//$wdata[$i]=$data['auction_id'];
array_push($wData,$data['auction_id']);
$i++;
}
}
//print_r($wData); die;
?>
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
                                $auction_id=$content_data[0][$i]['auction_id'];
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

													
                                                    <?php if(isset($_SESSION['user_id'])){$tmpusername = $_SESSION['user_id'];}?>

                                                        <!-- <li class="pl-3"><a class="qty-wishlist_btn" href="javascript:void(0)" data-toggle="tooltip" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','<?php echo $tmpusername;?>')" class="ion-android-favorite-outline" id="add_wishlist"></i></a></li> -->

                                                        <?php if(in_array($content_data[0][$i]['auction_id'],$wData)){?>
                                                                    
                                                                        <li class="pl-3">
                                                                                <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist"><i onclick="add_wishlist('<?php echo $content_data[0][$i]['auction_id'];?>','0')" class="ion-android-favorite" id="add_wishlist_<?php echo $content_data[0][$i]['auction_id']?>"></i></a>
                                                                                <input type="hidden" id="wishlist_<?php echo $content_data[0][$i]['auction_id']?>" value="0">
                                                                        </li>
                                                                    <?php } else{?>
                                                                        <li class="pl-3">
                                                                        <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $content_data[0][$i]['auction_id'];?>','1')" class="ion-android-favorite-outline" id="add_wishlist_<?php echo $content_data[0][$i]['auction_id']?>"></i></a>
                                                                        <input type="hidden" id="wishlist_<?php echo $content_data[0][$i]['auction_id']?>" value="1">
                                                                    </li>

                                                                        <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="hiraola-product_content">
                                            <div class="product-desc_info pt-3">
                                                <h5><a class="product-name" href="<?php echo base_url().'product/'.$this->common->strreplace($content_data[0][$i]['auction_name']).'/'.$content_data[0][$i]['auction_id'];?>.html"><?php echo ucwords($content_data[0][$i]['auction_name']);?></a></h5>
														
                                                <!--div class="price-box">
                                                    <span class="new-price">�90.36</span>
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
                                            
                                            <?php
                                            //print_r($total_item); die;
                                            if(isset($total_item) && $total_item>20){
                                            $page_count= ceil($total_item/20);
                                            
                                            if(isset($_GET['page'])){
                                                $page=$_GET['page'];
                                            }else{
                                                $page=1;
                                            }
                                            $mainNext=0;
                                            $mainPrev=0;
                                            $urlNext='';
                                            $urlPrev='';

                                            if($page==1){
                                                $mainNext=$page+1;
                                                $urlNext=base_url()."category/".$uriSegments[3]."?page=".$mainNext;
                                                $mainPrev="javascript:void(0)";
                                                $urlPrev=$mainPrev;
                                            }
                                            elseif($page==$page_count){
                                                $mainNext=$page-1;
                                                $urlNext="javascript:void(0)";
                                                $mainPrev=base_url()."category/".$uriSegments[3]."?page=".$mainNext;
                                                $urlPrev=$mainPrev;

                                            }else{
                                                $mainNext=$page+1;
                                                $mainPrev=$page-1;
                                                $urlNext=base_url()."category/".$uriSegments[3]."?page=".$mainNext;
                                                $mainPrev=base_url()."category/".$uriSegments[3]."?page=".$mainPrev;
                                                $urlPrev=$mainPrev;

                                            }
                                          

                                            if($page==1){
                                                if($total_item>20 && $total_item<=40){
                                                    $dataFirst="<li class='active'><a href=".base_url()."category/".$uriSegments[3].">1</a></li>";
                                           $dataMiddle="<li><a href=".base_url()."category/".$uriSegments[3]."?page=2>2</a></li>";
                                           
                                                }elseif($total_item>40){    
                                                    $dataFirst="<li class='active'><a href=".base_url()."category/".$uriSegments[3].">1</a></li>";
                                           $dataMiddle="<li><a href=".base_url()."category/".$uriSegments[3]."?page=2>2</a></li>";
                                           $dataLast="<li><a href=".base_url()."category/".$uriSegments[3]."?page=3>3</a></li>";
                                                }
                                           
                                            }
                                            elseif($page==$page_count){
                                                if($total_item>20 && $total_item<=40){
                                                    $prePage=$page-1;
                                                $nextPage=$page-2;
                                                $dataFirst="<li ><a href=".base_url()."category/".$uriSegments[3]."?page=$prePage>$prePage</a></li>";
                                                $dataMiddle="<li class='active'><a href=".base_url()."category/".$uriSegments[3]."?page=$page>$page</a></li>";
                                                //$dataLast="<li  class='active'><a href=".base_url()."category/".$uriSegments[3]."?page=$page>$page</a></li>";
                                                }elseif($total_item>40){
                                                    $prePage=$page-1;
                                                $nextPage=$page-2;
                                                $dataFirst="<li ><a href=".base_url()."category/".$uriSegments[3]."?page=$nextPage>$nextPage</a></li>";
                                                $dataMiddle="<li><a href=".base_url()."category/".$uriSegments[3]."?page=$prePage>$prePage</a></li>";
                                                $dataLast="<li  class='active'><a href=".base_url()."category/".$uriSegments[3]."?page=$page>$page</a></li>";
                                                }
                                            }
                                            else{
                                                $prePage=$page-1;
                                                $nextPage=$page+1;
                                                $dataFirst="<li ><a href=".base_url()."category/".$uriSegments[3]."?page=$prePage>$prePage</a></li>";
                                           $dataMiddle="<li class='active'><a href=".base_url()."category/".$uriSegments[3]."?page=$page>$page</a></li>";
                                           $dataLast="<li><a href=".base_url()."category/".$uriSegments[3]."?page=$nextPage>$nextPage</a></li>";

                                            }
                                            ?>
                                            <li><a class="Next" href="<?php echo base_url().'category/'.$uriSegments[3].''?>">|<<</a></li>
                                            <li><a class="Next" href="<?php echo $urlPrev;?>"><i
                                                        class="ion-ios-arrow-left"></i></a></li>
                                            <?php
                                           echo $dataFirst;
                                           echo $dataMiddle;
                                           echo $dataLast;
                                            ?>
                                            <li><a class="Next" href="<?php echo $urlNext;?>"><i
                                                        class="ion-ios-arrow-right"></i></a></li>
                                            
                                            <li><a class="Next"  href="<?php echo base_url().'category/'.$uriSegments[3].'?page='.$page_count;?>">>>|</a></li>
                                            
                                                <!-- <li class="active"><a href="<?php echo base_url().'category/'.$uriSegments[3].'';?>">1</a></li>
                                                <li><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a class="Next" href="javascript:void(0)"><i
                                                        class="ion-ios-arrow-right"></i></a></li>
                                                <li><a class="Next" href="javascript:void(0)">>|</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="product-select-box">
                                                <div class="product-short">
                                                    <p><?php $total = $total_item;
                                                    if($page==1){
                                                        $from=1;
                                                        $to=count($content_data[0]);
                                                    }else{
                                                        $from=(20*($page-1))+1;
                                                        $to=$from+count($content_data[0])-1;
                                                    }
                                                    
                                                    
                                                    ?>Showing <?php echo $from;?> to <?php echo $to;?> of <?php echo $total;?> (<?php echo ceil($total/20);?> Pages)</p>
                                            <?php } ?>   
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

<script>
    function add_wishlist(auction_id,status){
               var status = $('#wishlist_'+auction_id).val();
               console.log(auction_id);
                
                //$("#add_wishlist").attr("class", "ion-android-favorite");


                $.ajax({

                        type: "POST",  
                        url: "<?php echo base_url();?>/auction/add_wishlist",
                        data: {
					    'auction_id':auction_id, 'status':status
				        },   
                        success: function (html) {
                           // console.log(html);
                            
                            if(html==0){
                               // console.log('Deleted')
                                $("#add_wishlist_"+auction_id).attr("class", "ion-android-favorite-outline");
                                $('#wishlist_'+auction_id).val('1');
                                //$('#anchor_wishlist').attr("title",'Hello2')
                                $('#title').attr("title",'Hello2')
                            }else{
                                //console.log('Added')
                                $("#add_wishlist_"+auction_id).attr("class", "ion-android-favorite");
                                $('#wishlist_'+auction_id).val('0');
                               //$('#anchor_wishlist').attr("title",'Hello1')
                               $('#title').attr("title",'Hello1')
                            }
                            
                            //location.reload();
                        }
                });  

              
            }
</script>