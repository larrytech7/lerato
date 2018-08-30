<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct(){
        //load libraries and helpers
        parent::__construct();
        date_default_timezone_set('Africa/Douala');
		//$this->output->enable_profiler(true);

        //libraries
        $this->load->library('session');
        $this->load->library('form_validation');
		
         $config['upload_path']          = './resources/images/uploads/';
         $config['allowed_types']        = 'jpg|png|jpeg';
         $config['max_size']             = 5120; //5MB
         $config['max_width']            = 1600;
         $config['max_height']           = 1400;
        $this->load->library('upload', $config);
        $this->load->library('email');
        //helpers
        $this->load->helper(array('form','date'));
        //models
        $this->load->model('transaction');
		$this->load->model('user');
		$this->load->model('devotions');
		$this->load->model('videos');
		$this->load->model('testimonies');
		$this->load->model('bank');
		$this->load->model('visitors');
        
        //configure email
        $cfg['protocol'] = 'smtp';
    	$cfg['charset'] = 'utf-8';
    	$cfg['wordwrap'] = TRUE;
    	$cfg['smtp_host'] = 'mail.mydigis.com';//'a2plcpnl0128.prod.iad2.secureserver.net';
    	$cfg['smtp_port'] = 26;//465;
    	$cfg['smtp_user'] = 'lakah@mydigis.com';//larryakah@iceteck.com';
    	$cfg['smtp_pass'] = 'Creationfox7*';//'creationfox7';
    	$cfg['smtp_crypto'] = 'ssl';
    	$cfg['mailtype'] = 'html';
    	$this->email->initialize($cfg);
        
        $this->form_validation->set_error_delimiters('<div class="error bg-danger">', '</div>');
    }
    //home, list current events
    public function index(){
        $this->checkLogin();
        $events = $this->transaction->get();
        $this->getPage('home', array('transactions' => $events->result_object()));
    }
	
	//home, list current users
    public function users(){
        $this->checkLogin();
        $users = $this->user->getUsers("admin");
        $this->getPage('users', array('users' => $users->result_object()));
    }
	
	public function transactions(){
		$this->checkLogin();
		//load transactions
		$t = $this->transaction->getUserTransactions($this->session->userdata('email'));
		
		$this->getPage('transactions', array('transactions' => $t->result_object()));
	}
	
	public function sendlerato(){
		$this->checkLogin();
		//load transactions
		$t = $this->transaction->get();
		
		$this->getPage('send', array('transactions' => $t->result_object()));
	}
	
	//allow one to buy lerato from bank account
	public function receivelerato(){
		$this->checkLogin();
	
		$u = $this->user->getUser($this->session->userdata('email'))->result_object();
		$bank = $this->bank->getById($this->session->userdata('pin'))->result_object();
		
		$this->getPage('buy', array('user' => $u[0], 'bank' => $bank[0]));
	}
	
	public function profile(){
		$this->checkLogin();
		//load transactions
		$u = $this->user->getUser($this->session->userdata('email'))->result_object();
		$bank = $this->bank->getById($this->session->userdata('pin'))->result_object();
		
		$this->getPage('profile', array('user' => $u[0], 'bank' => $bank[0]));
	}
	
	
	//process send lerato 
	public function send($id =0){
        $this->form_validation->set_rules('email', 'Receiver Email', 'required|valid_email|min_length[1]');
        $this->form_validation->set_rules('phone', 'Receiver Phone', 'required|min_length[7]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		
		$this->form_validation->set_message('required', '{field} must not be empty');
	
		if($this->form_validation->run() == true){ //validation passed
			$transaction = array();
			$transaction['receipient'] = $this->input->post('email');
			$transaction['phone'] = $this->input->post('phone');
			$transaction['amount'] = $this->input->post('amount');
			$transaction['country'] = $this->input->post('country');
			$transaction['reason'] = $this->input->post('reason', 'Plain Transfer');
			$transaction['id'] = $id == 0 ? sha1(time()) : $id;
			$transaction['sender'] = $this->session->userdata('email');
			//get current user
			$sender = $this->user->getUserById($this->session->userdata('pin'))->result_object();
			$receiver = $this->user->getUser($transaction['receipient'])->result_object();
			
			$lrt = $sender[0]->lerato - $transaction['amount'];
			
			if($lrt < 0){
				$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Insufficient LRT to send. Please top up your account</div>');
			}else{
				//save transaction
				$this->transaction->insert($transaction);
				//update sender LRT balance and update receipient's LRT balance
				$sender[0]->lerato = $lrt;
				$receiver[0]->lerato = $receiver[0]->lerato + $transaction['amount'];
				$updated = $this->user->updateWithTransaction($sender[0], $receiver[0]);
				if($updated){
					$transaction['status'] = 1;
					$this->transaction->insert($transaction);
					$this->session->set_userdata('lerato', $lrt);
					$this->session->set_flashdata('info', '<div class="alert alert-info" role="alert">Lerato Sent successfully</div>');
				}else{
					log_message('Error occured during transaction.');
					$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">General Transaction error. Lerato was not transferred. Please try again</div>');
				}
			}
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Error Sending lerato. Verify that all information is entered correctly and try again'.validation_errors().'</div>');
		}
		
		redirect('/send', 'location');
    }
	
	//process receive lerato 
	public function receive(){
        $this->form_validation->set_rules('amount', 'Purchase Amount', 'trim|required');
        $this->form_validation->set_rules('bankswift', 'Bank Swift', 'trim|required');
		
		$this->form_validation->set_message('required', '{field} must not be empty');
	
		if($this->form_validation->run() == true){ //validation passed
			//bank info
			$amount = $this->input->post('amount');
			$bankinfo['bankname'] = $this->input->post('bankname');
			$bankinfo['bankaccountname'] = $this->input->post('bankaccountname');
			$bankinfo['bankpersonid'] = $this->input->post('bankpersonid');
			$bankinfo['bankpersonaddress'] = $this->input->post('bankpersonaddress');
			$bankinfo['bankcontact'] = $this->input->post('bankcontact');
			$bankinfo['bankemail'] = $this->input->post('bankemail');
			$bankinfo['bankaddress'] = $this->input->post('bankaddress');
			$bankinfo['bankbranchcode'] = $this->input->post('bankbranchcode');
			$bankinfo['bankcountry'] = $this->input->post('bankcountry');
			$bankinfo['ebranchcode'] = $this->input->post('ebranchcode');
			$bankinfo['opened'] = $this->input->post('moaccountdateopened').'/'.$this->input->post('yraccountdateopened');
			$bankinfo['bankswift'] = $this->input->post('bankswift');
			//$bankinfo['owner_id'] = $user['id'];
			//TODO: Normally, query the bank API to confirm LRT purchase befre logging the transaction
			
			//simulate purchase
			$user = $this->user->getUserById($this->session->userdata('pin'))->result_object();
			$user[0]->lerato = $user[0]->lerato + $amount;
			$inserted = $this->user->updateUser($user[0], $user[0]->id);
			$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">LRT Purchased</div>');
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Error Purchasing LRT. Ensrure your bank Details are OK'.validation_errors().'</div>');
		}
		
		redirect('/receive', 'location');
    }
	
	
   //logout destroying all sessions
    public function logout(){
        //save loggedout
        $this->user->toggleLogin($this->session->userdata('email'), 0);
        $this->session->unset_userdata(array('loggedin','email','role','name','pin'));
        redirect('/auth/login', 'location');
    }
    
	//signup/create new subscriber/user
	public function signup(){
		//redirect to dashboard if already logged-in
		if($this->session->userdata('loggedin') == 1)
			redirect('/admin', 'location');
		
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[1]');
       // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[1]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');
        
        if ($this->form_validation->run() === FALSE){
            redirect('/auth/signup');
        }else{ //user account
			$user['first_name'] = $this->input->post('fname');
			$user['last_name'] = $this->input->post('lname');
			$user['email'] = $this->input->post('email');
			$user['phone'] = $this->input->post('phone');
			$user['phone'] = $this->input->post('phone');
			$user['identification'] = $this->input->post('identification');
			$user['address'] = $this->input->post('home_address');
			$user['itax'] = $this->input->post('itax');
			$user['btax'] = $this->input->post('btax');
			$user['country'] = $this->input->post('country');
			$user['city'] = $this->input->post('city');
			$user['password'] = $this->input->post('password');
			$user['province'] = $this->input->post('state');
			$user['zip'] = $this->input->post('zip');
			$user['id'] = sha1($this->input->post('email'));
			
			//bank info
			$bankinfo['bankname'] = $this->input->post('bankname');
			$bankinfo['bankaccountname'] = $this->input->post('bankaccountname') == '' ? $user['first_name'].$user['last_name'] : $this->input->post('bankaccountname');
			$bankinfo['bankpersonid'] = $this->input->post('bankpersonid') == '' ? $user['identification'] : $this->input->post('bankpersonid');
			$bankinfo['bankpersonaddress'] = $this->input->post('bankpersonaddress') == '' ? $user['home_address'] : $this->input->post('bankpersonaddress');
			$bankinfo['bankcontact'] = $this->input->post('bankcontact') == '' ? $user['phone'] :  $this->input->post('bankcontact');
			$bankinfo['bankemail'] = $this->input->post('bankemail') == '' ? $user['email'] : $this->input->post('bankemail');
			$bankinfo['bankaddress'] = $this->input->post('bankaddress');
			$bankinfo['bankbranchcode'] = $this->input->post('bankbranchcode');
			$bankinfo['bankcountry'] = $this->input->post('bankcountry');
			$bankinfo['ebranchcode'] = $this->input->post('ebranchcode');
			$bankinfo['opened'] = $this->input->post('moaccountdateopened').'/'.$this->input->post('yraccountdateopened');
			$bankinfo['bankswift'] = $this->input->post('bankswift');
			$bankinfo['owner_id'] = $user['id'];
            //validate
            $useradded = $this->user->addUser($user);
			$bankadded = $this->bank->insert($bankinfo);
            //set session
            if($useradded && $bankadded){
                //success, send email for confirmation of account
                $this->session->set_flashdata('info', 'Account created. Login to continue');
                redirect('/auth/login', 'location');   
            }else{
				$this->user->deleteUser($user['id']);
                //error
                $this->session->set_flashdata('error', 'Account not created. Check form to make sure all information was entered correctly');
                redirect('/auth/signup', 'location');
            }
        }
	}
    
	//login
    public function login(){
		//redirect to dashboard if already logged-in
		if($this->session->userdata('loggedin') == 1)
			redirect('/admin', 'location');
		
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[6]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        
        if ($this->form_validation->run() === FALSE){
            
            redirect('/auth/login');
        }
        else{
            //validate and redirect
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //$role = $this->input->post('role');
            $loggedin = $this->user->authenticate($email, $password);
            //set session
            if($loggedin){
                //success
                $user = $this->user->getUser($email)->result_object();
				
                //set owner
                $this->session->set_userdata(array(
                    'loggedin' => true,
                    'email' => $email,
                    'role' => $user[0]->role,
                    'name' => $user[0]->name,
                    'pin'=>$user[0]->id,
					'lerato' => $user[0]->lerato
                ));
				//var_dump($this->session->has_userdata('loggedin'));
				//return;
                $this->user->toggleLogin($email, 1);
                $this->session->set_flashdata('hide', true);
                redirect('/admin', 'location');   
            }else{
                //error
                $this->session->set_flashdata('error', 'Email/password incorrect');
                
                redirect('/auth/login', 'location');
            }
        }
    }
  
   //force download of the bordereau for a given trip
    public function export($id){
        $reservations = $this->reservation->getReservationsByTripId($id);
        $this->exportExcel($reservations);
    }
    //export results (bordereau) as Excel sheet
    public function exportExcel($query){
        if(!$query)
            return false;
 
        // Starting the PHPExcel library
        $this->load->library('excel');
        $this->load->library('iofactory');
 
        $objPHPExcel = $this->excel->init(); //new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Bordereaux-export")->setDescription("Liste du Jour");
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        //field names to fetch
        $data_fields = array('reservation_id','user_name','idcard_number','phone_number','email','amount','seats_reserved','status',
        'category','departure','destination','bus_number','departure_date','departure_time','date_string');
        
        // Field names in the first row. Create Heading
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
            if(in_array($field, $data_fields)){
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
                $col++;
            }
        }
 
        // Fetching the table data
        $row = 2;
        foreach($query->result('array') as $data)
        {
            $col = 0;
            foreach ($data_fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]);
                $col++;
            }
 
            $row++;
        }
 
        $objPHPExcel->setActiveSheetIndex(0);
 
        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Bordereaux_'.date('dMy').'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');    
    }
    
    //get the required page content for a given request
    private function getPage($page, $data = array()){
        $this->load->view('admin/header', $data);
		$this->load->view('admin/'.$page, $data);
		$this->load->view('admin/footer', $data);
    }
    //check logged-in state
    private function checkLogin(){
        //if user is not logged-in redirect user
        $logged_in = $this->session->has_userdata('loggedin');
		
        if(!$logged_in){
            //logged out so redirect to home
			$this->session->set_flashdata('info', 'Currently Logged Out');
            redirect('login', 'location');
        }
    }

	

}