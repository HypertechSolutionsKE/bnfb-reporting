<?php
class Indicators_model extends CI_Model {
	
	function get_indicators_list(){
		$this->db->select('indicators.*, project_objectives.project_objective_id, project_objectives.project_objective_name');
		$this->db->from('indicators');
		$this->db->join('project_objectives', 'indicators.project_objective_id = project_objectives.project_objective_id', 'left outer');

		$this->db->where( array('indicators.is_deleted'=>0));
		return $this->db->get()->result();
	}
	function get_indicator_disaggregation_levels(){
		$this->db->select('*');
		$this->db->from('indicator_disaggregation_levels');
		$this->db->join('disaggregation_levels', 'disaggregation_levels.disaggregation_level_id = indicator_disaggregation_levels.disaggregation_level_id', 'left outer');

		$this->db->where( array('indicator_disaggregation_levels.is_deleted'=>0));
		return $this->db->get()->result();		
	}
	function save($data){
		$insert = $this->db->insert('indicators', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$q = $this->save_disaggregation_levels($insert_id);

			$arr_return = array('res' => true,'dt' => 'Indicator added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add indicator successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_disaggregation_levels($indicator_id){
		$disaggregation_level_id = $this->input->post('disaggregation_level_id');		
		foreach ($disaggregation_level_id as $temp_id){
			$new_data = array(
				'indicator_id' => $indicator_id,
				'disaggregation_level_id' => $temp_id
			);
			$insert = $this->db->insert('indicator_disaggregation_levels', $new_data);
		}				

	}
	function indicator_exists($indicator_name){
		$this->db->where('indicator_name',$indicator_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('indicators');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function get_indicator($indicator_id){
		$this->db->from('indicators');
		$this->db->where( array('indicator_id'=>$indicator_id));
		return $this->db->get()->result();
	}
	function indicator_update_exists($indicator_id,$indicator_name){
		$q = $this->db->query("SELECT * FROM indicators WHERE indicator_id != ".$indicator_id." AND indicator_name = '$indicator_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$indicator_id){
		$this->db->where(array('indicator_id'=>$indicator_id));
		$update = $this->db->update('indicators', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Indicator updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update indicator successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($indicator_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('indicator_id'=>$indicator_id));
		$delupdate = $this->db->update('indicators', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Indicator deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting indicator');
		}
		return $arr_return;
	}


}