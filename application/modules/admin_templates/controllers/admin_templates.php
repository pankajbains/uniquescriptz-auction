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
	public function __construct()
	{
					
		parent::__construct();
		//$this->load->database();
		//$this->load->model('home');
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



}
