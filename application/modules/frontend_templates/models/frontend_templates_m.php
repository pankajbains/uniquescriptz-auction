<?php

class frontend_templates_m extends CI_Model {

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
			return $query->result_array();

		}
		
		public function emailcontent($data){

				$query = $this->db->get_where('user_emails', array('user_emails_type' => $data, 'status'=>'1'));
				return $query->result_array();

		}


		public function socialsettings($data){
			
			//print_r($data);
			$this->db->select('*');
			$this->db->from('admin_config_social');
			$this->db->where('config_type', $data['config_type']);
			$query = $this->db->get();
			return $query->result_array();

		}

		public function currency($slug = FALSE){			

				if ($slug === FALSE)
				{
						$query = $this->db->get('config_currency');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('config_currency', array('currency' => $slug));
						return $query->result_array();

				}
				

		}

		public function wishlist($slug = FALSE){	
			
			$data['wishlist_data']=array();

			if(isset($_SESSION['user_id'])){
				
				$wishlist = $this->frontend_templates_m->get_wishlist($_SESSION['user_id']);
				if($wishlist!=""){
					for($i=0;$i<count($wishlist); $i++){ 
						//$wdata[$i]=$data['auction_id'];
						$data['wishlist_data'][$i]=$wishlist[$i]['auction_id'];
						//$i++;
					}
				}

			}else{	
					$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
					if($whishlist_cookie_data!=''){
						$temp_data=array();
						$wdata=json_decode($whishlist_cookie_data);
						if(isset($wdata) && !empty($wdata)){

							for($i=0;$i<count($wdata); $i++){ 

								$data['wishlist_data'][$i]=$wdata[$i];

							}

						}
					}else{
						
						$data['wishlist_data'][0]=0;
					}

			}
			
			return $data['wishlist_data'];
		}


		public function category($data=NULL){
					
				if ($data === NULL)
					{
							$query = $this->db->get_where('manage_categories', array('category_parent is NULL or category_parent = \'0\'' => null, 'status'=>'1'));
							
							//var_dump($this->db->last_query());
							return $query->result_array();

					}else{

							$query = $this->db->get_where('manage_categories', array('category_parent' => $data, 'status'=>'1'));
							//var_dump($this->db->last_query());
							//var_dump("HIII");
							return $query->result_array();

					}

		}

		public function search_box(){

			$this->db->select('*');
			$this->db->from('manage_categories');
			$this->db->where("'category_parent is NULL' => null, 'status'=>'1'");
			$query = $this->db->get();
			return $query->result_array();

		}

		/* load from common
		function encrypt_decrypt($action, $string) {

			$output = false;

			$encrypt_method = "AES-256-CBC";
			$secret_key = 'UNIQUESCRIPTZKEY';
			$secret_iv = 'UNIQUESCRIPTZIV';

			// hash
			$key = hash('sha256', $secret_key);
			
			// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
			$iv = substr(hash('sha256', $secret_iv), 0, 16);

			if( $action == 'encrypt' ) {
				$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
				$output = base64_encode($output);
			}else if( $action == 'decrypt' ){
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}

			return $output;
		}


		public function userpass(){

			$alpha = "abcdefghijklmnopqrstuvwxyz";
			$alpha1= substr(str_shuffle($alpha), 0, 3);

			$alpha_upper = strtoupper($alpha);
			$alpha_upper1=substr(str_shuffle($alpha_upper), 0, 3);

			$numeric = "0123456789";
			$numeric1= substr(str_shuffle($numeric), 0, 3);

			$special = "!@$*";
			$special1=substr(str_shuffle($special), 0, 1);

			$rn= $alpha1 . $alpha_upper1 . $numeric1 . $special1; //$chars
			// the finished password
			$rn = str_shuffle($rn);

			return $rn;

		}
*/
		public function emaildata($slug=NULL){
				//var_dump($slug);
				$data['content_emails']=$this->emailcontent($slug);
				//var_dump($data['content_emails']);


				$site['config_type']="email_settings";
				$data['emailsetting'] = $this->sitesettings($site);
				return $data;
		}

		
		public function get_records($from, $where, $value){
			
			//print_r($data);
			$this->db->select('*');
			$this->db->from($from);
			$this->db->where($where, $value);
			$query = $this->db->get();
			return $query->result_array();

		}

		public function get_wishlist($user_id){

			$this->db->select('auction_id');
			$wharray = array('user_id' => $user_id);
			$query = $this->db->get_where('auction_wishlist', $wharray);
			//var_dump($this->db->last_query());
			//var_dump(empty($query));
			$result = $query->result_array($query);
			if(!empty($result)){
				return $result;
			}/*else{
				$k=array("0" => array(0));
				//var_dump($k);
				return $k;
			}*/

		}
		

/* load from common
		public function couponcode(){

			$alpha = "abcdefghijklmnopqrstuvwxyz";
			$alpha1= substr(str_shuffle($alpha), 0, 3);

			$alpha_upper = strtoupper($alpha);
			$alpha_upper1=substr(str_shuffle($alpha_upper), 0, 3);

			$numeric = "0123456789";
			$numeric1= substr(str_shuffle($numeric), 0, 3);

			$rn= $alpha1 . $alpha_upper1 . $numeric1; //$chars
			// the finished password
			$rn = str_shuffle($rn);

			return $rn;

		}
*/

}