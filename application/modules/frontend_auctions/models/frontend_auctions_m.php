<?php

class frontend_auctions_m extends CI_Model {

        public function __construct()
        {
			parent::__construct();
			$this->load->database();

        }


		public function get_page($data){

			$this->db->select('*');
			$this->db->from('cms_pages');

			$wharray = array('cms_page_url' => $data, 'active' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}

		public function get_items($data,$page){

			$this->db->select('category_id');
			$wharray = array('category_slug' => $data, 'status' => '1');
			$this->db->order_by("id", "asc");
			$query = $this->db->get_where('manage_categories', $wharray); 
			$limit=20;
			$start=20*($page-1);
			$this->db->limit($limit,$start);
			$category = $query->result_array($query);

			for($i=0;$i<count($category);$i++){
				$items[] = $this->get_products($category[$i]['category_id']);
			}

			return $items;

		}

		public function get_item_count($data){

			$this->db->select('*');
			//$this->db->from('manage_categories');
			$wharray = array('category_slug' => $data, 'status' => '1');
			$query = $this->db->get_where('manage_categories', $wharray); 
			//$query=$this->db->get();
			$category = $query->result_array($query);
			//print_r($category); die;
			for($i=0;$i<count($category);$i++){
				$items[] = $this->get_products($category[$i]['category_id']);
			}
			return $items;

		}


		public function get_wishlist($user_id){

			$this->db->select('auction_id');
			$wharray = array('user_id' => $user_id);
			$query = $this->db->get_where('auction_wishlist', $wharray);
			if(!empty($query)){
			$result = $query->result_array($query);
			return $result;
			}else{
				return array();
			}

		}

		
		public function get_wishlist_ip($user_ip){

			$this->db->select('auction_id');
			$wharray = array('ip_address' => $user_ip);
			$query = $this->db->get_where('auction_wishlist', $wharray);
			$result = $query->result_array($query);

			

			return $result;

		}

		public function get_products($data){
			
			$this->db->select('auction_items.auction_id, auction_media.auction_icon_img, auction_items.auction_name');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');

			$wharray = array('auction_category'=>$data, 'auction_closed' => '0', 'auction_open' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

		public function get_details($data){
			
			$this->db->select('*');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');

			$wharray = array('auction_items.auction_id'=>$data, 'auction_closed' => '0', 'auction_open' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

		public function get_bids_uniquedetails($data)
		{
			// find unique bids
			$this->db->select('*');
			$this->db->from('auction_bids');
			$wharray = array('auction_id' => $data);
			$this->db->where($wharray);
			$query = $this->db->get();
			
			$auction_count = $query->num_rows();
			$auction_totalcount = $query->num_rows();
			$auction_result = $query->result_array();
		  
			if($auction_totalcount >0) {
				if($auction_count > 0) {

					foreach($auction_result as $auctionresult) 
					{
						$auctionrow[] = $auctionresult['bid_price'];
					}

				} 


			// --- Check and create array for auciton bids unique and duplicate ----------/
				$auctionbidcount = array_count_values($auctionrow);

				for($i=0; $i<count($auctionbidcount); $i++){

					if($auctionbidcount[$auctionrow[$i]] == 1){
						$single_bids[] = $auctionrow[$i];  // auction duplicate bids array
					}else{
						$duplicate_bids[] = $auctionrow[$i];   // Auction unique bids 
					}
					
				}
				

			// get  min and max bid from auciton bids 
				$this->db->select('auction_type');
				$this->db->from('admin_config_app');
				$this->db->where('config_type', 'site_settings'); 
				$q = $this->db->get();  
				$auction_type = $q->result_array(); 
				$unique = ($auction_type[0]['auction_type'] == 'lowest')?min($single_bids):max($single_bids);

				return $unique;
			}
		}


		public function get_auctiondetails($data){
			
			$this->db->select('auction_items.auction_id,auction_items.auction_closed,auction_items.auction_open,auction_items.auction_bid,auction_items.auction_credits,auction_features.scurrent_bids,auction_items.auction_type,auction_items.auction_price');
			$this->db->from('auction_items');
			$this->db->join('auction_features', 'auction_items.auction_id = auction_features.auction_id');
			$wherearray = array('auction_items.auction_id'=>$data, 'auction_closed' => '0', 'auction_open' => '1');
			$this->db->where($wherearray);
			$queries = $this->db->get();

			$details = $queries->result_array($queries);
			
			// find unique bids
			$this->db->select('*');
			$this->db->from('auction_bids');
			$wharray = array('auction_id' => $data);
			$this->db->where($wharray);
			$query = $this->db->get();
			
			$auction_count = $query->num_rows();
			$auction_result = $query->result_array();
			
			if($auction_count > 0) {

			  foreach($auction_result as $auctionresult) 
			  {
				 $auctionrow[] = $auctionresult['bid_price'];
			  }

			} 


			// // --- Check and create array for auciton bids unique and duplicate ----------/
			$auctionbidcount = array_count_values($auctionrow);

			for($i=0; $i<count($auctionbidcount); $i++){

				if($auctionbidcount[$auctionrow[$i]] == 1){
					$single_bids[] = $auctionrow[$i];  // auction duplicate bids array
				}else{
					$duplicate_bids[] = $auctionrow[$i];   // Auction unique bids 
				}
				
			}
			

			// get  min and max bid from auciton bids 
			$this->db->select('auction_type');
			$this->db->from('admin_config_app');
			$this->db->where('config_type', 'site_settings'); 
			$q = $this->db->get();  
			$auction_type = $q->result_array(); 
			$unique = ($auction_type[0]['auction_type'] == 'lowest')?min($single_bids):max($single_bids);


			foreach($details as $dt) {
				$dt['unique'] = $unique;
			 
			}
			return $dt; 
			 
		 
		}

		public function get_features($data){
			
			$this->db->select('*');
			$this->db->from('auction_features');

			$wharray = array('auction_id'=>$data);
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}


		public function get_users($data){
			
			$this->db->select('paid_credit, free_credit');
			$this->db->from('user_credits');
			$wharray = array('user_id'=>$data);
			$this->db->where($wharray);
			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

		public function get_winners($data){
			
			$this->db->select('*');
			$this->db->from('auction_won');
			$this->db->join('auction_items', 'auction_items.auction_id = auction_won.auction_id');
			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

		public function getuser($user){
			
			$this->db->select('first_name, last_name');
			$this->db->from('user_register');
			$wharray = array('user_id' => $user);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query()); 

			return $query->result_array();

		}	

		public function bidchart($auction){

				$this->db->select('auction_bids.bid_price, count(*) as total, auction_bids.bid_status');
				$this->db->from('auction_bids');
				$wharray = array('auction_bids.auction_id'=>$auction);

				$this->db->where($wharray);
				$this->db->group_by('bid_price');
				$this->db->order_by('auction_bids.bid_price', 'ASC');
				$query = $this->db->get();
				//echo $this->db->last_query(); 

				return $query->result_array();

		}

		public function latestbids($auction, $user){
			
			$this->db->distinct();
			$this->db->select('auction_bids.bid_price, auction_bids.bid_status, auction_bids.user_id, auction_items.auction_name, user_register.user_name, user_register.first_name,user_register.last_name');
			$this->db->from('auction_bids');
			$this->db->join('auction_items', 'auction_items.auction_id = auction_bids.auction_id');
			$this->db->join('user_register', 'auction_bids.user_id = user_register.user_id');

			if($user!=0){
				$wharray = array('auction_bids.auction_id'=>$auction, 'user_id' => $user, 'bid_status !='=>'2');
			}else{
				$wharray = array('auction_bids.auction_id'=>$auction, 'bid_status !='=>'2');
			}
			$this->db->where($wharray);
			$this->db->order_by('bid_status', 'ASC');

			$query = $this->db->get();
			//print_r($this->db->last_query()); 

			return $query->result_array();

		}

		public function related($category){
			
			$this->db->select('*');
			$this->db->from('manage_categories');
			$wharray = array('category_id' => $category, 'status' => 1);
			$this->db->where($wharray);
			$query = $this->db->get();
			$categories = $query->num_rows();
			$categories_details = $query->result_array();
			
			if($categories_details[0]['category_parent']!=NULL){
				$wharray = array('category_parent' => $categories_details[0]['category_parent'], 'status' => 1);
			}else{
				$wharray = array('category_id' => $categories_details[0]['category_id'], 'status' => 1);
			}

				$this->db->select('category_id');
				$this->db->from('manage_categories');
				$this->db->where($wharray);
				$query = $this->db->get();
				//$categories = $query->num_rows();
				$categories_all = $query->result_array();
				//var_dump($this->db->last_query()); 
				//var_dump($categories_all);
				
				foreach($categories_all as $catid){
					$cat_id[]="'".$catid['category_id']."'";
				}
				if(!empty($cat_id)){
					$whereitem = array('auction_items.auction_category IN ('.implode(',',$cat_id).')', 'auction_closed' => '0', 'auction_open' => '1');
				}
				

				$this->db->select('*');
				$this->db->from('auction_items');

				$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');

				//$this->db->where($whereitem);
				$this->db->limit(4, 0);
				$this->db->order_by('rand()');
				$query = $this->db->get();
				//var_dump($this->db->last_query()); 
				$categories = $query->num_rows();
				if($categories!=0){
					$products = $query->result_array();
				}else{
					$products = 0;
				}
				
				return $products;


			
		}


/* load from common
		public function strreplace($data){

			$string = str_replace(' ', '-', $data);
			$res = preg_replace("/[^a-zA-Z\-]/", "", $string);
			return $res;

		}
--*/


		public function post_now($data, $settings){


			$this->db->select('*');
			$this->db->from('auction_items');
			$wharray = array('auction_id' => $_POST['auction_id'], 'auction_open' => 1, 'auction_closed' => 0, 'auction_winner' => 0, 'auction_sdate <=' => date("Y-m-d"));
			$this->db->where($wharray);
			$query = $this->db->get();
			//$auction_detail_count = $query->num_rows();
			$auction_details = $query->result_array();
			$this->db->select('paid_credit,free_credit');
			$this->db->from('user_credits');
			$wharray = array('user_id' => $_SESSION['user_id']);
			$this->db->where($wharray);
			$query = $this->db->get();
			$user_detail_count = $query->num_rows();
			$user_details = $query->result_array();

			$autionstime=$auction_details[0]['auction_sdate'].' '.$auction_details[0]['auction_stime'];
			//echo strtotime($autionstime).'------'.time();
			if(strtotime($autionstime) > time()){
				$error_msg = "Auction is not open yet. Please bid again later.";
				return $error_msg.'-error';
			}

			if(($auction_details[0]['auction_type']==1)&($user_details[0]['paid_credit']<$auction_details[0]['auction_credits'])){
				$error_msg = "You don't have enough paid credits to place bid on auction";
				return $error_msg.'-error';
			}

			if(($auction_details[0]['auction_type']==0)&($user_details[0]['free_credit']<$auction_details[0]['auction_credits'])){
				$error_msg = "You don't have enough free credits to place bid on auction";
				return $error_msg.'-error';
			}

			if(($_POST['bid_price']<$auction_details[0]['auction_price']) || ($_POST['bid_price']=="")||($_POST['bid_price']==0)){
				$error_msg = "Bid price is not valid.";
				return $error_msg.'-error';
			}

			$this->db->select('*');
			$this->db->from('auction_bids');
			$wharray = array('auction_id' => $_POST['auction_id'], 'user_id' => $_SESSION['user_id']);
			$this->db->where($wharray);
			$query = $this->db->get();
			$user_auction_count = $query->num_rows();
			$user_auction_details = $query->result_array();
			
			if($user_auction_count > 0) {

			  foreach($user_auction_details as $userrow) 
			  {
				 $userbids[] = $userrow['bid_price'];
			  }

			  if(in_array($_POST['bid_price'], $userbids)){
				 $error_msg = "You have already placed bid for amount ".$_POST['bid_price'];
				 return $error_msg.'-error';
			  }


			} 

			if(($user_auction_count>$auction_details[0]['auction_user_bid']) && ($auction_details[0]['auction_user_bid']!=0)){
				$error_msg = "You have placed max bids allowed per users.";
				return $error_msg.'-error';
			}


			
			// ---------------------- Prepare to Insert Bid on Database ------------------------//
			$this->db->select('*');
					$this->db->from('auction_bids');
					$wharray = array('bid_price' => $_POST['bid_price'], 'auction_id' => $_POST['auction_id']);
					$this->db->where($wharray);
					$query = $this->db->get();
					//print_r($this->db->last_query());
					$auction_count = $query->num_rows();
					$auction_result = $query->result_array();
					//print_r($auction_result);
					if(count($auction_result)>0){
							// data already available
							//echo "duplicate bid";
							$userbid = array(
								'user_id' => $_SESSION['user_id'],
								'auction_id' => $_POST['auction_id'],
								'bid_price' => $_POST['bid_price'],
								'bid_credit' => $auction_details[0]['auction_credits'],
								'bid_status' => 2
								
								
							);
				
							$insertbid = $this->db->insert('auction_bids', $userbid);
							$bid_id = $this->db->insert_id();
							$userbidstatus = array(
								'bid_status' => 2
							);
							$wharray = array('bid_price' =>  $_POST['bid_price'],'auction_id' => $_POST['auction_id']);
									$this->db->where($wharray);
									$this->db->update('auction_bids', $userbidstatus);

							$mailtype = "successful_not_unique_bid";
									$bidsuccess = "duplicate";

									$this->db->set('auction_bid', 'auction_bid +1', FALSE);
					$this->db->where('auction_id', $_POST['auction_id']);
					$query=$this->db->update('auction_items');
					}
					else{
						//unique bid
						$this->db->select('*');
						$this->db->from('auction_bids');
						$auction_format = $settings['sitesetting']['0']['auction_type'];
						if($auction_format == 'lowest'){

							$wharray = array('bid_price < ' => $_POST['bid_price'], 'auction_id' => $_POST['auction_id']);
						}else{
							$wharray = array('bid_price > ' => $_POST['bid_price'], 'auction_id' => $_POST['auction_id']);
						}
						
						$this->db->where($wharray);
						$query = $this->db->get();
						//print_r($this->db->last_query());
						$auction_count = $query->num_rows();
						$auction_result = $query->result_array();
						//print_r($auction_result);die;
						if(count($auction_result)>0){
							// unique bid
							//echo "uniques bid";
							$userbid = array(
								'user_id' => $_SESSION['user_id'],
								'auction_id' => $_POST['auction_id'],
								'bid_price' => $_POST['bid_price'],
								'bid_credit' => $auction_details[0]['auction_credits'],
								'bid_status' => 1
							);
				
							$insertbid = $this->db->insert('auction_bids', $userbid);
							$bid_id = $this->db->insert_id();
							$mailtype = "successful_unique_bid";
							$bidsuccess = "unique bid";

							$this->db->set('auction_bid', 'auction_bid +1', FALSE);
					$this->db->where('auction_id', $_POST['auction_id']);
					$query=$this->db->update('auction_items');
							
							
						}
						else{
							// min uniques bid
							//echo "min uniques bid";
							$userbid = array(
								'user_id' => $_SESSION['user_id'],
								'auction_id' => $_POST['auction_id'],
								'bid_price' => $_POST['bid_price'],
								'bid_credit' => $auction_details[0]['auction_credits'],
								'bid_status' => 0
							);
							$this->db->select_min('bid_price');
							$this->db->from('auction_bids');
							$query = $this->db->get();
							$min_bid = $query->result_array();
							$userbidstatus = array(
								'bid_status' => 1
							);
							$wharray = array('bid_price>=' =>  $min_bid[0]['bid_price'],'bid_status'=>0,'auction_id' => $_POST['auction_id']);
									$this->db->where($wharray);
									$this->db->update('auction_bids', $userbidstatus);
								//echo "<pre>"; print_r($min_bid);
							//print_r($wharray); die;

				
							$insertbid = $this->db->insert('auction_bids', $userbid);
							$bid_id = $this->db->insert_id();
							$mailtype = "successful_unique_lowest_bid";
							$bidsuccess = "lowest and unique bid";

							$this->db->set('auction_bid', 'auction_bid +1', FALSE);
					$this->db->where('auction_id', $_POST['auction_id']);
					$query=$this->db->update('auction_items');
						}
					}
					/*
					die;
					

			$userbid = array(
				'user_id' => $_SESSION['user_id'],
				'auction_id' => $_POST['auction_id'],
				'bid_price' => $_POST['bid_price'],
				'bid_credit' => $auction_details[0]['auction_credits']
			);

			$insertbid = $this->db->insert('auction_bids', $userbid);
			$bid_id = $this->db->insert_id();
die;

			//print_r($this->db->last_query());

			if(($auction_details[0]['auction_type']==1)){
				$paidcreditused = $user_details[0]['paid_credit'] - $auction_details[0]['auction_credits'];
			}else{
				$paidcreditused = $user_details[0]['paid_credit'];
			}

			if(($auction_details[0]['auction_type']==0)){
				$freecreditused = $user_details[0]['free_credit'] - $auction_details[0]['auction_credits'];
			}else{
				$freecreditused = $user_details[0]['free_credit'];
			}

			// ------------- insert bid success ------------- //
			if($insertbid==1){



					$this->db->set('paid_credit', $paidcreditused);
					$this->db->set('free_credit', $freecreditused);
					$this->db->where('user_id',$_SESSION['user_id']);
					$query=$this->db->update('user_credits');
					//print_r($this->db->last_query());

					$this->db->set('auction_bid', 'auction_bid +1', FALSE);
					$this->db->where('auction_id', $_POST['auction_id']);
					$query=$this->db->update('auction_items');

					$this->db->select('*');
					$this->db->from('auction_bids');
					$wharray = array('auction_id' => $_POST['auction_id'], 'bid_id !=' => $bid_id);
					$this->db->where($wharray);
					$query = $this->db->get();
					//print_r($this->db->last_query());
					$auction_count = $query->num_rows();
					$auction_result = $query->result_array();
					
					if($auction_count > 0) {
					  foreach($auction_result as $auctionresult) 
					  {
						 $auctionrow[] = $auctionresult['bid_price'];
					  }
					} 


					
					// --- Check and create array for auciton bids unique and duplicate ----------/
					$auctionbidcount = array_count_values($auctionrow);

					for($i=0; $i<count($auctionbidcount); $i++){

						if($auctionbidcount[$auctionrow[$i]] == 1){
							$single_bids[] = $auctionrow[$i];  // auction duplicate bids array
						}else{
							$duplicate_bids[] = $auctionrow[$i];   // Auction unique bids 
						}
						
					}
					$bid_status=1;
					if(!empty($single_bids) && in_array($_POST['bid_price'], $single_bids)){

						$bid_status = 2;
					
					}else if(!empty($duplicate_bids) && in_array($_POST['bid_price'], $duplicate_bids)){
						
						$bid_status = 2;

					}

					// get  min and max bid from auciton bids 
					$auction_format = $settings['sitesetting']['0']['auction_type'];

					$unique = ($auction_format == 'lowest')?min($single_bids):max($single_bids);

					//echo $unique.' - '.$bid_status; die;

					if(($_POST['bid_price']<$unique) && ($bid_status==1) ){
						$mailtype = "successful_unique_lowest_bid";
						$bidsuccess = "lowest and unique bid";
						$bid_status = 1;
						$userbidstatus = array(
							'bid_status' => $bid_status
						);
						$wharray = array('bid_price' => $unique);
						$this->db->where($wharray);
						$this->db->update('auction_bids', $userbidstatus);
						
					}

					if(($_POST['bid_price']==$unique) && ($bid_status==1) ){
						$mailtype = "successful_unique_lowest_bid";
						$bidsuccess = "lowest and unique bid";
						$bid_status = 2;
						$userbidstatus = array(
							'bid_status' => $bid_status
						);
						$wharray = array('bid_price' => $_POST['bid_price']);
						$this->db->where($wharray);
						$this->db->update('auction_bids', $userbidstatus);
						
					}

					if(($_POST['bid_price']!=$unique) && ($bid_status==1) ){
						$mailtype = "successful_unique_bid";
						$bidsuccess = "unique bid";
						$bid_status = 1;
					}

					if($bid_status==2){

						$mailtype = "successful_not_unique_bid";
						$bidsuccess = "duplicate";
						$bid_status = 2;
						$userbidstatus = array(
							'bid_status' => $bid_status
						);
						$wharray = array('bid_price' => $_POST['bid_price']);
						$this->db->where($wharray);
						$this->db->update('auction_bids', $userbidstatus);
						
					}

					$userbidstatus = array(
						'bid_status' => $bid_status
					);

					$wharray = array('bid_id' => $bid_id, 'user_id' => $_SESSION['user_id']);
					$this->db->where($wharray);
					$this->db->update('auction_bids', $userbidstatus);

					// $halfbids = ($auction_count==($auction_details[0]['auction_max_bid']/2))?1:0;
					*/

					return $mailtype.'-success-'.$bidsuccess;


		



		}



		public function close_now(){

			$this->db->select('*');
			$this->db->from('auction_items');
			$wharray = array('auction_open' => 1, 'auction_closed' => 0, 'auction_winner' => 0, 'auction_edate <=' => date("Y-m-d"));
			$this->db->join('auction_features', 'auction_items.auction_id = auction_features.auction_id');
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			 $auction_detail_count = $query->num_rows();
			//$auction_details = $query->result_array();

			if($auction_detail_count>0){

					foreach ($query->result_array() as $auction_details)//while($auction_details = $query->result_array())
					  {
							$autionetime=$auction_details['auction_edate'].' '.$auction_details['auction_etime'];

							if(($auction_details['auction_max_bid']<=$auction_details['auction_bid']) && (strtotime($autionetime) < time()))// 
								{

									$this->db->set('auction_closed', '1');
									$this->db->where('auction_id',$auction_details['auction_id']);
									$this->db->update('auction_items');
									//print_r($this->db->last_query());

								}else if(($auction_details['auction_max_bid']>=$auction_details['auction_bid']) && (strtotime($autionetime) < time())){

									$edate = strtotime($auction_details['auction_edate']. ' + '.$auction_details['extend_auction'].' days');
									$this->db->set('auction_edate', date('Y-m-d', $edate));
									$this->db->where('auction_id',$auction_details['auction_id']);
									$this->db->update('auction_items');
									//print_r($this->db->last_query());

								}

					}
					
					return true;

			}else{

				return false;

			}




		}



		public function select_now(){

			$this->db->select('*');
			$this->db->from('auction_items');
			$wharray = array('auction_open' => 1, 'auction_closed' => 1, 'auction_winner' => 0);
			$this->db->where($wharray);
			$query = $this->db->get();
			// print_r($this->db->last_query());

			$auction_detail_count = $query->num_rows();
			
			if($auction_detail_count>0){


				foreach ($query->result_array() as $auction_details){
				
				
					$this->db->select('*');
					$this->db->from('auction_bids');
					$wharray = array('auction_id' => $auction_details['auction_id']);
					$this->db->where($wharray);
					$query = $this->db->get();
					// print_r($this->db->last_query());
					$auction_count = $query->num_rows();
					$auction_result = $query->result_array();
					
					if($auction_count > 0) {

					  foreach($auction_result as $auctionresult) 
					  {
						 $auctionrow[] = $auctionresult['bid_price'];
					  }

					} 


					// --- Check and create array for auciton bids unique and duplicate ----------/
					$auctionbidcount = array_count_values($auctionrow);

					for($i=0; $i<count($auctionbidcount); $i++){

						if($auctionbidcount[$auctionrow[$i]] == 1){
							$single_bids[] = $auctionrow[$i];  // auction duplicate bids array
						}else{
							$duplicate_bids[] = $auctionrow[$i];   // Auction unique bids 
						}
						
					}
					

					// get  min and max bid from auciton bids 
					$site['config_type']="site_settings";

					$data['sitesetting'] = $this->frontend_templates_m->sitesettings($site);

					$auction_format = $data['sitesetting']['0']['auction_type'];

					$unique = ($auction_format == 'lowest')?min($single_bids):max($single_bids);

					$this->db->select('*');
					$this->db->from('auction_bids');
					$wharray = array('auction_id' => $auction_details['auction_id'], 'bid_price' => $unique);
					$this->db->where($wharray);
					$query = $this->db->get();
					//print_r($this->db->last_query());
					$auction_count = $query->num_rows();
					$auction_result = $query->result_array();

					$winningbid = array(

						'auction_id' => $auction_details['auction_id'],
						'bid_id' =>  $auction_result[0]['bid_id'],
						'user_id' =>  $auction_result[0]['user_id'],
						'bid_price' => $unique,
						'won_date' => date('Y-m-d H:i:s')

					);

					$winningbidinsert = $this->db->insert('auction_won', $winningbid);


					$this->db->set('auction_winner', '1');
					$this->db->where('auction_id',$auction_details['auction_id']);
					$this->db->update('auction_items');


					/* invoice query */
					$auctioninvoice = array( 
						'user_id' => $auction_result[0]['user_id'],
						'auction_id' => $auction_details['auction_id'],
						'auction_name' => $auction_details['auction_name'],
						'invoice_no' => "",
						'invoice_amount' => $unique,
						'invoice_date' => date('Y-m-d H:i:s'),
						'auction_plateform' => $auction_format,
						'status' => "0",
						'delmark' => "0",
					);

					$this->db->insert('auction_invoice', $auctioninvoice);

			
				}


			}else{
				
				return false;

			}




		}




		public function winner_mail_now(){

			$this->db->select('auction_won.*, auction_items.auction_name');
			$this->db->from('auction_won');
			$this->db->join('auction_items', 'auction_items.auction_id = auction_won.auction_id');
			$wharray = array('auction_won.won_status' => 0, 'auction_won.invoicesent' => 0);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());

			$auction_detail_count = $query->num_rows();
			
			if($auction_detail_count>0){


				foreach ($query->result_array() as $auction_wons){

					$this->db->select('*');
					$this->db->from('user_register');
					$wharray = array('user_id' => $auction_wons['user_id']);
					$this->db->where($wharray);
					$query = $this->db->get();
					//print_r($this->db->last_query());
					$user_count = $query->num_rows();
					$user_won_result = $query->result_array();
					

					/*-------- Send Winner Email -----------------*/

					$emailcontent = $this->frontend_templates_m->emaildata('auction_won');
					//var_dump($emailcontent);
					$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
					//var_dump($emailfrom);
					$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
					$text = $emailcontent['content_emails'][0]['user_emails_body'];

					$username=ucwords($user_won_result[0]['first_name'].' '.$user_won_result[0]['last_name']);

					$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";

					$auctionlink="<a href='".base_url()."/product/".str_replace(' ','-',$auction_wons['auction_name'])."/".$auction_wons['auction_id']."'>".$auction_wons['auction_name']."</a>";

					$bidamount=$auction_wons['bid_price'];

					$sitenamenew=$this->config->item('sitename');

					$activeword = array("[[USERNAME]]", "[[SITENAMELINK]]", "[[SITENAME]]", "[[BIDAMOUNT]]", "[[AUCTIONNAMELINK]]");
					$replacedword = array($user_name, $sitelinknew, $sitenamenew, $bidamount, $auctionlink);

					$textnew = str_replace($activeword, $replacedword, $text);
					$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);

					$mailwon = 1;//$this->common->send_email($this->common-encrypt_decrypt('decrypt',$user_won_result[0]['email']),$emailfrom,$sitenamenew,$subject,$textnew);




					/* ----------------- Mail to Auction Not Won ----------------- */

					$this->db->distinct();
					$this->db->select('auction_bids.user_id');
					$this->db->from('auction_bids');
					$wharray = array('user_id !=' => $auction_wons['user_id'], 'auction_id'=>$auction_wons['auction_id']);
					$this->db->where($wharray);
					$query = $this->db->get();
					//print_r($this->db->last_query());
					$user_count = $query->num_rows();

					foreach ($query->result_array() as $user_bid_result){
							
							$this->db->select('first_name,last_name, email');
							$this->db->from('user_register');
							$wharray = array('user_id' => $user_bid_result['user_id']);
							$this->db->where($wharray);
							$query = $this->db->get();
							//print_r($this->db->last_query());
							//$user_count = $query->num_rows();
							$user_lose_result = $query->result_array();
							

							/*-------- Send Lose Bids Email -----------------*/

							$emailcontent = $this->frontend_templates_m->emaildata('auction_lost');
							//var_dump($emailcontent);
							$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
							//var_dump($emailfrom);
							$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
							$text = $emailcontent['content_emails'][0]['user_emails_body'];

							$username=ucwords($user_lose_result[0]['first_name'].' '.$user_lose_result[0]['last_name']);

							$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";

							$auctionlink="<a href='".base_url()."/product/".str_replace(' ','-',$auction_wons['auction_name'])."/".$auction_wons['auction_id']."'>".$auction_wons['auction_name']."</a>";

							$bidamount=$auction_wons['bid_price'];

							$sitenamenew=$this->config->item('sitename');

							$activeword = array("[[USERNAME]]", "[[SITENAMELINK]]", "[[SITENAME]]", "[[BIDAMOUNT]]", "[[AUCTIONNAMELINK]]");
							$replacedword = array($user_name, $sitelinknew, $sitenamenew, $bidamount, $auctionlink);

							$textnew = str_replace($activeword, $replacedword, $text);
							$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);

							$maillose = 1; //$this->common->send_email($this->common-encrypt_decrypt('decrypt', $user_lose_result[0]['email']),$emailfrom,$sitenamenew,$subject,$textnew);


					}
					

					if($mailwon){

						$this->db->set('won_status', '1');
						$this->db->set('invoicesent', '1');
						$this->db->where('auction_id',$auction_wons['auction_id']);
						$this->db->update('auction_won');

					}


			
				}

				return true;

			}else{
				
				return false;

			}




		}



		public function invoice_now()
		{
			$this->db->select('auction_invoice.*, auction_items.auction_name');
			$this->db->from('auction_invoice');
			$this->db->join('auction_items', 'auction_items.auction_id = auction_invoice.auction_id');
			$this->db->join('auction_won', 'auction_won.auction_id = auction_invoice.auction_id');
			$wharray = array('auction_invoice.invoice_no' => "", 'auction_won.invoicesent' => 0);
			$this->db->where($wharray);
			$query = $this->db->get();

			// var_dump($query->result_array());

			
			$auction_invoice_count = $query->num_rows();
			
			if($auction_invoice_count>0){
				


				foreach ($query->result_array() as $auction_invoice){
					

					$this->db->select('*');
					$this->db->from('user_register');
					$wharray = array('user_id' => $auction_invoice['user_id']);
					$this->db->where($wharray);
					$query = $this->db->get();
				 
					$user_count = $query->num_rows();
					$user_invoice_result = $query->result_array();


					/*-------- Send Invoice Email -----------------*/

					$emailcontent = $this->frontend_templates_m->emaildata('auction_invoice');
					 
					$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
				 
					$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
					$text = $emailcontent['content_emails'][0]['user_emails_body'];
					 

					$username=ucwords($user_invoice_result[0]['first_name'].' '.$user_invoice_result[0]['last_name']);

					$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";
					
					// $auctionlink="<a href='".base_url()."/product/".str_replace(' ','-',$auction_invoice['auction_name'])."/".$auction_invoice['auction_id']."'>".$auction_invoice['auction_name']."</a>";

					// $bidamount= $auction_invoice['invoice_amount'];
					$invoice_no = 'UIN'.$auction_invoice['id'].'-'.date('y');
					
					$sitenamenew=$this->config->item('sitename');

					$activeword = array("[[USERNAME]]", "[[SITENAME]]", "[[INVOICENO]]");
					$replacedword = array($username, $sitelinknew,  $invoice_no);

					$textnew = str_replace($activeword, $replacedword, $text);
					$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);

					// $mailwon = 1; 
					$user_details = 'Dear  '.$username.'  </br></br>
					Thank you for your bids in our auction.</br></br>
					We request that you transfer the total amount due to our account at the ___________ bank:
					</br></br>
					* Account number: _____________ </br></br>

					* On behalf of: ___________.</br></br>

					* IBAN:                  </br></br>

					* BIC/SWIFT:           </br></br>

					* Reference number:'.$invoice_no.' </br></br></br></br></br></br>   ';

					$pdf = '
					'.$user_details.' 
					</br></br></br>
						<div class="table-responsive">
						<table class="table table-striped table-bordered" style="width:100%;">
							<thead>
							<tr>
								<th>Auction Name/ID	</th>
								<th>Winner Name</th>
								<th>Email</th>
								<th>Invoice No</th>
								<th>Payment</th>
							</tr>
							</thead>
					';  
					$pdf .= '
					<tbody>   
						<tr>
							<td>'.$auction_invoice['auction_name'].'/'.$auction_invoice['auction_id'].'</td>
							<td>'.$username.'</td>
							<td>'.$this->common->encrypt_decrypt('decrypt',$auction_invoice['email']).'</td>
							<td>'.$invoice_no.'</td>
							<td>'.$auction_invoice["invoice_amount"].'</td>
						</tr>
						</tbody>   '; 
					$pdf .= '
						</table>
					   	</div>
					</br></br></br></br></br>
					'.$user_details2.'  
					';


					$user_details2 = 
					   'Please note that no transfers are made between banks on weekends (Friday from 16.00 hrs).

					   We thank you for the confidence shown in our company.
					   
					   Yours sincerely,
					   Administrator
					   
					   Please do not respond to this email address as it is not monitored. If you have a question, please use the contact us form at '.$sitelinknew.' 
					';
					
					// $this->pdf->loadHtml($pdf);
					// $this->pdf->setPaper('A4','portrait');//landscape 
					// $pdf_name = "invoice".$invoice_no."pdf";
					// $domdpf = $this->pdf->stream($pdf_name, array('Attachment'=>false));  
					$mailinvoice = $this->common->send_email($this->common->encrypt_decrypt('decrypt', $user_invoice_result[0]['email']),$emailfrom,$sitenamenew,$subject,$textnew);
					 
					if($mailinvoice  != false){
 
						$this->db->set('invoicesent', '1');
						$this->db->where('auction_id',$auction_invoice['auction_id']);
						$this->db->update('auction_won');
						
						$this->db->set('invoice_no', $invoice_no);
						$this->db->where('auction_id',$auction_invoice['auction_id']);
						$this->db->update('auction_invoice');
						

					}
				}
				
			

				
				return true;
			} else {
				return false;

			}

			// return $query->result_array();
		}

}