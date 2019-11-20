<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulk_Sms extends CI_Controller { 
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('email')==''){
			redirect('dashboard','refresh');
		}
		$this->load->model('Smsbox_model');
		
	}
	public function index(){
		
		$this->load->view('tamplate/header');
		$this->load->view('bulk_sms/index');
		$this->load->view('tamplate/footer');
	}	
	public function send(){
		$sc = $ec = 0;
		if (empty($_FILES['contactfile']['name'])){
			$this->form_validation->set_rules('contactfile', 'Document', 'required');
		}
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		if ($this->form_validation->run() === false) {
			$this->load->view('tamplate/header');
			$this->load->view('bulk_sms/index');
			$this->load->view('tamplate/footer');
		} else {
			$config['upload_path']   = './webroot/uploads/'; 
			$config['allowed_types'] = 'text/plain|text/csv|csv';
			$config['max_size']      = 100;
			$new_name = time().$_FILES["contactfile"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('contactfile')) {
				$this->session->set_flashdata('message', array('error'=>$this->upload->display_errors()));
				redirect('bulk_sms');
			}else{
				$file_data = $this->upload->data();
				$file_path =  './webroot/uploads/'.$file_data['file_name'];
				$file = fopen($file_path,"r");
				$i=1;
				$length = ceil(strlen($this->input->post('message'))/150);
				while (($importdata = fgetcsv($file)) !== FALSE){
					$number = current($importdata);
					if($number!=''){
						if(strlen($number)==13){
							$usercredit = $this->Smsbox_model->get_user_credit($this->session->userdata('id'));
							if($usercredit>$length){
								$value = array('number'=>$number);
								if($this->sms_send($value)){
									$sc++;
								}
							}
						}
					}
					$i++;
				}                    
				fclose($file);
				if($sc>0){
					$this->session->set_flashdata('message', array('success'=>'Total Send SMS '.$sc.' From '.$i-1));
				}else{
					$this->session->set_flashdata('message', array('success'=>'No SMS Send'));
				}
				redirect('single_sms');
			}
		}
	}
	public function sms_send($value){
		$savedata = array();
		$status = false;
		$username = ''; // provided username from service provider
		$password = ''; // provided password from service provider
		$reqId = time();
		$url = 'http://103.230.63.50/bulksms/api/get?';
		$message = urlencode($this->input->post('message'));
		$number = $value['number'];
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
