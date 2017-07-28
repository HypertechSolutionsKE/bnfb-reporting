<?php
class Biannual_model extends CI_Model {
	
	function get_reports_list(){
		$this->db->from('biannual_reports');
		$this->db->join('system_users', 'biannual_reports.system_user_id = system_users.system_user_id', 'left outer');
		$this->db->where( array('biannual_reports.is_deleted'=>0));
		$this->db->where( array('biannual_reports.is_submitted'=>1));		
		return $this->db->get()->result();
	}
	function get_num_pending_reports(){
		$this->db->from('biannual_reports');
		$this->db->where( array('biannual_reports.is_deleted'=>0));
		$this->db->where( array('biannual_reports.is_submitted'=>0));
		$this->db->where( array('biannual_reports.system_user_id'=>$this->session->userdata('user_id')));		
		return $this->db->count_all_results();
	}
	function get_pending_reports(){
		$this->db->from('biannual_reports');
		$this->db->where( array('biannual_reports.is_deleted'=>0));
		$this->db->where( array('biannual_reports.is_submitted'=>0));
		$this->db->where( array('biannual_reports.system_user_id'=>$this->session->userdata('user_id')));		
		return $this->db->get()->result();
	}

	//DELETE REPORT
	function delete($biannual_report_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$del = $this->db->update('biannual_reports', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Biannual Report deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Biannual Report');
		}
		return $arr_return;
	}
	function delete_biannual_resource($biannual_resource_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biannual_resource_id'=>$biannual_resource_id));
		$del = $this->db->update('biannual_resources', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Project Resource deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Project Resource');
		}
		return $arr_return;

	}
	function delete_biannual_deliverables($biannual_deliverables_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biannual_deliverables_id'=>$biannual_deliverables_id));
		$del = $this->db->update('biannual_deliverables', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Planned Deliverables deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Planned Deliverables');
		}
		return $arr_return;

	}
	function delete_biannual_management_issues($biannual_management_issues_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biannual_management_issues_id'=>$biannual_management_issues_id));
		$del = $this->db->update('biannual_management_issues', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Management Issues deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Management Issues');
		}
		return $arr_return;

	}

	//GET RESOURCE
	function get_biannual_resource($biannual_resource_id){
		$this->db->from('biannual_resources');
		$this->db->where( array('biannual_resource_id'=>$biannual_resource_id));
		return $this->db->get()->result();		

	}
	function get_biannual_resource2($biannual_resource_id){
		$this->db->from('biannual_resources');
		$this->db->where( array('biannual_resource_id'=>$biannual_resource_id));
		return $this->db->get()->result_array();		

	}

	//GET DELIVERABLES
	function get_biannual_deliverable($biannual_deliverables_id){
		$this->db->from('biannual_deliverables');
		$this->db->where( array('biannual_deliverables_id'=>$biannual_deliverables_id));
		return $this->db->get()->result();	

	}	
	function get_biannual_deliverable2($biannual_deliverables_id){
		$this->db->from('biannual_deliverables');
		$this->db->where( array('biannual_deliverables_id'=>$biannual_deliverables_id));
		return $this->db->get()->result_array();	

	}

	//GET MANAGEMENT ISSUES
	function get_biannual_management_issue($biannual_management_issues_id){
		$this->db->from('biannual_management_issues');
		$this->db->where( array('biannual_management_issues_id'=>$biannual_management_issues_id));
		return $this->db->get()->result();
	}	
	function get_biannual_management_issue2($biannual_management_issues_id){
		$this->db->from('biannual_management_issues');
		$this->db->where( array('biannual_management_issues_id'=>$biannual_management_issues_id));
		return $this->db->get()->result_array();
	}

	function save_summary($data){
		$insert = $this->db->insert('biannual_reports', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$this->session->set_userdata(array('biannual_report_id' => $insert_id));
			$arr_return = array('res' => true,'dt' => 'Report Summary saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Summary successfully. Please try again.');
		}
		return $arr_return;
	}

