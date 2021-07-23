<?php

class admin_categories_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function get_categories_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get('manage_categories');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('manage_categories', array('id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());

				}

		}


		public function add_categories($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('manage_categories');
						return $query->result_array();
						//var_dump($query->result_array());

				}else{

						$query = $this->db->get_where('manage_categories', array('id' => $slug));
						return $query->result_array();

						//var_dump($query->result_array());
				}


		/*
		if ($slug === FALSE){
						
						$this->db->select('sum(points_earned) as points_earned, sum(points_used) as points_used, sum(points_earned) - sum(points_used) as points_total, user_register.user_id, concat(user_register.first_name, \' \', user_register.last_name) as username, user_register.email', false);
						$this->db->from('manage_wallets');
						$this->db->join('user_register', 'user_register.user_id = manage_wallets.user_id');
						$query=$this->db->get();
						return $query->result_array();

				}else{

						$this->db->select('user_id, points_earned, points_used');
						$this->db->from('user_register');
						$this->db->join('manage_wallets', 'user_register.user_id= manage_wallets.user_id');
						$query=$this->db->get_where('id', $slug);
						return $query->result_array();

				}
		*/


		}


		public function post_categories($data){
	
					$this->db->select('*');
					$this->db->from('manage_categories');
					$this->db->where('category_id', $_POST['category_id']);
					$query = $this->db->get();
					$num = $query->num_rows();

					//if( is_array( $this->input->post('category_parent') ) ) {
					//			$this->{$this->model}->teams_id = join(",", $this->input->post('category_parent'));
					//} else {
					//			$this->{$this->model}->teams_id = $this->input->post('category_parent');   
					//}

					$datagateway = array(
								
								'category_name' => $_POST['category_name'],
								'category_slug' => str_replace(' ','-',$_POST['category_name']),
								'category_parent' => $_POST['category_parent'][1]

					);

					//var_dump($datagateway);
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('category_id',$_POST['category_id']);
						$query=$this->db->update('manage_categories', $datagateway);
						return TRUE;

					}else{

						$this->db->insert('manage_categories', $datagateway);
						$id = $this->db->insert_id();

						$cat_id=strtoupper(substr($this->config->item('sitename'), 0, 3)).$id;
						$this->db->set('category_id', $cat_id);
						$this->db->where('id',$id);
						$query=$this->db->update('manage_categories');

						return TRUE;

					}

		}

		public function get_parent()
		{


			$query = $this->db->get('manage_categories');
			return $query->result_array();


		}



}