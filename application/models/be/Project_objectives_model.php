<?php
class Project_objectives_model extends CI_Model {
	
	function get_project_objectives_list(){
		$this->db->from('project_objectives');
		$this->db->where( array('is_deleted'=>0));
		return $this->db->get()->result();
	}
	function save($data){
		$insert = $this->db->insert('project_objectives', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Project Objective added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Project Objective successfully. Please try again.');
		}
		return $arr_return;
	}
	function project_objective_exists($project_objective_name){
		$this->db->where('project_objective_name',$project_objective_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('project_objectives');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_project_objective($project_objective_id){
		$this->db->from('project_objectives');
		$this->db->where( array('project_objective_id'=>$project_objective_id));
		return $this->db->get()->result();
	}
	function project_objective_update_exists($project_objective_id,$project_objective_name){
		$q = $this->db->query("SELECT * FROM project_objectives WHERE project_objective_id != ".$project_objective_id." AND project_objective_name = '$project_objective_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$project_objective_id){
		$this->db->where(array('project_objective_id'=>$project_objective_id));
		$update = $this->db->update('project_objectives', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Project Objective updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Project Objective successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($project_objective_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('project_objective_id'=>$project_objective_id));
		$delupdate = $this->db->update('project_objectives', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Project Objective deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Project Objective');
		}
		return $arr_return;
	}


}