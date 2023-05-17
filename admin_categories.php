<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_categories extends Backend_Controller {

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
		$this->load->model('admin_categories_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}


	public function list_categories($slug=NULL) // function call with page name
	{
		
		$this->session_check();
		$data['content_list'] = $this->admin_categories_m->get_categories_list(); // module call to list user from database
		$data['content_view']='admin_categories/list_categories';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function add_categories($slug=NULL)
	{

		$this->session_check();

		if(!empty($_POST['category_name'])){
			//var_dump($_POST);
			$result=$this->admin_categories_m->post_categories($_POST);
			echo $result;
			
		}else{
			
			//var_dump($_POST['category_name']);
			$data['content_parent'] = $this->admin_categories_m->get_parent($slug);
			$data['content_list'] = $this->admin_categories_m->add_categories($slug);
			$data['content_view']='admin_categories/add_categories';
			$this->admin_templates->inner($data);
			//var_dump($data);
		}

	}


	public function get_parent($slug=NULL)
	{
		$data['content_list'] = $this->admin_categories_m->add_categories($slug);
	}

	public function index()
	{
		//$this->load->view('templates/header');
		$this->load->view('admin_templates/dashboard');
		//$this->load->view('templates/footer');
		//$this->load->view('templates/dashboard');
	}


}
