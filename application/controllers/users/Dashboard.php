<?php

class Dashboard extends CI_Controller {
	
	 public function __construct() {
                parent::__construct();
                $this->load->library('form_validation');
                $this->load->helper(array('form', 'url'));
                $this->load->model('card');
                $this->load->model('user');
                $this->load->model('UserEmail');
                 
        }
	
	public function index(){
	  $all_card = $this->user->get_all_card_admin();
	  $this->load->view('header_user');	
	  $this->load->view('card_user',$all_card);
		
		
		}
	public function send_mail(){
		
		$cardrow =array();
		$cards = $this->card->get_cards()->get();
		$admincard = array();
		if(isset($_GET['id'])){
			$admincard = $this->card->get_card($_GET['id'])->get();
			if ( $admincard->num_rows() > 0 ) {
				$admincard = $admincard->row();
			}
		}
		 if ( $cards->num_rows() > 0 ) {
			$row = $cards->result();
		}else{
			$row='';
			}
		
		$data = array(
			'cardrow' => $row,
			'heading' => 'My Heading',
			'admincard' => $admincard
		);
		$this->load->view('header_user');	
		$data['company_list'] = $this->user->get_all_company();
		//~ echo"<pre>";
		//~ print_r($data['company_list']);
		//~ echo"</pre>";
		//~ die;
		$this->load->view('dashboard',$data);
		
		}
	
	public function ajax_send_mail(){
		session_start();
		$formArr = $_POST['data'];
        $dataArr =  array();
		$site_url = site_url();
		$config = Array(       
            'protocol' => 'sendmail',
            'smtp_host' => 'your domain SMTP host',
            'smtp_port' => 25,
            'smtp_user' => 'SMTP Username',
            'smtp_pass' => 'SMTP Password',
            'smtp_timeout' => '4',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $config);
		foreach($formArr as $key => $form){
				
			$dataArr[$form['name']] =  $form['value'];
			$dataArr['user_id'] = $_SESSION['user_id'];
			$dataArr['created_at'] = date("Y-m-d");
		}
		
		$insert_id = $this->UserEmail->user_email_dispatch_save($dataArr);
		$insertArr = $this->UserEmail->get_send_data($insert_id)->get();
		if ( $insertArr->num_rows() > 0 ) {
				$insertRow = $insertArr->row();
		}
		$logo_url = $this->user->get_logo_by_name($insertRow->from_company);
		$logo = $logo_url[0]->logo;
		$admincard = $this->card->get_card($insertRow->from_admin_card)->get();
		
		if ( $admincard->num_rows() > 0 ) {
				$card = $admincard->row();
		}
		$this->email->from('prabal.codedrill@gmail.com', $dataArr['from_name']);
		$this->email->to($dataArr['to_email']);
		$this->email->subject('Email Test');
		$body = $this->load->view('email_template/email_template.php',TRUE);
		$msg_output = $body->output->final_output;
		$url  = base_url().'index.php/users/dashboard/preview_path?card_id='.$insertRow->from_admin_card.'&company_name='.$insertRow->from_company;
		$message = str_ireplace('[to-name]',$insertRow->to_name, $msg_output);
		$message = str_ireplace('[from-name]',$insertRow->from_name, $message);
		$message = str_ireplace('[msg-lang]',$insertRow->lang, $message);
		$message = str_ireplace('[href]',$url, $message);
		$message = str_ireplace('[readmore]',$url, $message);
		if($insertRow->lang == 'en'){
			$message = str_ireplace('[msg]',$insertRow->card_message_en, $message);
			$message = str_ireplace('[msg-1]','Dear ', $message);
			$message = str_ireplace('[msg-2]','Best Regards ', $message);
			$message = str_ireplace('[company]',$insertRow->from_company, $message);
		}else if($insertRow->lang == 'zh'){
			$message = str_ireplace('[msg]',$insertRow->card_message_zh, $message);
			$message = str_ireplace('[msg-1]','親愛的 ', $message);
			$message = str_ireplace('[msg-2]','祝你聖誕快樂 ', $message);
			$message = str_ireplace('[company]',$insertRow->from_company, $message);
		}
		$message = str_ireplace('[msg-lang]',$insertRow->lang, $message);
		$message = str_ireplace('[ecard-email-image]',$card->ecard_email_image, $message);
		$message = str_ireplace('[ecard-logo-image-head]',$logo, $message);
		$message = str_ireplace('[ecard-logo-image-foot]',$logo, $message);
		$this->email->message($message);
		 if($this->email->send()){ 
			$res = array(
				'status'=>'1',
				'msg'=>'Mail Sent.',
			);
         }else{ 
			$res = array(
				'status'=>'0',
				'msg'=>'Mail not sent!!',
			);
		}
		echo json_encode($res);
		die();
	}	
	
	public function ajax_preview_mail(){
		session_start();
		$previewformArr = $_POST['data'];
		$previewdataArr =  array();
		$site_url = site_url();
		foreach($previewformArr as $key => $prevviewform){
			$previewdataArr[$prevviewform['name']] =  $prevviewform['value'];
			$previewdataArr['user_id'] = $_SESSION['user_id'];
			$previewdataArr['card_id'] =  $_POST['card_id'];
			
		}
		
		$card_id = $previewdataArr['card_id'];
		$admincard = $this->card->get_card($card_id)->get();
		if ( $admincard->num_rows() > 0 ) {
			$row = $admincard->row_array();
			$row['from_admin_card'] = $previewdataArr['from_admin_card'];
			$row['user_id'] = $previewdataArr['user_id'];
			$row['from_name'] = $previewdataArr['from_name'];
			$row['from_title'] = $previewdataArr['from_title'];
			$row['from_company'] = $previewdataArr['from_company'];
			$row['to_name'] = $previewdataArr['to_name'];
			$row['to_email'] = $previewdataArr['to_email'];
			$row['card_message_en'] = $previewdataArr['card_message_en'];
			$row['card_message_zh'] = $previewdataArr['card_message_zh'];
			$row['lang'] = $previewdataArr['lang'];
			$row['message'] = $previewdataArr['message'];
			$row['site_url'] = base_url();
			$row['status']  = 'success';
		}
		 if($row['status'] == 'success'){ 
			$res = array(
				'report'=>'1',
				'values'=>$row,
				'msg'=>'Data Imported.'
			);
         }else{ 
			$res = array(
				'report'=>'0',
				'values'=>'No data',
				'msg'=>'Data Not Imported!!'
			);
		}
		echo json_encode($res);
		die();
	}
	
	public function admin_card_get(){
		$this->load->model('card');
		$id = $_POST['id'];
		$card = $this->card->get_card($id)->get();
		if ( $card->num_rows() > 0 ) {
			$row = $card->row_array();
			$row['status']  = 'success';
		}
		echo json_encode($row);
		die();
	}
	public function preview_path(){
		$row = array();
		 $logo_name  = $_GET['company_name'];
		 $logo_url = $this->user->get_logo_by_name($logo_name);
		
		if(isset($_GET['card_id'])){
			$card_id = $_GET['card_id'];
			$card = $this->card->get_card($card_id)->get();
			if ( $card->num_rows() > 0 ) {
				$row = $card->row_array();
			}
		}
		
		$data = array(
			'card_id' => $card_id,
			'card' => $row,
			'logo' => $logo_url[0]->logo,
		);
	 
	  $this->load->view('preview_card', $data);
	}
	public function logout(){
		session_start() ;
		session_destroy();
		redirect('/');
		}	
	
	
	}
