<?php
class Quarterly_model extends CI_Model {
	
	function get_reports_list(){
		$this->db->from('quarterly_reports');
		$this->db->join('system_users', 'quarterly_reports.system_user_id = system_users.system_user_id', 'left outer');
		$this->db->join('implementors', 'quarterly_reports.quarterly_implementor_id = implementors.implementor_id', 'left outer');
		$this->db->join('project_purpose', 'quarterly_reports.quarterly_project_purpose_id = project_purpose.project_purpose_id', 'left outer');

		$this->db->where( array('quarterly_reports.is_deleted'=>0));
		$this->db->where( array('quarterly_reports.is_submitted'=>1));		
		return $this->db->get()->result();
	}
	function get_num_pending_reports(){
		$this->db->from('quarterly_reports');
		$this->db->join('implementors', 'quarterly_reports.quarterly_implementor_id = implementors.implementor_id', 'left outer');
		$this->db->join('project_purpose', 'quarterly_reports.quarterly_project_purpose_id = project_purpose.project_purpose_id', 'left outer');

		$this->db->where( array('quarterly_reports.is_deleted'=>0));
		$this->db->where( array('quarterly_reports.is_submitted'=>0));
		$this->db->where( array('quarterly_reports.system_user_id'=>$this->session->userdata('user_id')));		
		return $this->db->count_all_results();
	}
	function get_pending_reports(){
		$this->db->from('quarterly_reports');
		$this->db->join('implementors', 'quarterly_reports.quarterly_implementor_id = implementors.implementor_id', 'left outer');
		$this->db->join('project_purpose', 'quarterly_reports.quarterly_project_purpose_id = project_purpose.project_purpose_id', 'left outer');

		$this->db->where( array('quarterly_reports.is_deleted'=>0));
		$this->db->where( array('quarterly_reports.is_submitted'=>0));
		$this->db->where( array('quarterly_reports.system_user_id'=>$this->session->userdata('user_id')));		
		return $this->db->get()->result();
	}

