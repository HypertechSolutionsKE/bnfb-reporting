<?php
class Trainings_model extends CI_Model {
	
	function get_trainings_list(){
		$this->db->from('trainings');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('trainings', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Training added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Training successfully. Please try again.');
		}
		return $arr_return;
	}
	function training_exists($training_name){
		$this->db->where('training_name',$training_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('trainings');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_training($training_id){
		$this->db->from('trainings');
		$this->db->where( array('training_id'=>$training_id));
		return $this->db->get()->result();
	}
	function training_update_exists($training_id,$training_name){
		$q = $this->db->query("SELECT * FROM trainings WHERE training_id != ".$training_id." AND training_name = '$training_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$training_id){
		$this->db->where(array('training_id'=>$training_id));
		$update = $this->db->update('trainings', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Training updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Training successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($training_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('training_id'=>$training_id));
		$delupdate = $this->db->update('trainings', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Training deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Training');
		}
		return $arr_return;
	}


}