<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

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
		//$this->load->database();
		$this->load->model('postadmin');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
	}

	public function index()
	{

		$this->load->view('admin_templates/index_v');
	}



	public function post_adlogin($data=NULL)
	{

		$loggedin=$this->postadmin->adminlogin($_POST); 
		echo $loggedin;
		//if($loggedin==true){
		//	redirect('/home');  //$this->home->index();//$this->load->view('home');
		//}

	}

	public function poststatus($data=NULL)
	{
		//var_dump($_POST);
		$poststatus=$this->postadmin->poststatus($_POST); 
		//redirect($_SERVER['HTTP_REFERER']);  //$this->home->index();//$this->load->view('home');

	}

		public function postfeatured($data=NULL)
	{
		//var_dump($_POST);
		$poststatus=$this->postadmin->postfeatured($_POST); 
		//redirect($_SERVER['HTTP_REFERER']);  //$this->home->index();//$this->load->view('home');

	}

	public function delrec($data=NULL)
	{

		$poststatus=$this->postadmin->delrec($_POST); 
		//var_dump($poststatus);
	}


}
