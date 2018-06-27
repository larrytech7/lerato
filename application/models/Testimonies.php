<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonies extends CI_Model{

    protected $table = 'testimonies';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }    
    
    //create/update Testimonies in DB
    public function insert($testimony){
        $testimony['created_at'] = time();
        $testimony['updated_at'] = time();
        return $this->db
				->replace($this->table, $testimony);
    }

    
    //delete event
    public function deletetestimony($Id){
		$update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $Id)
            ->update($this->table);
    }
    
    //list all events created
    public function getTestimonies(){
        return $this->db
            ->from($this->table)
			->where('deleted_at', NULL)
            ->order_by('updated_at', 'DESC')
            ->get();
    }
	
	//get a particular event
	public function getTestimonyById($id){
		$event = $this->db->where('id', $id)
						->where('deleted_at', NULL)
						->limit(1)
						->get($this->table);
		return $event;
	}
    
}