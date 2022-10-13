<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Admin_users extends Backend_Controller {

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
		$this->load->model('backend_admin_users_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		
	}

 

	public function list_admin_users($slug=NULL)
	{

		$this->session_check();

	 
		$data['content_view']='backend_admin_users/list_admin_users';	
		$data['admin_users'] = $this->backend_admin_users_m->admin_users_list($slug); 
		$this->admin_templates->inner($data);
		

	}

	public function add_admin_users($slug=NULL)
	{

		$this->session_check();
 

	
		if(!empty($_POST['first_name'])){
			
			$result=$this->backend_admin_users_m->post_add_users($_POST);
			echo $result;
		}else{

			$data['content_view']='backend_admin_users/add_admin_users';	
			$data['admin_users'] = $this->backend_admin_users_m->add_users($slug);
			$this->admin_templates->inner($data);
		}

	}

   
}
