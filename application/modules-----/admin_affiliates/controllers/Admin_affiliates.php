<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_affiliates extends Backend_Controller {

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
		$this->load->model('admin_affiliates_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}


	public function view_affiliate() // function call with page name
	{
		
		//$this->session_check();
	
		$data['content_list'] = $this->admin_affiliates_m->get_affiliates_list(); // module call to list user from database
		$data['content_view']='admin_affiliates/view_affiliate';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function add_affiliates($slug=NULL)
	{

		$this->session_check();

		if(!empty($_POST['aff_level'])){
			//var_dump($_POST);
			$data['content_view']='admin_affiliates/add_affiliates';
			$result=$this->admin_affiliates_m->post_affiliates($_POST);
			echo $result;
			
		}else{
			
			$data['content_list'] = $this->admin_affiliates_m->add_affiliates($slug);
			$data['content_view']='admin_affiliates/add_affiliates';
			$this->admin_templates->inner($data);
			//var_dump($data);
		}

	}



}
