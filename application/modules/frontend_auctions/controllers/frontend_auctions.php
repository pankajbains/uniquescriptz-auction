<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_auctions extends Frontend_Controller {

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
		$this->load->model('frontend_auctions_m');
		//$this->load->model('post_m');
		$this->load->library('pdf');
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

	public function category($slug=NULL)
	{
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}else{
			$page=1;
		}
		//delete_cookie('wishlist_cookie');
		if(isset($_SESSION['user_id'])){
			$data['wishlist_data']=$this->frontend_auctions_m->get_wishlist($_SESSION['user_id']);
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
		$data['content_data']=$this->frontend_auctions_m->get_items($slug,$page);
		
		$data['total_item']=$this->frontend_auctions_m->get_item_count($slug);
	
		$data['total_item']=count($data['total_item'][0]);
		//print_r($data['total_item']); die;

		$data['content_view']='frontend_auctions/list-v';

		$this->frontend_templates->inner($data, $this->settings());
		
	}

	public function product($slug=NULL, $slugid=NULL)
	{
		//var_dump($slugid);
		$data['content_data']=$this->frontend_auctions_m->get_details($slugid);
		
		$data['content_bidunique_data']=$this->frontend_auctions_m->get_bids_uniquedetails($slugid);

		$data['content_featured']=$this->frontend_auctions_m->get_features($slugid);

		$data['content_user']=$this->frontend_auctions_m->get_users($_SESSION['user_id']);

		$data['content_bids'] = $this->frontend_auctions_m->bidchart($slugid);

		$data['content_related'] = $this->frontend_auctions_m->related($data['content_data'][0]['auction_category']);

		$data['content_view']='frontend_auctions/details-v';

		$data['wishlist_data']=$this->frontend_auctions_m->get_wishlist($_SESSION['user_id']);

		$this->frontend_templates->inner($data, $this->settings());
		//var_dump($data['content_data'][0]['auction_category']);
	}

	public function get_dynamic_chart_data($slug=NULL, $slugid=NULL){

		

				$auction_id = $_POST['auction_id'];

				$content_bids = $this->frontend_auctions_m->bidchart($auction_id);

				$randvalue=number_format($this->common->frand(.01, .07, 3), 2, '.', '');
				$randvalueplus=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				$randvalueneg=number_format($this->common->frand(.01, .10, 3), 2, '.', '');
				
				for($i=0;$i<count($content_bids);$i++){

					//$bids[]=$content_bids[$i]['bid_price'];
				//	$counts[]=$content_bids[$i]['total'];

					if($content_bids[$i]['bid_status']==0){
						$msg='Lowest Unique Bid';
					}else if($content_bids[$i]['bid_status']==1){
						$msg='Unique Bid';
					}else if($content_bids[$i]['bid_status']==2){
						$msg='Duplicate Bid';
					} 

					$dataprovider[] = '{"Bid": "'.($content_bids[$i]['bid_price']+$randvalue).'","Between":"$'.($content_bids[$i]['bid_price']-$randvalueneg).' - $'.($content_bids[$i]['bid_price']+$randvalueplus).'","message": "'.$msg.'","value":'.$content_bids[$i]['total'].'}';
				}
				
				

				$datagraph = (count($content_bids)>0)?implode(',',$dataprovider):'';
				echo $datagraph;

	}


	public function winners($slug=NULL)
	{
		
		$data['content_data']=$this->frontend_auctions_m->get_page(str_replace('_','-',$this->router->fetch_method()));

		$data['content_winners']=$this->frontend_auctions_m->get_winners($slug);

		$data['content_view']='frontend_auctions/winners-v';

		$this->frontend_templates->inner($data, $this->settings());
		
	}


	public function latestbids($auction, $user=0)
	{
		$data['content_latest'] = $this->frontend_auctions_m->latestbids($auction, $user);
		// $data['content_leaderboard'] = $this->frontend_auctions_m->latestbidsauction($auction, $user);
		$data['content_bidunique']=$this->frontend_auctions_m->get_bids_uniquedetails($auction);	
		$data['content_view']='frontend_auctions/latestbidder-v';
		// echo json_encode($data); 
		//var_dump($data['content_leaderboard']);
		$this->frontend_templates->latestbidder($data);

	}


	public function related($category)
	{
		$data['content_related'] = $this->frontend_auctions_m->related($category);
		
		$data['content_view']='frontend_auctions/relatedproduct-v';
		//var_dump($data);
		$this->frontend_templates->latestbidder($data);

	}

	
	public function place_now($slug=NULL)
	{
		 
		// var_dump($_POST);
		$this->session_check();

		$placebid=explode('-',$this->frontend_auctions_m->post_now($_POST, $this->settings()));


		if($placebid[1]=='error'){

			echo $placebid[0].'-error';

		}else if($placebid[1]=='success'){

			/*-------- Send Bid Email -----------------*/
			
			$emailcontent = $this->frontend_templates_m->emaildata($placebid[0]); 

			$emailfrom = $emailcontent['emailsetting'][0]['email_auto'];
			$replyto = $emailcontent['emailsetting'][0]['email_support'];
			$subjectold = $emailcontent['content_emails'][0]['user_emails_subject'];
			$text = $emailcontent['content_emails'][0]['user_emails_body'];

			$this->db->select('first_name,last_name,email');
			$this->db->from('user_register');
			$wharray = array('user_id' => $_SESSION['user_id']);
			$this->db->where($wharray);
			$query = $this->db->get(); 
			$user_result = $query->result_array();
			
			$username=ucwords($user_result[0]['first_name'].' '.$user_result[0]['last_name']);
			$sitelinknew="<a href='".base_url()."'>".base_url()."</a>";
			$auctionlink="<a href='".base_url()."/product/".str_replace(' ','-',$_POST['auction_name'])."/".$_POST['auction_id']."'>".$_POST['auction_name']."</a>";
			$bidamount=$_POST['bid_price'];
			$sitenamenew=$this->config->item('sitename');
			$activeword = array("[[USERNAME]]", "[[SITENAMELINK]]", "[[SITENAME]]", "[[BIDAMOUNT]]", "[[AUCTIONNAMELINK]]");
			$replacedword = array($user_name, $sitelinknew, $sitenamenew, $bidamount, $auctionlink);
			$textnew = str_replace($activeword, $replacedword, $text);
			$subject = str_replace('[[SITENAME]]', $sitenamenew, $subjectold);
			
			$mail = $this->send_email($this->common->encrypt_decrypt('decrypt',$user_result[0]['email']),$emailfrom,$sitenamenew,$subject,$textnew,$replyto);
			// $mail = 1;
			 

			if($mail){
				echo 'You Bid of amount <strong>'.$this->frontend_templates->convert_currency_price('currency_price',$_POST['bid_price']).'</strong> placed successfully. It was '.$placebid[2].'.-success-'.$placebid[2];
			}
			

		}
		
	}

	public function get_prod_desc($slug = null)
	{
		$this->session_check();
		$auction_details = $this->frontend_auctions_m->get_auctiondetails($_POST['auction_id']);
		echo json_encode($auction_details); 
	}

/* ------------- Auto email functions ------------- */

	public function close_now($slug=NULL)
	{

		$closeitem=$this->frontend_auctions_m->close_now();
		//var_dump($closeitem);

	}

	public function select_now($slug=NULL)
	{

		$select_winner=$this->frontend_auctions_m->select_now();
		//var_dump($select_winner);

	}

	public function invoice_now($slug=NULL)
	{

		$select_invoice = $this->frontend_auctions_m->invoice_now();
		// var_dump($select_invoice);

	}

	public function winner_mail_now($slug=NULL)
	{

		$select_winner=$this->frontend_auctions_m->winner_mail_now();
		//var_dump($select_winner);

	}

/* ------------- Auto email functions End ------------- */

public function search_auction($slug=NULL)
{
	$category=$_GET['category_name'];
	$keyword=$_GET['keyword'];
	$data['content_data']=$this->frontend_auctions_m->get_items_keyword($category,$keyword);

		$data['content_view']='frontend_auctions/list-v';

		$this->frontend_templates->inner($data, $this->settings());

}

public function email_subscription(){
	$apiKey = "df00eb3898803337e2897e6c5498f7e8-us10"; // from mailchimp
$listID = "cad6c993c2"; // list id from Menyu email list
 
/* form variables */

$email  = $_POST['email_id'];
 
// check post fields for errors, such as not being filled in
 
/***************************************************************
 * Programatically add info to our email list in mailchimp
 ***************************************************************/
  
// $names      = explode(' ', $name, 2); // i.e. Jim L Ross = [0] Jim [1] L Ross
 $memberID   = md5(strtolower($email));
 $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
 $url        = "https://".$dataCenter.'.api.mailchimp.com/3.0/lists/'.$listID.'/members/'.$memberID; // mailchimp api endpoint
 
 $json = json_encode([
    'email_address' => $email,
    'status' => 'subscribed',
    'merge_fields' => [
        'EMAIL' => $email
        
    ]
 ]);
 
 $ch = curl_init($url);
 
 curl_setopt($ch, CURLOPT_USERPWD, 'user:'.$apiKey);
 curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
 
 $cresult = curl_exec($ch);
 $response = json_decode($cresult);
 //print_r($response);die;
 if($response->status != 'subscribed'){
	$datau = array(
		'status'=>$response->status
	);
	$wharray = array('email_id'=>$email);
	$this->db->where($wharray);
			$query=$this->db->update('manage_subscriber', $datau);
	echo 0;
 }else{
	//echo 2;
	$this->db->select('*');
			$this->db->from('manage_subscriber');
			$wharray = array('email_id' => $email);
			$this->db->where($wharray);

			$query = $this->db->get();
			$result = $query->result_array();
			if(isset($result) && count($result)> 0){
				$datau = array(
					'status'=>$response->status
				);
				$wharray = array('email_id'=>$email);
				$this->db->where($wharray);
						$query=$this->db->update('manage_subscriber', $datau);
				echo 1;
			}else{
				$datau = array(
					'email_id'=>$email,
					'subscriber_id'=>$memberID,
					'status'=>$response->status
				);
				$query=$this->db->insert('manage_subscriber', $datau);
				echo 2;
			}
 }
 

}

public function email_unsubscription(){
	$apiKey = "df00eb3898803337e2897e6c5498f7e8-us10"; // from mailchimp
$listID = "cad6c993c2"; // list id from Menyu email list
 
/* form variables */

$email  = $_POST['email_id'];
 
// check post fields for errors, such as not being filled in
 
/***************************************************************
 * Programatically add info to our email list in mailchimp
 ***************************************************************/
  
// $names      = explode(' ', $name, 2); // i.e. Jim L Ross = [0] Jim [1] L Ross
 $memberID   = md5(strtolower($email));
 $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
 $url        = "https://".$dataCenter.'.api.mailchimp.com/3.0/lists/'.$listID.'/members/'.$memberID; // mailchimp api endpoint
 
 $json = json_encode([
    'email_address' => $email,
    'status' => 'unsubscribed',
    'merge_fields' => [
        'EMAIL' => $email
        
    ]
 ]);
 
 $ch = curl_init($url);
 
 curl_setopt($ch, CURLOPT_USERPWD, 'user:'.$apiKey);
 curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
 
 $cresult = curl_exec($ch);
 $response = json_decode($cresult);
 //print_r($response);die;
 if($response->status == 'unsubscribed'){
	
				$datau = array(
					'status'=>$response->status
				);
				$wharray = array('email_id'=>$email);
				$this->db->where($wharray);
						$query=$this->db->update('manage_subscriber', $datau);
				echo 2;
			
 }
 

}


}
