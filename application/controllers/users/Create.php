<?php

class Create extends CI_Controller {
	 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user');
        $this->load->model('UserCard');
       
    }
	
	 public function index() {
        $this->load->view('header_user');
        $this->load->view("create_card_user");
    }
     public function create_card_save() {
        if (isset($_POST['submit'])) {

            if (isset($_REQUEST['title']) && !empty($_REQUEST['title'])) {
                $title = $_REQUEST['title'];
            } else {
                $data_error['title'] = "Fill Title";
            }
            if (isset($_REQUEST['eng_grt']) && !empty($_REQUEST['eng_grt'])) {
                $eng_lng = $_REQUEST['eng_grt'];
                $eng_lng = implode("-", $eng_lng);
                // echo $eng_lng; die("hmm");
            } else {
				$data_error['eng_grt'] = "Fill English Gretting";
               
            }
            if (isset($_REQUEST['china_grt']) && !empty($_REQUEST['china_grt'])) {
                $china_lng = $_REQUEST['china_grt'];
                $china_lng = implode("-", $china_lng);
            } else {
				$data_error['china_grt'] = "Fill Chinese Gretting";
                
            }
            if (isset($_FILES['ecard_animation']) && !empty($_FILES['ecard_animation'])) {
                $type  = $_FILES['ecard_animation']['type']; 
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/users/';
                $config['allowed_types'] = 'mpeg|mp4|gif';
                 $config['max_size'] = 19200;
                 $config['file_name'] = rand(); 
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_animation')) {

                    $data_error['ecard_animation'] =  $this->upload->display_errors();
                } else {
                     $path_animation = 'assets/users/' . $config['file_name'].'.'.$type_upload[1];
                }
            }

            if (isset($_FILES['form_background']) && !empty($_FILES['form_background'])) {
                $type  = $_FILES['form_background']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/users/';
                $config['allowed_types'] = 'jpeg';
                $config['max_width'] = 1920;
                $config['min_width'] = 1920;
                $config['max_height'] = 1080;
                $config['min_height'] = 700;
                $config['file_name'] = rand();
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
                $config['upload_path'] = './assets/users/';
                $config['allowed_types'] = 'gif|jpg|png|mp3|jpeg';
                $config['max_width'] = 12800;
                $config['min_width'] = 128;
                $config['max_height'] = 7200;
                $config['min_height'] = 50;
                $config['file_name'] = rand();
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_image')) {

                    $data_error['ecard_image'] = $this->upload->display_errors();
                } else {
                    $path_ecard_image = 'assets/users/' . $config['file_name'].'.'.$type_upload[1];
                }
            }
            if (isset($_FILES['ecard_music']) && !empty($_FILES['ecard_music'])) {
                $type  = $_FILES['ecard_music']['type'];
                $type_upload = explode("/", $type);
                $config['upload_path'] = './assets/users/';
                $config['allowed_types'] = 'gif|jpg|png|mp3|jpeg';
                $config['max_width'] = 12800;
                $config['min_width'] = 128;
                $config['max_height'] = 7200;
                $config['min_height'] = 50;
                $config['file_name'] = rand();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);  
                if (!$this->upload->do_upload('ecard_music')) {

                    $data_error['ecard_music'] =  $this->upload->display_errors();
                } else {
                    $path_ecard_music = 'assets/users/' . $config['file_name'];
                }
            }



            if (isset($data_error) && !empty($data_error)) {
                
                $data_error["data"] = $data_error;
                $this->load->view('header_user');
                $this->load->view('create_card_user', $data_error);
            } else {
			    $user_id = $_GET['id'];
                $insert_data['user_id'] = $user_id;
                $insert_data['ecard_title'] = $title;
                $insert_data['ecard_animation'] = $path_animation;
                $insert_data['ecard_form_background'] = $path_form_background;
                $insert_data['ecard_email_image'] = $path_ecard_image;
                $insert_data['ecard_email_music'] = $path_ecard_music;
                $insert_data['ecard_eng_greeting'] = $eng_lng;
                $insert_data['ecard_chinese_greeting'] = $china_lng;
                $this->UserCard->create_card_insert($insert_data);
                redirect('/users/dashboard/');
            }
        }
    }
      public function delete_card() {
        $id = $_GET['id'];
        $this->user->delete_card($id);
        redirect('/users/dashboard');
        die();
    }
	   public function edit_card(){
	    $all_detail = $this->user->get_card_detail_by_card_id();
	    $card_detail['card_detail'] = $all_detail; 
        $this->load->view('header_user');
        $this->load->view('edit_card_user', $card_detail);
	   } 
	}
