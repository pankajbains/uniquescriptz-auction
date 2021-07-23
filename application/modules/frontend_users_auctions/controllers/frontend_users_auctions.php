<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_users_auctions extends Frontend_Controller {

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
		$this->load->model('frontend_users_auctions_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		
	}

	public function index()
	{
			//$this->session_check();
			$site['config_type']="site_settings";
			$data['sitesetting'] = $this->frontend_home_m->sitesettings($site);

			$site['config_type']="email_settings";
			$data['emailsetting'] = $this->frontend_home_m->sitesettings($site);

			$site['config_type']="social_media";
			$data['socialsetting'] = $this->frontend_home_m->socialsettings($site);

			$data['currency'] = $this->frontend_home_m->currency();

			//var_dump($data['currency']);
			$this->load->view('frontend_templates/inner_headers_v', $data);
			$this->load->view('frontend_templates/index_v');
			$this->load->view('frontend_templates/inner_footers_v', $data);
	}

	public function wishlist($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->get_page($this->router->fetch_method());

		$data['content_view']='frontend_users_auctions/wishlist-v';

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_data']);

	}

	public function current_auctions($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_auctions/current-v';

		$data['content_auction']=$this->frontend_users_auctions_m->get_user_auctions(1,0,0);

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_auction']);

	}

	public function closed_auctions($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_auctions/closed-v';

		$data['content_auction']=$this->frontend_users_auctions_m->get_user_auctions(1,1,1);

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_auction']);

	}



	public function won_auctions($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_auctions/won-v';

		$data['content_auction']=$this->frontend_users_auctions_m->get_user_winner(0);

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_data']);

	}

	public function showbids($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->get_bids($slug);

		$data['content_view']='frontend_users_auctions/showbids-v';

		//$data['content_auction']=$this->frontend_users_auctions_m->get_user_auctions(1,0,0);

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_data']);

	}

	public function detailbids($slug=NULL)
	{
		

		$data['content_data']=$this->frontend_users_auctions_m->get_detail_bids($slug);

		$data['content_view']='frontend_users_auctions/detailbids-v';

		//$data['content_auction']=$this->frontend_users_auctions_m->get_user_auctions(1,0,0);

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_data']);

	}

	public function hidebid($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->hide_bids($_POST['action'],$_POST['auction']);

		echo $data['content_data'];
		//var_dump($data['content_data']);

	}


}