	function update_summary($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Summary saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Summary successfully. Please try again.');
		}
		return $arr_return;

	}

	function save_progress($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Progress saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Progress successfully. Please try again.');
		}
		return $arr_return;

	}

	function save_deviations($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Milestone deviations saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Milestone deviations successfully. Please try again.');
		}
		return $arr_return;

	}




	function update_project_resource($data,$biannual_resource_id){
		$this->db->where(array('biannual_resource_id'=>$biannual_resource_id));
		$update = $this->db->update('biannual_resources', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Update successful.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update successfully. Please try again.');
		}
		return $arr_return;

	}
	function update_planned_deliverables($data,$biannual_deliverables_id){
		$this->db->where(array('biannual_deliverables_id'=>$biannual_deliverables_id));
		$update = $this->db->update('biannual_deliverables', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Update successful.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update successfully. Please try again.');
		}
		return $arr_return;		
	}
	function update_management_issues($data,$biannual_management_issues_id){
		$this->db->where(array('biannual_management_issues_id'=>$biannual_management_issues_id));
		$update = $this->db->update('biannual_management_issues', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Update successful.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update successfully. Please try again.');
		}
		return $arr_return;		

	}
	function save_project_objective($data){
		$err = '';
		$err2 = '';

		$insert = $this->db->insert('biannual_objectives', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$q = $this->save_intermediate_results($insert_id);
			$arr_return = array('res' => true,'dt' => 'Report Objective saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Objective successfully. Please try again.');
		}
		return $arr_return;

	}

	function save_intermediate_results($biannual_objective_id){
		$biannual_report_id = $this->session->userdata('biannual_report_id');		
		$intermediate_result_id = $this->input->post('biannual_intermediate_result_id');		
		$deliverables = $this->input->post('biannual_deliverable');		

		foreach ($intermediate_result_id as $temp_id => $n){
			//$parent_cat_id = $this->get_parent_cat_id($temp_cat_id);
			$new_data = array(
				'biannual_report_id' => $biannual_report_id,
				'biannual_objective_id' => $biannual_objective_id,				
				'intermediate_result_id' => $n,
				'deliverables' => $deliverables[$temp_id]
			);
			$insert = $this->db->insert('biannual_intermediate_results', $new_data);
		}				

	}


	function get_biannual_report($biannual_report_id){
		$this->db->select('biannual_reports.*, system_users.*')
         ->from('biannual_reports');
		//$this->db->join('biannual_intermediate_results', 'biannual_reports.biannual_report_id = biannual_intermediate_results.biannual_report_id', 'left outer');
		$this->db->join('system_users', 'biannual_reports.system_user_id = system_users.system_user_id', 'left outer');		
		$this->db->where( array('biannual_reports.biannual_report_id'=>$biannual_report_id));
		//$this->db->where( array('biannual_intermediate_results.is_deleted'=>0));		
		return $this->db->get()->result();
	}
	// OBJECTIVES
	function get_biannual_objectives($biannual_report_id){
		$this->db->select('biannual_objectives.*, COUNT(biannual_intermediate_results.biannual_intermediate_result_id) as num_intermediate_results')
         ->from('biannual_objectives');
		//$this->db->join('biannual_intermediate_results', 'biannual_objectives.biannual_objective_id = biannual_intermediate_results.biannual_objective_id', 'left outer');
		$this->db->group_by('biannual_objectives.biannual_objective_id'); 
		$this->db->where( array('biannual_objectives.biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_objectives.is_deleted'=>0));	
		$this->db->where( array('biannual_intermediate_results.is_deleted'=>0));
		return $this->db->get()->result();
	}
	function get_biannual_num_objectives($biannual_report_id){
		$this->db->select('biannual_objectives.*, COUNT(biannual_intermediate_results.biannual_intermediate_result_id) as num_intermediate_results')
         ->from('biannual_objectives');
		$this->db->join('biannual_intermediate_results', 'biannual_objectives.biannual_objective_id = biannual_intermediate_results.biannual_objective_id', 'left outer');
		$this->db->group_by('biannual_objectives.biannual_objective_id'); 		
		$this->db->where( array('biannual_objectives.biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_objectives.is_deleted'=>0));	
		$this->db->where( array('biannual_intermediate_results.is_deleted'=>0));
		return $this->db->count_all_results();
	}
	//INTERMEDIATE RESULTS
	function get_biannual_intermediate_results($biannual_report_id)	{
		$this->db->from('biannual_intermediate_results');
		$this->db->join('intermediate_results', 'intermediate_results.intermediate_result_id = biannual_intermediate_results.intermediate_result_id', 'left outer');
		$this->db->where( array('biannual_intermediate_results.biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_intermediate_results.is_deleted'=>0));		
		return $this->db->get()->result();
	}
	function get_biannual_num_intermediate_results($biannual_report_id)	{
		$this->db->from('biannual_intermediate_results');
		$this->db->join('intermediate_results', 'intermediate_results.intermediate_result_id = biannual_intermediate_results.intermediate_result_id', 'left outer');
		$this->db->where( array('biannual_intermediate_results.biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_intermediate_results.is_deleted'=>0));		
		return $this->db->count_all_results();		
	}

	// RESOURCES
	function get_biannual_resources($biannual_report_id){
		$this->db->from('biannual_resources');
		$this->db->join('implementor_types', 'implementor_types.implementor_type_id=biannual_resources.implementor_type_id');
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_resources.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_biannual_num_resources($biannual_report_id){
		$this->db->from('biannual_resources');
		$this->db->join('implementor_types', 'implementor_types.implementor_type_id=biannual_resources.implementor_type_id');
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_resources.is_deleted'=>0));		
		return $this->db->count_all_results();
	}
	//PLANNED DELIVERABLES
	function get_biannual_deliverables($biannual_report_id){
		$this->db->from('biannual_deliverables');
		$this->db->join('implementor_types', 'implementor_types.implementor_type_id=biannual_deliverables.implementor_type_id');
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_deliverables.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_biannual_num_deliverables($biannual_report_id){
		$this->db->from('biannual_deliverables');
		$this->db->join('implementor_types', 'implementor_types.implementor_type_id=biannual_deliverables.implementor_type_id');
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('biannual_deliverables.is_deleted'=>0));		
		return $this->db->count_all_results();
	}
	//MANAGEMENT ISSUES
	function get_biannual_management_issues($biannual_report_id){
		$this->db->from('biannual_management_issues');
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('is_deleted'=>0));		
		return $this->db->get()->result();
	}
	function get_biannual_num_management_issues($biannual_report_id){
		$this->db->from('biannual_management_issues');
		$this->db->where( array('biannual_report_id'=>$biannual_report_id));
		$this->db->where( array('is_deleted'=>0));		
		return $this->db->count_all_results();
	}

	function validate_objectives($biannual_report_id){
		$valid = $this->get_biannual_num_objectives($biannual_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Objectives valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add project objectives before you proceed');
		}
		return $arr_return;		
	}
	function validate_resources($biannual_report_id){
		$valid = $this->get_biannual_num_resources($biannual_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Resources valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add project resources before you proceed');
		}
		return $arr_return;		
	}
	//VALIDATE biannual DELIVERABLES
	function validate_deliverables($biannual_report_id){
		$valid = $this->get_biannual_num_deliverables($biannual_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Resources valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add project planned deliverables before you proceed');
		}
		return $arr_return;		
	}
	function validate_management_issues($biannual_report_id){
		$valid = $this->get_biannual_num_management_issues($biannual_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Management Issues valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add management issues before you proceed');
		}
		return $arr_return;		
	}

	function save_accomplishments($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Accomplishments saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Accomplishments successfully. Please try again.');
		}
		return $arr_return;

	}
	//PROJECT RESOURCE
	function save_project_resource($data){
		$insert = $this->db->insert('biannual_resources', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Project Resources saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Project Resources successfully. Please try again.');
		}
		return $arr_return;

	}

	//PLANNED DELIVERABLES
	function save_planned_deliverables($data){
		$insert = $this->db->insert('biannual_deliverables', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Project Planned Deliverables saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Project Planned Deliverables successfully. Please try again.');
		}
		return $arr_return;

	}

	//MANAGEMENT ISSUES
	function save_management_issues($data){
		$insert = $this->db->insert('biannual_management_issues', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Management Issue saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Management Issue successfully. Please try again.');
		}
		return $arr_return;

	}

	//STRATEGIC OUTLOOK
	function save_strategic_outlook($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Strategic Outlook saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Strategic Outlook successfully. Please try again.');
		}
		return $arr_return;		
	}

	//KEY LESSONS
	function save_key_lessons($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Key Lessons saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Key Lessons successfully. Please try again.');
		}
		return $arr_return;		

	}
	//SUBMIT
	function submit($data,$biannual_report_id){
		$this->db->where(array('biannual_report_id'=>$biannual_report_id));
		$update = $this->db->update('biannual_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => "Biannual Report submitted successfully. Please wait while you're being redirected.");
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not submit Biannual Report successfully. Please try again.');
		}
		return $arr_return;	
	}










	function save($data){
		$err = '';
		$err2 = '';

		$insert = $this->db->insert('biannual_reports', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$q = $this->save_tasks($insert_id);


			$arr_return = array('res' => true,'dt' => 'Biannual Report saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Biannual Report successfully. Please try again.');
		}
		return $arr_return;
	}

	function save_tasks($biannual_report_id){
		$milestone_id = $this->input->post('biannual_task_milestone_id');		
		$task = $this->input->post('biannual_task');		

		foreach ($milestone_id as $temp_id => $n){
			//$parent_cat_id = $this->get_parent_cat_id($temp_cat_id);
			$new_task_data = array(
				'biannual_report_id' => $biannual_report_id,
				'milestone_id' => $n,
				'biannual_task_description' => $task[$temp_id]
			);
			$insert = $this->db->insert('biannual_tasks', $new_task_data);
		}				

	}
}