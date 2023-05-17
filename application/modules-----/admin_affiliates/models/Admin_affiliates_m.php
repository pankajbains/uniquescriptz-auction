<?php

class admin_affiliates_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function get_affiliates_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get('user_affiliates');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('user_affiliates', array('aff_id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());

				}

		}


		public function add_affiliates($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('user_affiliates');
						return $query->result_array();
						//var_dump($query->result_array());

				}else{

						$query = $this->db->get_where('user_affiliates', array('aff_id' => $slug));
						return $query->result_array();

						//var_dump($query->result_array());
				}

		}



		public function post_affiliates($data){
	
					$this->db->select('*');
					$this->db->from('user_affiliates');
					$this->db->where('aff_id', $_POST['aff_id']);
					$query = $this->db->get();
					$num = $query->num_rows();
				
					$datagateway = array(

								'aff_level' => $_POST['aff_level'],
								'aff_points' => $_POST['aff_points']

					);

					//var_dump( $num);
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('aff_id',$_POST['aff_id']);
						$query=$this->db->update('user_affiliates', $datagateway);
						return TRUE;

					}else{

						$this->db->insert('user_affiliates', $datagateway);
						$id = $this->db->insert_id();
						return TRUE;

					}

		}



}