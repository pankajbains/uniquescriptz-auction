<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_gateways extends Backend_Controller {

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
		$this->load->model('admin_gateways_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}



	public function list_gateways($slug=NULL) // function call with page name
	{
		
		$this->session_check();
		$data['gateway_list'] = $this->admin_gateways_m->get_gateways_list(); // module call to list user from database
		$data['content_view']='admin_gateways/list_gateways';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function add_gateways($slug=NULL)
	{

		$this->session_check();

		if(isset($_POST['type'])){
			//var_dump($_POST);
			$result=$this->admin_gateways_m->post_gateways($_POST['id']);
			echo $result;
			
		}else{

			$data['content_view']='admin_gateways/add_gateways';	
			$data['gateway_list'] = $this->admin_gateways_m->add_gateways($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}
		

	}


	public function index()
	{
		//$this->load->view('templates/header');
		$this->load->view('admin_templates/dashboard');
		//$this->load->view('templates/footer');
		//$this->load->view('templates/dashboard');
	}



}
