<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'third_party/MX/PHPExcel.php'; 
require APPPATH.'third_party/MX/Dompdf/autoload.inc.php'; 

	class Common_Controller extends MX_Controller{

		public function __construct()
		{
			parent::__construct();

		}

	}
	class Excel extends PHPExcel {
		public function __construct() {
			parent::__construct();
		}
	}


	use Dompdf\Dompdf;
	class Pdf extends Dompdf    
	{
		public function __construct()
		{
			parent::__construct();      
			$dompdf = new Dompdf(); 
		}
	}


	class Frontend_Controller extends Common_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->module('frontend_templates');

			$this->load->model('frontend_templates_m');

		}

		public function session_check(){

			if(!isset($_SESSION['logged_in'])){

				redirect('account/login');

			}

		}

		public function settings(){
				
				//$this->load->model('frontend_home/frontend_home_m');
				 //return $CI->frontend_home_m->get_another_thing();

				$site['config_type']="site_settings";
				$data['sitesetting'] = $this->frontend_templates_m->sitesettings($site);

				$site['config_type']="email_settings";
				$data['emailsetting'] = $this->frontend_templates_m->sitesettings($site);

				$site['config_type']="social_media";
				$data['socialsetting'] = $this->frontend_templates_m->socialsettings($site);

				$data['currency'] = $this->frontend_templates_m->currency();

				$data['category'] = $this->frontend_templates_m->category($slug=NULL);
				//$data['category_list'] = $this->frontend_templates_m->category($slug=NULL);
				//var_dump($data['category']);
				return $data;

		}

		public function send_email($emailto,$emailfrom,$name,$subject,$text,$replyto=null){
					
					$header="MIME-Version: 1.0\r\n";
					$header.= "Content-type: text/html; charset=iso-8859-1\r\n";
					$header.="From: ".$name." <".$emailfrom.">\r\n";
					$header.= "Reply-To: ".$emailfrom. "\r\n";
					//$mail = mail($emailto,$subject,$text,$header);
					//return $mail;

					$this->load->library('email'); // Note: no $config param needed
					$this->email->from($emailfrom, $emailfrom);
					$this->email->to($emailto);
					if($replyto != null){
						$this->email->reply_to($replyto, 'email_support');
					}
					$this->email->subject($subject);
					$this->email->message($text);
				
					// Set to, from, message, etc.

					$result = $this->email->send();
					return $result;

		}



		public function buy_gift_coupon_email($bidcoupons)
		{
			
			// var_dump($bidcoupons);
			$emailcontent = $this->frontend_templates_m->emaildata('gift_coupon_email');
				 
			$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
			$text = $emailcontent['content_emails'][0]['user_emails_body'];
	
			$reciverusername = ucfirst($bidcoupons[0]['name']);
			$user_name = $_SESSION['gift_userName'];
			$message = $bidcoupons[0]['message'];
			$couponcode = $bidcoupons[0]['coupon_code'];
			$expiredate = $bidcoupons[0]['coupon_validity'].'Months';
			//print_r($emailcontent);die;
			$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
			$replyto = $emailcontent['emailsetting'][0]['email_support'];
			$emailto = $this->common->encrypt_decrypt('decrypt', $bidcoupons[0]['email']);

			 
			$sitelinknew="<a href='".base_url()."'>".base_url()."</a>"; 
			$sendername= $this->common->encrypt_decrypt('decrypt',$_SESSION['user_name']);  
			$sitenamenew= $this->config->item('sitename');
			
			$activeword = array("[[current_date]]","[[name]]","[[sender]]","[[sitename]]","[[msg]]", "[[couponcode]]", "[[expiredate]]","[[SITENAMELINK]]" );
			//print_r($activeword);
			$replacedword = array(date('Y-m-d'),$user_name, $reciverusername, $sitenamenew, $message, $couponcode,$expiredate, $sitelinknew);
			//print_r($replacedword); die;
			$textnew = str_replace($activeword, $replacedword, $text);
			$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);
			$subject = str_replace('[[sender]]', $reciverusername, $subject);
			$mail = $this->send_email($emailto,$emailfrom,$sitenamenew,$subject,$textnew,$replyto);
			//print_r($subject);die;


		}


		public function buy_credit_email($content_record)
		{
	
			$emailcontent = $this->frontend_templates_m->emaildata('bid_credits');
				 
			$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
			$text = $emailcontent['content_emails'][0]['user_emails_body'];
	
			$paid = $content_record[0]['paid_credit'];
			$free = $content_record[0]['free_credit'] ;
			
			$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
			$replyto = $emailcontent['emailsetting'][0]['email_support'];
			$emailto = $this->common->encrypt_decrypt('decrypt',$_SESSION['email']);
			 
			$sitelinknew="<a href='".base_url()."'>".base_url()."</a>"; 
			$sendername= $this->common->encrypt_decrypt('decrypt',$_SESSION['user_name']);  
			$sitenamenew= $this->config->item('sitename');
			
			$activeword = array("[[NAME]]","[[SITENAME]]", "[[SITENAMELINK]]","[[PAID]]","[[FREE]]" );
			$replacedword = array($sendername, $sitenamenew, $sitelinknew, $paid,  $free);
	
			$textnew = str_replace($activeword, $replacedword, $text);
			$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);
			$mail = $this->send_email($emailto,$emailfrom,$sitenamenew,$subject,$textnew,$replyto);

		
		
		}



		public function logout($data=NULL)
		{

			session_destroy();
			redirect(base_url());

		}

		
		public function convert_currency_price($action, $price) 
		{
			$currency = $this->session->userdata('currency_datas')[0]['currency_code'];
			// $getcurrency = $this->frontend_templates_m->get_records('config_currency','currency_code', $currency);
			$get_basecurrency = $this->frontend_templates_m->get_records('config_currency','base_currency', '1');
			// var_dump($price, $currency,  $get_basecurrency[0]['currency_code']);

			$all_currency = $this->frontend_templates_m->currency(); 
		 
			$s_currency =  $this->session->userdata('currency_datas');

			$get_current_currency = $this->frontend_templates_m->get_records('config_currency','currency', $s_currency[0]['currency']);

			
			if($action ==  "currency_price" ) {

				// if(isset($currency)){				
				// 	for($i=0; $i<count($all_currency); $i++) {
					// if($get_basecurrency[0]['currency_code'] == $getcurrency[0]['currency_code'] ) {	

					return $currency.(number_format($get_current_currency[0]['coversion_rate'] * $price,2,'.',','));			
					
					// } 					 
				// 	} 					
				// }
				//  else {					
				// 	for($i=0; $i<count($all_currency); $i++) { 
				// 		if($all_currency[$i]['currency_code'] == $get_basecurrency[0]['currency_code'] ) {		
				// 			return $get_basecurrency[0]['currency_code'].number_format(($get_basecurrency[0]['coversion_rate'] * $price),'2','.',',');						
				// 		}  					
				// 	}		
				// }
			
			} elseif($action == "base_currency" ) {

				return $get_basecurrency[0]['currency']; 

			}  elseif($action == "currency_code" ) {

				if(isset($currency)){ 

					return $currency; 
					
				} else {
					
					return $get_basecurrency[0]['currency_code']; 

				}

			} elseif($action == 'stripe_currency_price') {
				
				// if(isset($currency)){
							
				// 	for($i=0; $i<count($all_currency); $i++) {
						
						// if($all_currency[$i]['currency_code'] == $getcurrency[0]['currency_code'] ) {
							
							return (number_format($get_current_currency[0]['coversion_rate'] * $price,2,'.',','));	
		
					// 	} 
					 
					// } 	
				
				// }
				//  else {
					
				// 	for($i=0; $i<count($all_currency); $i++) { 

				// 		if($all_currency[$i]['currency_code'] == $get_basecurrency[0]['currency_code'] ) {
							
							
				// 			return number_format(($get_basecurrency[0]['coversion_rate'] * $price),'2','.',',');	
						
				// 		}  
					
				// 	}
		
				// }
			

			}
			  
	
		}

		public function convert_currency_price_only($action, $price) 
		{
			$currency = $this->session->userdata('currency_datas')[0]['currency_code'];
			// $getcurrency = $this->frontend_templates_m->get_records('config_currency','currency_code', $currency);
			$get_basecurrency = $this->frontend_templates_m->get_records('config_currency','base_currency', '1');
			// var_dump($price, $currency,  $get_basecurrency[0]['currency_code']);

			$all_currency = $this->frontend_templates_m->currency(); 
		 
			$s_currency =  $this->session->userdata('currency_datas');

			$get_current_currency = $this->frontend_templates_m->get_records('config_currency','currency', $s_currency[0]['currency']);

			
			if($action ==  "currency_price" ) {

				// if(isset($currency)){				
				// 	for($i=0; $i<count($all_currency); $i++) {
					// if($get_basecurrency[0]['currency_code'] == $getcurrency[0]['currency_code'] ) {	

					return (number_format($get_current_currency[0]['coversion_rate'] * $price,2,'.',','));			
					
					// } 					 
				// 	} 					
				// }
				//  else {					
				// 	for($i=0; $i<count($all_currency); $i++) { 
				// 		if($all_currency[$i]['currency_code'] == $get_basecurrency[0]['currency_code'] ) {		
				// 			return $get_basecurrency[0]['currency_code'].number_format(($get_basecurrency[0]['coversion_rate'] * $price),'2','.',',');						
				// 		}  					
				// 	}		
				// }
			
			} elseif($action == "base_currency" ) {

				return $get_basecurrency[0]['currency']; 

			}  elseif($action == "currency_code" ) {

				if(isset($currency)){ 

					return $currency; 
					
				} else {
					
					return $get_basecurrency[0]['currency_code']; 

				}

			} elseif($action == 'stripe_currency_price') {
				
				// if(isset($currency)){
							
				// 	for($i=0; $i<count($all_currency); $i++) {
						
						// if($all_currency[$i]['currency_code'] == $getcurrency[0]['currency_code'] ) {
							
							return ($getcurrency[0]['coversion_rate'] * $price);	
		
					// 	} 
					 
					// } 	
				
				// }
				//  else {
					
				// 	for($i=0; $i<count($all_currency); $i++) { 

				// 		if($all_currency[$i]['currency_code'] == $get_basecurrency[0]['currency_code'] ) {
							
							
				// 			return number_format(($get_basecurrency[0]['coversion_rate'] * $price),'2','.',',');	
						
				// 		}  
					
				// 	}
		
				// }
			

			}
			  
	
		}

 
	}


	
	


	class Backend_Controller extends Common_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->module('admin_templates');
		}

		public function session_check(){

			if(!isset($_SESSION['logged_in'])){

				redirect('/manage-auction');

			}

		}

		public function logout($data=NULL)
		{

			$loggedout=$this->postadmin->adminlogout($data=NULL); 
			redirect('/manage-auction');  //$this->home->index();//$this->load->view('home');

		}


	}