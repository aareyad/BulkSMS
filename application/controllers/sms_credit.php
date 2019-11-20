<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_Credit extends CI_Controller { 
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('email')!=''){
			if($this->session->userdata('role')!=1){
				redirect('dashboard','refresh');
			}
		}else{
			redirect('auth','refresh');
		}
		$this->load->model('smscredit_model');
		
	}
	public function index(){
		$value['data'] = $this->smscredit_model->get_all();
		$this->load->view('tamplate/header');
		$this->load->view('sms_credit/index',$value);
		$this->load->view('tamplate/footer');
	}
	
	public function sale_view(){
		$value['userlist'] = $this->smscredit_model->get_all_client();
		$this->load->view('tamplate/header');
		$this->load->view('sms_credit/sale',$value);
		$this->load->view('tamplate/footer');
	}
	
	public function sale(){
		
		$this->form_validation->set_rules('client_id', 'User', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		if ($this->form_validation->run() === false) {
			$value['userlist'] = $this->smscredit_model->get_all_client();
			$this->load->view('tamplate/header');
			$this->load->view('sms_credit/sale',$value);
			$this->load->view('tamplate/footer');
		} else {
			if($this->smscredit_model->save($this->input->post())){
				$this->session->set_flashdata('message', array('success'=>'Credit Sale SuccessFully '));
				redirect('sms_credit');
			}else{
				$this->session->set_flashdata('message', array('error'=>'Somthing Wrong'));
				redirect('sms_credit/sale_view');
			}
		}
	}	
}
