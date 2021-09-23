<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_auctions extends Backend_Controller {

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
		$this->load->database();
		$this->load->model('admin_auctions_m');
		$this->load->model('admin_categories/admin_categories_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		//$this->load->helper('download');
        //$this->load->library('PHPReport');
		

	}



	public function index()
	{

		$data['content_view']='admin_auctions/list_auctions';	
		$this->admin_templates->inner($data);

	}


	public function add_auctions($slug=NULL){


		$this->session_check();

       //echo $_POST['auction_name'];

		if(!empty($_POST['auction_name'])){
			
			$result = $this->admin_auctions_m->post_auctions($_POST);
			echo $result;

		}else{

			$data['content_view']='admin_auctions/add_auctions';	
			$data['siteinfo'] = $this->admin_auctions_m->auction_type($slug);
			$data['auction_items'] = $this->admin_auctions_m->add_auctions($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}

	}


	public function duplicate($slug=NULL){


		$this->session_check();
		//echo $_POST['auction_id'];
		$result = $this->admin_auctions_m->get_duplicate($_POST); // module call to list user from database
		echo $result;

	}

	public function view_bids($slug)
	{
		$this->session_check(); 
		$data['v_auctions_bids'] = $this->admin_auctions_m->get_auctions_bids($slug);  
		$data['content_view']= 'admin_auctions/closed_bids_view'; 
		$this->admin_templates->inner($data);
	}

	public function list_auctions($slug=NULL) 
	{
		
		$this->session_check();
	
		$data['auctions_list'] = $this->admin_auctions_m->get_auctions_list();
		$data['content_view']='admin_auctions/list_auctions';	
		 
		$this->admin_templates->inner($data);				
		
	}

	public function view_invoices($slug=NULL)
	{
		$this->session_check(); 
		$data['invoice_list'] = $this->admin_auctions_m->get_auction_invoices($slug);
		$data['content_view']='admin_auctions/auction_invoices';	
		// var_dump($data['auction_format']);
		$this->admin_templates->inner($data);	

	}

	public function auction_media($slug=NULL) // function call with page name
	{
		
		$this->session_check();

		$data['auctions_media'] = $this->admin_auctions_m->get_auctions_media(); // module call to list user from database
		$data['content_view']='admin_auctions/auction_media';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display

	}

	public function closed_auctions($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['auctions_list'] = $this->admin_auctions_m->get_auctions_closed(); // module call to list user from database
		$data['content_view']='admin_auctions/closed_auctions';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}

	public function winner_auctions($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['winner_list'] = $this->admin_auctions_m->get_auction_winners(); // module call to list user from database
		$data['content_view']='admin_auctions/auction_winners';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}

	public function invoice_auctions($slug=NULL) // function call with page name
	{
		
		$this->session_check();
	
		$data['invoice_list'] = $this->admin_auctions_m->get_auction_invoices($slug);  
		$data['content_view']='admin_auctions/auction_invoices'; 
		$this->admin_templates->inner($data);				// template call to display
		
	}

	public function add_media($slug=NULL) // function call with page name
	{
		$this->session_check();
		
		$data['auction_list'] = $this->admin_auctions_m->add_media($slug); // module call to list user from database
		$data['content_view']='admin_auctions/add_media';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display

	}



	public function upload_media($slug=NULL){
		
				//var_dump($_POST['user_id'].'--'.$slug);
				if(!empty($_POST['auction_id'])){

				  $config['upload_path']= "auction_assets/".$_POST['auction_id'];

				  if(!is_dir($config['upload_path'])){
					  
					  mkdir($config['upload_path'], 0777, TRUE);
				  }
				
				//echo $_POST['auction_id'];

				$data=[];
				$data['auction_id']=$_POST['auction_id'];
				$data['auction_icon_img'] = $this->upload_files($config['upload_path'], $_FILES['auction_icon_img']);
				$data['auction_img'] = $this->upload_files($config['upload_path'], $_FILES['auction_img']);
				$data['video'] = $this->upload_files($config['upload_path'], $_FILES['video']);

				$result= $this->admin_auctions_m->post_media($data);
				echo $result;
				//return true;
			}

	}



	private function upload_files($path, $files)  //  --- calling inside upload media for hotels ---
    {
        $config = array(
            'upload_path' => $path,
            'allowed_types' => 'jpg|gif|png|mpeg|mp4|3gp',
            'overwrite' => 1,  
			'max_size' => '10000',
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }

        }

        return $images;
    }




}
