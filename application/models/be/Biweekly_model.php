<?php
class Biweekly_model extends CI_Model {
	
	//GET REPORTS LIST
	function get_reports_list(){
		$this->db->from('biweekly_reports');
		$this->db->join('system_users', 'biweekly_reports.system_user_id = system_users.system_user_id', 'left outer');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>1));
		return $this->db->get()->result();
	}
	function get_num_pending_reports(){
		$this->db->from('biweekly_reports');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>0));
		$this->db->where( array('biweekly_reports.system_user_id'=>$this->session->userdata('user_id')));		
		return $this->db->count_all_results();
	}
	function get_pending_reports(){
		$this->db->from('biweekly_reports');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>0));
		$this->db->where( array('biweekly_reports.system_user_id'=>$this->session->userdata('user_id')));		
		return $this->db->get()->result();
	}

	//DELETE REPORT
	function delete($biweekly_report_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$del = $this->db->update('biweekly_reports', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Biweekly Report deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Biweekly Report');
		}
		return $arr_return;

	}

	//GET REPORT
	function get_biweekly_report($biweekly_report_id){
		$this->db->select('biweekly_reports.*, system_users.*')
         ->from('biweekly_reports');
		$this->db->join('system_users', 'biweekly_reports.system_user_id = system_users.system_user_id', 'left outer');	
		$this->db->where( array('biweekly_reports.biweekly_report_id'=>$biweekly_report_id));
		return $this->db->get()->result();
	}	
	//TASKS
	function get_biweekly_tasks($biweekly_report_id){
		$this->db->from('biweekly_tasks');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_tasks.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_tasks.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_biweekly_num_tasks($biweekly_report_id){
		$this->db->from('biweekly_tasks');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_tasks.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_tasks.is_deleted'=>0));		
		return $this->db->count_all_results();
	}
	//CHALLENGES
	function get_biweekly_challenges($biweekly_report_id){
		$this->db->from('biweekly_challenges');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_challenges.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_challenges.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_biweekly_num_challenges($biweekly_report_id){
		$this->db->from('biweekly_challenges');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_challenges.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_challenges.is_deleted'=>0));		
		return $this->db->count_all_results();
	}
	//EVENTS
	function get_biweekly_events($biweekly_report_id){
		$this->db->from('biweekly_events');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_events.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_events.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_biweekly_num_events($biweekly_report_id){
		$this->db->from('biweekly_events');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_events.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_events.is_deleted'=>0));		
		return $this->db->count_all_results();
	}
	//ACTIVITIES
	function get_biweekly_activities($biweekly_report_id){
		$this->db->from('biweekly_activities');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_activities.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_activities.is_deleted'=>0));		
		return $this->db->get()->result();		
	}
	function get_biweekly_num_activities($biweekly_report_id){
		$this->db->from('biweekly_activities');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_activities.milestone_id');
		$this->db->where( array('biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_activities.is_deleted'=>0));		
		return $this->db->count_all_results();
	}

	//SAVE SUMMARY
	function save_summary($data){
		$insert = $this->db->insert('biweekly_reports', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$this->session->set_userdata(array('biweekly_report_id' => $insert_id));
			$arr_return = array('res' => true,'dt' => 'Report Summary saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Summary successfully. Please try again.');
		}
		return $arr_return;
	}
	//UPDATE SUMMARY
	function update_summary($data,$biweekly_report_id){
		$this->db->where(array('biweekly_report_id'=>$biweekly_report_id));
		$update = $this->db->update('biweekly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Report Summary saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Report Summary successfully. Please try again.');
		}
		return $arr_return;
	}
	//SAVE TASKS
	function save_tasks($data){
		$insert = $this->db->insert('biweekly_tasks', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Accomplished Tasks saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Accomplished Tasks successfully. Please try again.');
		}
		return $arr_return;
	}
	//SAVE CHALLENGES
	function save_challenges($data){
		$insert = $this->db->insert('biweekly_challenges', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Major Challenges saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Major Challenges successfully. Please try again.');
		}
		return $arr_return;
	}
	//SAVE EVENTS
	function save_events($data){
		$insert = $this->db->insert('biweekly_events', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Major Events saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Major Events successfully. Please try again.');
		}
		return $arr_return;
	}
	//SAVE ACTIVITIES
	function save_activities($data){
		$insert = $this->db->insert('biweekly_activities', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Activities to Undertake saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Activities to Undertake successfully. Please try again.');
		}
		return $arr_return;
	}


	//VALIDATE TASKS
	function validate_tasks($biweekly_report_id){
		$valid = $this->get_biweekly_num_tasks($biweekly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Tasks valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add Accomplished Tasks before you proceed');
		}
		return $arr_return;		
	}
	//VALIDATE CHALLENGES
	function validate_challenges($biweekly_report_id){
		$valid = $this->get_biweekly_num_challenges($biweekly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Challenges valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add Challenges before you proceed');
		}
		return $arr_return;		
	}
	//VALIDATE EVENTS
	function validate_events($biweekly_report_id){
		$valid = $this->get_biweekly_num_events($biweekly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Events valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add Events before you proceed');
		}
		return $arr_return;		
	}
	//VALIDATE ACTIVITIES
	function validate_activities($biweekly_report_id){
		$valid = $this->get_biweekly_num_activities($biweekly_report_id);
		if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Activities valid');
		}else{
			$arr_return = array('res' => false,'dt' => 'Please add activities to undertake before you proceed');
		}
		return $arr_return;		
	}


	//SUBMIT
	function submit($data,$biweekly_report_id){
		$this->db->where(array('biweekly_report_id'=>$biweekly_report_id));
		$update = $this->db->update('biweekly_reports', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => "Biweekly Report submitted successfully. Please wait while you're being redirected.");
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not submit biweekly Report successfully. Please try again.');
		}
		return $arr_return;	
	}


	//GENERATE SUMMARY REPORT
	function get_biweekly_summary_reporters($period_from,$period_to){
		$this->db->select('*');
		$this->db->from('biweekly_reports');	
		$this->db->join('system_users', 'biweekly_reports.system_user_id = system_users.system_user_id', 'left outer');
		$this->db->join('user_titles', 'system_users.user_title_id = user_titles.user_title_id', 'left outer');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>1));
		if ($period_from != '' && $period_to != ''){
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") >= ',date('Y-m-d', strtotime($period_from)));
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") <= ',date('Y-m-d', strtotime($period_to)));
		}
		$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result();
	}
	function get_biweekly_summary_tasks($period_from,$period_to){
		$this->db->select('*');
		$this->db->from('biweekly_reports');	
		$this->db->join('biweekly_tasks', 'biweekly_reports.biweekly_report_id = biweekly_tasks.biweekly_report_id', 'left outer');
		$this->db->join('milestones', 'biweekly_tasks.milestone_id = milestones.milestone_id', 'left outer');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>1));
		$this->db->where( array('biweekly_tasks.is_deleted'=>0));		
		if ($period_from != '' && $period_to != ''){
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") >= ',date('Y-m-d', strtotime($period_from)));
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") <= ',date('Y-m-d', strtotime($period_to)));
		}
		//$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result();
	}
	function get_biweekly_summary_challenges($period_from,$period_to){
		$this->db->select('*');
		$this->db->from('biweekly_reports');	
		$this->db->join('biweekly_challenges', 'biweekly_reports.biweekly_report_id = biweekly_challenges.biweekly_report_id', 'left outer');
		$this->db->join('milestones', 'biweekly_challenges.milestone_id = milestones.milestone_id', 'left outer');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>1));
		$this->db->where( array('biweekly_challenges.is_deleted'=>0));		
		if ($period_from != '' && $period_to != ''){
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") >= ',date('Y-m-d', strtotime($period_from)));
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") <= ',date('Y-m-d', strtotime($period_to)));
		}
		//$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result();
	}
	function get_biweekly_summary_events($period_from,$period_to){
		$this->db->select('*');
		$this->db->from('biweekly_reports');	
		$this->db->join('biweekly_events', 'biweekly_reports.biweekly_report_id = biweekly_events.biweekly_report_id', 'left outer');
		$this->db->join('milestones', 'biweekly_events.milestone_id = milestones.milestone_id', 'left outer');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>1));
		$this->db->where( array('biweekly_events.is_deleted'=>0));		
		if ($period_from != '' && $period_to != ''){
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") >= ',date('Y-m-d', strtotime($period_from)));
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") <= ',date('Y-m-d', strtotime($period_to)));
		}
		//$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result();
	}
	function get_biweekly_summary_activities($period_from,$period_to){
		$this->db->select('*');
		$this->db->from('biweekly_reports');	
		$this->db->join('biweekly_activities', 'biweekly_reports.biweekly_report_id = biweekly_activities.biweekly_report_id', 'left outer');
		$this->db->join('milestones', 'biweekly_activities.milestone_id = milestones.milestone_id', 'left outer');
		$this->db->where( array('biweekly_reports.is_deleted'=>0));
		$this->db->where( array('biweekly_reports.is_submitted'=>1));
		$this->db->where( array('biweekly_activities.is_deleted'=>0));		
		if ($period_from != '' && $period_to != ''){
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") >= ',date('Y-m-d', strtotime($period_from)));
			$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") <= ',date('Y-m-d', strtotime($period_to)));
		}
		//$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result();
	}

	function save($data){
		$err = '';
		$err2 = '';

		$insert = $this->db->insert('biweekly_reports', $data);
		$insert_id = $this->db->insert_id();

		if ($insert){
			$q = $this->save_tasks($insert_id);


			$arr_return = array('res' => true,'dt' => 'Biweekly Report saved successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Biweekly Report successfully. Please try again.');
		}
		return $arr_return;
	}

}