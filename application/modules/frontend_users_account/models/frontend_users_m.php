<?php

class frontend_users_m extends CI_Model {

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

			$this->db->select('*');
			$this->db->from('cms_pages');

			$wharray = array('cms_page_url' => $data, 'active' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			return $query->result_array();

		}

		public function get_users($data){
			
			$this->db->select('paid_credit, free_credit');
			$this->db->from('user_credits');
			$wharray = array('user_id'=>$data);
			$this->db->where($wharray);
			$query = $this->db->get(); 
			return $query->result_array($query);

		}


		public function account_now($data){

			$datauser = array(

				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'mobile' => $_POST['mobile'],
				'country' => $_POST['country']

			);
			
			if($_POST['npassword']!=""){
					
					$datauser['password'] = $this->common->encrypt_decrypt('encrypt',$_POST['npassword']);
			}


			$email = $this->common->encrypt_decrypt('encrypt',$_POST['email']);
			$username = $this->common->encrypt_decrypt('encrypt',$_POST['nickname']);

			$this->db->select('*');
			$this->db->from('user_register');
			$wharray = array('email' => $email, 'user_name' => $username);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();

			if($num==1){

				$wharray = array('email' => $email, 'user_name' => $username);
				$this->db->where($wharray);
				$this->db->update('user_register', $datauser);
				//print_r($this->db->last_query());
				return true;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'

			}

		}


		public function preferences_now($data){

			$datauser = array(
				'newsletters' => ($_POST['newsletters']=='on')?'1':'0',
				'activitystatus' => ($_POST['activitystatus']=='on')?'1':'0'
			);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$wharray = array('email' => $_SESSION['email'], 'user_name' => $_SESSION['username']);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();

			if($num==1){
				
				$wharray = array('email' => $_SESSION['email'], 'user_name' => $_SESSION['username']);
				$this->db->where($wharray);
				$this->db->update('user_register', $datauser);
				//print_r($this->db->last_query());
				return true;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'

			}

		}



		public function get_payments($data){
			
			$this->db->select('*');
			$this->db->from('user_payment');
			$wharray = array('user_id' => $_SESSION['user_id']);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
			return $query->result_array();

		}




}