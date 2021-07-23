<?php

class admin_credits_m extends CI_Model {

        public function __construct()
        {
			parent::__construct();
			$this->load->database();
        }

		public function get_credits_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$this->db->select('*', false);
						$this->db->from('user_bidcredit_rate');
						$query=$this->db->get();
						return $query->result_array();

				}else{

						$query = $this->db->get_where('user_bidcredit_rate', array('id' => $slug));
						return $query->result_array();

				}

		}

		

		public function add_credits($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get_where('user_bidcredit_rate', array('status' => '1', 'status' => '0'));
						return $query->result_array();

				}else{

						$this->db->select('*');
						$this->db->from('user_bidcredit_rate');
						$this->db->where('id', $slug);
						$query=$this->db->get();
						return $query->result_array();
				}

		}
		
		
		public function post_credits($data){
	
					$this->db->select('*');
					$this->db->from('user_bidcredit_rate');
					$this->db->where('id', $_POST['id']);
					$query = $this->db->get();
					$num = $query->num_rows();
				
					if($_POST['id']=='0'){

					$credititem = array(
						
						'credit_rate' => $_POST['credit_rate'],
						'paid_credit' => $_POST['paid_credit'],
						'free_credit' => $_POST['free_credit'],
						'active' => $_POST['active']
					);

					}else{
						$credititem = array(
						'id' => $id,
						'credit_rate' => $_POST['credit_rate'],
						'paid_credit' => $_POST['paid_credit'],
						'free_credit' => $_POST['free_credit'],
						'active' => $_POST['active']
						);
					}
					
					//var_dump($credititem);

					if($num==1){
						
						$this->db->where('id',$_POST['id']);
						$query=$this->db->update('user_bidcredit_rate', $credititem);

						return TRUE;

					}else{

						$this->db->insert('user_bidcredit_rate', $credititem);
						//var_dump($this->db->last_query());
						return TRUE;

					}

		}



		public function get_coupon_credits_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$this->db->select('*', false);
						$this->db->from('user_bidcoupon_rate');
						$query=$this->db->get();
						return $query->result_array();

				}else{

						$query = $this->db->get_where('user_bidcoupon_rate', array('id' => $slug));
						return $query->result_array();

				}

		}


		public function add_coupon_credits($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get_where('user_bidcoupon_rate', array('status' => '1', 'status' => '0'));
						return $query->result_array();

				}else{

						$this->db->select('*');
						$this->db->from('user_bidcoupon_rate');
						$this->db->where('id', $slug);
						$query=$this->db->get();
						return $query->result_array();
				}

		}

		
		
		public function post_coupon_credits($data){
	
					$this->db->select('*');
					$this->db->from('user_bidcoupon_rate');
					$this->db->where('id', $_POST['id']);
					$query = $this->db->get();
					//var_dump($this->db->last_query());
					$num = $query->num_rows();
				
					if($num==1){

					$credititem = array(
						
						'coupon_rate' => $_POST['coupon_rate'],
						'coupon_credit' => $_POST['coupon_credit'],
						'coupon_validity' => $_POST['coupon_validity'],
						'active' => $_POST['active']
					);

					}else{
						$credititem = array(
						'id' => $id,
						'coupon_rate' => $_POST['coupon_rate'],
						'coupon_credit' => $_POST['coupon_credit'],
						'coupon_validity' => $_POST['coupon_validity'],
						'active' => $_POST['active']
						);
					}
					
					//var_dump($credititem);

					if($num==1){
						
						$this->db->where('id',$_POST['id']);
						$query=$this->db->update('user_bidcoupon_rate', $credititem);
						//var_dump($this->db->last_query());
						return TRUE;

					}else{

						$this->db->insert('user_bidcoupon_rate', $credititem);
						//var_dump($this->db->last_query());
						return TRUE;

					}

		}




}