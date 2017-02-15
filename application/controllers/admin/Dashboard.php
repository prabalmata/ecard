<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user');
    
    }

    public function index() {
        $all_card = $this->user->get_all_card_admin();
        $this->load->view('header_admin');
        $this->load->view('card', $all_card);
    }

    public function register_database() {

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'You must provide a %s.')
        );
        if ($this->form_validation->run() == FALSE) {
            redirect('/');
        } else {
			 $user_type = $this->input->post('user_type');
				  if($user_type=="admin"){
					  $value = 1;
					  }else{
						  
						  $value = 0;
						  }
            $name = $this->input->post('name');
            $date = date("Y-m-d");
            $password = $this->input->post('password');
            $data = array(
                'name' => $name,
                'password' => $password,
                'creation_date ' => $date,
                'created_by' => 'admin',
                'active' => '1',
                'role' => $value
            );
            $this->user->user_save($data);
            redirect('/admin/dashboard/all_user');
        }
    }

    public function all_user() {
        //~ $this->load->view('header');
        $all_users = $this->user->get_all_users();
        $this->load->view('header_admin');
        $this->load->view('register', $all_users);
    }

    public function logout() {
      session_start() ;
        session_destroy();
        
        redirect('/');
    }

    public function create_card() {
        redirect('admin/create');
    }

    public function report() {
        $this->load->view('header_admin');
        $all_records['data'] = $this->user->get_all_email_send_record();
        $all_records['non_login_data'] = $this->user->get_all_email_send_record_for_non_login();
        $this->load->view("report", $all_records);
    }

    public function edit_paswword() {
        $pwd = $_POST['name'];
        $id = $_POST['id'];
        $pwd = $this->user->get_user_pwd($id, $pwd);
        redirect('/admin/dashboard/all_user');
    }

  

    public function change_status() {
        if ($_POST['to_do'] == 'active') {
            $data = 1;
        } else {
            $data = 0;
        }
        $this->user->change_status_active_inactive($_POST['id_user'], $data);
        redirect('/admin/dashboard/all_user');
        die();
    }

   public function edit_save(){
	   die("here");
	   
	   }
    public function delete_user(){
		 $id = $this->input->post('id');
		$this->user->delete_user($id);
		redirect('/admin/dashboard/all_user');
		}	   
	   
}
