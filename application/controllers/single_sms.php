<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Single_Sms extends CI_Controller { 
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('email')==''){
			redirect('auth','refresh');
		}
		$this->load->model('Smsbox_model');
	}
	public function index(){
		
		$this->load->view('tamplate/header');
		$this->load->view('single_sms/index');
		$this->load->view('tamplate/footer');
	}	
	public function send(){
		
		$this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[13]|max_length[13]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		if ($this->form_validation->run() === false) {
			$this->load->view('tamplate/header');
			$this->load->view('single_sms/index');
			$this->load->view('tamplate/footer');
		} else {
			$usercredit = $this->Smsbox_model->get_user_credit($this->session->userdata('id'));
			$length = ceil(strlen($this->input->post('message'))/150);
			if($usercredit<$length){
				$this->session->set_flashdata('message', array('success'=>'Insufficient Balance'));
				redirect('single_sms');
			}
			$status = $this->sms_send($this->input->post());
			if($status){
				$this->session->set_flashdata('message', array('success'=>'SMS SEND SuccessFully '));
				redirect('single_sms');
			}else{
				$this->session->set_flashdata('message', array('error'=>'SMS SEND Failed '));
				redirect('single_sms');
			}
		}
	}
	public function sms_send($value){
		$savedata = array();
		$status = false;
		//http://103.230.63.50/bulksms/api/get?authUser=aliakbar&authAccess=akbar@2018&requestId=20104&destination=8801834728267&text=This+is+a+test+Message&contentType=1
		$username = ''; // provided username from service provider
		$password = ''; // provided password from service provider
		$reqId = time();
		$url = 'http://103.230.63.50/bulksms/api/get?';
		$message = urlencode($this->input->post('message'));
		$number = $this->input->post('number');
		$reqUrl = $url.'authUser='.$username.'&authAccess='.$password.'&requestId='.$reqId.'&destination='.$number.'&text='.$message.'&contentType=1';
		
		$org = $respons = @file_get_contents($reqUrl);
		$respons = json_decode($respons);
		if(!empty($respons)){
			if($respons->reply[0]->statuscode==0){
				$savedata['status'] = 1;
				$status = true;
			}else{
				$savedata['status'] = 2;
				$savedata['error_message'] = $respons->reply[0]->errorText;
				$savedata['api_respons'] = $org;
			}
		}else{
			$savedata['status'] = 2;
			$savedata['error_message'] = 'Server Error';
		}
		$savedata['send_by'] = $this->session->userdata('id');
		$savedata['number'] = $number;
		$savedata['message'] = $this->input->post('message');
		$savedata['updated_at'] = $savedata['created_at'] = date('Y-m-j H:i:s');
		$this->Smsbox_model->save($savedata);
		return $status;
	}
	
	public function sms_report(){
		$value['data'] = $this->Smsbox_model->sms_report();
		$this->load->view('tamplate/header');
		$this->load->view('single_sms/report',$value);
		$this->load->view('tamplate/footer');
	}
	
}
