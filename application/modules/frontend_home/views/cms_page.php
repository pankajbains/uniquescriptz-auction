
		<!-- Begin Hiraola's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><?php echo ucwords($content_data[0]['cms_page_name']);?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Hiraola's Breadcrumb Area End Here -->
        <!-- Begin Hiraola's About Us Area -->
        <div class="about-us-area pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 d-flex align-items-center">
                        <div class="overview-content">
                           <?php 
                            // echo $content_data[0]['cms_page_html'];
                            echo $content_data[0]['cms_page_heading1']
                            ?>
							<?php echo $content_data[0]['cms_page_heading2']?>
							<?php echo $content_data[0]['cms_page_heading3']?>
                            <p class="short_desc"><br><br><?php echo $content_data[0]['cms_page_paragraph1']?><br/></p>
                            <?php
								for($i=2;$i<=7;$i++){
								
									if($content_data[0]['cms_page_paragraph'.$i]!=''){
										echo $content_data[0]['cms_page_paragraph'.$i]."<br/><br/><br/>";
									}
								}
							?>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
	
        <!-- Hiraola's About Us Area End Here -->

