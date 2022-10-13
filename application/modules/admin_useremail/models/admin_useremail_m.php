<?php

class admin_useremail_m extends CI_Model {

        public function __construct()
        {
              			 
			parent::__construct();
			$this->load->database();
        }


		public function get_email_list($slug = FALSE)
		{

				if ($slug === FALSE)
				{
						
						$query = $this->db->get('user_emails');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('user_emails', array('id' => $slug));
						return $query->result_array();
						//var_dump($query->result_array());

				}

		}


		public function add_emails($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('user_emails');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('user_emails', array('id' => $slug));
						return $query->result_array();

						//var_dump($query->result_array());
				}

		}


		public function post_emails($data){
	
					$this->db->select('*');
					$this->db->from('user_emails');
					$this->db->where('user_emails_type', $_POST['user_emails_type']);
					$query = $this->db->get();
					$num = $query->num_rows();

					$dataemail = array(
								
								'user_emails_type' => $_POST['user_emails_type'],
								'user_emails_body' => $_POST['user_emails_body'],
								'user_emails_subject' => $_POST['user_emails_subject'],
								'id' => $_POST['id']

					);

					//var_dump( $num);
					//echo $this->db->last_query();

					if($num==1){
						
						$this->db->where('user_emails_type',$_POST['user_emails_type']);
						$query=$this->db->update('user_emails', $dataemail);
						return TRUE;

					}else{
					
						$this->db->insert('user_emails', $dataemail);
						return TRUE;
					}

		}


}