<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devotions extends CI_Model{

    protected $table = 'devotionals';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }
    
    public function get(){
        return $this->db
                ->from($this->table)
                ->where('deleted_at', NULL)
				->order_by('updated_at', 'DESC')
                ->get();
    }
    
    public function insert($dev){
        $dev['updated_at'] = time();
        $dev['current_date_string'] = date('Y-m-d H:i:s a');
        
        return $this->db
				->set($dev)
				->replace($this->table);  
    }
    
    public function delete($id){
        $update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $id)
            ->update($this->table);
    }
}