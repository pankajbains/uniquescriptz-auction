<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users extends Backend_Controller {

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
		$this->load->model('admin_users_m');
		//$this->load->model('post_m');
		//$this->load->model('common');
		//$this->load->helper('url_helper');
		//$this->load->helper('download');
        //$this->load->library('PHPReport');
		//$this->load->library('excel');

	}


	public function registered_users() // function call with page name
	{
				
		$this->session_check();
	
		$data['user_list'] = $this->admin_users_m->get_users_list(); // module call to list user from database
		$data['content_view']='admin_users/list_users';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}

	public function update_credit(){
		$user_id = $_POST['user_id'];
		$paid_credit = $_POST['paid_credit'];
		$free_credit = $_POST['free_credit'];
		$upvalue= array('paid_credit' => $paid_credit,'free_credit' => $free_credit);
		$wharray = array('user_id'=>$user_id);
						$this->db->where($wharray);
						$query=$this->db->update('user_credits', $upvalue);
	}


	public function add_users($slug=NULL)
	{

		$this->session_check();

		//echo $_POST['first_name'];
		//var_dump($_POST."--------------------");

		if(!empty($_POST['first_name'])){
			//var_dump($_POST);
			$result=$this->admin_users_m->post_users($_POST['email']);
			echo $result;
			
		}else{

			$data['content_view']='admin_users/add_users';	
			$data['user_list'] = $this->admin_users_m->add_users($slug);
			$this->admin_templates->inner($data);
			//var_dump($data);
		}
		

	}



	public function subscribed_users() // function call with page name
	{
				
		$this->session_check();
	
		$data['user_list'] = $this->admin_users_m->get_subscriber_list(); // module call to list user from database
		$data['content_view']='admin_users/subscribed_users';	 // view call to display user from database
		$this->admin_templates->inner($data);				// template call to display
		
	}

	public function banned_users() // function call with page name
	{
		$user_id = $_POST['user_id'];
		echo $status = $_POST['status'];
		$upvalue= array('banned' => $status);
		$wharray = array('user_id'=>$user_id);
						$this->db->where($wharray);
						$query=$this->db->update('user_register', $upvalue);		
		// $this->session_check();
	
		//$data['user_list'] = $this->admin_users_m->get_banned_users(); // module call to list user from database
		// $data['content_view']='admin_users/subscribed_users';	 // view call to display user from database
		// $this->admin_templates->inner($data);				// template call to display
		
	}


	public function download_users() // function call with page name
	{
		$this->db->select('*');
		$this->db->from('user_register');
		$query = $this->db->get();
		var_dump( $query->result_array());
		header("location:../registered_users.html");
	}

	public function downloadxls()
	{

		$usersData = $this->admin_users_m->get_users_list();
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		
		// set Header
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'User Id');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'First Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Last Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'User Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Email');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Password');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Mobile');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Country');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'IpAddress');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'NewsLetter');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'ActivityStatus');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Verified');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Reg Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Gender');
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Active');
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Banned');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Terms');
		
		$rowCount = 2;
        foreach ($usersData as $list) {
			
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list['user_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list['first_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $this->admin_templates->encrypt_decrypt('decrypt',$list['user_name']));
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $this->admin_templates->encrypt_decrypt('decrypt',$list['email']));
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $this->admin_templates->encrypt_decrypt('decrypt',$list['password']));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list['mobile']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list['ipaddress']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list['newsletters']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list['activitystatus']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list['verified']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount,  date("d-m-Y", strtotime($list['reg_date'])));
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list['gender']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list['active']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list['banned']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $list['terms']);
            
            $rowCount++;
        }
        $filename = "users". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
		$objWriter->save('php://output'); 
		


	}

}
