<?php

class frontend_users_auctions_m extends CI_Model {

        public function __construct()
        {
			parent::__construct();
			$this->load->database();
        }


		public function get_page($data){

			//print_r($data);
			$this->db->select('*');
			$this->db->from('cms_pages');

			$wharray = array('cms_page_url' => $data, 'active' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}

		public function user_login($data){

			//print_r($data);
			$this->db->select('*');
			$this->db->from('cms_pages');

			$wharray = array('cms_page_url' => $data, 'active' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}

		public function get_user_auctions($open,$closed,$won=NULL){

			$wharray = array('auction_open' => $open, 'auction_closed' => $closed, 'auction_bids.user_id' => $_SESSION['user_id'], 'auction_winner' => $won);

			$this->db->distinct();

			// if($won!=''){
			// 	$this->db->select('auction_bids.auction_id, auction_items.auction_name, auction_items.auction_edate, auction_items.auction_etime, auction_items.auction_bid, auction_items.auction_max_bid, auction_won.bid_price, auction_won.bid_id', false);
			// }else{
				$this->db->select('auction_bids.auction_id, auction_items.auction_name, auction_items.auction_edate, auction_items.auction_etime, auction_items.auction_bid, auction_items.auction_max_bid', false);
			// }
			$this->db->from('auction_bids');
			$this->db->where($wharray);
			$this->db->join('auction_items', 'auction_bids.auction_id = auction_items.auction_id');
			// $this->db->join('auction_won', 'auction_won.auction_id = auction_items.auction_id');

			$query=$this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}


		public function get_user_winner($delmark){

			$wharray = array('user_id' => $_SESSION['user_id'], 'delmark' => $delmark);
			
			$this->db->distinct();
			$this->db->select('auction_won.bid_id, auction_won.bid_price, auction_won.won_date, auction_won.won_status, auction_won.payment, auction_won.invoicesent, auction_won.delivered, auction_won.carrier, auction_won.trknumber, auction_won.bid_id, auction_won.auction_id, auction_items.auction_name', false);
			$this->db->from('auction_won');
			$this->db->where($wharray);

			$this->db->join('auction_items', 'auction_won.auction_id = auction_items.auction_id');
			$query=$this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}

		public function get_bids($data){

			// print_r($data);
			$this->db->select('*');
			// $this->db->select('auction_bids.auction_id, auction_bids.bid_price, auction_bids.bid_date, auction_bids.bid_status, auction_items.auction_name');
			$this->db->from('auction_bids');

			$wharray = array('auction_bids.auction_id' => $data, 'user_id'=>$_SESSION['user_id']);
			$this->db->where($wharray);
			
			$this->db->join('auction_items', 'auction_bids.auction_id = auction_items.auction_id');
			$query = $this->db->get();
			// var_dump($query->result_array());
			return $query->result_array();

		}

		public function get_detail_bids($data){

			//print_r($data);
			$this->db->select('auction_bids.auction_id, auction_bids.bid_price, auction_bids.bid_date, auction_bids.bid_status, auction_items.auction_name');
			$this->db->from('auction_bids');

			$wharray = array('auction_bids.auction_id' => $data);
			$this->db->where($wharray);
			
			$this->db->join('auction_items', 'auction_bids.auction_id = auction_items.auction_id');
			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}

		public function hide_bids($data,$value){

				$datauser = array(
					'delmark' => '1'
				);

				$wharray = array('auction_id' => $value, 'user_id' => $_SESSION['user_id']);
				$this->db->where($wharray);
				$this->db->update($data, $datauser);
				//print_r($this->db->last_query());
				return true;


		}


}