<?php

class admin_gateways_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function get_gateways_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get('manage_paymentgateway');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('id', array('id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());

				}

		}


		public function add_gateways($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('manage_paymentgateway');
						return $query->result_array();
						var_dump($query->result_array());

				}else{

						$query = $this->db->get_where('manage_paymentgateway', array('id' => $slug));
						return $query->result_array();

						var_dump($query->result_array());
				}

		}


		public function post_gateways($data){

				$datagateway = array(
					'secret_key' => $_POST['secret_key'],
					'public_key' => $_POST['public_key'],
					'gateway_name' => $_POST['gateway_name'],
					'gateway_fee' => $_POST['gateway_fee'],
					'gateway_other_fee' => $_POST['gateway_other_fee'],
					'gateway_email' => $_POST['gateway_email']
				);

				if($_POST['type']=='edit'){

					$this->db->select('*');
					$this->db->from('manage_paymentgateway');
					$this->db->where('id', $_POST['id']);
					$query = $this->db->get();
					$num = $query->num_rows();
					
					if($num==1){
						
						$this->db->where('id',$_POST['id']);
						$query=$this->db->update('manage_paymentgateway', $datagateway);
						return TRUE;

					}

				}else if($_POST['type']=='add' && $_POST['gateway_name']!=''){
					//var_dump( $num);
					//echo $this->db->last_query();
						$this->db->insert('manage_paymentgateway', $datagateway);
						return TRUE;

				}else{
					return false;
				}

		}


}