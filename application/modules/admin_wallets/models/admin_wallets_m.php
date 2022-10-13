<?php

class admin_wallets_m extends CI_Model {

        public function __construct()
        {

			parent::__construct();
			$this->load->database();

        }

		public function get_wallets_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
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

		}


		public function add_wallets($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('manage_wallets');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('manage_wallets', array('id' => $slug));
						return $query->result_array();

						//var_dump($query->result_array());
				}

		}


		public function post_coupons($data){
	
					$this->db->select('*');
					$this->db->from('manage_wallets');
					$this->db->where('id', $_POST['id']);
					$query = $this->db->get();
					$num = $query->num_rows();


					//array_push($datacoupon,$coupon_code);
					//var_dump( $num);
					//echo $this->db->last_query();

						$datacoupon = array(

							'coupon_sdate' => $_POST['coupon_sdate'],
							'coupon_edate' => $_POST['coupon_edate'],
							'coupon_value' => $_POST['coupon_value'],
							'points_earned' => $_POST['points_earned'],
							
						);
					
					($_POST['status']==NULL) ? $datacoupon['coupon_code'] = 0 : $datacoupon['coupon_code'] = 1;

					if($num==1){
						
						if($_POST['stseries']==$_POST['endseries']){
							
							//$coupon_code='coupon_code' => $_POST['coupon_code'].$_POST['stseries'];
							$datacoupon['coupon_code'] = $_POST['coupon_code'].$_POST['stseries'];
							
						}

						$this->db->where('id',$_POST['id']);
						$query=$this->db->update('manage_coupons', $datacoupon);
						return TRUE;

					}else{
					
						for($i=$_POST['stseries'];$i<=$_POST['endseries'];$i++){

							$datacoupon['coupon_code'] = $_POST['coupon_code'].$i;
							$this->db->insert('manage_coupons', $datacoupon);

						}

						return TRUE;

					}

		}


}