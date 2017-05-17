<?php
class Milestones_model extends CI_Model {
	
	function get_milestones_list(){
		$this->db->from('milestones');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('milestones', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Milestone added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add milestone successfully. Please try again.');
		}
		return $arr_return;
	}
	function milestone_exists($milestone_name){
		$this->db->where('milestone_name',$milestone_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('milestones');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_milestone($milestone_id){
		$this->db->from('milestones');
		$this->db->where( array('milestone_id'=>$milestone_id));
		return $this->db->get()->result_array();
	}
	function milestone_update_exists($milestone_id,$milestone_name){
		$q = $this->db->query("SELECT * FROM milestones WHERE milestone_id != ".$milestone_id." AND milestone_name = '$milestone_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$milestone_id){
		$this->db->where(array('milestone_id'=>$milestone_id));
		$update = $this->db->update('milestones', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Milestone updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update milestone successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($milestone_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('milestone_id'=>$milestone_id));
		$delupdate = $this->db->update('milestones', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Milestone deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting milestone');
		}
		return $arr_return;
	}


}