<?php

class admin_coupons_m extends CI_Model {

        public function __construct()
        {

			parent::__construct();
			$this->load->database();

        }


		public function get_coupons_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get('manage_coupons');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('manage_coupons', array('id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());

				}

		}


		public function add_coupons($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('manage_coupons');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('manage_coupons', array('id' => $slug));
						return $query->result_array();

						//var_dump($query->result_array());
				}

		}


		public function post_coupons($data){
	
					$this->db->select('*');
					$this->db->from('manage_coupons');
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