<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Model{

    protected $table = 'reviews';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }
    
    public function getReviews($pill_id){
        return $this->db
                ->from($this->table)
                ->where('deleted_at', NULL)
				->where('pill_id', $pill_id)
                ->order_by('created_at', 'DESC')
                ->get();
    }
    
    public function insert($review){
        $review['created_at'] = time();
        $review['updated_at'] = time();
        
        return $this->db
             ->insert($this->table, $review);
    }
    
    public function deleteReview($id){
        $update = array('deleted_at' => time());
		
        return $this->db
            ->set($update)
            ->where('id', $id)
            ->update($this->table);
    }
    
}