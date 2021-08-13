<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_users_account extends Frontend_Controller {

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
		$this->load->model('frontend_users_m');
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

	public function logout($slug=NULL)
	{
		
		$this->session_check();
		$this->logout();

	}

	public function account_details($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_user']=$this->frontend_users_m->get_users($_SESSION['user_id']);

		$data['content_view']='frontend_users_account/accountdetails-v';

		$data['content_account']=$this->frontend_templates_m->get_records('user_register', 'email', $_SESSION['email']);

		$this->frontend_templates->inner($data, $this->settings());

	}

	public function account_now($slug=NULL)
	{

		$accountnow=$this->frontend_users_m->account_now($_POST);
		echo $accountnow;

	}

	public function preferences($slug=NULL)
	{

		$this->session_check();

		$data['content_data']=$this->frontend_users_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_account/preferences-v';

		$data['content_preference']=$this->frontend_templates_m->get_records('user_register', 'email', $_SESSION['email']);

		$this->frontend_templates->inner($data, $this->settings());

	}

	public function preferences_now($slug=NULL){

		$preferences=$this->frontend_users_m->preferences_now($_POST);
		echo $preferences;

	}

	public function refer_now($slug=NULL){

			//var_dump($_POST);
			$forgot=$this->frontend_account_m->forgot_now($_POST); 

			$emailcontent = $this->frontend_templates_m->emaildata('referral_invite');
			//var_dump($emailcontent);
			$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
			//var_dump($emailfrom);
			$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
			$text = $emailcontent['content_emails'][0]['user_emails_body'];

			//$username="[[USERSFIRSTNAME]]";
			$refer_name=ucwords($_POST['first_name'].' '.$_POST['last_name']);
			//$sitelink="[[SITENAMELINK]]";
			$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";
			//$username="[[USERNAME]]";
			$friend_name=ucwords($_SESSION['first_name'].' '.$_SESSION['last_name']);
			//$sitename="[[SITENAME]]";
			$sitenamenew=$this->config->item('sitename');

			$activeword = array("[[REFERRALSFIRSTNAME]]", "[[FRIENDSFIRSTNAME]]", "[[SITENAMELINK]]", "[[SITENAME]]");
			$replacedword = array($refer_name, $friend_name, $sitelinknew, $sitenamenew);

			$textnew = str_replace($activeword, $replacedword, $text);
			$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);

			$mail = $this->send_email($_POST['email'],$emailfrom,$sitenamenew,$subject,$textnew);
			//$emailto,$emailfrom,$name,$subject,$text
			echo $mail;

	}

	public function payments($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_account/payments-v';

		$data['content_payments']=$this->frontend_users_m->get_payments($slug);

		$this->frontend_templates->inner($data, $this->settings());
		
	}



}
