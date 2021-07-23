<?php

class frontend_home_m extends CI_Model {

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

		public function get_featuredauction(){

			$this->db->select('auction_items.auction_id, auction_media.auction_icon_img, auction_items.auction_name');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');
			$this->db->join('auction_features', 'auction_items.auction_id = auction_features.auction_id');

			$wharray = array('auction_closed' => '0', 'auction_open' => '1', 'featured' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			
			return $query->result_array($query);

		}


		public function get_newauction(){
			
			$this->db->select('*');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');

			$wharray = array('auction_items.auction_sdate >='=>date('Y-m-d', strtotime('-20 day', time())), 'auction_closed' => '0', 'auction_open' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

}