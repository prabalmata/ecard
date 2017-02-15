<?php
class Login extends CI_Controller {
  public function __construct()
        {
                parent::__construct();
                $this->load->library('form_validation');
                $this->load->helper(array('form', 'url'));
                $this->load->model('user');
                
        }
	public function index()
	{
				  $name = $this->input->post('name');
				  $password = $this->input->post('password');
				  
				  if($name=="admin" && $password=="demo123"){
				                         session_start();
                                     $_SESSION["admin"] = "admin";
	            	                 $_SESSION["admin_name"] = $name;
					redirect('/admin/dashboard');  
					  }else{
				    	  $data = array(
                    'name' => $name,
                    'password' => $password,
                    );
                  $count = $this->user->get_user($data);
				  if($count == 1){
                                     $id = $this->user->get_id($data);
                                     $role = $this->user->get_role_by_id($id);
                                     print_r($role[0]->role);
                                     if($role[0]->role ==1){
										 session_start();
										 $_SESSION["admin"] = "admin";
	            	                	 $_SESSION["admin_id"] = $id;
                                         $_SESSION["admin_name"] = $name;
										redirect('/admin/dashboard');
										 }else{
										session_start();
                                         $_SESSION["user_id"] = $id;
                                         $_SESSION["user_name"] = $name;
                                     
	             redirect('users/dashboard/send_mail');	 
											 
											 }
                                      
					  }else
					  {
						
				 redirect('/');
						  }		  
						  }
				  
	}
	public function register(){
		        $this->form_validation->set_rules('name', 'name', 'required',
		              array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_rules('password', 'password', 'required',
                        array('required' => 'You must provide a %s.')
                );
                //~ $this->form_validation->set_rules('email', 'email', 'required');
                if ($this->form_validation->run() == FALSE)
                {
				redirect('/');  
                }
                else
                {
				  $name = $this->input->post('name');
				  $password = $this->input->post('password');
				 
				  //~ $email = $this->input->post('email');	
				  $data = array(
                    'name' => $name,
                    'password' => $password,
                    'role' => $value
                    );
				  $this->user->user_save($data);
				  redirect('/users/dashboard');  
                }
		
		}
}
