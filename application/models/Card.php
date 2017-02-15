<?php

class Card extends CI_Model {
	 public function __construct()
        {
                parent::__construct();
           $this->load->database(); 
                
        }
	
	
	public function get_cards(){
		$data = $this->db->select('*')->from('admin_cards');
		return $data;
	}
	
	public function get_card($id){
		$data = $this->db->select('*')->from('admin_cards')->where('id =', $id);
		return $data;
	}
	public function get_card_non_login($id){
		$data = $this->db->get_where('admin_cards',array('id' => $id));
		return $data;
	}
	}
