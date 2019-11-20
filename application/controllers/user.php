<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller { 
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('email')!=''){
			if($this->session->userdata('role')!=1){
				redirect('dashboard','refresh');
			}
		}else{
			redirect('auth','refresh');
		}
		$this->load->model('user_model');
		
	}
	public function index(){
		$value['data'] = $this->user_model->get_all();
		$this->load->view('tamplate/header');
		$this->load->view('user/index',$value);
		$this->load->view('tamplate/footer');
	}
	
	public function edit($id){
		if($id>0){
			$value['data'] = $this->user_model->get_byID($id);
			$this->load->view('tamplate/header');
			$this->load->view('user/edit',$value);
			$this->load->view('tamplate/footer');$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		}else{
			redirect('user','refresh');
		}
		
	}
	
	public function update($id){
		
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->input->post('password')!=''){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		}
		if ($this->form_validation->run() === false) {
			$value['data'] = $this->user_model->get_byID($id);
			$this->load->view('tamplate/header');
			$this->load->view('user/edit',$value);
			$this->load->view('tamplate/footer');
		} else {
			if($this->user_model->update($id,$this->input->post())){
				$this->session->set_flashdata('message', array('success'=>'Update SuccessFully '));
				redirect('user');
			}else{
				$this->session->set_flashdata('message', array('error'=>'Somthing Wrong'));
				redirect('user/edit/'.$id,'refresh');
			}
		}
	}
	public function delete($id){
		if($this->user_model->user_delete($id)){
			$this->session->set_flashdata('message', array('success'=>'Delete SuccessFully '));
			redirect('user');
		}else{
			$this->session->set_flashdata('message', array('error'=>'Somthing Wrong'));
			redirect('user');
		}
	}
	
}
