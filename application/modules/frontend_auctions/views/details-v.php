

		<!-- Begin Hiraola's Page Area -->

        <style>
    .ion-android-favorite{
        color:red;
    }
</style>

<?php
$i=0;
$wData=array(1,2);
if($wishlist_data && count($wishlist_data)>1){
foreach($wishlist_data as $data){ 
//$wdata[$i]=$data['auction_id'];
array_push($wData,$data['auction_id']);
$i++;
}
}
//print_r($wdata);
?>

		<div class="sp-area ">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="sp-img_area">
                                <div class="zoompro-border">
                                    <img class="zoompro" src="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$content_data[0]['auction_icon_img'];?>" data-zoom-image="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$content_data[0]['auction_icon_img'];?>" alt="<?php echo $content_data[0]['auction_name'];?>" />
                                </div>
                                <div id="gallery" class="sp-img_slider">
									<?php 
										$imgs = explode(',',$content_data[0]['auction_img']);
										for($im=0;$im<count($imgs);$im++){
									?>
                                    <a class="active" data-image="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$imgs[$im];?>" data-zoom-image="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$imgs[$im];?>">
                                        <img src="<?php echo base_url().'auction_assets/'.$content_data[0]['auction_id'].'/'.$imgs[$im];?>" alt="<?php echo $content_data[0]['auction_name'];?>">
                                    </a>

                                    <?php
										}
									?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content about-us-area pt-0">
                                <div class="sp-heading overview-content">
                                    <h2><?php echo $content_data[0]['auction_name'];?></h2>
                                </div>
                                
                                <div class="rating-box">
                                    <!--ul>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li><i class="fa fa-star-of-david"></i></li>
                                        <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                    </ul-->
									Auction Credit Type: <?php echo ($content_data[0]['auction_type']==1)?'Paid':'Free';?> Credits
                                </div>
                                <div class="sp-essential_stuff" id="product_desc">

                                    <?php $this->load->view('product_desc');?>
									
                                </div>
								<?php if(isset($_SESSION['user_id'])){?>
								<h5 class="pt-4">Your account has: <span id="dpaidcredits"><?php echo $content_user[0]['paid_credit'];?></span> Paid and <span id="dfreecredits"><?php echo $content_user[0]['free_credit'];?></span> Free Credits</h5>
								<?php } ?>

								<?php
									$autionstime=$content_data[0]['auction_sdate'].' '.$content_data[0]['auction_stime'];

									$autionetime=$content_data[0]['auction_edate'].' '.$content_data[0]['auction_etime'];
									
									//echo strtotime($autionstime).'==start==<br>'.strtotime($autionetime).'==end==<br/>'.time();

									if((strtotime($autionetime) <= time())){
									
								?>
								<h4 class="pt-4">Auction Closed</h4>
								<?php
									}else if((strtotime($autionstime) <= time())){


								?>
								<h4 class="pt-4">Auction End Time</h4>
								<div class="hiraola-countdown"></div>
								<?php }else{ ?>
								<h4 class="pt-4">Auction Start Time</h4>
								<div class="hiraola-countdown"></div>
								<?php } ?>
                                

                                <div class="qty-btn_area pt-0">

									<?php if(!isset($_SESSION['user_id'])){?>
									
										<div class="coupon-all">
											<div class="coupon">
												<a class="button hiraola-btn_dark" type="button"  href="<?php echo base_url();?>account/login.html"><span>Login Now</span></a>
											</div>
										</div>
											<br><br>
									<?php }else if(strtotime($autionstime) <= time() && (strtotime($autionetime) >= time())){ ?>

									<form class="form-group" id="bid_form" name="bid_form" method="POST">
										<div class="coupon-all">
											<div class="coupon">
												<strong><?php echo $this->frontend_templates->convert_currency_price('currency_code', ''); ?></strong> <input id="bid_price" class="input-text" name="bid_price" value="" placeholder="1.65" type="text">&nbsp;&nbsp;

												<input id="auction_id" class="input-text" name="auction_id" value="<?php echo $content_data[0]['auction_id'];?>" type="hidden">

												<input id="auction_name" class="input-text" name="auction_name" value="<?php echo $content_data[0]['auction_name'];?>" type="hidden">

												<input id="allowed_bid" class="input-text" name="allowed_bid" value="<?php echo $content_data[0]['auction_price'];?>" type="hidden">

												<input id="free_credit" class="input-text" name="free_credit" value="<?php echo $content_user[0]['free_credit'];?>" type="hidden">
												<input id="paid_credit" class="input-text" name="paid_credit" value="<?php echo $content_user[0]['paid_credit'];?>" type="hidden">
												<input id="auction_type" class="input-text" name="auction_type" value="<?php echo $content_data[0]['auction_type'];?>" type="hidden">
												<input id="auction_credits" class="input-text" name="auction_credits" value="<?php echo $content_data[0]['auction_credits'];?>" type="hidden">

												<input id="auction_format" class="input-text" name="auction_format" value="<?php echo $sitesetting[0]['auction_type']?>" type="hidden">

												<!--input class="button" name="submit_bid" id="submit_bid" value="Bid Now" type="button"-->
												<button class="button hiraola-btn_dark" type="submit" id="submit_bid" name="submit_bid" style="float:right"><span>Bid Now</span></button>
											</div>
										</div>
									</form>
									
									<ul>
                                    <?php if(isset($_SESSION['user_id'])){$tmpusername = $_SESSION['user_id'];} $auction_id = $content_data[0]['auction_id']?>

                                        <!-- <li class="pl-3"><a class="qty-wishlist_btn" href="javascript:void(0)" data-toggle="tooltip" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','<?php echo $tmpusername;?>')" class="ion-android-favorite-outline" id="add_wishlist"></i></a></li> -->

                                        <?php if(in_array($auction_id,$wData)){?>
                                                    
                                                        <li class="pl-3">
                                                                <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','0')" class="ion-android-favorite" id="add_wishlist"></i></a>
                                                                <input type="hidden" id="wishlist" value="0">
                                                        </li>
                                                    <?php } else{?>
                                                        <li class="pl-3">
                                                        <a id="anchor_wishlist" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i onclick="add_wishlist('<?php echo $auction_id;?>','1')" class="ion-android-favorite-outline" id="add_wishlist"></i></a>
                                                        <input type="hidden" id="wishlist" value="1">
                                                    </li>
 
                                                        <?php }?>

                                    </ul>
									
                                </div>
										<br>
										<div class="alert alert-block" id="success" style="display:none; mt-4;">
											<span id="msg"><strong>Well done!</strong> Records are updated successfully!</span>
										</div>

									<?php } ?>
									
								
                                <div class="hiraola-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url().'product/'.$this->common->strreplace($content_data[0]['auction_name']).'/'.$content_data[0]['auction_id'];?>.html" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        
                                        <li class="instagram">
                                            <a href="https://www.instagram.com/?url=<?php echo base_url().'product/'.$this->common->strreplace($content_data[0]['auction_name']).'/'.$content_data[0]['auction_id'];?>.html" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Page Area  End Here -->

		        <!-- Begin Hiraola's Single Product Tab Area -->
        <div class="hiraola-product-tab_area-2 sp-product-tab_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
					



                        <div class="sp-product-tab_nav ">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                    </li>
                                    <li><a data-toggle="tab" href="#terms"><span>Terms</span></a></li>
									<li><a data-toggle="tab" href="#bidpattern"><span>Bid Pattern Chart</span></a></li>
									<li><a data-toggle="tab" href="#leaderboard"><span>Leaderboard</span></a></li>
                                    <!---li><a data-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li-->
                                </ul>
                            </div>
                            <div class="tab-content hiraola-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">

                                        <?php echo $content_data[0]['auction_desc']?>

                                    </div>
                                </div>
                                <div id="terms" class="tab-pane" role="tabpanel">
                                    <?php echo $content_data[0]['auction_terms']?>
                                </div>
                                <div id="bidpattern" class="tab-pane" role="tabpanel">

								
									<div id="chartdiv" style="width: 100%; height: 400px;"></div>


                                </div>
                                <div id="leaderboard" class="tab-pane" role="tabpanel">
                                    <?php echo $content_data[0]['auction_terms']?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Tab Area End Here -->

		 <?php
			$this->load->view('related-v');
		?>
		

		<?php

				$randvalue=number_format($this->common->frand(.01, .07, 3), 2, '.', '');
				$randvalueplus=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				$randvalueneg=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				
				for($i=0;$i<count($content_bids);$i++){

					//$bids[]=$content_bids[$i]['bid_price'];
				//	$counts[]=$content_bids[$i]['total'];

					if($content_bids[$i]['bid_status']==0){
						$msg='Lowest Unique Bid';
					}else if($content_bids[$i]['bid_status']==1){
						$msg='Unique Bid';
					}else if($content_bids[$i]['bid_status']==2){
						$msg='Duplicate Bid';
					} 

					$dataprovider[] = '{"Bid": "'.($content_bids[$i]['bid_price']+$randvalue).'","Between":"$'.($content_bids[$i]['bid_price']-$randvalueneg).' - $'.($content_bids[$i]['bid_price']+$randvalueplus).'","message": "'.$msg.'","value":'.$content_bids[$i]['total'].'}';
				}
				
				

				$datagraph = (count($content_bids)>0)?implode(',',$dataprovider):'';
                var_dump($dataprovider);
		?>
		<script src="<?php echo base_url();?>assets/frontendfiles/amcharts/amcharts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/frontendfiles/amcharts/serial.js" type="text/javascript"></script>
		
        <?php //echo $dataprovider; ?>
        <script src="<?php echo base_url();?>assets/frontendfiles/linecharts/core.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/frontendfiles/linecharts/themes/material.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/frontendfiles/linecharts/charts.js" type="text/javascript"></script>
       

       <!-- different chart -->
       <!-- <script src="//cdn.amcharts.com/lib/5/index.js"></script>
        <script src="//cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="//cdn.amcharts.com/lib/5/themes/Animated.js"></script>
          -->
        <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
        </style>
		<script>
            function add_wishlist(auction_id,status){
               var status = $('#wishlist').val();
              $.ajax({

                        type: "POST",  
                        url: "<?php echo base_url();?>/auction/add_wishlist",
                        data: {
					    'auction_id':auction_id, 'status':status
				        },   
                        success: function (html) {
                            console.log(html);
                            
                            if(html==0){
                                console.log('Deleted')
                                $("#add_wishlist").attr("class", "ion-android-favorite-outline");
                                $('#wishlist').val('1');
                                //$('#anchor_wishlist').attr("title",'Hello2')
                            }else{
                                console.log('Added')
                                $("#add_wishlist").attr("class", "ion-android-favorite");
                                $('#wishlist').val('0');
                               // $('#anchor_wishlist').attr("title",'Hello1')
                            }

                        }
                });  

              
            }
        

        // Create root element 
        // var root = am5.Root.new("chartdiv");

        // // Set themes 
        // root.setThemes([
        //     am5themes_Animated.new(root)
        // ]); 

        // // Create chart 
        // var chart = root.container.children.push(am5xy.XYChart.new(root, {
        //     panX: false,
        //     panY: false,
        //     wheelY: "zoomXY"
        // })); 

        // Create axes 
        // var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
        //     baseInterval: { timeUnit: "day", count: 1 },
        //     renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 5 }),
        //     tooltip: am5.Tooltip.new(root, {})
        // }));
        // var xAxis = chart.yAxes.push(
        //     am5xy.CategoryAxis.new(root, {
        //         categoryField: "bid",
        //         renderer: am5xy.AxisRendererX.new(root, {}),
        //         tooltip: am5.Tooltip.new(root, {})
        //     })
        // );

        // var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        //     renderer: am5xy.AxisRendererY.new(root, {}),
        //     tooltip: am5.Tooltip.new(root, {}),
        //     min: 1,
        //     max: 10,
        //     strictMinMax: true, 
        //     text: "Random Bid Value",         
        // }));  
        
        // // Create second series 
        // var series1 = chart.series.push(am5xy.LineSeries.new(root, {
        // calculateAggregates: true,
        //     xAxis: xAxis,
        //     yAxis: yAxis,
        //     valueYField: "by",
        //     // categoryXField: "bid",
        //     valueXField: "bid",
        //     valueField: "bValue",
        // }));

        // var tooltip1 = series1.set("tooltip", am5.Tooltip.new(root, {}));
        // tooltip1.label.set("text", "helo, y: {valueY}, value: {value}")

      
        // series1.bullets.push(function () {
        //     return am5.Bullet.new(root, {
        //         locationY: 1,
        //         locationX: 0.5,
        //         sprite: am5.Circle.new(root, {
        //         radius: 4,
        //         fill: series1.get("fill")
        //         })
        //     });
        // });
        
        // series1.strokes.template.set("strokeOpacity", 0);  
        //     series1.data.processor = am5.DataProcessor.new(root, {
        //         CategoryAxis:["bid"]
        //     // dateFields: ["date"], dateFormat: "yyyy-MM-dd"
        // });

        // // Add cursor 
        // chart.set("cursor", am5xy.XYCursor.new(root, {
        //     xAxis: xAxis,
        //     yAxis: yAxis,
        //     behavior:"zoomXY",
        //     snapToSeries: [ series1]
        // }));

      

        // // var data1 =  <?php //echo $datagraph; ?> ;
        // var data = [{
        //     "bid":"10",
        //     // "date": "2015-01-01",
        //     "ay": 6.5,
        //     "by": 2.2,
        //     "aValue": 15,
        //     "bValue": 10
        //     }, {
        //     "bid":"11",
        //     // "date": "2015-01-02",
        //     "ay": 12.3,
        //     "by": 4.9,
        //     "aValue": 8,
        //     "bValue": 3
        //     }, {
        //     "bid":"12",
        //     // "date": "2015-01-03",
        //     "ay": 12.3,
        //     "by": 5.1,
        //     "aValue": 16,
        //     "bValue": 4
        //     }, {
        //     "bid":"13",
        //    // "date": "2015-01-04",
        //     "ay": 2.8,
        //     "by": 13.3,
        //     "aValue": 9,
        //     "bValue": 13
        //     }, {
        //     "bid":"14",
        //     // "date": "2015-01-05",
        //     "ay": 3.5,
        //     "by": 6.1,
        //     "aValue": 5,
        //     "bValue": 2
        //     }, {
        //     "bid":"15",
        //     // "date": "2015-01-06",
        //     "ay": 5.1,
        //     "by": 8.3,
        //     "aValue": 10,
        //     "bValue": 17
        //     },    
        // ]

    
        // series1.data.setAll(data); 
        // series1.appear(1000); 
        // chart.appear(1000, 100);

         // Add scrollbars
        // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
        // chart.set("scrollbarX", am5.Scrollbar.new(root, {
        // orientation: "horizontal"
        // }));

        // chart.set("scrollbarY", am5.Scrollbar.new(root, {
        // orientation: "vertical"
        // }));
            AmCharts.makeChart("chartdiv", {
                type: "serial",
                dataProvider: [
					<?php echo $datagraph;?>
				],
                //dataDateFormat: "YYYY-MM-DD",
                categoryField: "Bid",
                categoryAxis: {
                    //parseDates: true,
                    //minPeriod: "DD",
                    gridAlpha: 0.1,
                    minorGridAlpha: 0.1,
                    axisAlpha: 0,
                    //minorGridEnabled: true,
                    inside: false,
					title: "Random Bid Value"
                },
                valueAxes: [{
                    tickLength: 0,
                    axisAlpha: 0,
                    showFirstLabel: true,
                    showLastLabel: true,
					title: "Total Bids",
                    guides: [{
                        value: 10,
                        toValue: 20,
                        fillColor: "#00CC00",
                        inside: true,
                        fillAlpha: 0.2,
                        lineAlpha: 0
                    }]
                }],
                graphs: [{
                    lineColor: "#D8E63C",
                    valueField: "value",
                    dashLength: 3,
                    bullet: "round",
					customBullet: "https://www.thestockmarket.guru/img/star.png",
					bulletSize: 14,
					customBulletField: "customBullet",
                    balloonText: "Current Bid Value Between:<br> [[Between]],<br><b><span style='font-size:14px;'>Total Bids: [[value]]</span></b><br>[[message]]"
                }],
                //chartCursor: {},
                chartScrollbar: {},
                mouseWheelZoomEnabled:true,
            });
        </script>