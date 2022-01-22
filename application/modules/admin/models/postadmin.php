<?php

class postadmin extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();

        }

		public function add_reg_user($data){
		
			$datau = array(
								
								
				'config_type' => 'staff',
				'admin_username' => $data['username'],
				'admin_email' => $data['email'],
				
				'admin_role' => 'staff',
				'admin_access' => '["manage_content","manage_users","manage_emails","manage_categories","manage_auctions","manage_credits","manage_payments","manage_coupons","manage_wallets","manage_affiliates"]',
				'admin_permission' => '["read","write","create","delete"]',
				//'admin_password' =>$this->admin_templates->encrypt_decrypt('encrypt',$_POST['admin_password']), 
				//'admin_cpassword' =>$this->admin_templates->encrypt_decrypt('encrypt',$_POST['admin_password']),
				'admin_password' =>md5($data['password']),
				'admin_cpassword' =>md5($data['c_password']),
				'admin_status' => 1,  
			);
			$query=$this->db->insert('admin_users', $datau);
			
		}

		function adminlogin($data){
			
			//print_r($data); die;
			$this->db->select('*');
			$this->db->from('admin_users');
			$wharray = array('config_type' => $data['config_type'], 'admin_username' => $data['admin_username'], 'admin_password' => md5($data['admin_password']), 'admin_status' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			$num = $query->num_rows();
			
			if($num==1){
				
				$adminlogin = $query->result_array();

				$sessiondata = array(
						'admin_username'=>$adminlogin[0]['admin_username'],
						'admin_password'=>$adminlogin[0]['admin_password'],
						'config_type' =>$adminlogin[0]['config_type'],
						'admin_access' =>$adminlogin[0]['admin_access'],
						'admin_role' =>$adminlogin[0]['admin_role'],
						'admin_permission' =>$adminlogin[0]['admin_permission'],
						'logged_in'=>TRUE
				);

				$this->session->set_userdata($sessiondata);

				return true;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'
			}

		}


		public function adminlogout($data){
			
			session_destroy();
			//$this->session->sess_destroy();
	
		}

		function poststatus($data){
			

				$value=explode('|',$data['value']);

				$wharray = array($value[2] => $value[0]);
				
				//$currency_items[$i]['id'].'|config_currency|id|active'

				if($data['status']=='true'){

						$upvalue= array($value[3] => '1');
						$this->db->where($wharray);
						$query=$this->db->update($value[1], $upvalue);

				}else{

						$upvalue= array($value[3] => '0');
						$this->db->where($wharray);
						$query=$this->db->update($value[1], $upvalue);
		
				}

				//var_dump($this->db->last_query());

		}


		function postfeatured($data){
			

				$value=explode('|',$data['value']);

				$wharray = array($value[2] => $value[0]);
				
				if($data['featured']=='true'){

						$upvalue= array($value[3] => '1');
						$this->db->where($wharray);
						$query=$this->db->update($value[1], $upvalue);

				}else{

						$upvalue= array($value[3] => '0');
						$this->db->where($wharray);
						$query=$this->db->update($value[1], $upvalue);

				}
	
		}

		function delrec($data){
			

				$value=explode('|',$data['value']);

				$wharray = array($value[2] => $value[0]);		
				$this->db->where($wharray);
				$query=$this->db->delete($value[1]);

				if($value[1]=='auction_items'){

					$wharray = array($value[2] => $value[0]);		
					$this->db->where($wharray);
					$query=$this->db->delete('auction_features');

					$this->db->where($wharray);
					$query=$this->db->delete('auction_category');

					$this->db->where($wharray);
					$query=$this->db->delete('auction_media');
					
					
				}
				//var_dump($value[0].'--'.$value[1]);
				echo $value[0];
	
		}


}