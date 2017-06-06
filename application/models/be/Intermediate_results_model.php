<?php
class Intermediate_results_model extends CI_Model {
	
	function get_intermediate_results_list(){
		$this->db->from('intermediate_results');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('intermediate_results', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Intermediate Result added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Intermediate Result successfully. Please try again.');
		}
		return $arr_return;
	}
	function intermediate_result_exists($intermediate_result_name){
		$this->db->where('intermediate_result_name',$intermediate_result_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('intermediate_results');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_intermediate_result($intermediate_result_id){
		$this->db->from('intermediate_results');
		$this->db->where( array('intermediate_result_id'=>$intermediate_result_id));
		return $this->db->get()->result();
	}
	function intermediate_result_update_exists($intermediate_result_id,$intermediate_result_name){
		$q = $this->db->query("SELECT * FROM intermediate_results WHERE intermediate_result_id != ".$intermediate_result_id." AND intermediate_result_name = '$intermediate_result_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$intermediate_result_id){
		$this->db->where(array('intermediate_result_id'=>$intermediate_result_id));
		$update = $this->db->update('intermediate_results', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Intermediate Result updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Intermediate Result successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($intermediate_result_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('intermediate_result_id'=>$intermediate_result_id));
		$delupdate = $this->db->update('intermediate_results', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Intermediate Result deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Intermediate Result');
		}
		return $arr_return;
	}


}