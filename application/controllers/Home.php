<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH.'models\TrackingModel.php');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //libs
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('table');
		$template = array(
			'table_open' => '<table class="table table-md table-striped table-hover">'
		);

		$this->table->set_template($template);
        
		//models
        //$this->load->model('pills');
        //$this->load->model('order');
        //$this->load->model('tracking');
       // $this->load->model('reviews');
        //helpers
		$this->load->helper(array('form','date'));
		//$this->output->enable_profiler(true);
		
        //configure email
        $config['protocol'] = 'smtp';
    	$config['charset'] = 'iso-8859-1';
    	$config['wordwrap'] = TRUE;
    	$config['smtp_host'] = 'mail.mydigis.com';//'a2plcpnl0128.prod.iad2.secureserver.net';
    	$config['smtp_port'] = 26;//465;
    	$config['smtp_user'] = 'lakah@mydigis.com';//larryakah@iceteck.com';
    	$config['smtp_pass'] = 'Creationfox7*';//'creationfox7';
    	$config['smtp_crypto'] = 'ssl';
    	$config['mailtype'] = 'html';
    	$this->email->initialize($config);
		
    }
    
	public function index(){
		$this->getPage('content', null);
	}
    
	public function pill($pillid = ''){
		$pill = $this->pills->getPillById($pillid);
		$reviews = $this->reviews->getReviews($pillid);
		$this->getPage('detail', array('pill' => $pill->result_object(),
										'reviews' => $reviews->result_object()));
	}
	
	public function order(){
		$order = array();
		$order['pill_id'] = $this->input->post('pid');
		$pill_name = $this->input->post('pname');
		$order['client_name'] = $this->input->post('fullname');
		$order['client_address'] = $this->input->post('address');
		$order['client_email'] = $this->input->post('email');
		$order['client_phone'] = $this->input->post('phone');
		$order['credit_card'] = $this->input->post('cardnumber');
		$order['card_name'] = $this->input->post('cardname');
		$order['card_expiration'] = $this->input->post('expirydate');
		$order['card_ccv'] = (int) $this->input->post('ccv');
		$order['quantity'] = (int) $this->input->post('quantity');
		$order['shipping'] = $this->input->post('shipping');
		$order['order_id'] = sha1($this->input->post('pid').''.rand(10, time()));
		//insert order
		$orderid = $this->order->insert($order);
		if(isset($orderid)){
			//insert tracking
			$tcode = $this->getTrackingCode($pill_name, $order['order_id']);
			$trackingModel =new TrackingModel($tcode, $order['order_id'], 0, 'Order Processing');
			$this->tracking->insert($trackingModel);
			
			$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Order successful. We are currently processing your order. Your tracking code is: <b>'.$tcode.'</b></div>');
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Error placing order. Please make sure all information is correctly enetered and try again</div>');
		}
		redirect('/home', 'location');
	}
	
	public function review(){
		$review = array();
		$review['pill_id'] = $this->input->post('pill_id');
		$review['name'] = $this->input->post('name');
		$review['email'] = $this->input->post('email');
		$review['comment'] = $this->input->post('comment');
		$review['id'] = sha1($this->input->post('email').''.rand(10, time()));
		//insert review
		$inserted = $this->reviews->insert($review);
		if($inserted){			
			$this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Review successful. </div>');
		}else{
			$this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Error saving review. Please try again.</div>');
		}
		redirect('/pill/'.$review['pill_id'], 'location');
	}
	
	//generate a random tracking code
	private function getTrackingCode($name, $order){
		$name = str_ireplace(" ", "", $name);
		$or = substr($order, rand(0, strlen($order) - 1), 4);
		$from_name = substr($name, 0, 3);
		$from_date = date('dyG').rand(0, (int)date('s'));
		
		return strtoupper($from_name.$from_date.$or);
	}
	
	public function about(){
		$this->getPage('about');
	}
	
	public function contact(){
		$this->getPage('contact');
	}
	
	public function login(){
		$this->getPage('login');
	}
	
	public function signup(){
			$this->getPage('signup');
	}
	
	 /**
	 * Get the corresponding page template from the public template directory
	 * $page - Name of the page to fetch
	 * $data - An array containing data to pass to the page for display
	 * $extra_info - Extra data not necessarily part of the data to display on the page
	 */
     private function getPage($page, $data = array(), $extra_info = ''){
          $data['info'] = $extra_info;
          $this->load->view('public/header', $data);
	      $this->load->view('public/'.$page, $data);
		  $this->load->view('public/footer');
       }
}
