<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_account extends Frontend_Controller {

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
		$this->load->model('frontend_account_m');
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

	public function login($slug=NULL)
	{

		$data['content_data']=$this->frontend_account_m->get_page($this->router->fetch_method());

		$data['content_view']='frontend_account/login-v';

		$this->frontend_templates->inner($data, $this->settings());
		
	}

	public function register($slug=NULL)
	{
		$data['content_data']=$this->frontend_account_m->get_page($this->router->fetch_method());

		$data['content_view']='frontend_account/register-v';

		$this->frontend_templates->inner($data, $this->settings());

	}

	public function forgot_password($slug=NULL)
	{

		$data['content_data']=$this->frontend_account_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_account/forgotpassword-v';

		$this->frontend_templates->inner($data, $this->settings());
		
	}



	public function gift_credits($slug=NULL)
	{
		
		//var_dump($this->settings());

		$data['content_data']=$this->frontend_account_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_credits']=$this->frontend_account_m->get_gift_credits();

		$data['content_view']='frontend_account/giftcredits-v';

		$this->frontend_templates->inner($data, $this->settings());
		
		//var_dump($data['content_credits']);

	}

	public function buy_credits($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_account_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_credits']=$this->frontend_account_m->get_bid_credits();

		$data['content_view']='frontend_account/buycredits-v';

		$this->frontend_templates->inner($data, $this->settings());
		
	}

	public function register_now($data=FALSE)
	{

		$data['content_data']=$this->frontend_account_m->register_now($_POST);

		if($data['content_data']!=2){

			$emailcontent = $this->frontend_templates_m->emaildata('user_registration');
			//var_dump($emailcontent);
			$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
			//var_dump($emailfrom);
			$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
			$text = $emailcontent['content_emails'][0]['user_emails_body'];

			//$username="[[USERSFIRSTNAME]]";
			$usernamenew=ucfirst($_POST['first_name']);
			//$activelink="[[ACTIVATELINK]]";
			$activelinknew="<a href='".base_url()."account/activate/".$data['content_data'].".html'>".base_url()."account/activate/".$data['content_data'].".html</a>";
			//$sitelink="[[SITENAMELINK]]";
			$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";
			//$username="[[USERNAME]]";
			$usernamenew=$_POST['nickname'];//$username;
			//$password="[[PASSWORD]]";
			$passwordnew=$_POST['password'];
			//$sitename="[[SITENAME]]";
			$sitenamenew=$this->config->item('sitename');
			
			$activeword = array("[[USERSFIRSTNAME]]", "[[ACTIVATELINK]]", "[[SITENAMELINK]]", "[[USERNAME]]", "[[PASSWORD]]", "[[SITENAME]]");
			$replacedword = array($usernamenew, $activelinknew, $sitelinknew, $usernamenew, $passwordnew, $sitenamenew);

			$textnew = str_replace($activeword, $replacedword, $text);
			$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);

			$mail = $this->send_email($_POST['email'],$emailfrom,$sitenamenew,$subject,$textnew);
			//$emailto,$emailfrom,$name,$subject,$text
			echo $mail;

		}else{

			echo $data['content_data'];

		}

	}


	public function login_now($data=FALSE)
	{

		$loggedin=$this->frontend_account_m->login_now($_POST);
		echo $loggedin;

	}

	public function forgot_now($data=FALSE)
	{
		//var_dump($_POST);
		$forgot=$this->frontend_account_m->forgot_now($_POST); 

		$emailcontent = $this->frontend_templates_m->emaildata('forgot_password');
		//var_dump($emailcontent);
		$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
		//var_dump($emailfrom);
		$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
		$text = $emailcontent['content_emails'][0]['user_emails_body'];

			//$username="[[USERSFIRSTNAME]]";
			$usernamenew=ucfirst($_POST['first_name']);
			//$sitelink="[[SITENAMELINK]]";
			$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";
			//$username="[[USERNAME]]";
			$usernamenew=$_POST['nickname'];//$username;
			//$password="[[PASSWORD]]";
			$passwordnew=$_POST['password'];
			//$sitename="[[SITENAME]]";
			$sitenamenew=$this->config->item('sitename');
			
			$activeword = array("[[USERSFIRSTNAME]]", "[[SITENAMELINK]]", "[[USERNAME]]", "[[PASSWORD]]", "[[SITENAME]]");
			$replacedword = array($usernamenew, $sitelinknew, $usernamenew, $passwordnew, $sitenamenew);

			$textnew = str_replace($activeword, $replacedword, $text);
			$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);

			$mail = '1'.$forgot;// $this->send_email($_POST['email'],$emailfrom,$sitenamenew,$subject,$textnew);
			//$emailto,$emailfrom,$name,$subject,$text
			echo $mail;

	}

	public function buy_now($data=NULL){
	
		$this->session_check();
		//var_dump($_POST);

		$result = $this->frontend_account_m->buy_now($_POST);
		return $result;
	}


	public function gift_now($data=NULL){
	
		$this->session_check();
		//var_dump($_POST);

		$recid = $this->frontend_account_m->gift_now($_POST);

		header("location:coupon_pay/".$recid."/".$_POST['couponid'].'.html');

		//redirect('account/coupon_pay/'.$recid.'/'.$_POST['couponid']);

	}

	public function coupon_pay(){
		

		$this->session_check();
		if($this->uri->segment(3)!=''&&$this->uri->segment(4)!=''){
			
			$data['content_record']=$this->frontend_templates_m->get_records('user_bidcoupon_rate','id',$this->uri->segment(4));
			$data['content_gateway']=$this->frontend_templates_m->get_records('manage_paymentgateway','status','1');

			$data['content_view']='frontend_account/gateway-v';

			$this->frontend_templates->inner($data, $this->settings());

		}


	}

	public function credit_pay(){
		

		$this->session_check();
		if($this->uri->segment(3)!=''){
			
			$data['content_record']=$this->frontend_templates_m->get_records('user_bidcredit_rate','id',$this->uri->segment(3));
			$data['content_gateway']=$this->frontend_templates_m->get_records('manage_paymentgateway','status','1');

			$data['content_view']='frontend_account/gateway-v';

			$this->frontend_templates->inner($data, $this->settings());

		}


	}


