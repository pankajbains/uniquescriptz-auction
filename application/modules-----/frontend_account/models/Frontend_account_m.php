<?php

class frontend_account_m extends CI_Model {

        public function __construct()
        {
			parent::__construct();
			$this->load->database();
        }


		public function save_stripe_data($data,$content_record, $content_gateway, $uri)
		{
			
//var_dump($content_gateway[0]['secret_key']);
				
			require_once('application/third_party/MX/StripePhp/init.php');
			
			try {
			 
				\Stripe\Stripe::setApiKey($content_gateway[0]['secret_key']);
				$customer = \Stripe\Customer::create([
					'name' => $_SESSION['first_name'],
					'description' => 'test description',
					'email' =>  $this->common->encrypt_decrypt('decrypt',$_SESSION['email']),
					"source" => $data['stripeToken'],  
					"address" => [
						"city" => "Kitchener", 
						"country" => "Canada", 
						"line1" => "77 foxglove", 
						"line2" => "", 
						"postal_code" => "N2E3Y8", 
						"state" => "ON"
					]
				]); 

				$charge = \Stripe\Charge::create([
					"amount" => $data['b_amount'] * 100,
					"currency" => $_SESSION['currency'],
					"customer" => $_SESSION['user_id'], 
					"description" => $content_record[0]['id'],
					"metadata" => ["order_id" => $content_record[0]['id']], 
				]);
			 	

				if($uri == "credit_pay") {
					
					$datauser = array(

						'user_id' =>  $_SESSION['user_id'], 
						'amount' => $data['b_amount'],
						'purchase_date' => date('Y-m-d'),
						'txn_id' => $charge->id,
						'plan_id' => $content_record[0]['id'],
						'plan_type' => $uri,
						'paid_amount' => $content_record[0]['credit_rate'],
						'paid_credit' => $content_record[0]['paid_credit'],
						'free_credit' => $content_record[0]['free_credit'],
						'paymentgateway_id' => $content_gateway[0]['id'],

					);

					$this->db->select('*');
					$this->db->from('user_credits');
					$wharray = array('user_id' => $_SESSION['user_id']);
					$this->db->where($wharray); 
					$query = $this->db->get();
					$datas = $query->result_array($query); 
				
					$this->db->set('paid_credit', $datauser['paid_credit']+$datas[0]['paid_credit']);
					$this->db->set('free_credit', $datas[0]['free_credit']+$datauser['free_credit']);
					$this->db->where('user_id', $_SESSION['user_id']);
					$query=$this->db->update('user_credits');

					$this->db->insert('user_payment', $datauser);


				} else if($uri == "auction_pay"){

					$auction_data = array(
						'payment' =>  1,
					);
					$wharray = array('id' => $content_record[0]['auction_id']);
					$this->db->where($wharray);
					$result = $this->db->update('auction_won', $auction_data);

				}else {

					$datauser = array(

						'user_id' =>  $_SESSION['user_id'], 
						'amount' => $data['b_amount'],
						'purchase_date' => date('Y-m-d'),
						'txn_id' => $charge->id,
						'plan_id' => $content_record[0]['id'],
						'plan_type' => $uri,
						'paid_amount' => $content_record[0]['coupon_rate'],
						'paid_credit' => $content_record[0]['coupon_credit'], 
						'paymentgateway_id' => $content_gateway[0]['id'], 

					);				

					$coupon_datas = array(
						'paid' => '1',
						'txn_date'=>date('y-m-d'),
						'txn_id' => $charge->id
					);

					$wharray = array('id' => $data['bidcoupon_id']);
					$this->db->where($wharray);
					$result = $this->db->update('user_bidcoupon_records', $coupon_datas);
					//$this->db->insert('user_payment', $datauser);

				}

				return "success";
				
			} catch(\Stripe\Exception\InvalidRequestException $e) {
				
				$body = $e->getJsonBody(); 				
				return $body['error']['type'];
			
			} 
			catch(\Stripe\Exception\CardException $e) {

				$body = $e->getJsonBody(); 				
				return $body['error']['type'];

			}

			


		}

