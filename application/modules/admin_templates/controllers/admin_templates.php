<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_templates extends Backend_Controller {

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
	private $CI;
	public function __construct()
	{
					
		parent::__construct();
		$this->load->database();
		$this->CI = get_instance();

			$this->CI =& get_instance();
			$this->CI->load->helper('url');
			$this->CI->load->helper('form');
			$this->CI->load->config('paypallib_config');

		$this->load->model('frontend_templates/frontend_templates_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
	}

	public function inner($data=NULL)
	{
		$this->load->view('admin_templates/headers_v');
		$this->load->view('admin_templates/breadcrumb_v');

		$this->load->view('admin_templates/inner_v',$data);
		$this->load->view('admin_templates/inner_footers_v',$data);

	}

	public function base_currency($data=NULL){

		$query = $this->db->get_where('config_currency', array('base_currency' => '1'));
		$result = $query->result_array();
		//var_dump($query->result_array());
		return $result[0]['currency_code'];

	}

	function encrypt_decrypt($action, $string) {

			$output = false;

			$encrypt_method = "AES-256-CBC";
			$secret_key = 'UNIQUESCRIPTZKEY';
			$secret_iv = 'UNIQUESCRIPTZIV';

			// hash
			$key = hash('sha256', $secret_key);
			
			// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
			$iv = substr(hash('sha256', $secret_iv), 0, 16);

			if( $action == 'encrypt' ) {
				$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
				$output = base64_encode($output);
			}else if( $action == 'decrypt' ){
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}

			return $output;
	}


	function country($data=FALSE) {

			if ($data === FALSE)
				{
						$query = $this->db->get('country');
						return $query->result_array();

				}else{

						$query = $this->db->get_where('country', array('Code2' => $data));
						return $query->result_array();
						//var_dump($query->result_array());

				}

			return $output;

	}


		function getRealIpAddr()
		{
			if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
			{
			  $ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
			{
			  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
			  $ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}

		public function send_email($emailto,$emailfrom,$name,$subject,$text, $domdpf=null){

			$header="MIME-Version: 1.0\r\n";
			$header.= "Content-type: text/html; charset=iso-8859-1\r\n";
			$header.="From: ".$name." <".$emailfrom.">\r\n";
			$header.= "Reply-To: ".$emailfrom. "\r\n";
			//$mail = mail($emailto,$subject,$text,$header);
			//return $mail;

			$this->CI->load->library('email'); // Note: no $config param needed
			$this->CI->email->from($emailfrom);
			$this->CI->email->to($emailto);
			$this->CI->email->subject($subject);
			$this->CI->email->message($text); 
			// $this->CI->email->attach($domdpf); 
			// $this->CI->email->string_attach($domdpf, 'base64.pdf', 'application/pdf');
			// Set to, from, message, etc.

			$result = $this->CI->email->send();
			return $result;

}
		function update_password(){
			$token=$_POST['token'];
			$password=$_POST['password'];
			$query = $this->db->get_where('password_reset', array('token' => $token));
			$result2= $query->result_array();
			$email = $result2[0]['email'];
			$datau = array(
				'admin_password' =>md5($password),
				'admin_cpassword' =>md5($password)
			);
			$this->db->where('admin_email',$email);
			$query=$this->db->update('admin_users', $datau);

			$this->db->where('token',$token);
			$datau = array('time'=>0);
			$query=$this->db->update('password_reset', $datau);
			echo 1;
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


		function check_email(){
			$email=$_POST['email_id'];
			$query = $this->db->get_where('admin_users', array('admin_email' => $email));
					$result= $query->result_array();
					if(count($result)>0){
						//var_dump($emailcontent);
						$datau=array('email'=>$email, 'token'=>RAND(11111,99999), 'time'=>time());
						$query=$this->db->insert('password_reset', $datau);
						$this->db->order_by("id", "DESC");
						$query = $this->db->get_where('password_reset', array('email' => $email));
						
						$result2= $query->result_array();
						$emailcontent = $this->frontend_templates_m->emaildata('reset_password');
						$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
						$text = $emailcontent['content_emails'][0]['user_emails_body'];
						$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
						//var_dump($emailfrom);
						$sitenamenew=$this->config->item('sitename');
						
						$activeword = array("[[USERSFIRSTNAME]]", "[[ACTIVATELINK]]", "[[SITENAMELINK]]", "[[USERNAME]]", "[[PASSWORD]]", "[[SITENAME]]");
						$replacedword = array($usernamenew, $activelinknew, $sitelinknew, $usernamenew, $passwordnew, $sitenamenew);

						$link = "<a href='".base_url()."reset-password.html?token=".$result2[0]['token']."'>Link</a>";
						$textnew = str_replace('[[USER_NAME]]', $result[0]['admin_username'], $text);
						$textnew = str_replace('[[LINK]]', $link, $textnew);
						$subject = $subjectold;
						$mail = $this->send_email($email,$emailfrom,$sitenamenew,$subject,$textnew);
						//$emailto,$emailfrom,$name,$subject,$text
						

						echo 1;
					}else{
						echo 0;
					}
		}

		function check_user_email(){
			$email2=$_POST['email_id'];
			$email = $this->common->encrypt_decrypt('encrypt',$email2);
			$query = $this->db->get_where('user_register', array('email' => $email));
					$result= $query->result_array();
					if(count($result)>0){
						//var_dump($emailcontent);
						$datau=array('email'=>$email2, 'token'=>RAND(11111,99999), 'time'=>time());
						$query=$this->db->insert('password_reset', $datau);
						$this->db->order_by("id", "DESC");
						$query = $this->db->get_where('password_reset', array('email' => $email2));
						
						$result2= $query->result_array();
						$emailcontent = $this->frontend_templates_m->emaildata('reset_password');
						$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
						$text = $emailcontent['content_emails'][0]['user_emails_body'];
						$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
						//var_dump($emailfrom);
						$sitenamenew=$this->config->item('sitename');
						
						$activeword = array("[[USERSFIRSTNAME]]", "[[ACTIVATELINK]]", "[[SITENAMELINK]]", "[[USERNAME]]", "[[PASSWORD]]", "[[SITENAME]]");
						$replacedword = array($usernamenew, $activelinknew, $sitelinknew, $usernamenew, $passwordnew, $sitenamenew);

						$link = "<a href='".base_url()."reset-user-password.html?token=".$result2[0]['token']."'>Link</a>";
						$textnew = str_replace('[[USER_NAME]]', $result[0]['admin_username'], $text);
						$textnew = str_replace('[[LINK]]', $link, $textnew);
						$subject = $subjectold;
						$mail = $this->send_email($email2,$emailfrom,$sitenamenew,$subject,$textnew);
						//$emailto,$emailfrom,$name,$subject,$text
						

						echo 1;
					}else{
						echo 0;
					}
		}

		function reset_password(){
			$token = $_GET['token'];
			$query = $this->db->get_where('password_reset', array('token' => $token));
			$result2 = $query->result_array();
			if(count($result2) > 0){

			
			$requestdate = $result2[0]['time'];
			$currentTime = time();
			$timediff = $currentTime - $requestdate;
			if($timediff > 300){
				$data['result'] = 'Link Expired'; 
				$this->load->view('admin_templates/reset_password_v', $data);
				
			}else{
				//echo 'Valid Link';
				$data['result'] = $result2; 
				$this->load->view('admin_templates/reset_password_v', $data);
			}
		}else{
			$data['result'] = 'Invalid Token'; 
				$this->load->view('admin_templates/reset_password_v', $data);
		}
			echo $timediff;
		}

		




}
