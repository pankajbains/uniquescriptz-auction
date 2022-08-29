<?php

class admin_banner_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function get_banner_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get('manage_banner');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('manage_banner', array('id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());

				}

		}


		public function add_banner($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('manage_banner');
						return $query->result_array();
						//var_dump($query->result_array());

				}else{

						$query = $this->db->get_where('manage_banner', array('id' => $slug));
						return $query->result_array();

						//var_dump($query->result_array());
				}


		/*
		if ($slug === FALSE){
						
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
		*/


		}


		public function post_banner($data,$files, $fileName){
					//print_r($fileName);die;
					$this->db->select('*');
					$this->db->from('manage_banner');
					$this->db->where('banner_id', $_POST['banner_id']);
					$query = $this->db->get();
					$num = $query->num_rows();

					//if( is_array( $this->input->post('category_parent') ) ) {
					//			$this->{$this->model}->teams_id = join(",", $this->input->post('category_parent'));
					//} else {
					//			$this->{$this->model}->teams_id = $this->input->post('category_parent');   
					//}
					if(isset($fileName) && !empty($fileName)){

					$datagateway = array(
								
								'banner_name' => $_POST['banner_name'],
								'banner_img' => $fileName,
								
								
					);
				}else{
					$datagateway = array(
								
						'banner_name' => $_POST['banner_name'],
						
						
			);
				}
					//print_r($datagateway); die;
					//var_dump($datagateway);
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('banner_id',$_POST['banner_id']);
						$query=$this->db->update('manage_banner', $datagateway);
						return TRUE;

					}else{

						$this->db->insert('manage_banner', $datagateway);
						//print_r($datagateway); die;
						$id = $this->db->insert_id();
						//print_r($id); die;
						$cat_id=strtoupper(substr($this->config->item('sitename'), 0, 3)).$id;
						$this->db->set('banner_id', $cat_id);
						$this->db->where('id',$id);
						$query=$this->db->update('manage_banner');

						return TRUE;

					}

		}

		public function get_parent()
		{


			$query = $this->db->get('manage_banner');
			return $query->result_array();


		}

		public function post_media($data){

			//var_dump($data.'--'.$data['logo'][0]);

			$query = $this->db->get_where('manage_banner', array('banner_id' => $data['banner_id']));
/*
			$actdata->select('*');
			$actdata->from('location_media');
			$actdata->where('location_id', $data['location_id']);
			$query = $actdata->get();*/

			echo $num = $query->num_rows();
			//var_dump($actdata->last_query());

			// if($data['auction_icon_img']!=''){

			// 	$datalogo = array(
			// 		'auction_icon_img' => $data['auction_icon_img'][0],
			// 	);
			// }
			if($data['banner_img']!=''){

				$dataimg = array(
					'banner_img' => implode(",",$data['banner_img']),
					
				);
			
			}

			// if($data['video']!=''){
			// 	$datavideo = array(
			// 		'video' => implode(",",$data['video']),
			// 	);

			// }

			// var_dump($data);
			 //echo $actdata->last_query();

			if($num==1){

				// if($data['auction_icon_img']!=''){
				// 	$this->db->where('auction_id', $data['auction_id']);
				// 	$query=$this->db->update('auction_media', $datalogo);
				// 	//var_dump($datalogo);
				// }

				if($data['banner_img']!=''){

					$this->db->where('banner_id', $data['banner_id']);
					$query=$this->db->update('manage_banner', $dataimg);

					//var_dump($actdata->last_query());
				}

				// if($data['video']!=''){

				// 	$this->db->where('auction_id', $data['auction_id']);
				// 	$query=$this->db->update('auction_media', $datavideo);
				// 	//var_dump($actdata->last_query());
				// }

				echo true;

			}

}



}