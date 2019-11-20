<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_mail extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('email')==''){
			redirect('auth','refresh');
		}
	}
	public function index(){
		
		$this->load->view('tamplate/header');
		$this->load->view('mail/index');
		$this->load->view('tamplate/footer');
	}	
	public function send(){
		
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'pixelyowl@gmail.com',
		  'smtp_pass' => 'jewelreyad5689',
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('tamplate/header');
			$this->load->view('mail/index');
			$this->load->view('tamplate/footer');
		} else {
			$this->email->from('pixelyowl@gmail.com', 'Reyad');
			$this->email->to($this->input->post('email'));
			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('message'));
			if (!$this->email->send()) {
				$this->session->set_flashdata('message', array('error'=>'E-mail not sent!'));
				//show_error($this->email->print_debugger()); 
			}
			else {
				$this->session->set_flashdata('message', array('success'=>'Your e-mail has been sent!'));
				redirect('send_mail');
			}
		}
	}
}
