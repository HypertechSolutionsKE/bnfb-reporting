<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biweekly extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/milestones_model');
		$this->load->model('be/biweekly_model');

	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['biweekly_reports'] = $this->biweekly_model->get_reports_list();
			
			$data['page_title'] = 'Bi-Weekly Reports List | ';
	        $data['cur'] = 'Biweekly';			
			$data['main_content'] = 'be/biweekly_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function create(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['milestones'] = $this->milestones_model->get_milestones_list();

			if($this->session->userdata('biweekly_report_id')) {
				$data['biweekly_report'] = $this->biweekly_model->get_biweekly_report($this->session->userdata('biweekly_report_id'));
				$data['biweekly_tasks'] = $this->biweekly_model->get_biweekly_tasks($this->session->userdata('biweekly_report_id'));
				$data['biweekly_challenges'] = $this->biweekly_model->get_biweekly_challenges($this->session->userdata('biweekly_report_id'));
				$data['biweekly_events'] = $this->biweekly_model->get_biweekly_events($this->session->userdata('biweekly_report_id'));
				$data['biweekly_activities'] = $this->biweekly_model->get_biweekly_activities($this->session->userdata('biweekly_report_id'));
			}


			$data['page_title'] = 'Create Biweekly Report | ';
	        $data['cur'] = 'Biweekly';
			$data['main_content'] = 'be/biweekly_create';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function complete($biweekly_report_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$this->session->set_userdata(array('biweekly_report_id' => $biweekly_report_id));
			redirect('be/biweekly/create');	
        } 
		else {
            redirect('be/auth');
		}

	}
	function view($biweekly_report_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['biweekly_report'] = $this->biweekly_model->get_biweekly_report($biweekly_report_id);
			$data['biweekly_tasks'] = $this->biweekly_model->get_biweekly_tasks($biweekly_report_id);
			$data['biweekly_challenges'] = $this->biweekly_model->get_biweekly_challenges($biweekly_report_id);
			$data['biweekly_events'] = $this->biweekly_model->get_biweekly_events($biweekly_report_id);
			$data['biweekly_activities'] = $this->biweekly_model->get_biweekly_activities($biweekly_report_id);

			$data['page_title'] = 'Biweekly Report View | ';
	        $data['cur'] = 'Biweekly';
			$data['main_content'] = 'be/biweekly_view';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}		
	}
	function summary(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['biweekly_reports'] = $this->biweekly_model->get_reports_list();
			
			$data['page_title'] = 'Bi-Weekly Summary Report | ';
	        $data['cur'] = 'Biweekly';			
			$data['main_content'] = 'be/biweekly_summary';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function generate_summary_report(){
		$period_from = $this->input->post('biweekly_summary_period_from');
		$period_to = $this->input->post('biweekly_summary_period_to');
		//$biweekly_summary_type = $this->input->post('biweekly_summary_type');

		$data['biweekly_summary_period_from'] = $period_from;
		$data['biweekly_summary_period_to'] = $period_to;		
		$data['reporters'] = $this->biweekly_model->get_biweekly_summary_reporters($period_from,$period_to);
		$data['tasks'] = $this->biweekly_model->get_biweekly_summary_tasks($period_from,$period_to);
		$data['challenges'] = $this->biweekly_model->get_biweekly_summary_challenges($period_from,$period_to);
		$data['events'] = $this->biweekly_model->get_biweekly_summary_events($period_from,$period_to);
		$data['activities'] = $this->biweekly_model->get_biweekly_summary_activities($period_from,$period_to);

		$this->load->view('be/js_appends/biweekly_summary_report',$data);
	}

	//SAVE SUMMARY
	function save_summary(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_title' => $this->input->post('biweekly_report_title'),
				'biweekly_period_from' => $this->input->post('biweekly_period_from'),
				'biweekly_period_to' => $this->input->post('biweekly_period_to'),
				'biweekly_report_summary' => $this->input->post('biweekly_report_summary'),
				'biweekly_report_remark' => $this->input->post('biweekly_report_remark'),				
				'system_user_id' => $this->session->userdata('user_id')
			);		

			if($this->session->userdata('biweekly_report_id')) {
				$biweekly_report_id = $this->session->userdata('biweekly_report_id');
				$q = $this->biweekly_model->update_summary($data,$biweekly_report_id);
			}else{
				$q = $this->biweekly_model->save_summary($data);
			}
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}
	//SAVE TASKS
	function save_tasks(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_id' => $this->session->userdata('biweekly_report_id'),
				'milestone_id' => $this->input->post('biweekly_tasks_milestone_id'),
				'biweekly_task_description' => $this->input->post('biweekly_tasks'),
			);	

			$q = $this->biweekly_model->save_tasks($data);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);
	}
	//SAVE CHALLENGES
	function save_challenges(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_id' => $this->session->userdata('biweekly_report_id'),
				'milestone_id' => $this->input->post('biweekly_challenges_milestone_id'),
				'biweekly_challenge_description' => $this->input->post('biweekly_challenges'),
			);
			$q = $this->biweekly_model->save_challenges($data);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);
	}
	//SAVE EVENTS
	function save_events(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_id' => $this->session->userdata('biweekly_report_id'),
				'milestone_id' => $this->input->post('biweekly_events_milestone_id'),
				'biweekly_event_description' => $this->input->post('biweekly_events'),
			);	

			$q = $this->biweekly_model->save_events($data);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);
	}
	//SAVE ACTIVITIES
	function save_activities(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_id' => $this->session->userdata('biweekly_report_id'),
				'milestone_id' => $this->input->post('biweekly_activities_milestone_id'),
				'biweekly_activity_description' => $this->input->post('biweekly_activities'),
			);	

			$q = $this->biweekly_model->save_activities($data);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);
	}

	//SUBMIT
	function submit(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'is_submitted' => 1
			);
			if($this->session->userdata('biweekly_report_id')) {
				$biweekly_report_id = $this->session->userdata('biweekly_report_id');
				$q = $this->biweekly_model->submit($data,$biweekly_report_id);

				if ($q['res'] == true){
					$this->session->unset_userdata('biweekly_report_id');
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}				
			}else{
				$resp = array('status' => 'SESS_GONE','message' => 'Your report session seems to have expired.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}

	//LOAD JS TASKS
	function load_js_biweekly_tasks(){
		if($this->session->userdata('biweekly_report_id')) {
			$data['biweekly_tasks'] = $this->biweekly_model->get_biweekly_tasks($this->session->userdata('biweekly_report_id'));
		}
		$data['biw'] = '';
		$this->load->view('be/js_appends/biweekly_tasks',$data);

	}
	//LOAD JS CHALLENGES
	function load_js_biweekly_challenges(){
		if($this->session->userdata('biweekly_report_id')) {
			$data['biweekly_challenges'] = $this->biweekly_model->get_biweekly_challenges($this->session->userdata('biweekly_report_id'));
		}
		$data['biw'] = '';
		$this->load->view('be/js_appends/biweekly_challenges',$data);

	}
	//LOAD JS EVENTS
	function load_js_biweekly_events(){
		if($this->session->userdata('biweekly_report_id')) {
			$data['biweekly_events'] = $this->biweekly_model->get_biweekly_events($this->session->userdata('biweekly_report_id'));
		}
		$data['biw'] = '';
		$this->load->view('be/js_appends/biweekly_events',$data);

	}
	//LOAD JS TASKS
	function load_js_biweekly_activities(){
		if($this->session->userdata('biweekly_report_id')) {
			$data['biweekly_activities'] = $this->biweekly_model->get_biweekly_activities($this->session->userdata('biweekly_report_id'));
		}
		$data['biw'] = '';
		$this->load->view('be/js_appends/biweekly_activities',$data);

	}
	//LOAD JS REPORT VIEW
	function load_js_biweekly_report(){
		if($this->session->userdata('biweekly_report_id')) {
			$data['biweekly_report'] = $this->biweekly_model->get_biweekly_report($this->session->userdata('biweekly_report_id'));
			$data['biweekly_tasks'] = $this->biweekly_model->get_biweekly_tasks($this->session->userdata('biweekly_report_id'));
			$data['biweekly_challenges'] = $this->biweekly_model->get_biweekly_challenges($this->session->userdata('biweekly_report_id'));
			$data['biweekly_events'] = $this->biweekly_model->get_biweekly_events($this->session->userdata('biweekly_report_id'));
			$data['biweekly_activities'] = $this->biweekly_model->get_biweekly_activities($this->session->userdata('biweekly_report_id'));
		}
		$data['biw'] = '';
		$this->load->view('be/js_appends/biweekly_report_view',$data);		

	}

	//VALIDATE TASKS
	function validate_tasks(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biweekly_report_id')) {
				$q = $this->biweekly_model->validate_tasks($this->session->userdata('biweekly_report_id'));
				if ($q['res'] == true){
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}
			}else{
				$resp = array('status' => 'SESS_GONE','message' => 'Your report session seems to have expired.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}
	//VALIDATE CHALLENGES
	function validate_challenges(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biweekly_report_id')) {
				$q = $this->biweekly_model->validate_challenges($this->session->userdata('biweekly_report_id'));
				if ($q['res'] == true){
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}
			}else{
				$resp = array('status' => 'SESS_GONE','message' => 'Your report session seems to have expired.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}
	//VALIDATE EVENTS
	function validate_events(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biweekly_report_id')) {
				$q = $this->biweekly_model->validate_events($this->session->userdata('biweekly_report_id'));
				if ($q['res'] == true){
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}
			}else{
				$resp = array('status' => 'SESS_GONE','message' => 'Your report session seems to have expired.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}
	//VALIDATE ACTIVITIES
	function validate_activities(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biweekly_report_id')) {
				$q = $this->biweekly_model->validate_activities($this->session->userdata('biweekly_report_id'));
				if ($q['res'] == true){
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}
			}else{
				$resp = array('status' => 'SESS_GONE','message' => 'Your report session seems to have expired.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}

	//DELETE PENDING
	function delete_pending($biweekly_report_id){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biweekly_report_id')) {
				if ($biweekly_report_id == $this->session->userdata('biweekly_report_id')){
					$this->session->unset_userdata('biweekly_report_id');
				}
			}
			$q = $this->biweekly_model->delete($biweekly_report_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be');
			}
		}else{
			redirect('be/auth');
		}

	}

	function delete($biweekly_report_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->biweekly_model->delete($biweekly_report_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/biweekly');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/biweekly');
			}
		}else{
			redirect('be/auth');
		}

	}






	function save(){
		$save_data = array(
			'biweekly_report_title' => $this->input->post('report_title'),
			'biweekly_period_from' => $this->input->post('period_from'),
			'biweekly_period_to' => $this->input->post('period_to'),
			'biweekly_report_summary' => $this->input->post('report_summary'),
			'biweekly_report_remark' => $this->input->post('report_remark'),
			'system_user_id' => $this->session->userdata('user_id')
		);			


		$q = $this->biweekly_model->save($save_data);
		if ($q['res'] == true){
			//$this->unset_variables();
			$this->session->set_flashdata('success',$q['dt']);

			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => '<strong>'. $q['dt'] .'</strong>');
		}

		redirect('be/biweekly/create');
		//echo json_encode($resp);

	}
	function js_add_biweekly_task(){
		$taskID = $this->input->post('taskID');
		$data['taskID'] = $taskID;
		$data['milestones'] = $this->milestones_model->get_milestones_list();
		$this->load->view('be/js_appends/biweekly_tasks',$data);
	}
	function js_add_biweekly_challenge(){
		$challengeID = $this->input->post('challengeID');
		$data['challengeID'] = $challengeID;
		$data['milestones'] = $this->milestones_model->get_milestones_list();
		$this->load->view('be/js_appends/biweekly_challenges',$data);
	}
	function js_add_biweekly_event(){
		$eventID = $this->input->post('eventID');
		$data['eventID'] = $eventID;
		$data['milestones'] = $this->milestones_model->get_milestones_list();
		$this->load->view('be/js_appends/biweekly_events',$data);
	}
	function js_add_biweekly_activity(){
		$activityID = $this->input->post('activityID');
		$data['activityID'] = $activityID;
		$data['milestones'] = $this->milestones_model->get_milestones_list();
		$this->load->view('be/js_appends/biweekly_activities',$data);
	}

}

