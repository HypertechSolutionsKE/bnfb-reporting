<?php
class Training_sessions_model extends CI_Model {
	
	function get_training_sessions_list(){
		$this->db->from('training_sessions');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('training_sessions', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Training Session added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Training Session successfully. Please try again.');
		}
		return $arr_return;
	}
	function training_session_exists($training_session_name){
		$this->db->where('training_session_name',$training_session_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('training_sessions');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_training_session($training_session_id){
		$this->db->from('training_sessions');
		$this->db->where( array('training_session_id'=>$training_session_id));
		return $this->db->get()->result();
	}
	function training_session_update_exists($training_session_id,$training_session_name){
		$q = $this->db->query("SELECT * FROM training_sessions WHERE training_session_id != ".$training_session_id." AND training_session_name = '$training_session_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$training_session_id){
		$this->db->where(array('training_session_id'=>$training_session_id));
		$update = $this->db->update('training_sessions', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Training Session updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Training Session successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($training_session_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('training_session_id'=>$training_session_id));
		$delupdate = $this->db->update('training_sessions', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Training Session deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Training Session');
		}
		return $arr_return;
	}


}