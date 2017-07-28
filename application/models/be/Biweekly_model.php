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
		$this->db->select('*');		
		$this->db->from('biweekly_tasks');
		$this->db->join('milestones', 'milestones.milestone_id=biweekly_tasks.milestone_id');
		$this->db->where( array('biweekly_tasks.biweekly_report_id'=>$biweekly_report_id));
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


	//GET BIWEEKLY TASK
	/*function get_biweekly_task2($biweekly_task_id){
		$this->db->from('biweekly_tasks');
		$this->db->where( array('biweekly_task_id'=>$biweekly_task_id));
		return $this->db->get()->result();	

	}*/
	function get_biweekly_task2($biweekly_task_id){
		$this->db->from('biweekly_tasks');
		$this->db->where( array('biweekly_task_id'=>$biweekly_task_id));
		return $this->db->get()->result_array();	

	}

	function get_biweekly_challenge2($biweekly_challenge_id){
		$this->db->from('biweekly_challenges');
		$this->db->where( array('biweekly_challenge_id'=>$biweekly_challenge_id));
		return $this->db->get()->result_array();

	}

	function get_biweekly_event2($biweekly_event_id){
		$this->db->from('biweekly_events');
		$this->db->where( array('biweekly_event_id'=>$biweekly_event_id));
		return $this->db->get()->result_array();		
	}

	function get_biweekly_activity2($biweekly_activity_id){
		$this->db->from('biweekly_activities');
		$this->db->where( array('biweekly_activity_id'=>$biweekly_activity_id));
		return $this->db->get()->result_array();		
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


	//COMMENTS
	function get_biweekly_comments($biweekly_report_id){
		$this->db->select('biweekly_comments.*, system_users.system_user_id, system_users.first_name, system_users.last_name, system_users.email_address, system_users.phone_number');

		$this->db->from('biweekly_comments');
		$this->db->join('system_users', 'biweekly_comments.sender_user_id=system_users.system_user_id');		
		$this->db->where( array('biweekly_comments.biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_comments.is_deleted'=>0));		
		return $this->db->get()->result();		

	}
	function get_biweekly_num_comments($biweekly_report_id){
		$this->db->select('biweekly_comments.*, system_users.system_user_id, system_users.first_name, system_users.last_name, system_users.email_address, system_users.phone_number');
		
		$this->db->from('biweekly_comments');
		$this->db->join('system_users', 'biweekly_comments.sender_user_id=system_users.system_user_id');		
		$this->db->where( array('biweekly_comments.biweekly_report_id'=>$biweekly_report_id));
		$this->db->where( array('biweekly_comments.is_deleted'=>0));		
		return $this->db->count_all_results();		

	}

	function submit_comment($data){
		$insert = $this->db->insert('biweekly_comments', $data);

		if ($insert){
			$arr_return = array('res' => true,'dt' => 'Report comment submitted successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not submit report comment successfully. Please try again.');
		}
		return $arr_return;

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
	function update_task($data,$biweekly_task_id){
		$this->db->where(array('biweekly_task_id'=>$biweekly_task_id));
		$update = $this->db->update('biweekly_tasks', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Accomplished Tasks updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Accomplished Tasks successfully. Please try again.');
		}
		return $arr_return;

	}
	function delete_task($biweekly_task_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biweekly_task_id'=>$biweekly_task_id));
		$del = $this->db->update('biweekly_tasks', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Accomplished Tasks deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Accomplished Tasks');
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
	function update_challenge($data,$biweekly_challenge_id){
		$this->db->where(array('biweekly_challenge_id'=>$biweekly_challenge_id));
		$update = $this->db->update('biweekly_challenges', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Major challenges updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Major challenges successfully. Please try again.');
		}
		return $arr_return;

	}
	function delete_challenge($biweekly_challenge_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biweekly_challenge_id'=>$biweekly_challenge_id));
		$del = $this->db->update('biweekly_challenges', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Major challenges deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Major challenges');
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
	function update_event($data,$biweekly_event_id){
		$this->db->where(array('biweekly_event_id'=>$biweekly_event_id));
		$update = $this->db->update('biweekly_events', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Major events updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Major events successfully. Please try again.');
		}
		return $arr_return;

	}
	function delete_event($biweekly_event_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biweekly_event_id'=>$biweekly_event_id));
		$del = $this->db->update('biweekly_events', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Major events deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Major events');
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
	function update_activity($data,$biweekly_activity_id){
		$this->db->where(array('biweekly_activity_id'=>$biweekly_activity_id));
		$update = $this->db->update('biweekly_activities', $data);
		if ($update){
			$arr_return = array('res' => true,'dt' => 'Activities to Undertake updated successfully.');
		}else{
			$arr_return = array('res' => false,'dt' => 'Could not save Activities to Undertake successfully. Please try again.');
		}
		return $arr_return;

	}
	function delete_activity($biweekly_activity_id){
		$data = array(
			'is_deleted'=> 1
		);			
		$this->db->where( array('biweekly_activity_id'=>$biweekly_activity_id));
		$del = $this->db->update('biweekly_activities', $data);
		
		if ($del){
			$arr_return = array('res' => true,'dt'=>'Activities to Undertake deleted successfully');
		}else{
			$arr_return = array('res' => false,'dt' => 'Error deleting Activities to Undertake');
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
		//$valid = $this->get_biweekly_num_challenges($biweekly_report_id);
		//if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Challenges valid');
		//}else{
			//$arr_return = array('res' => false,'dt' => 'Please add Challenges before you proceed');
		//}
		return $arr_return;		
	}
	//VALIDATE EVENTS
	function validate_events($biweekly_report_id){
		//$valid = $this->get_biweekly_num_events($biweekly_report_id);
		//if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Events valid');
		//}else{
			//$arr_return = array('res' => false,'dt' => 'Please add Events before you proceed');
		//}
		return $arr_return;		
	}
	//VALIDATE ACTIVITIES
	function validate_activities($biweekly_report_id){
		//$valid = $this->get_biweekly_num_activities($biweekly_report_id);
		//if ($valid > 0){
			$arr_return = array('res' => true,'dt' => 'Activities valid');
		//}else{
			//$arr_return = array('res' => false,'dt' => 'Please add activities to undertake before you proceed');
		//}
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
	function get_biweekly_consolidated_reporters($period_from,$period_to){
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
	function get_biweekly_consolidated_milestones($period_from,$period_to){
		$this->db->select('*');
		$this->db->from('milestones');	
		//$this->db->join('milestones', 'biweekly_reports.system_user_id = system_users.system_user_id', 'left outer');
		//$this->db->join('user_titles', 'system_users.user_title_id = user_titles.user_title_id', 'left outer');
		$this->db->where( array('milestones.is_deleted'=>0));
		//$this->db->where( array('biweekly_reports.is_submitted'=>1));
		//if ($period_from != '' && $period_to != ''){
			//$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") >= ',date('Y-m-d', strtotime($period_from)));
			//$this->db->where('STR_TO_DATE(biweekly_reports.created_on, "%Y-%m-%d") <= ',date('Y-m-d', strtotime($period_to)));
		//}
		//$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result();
	}

	function get_biweekly_consolidated_tasks($period_from,$period_to){
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
	function get_biweekly_consolidated_challenges($period_from,$period_to){
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
	function get_biweekly_consolidated_events($period_from,$period_to){
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
	function get_biweekly_consolidated_activities($period_from,$period_to){
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