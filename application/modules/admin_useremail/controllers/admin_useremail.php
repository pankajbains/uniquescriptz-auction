<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_useremail extends Backend_Controller {

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
		$this->load->model('admin_useremail_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}



	public function list_email($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['email_list'] = $this->admin_useremail_m->get_email_list(); // module call to list user from database
		$data['content_view']='admin_useremail/list_email';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}



	public function add_email($slug=NULL)
	{

		$this->session_check();

		if(!empty($_POST['user_emails_type'])){
			//var_dump($_POST);
			$result=$this->admin_useremail_m->post_emails($_POST['user_emails_type']);
			echo $result;
			
		}else{

			$data['content_view']='admin_useremail/add_email';	
			$data['email_list'] = $this->admin_useremail_m->add_emails($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}
		

	}




}
