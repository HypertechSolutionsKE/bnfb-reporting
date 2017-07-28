<?php
class Outcomes_model extends CI_Model {
	
	
	function get_change_agents_trained_list(){
		$this->db->select('ocat.*, t.training_id, t.training_name, i.implementor_id, i.implementor_name, c.country_id, c.country_name, d.district_id, d.district_name');
		$this->db->from('oo_change_agents_trained as ocat');
		$this->db->join('trainings as t', 'ocat.training_id = t.training_id');
		$this->db->join('implementors as i', 'ocat.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'ocat.country_id = c.country_id', 'left outer');
		$this->db->join('districts as d', 'ocat.district_id = d.district_id', 'left outer');

		$this->db->where( array('ocat.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_policy_documents_list(){
		$this->db->select('opd.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name, d.district_id, d.district_name');
		$this->db->from('oo_policy_documents as opd');
		$this->db->join('implementors as i', 'opd.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'opd.country_id = c.country_id', 'left outer');
		$this->db->join('districts as d', 'opd.district_id = d.district_id', 'left outer');

		$this->db->where( array('opd.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_advocates_list(){
		$this->db->select('oa.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name, d.district_id, d.district_name');
		$this->db->from('oo_advocates as oa');
		$this->db->join('implementors as i', 'oa.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'oa.country_id = c.country_id', 'left outer');
		$this->db->join('districts as d', 'oa.district_id = d.district_id', 'left outer');

		$this->db->where( array('oa.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_new_programs_list(){
		$this->db->select('onp.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name, cr.crop_id, cr.crop_name');
		$this->db->from('oo_new_programs as onp');
		$this->db->join('implementors as i', 'onp.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'onp.country_id = c.country_id', 'left outer');
		$this->db->join('crops as cr', 'onp.crop_id = cr.crop_id', 'left outer');

		$this->db->where( array('onp.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_resources_mobilized_list(){
		$this->db->select('orm.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name');
		$this->db->from('oo_resources_mobilized as orm');
		$this->db->join('implementors as i', 'orm.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'orm.country_id = c.country_id', 'left outer');

		$this->db->where( array('orm.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_key_issues_discussed_list(){
		$this->db->select('okid.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name');
		$this->db->from('oo_key_issues_discussed as okid');
		$this->db->join('implementors as i', 'okid.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'okid.country_id = c.country_id', 'left outer');

		$this->db->where( array('okid.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_key_elements_documented_list(){
		$this->db->select('oked.*, i.implementor_id, i.implementor_name, cr.crop_id, cr.crop_name');
		$this->db->from('oo_key_elements_documented as oked');
		$this->db->join('implementors as i', 'oked.implementor_id = i.implementor_id');
		$this->db->join('crops as cr', 'oked.crop_id = cr.crop_id', 'left outer');

		$this->db->where( array('oked.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_institutions_equipped_list(){
		$this->db->select('oie.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name');
		$this->db->from('oo_institutions_equipped as oie');
		$this->db->join('implementors as i', 'oie.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'oie.country_id = c.country_id', 'left outer');

		$this->db->where( array('oie.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_households_list(){
		$this->db->select('oh.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name, cr.crop_id, cr.crop_name');
		$this->db->from('oo_households as oh');
		$this->db->join('implementors as i', 'oh.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'oh.country_id = c.country_id', 'left outer');
		$this->db->join('crops as cr', 'oh.crop_id = cr.crop_id', 'left outer');

		$this->db->where( array('oh.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_percentage_national_programs_list(){
		$this->db->select('opnp.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name, cr.crop_id, cr.crop_name');
		$this->db->from('oo_percentage_national_programs as opnp');
		$this->db->join('implementors as i', 'opnp.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'opnp.country_id = c.country_id', 'left outer');
		$this->db->join('crops as cr', 'opnp.crop_id = cr.crop_id', 'left outer');

		$this->db->where( array('opnp.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_commercial_processes_list(){
		$this->db->select('ocp.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name, cr.crop_id, cr.crop_name');
		$this->db->from('oo_commercial_processes as ocp');
		$this->db->join('implementors as i', 'ocp.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'ocp.country_id = c.country_id', 'left outer');
		$this->db->join('crops as cr', 'ocp.crop_id = cr.crop_id', 'left outer');

		$this->db->where( array('ocp.is_deleted'=>0));
		return $this->db->get()->result();		

	}
	function get_number_national_programs_list(){
		$this->db->select('onnp.*, i.implementor_id, i.implementor_name, c.country_id, c.country_name');
		$this->db->from('oo_number_national_programs as onnp');
		$this->db->join('implementors as i', 'onnp.implementor_id = i.implementor_id');
		$this->db->join('countries as c', 'onnp.country_id = c.country_id', 'left outer');

		$this->db->where( array('onnp.is_deleted'=>0));
		return $this->db->get()->result();		

	}







	function get_outcomes_list(){
		$this->db->select('ts.*, i.indicator_id, i.indicator_name, c.country_id, c.country_name');
		$this->db->from('outcomes as ts');
		$this->db->join('indicators as i', 'i.indicator_id = ts.indicator_id');
		$this->db->join('countries as c', 'c.country_id = ts.country_id');

		$this->db->where( array('ts.is_deleted'=>0));
		return $this->db->get()->result();	


	}
	function save_change_agents_trained($data){
		$insert = $this->db->insert('oo_change_agents_trained', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Training saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Training successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_policy_documents($data){
		$insert = $this->db->insert('oo_policy_documents', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_advocates($data){
		$insert = $this->db->insert('oo_advocates', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_new_programs($data){
		$insert = $this->db->insert('oo_new_programs', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_resources_mobilized($data){
		$insert = $this->db->insert('oo_resources_mobilized', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_key_issues_discussed($data){
		$insert = $this->db->insert('oo_key_issues_discussed', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_key_elements_documented($data){
		$insert = $this->db->insert('oo_key_elements_documented', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_institutions_equipped($data){
		$insert = $this->db->insert('oo_institutions_equipped', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_households($data){
		$insert = $this->db->insert('oo_households', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_percentage_national_programs($data){
		$insert = $this->db->insert('oo_percentage_national_programs', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_commercial_processes($data){
		$insert = $this->db->insert('oo_commercial_processes', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}
	function save_number_national_programs($data){
		$insert = $this->db->insert('oo_number_national_programs', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save successfully. Please try again.');
		}
		return $arr_return;
	}





	function save($data){
		$insert = $this->db->insert('outcomes', $data);
		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Outcome added successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not add Outcome successfully. Please try again.');
		}
		return $arr_return;
	}
	function outcome_exists($outcome_name){
		$this->db->where('outcome_name',$outcome_name);
		$this->db->where('is_deleted',0);
		$query = $this->db->get('outcomes');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	function get_outcome($outcome_id){
		$this->db->from('outcomes');
		$this->db->where( array('outcome_id'=>$outcome_id));
		return $this->db->get()->result();
	}
	function outcome_update_exists($outcome_id,$outcome_name){
		$q = $this->db->query("SELECT * FROM outcomes WHERE outcome_id != ".$outcome_id." AND outcome_name = '$outcome_name' AND is_deleted = 0");
		if ($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function update($data,$outcome_id){
		$this->db->where(array('outcome_id'=>$outcome_id));
		$update = $this->db->update('outcomes', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Outcome updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update Outcome successfully. Please try again.');
		}
		return $arr_return;
	}
	function delete($outcome_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('outcome_id'=>$outcome_id));
		$delupdate = $this->db->update('outcomes', $data);
		
		if ($delupdate){
			$arr_return = array('res' => true,'dt'=>'Outcome deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Outcome');
		}
		return $arr_return;
	}


}