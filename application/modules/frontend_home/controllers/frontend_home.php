<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_home extends Frontend_Controller {

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
	 * map to /index.php/welcome/<!-- <method_name> -->
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
					
		parent::__construct();
		$this->load->database();
		$this->load->model('frontend_home_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		
	}

	public function index()
	{
			//$this->session_check();
			//var_dump($data['currency']);
			//$this->load->view('frontend_templates/inner_headers_v', $this->settings());
			//$this->load->view('frontend_templates/index_v');
			//$this->load->view('frontend_templates/inner_footers_v', $this->settings());

			$data['content_featuredauction']=$this->frontend_home_m->get_featuredauction();

			$data['content_newauction']=$this->frontend_home_m->get_newauction();

			$data['side_banner']=$this->frontend_home_m->get_side_banner();
			print_r($data['side_banner']); die;

			$this->frontend_templates->index($data, $this->settings());
				
				

			//var_dump($data['content_newauction']);
	}

	public function cms($slug=NULL)
	{

		$data['content_data']=$this->frontend_home_m->get_page($slug);

		$data['content_view']='frontend_home/cms_page';

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_data']);

	}

	public function contact($slug=NULL)
	{

		$data['content_data']=$this->frontend_home_m->get_page($this->router->fetch_method());
		
		$data['contact_data']=$this->settings();

		$data['content_view']='frontend_home/contact';

		$this->frontend_templates->inner($data, $this->settings());
		
	}

	public function process($slug=NULL)
	{


		$email = $_POST['con_email'];
		$name = $_POST['con_name'];
		$message = $_POST['con_message'];
		$subject = $_POST['con_subject'];
					
		$site['config_type']="email_settings";
		$data['emailsetting'] = $this->frontend_templates_m->sitesettings($site);


		$mail = $this->send_email($emailsetting[0]['email_support'],$email,$name,$subject,$message);
		echo $mail;

	}


}
