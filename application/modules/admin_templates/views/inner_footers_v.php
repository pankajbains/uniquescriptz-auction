
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/backendfiles/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets/backendfiles/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url();?>assets/backendfiles/js/excanvas.min.js"></script>
		<![endif]-->

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/backendfiles/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/ace.min.js"></script>

	
		<script src="<?php echo base_url();?>assets/backendfiles/js/addedit.js.php"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/<?php echo $this->router->fetch_class();?>.js.php"></script>


		<?php 
			if($this->router->fetch_class()=="admin_coupons"){
		?>

		<script src="<?php echo base_url();?>assets/backendfiles/js/date-time/bootstrap-datepicker.min.js"></script>
		<script>
				$(function(){
						$('.date-picker').datepicker().next().on(ace.click_event, function(){
							$(this).prev().focus();
						});


					});
		</script>

		<?php
			}
		?>

		<?php
				if($this->router->fetch_class()=="admin_auctions"){


					if($this->router->fetch_method()=="add_auctions"){
		?>
		
		
		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/markdown/markdown.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/markdown/bootstrap-markdown.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery.hotkeys.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/bootbox.min.js"></script>

		<script src="<?php echo base_url();?>assets/backendfiles/js/fuelux/fuelux.spinner.min.js"></script>

		<script src="<?php echo base_url();?>assets/backendfiles/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/date-time/bootstrap-timepicker.min.js"></script>

		<!-- script src="<?php echo base_url();?>assets/backendfiles/js/<?php echo $this->router->fetch_class();?>.js.php" ></script-->


		<?php 
		if(isset($auction_items[0]['extend_auction'])){
		$dayvalue = $auction_items[0]['extend_auction'];
		}else{
		$dayvalue = 0;
		}
		?>
		<script type="text/javascript">
			$(function(){
				$('#extend_auction').ace_spinner({value:<?php echo $dayvalue;?>,min:0,max:30,step:1, icon_up:'icon-plus', icon_down:'icon-minus', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
	
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				$('#auction_stime, #auction_etime').timepicker({					
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
				});


			});

			</script>
					<script type="text/javascript">
					// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
					// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
					// This notice must stay intact for use.

					//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
					//Default is that SSI method is uncommented, and PHP is commented:

					//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
					var currenttime = '<?php print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

					///////////Stop editting here/////////////////////////////////

					var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
					var serverdate=new Date(currenttime)

					function padlength(what){
					var output=(what.toString().length==1)? "0"+what : what
					return output
					}

					function displaytime(){
					serverdate.setSeconds(serverdate.getSeconds()+1)
					var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
					var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
					document.getElementById("servertime").innerHTML=datestring+" "+timestring
					}

					setInterval("displaytime()", 1000);

					</script>

		<?php
					}else{
		?>
				
					
		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript">

			$(function() {

				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}

				
			})

		</script>



		<?php

					}
	
				}
		?>

		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/backendfiles/js/jquery.dataTables.bootstrap.js"></script>
		

		<script type="text/javascript">

			$(function() {

				var oTable1 = $('#sample-table-1').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null,
				  { "bSortable": false }
				] } );

				var oTable1 = $('#sample-table-3').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null,null,null,null,null,
				  { "bSortable": false }
				] } );
				
				var oTable2 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null,null,null,
				  { "bSortable": false }
				] } );

				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}

				
			})

		</script>

	</body>
</html>
