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



		}


		public function post_categories($data){
	
					$datagateway = array(
								
								'category_name' => $_POST['category_name'],
								'category_slug' => str_replace(' ','-',$_POST['category_name']),
								'category_parent' => $_POST['category_parent'][1]

					);

					if($_POST['type']=='edit'){

						$this->db->select('*');
						$this->db->from('manage_categories');
						$this->db->where('category_id', $_POST['category_id']);
						$query = $this->db->get();
						$num = $query->num_rows();

						if($num==1){
						
							$this->db->where('category_id',$_POST['category_id']);
							$query=$this->db->update('manage_categories', $datagateway);
							return TRUE;
	
						}

					}else if($_POST['type']=='add' && $_POST['category_name']!=''){

						$this->db->insert('manage_categories', $datagateway);
						$id = $this->db->insert_id();

						$cat_id=strtoupper(substr($this->config->item('sitename'), 0, 3)).$id;
						$this->db->set('category_id', $cat_id);
						$this->db->where('id',$id);
						$query=$this->db->update('manage_categories');
						

					}else{

						return false;

					}
					//var_dump($datagateway);
					//echo $this->db->last_query();

		}

		public function get_parent()
		{


			$query = $this->db->get('manage_categories');
			return $query->result_array();


		}



}