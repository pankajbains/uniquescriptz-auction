<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_credits extends Backend_Controller {

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
		$this->load->model('admin_credits_m');
		//$this->load->model('admin_categories/admin_categories_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		//$this->load->helper('download');
        //$this->load->library('PHPReport');
		

	}



	public function index()
	{

		$data['content_view']='admin_credits/list_credits_v';	
		$this->admin_templates->inner($data);

	}


	public function add_credits($slug=NULL){


		$this->session_check();


		if(isset($_POST['id'])){

			$result = $this->admin_credits_m->post_credits($_POST);
			echo $result;

		}else{

			$data['content_view']='admin_credits/add_credits_v';	
			$data['credit_items'] = $this->admin_credits_m->add_credits($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}

	}



	public function list_credits($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['credit_list'] = $this->admin_credits_m->get_credits_list(); // module call to list user from database
		$data['content_view']='admin_credits/list_credits_v';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}

	public function list_coupon_credits($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['credit_list'] = $this->admin_credits_m->get_coupon_credits_list(); // module call to list user from database
		$data['content_view']='admin_credits/list_coupon_credits_v';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function add_coupon_credits($slug=NULL){


		$this->session_check();


		if(isset($_POST['type'])){

			$result = $this->admin_credits_m->post_coupon_credits($_POST);
			//var_dump($result);
			echo $result;

		}else{

			$data['content_view']='admin_credits/add_coupon_credits_v';	
			$data['credit_items'] = $this->admin_credits_m->add_coupon_credits($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}

	}

	public function list_gift_credits($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['gift_credits'] = $this->admin_credits_m->get_gift_credits_list(); // module call to list user from database
		$data['content_view']='admin_credits/list_gift_credits_v';	 // view call to display user from database
		
		// var_dump($data);
		$this->admin_templates->inner($data);				 
		
	}




}
