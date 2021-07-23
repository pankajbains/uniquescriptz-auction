<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_templates extends Frontend_Controller {

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

	public function index($data, $slug=NULL)
	{
		$this->load->view('frontend_templates/inner_headers_v', $slug);
		//$this->load->view('frontend_templates/breadcrumb_v');
		$this->load->view('frontend_templates/index_v',$data);
		$this->load->view('frontend_templates/inner_footers_v', $slug);

	}

	public function inner($data=NULL, $slug=NULL)
	{
		$this->load->view('frontend_templates/inner_headers_v', $slug);
		//$this->load->view('frontend_templates/breadcrumb_v');
		$this->load->view('frontend_templates/inner_v',$data);
		$this->load->view('frontend_templates/inner_footers_v', $slug);

	}
	
	public function latestbidder($data=NULL, $slug=NULL)
	{
		$this->load->view('frontend_templates/inner_v',$data);

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
