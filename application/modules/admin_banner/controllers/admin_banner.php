<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_banner extends Backend_Controller {

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
		$this->load->model('admin_banner_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		

	}


	public function view_banner($slug=NULL) // function call with page name
	{
		
		$this->session_check();
		$data['content_list'] = $this->admin_banner_m->get_banner_list(); // module call to list user from database
		$data['content_view']='admin_banner/view_banner';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}


	public function add_banner($slug=NULL)
	{

		$this->session_check();
		//print_r($_FILES);
		// echo "hello"; die;

		
			
			//var_dump($_POST['category_name']);
			$data['content_parent'] = $this->admin_banner_m->get_parent($slug);
			$data['content_list'] = $this->admin_banner_m->add_banner($slug);
			//print_r($data['content_list']);die;
			$data['content_view']='admin_banner/add_banner';
			$this->admin_templates->inner($data);
			//var_dump($data);
		

	}

	public function upload_banner($slug=NULL){
		$this->session_check();
		//print_r($_FILES);
		// echo "hello"; die;
			//print_r($_POST); die;
			$fileName="";
			if(isset($_FILES['banner_img']['name']) && (!empty($_FILES['banner_img']['name']))){

				//print_r($_FILES); die;
				$config['upload_path']= "banner_assets";
		
				if(!is_dir($config['upload_path'])){
					
					mkdir($config['upload_path'], 0777, TRUE);
				}
			  
			  //echo $_POST['auction_id'];
	  
			  $data=[];
			  $data['banner_id']=$_POST['banner_id'];
			  //$data['auction_icon_img'] = $this->upload_files($config['upload_path'], $_FILES['auction_icon_img']);
			  //$data['banner_img'] = $this->upload_files($config['upload_path'], $_FILES['banner_img']);
			  $path = $config['upload_path'];
			  $files = $_FILES['banner_img'];
			  //print_r($files); die;
			  $config = array(
				'upload_path' => $path,
				'allowed_types' => 'jpeg|jpg|gif|png|mpeg|mp4|3gp',
				'overwrite' => 1,  
				'max_size' => '10000',
			);
	
			$this->load->library('upload', $config);
	
			$images = array();
	
			
				$_FILES['images[]']['name']= $files['name'];
				$_FILES['images[]']['type']= $files['type'];
				$_FILES['images[]']['tmp_name']= $files['tmp_name'];
				$_FILES['images[]']['error']= $files['error'];
				$_FILES['images[]']['size']= $files['size'];
	
				$fileName = $files['name'];
	
				$filename= $_FILES['images[]']['name'];
				//print_r($filename); die;
				$file_ext = pathinfo($fileName,PATHINFO_EXTENSION);
	
				$fileName = RAND(1111,9999).'_banner_img.'.$file_ext;
				//print_r($fileName); die;
				$images[] = $fileName;
	
				$config['file_name'] = $fileName;
	
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('images[]')) {
					$this->upload->data();
				} 
	
			
			  //$data['video'] = $this->upload_files($config['upload_path'], $_FILES['video']);
			}

			$result=$this->admin_banner_m->post_banner($_POST,$_FILES, $fileName);

			$this->add_banner();
		
			

	}


	public function get_parent($slug=NULL)
	{
		$data['content_list'] = $this->admin_banner_m->add_banner($slug);
	}

	public function index()
	{
		//$this->load->view('templates/header');
		$this->load->view('admin_templates/dashboard');
		//$this->load->view('templates/footer');
		//$this->load->view('templates/dashboard');
	}

	public function upload_media($slug=NULL){
		
		//var_dump($_POST['user_id'].'--'.$slug);
		if(!empty($_POST['banner_id'])){

		  $config['upload_path']= "banner_assets/".$_POST['banner_id'];

		  if(!is_dir($config['upload_path'])){
			  
			  mkdir($config['upload_path'], 0777, TRUE);
		  }
		
		//echo $_POST['auction_id'];

		$data=[];
		$data['banner_id']=$_POST['banner_id'];
		//$data['auction_icon_img'] = $this->upload_files($config['upload_path'], $_FILES['auction_icon_img']);
		$data['banner_img'] = $this->upload_files($config['upload_path'], $_FILES['banner_img']);
		//$data['video'] = $this->upload_files($config['upload_path'], $_FILES['video']);

		$result= $this->admin_banner_m->post_media($data);
		echo $result;
		//return true;
	}

		
	function upload_files($path, $files)  //  --- calling inside upload media for hotels ---
    {
        $config = array(
            'upload_path' => $path,
            'allowed_types' => 'jpeg|jpg|gif|png|mpeg|mp4|3gp',
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

			$filename= $_FILES['images[]']['name'];
			$file_ext = pathinfo($fileName,PATHINFO_EXTENSION);

			$fileName = time().RAND(1111,9999).'banner_img.'.$file_ext;

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


}
