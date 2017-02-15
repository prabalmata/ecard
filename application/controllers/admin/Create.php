<?php

class Create extends CI_Controller {
	 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user');
    
    }
	
	 public function index() {
        $this->load->view('header_admin');
        $this->load->view("create_card_admin");
    }
     public function create_card_save() {
        if (isset($_POST['submit'])) {

            if (isset($_POST['title']) && !empty($_POST['title'])) {
                $title = $_POST['title'];
                $result  = preg_match('/\s/',$title);
                if($result==1){
					$data_error['title']="Title should have no space";
					}
            } else {
               $data_error['title'] = "Fill Title";
            }
            if (isset($_POST['eng_grt']) && !empty($_POST['eng_grt'])) {
                $eng_lng = $_POST['eng_grt'];
              
                $eng_lng = implode("-", $eng_lng);
                // echo $eng_lng; die("hmm");
            } else {
				$data_error['eng_grt'] = "Fill English Gretting";
                
            }
            if (isset($_POST['china_grt']) && !empty($_POST['china_grt'])) {
                $china_lng = $_POST['china_grt'];
              
                $china_lng = implode("-", $china_lng);
             
            } else {
				$data_error['china_grt'] = "Fill Chinese Gretting";
                
            }
            if (isset($_FILES['ecard_animation']) && !empty($_FILES['ecard_animation'])) {
                $type  = $_FILES['ecard_animation']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/admin/';
                $config['allowed_types'] = 'mpeg|mp4|gif';
                 $config['max_size'] = 192000;
                 $config['file_name'] = rand().'ecard_animation'; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_animation')) {

                    $data_error['ecard_animation'] =  $this->upload->display_errors();
                } else {
                     $path_animation = 'assets/admin/' . $config['file_name'].'.'.$type_upload[1];
                }
            }

            if (isset($_FILES['form_background']) && !empty($_FILES['form_background'])) {
                $type  = $_FILES['form_background']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/admin/';
                $config['allowed_types'] = 'jpeg';
                $config['max_width'] = 1920;
                $config['min_width'] = 700;
                $config['max_height'] = 1920;
                $config['min_height'] = 700;
                $config['file_name'] = rand().'form_background';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('form_background')) {

                    $data_error['form_background'] =  $this->upload->display_errors();
                } else {
                    $path_form_background = 'assets/admin/' . $config['file_name'].'.'.$type_upload[1];
                }

            }
            if (isset($_FILES['ecard_image']) && !empty($_FILES['ecard_image'])) {
				$type  = $_FILES['ecard_image']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/admin/';
                $config['allowed_types'] = 'gif|jpg|png|mp3|jpeg';
                $config['max_width'] = 12800;
                $config['min_width'] = 128;
                $config['max_height'] = 7200;
                $config['min_height'] = 50;
                $config['file_name'] = rand().'ecard_image';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_image')) {

                    $data_error['ecard_image'] = $this->upload->display_errors();
                } else {
                    $path_ecard_image = 'assets/admin/' . $config['file_name'].'.'.$type_upload[1];
                }
            }
           


            if (isset($data_error) && !empty($data_error)) {
                
                $data_error_show["data"] = $data_error;
                $this->load->view('header_admin');
                $this->load->view('create_card_admin', $data_error_show);
            } else {
                $insert_data['ecard_title'] = $title;
                $insert_data['ecard_animation'] = $path_animation;
                $insert_data['ecard_form_background'] = $path_form_background;
                $insert_data['ecard_email_image'] = $path_ecard_image;
                $insert_data['ecard_eng_greeting'] = $eng_lng;
                $insert_data['ecard_chinese_greeting'] = $china_lng;
                $this->user->create_card_insert($insert_data);
                redirect('/admin/dashboard/');
            }
        }
    }
      public function delete_card() {
        $id = $_GET['id'];
        $this->user->delete_card($id);
        redirect('/admin/dashboard');
        die();
    }
	   public function edit_card(){
		   $id = $_GET["id"];
	    $all_detail = $this->user->get_card_detail_by_card_id($id);
	    $card_detail['card_detail'] = $all_detail; 
        $this->load->view('header_admin');
        $this->load->view('edit_card_admin', $card_detail);
	   } 
	  public function edit_save(){
	    $id = $_GET['id'];
	   
	    $all_detail = $this->user->get_card_detail_by_card_id($id);
	  
	     if (isset($_POST['submit'])) {

            if (isset($_POST['title']) && !empty($_POST['title'])) {
                $title = $_POST['title'];
                $result  = preg_match('/\s/',$title);
                if($result==1){
					$data_error['title']="Title should have no space";
					}
            } else {
              $title =  $all_detail[0]->ecard_title;
            }
            if (isset($_POST['eng_grt']) && !empty($_POST['eng_grt'])) {
                $eng_lng = $_POST['eng_grt'];
              
                $eng_lng = implode("-", $eng_lng);
                // echo $eng_lng; die("hmm");
            } else {
				
                $eng_lng= $all_detail[0]->ecard_eng_greeting;
            }
            if (isset($_POST['china_grt']) && !empty($_POST['china_grt'])) {
                $china_lng = $_POST['china_grt'];
              
                $china_lng = implode("-", $china_lng);
             
            } else {
				$china_lng=$all_detail[0]->ecard_chinese_greeting;
                
            }
            if (isset($_FILES['ecard_animation']) && ($_FILES['ecard_animation']['size']!=0)) {
				$type  = $_FILES['ecard_animation']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/admin/';
                $config['allowed_types'] = 'mpeg|mp4|gif';
                 $config['max_size'] = 19200;
                 $config['file_name'] = rand().'ecard_animation'; 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_animation')) {

                    $data_error['ecard_animation'] =  $this->upload->display_errors();
                } else {
                     $path_animation = 'assets/admin/' . $config['file_name'].'.'.$type_upload[1];
                }
            } else {
				$path_animation =$all_detail[0]->ecard_animation;
                
            }
            

            if (isset($_FILES['form_background']) && ($_FILES['form_background']['size']!=0)) {
                $type  = $_FILES['form_background']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/admin/';
                $config['allowed_types'] = 'jpeg';
                $config['max_width'] = 1920;
                $config['min_width'] = 700;
                $config['max_height'] = 1920;
                $config['min_height'] = 700;
                $config['file_name'] = rand().'form_background';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('form_background')) {

                    $data_error['form_background'] =  $this->upload->display_errors();
                } else {
                    $path_form_background = 'assets/admin/' . $config['file_name'].'.'.$type_upload[1];
                }

            } else {
				$path_form_background = $all_detail[0]->ecard_form_background; 
                
            }
            
            if (isset($_FILES['ecard_image']) && ($_FILES['ecard_image']['size']!=0)) {
				$type  = $_FILES['ecard_image']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/admin/';
                $config['allowed_types'] = 'gif|jpg|png|mp3|jpeg';
                $config['max_width'] = 12800;
                $config['min_width'] = 128;
                $config['max_height'] = 7200;
                $config['min_height'] = 50;
                $config['file_name'] = rand().'ecard_image';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_image')) {

                    $data_error['ecard_image'] = $this->upload->display_errors();
                } else {
                    $path_ecard_image = 'assets/admin/' . $config['file_name'].'.'.$type_upload[1];
                }
            } else {
				
                $path_ecard_image = $all_detail[0]->ecard_email_image;
            }
            
           


            if (isset($data_error) && !empty($data_error)) {
                
                $data_error_show["data"] = $data_error;
                $all_detail = $this->user->get_card_detail_by_card_id($id);
	            $data_error_show['card_detail'] = $all_detail; 
                $this->load->view('header_admin');
                $this->load->view('edit_card_admin', $data_error_show);
            } else {
                $insert_data['ecard_title'] = $title;
                $insert_data['ecard_animation'] = $path_animation;
                $insert_data['ecard_form_background'] = $path_form_background;
                $insert_data['ecard_email_image'] = $path_ecard_image;
                $insert_data['ecard_eng_greeting'] = $eng_lng;
                $insert_data['ecard_chinese_greeting'] = $china_lng;
                $this->user->edit_card_update($insert_data,$id);
                redirect('/admin/dashboard/');
            }
        }
	 
	   
	   } 
	}
