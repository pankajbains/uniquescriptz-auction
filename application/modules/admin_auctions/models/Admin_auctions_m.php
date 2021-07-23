<?php

class admin_auctions_m extends CI_Model {

        public function __construct()
        {
			parent::__construct();
			$this->load->database();
        }

		public function get_auctions_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$this->db->select('auction_features.featured, auction_items.auct_id, auction_items.auction_id, auction_items.auction_name, auction_items.auction_max_bid, auction_edate, auction_etime, auction_open', false);
						$this->db->from('auction_items');
						$this->db->where('auction_closed', '0');
						$this->db->join('auction_features', 'auction_features.auction_id = auction_items.auction_id');
						$query=$this->db->get();
						return $query->result_array();

				}else{

						$query = $this->db->get_where('auction_items', array('auction_id' => $slug));
						return $query->result_array();

				}

		}

		
		public function get_auctions_closed($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						$this->db->select('auction_items.*,auction_won.bid_price', false);
						$this->db->from('auction_items');
						$this->db->where('auction_closed', '1');
						$this->db->join('auction_won', 'auction_won.auction_id = auction_items.auction_id');
						$query=$this->db->get();


						//$query = $this->db->get_where('auction_items', array('auction_closed' => '1'));
						return $query->result_array();

				}

		}


		public function get_auction_winners($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						$this->db->select('auction_won.auction_id, auction_won.payment, auction_won.won_date, auction_won.bid_price, auction_won.payment, auction_won.delivered, user_register.reg_id, user_register.first_name, user_register.last_name, user_register.email, auction_items.auction_name', false);
						$this->db->from('auction_won');
						//$this->db->where('auction_closed', '1');
						$this->db->join('user_register', 'auction_won.user_id = user_register.user_id');
						$this->db->join('auction_items', 'auction_items.auction_id = auction_won.auction_id');
						$query=$this->db->get();
						
						//var_dump($this->db->last_query());

						//$query = $this->db->get_where('auction_items', array('auction_closed' => '1'));
						return $query->result_array();

				}

		}

		public function get_auction_invoices($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						$this->db->select('auction_won.auction_id, auction_won.payment, auction_won.won_date, auction_won.bid_price, auction_won.payment, auction_won.delivered, user_register.reg_id, user_register.first_name, user_register.last_name, user_register.email, auction_items.auction_name', false);
						$this->db->from('auction_invoice');
						//$this->db->where('auction_closed', '1');
						$this->db->join('user_register', 'auction_invoice.user_id = user_register.user_id');
						//$this->db->join('auction_items', 'auction_items.auction_id = auction_invoice.auction_id');
						$query=$this->db->get();
						
						//var_dump($this->db->last_query());
						echo $num = $query->num_rows();

						//$query = $this->db->get_where('auction_items', array('auction_closed' => '1'));
						return $query->result_array();

				}

		}

		public function get_auctions_media($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get_where('auction_media', array('auction_id' => $slug));
						return $query->result_array();

				}else{
				
						$this->db->select('*');
						$this->db->from('auction_media');
						$query=$this->db->get();
						return $query->result_array();

				}

		}

		public function add_auctions($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get_where('auction_items', array('auction_open' => '1'));
						return $query->result_array();
						//var_dump($query->result_array());

				}else{

						$this->db->select('*');
						$this->db->from('auction_items');
						$this->db->join('auction_features', 'auction_items.auction_id=auction_features.auction_id');
						$this->db->where('auction_items.auction_id', $slug);
						$query=$this->db->get();
						return $query->result_array();

						//$query = $this->db->get_where('auction_items', array('auction_id' => $slug));
						//return $query->result_array();

						//var_dump($query->result_array());
				}

		}
		
		public function auction_type($data){
		
			$this->db->select("auction_type")->from("admin_config_app")->where('config_type', 'site_settings')->order_by("id", "asc");
			$query = $this->db->get();
			return $query->result_array();

		}
		
		public function get_duplicate($data){

			$this->db->select("*")->from("auction_items")->where('auction_id', $_POST['auction_id']);
			$query = $this->db->get();
			$result = $query->result_array();
			
			$auctitem = array(

						'auction_name' => $result[0]['auction_name'],
						'auction_type' =>  $result[0]['auction_type'],
						'auction_price' =>  $result[0]['auction_price'],
						'auction_nprice' =>  $result[0]['auction_nprice'],
						'auction_credits' =>  $result[0]['auction_credits'],
						'auction_users_bid' =>  $result[0]['auction_users_bid'],
						'auction_max_bid' =>  $result[0]['auction_max_bid'],
						//'auction_bid_inc' =>  $result['auction_bid_inc'],
						'auction_sdate' =>  $result[0]['auction_sdate'],
						'auction_stime' =>  $result[0]['auction_stime'],
						'auction_edate' =>  $result[0]['auction_edate'],
						'auction_etime' =>  $result[0]['auction_etime'],
						'auction_desc' =>  $result[0]['auction_desc'],
						'auction_terms' =>  $result[0]['auction_terms'],
						'auction_category' => $result[0]['auction_category']

			);
			
			$this->db->select("*")->from("auction_features")->where('auction_id', $_POST['auction_id']);
			$query = $this->db->get();
			$resultfeature = $query->result_array();

			$auctfest = array(
						
						'featured' => $resultfeature[0]['featured'],
						'sretail' => $resultfeature[0]['sretail'],
						'sallowed_bids' => $resultfeature[0]['sallowed_bids'],
						'sreq_bids' => $resultfeature[0]['sreq_bids'],
						'stotal_bids' => $resultfeature[0]['stotal_bids'],
						'sremaining_bids' => $resultfeature[0]['sremaining_bids'],
						'scurrent_bids' => $resultfeature[0]['scurrent_bids'],
						'extend_auction' => $resultfeature[0]['extend_auction']
			);

			$this->db->insert('auction_items', $auctitem);


			$id = $this->db->insert_id();

			$auctionid = strtoupper(substr($this->config->item('sitename'), 0, 3)).$id.'-'.date('Y');
						
						//-- update auction id --

						$this->db->set('auction_id', $auctionid);
						$this->db->where('auct_id', $id);

						$query=$this->db->update('auction_items');
						


						$auctmedia = array(
							'auction_name' => $_POST['auction_name'],
							'auction_id' =>  $auctionid
						);

						$this->db->insert('auction_media', $auctmedia);


						$auctfest['auction_id']=$auctionid;
						$query=$this->db->insert('auction_features', $auctfest);



						return TRUE;

		
		}


		public function post_auctions($data){
	
					$this->db->select('*');
					$this->db->from('auction_items');
					$this->db->where('auction_id', $_POST['auction_id']);
					$query = $this->db->get();
					$num = $query->num_rows();
				
					$auctitem = array(

						'auction_name' => $_POST['auction_name'],
						'auction_type' =>  $_POST['auction_type'],
						'auction_price' =>  $_POST['auction_price'],
						'auction_nprice' =>  $_POST['auction_nprice'],
						'auction_credits' =>  $_POST['auction_credits'],
						'auction_users_bid' =>  $_POST['auction_users_bid'],
						'auction_max_bid' =>  $_POST['auction_max_bid'],
						//'auction_bid_inc' =>  $_POST['auction_bid_inc'],
						'auction_sdate' =>  $_POST['auction_sdate'],
						'auction_stime' =>  $_POST['auction_stime'],
						'auction_edate' =>  $_POST['auction_edate'],
						'auction_etime' =>  $_POST['auction_etime'],
						'auction_desc' =>  $_POST['auction_desc'],
						'auction_terms' =>  $_POST['auction_terms'],
						'auction_category' => $_POST['auction_category']

					);

					$auctfest = array(
						
						'featured' => $_POST['featured'],
						'sretail' => $_POST['sretail'],
						'sallowed_bids' => $_POST['sallowed_bids'],
						'sreq_bids' => $_POST['sreq_bids'],
						'stotal_bids' => $_POST['stotal_bids'],
						'sremaining_bids' => $_POST['sremaining_bids'],
						'scurrent_bids' => $_POST['scurrent_bids'],
						'extend_auction' => $_POST['extend_auction']
					);

					if($num==1){
						
						$this->db->where('auction_id',$_POST['auction_id']);
						$query=$this->db->update('auction_items', $auctitem);

						$this->db->where('auction_id',$_POST['auction_id']);
						$query=$this->db->update('auction_features', $auctfest);
//echo 'update';
						return TRUE;

					}else{

						$this->db->insert('auction_items', $auctitem);
						$id = $this->db->insert_id();
						
						$auctionid = strtoupper(substr($this->config->item('sitename'), 0, 3)).$id.'-'.date('Y');
						
						//-- update auction id --

						$this->db->set('auction_id', $auctionid);
						$this->db->where('auct_id', $id);

						$query=$this->db->update('auction_items');
						
						$auctmedia = array(
							'auction_name' => $_POST['auction_name'],
							'auction_id' =>  $auctionid
						);

						$this->db->insert('auction_media', $auctmedia);

						//echo 'insert';
						//array_push($auctfest, $auctionid);
						$auctfest['auction_id']=$auctionid;

						//var_dump($auctitem);

						$query=$this->db->insert('auction_features', $auctfest);

						return TRUE;

					}

		}


		public function add_media($slug = FALSE)
		{

				if ($slug !== FALSE)
				{

						$query = $this->db->get_where('auction_media', array('auction_id' => $slug));
						return $query->result_array();

				}

		}

		public function post_media($data){

					//var_dump($data.'--'.$data['logo'][0]);

					$query = $this->db->get_where('auction_media', array('auction_id' => $data['auction_id']));
/*
					$actdata->select('*');
					$actdata->from('location_media');
					$actdata->where('location_id', $data['location_id']);
					$query = $actdata->get();*/

					echo $num = $query->num_rows();
					//var_dump($actdata->last_query());

					if($data['auction_icon_img']!=''){

						$datalogo = array(
							'auction_icon_img' => $data['auction_icon_img'][0],
						);
					}
					if($data['auction_img']!=''){

						$dataimg = array(
							'auction_img' => implode(",",$data['auction_img']),
							
						);
					
					}

					if($data['video']!=''){
						$datavideo = array(
							'video' => implode(",",$data['video']),
						);

					}

					// var_dump($data);
					 //echo $actdata->last_query();

					if($num==1){

						if($data['auction_icon_img']!=''){
							$this->db->where('auction_id', $data['auction_id']);
							$query=$this->db->update('auction_media', $datalogo);
							//var_dump($datalogo);
						}

						if($data['auction_img']!=''){

							$this->db->where('auction_id', $data['auction_id']);
							$query=$this->db->update('auction_media', $dataimg);

							//var_dump($actdata->last_query());
						}

						if($data['video']!=''){

							$this->db->where('auction_id', $data['auction_id']);
							$query=$this->db->update('auction_media', $datavideo);
							//var_dump($actdata->last_query());
						}

						echo true;

					}

		}

		
}