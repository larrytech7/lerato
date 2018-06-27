<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Model{

    protected $table = 'videos';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }
    
    public function get(){
        return $this->db
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->order_by('created_at', 'DESC')
                ->get();
    }
    
    public function getVideo($orderid){
        return $this->db
                ->from($this->table)
                ->where('id', $orderid)
				->where('deleted_at', null)
				->limit(1)
                ->get();
    }
    //insert/update
    public function insert($video){
        $video['created_at'] = time();
        $video['updated_at'] = time();
        
        $this->db
             ->replace($this->table, $video);
        return $this->db->insert_id();   
    }
    
    public function delete($id){
        $update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $id)
            ->update($this->table);
    }
    
}