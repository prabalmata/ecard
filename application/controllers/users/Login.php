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
				  $data = array(
                    'name' => $name,
                    'password' => $password,
                    );
				  $count = $this->user->get_user($data);
				  if($count == 1){
	             redirect(base_url('index.php/users/dashboard'));
					  }else
					  {
				 redirect(base_url('index.php/users/dashboard')); 
						  }
     
	}
	public function register(){
		        $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('password', 'password', 'required',
                        array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_rules('email', 'email', 'required');
                if ($this->form_validation->run() == FALSE)
                {
				redirect(base_url('ecard'));  
                }
                else
                {
				  $name = $this->input->post('name');
				  $password = $this->input->post('password');
				  $email = $this->input->post('email');	
				  $data = array(
                    'name' => $name,
                    'password' => $password,
                    'email' => $email
                    );
				  $this->user->user_save($data);
				  redirect(base_url('index.php/users/dashboard'));  
                }
		
		}
}