		public function save_paypal_data($data, $temp)
		{

			if($temp['credit_pay'] == "credit_pay" && $data['payment_status'] == "Completed" ) {
				
				$content = $this->frontend_templates_m->get_records('user_bidcredit_rate','id',$temp['content_record']);

				$datauser = array(

					'user_id' =>  $_SESSION['user_id'], 
					'amount' => $data['payment_gross'],
					'purchase_date' => date('Y-m-d'),
					'txn_id' => $data['txn_id'],
					'plan_id' => $temp['content_record'],
					'plan_type' => $temp['credit_pay'],
					'paid_amount' => $content[0]['credit_rate'],
					'paid_credit' => $content[0]['paid_credit'],
					'free_credit' => $content[0]['free_credit'],
					'paymentgateway_id' => $temp['paymentgateway_id'],

				);
				$this->db->select('*');
				$this->db->from('user_credits');
				$wharray = array('user_id' => $_SESSION['user_id']);
				$this->db->where($wharray); 
				$query = $this->db->get();
				$datas = $query->result_array($query); 
			
				$this->db->set('paid_credit', $datauser['paid_credit']+$datas[0]['paid_credit']);
				$this->db->set('free_credit', $datas[0]['free_credit']+$datauser['free_credit']);
				$this->db->where('user_id', $_SESSION['user_id']);
				$query=$this->db->update('user_credits');

				$this->db->insert('user_payment', $datauser);
				 

			} else {


				$content = $this->frontend_templates_m->get_records('user_bidcoupon_rate','id', $temp['user_bidcoupon_id']);
					
				$datauser = array(

					'user_id' =>  $_SESSION['user_id'], 
					'amount' => $data['payment_gross'],
					'purchase_date' => date('Y-m-d'),
					'txn_id' => $data['txn_id'],
					'plan_id' => $temp['user_bidcoupon_id'],
					'plan_type' => "coupon_pay",
					'paid_amount' => $content[0]['coupon_rate'],
					'paid_credit' => $content[0]['coupon_credit'], 
					'paymentgateway_id' => $temp['paymentgateway_id'],
				);				

				$coupon_datas = array(
					'paid' => '1',
					'txn_date'=>date('y-m-d')
				);

				$wharray = array('id' => $temp['user_bidcoupon_record_id']);
				$this->db->where($wharray);
				$this->db->update('user_bidcoupon_records', $coupon_datas);
				
				$this->db->insert('user_payment', $datauser);
			 
			}


			return "success";
		}

		public function get_users($data){
			
			$this->db->select('paid_credit, free_credit');
			$this->db->from('user_credits');
			$wharray = array('user_id'=>$data);
			$this->db->where($wharray);
			$query = $this->db->get(); 
			return $query->result_array($query);

		}


		public function savetemp_currency($data)
		{
			
			$getcurrency = $this->frontend_templates_m->get_records('config_currency','id', $data);		
			$this->session->set_userdata('currency_datas', $getcurrency);
			return $getcurrency;
			
		}
		



		public function activate_account($user_id)
		{
			
			$this->db->set('active', '1');
			$this->db->where('user_id',$user_id);
			$this->db->update('user_register');
			return "1";

		}
		public function get_page($data){

			//print_r($data);
			$this->db->select('*');
			$this->db->from('cms_pages');

			$wharray = array('cms_page_url' => $data, 'active' => '1');
			$this->db->where($wharray);

			$query = $this->db->get();
			//var_dump($this->db->last_query());
			return $query->result_array();

		}

		public function get_gift_credits($slug=NULL){
		
			if($slug==NULL){
					
				$this->db->select('*');
				$this->db->from('user_bidcoupon_rate');
				$wharray = array('active' => '1');
				$this->db->where($wharray);

				$query = $this->db->get();
				//var_dump($this->db->last_query());
				return $query->result_array();
			
			}
		
		}

		public function get_bid_credits($slug=NULL){
		
			if($slug==NULL){
					
				$this->db->select('*');
				$this->db->from('user_bidcredit_rate');
				$wharray = array('active' => '1');
				$this->db->where($wharray);

				$query = $this->db->get();
				//var_dump($this->db->last_query());
				return $query->result_array();
			
			}
		
		}

