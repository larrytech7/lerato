<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends CI_Model{

    protected $table = 'visitors';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }    
    
    //create/update pill in DB
    public function insert($event){
        $event['created_at'] = time();
        $event['updated_at'] = time();
        $this->db
            ->replace($this->table, $event);
        return $this->db->insert_id();
    }
   
    //delete event
    public function delete($Id){
		$update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $Id)
            ->update($this->table);
    }
    
    //list all created
    public function get($id){
        return $this->db
            ->from($this->table)
			->where('author_id', $id)
			->where('deleted_at', NULL)
            ->order_by('updated_at', 'DESC')
            ->get();
    }
	
	//get a particular visitors
	public function getById($id){
		return $this->db->where('id', $id)
						->where('deleted_at', NULL)
						->limit(1)
						->get($this->table);
	}
    
}