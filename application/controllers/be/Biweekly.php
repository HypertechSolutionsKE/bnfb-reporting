<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once(APPPATH."third_party/PHPWord/Autoloader.php");
//include_once(APPPATH."core/Front_end.php");

//use PhpOffice\PhpWord\Autoloader;
//use PhpOffice\PhpWord\Settings;
//Autoloader::register();
//Settings::loadConfig();

class Biweekly extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/milestones_model');
		$this->load->model('be/biweekly_model');
		$this->load->library('word');
		$this->load->library('htmltotext');
		$this->load->library('pdfgenerator');

		require_once(APPPATH.'libraries/Html2Text.php');
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
			$data['biweekly_comments'] = $this->biweekly_model->get_biweekly_comments($biweekly_report_id);
			$data['biweekly_num_comments'] = $this->biweekly_model->get_biweekly_num_comments($biweekly_report_id);

			$data['page_title'] = 'Biweekly Report View | ';
	        $data['cur'] = 'Biweekly';
			$data['main_content'] = 'be/biweekly_view';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}		
	}
	function consolidated(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['biweekly_reports'] = $this->biweekly_model->get_reports_list();
			
			$data['page_title'] = 'Bi-Weekly Consolidated Report | ';
	        $data['cur'] = 'Biweekly';			
			$data['main_content'] = 'be/biweekly_consolidated';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function generate_consolidated_report(){
		$period_from = $this->input->post('biweekly_consolidated_period_from');
		$period_to = $this->input->post('biweekly_consolidated_period_to');
		//$biweekly_consolidated_type = $this->input->post('biweekly_consolidated_type');

		$data['biweekly_consolidated_period_from'] = $period_from;
		$data['biweekly_consolidated_period_to'] = $period_to;		
		$data['reporters'] = $this->biweekly_model->get_biweekly_consolidated_reporters($period_from,$period_to);
		$data['milestones'] = $this->biweekly_model->get_biweekly_consolidated_milestones($period_from,$period_to);

		$data['tasks'] = $this->biweekly_model->get_biweekly_consolidated_tasks($period_from,$period_to);
		$data['challenges'] = $this->biweekly_model->get_biweekly_consolidated_challenges($period_from,$period_to);
		$data['events'] = $this->biweekly_model->get_biweekly_consolidated_events($period_from,$period_to);
		$data['activities'] = $this->biweekly_model->get_biweekly_consolidated_activities($period_from,$period_to);

		$this->load->view('be/js_appends/biweekly_consolidated_report',$data);
	}

	//SAVE SUMMARY
	function save_summary(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_title' => $this->input->post('biweekly_report_title'),
				'biweekly_period_from' => $this->input->post('biweekly_period_from'),
				'biweekly_period_to' => $this->input->post('biweekly_period_to'),
				'system_user_id' => $this->session->userdata('user_id')
			);		
				//'biweekly_report_summary' => $this->input->post('biweekly_report_summary'),
				//'biweekly_report_remark' => $this->input->post('biweekly_report_remark'),				

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
	function update_task($biweekly_task_id){
		$data = array(
			'milestone_id' => $this->input->post('biweekly_tasks_milestone_id2'),
			'biweekly_task_description' => $this->input->post('biweekly_tasks2'),
		);	

		$q = $this->biweekly_model->update_task($data,$biweekly_task_id);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);
	}
	function delete_biweekly_task($biweekly_task_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biweekly_model->delete_task($biweekly_task_id);

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
	function update_challenge($biweekly_challenge_id){
		$data = array(
			'milestone_id' => $this->input->post('biweekly_challenges_milestone_id2'),
			'biweekly_challenge_description' => $this->input->post('biweekly_challenges2'),
		);	

		$q = $this->biweekly_model->update_challenge($data,$biweekly_challenge_id);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);
	}
	function delete_biweekly_challenge($biweekly_challenge_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biweekly_model->delete_challenge($biweekly_challenge_id);

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
	function update_event($biweekly_event_id){
		$data = array(
			'milestone_id' => $this->input->post('biweekly_events_milestone_id2'),
			'biweekly_event_description' => $this->input->post('biweekly_events2'),
		);	

		$q = $this->biweekly_model->update_event($data,$biweekly_event_id);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);
	}
	function delete_biweekly_event($biweekly_event_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biweekly_model->delete_event($biweekly_event_id);

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
	function update_activity($biweekly_activity_id){
		$data = array(
			'milestone_id' => $this->input->post('biweekly_activities_milestone_id2'),
			'biweekly_activity_description' => $this->input->post('biweekly_activities2'),
		);	

		$q = $this->biweekly_model->update_activity($data,$biweekly_activity_id);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);
	}
	function delete_biweekly_activity($biweekly_activity_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biweekly_model->delete_activity($biweekly_activity_id);

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

	function save_comment(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biweekly_report_id' => $this->input->post('biweekly_report_id'),
				'sender_user_id' => $this->session->userdata('user_id'),
				'biweekly_comment' => $this->input->post('biweekly_comment_area')
			);

			$q = $this->biweekly_model->submit_comment($data);

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




/*

BIWEEKLY EDITS

*/

	function get_biweekly_task2($biweekly_task_id){
		$biweekly_task = $this->biweekly_model->get_biweekly_task2($biweekly_task_id);
		echo json_encode($biweekly_task);
	}

	function get_biweekly_challenge2($biweekly_challenge_id){
		$biweekly_challenge = $this->biweekly_model->get_biweekly_challenge2($biweekly_challenge_id);
		echo json_encode($biweekly_challenge);

	}

	function get_biweekly_event2($biweekly_event_id){
		$biweekly_event = $this->biweekly_model->get_biweekly_event2($biweekly_event_id);
		echo json_encode($biweekly_event);

	}

	function get_biweekly_activity2($biweekly_activity_id){
		$biweekly_activity = $this->biweekly_model->get_biweekly_activity2($biweekly_activity_id);
		echo json_encode($biweekly_activity);
		
	}


	function save(){
		$save_data = array(
			'biweekly_report_title' => $this->input->post('report_title'),
			'biweekly_period_from' => $this->input->post('period_from'),
			'biweekly_period_to' => $this->input->post('period_to'),
			'system_user_id' => $this->session->userdata('user_id')
		);			
			//'biweekly_report_summary' => $this->input->post('report_summary'),
			//'biweekly_report_remark' => $this->input->post('report_remark'),


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

function strip_html_tags( $text )
{
    $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
        ),
        $text );
    return strip_tags( $text );
}

	/*
	==== EXPORTS ====	
	*/
	function export_to_word($biweekly_report_id){
		$PHPWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $PHPWord->createSection(array('orientation'=>'portrait'));

		//$section->addText('Hello I am tester');
		//$section->addTextBreak(1);

		//$section->addText('I am inline styled.', array('name'=>'Verdana', 'color'=>'006699'));
		//$section->addTextBreak(1);
		$biweekly_report = $this->biweekly_model->get_biweekly_report($biweekly_report_id);
		$data['biweekly_tasks'] = $this->biweekly_model->get_biweekly_tasks($biweekly_report_id);
		$data['biweekly_challenges'] = $this->biweekly_model->get_biweekly_challenges($biweekly_report_id);
		$data['biweekly_events'] = $this->biweekly_model->get_biweekly_events($biweekly_report_id);
		$data['biweekly_activities'] = $this->biweekly_model->get_biweekly_activities($biweekly_report_id);


		$PHPWord->addFontStyle('heading1', array('bold'=>true, 'size'=>16));
		$PHPWord->addFontStyle('heading2', array('bold'=>true, 'size'=>13));
		$PHPWord->addFontStyle('heading3', array('bold'=>true, 'size'=>12));
		$PHPWord->addFontStyle('heading4', array('bold'=>true, 'size'=>11));



		$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>2000));
		$PHPWord->addParagraphStyle('pStyle2', array('align'=>'center', 'spaceAfter'=>300));
		$PHPWord->addParagraphStyle('pStyle3', array('spaceAfter'=>300));
		$PHPWord->addParagraphStyle('pStyle4', array('spaceAfter'=>600));


		$table_style = new \PhpOffice\PhpWord\Style\Table;
    	$table_style->setBorderColor('006699');
    	$table_style->setBorderSize(6);
    	$table_style->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
    	$table_style->setWidth(100 * 50);

		//$firstRowStyle = array('bgColor' => '66BBFF');
		$fancyTableFontStyle = array('bold' => true);



		$section->addText('Building Nutritious Food Baskets Project', 'heading1', 'pStyle');
		$section->addImage('assets/be/images/bnfb-logo.png',array('width'=>140, 'height'=>200, 'align'=>'center','marginTop'=>10));
		$section->addTextBreak(1, 'heading1', 'pStyle');
		foreach ($biweekly_report as $row){
			//REPORT HEADING
			$section->addText($row->biweekly_report_title, 'heading2', 'pStyle2');
			$section->addText($row->biweekly_period_from . ' - ' . $row->biweekly_period_to, 'heading3', 'pStyle');
			$section->addText('Report Date: ' . date('M j Y g:i A', strtotime($row->created_on)), 'heading4', 'pStyle2');
			$section->addText('Report Owner: ' . $row->first_name . ' ' . $row->last_name, 'heading4', 'pStyle2');

			$section->addPageBreak();
			//SECTION 1: REPORT SUMMARY
			//$section->addText('1. Report Summary', 'heading2', 'pStyle3');
			//$section->addText($this->htmltotext->convert($row->biweekly_report_summary));
			//SECTION 2: REPORT REMARK

			//$section->addTextBreak(1, 'heading1', 'pStyle4');
			//$section->addText('2. Report Remark', 'heading2', 'pStyle3');
			//$section->addText($this->htmltotext->convert($row->biweekly_report_remark));
			//SECTION 3: ACCOMPLISHMENTS

			//$section->addTextBreak(1, 'heading1', 'pStyle4');					
			$section->addText('1. Accomplishments from the Reporting Period (' . $row->biweekly_period_from . ' - ' . $row->biweekly_period_to . ')', 'heading2', 'pStyle3');
			
			$table = $section->addTable($table_style);
			$table->addRow();
			$table->addCell(2000)->addText("Milestone", $fancyTableFontStyle);
			$table->addCell(2000)->addText("Accomplished Tasks", $fancyTableFontStyle);
			
			$biweekly_tasks = $this->biweekly_model->get_biweekly_tasks($biweekly_report_id);

			foreach ($biweekly_tasks as $row2){
				$table->addRow();
				$table->addCell(2000)->addText($row2->milestone_name);
				$task_desc = new \Html2Text\Html2Text($row2->biweekly_task_description);
				$table->addCell(2000)->addText($task_desc->get_text());	
			}

			$section->addTextBreak(1, 'heading1', 'pStyle4');
			$section->addText('2. What are the major challenges you are facing?', 'heading2', 'pStyle3');

			$table = $section->addTable($table_style);
			$table->addRow();
			$table->addCell(2000)->addText("Milestone", $fancyTableFontStyle);
			$table->addCell(2000)->addText("Challenges", $fancyTableFontStyle);

			$biweekly_challenges = $this->biweekly_model->get_biweekly_challenges($biweekly_report_id);
			foreach ($biweekly_challenges as $row2){
				$table->addRow();
				$table->addCell(2000)->addText($row2->milestone_name);
				$challenge_desc = new \Html2Text\Html2Text($row2->biweekly_challenge_description);
				$table->addCell(2000)->addText($challenge_desc->get_text());	
			}

			$section->addTextBreak(1, 'heading1', 'pStyle4');
			$section->addText('3. Any major events planned for the next two months?', 'heading2', 'pStyle3');

			$table = $section->addTable($table_style);
			$table->addRow();
			$table->addCell(2000)->addText("Milestone", $fancyTableFontStyle);
			$table->addCell(2000)->addText("Events", $fancyTableFontStyle);

			$biweekly_events = $this->biweekly_model->get_biweekly_events($biweekly_report_id);
			foreach ($biweekly_events as $row2){
				$table->addRow();
				$table->addCell(2000)->addText($row2->milestone_name);
				$event_desc = new \Html2Text\Html2Text($row2->biweekly_event_description);				
				$table->addCell(2000)->addText($event_desc->get_text());	
			}


			$section->addTextBreak(1, 'heading1', 'pStyle4');
			$section->addText('4. What are the major five things your team will undertake in the next two months?', 'heading2', 'pStyle3');

			$table = $section->addTable($table_style);
			$table->addRow();
			$table->addCell(2000)->addText("Milestone", $fancyTableFontStyle);
			$table->addCell(2000)->addText("Activities", $fancyTableFontStyle);

			$biweekly_activities = $this->biweekly_model->get_biweekly_activities($biweekly_report_id);
			foreach ($biweekly_activities as $row2){
				$table->addRow();
				$table->addCell(2000)->addText($row2->milestone_name);
				$activity_desc = new \Html2Text\Html2Text($row2->biweekly_activity_description);				

				$table->addCell(2000)->addText($activity_desc->get_text());	
			}


		}

		$filename='Biweekly Report_'.time().'.doc'; //save our document as this file name

		/*header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save('php://output');*/

		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save('php://output');

		//exit;

	}

	function export_to_pdf($biweekly_report_id){
		$data['biweekly_report'] = $this->biweekly_model->get_biweekly_report($biweekly_report_id);
		$data['biweekly_tasks'] = $this->biweekly_model->get_biweekly_tasks($biweekly_report_id);
		$data['biweekly_challenges'] = $this->biweekly_model->get_biweekly_challenges($biweekly_report_id);
		$data['biweekly_events'] = $this->biweekly_model->get_biweekly_events($biweekly_report_id);
		$data['biweekly_activities'] = $this->biweekly_model->get_biweekly_activities($biweekly_report_id);
		$data['biweekly_comments'] = $this->biweekly_model->get_biweekly_comments($biweekly_report_id);
		$data['biweekly_num_comments'] = $this->biweekly_model->get_biweekly_num_comments($biweekly_report_id);

		$data['page_title'] = 'Biweekly Report PDF | ';
	    //$data['cur'] = 'Biweekly';
		//$data['main_content'] = 'be/biweekly_view';
		$html = $this->load->view('be/biweekly_pdf_template',$data,true);
		$filename = 'Biweekly Report PDF_'.time();
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');		

	}

}

