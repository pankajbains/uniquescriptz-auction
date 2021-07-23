<?php

class frontend_account_m extends CI_Model {

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

		public function get_gift_credits($slug=NULL){
		
			if($slug==NULL){
					
				$this->db->select('*');
				$this->db->from('user_bidcoupon_rate');
				$wharray = array('active' => '1');
				$this->db->where($wharray);

				$query = $this->db->get();
				//var_dump($this->db->last_query());
				return $query->result_array();
			
			}
		
		}

		public function get_bid_credits($slug=NULL){
		
			if($slug==NULL){
					
				$this->db->select('*');
				$this->db->from('user_bidcredit_rate');
				$wharray = array('active' => '1');
				$this->db->where($wharray);

				$query = $this->db->get();
				//var_dump($this->db->last_query());
				return $query->result_array();
			
			}
		
		}

		public function register_now($data){

			//print_r($data);
			$terms = ($_POST['terms']=='on')?'1':'0';
			
			$datauser = array(

				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'user_name' => $this->common->encrypt_decrypt('encrypt',$_POST['nickname']),
				'email' => $this->common->encrypt_decrypt('encrypt',$_POST['email']),
				'password' => $this->common->encrypt_decrypt('encrypt',$_POST['password']),
				'terms' => $terms

			);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$this->db->where('email', $datauser['email']);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
		
			if($num==1){
						
				return '2';

			}else{
					
				$this->db->insert('user_register', $datauser);
				$id = $this->db->insert_id();

				$user_id=strtoupper(substr($this->config->item('sitename'), 0, 3)).$id.'-'.date('Y');
						
				$this->db->set('user_id', $user_id);
				$this->db->set('ipaddress', $this->frontend_templates->getRealIpAddr());
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
				return $user_id;

			}

		}

		public function login_now($data){

			//print_r($data);
			$remembeer = ($_POST['remember_me']=='on')?'1':'0';
			$email = $this->common->encrypt_decrypt('encrypt',$data['email']);
			$password = $this->common->encrypt_decrypt('encrypt',$data['password']);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$wharray = array('email' => $email, 'password' => $password, 'active' => '1');
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
			
			if($num==1){
				
				$userlogin = $query->result_array();

				$sessiondata = array(

						'user_id'=>$userlogin[0]['user_id'],
						'username'=>$userlogin[0]['user_name'],
						'first_name'=>$userlogin[0]['first_name'],
						'last_name'=>$userlogin[0]['last_name'],
						'email'=>$userlogin[0]['email'],
						'logged_in'=>TRUE
				);

				$this->session->set_userdata($sessiondata);

				return true;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'
			}

		}

		public function forgot_now($data){

			//print_r($data);

			$email = $this->common->encrypt_decrypt('encrypt',$data['email']);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$wharray = array('email' => $email, 'active' => '1');
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
			
			if($num==1){

				$newpass = $this->common->userpass();
				$this->db->set('password', $this->common->encrypt_decrypt('encrypt',$newpass));
				$this->db->where('email',$email);
				$query=$this->db->update('user_register');

				return $newpass;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'

			}

		}

		public function buy_now($data){

			$this->db->select('*');
			$this->db->from('user_bidcoupon_records');
			$wharray = array('email' => $_SESSION['email'], 'coupon_code' => $data['creditcoupon'], 'coupon_used' => 0, 'paid' => 1);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
			
			if($num==1){
				
				$bidcredits = $query->result_array();

				$coupon_credit = $bidcredits[0]['coupon_credit'];
				$coupon_validity = $bidcredits[0]['coupon_validity'];
				$txn_date = $bidcredits[0]['txn_date'];
				
				$validity_expires = date('Y-m-d', strtotime("+".$bidcredits[0]['coupon_validity']." months", strtotime($bidcredits[0]['txn_date'])));
				
				if((date('Y-m-d')>($bidcredits[0]['txn_date'])) && (date('Y-m-d')<$validity_expires)){
				
					$this->db->select('paid_credit');
					$this->db->from('user_credits');
					$this->db->where('user_id', $_SESSION['user_id']);
					$query = $this->db->get();
					$row = $query->result_array();
					$datacredit = array(
						'paid_credit' => $row[0]['paid_credit']+$coupon_credit
					);

					$wharray = array('user_id' => $_SESSION['user_id']);
					$this->db->where($wharray);
					$result = $this->db->update('user_credits', $datacredit);
					
					if($result==TRUE){

						$datacoupon = array(
							'coupon_used' => 1
						);

						$wharray = array('email' => $_SESSION['email'], 'coupon_code' => $data['creditcoupon']);
						$this->db->where($wharray);
						$this->db->update('user_bidcoupon_records', $datacoupon);
						
						echo '1';
					}

				}else{
				
					echo "Copoun Code Expired or Not Valid";
				}
				

			}else{
			
				echo "Copoun Code Expired or Not Valid";

			}

		}


		public function gift_now($data){

			//print_r($data);
			
			$this->db->select('*');
			$this->db->from('user_bidcoupon_rate');
			$wharray = array('id' => $data['couponid'], 'active' => 1);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$bidcoupon = $query->result_array();
			$num = $query->num_rows();
			$coupon_code = $this->common->couponcode();

			$datauser = array(

				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'name' => $data['name'],
				'email' => $this->common->encrypt_decrypt('encrypt',$data['email']),
				'message' => $data['message'],
				'coupon_validity' => $bidcoupon[0]['coupon_validity'],
				'coupon_value' => $bidcoupon[0]['coupon_rate'],
				'coupon_credit' => $bidcoupon[0]['coupon_credit'],
				'coupon_code' => $coupon_code

			);

			$this->db->insert('user_bidcoupon_records', $datauser);
			$id = $this->db->insert_id();

			return $id;
			


		}



}