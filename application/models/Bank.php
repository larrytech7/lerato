<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Model{

    protected $table = 'banks';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }    
    
    //create/update Testimonies in DB
    public function insert($bank){
        $bank['created_at'] = time();
        $bank['updated_at'] = time();
        return $this->db
				->replace($this->table, $bank);
    }
    
    //list all events created
    public function getAll($id = 0){
        return $this->db
            ->from($this->table)
			->where('author_id', $id)
			->where('deleted_at', NULL)
            ->order_by('updated_at', 'DESC')
            ->get();
    }
	
	//get a particular bank detail
	public function getById($id){
		$event = $this->db->where('owner_id', $id)
						->where('deleted_at', NULL)
						->limit(1)
						->get($this->table);
		return $event;
	}
    
}