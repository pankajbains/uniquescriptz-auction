<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users extends Backend_Controller {

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
		$this->load->model('admin_users_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		//$this->load->helper('download');
        //$this->load->library('PHPReport');
		

	}


	public function registered_users() // function call with page name
	{
				
		$this->session_check();
	
		$data['user_list'] = $this->admin_users_m->get_users_list(); // module call to list user from database
		$data['content_view']='admin_users/list_users';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function add_users($slug=NULL)
	{

		$this->session_check();

		//echo $_POST['first_name'];
		//var_dump($_POST."--------------------");

		if(!empty($_POST['first_name'])){
			//var_dump($_POST);
			$result=$this->admin_users_m->post_users($_POST['email']);
			echo $result;
			
		}else{

			$data['content_view']='admin_users/add_users';	
			$data['user_list'] = $this->admin_users_m->add_users($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}
		

	}



	public function subscribed_users() // function call with page name
	{
				
		$this->session_check();
	
		$data['user_list'] = $this->admin_users_m->get_subscriber_list(); // module call to list user from database
		$data['content_view']='admin_users/subscribed_users';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function download_users() // function call with page name
	{
		$this->db->select('*');
		$this->db->from('user_register');
		$query = $this->db->get();
		var_dump( $query->result_array());
		header("location:../registered_users.html");
	}

}
