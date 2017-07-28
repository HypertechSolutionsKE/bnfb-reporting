<?php
class Disaggregation_levels_model extends CI_Model {
	
	function get_disaggregation_levels_list(){
		$this->db->from('disaggregation_levels');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('disaggregation_levels', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Disaggregation Level added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Disaggregation Level successfully. Please try again.');
		}
		return $arr_return;
	}
	function disaggregation_level_exists($disaggregation_level_name){
		$this->db->where('disaggregation_level_name',$disaggregation_level_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('disaggregation_levels');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_disaggregation_level($disaggregation_level_id){
		$this->db->from('disaggregation_levels');
		$this->db->where( array('disaggregation_level_id'=>$disaggregation_level_id));
		return $this->db->get()->result();
	}
	function disaggregation_level_update_exists($disaggregation_level_id,$disaggregation_level_name){
		$q = $this->db->query("SELECT * FROM disaggregation_levels WHERE disaggregation_level_id != ".$disaggregation_level_id." AND disaggregation_level_name = '$disaggregation_level_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$disaggregation_level_id){
		$this->db->where(array('disaggregation_level_id'=>$disaggregation_level_id));
		$update = $this->db->update('disaggregation_levels', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Disaggregation Level updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Disaggregation Level successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($disaggregation_level_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('disaggregation_level_id'=>$disaggregation_level_id));
		$delupdate = $this->db->update('disaggregation_levels', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Disaggregation Level deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Disaggregation Level');
		}
		return $arr_return;
	}


}