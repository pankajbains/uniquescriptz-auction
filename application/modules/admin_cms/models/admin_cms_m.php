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

						$datau = array(
								
								
								'cms_id' => $_POST['cms_id'],
								'cms_page_name' => $_POST['cms_page_name'],
								'cms_page_url' => $_POST['cms_page_url'],
								'cms_page_heading1' => $_POST['cms_page_heading1'],
								'cms_page_heading2' => $_POST['cms_page_heading2'],
								'cms_page_heading3' => $_POST['cms_page_heading3'],
								'cms_page_paragraph1' => $_POST['cms_page_paragraph1'],
								'cms_page_paragraph2' => $_POST['cms_page_paragraph2'],
								'cms_page_paragraph3' => $_POST['cms_page_paragraph3'],
								'cms_page_paragraph4' => $_POST['cms_page_paragraph4'],
								'cms_page_paragraph5' => $_POST['cms_page_paragraph5'],
								'cms_page_paragraph6' => $_POST['cms_page_paragraph6'],
								'cms_page_paragraph7' => $_POST['cms_page_paragraph7']

							);
					//var_dump( $this->db );
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('cms_id',$_POST['cms_id']);
						$query=$this->db->update('cms_pages', $datau);

					}else{
					
						$this->db->insert('cms_pages', $datau);

					}

		}

		public function get_cms_pages($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						$query = $this->db->get('cms_pages');
						return $query->result_array();
				}


		}


}