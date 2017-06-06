<?php
class Performance_dashboard_model extends CI_Model {

	function get_trainings_data($period_from,$period_to,$indicator_id,$country_id){
		$this->db->select('STR_TO_DATE(ts.training_period_from, "%m/%d/%Y") AS training_period_from,ts.males_attended,ts.females_attended');

		$this->db->from('training_sessions ts');	
		//$this->db->join('system_users', 'biweekly_reports.system_user_id = system_users.system_user_id', 'left outer');
		//$this->db->join('user_titles', 'system_users.user_title_id = user_titles.user_title_id', 'left outer');
		$this->db->where( array('ts.is_deleted'=>0));
		if ($indicator_id != '' && $indicator_id != 'All'){
			$this->db->where(array('ts.indicator_id'=>$indicator_id));
		}
		if ($country_id != '' && $country_id != 'All'){
			$this->db->where(array('ts.country_id'=>$country_id));
		}
		if ($period_from != '' && $period_to != ''){
			$this->db->where('STR_TO_DATE(ts.training_period_from, "%m/%d/%Y") >= ',date('Y-m-d', strtotime($period_from)));
			$this->db->where('STR_TO_DATE(ts.training_period_from, "%m/%d/%Y") <= ',date('Y-m-d', strtotime($period_to)));
		}
		//$this->db->group_by('biweekly_reports.system_user_id');// add group_by
		return $this->db->get()->result_array();
	}


}