<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cms extends Backend_Controller {

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
		$this->load->model('admin_cms_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}

	public function index()
	{
		$data['content_view']='admin_cms/list_pages';	
		$this->admin_templates->inner($data);

	}

	public function add_pages($slug=NULL)
	{

		$this->session_check();
		//var_dump($_POST);

		if(!empty($_POST['cms_page_name'])){
			
			$this->admin_cms_m->post_cms($_POST);

		}else{

			$data['content_view']='admin_cms/add_pages';	
			$data['currency_items'] = $this->admin_cms_m->add_cms($slug);

			//	$data['cms_content'] = $this->admin_cms_m->load_cms_content($slug);
			//var_dump($data['cms_content']);
			// echo $data['cms_content'];

			$this->admin_templates->inner($data);

		}
		

	}



	public function list_pages()
	{
		$this->session_check();
	
		$data['cms_items'] = $this->admin_cms_m->get_cms_pages();
		$data['content_view']='admin_cms/list_pages';
		$this->admin_templates->inner($data);
	}

	function save_htmlpages()
	{
		$data = json_decode(file_get_contents("php://input"),true);
		$this->admin_cms_m->save_cms_content($data);
	}

	function load_htmlpages($id)
	{
		
		$data['cms_content'] = $this->admin_cms_m->load_cms_content($id);
		echo $data['cms_content'];
		
	}

}
