<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Model{

    protected $table = 'transactions';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }    
    
    //create/update pill in DB
    public function insert($event){
        $event['created_at'] = time();
        $event['updated_at'] = time();
        $event['current_date_string'] = date('l jS \of F Y h:i:s A');
        $this->db
            ->replace($this->table, $event);
        return $this->db->insert_id();
    }
    
    //update/edit event
    public function update($event, $id){
        
        $event['updated_at'] = date('Y-m-d H:i:s', time());
		$event['current_date_string'] = date('l jS \of F Y h:i:s A');
		
        return $this->db
                ->set($event)
                ->where('id', $id)
                ->update($this->table);
    }
    
    //delete event
    public function delete($Id){
		$update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $Id)
            ->update($this->table);
    }
    
    //list all events created
    public function get(){
        return $this->db
            ->from($this->table)
			->where('deleted_at', NULL)
            ->order_by('updated_at', 'DESC')
            ->get();
    }
	
	//get a particular event
	public function getById($id){
		$event = $this->db->where('id', $id)
						->where('deleted_at', NULL)
						->limit(1)
						->get($this->table);
		return $event;
	}
    
}