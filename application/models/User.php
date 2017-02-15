<?php

class User extends CI_Model {
	 public function __construct()
        {
                parent::__construct();
           $this->load->database(); 
                
        }
	
	public function user_save($data){
	$this->db->insert('users', $data);
		
		}
	
	public function get_user($data){
		$query = $this->db->get_where('users', $data);
		$count = $query->num_rows();
	     return $count; 
	
		
		}
	public function create_card_insert($data){
		$this->db->insert('admin_cards', $data);	
		}	
	public function get_all_card_admin(){
		$data = $this->db->get('admin_cards');
		$all_card['card_data'] = $data->result();
		return $all_card; 
		}
	public function get_all_users(){
		$data = $this->db->get('users');
		$all_users['users'] = $data->result();
		return $all_users;
 		}
     public function get_user_pwd($id,$pwd){
		 $this->db->set('password', $pwd);
         $this->db->where('id', $id);
         $this->db->update('users');
		 }	
	public function delete_card($id){
		$this->db->delete('admin_cards', array('id' => $id));
		
		}
	public function change_status_active_inactive($id,$data){
		
		$update =array(
        'active' => $data
           );
		$this->db->where('id', $id);
        $this->db->update('users', $update);
		
		
		}		 		
	  public function get_all_email_send_record(){
		  
          $query = $this->db->get('user_dispatch_email');
           $all_data  = $query->result();
		  return $all_data; 
		  }
          public function get_id($data){
             
         $query = $this->db->select('id');
         $this->db->where($data);
         $query = $this->db->get('users');  
           $id = $query->result();
          $user_id = $id[0]->id;
           return $user_id;
           
          }    
       public function get_card_detail_by_card_id($card_id){
		       if(isset($_GET['id']) && !empty($_GET['id'])){
				$id = $_GET['id'];   
				   }else{
					   $id = $card_id ;
					   }
		       
		       $all_detail = $this->db->get_where('admin_cards',array('id' => $id));
		       
		$all_detail_for_user = $all_detail->result();
		 return $all_detail_for_user; 
		   
		   }
	   public function delete_user($data){
		   $this->db->delete('users', array('id' => $data)); 
		   }
	   public function get_role_by_id($id){
		   $this->db->select('role');
		    $role = $this->db->get_where('users',array('id' => $id));
		       
		$role = $role->result();
		 return $role; 
		   }
	   public function edit_card_update($data ,$id){
		   $this->db->where('id', $id);
           $this->db->update('admin_cards', $data);
		   }
	   public function get_all_email_send_record_for_non_login(){
		  $query = $this->db->get('non_login_user_dispatch_email');
          $all_data  = $query->result();
		  return $all_data; 
		   }	   
	    public function add_company($company_details){
			$this->db->insert('company', $company_details);
			}
	    public function get_all_company(){
			$query = $this->db->get('company');
            $all_data  = $query->result();
            return $all_data;         
 			}		
 		public function delete_company($id){
			 $this->db->delete('company', array('id' => $id)); 
			}	
	    public function update_company($data,$id){
			$this->db->where('id', $id);
            $this->db->update('company', $data);
			
			}
		public function get_logo_by_name($data){
		    $this->db->select('logo');
		    $logo_url = $this->db->get_where('company',array('name' => $data));
		    $logo = $logo_url->result();
			return $logo ;
			die();
			}	
					
		   	          
	}
