<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include(APPPATH.'models\TrackingModel.php');

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
	
	public function about(){
		$this->getPage('about');
	}
	
	public function contact(){
		$this->getPage('contact');
	}
	
	public function faq(){
		$this->getPage('faq');
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
