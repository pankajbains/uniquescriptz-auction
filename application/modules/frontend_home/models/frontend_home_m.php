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

			$this->db->select('auction_items.auction_id, auction_media.auction_icon_img, auction_items.auction_name, auction_items.auction_nprice');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');
			$this->db->join('auction_features', 'auction_items.auction_id = auction_features.auction_id');
			$this->db->join('manage_categories', 'auction_items.auction_category = manage_categories.category_id');

			$wharray = array('auction_closed' => '0', 'auction_open' => '1', 'featured' => '1', 'manage_categories.status' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			
			return $query->result_array($query);

		}

		public function get_featuredbanner(){

			$this->db->select('auction_items.auction_id, auction_media.auction_icon_img, auction_items.auction_name, auction_items.auction_nprice');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');
			$this->db->join('auction_features', 'auction_items.auction_id = auction_features.auction_id');
			$this->db->join('manage_categories', 'auction_items.auction_category = manage_categories.category_id');
			$this->db->limit('5');
			
			$wharray = array('auction_closed' => '0', 'auction_open' => '1', 'featured' => '1', 'manage_categories.status' => '1');
			$this->db->where($wharray);
			$this->db->order_by('rand()');
			$query = $this->db->get();
			//var_dump($this->db->last_query());
			
			return $query->result_array($query);

		}


		public function get_newauction(){
			
			$this->db->select('*');
			$this->db->from('auction_items');
			$this->db->join('auction_media', 'auction_items.auction_id = auction_media.auction_id');
			$this->db->join('manage_categories', 'auction_items.auction_category = manage_categories.category_id');

			$wharray = array('auction_items.auction_sdate >='=>date('Y-m-d', strtotime('-20 day', time())), 'auction_closed' => '0', 'auction_open' => '1', 'manage_categories.status' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

		public function get_side_banner(){
			
			$this->db->select('*');
			$this->db->from('manage_banner');
			$wharray = array('manage_banner.banner_open'=>1);
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array($query);

		}

}