	//DELETE REPORT
	function delete($quarterly_report_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('quarterly_report_id'=>$quarterly_report_id));
		$del = $this->db->update('quarterly_reports', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Quarterly Report deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Quarterly Report');
		}
		return $arr_return;
	}
	function delete_quarterly_resource($quarterly_resource_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('quarterly_resource_id'=>$quarterly_resource_id));
		$del = $this->db->update('quarterly_resources', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Project Resource deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Project Resource');
		}
		return $arr_return;

	}
	function delete_quarterly_deliverables($quarterly_deliverables_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('quarterly_deliverables_id'=>$quarterly_deliverables_id));
		$del = $this->db->update('quarterly_deliverables', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Planned Deliverables deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Planned Deliverables');
		}
		return $arr_return;

	}
	function delete_quarterly_management_issues($quarterly_management_issues_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('quarterly_management_issues_id'=>$quarterly_management_issues_id));
		$del = $this->db->update('quarterly_management_issues', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Management Issues deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Management Issues');
		}
		return $arr_return;

	}

	//GET RESOURCE
	function get_quarterly_resource($quarterly_resource_id){
		$this->db->from('quarterly_resources');
		$this->db->where( array('quarterly_resource_id'=>$quarterly_resource_id));
		return $this->db->get()->result();		

	}
	function get_quarterly_resource2($quarterly_resource_id){
		$this->db->from('quarterly_resources');
		$this->db->where( array('quarterly_resource_id'=>$quarterly_resource_id));
		return $this->db->get()->result_array();		

	}

	//GET DELIVERABLES
	function get_quarterly_deliverable($quarterly_deliverables_id){
		$this->db->from('quarterly_deliverables');
		$this->db->where( array('quarterly_deliverables_id'=>$quarterly_deliverables_id));
		return $this->db->get()->result();	

	}	
	function get_quarterly_deliverable2($quarterly_deliverables_id){
		$this->db->from('quarterly_deliverables');
		$this->db->where( array('quarterly_deliverables_id'=>$quarterly_deliverables_id));
		return $this->db->get()->result_array();	

	}

	//GET MANAGEMENT ISSUES
	function get_quarterly_management_issue($quarterly_management_issues_id){
		$this->db->from('quarterly_management_issues');
		$this->db->where( array('quarterly_management_issues_id'=>$quarterly_management_issues_id));
		return $this->db->get()->result();
	}	
	function get_quarterly_management_issue2($quarterly_management_issues_id){
		$this->db->from('quarterly_management_issues');
		$this->db->where( array('quarterly_management_issues_id'=>$quarterly_management_issues_id));
		return $this->db->get()->result_array();
	}

	function save_summary($data){
		$insert = $this->db->insert('quarterly_reports', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$this->session->set_userdata(array('quarterly_report_id' => $insert_id));
			$arr_return = array('res' => true,'dt' => 'Report Summary saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Summary successfully. Please try again.');
		}
		return $arr_return;
	}

	function update_summary($data,$quarterly_report_id){
		$this->db->where(array('quarterly_report_id'=>$quarterly_report_id));
		$update = $this->db->update('quarterly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Summary saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Summary successfully. Please try again.');
		}
		return $arr_return;

	}
	function update_project_resource($data,$quarterly_resource_id){
		$this->db->where(array('quarterly_resource_id'=>$quarterly_resource_id));
		$update = $this->db->update('quarterly_resources', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Update successful.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update successfully. Please try again.');
		}
		return $arr_return;

	}
	function update_planned_deliverables($data,$quarterly_deliverables_id){
		$this->db->where(array('quarterly_deliverables_id'=>$quarterly_deliverables_id));
		$update = $this->db->update('quarterly_deliverables', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Update successful.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update successfully. Please try again.');
		}
		return $arr_return;		
	}
	function update_management_issues($data,$quarterly_management_issues_id){
		$this->db->where(array('quarterly_management_issues_id'=>$quarterly_management_issues_id));
		$update = $this->db->update('quarterly_management_issues', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Update successful.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not update successfully. Please try again.');
		}
		return $arr_return;		

	}
	function save_project_objective($data){

		$insert = $this->db->insert('quarterly_objectives', $data);		
		/*$err = '';
		$err2 = '';

		$insert = $this->db->insert('quarterly_objectives', $data);
		$insert_id = $this->db->insert_id();*/

		if ($insert){
			//$q = $this->save_intermediate_results($insert_id);
			$arr_return = array('res' => true,'dt' => 'Objective saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Objective successfully. Please try again.');
		}
		return $arr_return;

	}

	function save_intermediate_results($quarterly_objective_id){
		$quarterly_report_id = $this->session->userdata('quarterly_report_id');		
		$intermediate_result_id = $this->input->post('quarterly_intermediate_result_id');		
		$deliverables = $this->input->post('quarterly_deliverable');		

		foreach ($intermediate_result_id as $temp_id => $n){
			//$parent_cat_id = $this->get_parent_cat_id($temp_cat_id);
			$new_data = array(
				'quarterly_report_id' => $quarterly_report_id,
				'quarterly_objective_id' => $quarterly_objective_id,				
				'intermediate_result_id' => $n,
				'deliverables' => $deliverables[$temp_id]
			);
			$insert = $this->db->insert('quarterly_intermediate_results', $new_data);
		}				

	}


	function get_quarterly_report($quarterly_report_id){
		$this->db->select('quarterly_reports.*, system_users.*, project_purpose.*, COUNT(quarterly_intermediate_results.quarterly_intermediate_result_id) as num_objectives')
         ->from('quarterly_reports');
		$this->db->join('quarterly_intermediate_results', 'quarterly_reports.quarterly_report_id = quarterly_intermediate_results.quarterly_report_id', 'left outer');
		$this->db->join('system_users', 'quarterly_reports.system_user_id = system_users.system_user_id', 'left outer');
		$this->db->join('implementors', 'quarterly_reports.quarterly_implementor_id = implementors.implementor_id', 'left outer');
		$this->db->join('project_purpose', 'quarterly_reports.quarterly_project_purpose_id = project_purpose.project_purpose_id', 'left outer');


		$this->db->where( array('quarterly_reports.quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_intermediate_results.is_deleted'=>0));		
		return $this->db->get()->result();
	}
	// OBJECTIVES
	function get_quarterly_objectives($quarterly_report_id){
		/*$this->db->select('quarterly_objectives.*, COUNT(quarterly_intermediate_results.quarterly_intermediate_result_id) as num_intermediate_results')
         ->from('quarterly_objectives');*/
		$this->db->from('quarterly_objectives');

		$this->db->join('project_objectives', 'project_objectives.project_objective_id = quarterly_objectives.quarterly_project_objective_id', 'left outer');
		$this->db->join('intermediate_results', 'quarterly_objectives.quarterly_intermediate_result_id = intermediate_results.intermediate_result_id', 'left outer');
		$this->db->join('countries', 'countries.country_id = quarterly_objectives.quarterly_country_id', 'left outer');
		$this->db->join('thematic_areas', 'thematic_areas.thematic_area_id = quarterly_objectives.quarterly_thematic_area_id', 'left outer');
		$this->db->join('milestones', 'milestones.milestone_id = quarterly_objectives.quarterly_milestone_id', 'left outer');

		//$this->db->group_by('quarterly_objectives.quarterly_objective_id'); 
		$this->db->where( array('quarterly_objectives.quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_objectives.is_deleted'=>0));	
		//$this->db->where( array('quarterly_intermediate_results.is_deleted'=>0));
		return $this->db->get()->result();
	}
	function get_quarterly_num_objectives($quarterly_report_id){
		$this->db->from('quarterly_objectives');

		$this->db->join('project_objectives', 'project_objectives.project_objective_id = quarterly_objectives.quarterly_project_objective_id', 'left outer');
		$this->db->join('intermediate_results', 'quarterly_objectives.quarterly_intermediate_result_id = intermediate_results.intermediate_result_id', 'left outer');
		$this->db->join('countries', 'countries.country_id = quarterly_objectives.quarterly_country_id', 'left outer');
		$this->db->join('thematic_areas', 'thematic_areas.thematic_area_id = quarterly_objectives.quarterly_thematic_area_id', 'left outer');
		$this->db->join('milestones', 'milestones.milestone_id = quarterly_objectives.quarterly_milestone_id', 'left outer');

		//$this->db->group_by('quarterly_objectives.quarterly_objective_id'); 
		$this->db->where( array('quarterly_objectives.quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_objectives.is_deleted'=>0));	
		//$this->db->where( array('quarterly_intermediate_results.is_deleted'=>0));
		return $this->db->count_all_results();
	}
	//INTERMEDIATE RESULTS
	function get_quarterly_intermediate_results($quarterly_report_id)	{
		$this->db->from('quarterly_intermediate_results');
		$this->db->join('intermediate_results', 'intermediate_results.intermediate_result_id = quarterly_intermediate_results.intermediate_result_id', 'left outer');
		$this->db->where( array('quarterly_intermediate_results.quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_intermediate_results.is_deleted'=>0));		
		return $this->db->get()->result();
	}
	function get_quarterly_num_intermediate_results($quarterly_report_id)	{
		$this->db->from('quarterly_intermediate_results');
		$this->db->join('intermediate_results', 'intermediate_results.intermediate_result_id = quarterly_intermediate_results.intermediate_result_id', 'left outer');
		$this->db->where( array('quarterly_intermediate_results.quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_intermediate_results.is_deleted'=>0));		
		return $this->db->count_all_results();		
	}

	// RESOURCES
	function get_quarterly_resources($quarterly_report_id){
		$this->db->from('quarterly_resources');
		$this->db->join('implementors', 'implementors.implementor_id=quarterly_resources.implementor_id');
		$this->db->where( array('quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_resources.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_quarterly_num_resources($quarterly_report_id){
		$this->db->from('quarterly_resources');
		$this->db->join('implementors', 'implementors.implementor_id=quarterly_resources.implementor_id');
		$this->db->where( array('quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_resources.is_deleted'=>0));		
		return $this->db->count_all_results();
	}
	//PLANNED DELIVERABLES
	function get_quarterly_deliverables($quarterly_report_id){
		/*$this->db->from('quarterly_deliverables');
		$this->db->where( array('quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_deliverables.is_deleted'=>0));*/

		$this->db->from('quarterly_deliverables');

		$this->db->join('project_objectives', 'project_objectives.project_objective_id = quarterly_deliverables.quarterly_deliverable_project_objective_id', 'left outer');
		$this->db->join('intermediate_results', 'quarterly_deliverables.quarterly_deliverable_intermediate_result_id = intermediate_results.intermediate_result_id', 'left outer');
		$this->db->join('countries', 'countries.country_id = quarterly_deliverables.quarterly_deliverable_country_id', 'left outer');
		$this->db->join('thematic_areas', 'thematic_areas.thematic_area_id = quarterly_deliverables.quarterly_deliverable_thematic_area_id', 'left outer');
		$this->db->join('milestones', 'milestones.milestone_id = quarterly_deliverables.quarterly_deliverable_milestone_id', 'left outer');

		$this->db->where( array('quarterly_deliverables.quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('quarterly_deliverables.is_deleted'=>0));	



		return $this->db->get()->result();		
	}
	function get_quarterly_num_deliverables($quarterly_report_id){
		$this->db->from('quarterly_deliverables');

		$this->db->join('project_objectives', 'project_objectives.project_objective_id = quarterly_deliverables.quarterly_deliverable_project_objective_id', 'left outer');
		$this->db->join('intermediate_results', 'quarterly_deliverables.quarterly_deliverable_intermediate_result_id = intermediate_results.intermediate_result_id', 'left outer');
		$this->db->join('countries', 'countries.country_id = quarterly_deliverables.quarterly_deliverable_country_id', 'left outer');
		$this->db->join('thematic_areas', 'thematic_areas.thematic_area_id = quarterly_deliverables.quarterly_deliverable_thematic_area_id', 'left outer');
		$this->db->join('milestones', 'milestones.milestone_id = quarterly_deliverables.quarterly_deliverable_milestone_id', 'left outer');
		return $this->db->count_all_results();
	}
	//MANAGEMENT ISSUES
	function get_quarterly_management_issues($quarterly_report_id){
		$this->db->from('quarterly_management_issues');
		$this->db->where( array('quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('is_deleted'=>0));		
		return $this->db->get()->result();
	}
	function get_quarterly_num_management_issues($quarterly_report_id){
		$this->db->from('quarterly_management_issues');
		$this->db->where( array('quarterly_report_id'=>$quarterly_report_id));
		$this->db->where( array('is_deleted'=>0));		
		return $this->db->count_all_results();
	}

	function validate_objectives($quarterly_report_id){
		$valid = $this->get_quarterly_num_objectives($quarterly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Objectives valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add project objectives before you proceed');
		}
		return $arr_return;		
	}
	function validate_resources($quarterly_report_id){
		$valid = $this->get_quarterly_num_resources($quarterly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Resources valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add project resources before you proceed');
		}
		return $arr_return;		
	}
	//VALIDATE QUARTERLY DELIVERABLES
	function validate_deliverables($quarterly_report_id){
		$valid = $this->get_quarterly_num_deliverables($quarterly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Resources valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add project planned deliverables before you proceed');
		}
		return $arr_return;		
	}
	function validate_management_issues($quarterly_report_id){
		$valid = $this->get_quarterly_num_management_issues($quarterly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Management Issues valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add management issues before you proceed');
		}
		return $arr_return;		
	}

	function save_accomplishments($data,$quarterly_report_id){
		$this->db->where(array('quarterly_report_id'=>$quarterly_report_id));
		$update = $this->db->update('quarterly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Accomplishments saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Accomplishments successfully. Please try again.');
		}
		return $arr_return;

	}
	//PROJECT RESOURCE
	function save_project_resource($data){
		$insert = $this->db->insert('quarterly_resources', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Project Resources saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Project Resources successfully. Please try again.');
		}
		return $arr_return;

	}

	//PLANNED DELIVERABLES
	function save_planned_deliverables($data){
		$insert = $this->db->insert('quarterly_deliverables', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Project Planned Deliverables saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Project Planned Deliverables successfully. Please try again.');
		}
		return $arr_return;

	}

	//MANAGEMENT ISSUES
	function save_management_issues($data){
		$insert = $this->db->insert('quarterly_management_issues', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Management Issue saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Management Issue successfully. Please try again.');
		}
		return $arr_return;

	}

	//STRATEGIC OUTLOOK
	function save_strategic_outlook($data,$quarterly_report_id){
		$this->db->where(array('quarterly_report_id'=>$quarterly_report_id));
		$update = $this->db->update('quarterly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Strategic Outlook saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Strategic Outlook successfully. Please try again.');
		}
		return $arr_return;		
	}

	//KEY LESSONS
	function save_key_lessons($data,$quarterly_report_id){
		$this->db->where(array('quarterly_report_id'=>$quarterly_report_id));
		$update = $this->db->update('quarterly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Key Lessons saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Key Lessons successfully. Please try again.');
		}
		return $arr_return;		

	}
	//SUBMIT
	function submit($data,$quarterly_report_id){
		$this->db->where(array('quarterly_report_id'=>$quarterly_report_id));
		$update = $this->db->update('quarterly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => "Quarterly Report submitted successfully. Please wait while you're being redirected.");
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not submit Quarterly Report successfully. Please try again.');
		}
		return $arr_return;	
	}










	function save($data){
		$err = '';
		$err2 = '';

		$insert = $this->db->insert('quarterly_reports', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$q = $this->save_tasks($insert_id);


			$arr_return = array('res' => true,'dt' => 'Quarterly Report saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Quarterly Report successfully. Please try again.');
		}
		return $arr_return;
	}

	function save_tasks($Quarterly_report_id){
		$milestone_id = $this->input->post('quarterly_task_milestone_id');		
		$task = $this->input->post('quarterly_task');		

		foreach ($milestone_id as $temp_id => $n){
			//$parent_cat_id = $this->get_parent_cat_id($temp_cat_id);
			$new_task_data = array(
				'quarterly_report_id' => $Quarterly_report_id,
				'milestone_id' => $n,
				'quarterly_task_description' => $task[$temp_id]
			);
			$insert = $this->db->insert('quarterly_tasks', $new_task_data);
		}				

	}
}