<?php 

class Smsbox_model extends CI_Model { 
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

	
	public function save($value){
		if($value['status']==1){
			$length = ceil(strlen($value['message'])/150);
			$this->update_user_cerdit($this->session->userdata('id'),$length);
		}
		return $this->db->insert('smsbox', $value);
	}
	
	public function get_user_credit($id){
		$this->db->select('sms_credit');
		$this->db->from('users');
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$sms_credit = (int)$this->db->get()->row('sms_credit');
		return $sms_credit;
	}
	
	
	public function update_user_cerdit($id,$amount){
		$this->db->select('sms_credit');
		$this->db->from('users');
		$this->db->where('id',$id);
		$sms_credit = (int)$this->db->get()->row('sms_credit');
		$data = array(
               'sms_credit' => $sms_credit-$amount,
        );
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}
	
	public function sms_report(){
		$this->db->select('smsbox.number,smsbox.message,smsbox.created_at,smsbox.status,users.username');
		$this->db->from('smsbox');
		if($this->session->userdata('role')!=1){
			$this->db->where('send_by',$this->session->userdata('id'));
		}
		$this->db->join('users', 'smsbox.send_by = users.id', 'left');
		$data = $this->db->get();
		if($data->num_rows>=1){
			return $data->result();
		}else{
			return array();
		}
	}
	
	public function total_send_sms(){
		if($this->session->userdata('role')==1){
			$sql = 'select count(id) as total,status from bulksms_smsbox group by status';
		}else{
			$sql = 'select count(id) as total,status from bulksms_smsbox where send_by = '.$this->session->userdata('id').' group by status';
		}
		$value = array('success'=>0,'error'=>0);
		$data = $this->db->query($sql);
		if($data->num_rows>=1){
			foreach($data->result() as $item){
				if($item->status==1){
					$value['success'] = $item->total;
				}elseif($item->status==2){
					$value['error'] = $item->total;
				}
			}
		}
		return $value;
	}
	
}