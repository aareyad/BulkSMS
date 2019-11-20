<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('email')==''){
			redirect('auth','refresh');
		}
		$this->load->model('Smsbox_model');
	}
	
	public function index(){
		$value['total_send_sms'] = $this->Smsbox_model->total_send_sms();
		if($this->session->userdata('role')!=1){
			$value['usercredit'] = $this->Smsbox_model->get_user_credit($this->session->userdata('id'));
		}
		$this->load->view('tamplate/header');
		$this->load->view('dashboard/dashboard',$value);
		$this->load->view('tamplate/footer');
	}
}
