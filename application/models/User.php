<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{
    
    protected $table = 'user';
    
    /**
     * User types are : Company, agencies, operators (branches)
     */
      
    public function __construct(){
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('Africa/Douala');
    }
    
    //determine if user login is correct
    public function authenticate($email, $password, $role='admin'){
        $result = $this->db->from($this->table)
        ->where('email', $email)
        ->where('password', sha1($password))
//        ->where('role', $role)
        ->get();
        return $result->num_rows() > 0;
    }
    //toggle_userlogin state
    public function toggleLogin($email, $state){
        return $this->db
        ->where('email', $email)
        ->set(array(
            'logged_in'=>$state,
            'updated_at'=>time(),
            'date_string'=>date("l jS \of F Y h:i:s A")
        ))
        ->update($this->table);
    }
    
    //save new user
    public function addUser($user){
        $t = time();
		$user['password'] = sha1($user['password']);
		$user['lerato'] = 0.00;
        $user['created_at'] = $t;
        $user['updated_at'] = $t;
        $user['date_string'] = date('l jS \of F Y h:i:s A', $t);
        
        return $this->db
            ->replace($this->table, $user);
        //return $this->db->insert_id();
    }
    //list all users
    public function getUsers($owner){
        return $this->db
            ->from($this->table)
            ->where('owner', $owner)
			->where('deleted_at', NULL)
            ->order_by('create_at', 'DESC')
            ->get();
    }
    //delete user
    public function deleteUser($id){
        return $this->db
				->set('deleted_at', time())
                ->where('id',$id)
                ->update($this->table);
    }
    //get a user by email
    public function getUser($email){
        return $this->db
                ->where('email', $email)
				->limit(1)
                ->get($this->table);
    }
    //get user by id
    public function getUserById($id){
        return $this->db->where('id', $id)->get($this->table);
    }
    
    //update user
    public function updateUser($user, $id){
        $user->updated_at = time();
        $user->date_string = date('l jS \of F Y h:i:s A');
        return $this->db
                ->set($user)
                ->where('id', $id)
                ->update($this->table);
    }
	
	//update users with transaction
    public function updateWithTransaction($user1, $user2){
        $user1->updated_at = time();
        $user2->updated_at = time();
        $user1->date_string = date('l jS \of F Y h:i:s A');
        $user2->date_string = date('l jS \of F Y h:i:s A');
		$this->db->trans_start();
		$this->db->replace($this->table, $user1);
		$this->db->replace($this->table, $user2);
		$this->db->trans_complete();
		
		return $this->db->trans_status();
    }
}