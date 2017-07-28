<?php
class Project_purpose_model extends CI_Model {
	
	function get_project_purpose(){
		$this->db->from('project_purpose');
		//this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$this->db->from('project_purpose');
		$results_count = $this->db->count_all_results();

		if ($results_count > 0){
			$update = $this->db->update('project_purpose', $data);
		}else{
			$update = $this->db->insert('project_purpose', $data);
		}
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Project Purpose saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Project Purpose successfully. Please try again.');
		}
		return $arr_return;
	}

}