		public function register_now($data){

			//print_r($data);
			$terms = ($_POST['terms']=='on')?'1':'0';
			
			$datauser = array(

				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'user_name' => $this->common->encrypt_decrypt('encrypt',$_POST['nickname']),
				'email' => $this->common->encrypt_decrypt('encrypt',$_POST['email']),
				'password' => $this->common->encrypt_decrypt('encrypt',$_POST['password']),
				'terms' => $terms

			);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$this->db->where('email', $datauser['email']);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
		
			if($num==1){
						
				return '2';

			}else{
					
				$this->db->insert('user_register', $datauser);
				$id = $this->db->insert_id();

				$user_id='USR'.$id.'-'.date('Y');
						
				$this->db->set('user_id', $user_id);
				$this->db->set('ipaddress', $this->frontend_templates->getRealIpAddr());
				$this->db->where('reg_id',$id);
				$query=$this->db->update('user_register');
				//echo $this->db->last_query();

				$datarefer = array(
					'referral_id' => $_POST['referral'],
					'user_id' => $user_id
				);

				$this->db->insert('user_referral', $datarefer);

				$datacredit = array(
					'user_id' => $user_id
				);
				$this->db->insert('user_credits', $datacredit);
				return $user_id;

				$this->session->set_userdata($sessiondata);
				$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
			//print_r(json_decode($whishlist_cookie_data)); die;
			$temp_data=array();
			$wdata=json_decode($whishlist_cookie_data);
			//print_r($wdata); die;
			$i=0;
			if(isset($wdata) && !empty($wdata)){
			foreach($wdata as $val){
				//$temp_data[$i]['auction_id']=$val;
				if($val != 1){
				$datauser=array('user_id'=>$userlogin[0]['user_id'], 'auction_id'=>$val);
				$this->db->insert('auction_wishlist', $datauser);
				$id = $this->db->insert_id();
				}
				$i++;
			}
			delete_cookie('wishlist_cookie');
		}

			}

		}

		public function login_now($data){

			//print_r($data);
			//$remembeer = ($_POST['remember_me']=='on')?'1':'0';
			$email = $this->common->encrypt_decrypt('encrypt',$data['email']);
			$password = $this->common->encrypt_decrypt('encrypt',$data['password']);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$wharray = array('email' => $email, 'password' => $password, 'active' => '1');
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
			
			if($num==1){
				
				$userlogin = $query->result_array();
				if($userlogin[0]['banned'] == 1){
					return 3;
				}

				$sessiondata = array(

						'user_id'=>$userlogin[0]['user_id'],
						'username'=>$userlogin[0]['user_name'],
						'first_name'=>$userlogin[0]['first_name'],
						'last_name'=>$userlogin[0]['last_name'],
						'email'=>$userlogin[0]['email'],
						'logged_in'=>TRUE
				);

				$this->session->set_userdata($sessiondata);
				$whishlist_cookie_data=$this->input->cookie('wishlist_cookie',true);
			//print_r(json_decode($whishlist_cookie_data)); die;
			$temp_data=array();
			$wdata=json_decode($whishlist_cookie_data);
			//print_r($wdata); die;
			$i=0;
			if(isset($wdata) && !empty($wdata)){
			foreach($wdata as $val){
				//$temp_data[$i]['auction_id']=$val;
				if($val != 1){
				$datauser=array('user_id'=>$userlogin[0]['user_id'], 'auction_id'=>$val);
				$this->db->insert('auction_wishlist', $datauser);
				$id = $this->db->insert_id();
				}
				$i++;
			}
			delete_cookie('wishlist_cookie');
		}
					// $data = array('user_id' => $userlogin[0]['user_id']);
					// $wharray = array('ip_address'=> $ipaddress);
					// $this->db->where($wharray);
					// $result = $this->db->update('auction_wishlist', $data);
    

				return true;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'
			}

		}

		public function forgot_now($data){

			//print_r($data);

			$email = $this->common->encrypt_decrypt('encrypt',$data['email']);
			
			$this->db->select('*');
			$this->db->from('user_register');
			$wharray = array('email' => $email, 'active' => '1');
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$num = $query->num_rows();
			
			if($num==1){

				$newpass = $this->common->userpass();
				$this->db->set('password', $this->common->encrypt_decrypt('encrypt',$newpass));
				$this->db->where('email',$email);
				$query=$this->db->update('user_register');

				return $newpass;

			}else{
			
				$this->db->error(); // Has keys 'code' and 'message'

			}

		}

