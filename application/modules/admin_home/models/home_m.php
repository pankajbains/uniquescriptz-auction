<?php

class home_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }

		public function sitesettings($data){
			
			//print_r($data);
			$this->db->select('*');
			$this->db->from('admin_config_app');
			$this->db->where('config_type', $data['config_type']);
			$query = $this->db->get();
			$num = $query->num_rows();

			if($num==1){

				$this->db->where('config_type',$data['config_type']);
				$query=$this->db->update('admin_config_app', $data);

			}else{
			
				$this->db->insert('admin_config_app', $data);

			}

		}

		public function profile($data){
			
			//print_r($data);
			$this->db->select('*');
			$this->db->from('admin_users');
  
			$wharray = array('config_type' => $_SESSION['config_type'], 'admin_username' => $_SESSION['admin_username'], 'admin_status' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			$num = $query->num_rows();

			if($num==1){
				
				$pass= array('admin_password' => md5($data['password']), 'admin_cpassword' => md5($data['cpassword']));
				$this->db->where($wharray);
				$query=$this->db->update('admin_users', $pass);

				session_destroy();
				//$this->session->sess_destroy();

			}else{
			
				$error = $this->db->error(); // Has keys 'code' and 'message'

			}

		}


		public function add_currency($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('config_currency');
						return $query->result_array();

				}else{

						/*	$data = array(
								'currency' => $this->input->post('currency'),
								'id' => $this->input->post('id'),
								'currency_code' => $this->input->post('currency_code'),
								'coversion_rate' => $this->input->post('coversion_rate'),
								'base_currency' => $this->input->post('base_currency'),
								'active' => $this->input->post('active')
							);
						//	var_dump($data['id']);
						//	var_dump('sfjsfiopsjfspfjsfopsjp');
				
					if($data['id']!=0){
						$this->db->where('id', $data['id']);
						return $this->db->update('config_currency', $data);
						//var_dump('sfjsfiopsjfspfjsfopsjp');
					}else{*/
						$query = $this->db->get_where('config_currency', array('id' => $slug));
						//var_dump($query);
						return $query->result_array();
					//}


				}


		}

		public function postcurrency($data){
	
					$this->db->select('*');
					$this->db->from('config_currency');
					$this->db->where('currency', $data['currency']);
					$query = $this->db->get();
					$num = $query->num_rows();
					//var_dump($this->db->$query);

					if($_POST['id']=='0'){

						$datau = array(
								'currency' => $this->input->post('currency'),
								'currency_code' => $this->input->post('currency_code'),
								'coversion_rate' => $this->input->post('coversion_rate'),
								'base_currency' => $this->input->post('base_currency'),
								'active' => $this->input->post('active')
							);

					}else{
							$datau = array(
								'currency' => $this->input->post('currency'),
								'id' => $this->input->post('id'),
								'currency_code' => $this->input->post('currency_code'),
								'coversion_rate' => $this->input->post('coversion_rate'),
								'base_currency' => $this->input->post('base_currency'),
								'active' => $this->input->post('active')
							);
					
					}

					var_dump($datau);

					if($num==1){
						

						$this->db->where('currency', $data['currency']);
						$query=$this->db->update('config_currency', $datau);
						//var_dump($query);
						//var_dump($this->db->$query);
						return true;
					}else{
					
						$this->db->insert('config_currency', $datau);
						//var_dump($query);
						//var_dump($this->db->$query);
						return true;
					}
					
					
		}

		public function get_currency($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						$query = $this->db->get('config_currency');
						return $query->result_array();
				}

				$query = $this->db->get_where('config_currency');

				//var_dump($query);
				return $query->result_array();

		}


		public function pointsettings($data){
			
			//print_r($data);
			$this->db->select('*');
			$this->db->from('admin_config_points');
			$this->db->where('config_type', $data['config_type']);
			$query = $this->db->get();
			$num = $query->num_rows();

			if($num==1){

				$this->db->where('config_type',$data['config_type']);
				$query=$this->db->update('admin_config_points', $data);

			}else{
			
				$this->db->insert('admin_config_points', $data);

			}

		}


		public function socialsettings($data){
			
			//print_r($data);
			$this->db->select('*');
			$this->db->from('admin_config_social');
			$this->db->where('config_type', $data['config_type']);
			$query = $this->db->get();
			$num = $query->num_rows();

			if($num==1){

				$this->db->where('config_type',$data['config_type']);
				$query=$this->db->update('admin_config_social', $data);

			}else{
			
				$this->db->insert('admin_config_social', $data);

			}

		}


		public function post_media($data){

					$query = $this->db->get_where('admin_config_app', array('config_type' => $data['config_type']));

					$num = $query->num_rows();
					//var_dump($actdata->last_query());

					if($data['headerlogo']!=''){
						$datalogo = array(
							'site_header_logo' => $data['headerlogo'][0],
						);
					}

					if($data['stickylogo']!=''){
						$datasticky = array(
							'site_sticky_header_logo' => $data['stickylogo'],
							//'site_sticky_header_logo' => implode(",",$data['stickylogo']),
						);
					}
					if($data['favicon']!=''){
						$datafav = array(
							'site_favicon' => $data['favicon'][0],
						);
					
					}


					if($num==1){

						if($data['headerlogo']!=''){
							$this->db->where('config_type ', $data['config_type']);
							$query=$this->db->update('admin_config_app', $datalogo);
							var_dump($datalogo);
						}

						if($data['stickylogo']!=''){
							$this->db->where('config_type ', $data['config_type']);
							$query=$this->db->update('admin_config_app', $datasticky);

							var_dump($this->db->last_query());
						}

						if($data['favicon']!=''){
							$this->db->where('config_type', $data['config_type']);
							$query=$this->db->update('admin_config_app', $datafav);

							var_dump($this->db->last_query());
						}


						echo true;

					}

		}




}