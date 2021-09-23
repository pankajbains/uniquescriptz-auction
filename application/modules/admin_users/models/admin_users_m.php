<?php

class admin_users_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function get_users_list($slug = FALSE)
		{
 
			// $sp_read_users = "CALL sp_user_register()";
			// $query = $this->db->query($sp_read_users);
			// if ($query) {
			// 	return $query->result_array();
			// }
			// return NULL;
				if ($slug === FALSE)
				{
						$query = $this->db->get('user_register');
						return $query->result_array();
				}


		}

		public function get_subscriber_list($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->get_where('user_register', array('newsletters' => '1'));
						return $query->result_array();
				}

		}


		public function add_users($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('user_register');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('user_register', array('reg_id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());
				}

		}

		public function post_users($data){
	
					$this->db->select('*');
					$this->db->from('user_register');
					$this->db->where('email', $this->admin_templates->encrypt_decrypt('encrypt',$_POST['email']));
					$query = $this->db->get();
					$num = $query->num_rows();

					$datauser = array(
								
								'first_name' => $_POST['first_name'],
								'last_name' => $_POST['last_name'],
								'user_name' => $this->admin_templates->encrypt_decrypt('encrypt',$_POST['user_name']),
								
								'email' => $this->admin_templates->encrypt_decrypt('encrypt',$_POST['email']),
								'password' => $this->admin_templates->encrypt_decrypt('encrypt',$_POST['password']),
								'mobile' => $_POST['mobile'],
								'country' => $_POST['country'],
								//'ipaddress'=>$this->admin_templates->getRealIpAddr(),//$this->admin_templates->encrypt_decrypt('encrypt',$_POST['mobile']),
								'gender' =>$_POST['gender']

					);

					



					//var_dump( $num);
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('email',$this->admin_templates->encrypt_decrypt('encrypt',$_POST['email']));
						$query=$this->db->update('user_register', $datauser);
						return TRUE;

					}else{
					
						$this->db->insert('user_register', $datauser);
						$id = $this->db->insert_id();

						$user_id=strtoupper(substr($this->config->item('sitename'), 0, 3)).$id.'-'.date('Y');
						
						$this->db->set('user_id', $user_id);
						$this->db->set('ipaddress', $this->admin_templates->getRealIpAddr());
						$this->db->where('reg_id',$id);
						$query=$this->db->update('user_register');
						//echo $this->db->last_query();

						$datarefer = array(
							'referral_id' => $_POST['referral'],
							'user_id' => $user_id
						);

						$this->db->insert('user_referral', $datarefer);
											
						$datacredit = array(
							'user_id' => $user_id
						);
						$this->db->insert('user_credits', $datacredit);

						return TRUE;
						
					}

		}

		public function download_users($slug = FALSE)
		{
				if ($slug === FALSE)
				{
					
					$this->db->select('*');
					$this->db->from('user_register');
					$query = $this->db->get();
					//var_dump( $num);
				}

		}


}