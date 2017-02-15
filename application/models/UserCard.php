<?php

class UserCard extends CI_Model {
	 public function __construct()
        {
                parent::__construct();
           $this->load->database(); 
                
        }
     public function create_card_insert($data){
		
		 $this->db->insert('user_cards', $data);
		
		 }    
	
	}
