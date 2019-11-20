<?php 

class Smscredit_model extends CI_Model { 
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
	
	public function get_all_client(){
		$value = array(''=>'Select User');
		$this->db->select('id,username');
		$this->db->from('users');
		$this->db->where('role',2);
		$this->db->where('status', 1);
		$data = $this->db->get();
		if($data->num_rows>=1){
			foreach($data->result() as $row){
				$value[$row->id] = $row->username;
			}
		}
		return  $value;
	}
	
	public function save($value){
		$data = array(
			'client_id'   => $value['client_id'],
			'sale_credit'   => $value['amount'],
			'admin_id'   => $this->session->userdata('id'),
			'created_at' => date('Y-m-j H:i:s'),
			'updated_at' => date('Y-m-j H:i:s'),
		);
		$this->update_user_cerdit($value['client_id'],$value['amount']);
		return $this->db->insert('sms_credit', $data);
	}
	
	public function update_user_cerdit($id,$amount){
		$this->db->select('sms_credit');
		$this->db->from('users');
		$this->db->where('id',$id);
		$sms_credit = (int)$this->db->get()->row('sms_credit');
		$data = array(
               'sms_credit' => $amount+$sms_credit,
        );
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	} 
	
	public function get_all(){
		$sql = 'select us.first_name, us.last_name, sms.first_name as admin,sms_cre.id,sms_cre.sale_credit from bulksms_sms_credit as sms_cre left join bulksms_users as us on sms_cre.client_id = us.id left join bulksms_users as sms on sms_cre.admin_id = sms.id';
		$data = $this->db->query($sql);
		if($data->num_rows>=1){
			return $data->result();
		}else{
			return array();
		}
	}
	
	
	
}