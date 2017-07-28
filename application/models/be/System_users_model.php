<?php
class System_users_model extends CI_Model {
	
	function get_system_users_list(){
		$this->db->select('su.*, c.country_id, c.country_name, ut.user_title_id, ut.user_title_name');
		$this->db->from('system_users as su');
		$this->db->join('countries as c', 'su.country_id = c.country_id','left outer');
		$this->db->join('user_titles as ut', 'su.user_title_id = ut.user_title_id','left outer');
		$this->db->where( array('su.is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('system_users', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'System User added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add System User successfully. Please try again.');
		}
		return $arr_return;
	}
	function system_user_exists($email_address){
		$this->db->where('email_address',$email_address);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('system_users');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_system_user($system_user_id){
		$this->db->from('system_users');
		$this->db->where( array('system_user_id'=>$system_user_id));
		return $this->db->get()->result();
	}
	function system_user_update_exists($system_user_id,$email_address){
		$q = $this->db->query("SELECT * FROM system_users WHERE system_user_id != ".$system_user_id." AND email_address = '$email_address' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$system_user_id){
		$this->db->where(array('system_user_id'=>$system_user_id));
		$update = $this->db->update('system_users', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'System User updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update System User successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($system_user_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('system_user_id'=>$system_user_id));
		$delupdate = $this->db->update('system_users', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'System User deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting System User');
		}
		return $arr_return;
	}


}