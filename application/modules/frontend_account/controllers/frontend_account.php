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
		// $this->load->library('paypal_lib');
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

	public function activate($slug=Null)
	{
		
		$this->frontend_account_m->activate_account($slug);		 
		$this->session->set_flashdata('content_message', '1');
		redirect( base_url().'account/login.html'); 

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

		$data['content_user']=$this->frontend_account_m->get_users($_SESSION['user_id']);

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
		//print_r($emailfrom); die;
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

			$mail = '1'.$forgot;
			$this->send_email($_POST['email'],$emailfrom,$sitenamenew,$subject,$textnew);
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
		//var_dump($_POST);die;

		$recid = $this->frontend_account_m->gift_now($_POST);
		$_SESSION['gift_userName'] = $_POST['first_name'].' '.$_POST['last_name'];
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
			//print_r($data['content_record']); die;
			$data['content_gateway']=$this->frontend_templates_m->get_records('manage_paymentgateway','status','1');

			$data['content_view']='frontend_account/gateway-v';

			$this->frontend_templates->inner($data, $this->settings());

		}


	}

	public function auction_pay(){
		
		
		$this->session_check();
		if($this->uri->segment(3)!=''){
			//echo $auction_id = $this->uri->segment(3);
		$data['content_record']=$this->frontend_templates_m->get_records('auction_won','auction_id',$this->uri->segment(3));
		$data['content_gateway']=$this->frontend_templates_m->get_records('manage_paymentgateway','status','1');
		$data['content_invoice']=$this->frontend_templates_m->get_records('auction_invoice','auction_id',$this->uri->segment(3));

		$data['content_view']='frontend_account/auction_pay-v';

		$this->frontend_templates->inner($data, $this->settings());

		 }


	}

	
	public function stripe_payment()
	{
		$this->session_check();
		
		
		if($this->uri->segment(2) == "credit_pay"){
		
			$content_record=$this->frontend_templates_m->get_records('user_bidcredit_rate','id',$this->uri->segment(4));
			$content_gateway=$this->frontend_templates_m->get_records('manage_paymentgateway','id', $this->uri->segment(3));
			$content_data = $this->frontend_account_m->save_stripe_data($this->input->get(),$content_record, $content_gateway, $this->uri->segment(2));
	
			$this->buy_credit_email($content_record);
			echo "<br/>";
			var_dump($_SESSION);
			var_dump($content_record);
			echo "<br/>";
			var_dump($content_gateway);
			echo "<br/>";
			var_dump($content_data);
		} else if($this->uri->segment(2) == "coupon_pay"){ 


			$content_record=$this->frontend_templates_m->get_records('user_bidcoupon_rate','id',$this->uri->segment(4));
			$content_gateway=$this->frontend_templates_m->get_records('manage_paymentgateway','id', $this->uri->segment(3));
			 
			$content_data = $this->frontend_account_m->save_stripe_data($this->input->get(),$content_record, $content_gateway, $this->uri->segment(2));

			$bidcoupon_id = $this->input->get('bidcoupon_id'); 
			$bidcoupons =  $this->frontend_templates_m->get_records('user_bidcoupon_records','id', $bidcoupon_id);
			$this->buy_gift_coupon_email($bidcoupons);
			echo "<br/>";
			var_dump($_SESSION);

		}else{
			$data=$this->input->get();
			$content_record=$this->frontend_templates_m->get_records('auction_invoice','auction_id',$data['auction_id']);

			$content_gateway=$this->frontend_templates_m->get_records('manage_paymentgateway','id', $this->uri->segment(3));

			$content_data = $this->frontend_account_m->save_stripe_data($this->input->get(),$content_record, $content_gateway, $this->uri->segment(2));
			
			var_dump($content_record);
			echo "<br/>";
			var_dump($content_gateway);
			echo "<br/>";
			var_dump($content_data);

		}


		if( $content_data == "invalid_request_error") { 

			$this->session->set_flashdata('pay_error', 'error');
			//redirect( base_url().'user/account_details'); 
		 
		} else { 
 
			
			$this->session->set_flashdata('pay_success', 'success');
			//redirect( base_url().'user/account_details');
			 
		}
	 
	
	 
		

	}

	function reset_user_password(){
		$token = $_GET['token'];
		$query = $this->db->get_where('password_reset', array('token' => $token));
		$result2 = $query->result_array();
		if(count($result2) > 0){

		
		$requestdate = $result2[0]['time'];
		$currentTime = time();
		$timediff = $currentTime - $requestdate;
		if($timediff > 300){
			$data['result'] = 'Link Expired'; 
			$data['content_view']='frontend_account/update_user_password-v';
			$this->frontend_templates->inner($data, $this->settings());
			
		}else{
			//echo 'Valid Link';
			$data['result'] = $result2; 
			$data['content_view']='frontend_account/update_user_password-v';
			$this->frontend_templates->inner($data, $this->settings());
		}
	}else{
		$data['result'] = 'Invalid Token'; 
		$data['content_view']='frontend_account/update_user_password-v';
			$this->frontend_templates->inner($data, $this->settings());
	}
		 $timediff;
	}

	function update_user_password(){
		$token=$_POST['token'];
		$password=$_POST['password'];
		$query = $this->db->get_where('password_reset', array('token' => $token));
		$result2= $query->result_array();
		$email2 = $result2[0]['email'];
		$email = $this->common->encrypt_decrypt('encrypt',$email2);
		$datau = array(
			'password' =>$this->common->encrypt_decrypt('encrypt',$password)
		);
		$this->db->where('email',$email);
		$query=$this->db->update('user_register', $datau);

		$this->db->where('token',$token);
		$datau = array('time'=>0);
		$query=$this->db->update('password_reset', $datau);
		echo 1;
	}



	public function paygateway()
	{
		$this->session_check(); 
	
		//$site['config_type'] = "site_settings";
		//$sitesetting = $this->settings();//sitesettings($site);
		var_dump($_SESSION);
		// Set variables for paypal form
		$returnURL = base_url().'frontend_account/success';
		$notifyURL = base_url().'frontend_account/ipn';
		$cancelURL = base_url().'user/account_details';
		// http://localhost/uniquescriptz-auction/frontend_account/ipn

		$content_gateway = $this->frontend_templates_m->get_records('manage_paymentgateway','id',$this->uri->segment(3));
		
		$this->common->add_field('currency_code', 'USD');
		//$this->common->add_field('business',$content_gateway[0]['gateway_email']);

		if($this->uri->segment(2) == "credit_pay"){

			$content_record = $this->frontend_templates_m->get_records('user_bidcredit_rate','id',$this->uri->segment(4));
			$percent =  $content_gateway[0]['gateway_fee']*$content_record[0]['credit_rate']/100;
			$price =  number_format(($percent)+$content_gateway[0]['gateway_other_fee']+$content_record[0]['credit_rate'],'2','.',' ');
	
			$tempdatas = array( 
				'content_record'=>  $this->uri->segment(4),
				'credit_pay' => $this->uri->segment(2), 
				'paymentgateway_id' => $content_gateway[0]['id'], 
			);
	
			$this->session->set_userdata('temp_data', $tempdatas);
			$this->common->add_field('item_name', 'Credit Payment');
			$this->common->add_field('item_desc',  'Credit Payment for ID '.$this->uri->segment(4).' worth '.$price);

		} else if($this->uri->segment(2) == "auction_pay"){

			$content_invoice=$this->frontend_templates_m->get_records('auction_invoice','auction_id',$_POST['auction_id']);
			$percent = $content_gateway[0]['gateway_fee']*$content_invoice[0]['invoice_amount']/100;
			$price= number_format(($percent)+$content_gateway[0]['gateway_other_fee']+$content_invoice[0]['invoice_amount'],'2','.',' ');
			$this->common->add_field('item_name', $content_invoice[0]['auction_name']);
			$this->common->add_field('item_desc',  $content_invoice[0]['auction_name']);

		}else{

 			$content_record = $this->frontend_templates_m->get_records('user_bidcoupon_rate','id', $this->uri->segment(4));
			$percent = $content_gateway[0]['gateway_fee']*$content_record[0]['coupon_rate']/100;
			$price= number_format(($percent)+$content_gateway[0]['gateway_other_fee']+$content_record[0]['coupon_rate'],'2','.',' ');
		 
			$tempdatas = array( 
				'user_bidcoupon_record_id'=>  $_POST['bidcoupon_id'],
				'user_bidcoupon_id' => $this->uri->segment(4), 
				'paymentgateway_id' => $content_gateway[0]['id'], 
			);
	
			$this->session->set_userdata('temp_data', $tempdatas);
			$this->common->add_field('item_name', 'Coupon Payment');
			$this->common->add_field('item_desc',  'Coupon Payment for ID '.$this->uri->segment(4).' worth '.$price);

		}
		
		// Add fields to paypal form
		$this->common->add_field('return', $returnURL);
		$this->common->add_field('cancel_return', $cancelURL);
		$this->common->add_field('notify_url', $notifyURL);

		$this->common->add_field('custom', $_SESSION['user_id']); 
		$this->common->add_field('amount', $price);
		$this->common->paypal_auto_form();
	 
	}



	public function success(){
		$this->session_check();
		
		var_dump($temp_data);

		$temp_data = $this->session->userdata('temp_data');
		$data['user_id'] = $_POST['custom']; 
		$data['txn_id']    = $_POST["txn_id"];
		$data['payment_gross'] = $_POST["mc_gross"];
		$data['currency_code'] = $_POST["mc_currency"];
		$data['payer_email'] = $_POST["payer_email"];
		$data['payment_status']    = $_POST["payment_status"];
		$paypalURL = $this->common->paypal_url; 
		$result = $this->common->curlPost($paypalURL,$_POST);
		
		if(preg_match("/VERIFIED/i", $result)){
			 
			$records= $this->frontend_account_m->save_paypal_data($_POST, $temp_data);
			
		}

		if($temp_data['user_bidcoupon_id'] != '' && $records == "success") {

			$bidcoupons =  $this->frontend_templates_m->get_records('user_bidcoupon_records','id', $temp_data['user_bidcoupon_id']);
		 	$this->buy_gift_coupon_email($bidcoupons);
			
		} else {
			$content_record=$this->frontend_templates_m->get_records('user_bidcredit_rate','id', $temp_data['content_record']);
			
			$this->buy_credit_email($content_record);
		
		}

		
		if( $records == "success") { 

			$this->session->set_flashdata('pay_success', 'success');
			//redirect( base_url().'user/account_details'); 
			
		} else { 
			
			
			$this->session->set_flashdata('pay_error', 'error');
			//redirect( base_url().'user/account_details');
			 
		}
	 

	}
	
	
	// public function ipn(){
		//paypal return transaction details array
		// $paypalInfo = $this->input->post();
		// $paypalURL = $this->paypal_lib->paypal_url; 
		// $data['user_id'] = $paypalInfo['custom']; 
		// $data['txn_id']    = $paypalInfo["txn_id"];
		// $data['payment_gross'] = $paypalInfo["mc_gross"];
		// $data['currency_code'] = $paypalInfo["mc_currency"];
		// $data['payer_email'] = $paypalInfo["payer_email"];
		// $data['payment_status']    = $paypalInfo["payment_status"];
		// $paypalURL = $this->paypal_lib->paypal_url;        
		// $result = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
	 
		// // check whether the payment is verified
		// if(preg_match("/VERIFIED/i", $result)){
		// 	//insert the transaction data into the database 
		// 	$this->frontend_account_m->save_paypal_data($data);
		// }
	// }


	public function cancel(){
		$this->session_check();
		$data['content_account']=$this->frontend_templates_m->get_records('user_register', 'email', $_SESSION['email']);
		$data['content_view']='frontend_users_account/accountdetails-v';
		
		$this->frontend_templates->inner($data, $this->settings());
		
	}
	

	public function change_currency($data)
	{
		 
		$currency_data  = $this->frontend_account_m->savetemp_currency($data); 
		echo $currency_data;

	}

	// public function change_currency($data)
	// { 
	// 	$currency_data  = $this->frontend_account_m->change_currency($data); 
	// 	echo $currency_data;

	// }

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
