<?php

class Company extends CI_Controller {
	 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user');
    
    }

     public function index(){
		 $all_company['company'] = $this->user->get_all_company();
		 $this->load->view('header_admin');
		 $this->load->view("company_admin.php",$all_company);
		 }
	 public function add(){
		 if (isset($_POST['add'])) {
              $company_name = $this->input->post('name'); 
               if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo'])) {
                $type  = $_FILES['company_logo']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/company/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['file_name'] = rand().'company_logo'; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('company_logo')) {
                  $data_error['company_logo'] =  $this->upload->display_errors();
                  redirect('admin/company'); 
                } else {
                     $path_logo = 'assets/company/'.$config['file_name'].'.'.$type_upload[1];
                   		$company_data['name'] = $company_name;
						$company_data['logo'] = $path_logo;
						$this->user->add_company($company_data);
						redirect('admin/company'); 
			    }
                }else{
					redirect('admin/company');
					}
                }
		        }
	 public function edit_company(){
		 $id = $_POST['hiden_id'];
		 if($_FILES['company_logo']['size']==0){
		         $name = $_POST['name'];	 
			     $path = $_POST['hiden_path'];
			     $company_data['name'] =$_POST['name'];
				 $company_data['logo'] = $path;
				 $this->user->update_company($company_data,$id);
				 redirect('admin/company'); 
			 }else{
				   $type  = $_FILES['company_logo']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/company/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['file_name'] = rand().'company_logo'; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('company_logo')) {
                  $data_error['company_logo'] =  $this->upload->display_errors();
                  redirect('admin/company'); 
                } else {
                     $path_logo = 'assets/company/'.$config['file_name'].'.'.$type_upload[1];
                   		$company_data['name'] =$_POST['name'];
						$company_data['logo'] = $path_logo;
						$this->user->update_company($company_data,$id);
						redirect('admin/company'); 
			    }
				 }
         		 
		 
		 }	      
	public function delete(){
		$id = $_GET['id'];
		$this->user->delete_company($id);
		redirect('admin/company');
		}	   

}
