<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_coupons extends Backend_Controller {

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
		$this->load->model('admin_coupons_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}



	public function list_coupons($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['coupons_list'] = $this->admin_coupons_m->get_coupons_list(); // module call to list user from database
		$data['content_view']='admin_coupons/list_coupons';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}



	public function add_coupons($slug=NULL)
	{

		$this->session_check();

		if(!empty($_POST['coupon_code'])){
			//var_dump($_POST);
			$result=$this->admin_coupons_m->post_coupons($_POST['id']);
			echo $result;
			
		}else{

			$data['content_view']='admin_coupons/add_coupons';	
			$data['coupons_list'] = $this->admin_coupons_m->add_coupons($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}
		

	}




}
