<?php

class UserEmail extends CI_Model {
	 public function __construct()
        {
                parent::__construct();
           $this->load->database(); 
                
        }
        
        public function user_email_dispatch_save($data){
			$this->db->insert('user_dispatch_email', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		
		public function get_send_data($id){
		$data = $this->db->select('*')->from('user_dispatch_email')->where('id =', $id);
		return $data;
	}
		public function get_non_login_send_data($id){
		 $data = $this->db->get_where('non_login_user_dispatch_email',array('id' => $id));
		return $data;
	}
	 public function user_email_dispatch_save_non_login($data){
			$this->db->insert('non_login_user_dispatch_email', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
	}

