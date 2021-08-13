<?php

class admin_cms_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function add_cms($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('cms_pages');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('cms_pages', array('cms_id' => $slug));
						return $query->result_array();

				}

		}

		public function post_cms($data){
	
					$this->db->select('*');
					$this->db->from('cms_pages');
					$this->db->where('cms_id', $_POST['cms_id']);
					$query = $this->db->get();
					$num = $query->num_rows();
					// $cms_pages = $this->session->cms_data();
					$cms_pages = $this->session->userdata('cms_content');
					// var_dump($cms_pages);
						$datau = array(
								
								
								'cms_id' => $_POST['cms_id'],
								'cms_page_name' => $_POST['cms_page_name'],
								'cms_page_url' => $_POST['cms_page_url'],
								'cms_page_html' => $cms_pages['gjs-html'],
								'cms_page_css' => $cms_pages['gjs-css'],
								'cms_page_components' => $cms_pages['gjs-components'],
								'cms_page_styles' => $cms_pages['gjs-styles'],
								'cms_page_assets' => $cms_pages['gjs-assets'],
								// 'cms_page_paragraph3' => $_POST['cms_page_paragraph3'],
								// 'cms_page_paragraph4' => $_POST['cms_page_paragraph4'],
								// 'cms_page_paragraph5' => $_POST['cms_page_paragraph5'],
								// 'cms_page_paragraph6' => $_POST['cms_page_paragraph6'],
								// 'cms_page_paragraph7' => $_POST['cms_page_paragraph7']

							);
					//var_dump( $this->db );
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('cms_id',$_POST['cms_id']);
						$query=$this->db->update('cms_pages', $datau);

					}else{
					
						$this->db->insert('cms_pages', $datau);

					}
					$this->session->unset_userdata('cms_content');

		}

		public function get_cms_pages($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						$query = $this->db->get('cms_pages');
						return $query->result_array();
				}


		}

		public function save_cms_content($data)
		{
			$assets = $data['gjs-assets']; 
			$components = $data['gjs-components']; 
			$css = $data['gjs-css']; 
			$html = $data['gjs-html']; 
			$styles = $data['gjs-styles'];
			  
			// if($data['page_id'] != "") {
				 
			// 	$cms_datas = array( 					
			// 		'cms_page_assets' => $assets,
			// 		'cms_page_components' => $components,
			// 		'cms_page_css' => $css,
			// 		'cms_page_html' =>$html,
			// 		'cms_page_styles' => $styles, 
			// 	);
				
			// 	$this->db->where('cms_id',$data['page_id']);
			// 	$query=$this->db->update('cms_pages', $cms_datas);
			// }else {
				$cms_datas = array( 					
					'gjs-assets' => $assets,
					'gjs-components' => $components,
					'gjs-css' => $css,
					'gjs-html' => $html,
					'gjs-styles' => $styles, 
				);

				$this->session->set_userdata('cms_content',$cms_datas);
			// }


		}

		public function load_cms_content($id)
		{
		 
			$query = $this->db->get_where('cms_pages', array('cms_id' => $id))->row(); 
			$response['id'] = $id;
			$response['gjs-assets'] = $query->cms_page_assets;
			$response['gjs-components'] = $query->cms_page_components;
			$response['gjs-css'] =  $query->cms_page_css;
			$response['gjs-html'] = $query->cms_page_html;
			$response['gjs-styles'] = $query->cms_page_styles;
			$json_response = json_encode($response);
			
			return $json_response;
		}

}