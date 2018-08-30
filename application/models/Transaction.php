<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Model{

    protected $table = 'transactions';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }    
    
    //create/update transaction in DB
    public function insert($trans){
        $trans['created_at'] = time();
        $trans['updated_at'] = time();
        $trans['current_date_string'] = date('l jS \of F Y h:i:s A');
        return $this->db
            ->replace($this->table, $trans);
    }
    
    //update/edit
    public function update($t, $id){
        
        $t['updated_at'] = date('Y-m-d H:i:s', time());
		$t['current_date_string'] = date('l jS \of F Y h:i:s A');
		
        return $this->db
                ->set($t)
                ->where('id', $id)
                ->update($this->table);
    }
    
    //delete
    public function delete($Id){
		$update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $Id)
            ->update($this->table);
    }
    
    //list all 
    public function get(){
        return $this->db
            ->from($this->table)
			->where('deleted_at', NULL)
            ->order_by('updated_at', 'DESC')
            ->get();
    }
	
	//get a particular 
	public function getUserTransactions($email){
		$t = $this->db->where('sender', $email)
						->where('deleted_at', NULL)
						->get($this->table);
		return $t;
	}
    
}