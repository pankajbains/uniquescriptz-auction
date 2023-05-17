
        <!-- Begin Contact Main Page Area -->
        <div class="contact-main-page about-us-area">
            <div class="container">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 align-items-center">
                        <div class="overview-content">
                            <h2><?php echo $content_data[0]['cms_page_html']?></h2>
                        </div>
                    </div>
                    
                </div>

                <div id="google-map">

				<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $sitesetting[0]['site_address'];?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.bitgeeks.net"></a></div><style>.mapouter{position:relative;text-align:right;height:400px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}</style></div>
				
				</div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title"><?php echo $content_data[0]['cms_page_html']?></h3>
                    
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i> Address</h4>
                                <p><?php echo $sitesetting[0]['site_address'];?></p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i> Phone</h4>
                                <p>Mobile: <a href="callto:<?php echo $sitesetting[0]['site_phone'];?>"><?php echo $sitesetting[0]['site_phone'];?></a></p>
                            </div>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                <p>Support: <a href="mailto:<?php echo $emailsetting[0]['email_support'];?>"><?php echo $emailsetting[0]['email_support'];?></a></p>
                                <p>Sales: <a href="mailto:<?php echo $emailsetting[0]['email_sales'];?>"><?php echo $emailsetting[0]['email_sales'];?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                        <div class="contact-form-content">
                            <h3 class="contact-page-title">Tell Us Your Message</h3>
                            <div class="contact-form">
                                <form id="contact-form" action="#" method="post">
                                    <div class="form-group">
                                        <label>Your Name <span class="required">*</span></label>
                                        <input type="text" name="con_name" id="con_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Email <span class="required">*</span></label>
                                        <input type="email" name="con_email" id="con_email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject <span class="required">*</span></label>
                                        <input type="text" name="con_subject" id="con_subject" required>
                                    </div>
                                    <div class="form-group ">
                                        <label>Your Message <span class="required">*</span></label>
                                        <textarea name="con_message" id="con_message" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" id="submit" class="alsita-contact-form_btn" name="submit">send</button>
                                    </div>
									 <div class="form-group" id="success" style="display:none;">
                                        Message Posted Successfully!
                                    </div>
                                </form>
                            </div>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Main Page Area End Here -->
