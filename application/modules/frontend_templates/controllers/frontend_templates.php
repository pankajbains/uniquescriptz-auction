<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// use Dompdf\Dompdf;

// require APPPATH.'third_party/MX/Dompdf/autoload.inc.php'; 

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
		
		if(isset($_SESSION['user_id'])){
			$data['wishlist_data']=$this->frontend_templates_m->get_wishlist($_SESSION['user_id']);
		}else{
			$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
			
			$temp_data=array();
			$wdata=json_decode($whishlist_cookie_data);
			
			$i=0;
			if(isset($wdata) && !empty($wdata)){
			foreach($wdata as $val){
				$temp_data[$i]['auction_id']=$val;
				$i++;
			}
		}
		$data['wishlist_data']=$temp_data;
	}
		
	$data['wishlist_data2']=$data['wishlist_data'];
		//print_r($data['wishlist_data']); die;
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

	// public function invoice($data=NULL, $slug=NULL)
	// {
		
	// 	$this->load->view('frontend_templates/inner_headers_v', $slug);
	// 	//$this->load->view('frontend_templates/breadcrumb_v');
	// 	$this->load->view('frontend_templates/invoice',$data);
	// 	$this->load->view('frontend_templates/inner_footers_v', $slug);

	// }

	// public function generatepdf($data=Null,$slug=NULL){

		

    //     $dompdf = new Dompdf();
	// 	$html=$this->load->view('frontend_templates/download_invoice',$data,TRUE);
	// 	$dompdf->loadHtml($html);
	// 	$dompdf->setPaper('A4', 'landscape');
	// 	// Render the HTML as PDF
	// 	$dompdf->render();
	// 	$time =  $data['content_auction'][0]['auction_id'];
		
	// 	// Output the generated PDF to Browser
	// 	$dompdf->stream("invoice-". $time);


    // }
	
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
