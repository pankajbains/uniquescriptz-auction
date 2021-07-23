<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Common
	{
		private $CI;

		function __construct()
		{
			$this->CI = get_instance();
		}

		public function frand($min, $max, $decimals = 0) {
		  $scale = pow(10, $decimals);
		  return mt_rand($min * $scale, $max * $scale) / $scale;
		}

		public function strreplace($data){

			$string = str_replace(' ', '-', $data);
			$res = preg_replace("/[^a-zA-Z\-]/", "", $string);
			return $res;

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


		public function userpass(){

			$alpha = "abcdefghijklmnopqrstuvwxyz";
			$alpha1= substr(str_shuffle($alpha), 0, 3);

			$alpha_upper = strtoupper($alpha);
			$alpha_upper1=substr(str_shuffle($alpha_upper), 0, 3);

			$numeric = "0123456789";
			$numeric1= substr(str_shuffle($numeric), 0, 3);

			$special = "!@$*";
			$special1=substr(str_shuffle($special), 0, 1);

			$rn= $alpha1 . $alpha_upper1 . $numeric1 . $special1; //$chars
			// the finished password
			$rn = str_shuffle($rn);

			return $rn;

		}

		public function couponcode(){

			$alpha = "abcdefghijklmnopqrstuvwxyz";
			$alpha1= substr(str_shuffle($alpha), 0, 3);

			$alpha_upper = strtoupper($alpha);
			$alpha_upper1=substr(str_shuffle($alpha_upper), 0, 3);

			$numeric = "0123456789";
			$numeric1= substr(str_shuffle($numeric), 0, 3);

			$rn= $alpha1 . $alpha_upper1 . $numeric1; //$chars
			// the finished password
			$rn = str_shuffle($rn);

			return $rn;

		}

		public function send_email($emailto,$emailfrom,$name,$subject,$text){

					$header="MIME-Version: 1.0\r\n";
					$header.= "Content-type: text/html; charset=iso-8859-1\r\n";
					$header.="From: ".$name." <".$emailfrom.">\r\n";
					$header.= "Reply-To: ".$emailfrom. "\r\n";
					//$mail = mail($emailto,$subject,$text,$header);
					//return $mail;

					$this->CI->load->library('email'); // Note: no $config param needed
					$this->CI->email->from('pankajbains@gmail.com');
					$this->CI->email->to('dedesigns@gmail.com');
					$this->CI->email->subject($text);
					$this->CI->email->message($subject);
				
					// Set to, from, message, etc.

					$result = $this->CI->email->send();
					return $result;

		}



	}

?>