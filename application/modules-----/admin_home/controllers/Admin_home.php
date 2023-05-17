<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends Backend_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
					
		parent::__construct();
		$this->load->database();
		$this->load->model('home_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}

	public function index()
	{

			$this->session_check();

			$this->load->view('admin_templates/headers_v');
			$this->load->view('admin_templates/breadcrumb_v');
			$this->load->view('admin_templates/dashboard_v');
			$this->load->view('admin_templates/footers_v');

	}

	public function site_logo($data=NULL)
	{
		
			$this->session_check();
			
			$data['content_view']='admin_home/site_logo_v';

			$this->db->select("site_header_logo, site_sticky_header_logo, site_favicon")->from("admin_config_app")->where('config_type', 'site_settings')->order_by("id", "asc");

			$query = $this->db->get();

			if($query->num_rows() > 0){

			  $siteinfo = $query->result_array();

			  foreach($siteinfo as $key => $value ){

					$data['siteinfo'][$key] = $value;
				
				}

			}else{

				$error = $this->db->error(); // Has keys 'code' and 'message'
			
			}
			//var_dump($data);
			$this->admin_templates->inner($data);

	}
	

	public function site_settings($data=NULL)
	{
		
			$this->session_check();
			
			$data['content_view']='admin_home/site_settings_v';

			$this->db->select("site_name, site_title, site_desc, site_timezone, site_analytics, site_address, site_phone")->from("admin_config_app")->where('config_type', 'site_settings')->order_by("id", "asc");

			$query = $this->db->get();

			if($query->num_rows() > 0){

			  $siteinfo = $query->result_array();

			  foreach($siteinfo as $key => $value ){

					$data['siteinfo'][$key] = $value;
				
				}

			}else{

				$error = $this->db->error(); // Has keys 'code' and 'message'
			
			}
		
			$this->admin_templates->inner($data);


	}
	

	public function email_settings()
	{

		$this->session_check();

		$data['content_view']='admin_home/email_settings_v';

		$this->db->select("email_support, email_auto, email_sales")->from("admin_config_app")->where('config_type', 'email_settings')->order_by("id", "asc");
		$query = $this->db->get();
		if($query->num_rows() > 0){

		  $siteinfo = $query->result_array();

		  foreach($siteinfo as $key => $value ){

				$data['emailinfo'][$key] = $value;

			}

		}else{
			$error = $this->db->error(); // Has keys 'code' and 'message'
		}

		$this->admin_templates->inner($data);


	}

	public function user_points()
	{
		
		$this->session_check();
		
		$data['content_view']='admin_home/user_points_v';

		$this->db->select("points_register, points_login, points_fblikes, points_fbshare, points_tweet, points_value, point_refer")->from("admin_config_points")->order_by("id", "asc");
		$query = $this->db->get();
		//$this->db->select("points_register, email_auto, email_sales")->from("admin_config_app")->where('config_type', 'email_settings')->order_by("id", "asc");
		//$query = $this->db->get();

		if($query->num_rows() > 0){

		  $siteinfo = $query->result_array();

		  foreach($siteinfo as $key => $value ){

				$data['pointinfo'][$key] = $value;

			}

		}else{
			$error = $this->db->error(); // Has keys 'code' and 'message'
		}

		$this->admin_templates->inner($data);
	}

	public function social_media()
	{
		
		$this->session_check();
		
		$data['content_view']='admin_home/social_media_v';

		$this->db->select("social_facebook, social_twitter, social_gplus, social_linkedin, social_instagram, social_pinterest, social_youtube, social_facebook-app-id, social_facebook-secret")->from("admin_config_social")->order_by("id", "asc");
		$query = $this->db->get();
		//$this->db->select("points_register, email_auto, email_sales")->from("admin_config_app")->where('config_type', 'email_settings')->order_by("id", "asc");
		//$query = $this->db->get();

		if($query->num_rows() > 0){

		  $siteinfo = $query->result_array();

		  foreach($siteinfo as $key => $value ){

				$data['socialinfo'][$key] = $value;

			}

		}else{
			$error = $this->db->error(); // Has keys 'code' and 'message'
		}

		$this->admin_templates->inner($data);
	}


	public function currency($slug = NULL)
	{
		
		$this->session_check();
		
		$data['currency_items'] = $this->home_m->get_currency($slug);

		$data['content_view']='admin_home/currency_v';
		$this->admin_templates->inner($data);

	}

	public function add_currency($slug=NULL)
	{
		
			$this->session_check();
			
			if(isset($_POST['id'])){

				$result = $result=$this->home_m->postcurrency($_POST);
				echo $result;

			}else{

				$data['content_view']='admin_home/add_currency_v';
				
				$data['currency_items'] = $this->home_m->add_currency($slug);

				//var_dump($data);

				$this->admin_templates->inner($data);

			}

	}
	/*
	public function postcurrency($slug=NULL){
		
		$this->session_check();
		//$result=$this->home_m->postcurrency($_POST);
		//echo $result;
		var_dump($_POST);

	}*/

	public function profile()
	{
		
		$this->session_check();
		
		$data['content_view']='admin_home/profile_v';
		$this->admin_templates->inner($data);

	}

	public function post_sitesettings($data=NULL)
	{
		$this->session_check();
		
		$this->home_m->sitesettings($_POST); // Calling Insert Model and its function.

	}

	public function post_pointsettings($data=NULL)
	{
		$this->session_check();
		
		$this->home_m->pointsettings($_POST); // Calling Insert Model and its function.

	}
	
	public function post_socialsettings($data=NULL)
	{
		$this->session_check();
		
		$this->home_m->socialsettings($_POST); // Calling Insert Model and its function.

	}

	public function post_profile($data=NULL){
	
		$this->session_check();
		$this->home_m->profile($_POST); // Calling Insert Model and its function.

	}


	public function upload_media($slug=NULL){
		
				//var_dump($_POST['user_id'].'--'.$slug);
				if(!empty($_POST['config_type'])){

				  $config['upload_path']= "assets/frontendfiles/images/";

				  if(!is_dir($config['upload_path'])){
					  
					  mkdir($config['upload_path'], 0777, TRUE);
				  }

				$data=[];
				$data['config_type']=$_POST['config_type'];
				$data['headerlogo'] = $this->upload_files($config['upload_path'], $_FILES['headerlogo']);
				$data['stickylogo'] = $this->upload_files($config['upload_path'], $_FILES['stickylogo']);
				$data['favicon'] = $this->upload_files($config['upload_path'], $_FILES['favicon']);

				$result= $this->home_m->post_media($data);
				echo $result;
				//return true;
			}

	}



	private function upload_files($path, $files)  //  --- calling inside upload media for hotels ---
    {
        $config = array(
            'upload_path' => $path,
            'allowed_types' => 'jpg|gif|png|mpeg|mp4|3gp',
            'overwrite' => 1,  
			'max_size' => '10000',
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }

        }

        return $images;
    }



}