		public function buy_now($data){
			$couponcode = substr($data['creditcoupon'], 0,9);
			$this->db->select('*');
			$this->db->from('user_bidcoupon_records');
			$wharray = array('coupon_code' => $couponcode, 'coupon_used' => 0, 'paid' => 1);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());die;
			$num = $query->num_rows();
			
			if($num==1){
				
				$bidcredits = $query->result_array();

				$coupon_credit = $bidcredits[0]['coupon_credit'];
				$coupon_validity = $bidcredits[0]['coupon_validity'];
				$txn_date = $bidcredits[0]['txn_date'];
				
				$validity_expires = date('Y-m-d', strtotime("+".$bidcredits[0]['coupon_validity']." months", strtotime($bidcredits[0]['txn_date'])));
				
				if((date('Y-m-d')>=($bidcredits[0]['txn_date'])) && (date('Y-m-d')<$validity_expires)){
					//Gets user phone data
					$this->db->select('*');
					$this->db->from('user_register');
					$user_wharray = array('email' => $_SESSION['email']);
					$this->db->where($user_wharray);
					$user_query = $this->db->get();
					$giftto_user_data = $user_query->result_array();
					//Gets user phone data end
					//print_r($giftto_user_data); die;
					if(isset($giftto_user_data['mobile']) && $giftto_user_data['mobile'] == 0){
						echo "Your Mobile Number is not registered, Please register Your Mobile Number first ";
					}else{
						$mobile_lastdidgit = substr($giftto_user_data[0]['mobile'], -4);
						$cupon_lastdigit = substr($data['creditcoupon'], -4);
						if($mobile_lastdidgit != $cupon_lastdigit){
							echo "Last 4 digit not matched with Your registered phone number";
						}else{
					$this->db->select('paid_credit');
					$this->db->from('user_credits');
					$this->db->where('user_id', $_SESSION['user_id']);
					$query = $this->db->get();
					$row = $query->result_array();
					$datacredit = array(
						'paid_credit' => $row[0]['paid_credit']+$coupon_credit
					);

					$wharray = array('user_id' => $_SESSION['user_id']);
					$this->db->where($wharray);
					$result = $this->db->update('user_credits', $datacredit);
					
					if($result==TRUE){

						$datacoupon = array(
							'coupon_used' => 1
						);

						$wharray = array( 'coupon_code' => $couponcode);
						$this->db->where($wharray);
						$this->db->update('user_bidcoupon_records', $datacoupon);
						
						echo 1;
					}

				}
			}
				
			}else{
				
					echo "Copoun Code Expired or Not Valid";
				}
				

			}else{
			
				echo "Copoun Code Expired or Not Valid";

			}
	

		}


		public function gift_now($data){

			//print_r($data); die;
			
			$this->db->select('*');
			$this->db->from('user_bidcoupon_rate');
			$wharray = array('id' => $data['couponid'], 'active' => 1);
			$this->db->where($wharray);
			$query = $this->db->get();
			//print_r($this->db->last_query());
			$bidcoupon = $query->result_array();
			$num = $query->num_rows();
			$coupon_code = $this->common->couponcode();

			//Gets user phone data
			// $this->db->select('mobile');
			// $this->db->from('user_register');
			// $user_wharray = array('email' => $this->common->encrypt_decrypt('encrypt',$data['email']));
			// $this->db->where($user_wharray);
			// $user_query = $this->db->get();
			// $giftto_user_data = $user_query->result_array();
			//Gets user phone data end

			$datauser = array(

				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'name' => $data['name'],
				'email' => $this->common->encrypt_decrypt('encrypt',$data['email']),
				'message' => $data['message'],
				'coupon_validity' => $bidcoupon[0]['coupon_validity'],
				'coupon_value' => $bidcoupon[0]['coupon_rate'],
				'coupon_credit' => $bidcoupon[0]['coupon_credit'],
				'coupon_code' => $coupon_code//.substr($giftto_user_data[0]['mobile'], -4) //concatenates last 4 digit of user phone to the coupon code

			);
			//var_dump ('mobile', $coupon_code.substr($giftto_user_data[0]['mobile'], -4) ,'data', $giftto_user_data); exit;
			$this->db->insert('user_bidcoupon_records', $datauser);
			$id = $this->db->insert_id();

			return $id;
			


		}



}