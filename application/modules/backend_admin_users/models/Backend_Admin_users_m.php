<?php

class backend_admin_users_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
			
        }

		function admin_users_list($slug=NULL)
		{
			// if ($slug === FALSE)
			// {
					$this->db->order_by("id", "DESC");
					$query = $this->db->get_where('admin_users');
					return $query->result_array();

			// }else{

			// 		$query = $this->db->get_where('admin_users', array('id' => $slug));
			// 		return $query->result_array();

			// }

		}

		
		public function add_users($slug = FALSE){			

			if ($slug === FALSE)
			{
					$query = $this->db->get('admin_users');
					return $query->result_array();

			}else{

					$query = $this->db->get_where('admin_users', array('id' => $slug));
					return $query->result_array();

			}

		}

		

		public function post_add_users($data){ 
					
					$this->db->select('*');
					$this->db->from('admin_users');
					$this->db->where('id', $_POST['id']);
					$query = $this->db->get();

					$num = $query->num_rows();
						 
					$admin_username =  $_POST['first_name']." ".$_POST['last_name'];
 
						$datau = array(
								
								
							'config_type' => $_POST['admin_role'],
							'admin_username' => $_POST['admin_username'],
							'admin_email' => $_POST['admin_email'],
							'admin_username' => $admin_username,
							'admin_role' => $_POST['admin_role'],
							'admin_access' => json_encode($_POST['admin_access']),
							'admin_permission' => json_encode($_POST['admin_permission']),
							//'admin_password' =>$this->admin_templates->encrypt_decrypt('encrypt',$_POST['admin_password']), 
							//'admin_cpassword' =>$this->admin_templates->encrypt_decrypt('encrypt',$_POST['admin_password']),
							'admin_password' =>md5($_POST['admin_password']),
							'admin_cpassword' =>md5($_POST['admin_password']),
							'admin_status' => 1,  
						);
					// var_dump($datau);
					

					if($num==1){
						
						$this->db->where('id',$_POST['id']);
						$query=$this->db->update('admin_users', $datau);
						 
						//echo $this->db->last_query();

					}else{
					
						$query=$this->db->insert('admin_users', $datau);
					}
					
					return $query;

					//return $query->result_array();
					//echo $this->db->last_query();

		}

     

}