/*
	public function details($slug=FALSE)
	{

		$this->session_check();
		
		//var_dump($slug.''.$this->uri->segment(2));
		$data['activities']=$this->frontend_main_m->get_activities();
		$data['manage_hotel'] = $this->frontend_main_m->get_hotel($_SESSION['userid']);
		$data['manage_media'] = $this->frontend_main_m->get_media($_SESSION['userid']);
		
		//$data['datamedia'] = $this->frontend_main_m->get_activity_media($slug);
		$data['datareview']=$this->frontend_main_m->get_activity_review($slug);

		$data['datalist']=$this->frontend_main_m->get_activity_detail($slug);
		
		$data['googlelist']=$this->frontend_main_m->get_google_detail($data['datalist'][0]['location_name'], $data['datalist'][0]['state']);

		$data['content_view']='frontend_main/activity_details';
		$this->frontend_templates->inner($data);

		//var_dump($data['googlelist']);
		//var_dump($_SESSION);
	}


	public function reviews($slug=FALSE)
	{
		//var_dump($_POST);
		$reviews = $this->frontend_main_m->postreview($_POST);
		return $reviews;

	}

	public function process($slug=FALSE)
	{
		//var_dump($_POST);
		$process = $this->frontend_main_m->postcontact($_POST);
		return $process;

	}

	public function homecontact($slug=FALSE)
	{
		//var_dump($_POST);
		$process = $this->frontend_main_m->homecontact($_POST);
		return $process;
		//var_dump($process);
	}


	public function post_profile($data=NULL){
	
		$this->session_check();
		$this->home_m->profile($_POST); // Calling Insert Model and its function.

	}

*/
}
