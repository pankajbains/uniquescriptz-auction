<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;

require APPPATH.'third_party/MX/Dompdf/autoload.inc.php';


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
		$this->load->helper('cookie');
		
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

		$data['wishlist_data']=$this->frontend_users_auctions_m->get_show_wishlist($_SESSION['user_id']);

		$data['content_view']='frontend_users_auctions/wishlist-v';
		//var_dump($data['content_data']); die;
	

		$this->frontend_templates->inner($data, $this->settings());
		
		

	}

	public function current_auctions($slug=NULL)
	{
		
		$this->session_check();

		$data['content_data']=$this->frontend_users_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_auctions/current-v';

		$data['content_auction']=$this->frontend_users_auctions_m->get_user_auctions(1,0,0);

		$this->frontend_templates->inner($data, $this->settings());

		
		

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


	public function winner_invoice($invoice_id=NULL)
	{
	  //echo dirname(__FILE__);
		$this->session_check();
		// $this->load->library('Pdf');
		
		// $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		// $pdf->SetTitle('Pdf Example');
		// $pdf->SetHeaderMargin(30);
		// $pdf->SetTopMargin(20);
		// $pdf->setFooterMargin(20);
		// $pdf->SetAutoPageBreak(true);
		// $pdf->SetAuthor('Author');
		// $pdf->SetDisplayMode('real', 'default');
		// $pdf->Write(5, 'CodeIgniter TCPDF Integration');
		// $pdf->Output('pdfexample.pdf', 'I');die;

		$data['content_data']=$this->frontend_users_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_auctions/won-v';

		$data['content_auction']=$this->frontend_users_auctions_m->get_winner_invoice($invoice_id);
		

		$user_id=$data['content_auction'][0]['user_id'];
		
		$data['user_data']=$this->frontend_users_auctions_m->get_user_data($user_id);

		$data['user_address']=$this->frontend_users_auctions_m->get_user_address($user_id);

		$data['site_setting']=$this->frontend_users_auctions_m->get_admin_user('site_settings');

		$data['email_setting']=$this->frontend_users_auctions_m->get_admin_user('email_settings');
		

		$data['username']=$_SESSION['first_name'].' '.$_SESSION['last_name'];


		//$this->frontend_templates->invoice($data, $this->settings());
		$this->load->view('frontend_templates/inner_headers_v', $this->settings());
		//$this->load->view('frontend_templates/breadcrumb_v');
		$this->load->view('invoice-v',$data);
		$this->load->view('frontend_templates/inner_footers_v', $this->settings());
		
		//var_dump($data['content_data']);

	}

	public function generatepdfdata($invoice_id=NULL)
	{
	  //echo dirname(__FILE__);
		$this->session_check();
		// $this->load->library('Pdf');
		
		// $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		// $pdf->SetTitle('Pdf Example');
		// $pdf->SetHeaderMargin(30);
		// $pdf->SetTopMargin(20);
		// $pdf->setFooterMargin(20);
		// $pdf->SetAutoPageBreak(true);
		// $pdf->SetAuthor('Author');
		// $pdf->SetDisplayMode('real', 'default');
		// $pdf->Write(5, 'CodeIgniter TCPDF Integration');
		// $pdf->Output('pdfexample.pdf', 'I');die;

		$data['content_data']=$this->frontend_users_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_view']='frontend_users_auctions/won-v';

		$data['content_auction']=$this->frontend_users_auctions_m->get_winner_invoice($invoice_id);
		

		$user_id=$data['content_auction'][0]['user_id'];
		
		$data['user_data']=$this->frontend_users_auctions_m->get_user_data($user_id);

		$data['user_address']=$this->frontend_users_auctions_m->get_user_address($user_id);

		$data['site_setting']=$this->frontend_users_auctions_m->get_admin_user('site_settings');

		$data['email_setting']=$this->frontend_users_auctions_m->get_admin_user('email_settings');
		

		$data['username']=$_SESSION['first_name'].' '.$_SESSION['last_name'];
		


		//$this->frontend_templates->generatepdf($data, $this->settings());

		$dompdf = new Dompdf();
		$html=$this->load->view('frontend_users_auctions/download_invoice-v',$data,TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		$dompdf->render();
		$time =  $data['content_auction'][0]['auction_id'];
		
		// Output the generated PDF to Browser
		$dompdf->stream("invoice-". $time);
		
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
	}

	public function add_wishlist($slug=NULL)
	{

		$user_id = $_SESSION['user_id'];
		$auction_id=$_POST['auction_id'];
		$status=$_POST['status'];
		if(empty($user_id)){
			$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
			
			$wdata=json_decode($whishlist_cookie_data);
			
			if($status==1){
				$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
				
			$wdata=json_decode($whishlist_cookie_data);
			
			$auction_id_temp=array(1);
			if(isset($wdata) && !empty($wdata) && isset($auction_id_temp) && !empty($auction_id_temp)){
			$auction_id_temp=array_merge($wdata,$auction_id_temp);
			}
				array_push($auction_id_temp,$auction_id);
				$cookie_data=json_encode($auction_id_temp);
				$cookie= array(

					'name'   => 'wishlist_cookie',
					'value'  => $cookie_data,                            
					'expire' => '2592000',                                                                                   
					'secure' => TRUE
				);
				
				echo 1;
			}else{
				$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
				
			$wdata=json_decode($whishlist_cookie_data);
			
			$auction_id_temp=array($auction_id);
			if(isset($wdata) && !empty($wdata) ){
				$auction_id_temp=array_diff($wdata,$auction_id_temp);
			}
				$cookie_data=json_encode($auction_id_temp);
				$cookie= array(
					'name'   => 'wishlist_cookie',
					'value'  => $cookie_data,                            
					'expire' => '2592000',                                                                                   
					'secure' => TRUE
				);
				echo 0;
			}
			$this->input->set_cookie($cookie);
		} else {
			$data['content_data']=$this->frontend_users_auctions_m->save_wishlist($user_id, $auction_id, $status);
		}
		echo $data['content_data'];
		
	}

	public function invoice($data=NULL, $slug=NULL){
		
		$this->load->view('frontend_templates/inner_headers_v', $slug);
		//$this->load->view('frontend_templates/breadcrumb_v');
		$this->load->view('invoice-v',$data);
		$this->load->view('frontend_templates/inner_footers_v', $slug);

	}

	public function generatepdf($data=Null,$slug=NULL){

		

        $dompdf = new Dompdf();
		$html=$this->load->view('frontend_users_auctions/download_invoice-v',$data,TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		$dompdf->render();
		$time =  $data['content_auction'][0]['auction_id'];
		
		// Output the generated PDF to Browser
		$dompdf->stream("invoice-". $time);


    }


}
