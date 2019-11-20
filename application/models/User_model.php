<?php 

class User_model extends CI_Model { 
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function check_login($email,$password){
		$this->db->select('password,id');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('status', 1);
		$data = $this->db->get()->row();
		
		if($this->verify_password_hash($password,$data->password)){
			$this->store_session($data->id);
			return true;
		}else{
			return false;
		}
	}
	
	public function registation($value){
		$data = array(
			'first_name'   => $value['first_name'],
			'last_name'   => $value['last_name'],
			'username'   => $value['username'],
			'email'      => $value['email'],
			'role'      => 2,
			'status'      => 1,
			'password'   => $this->hash_password($value['password']),
			'created_at' => date('Y-m-j H:i:s'),
			'updated_at' => date('Y-m-j H:i:s'),
		);
		if($value['contact_number']!=''){
			$data['contact_number'] = $value['contact_number'];
		}
		return $this->db->insert('users', $data);
	}
	
	public function get_all(){
		$this->db->select('*');
		$this->db->from('users');
		$data = $this->db->get();
		if($data->num_rows>=1){
			return $data->result();
		}else{
			return array();
		}
	}
	
	public function get_byID($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$data = $this->db->get()->row();
		if(!empty($data)){
			return $data;
		}else{
			return array();
		}
	}
	
	public function store_session($id){
		$this->db->select('email,username,id,role');
		$this->db->from('users');
		$this->db->where('id', $id);
		$data = (array)$this->db->get()->row();
		$this->session->set_userdata($data);
	}
	
	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	public function update($id,$value){
		$data = array(
			'first_name'   => $value['first_name'],
			'last_name'   => $value['last_name'],
			'username'   => $value['username'],
			'email'      => $value['email'],
			'status'      => $value['status'],
			'created_at' => date('Y-m-j H:i:s'),
		);
		if($value['contact_number']!=''){
			$data['contact_number'] = $value['contact_number'];
		}
		if($value['password']!=''){
			$data['password'] = $this->hash_password($value['password']);
		}
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}
	
	public function user_delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('users'); 
	}
	
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
}