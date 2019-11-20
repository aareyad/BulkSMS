<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller { 
	
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		
	}
	
	public function index(){
		if($this->session->userdata('email')!=''){
			redirect('dashboard','refresh');
		}
		$this->load->view('login/login');
	}
	
	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required|email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('login/login');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->user_model->check_login($email, $password)){
				redirect('dashboard','refresh');
			}else{
				$this->session->set_flashdata('message', array('error'=>'Email Or Password Invalid'));
				redirect('auth');
			}
		}
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
	
	public function register(){
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		if ($this->form_validation->run() === false) {
			$this->load->view('registation/registation');
		}else{
			if($this->user_model->registation($this->input->post())){
				$this->session->set_flashdata('message', array('success'=>'Registation Complate '));
				redirect('auth');
			}else{
				$this->session->set_flashdata('message', array('error'=>'Somthing Wrong'));
				redirect('auth/register_view');
			}
		}
	}
	
	public function register_view(){
		$this->load->view('registation/registation');
	}
}
