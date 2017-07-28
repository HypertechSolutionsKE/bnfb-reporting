<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biannual extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/milestones_model');
		$this->load->model('be/implementor_types_model');	
		$this->load->model('be/intermediate_results_model');
		$this->load->model('be/biannual_model');

	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['biannual_reports'] = $this->biannual_model->get_reports_list();
			
			$data['page_title'] = 'Biannual Reports List | ';
	        $data['cur'] = 'Biannual';			
			$data['main_content'] = 'be/biannual_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function create(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['milestones'] = $this->milestones_model->get_milestones_list();
			$data['implementor_types'] = $this->implementor_types_model->get_implementor_types_list();			
			$data['intermediate_results'] = $this->intermediate_results_model->get_intermediate_results_list();

			if($this->session->userdata('biannual_report_id')) {
				$data['biannual_report'] = $this->biannual_model->get_biannual_report($this->session->userdata('biannual_report_id'));
			}
			$data['page_title'] = 'Create Biannual Report | ';
	        $data['cur'] = 'Biannual';
			$data['main_content'] = 'be/biannual_create';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function complete($biannual_report_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$this->session->set_userdata(array('biannual_report_id' => $biannual_report_id));
			redirect('be/biannual/create');	
        } 
		else {
            redirect('be/auth');
		}

	}
	function view($biannual_report_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['biannual_report'] = $this->biannual_model->get_biannual_report($biannual_report_id);
			$data['biannual_objectives'] = $this->biannual_model->get_biannual_objectives($biannual_report_id);
			$data['biannual_intermediate_results'] = $this->biannual_model->get_biannual_intermediate_results($biannual_report_id);				
			$data['biannual_resources'] = $this->biannual_model->get_biannual_resources($biannual_report_id);
			$data['biannual_deliverables'] = $this->biannual_model->get_biannual_deliverables($biannual_report_id);
			$data['biannual_management_issues'] = $this->biannual_model->get_biannual_management_issues($biannual_report_id);

			$data['page_title'] = 'Biannual Report View | ';
	        $data['cur'] = 'Biannual';
			$data['main_content'] = 'be/biannual_view';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}		
	}
	function save_summary(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_report_title' => $this->input->post('biannual_report_title'),
				'biannual_period_from' => $this->input->post('biannual_period_from'),
				'biannual_period_to' => $this->input->post('biannual_period_to'),
				'biannual_accronyms' => $this->input->post('biannual_accronyms'),				
				'biannual_executive_summary' => $this->input->post('biannual_executive_summary'),
				'system_user_id' => $this->session->userdata('user_id')
			);			

			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->update_summary($data,$biannual_report_id);
			}else{
				$q = $this->biannual_model->save_summary($data);
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
	function save_progress(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_project_progress' => $this->input->post('biannual_project_progress')
			);			

			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->save_progress($data,$biannual_report_id);

				if ($q['res'] == true){
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}
			}else{
				$resp = array('status' => 'ERR','message' => 'Your report session seems to have expired. Please go to dashboard and retrieve your report to continue.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}

	function save_deviations(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_milestone_deviations' => $this->input->post('biannual_milestone_deviations')
			);			

			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->save_deviations($data,$biannual_report_id);

				if ($q['res'] == true){
					$resp = array('status' => 'SUCCESS','message' => $q['dt']);
				}else{
					$resp = array('status' => 'ERR','message' => $q['dt']);
				}
			}else{
				$resp = array('status' => 'ERR','message' => 'Your report session seems to have expired. Please go to dashboard and retrieve your report to continue.');
			}
		}else{
			$resp = array('status' => 'EXP','message' => 'Your session seems to have expired. Please login again to continue');
		}
		echo json_encode($resp);

	}
















	function save_project_objective(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_objective_name' => $this->input->post('biannual_project_objective'),
				'biannual_report_id' => $this->session->userdata('biannual_report_id')
			);			

			$q = $this->biannual_model->save_project_objective($data);
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

	function validate_objectives(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biannual_report_id')) {
				$q = $this->biannual_model->validate_objectives($this->session->userdata('biannual_report_id'));
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

	function load_js_biannual_objectives(){
		if($this->session->userdata('biannual_report_id')) {
			$data['biannual_objectives'] = $this->biannual_model->get_biannual_objectives($this->session->userdata('biannual_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/biannual_objectives',$data);

	}

	function save_accomplishments(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_project_purpose' => $this->input->post('biannual_project_purpose')
			);			

			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->save_accomplishments($data,$biannual_report_id);

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
	function save_project_resource(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_report_id' => $this->session->userdata('biannual_report_id'),
				'implementor_type_id' => $this->input->post('biannual_resource_implementor_type_id'),
				'biannual_actual_expenditure' => $this->input->post('biannual_resource_actual_expenditure'),
				'biannual_planned_expenditure' => $this->input->post('biannual_resource_planned_expenditure'),
				'biannual_percentage_spent' => $this->input->post('biannual_resource_percentage_spent'),
				'biannual_variance' => $this->input->post('biannual_resource_variance'),
				'biannual_variance_comment' => $this->input->post('biannual_resource_variance_comment')
			);			

			$q = $this->biannual_model->save_project_resource($data);
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

	function load_js_biannual_resources(){
		if($this->session->userdata('biannual_report_id')) {
			$data['biannual_resources'] = $this->biannual_model->get_biannual_resources($this->session->userdata('biannual_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/biannual_resources',$data);
	}

	function load_js_biannual_deliverables(){
		if($this->session->userdata('biannual_report_id')) {
			$data['biannual_deliverables'] = $this->biannual_model->get_biannual_deliverables($this->session->userdata('biannual_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/biannual_deliverables',$data);
	}
	function load_js_biannual_management_issues(){
		if($this->session->userdata('biannual_report_id')) {
			$data['biannual_management_issues'] = $this->biannual_model->get_biannual_management_issues($this->session->userdata('biannual_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/biannual_management_issues',$data);		
	}
	function load_js_biannual_report(){
		if($this->session->userdata('biannual_report_id')) {
			$data['biannual_report'] = $this->biannual_model->get_biannual_report($this->session->userdata('biannual_report_id'));
			$data['biannual_objectives'] = $this->biannual_model->get_biannual_objectives($this->session->userdata('biannual_report_id'));
			$data['biannual_intermediate_results'] = $this->biannual_model->get_biannual_intermediate_results($this->session->userdata('biannual_report_id'));				
			$data['biannual_resources'] = $this->biannual_model->get_biannual_resources($this->session->userdata('biannual_report_id'));
			$data['biannual_deliverables'] = $this->biannual_model->get_biannual_deliverables($this->session->userdata('biannual_report_id'));
			$data['biannual_management_issues'] = $this->biannual_model->get_biannual_management_issues($this->session->userdata('biannual_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/biannual_report_view',$data);		

	}

	function validate_resources(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biannual_report_id')) {
				$q = $this->biannual_model->validate_resources($this->session->userdata('biannual_report_id'));
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
	function validate_deliverables(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biannual_report_id')) {
				$q = $this->biannual_model->validate_deliverables($this->session->userdata('biannual_report_id'));
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
	function validate_management_issues(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biannual_report_id')) {
				$q = $this->biannual_model->validate_management_issues($this->session->userdata('biannual_report_id'));
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
	//	PLANNED DELIVERABLES
	function save_planned_deliverables(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_report_id' => $this->session->userdata('biannual_report_id'),
				'implementor_type_id' => $this->input->post('biannual_deliverables_implementor_type_id'),
				'biannual_deliverables_cause' => $this->input->post('biannual_deliverables_cause'),
				'biannual_deliverables' => $this->input->post('biannual_deliverables'),
			);			

			$q = $this->biannual_model->save_planned_deliverables($data);
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
	//MANAGEMENT ISSUES
	function save_management_issues(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_report_id' => $this->session->userdata('biannual_report_id'),				
				'biannual_management_issues' => $this->input->post('biannual_management_issues'),
				'biannual_management_action' => $this->input->post('biannual_management_action'),
				'biannual_management_recommendation' => $this->input->post('biannual_management_recommendation'),
			);			

			$q = $this->biannual_model->save_management_issues($data);
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
	function save_strategic_outlook(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_strategic_outlook' => $this->input->post('biannual_strategic_outlook')
			);
			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->save_strategic_outlook($data,$biannual_report_id);

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

	function save_key_lessons(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'biannual_key_lessons' => $this->input->post('biannual_key_lessons')
			);
			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->save_key_lessons($data,$biannual_report_id);

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
	function submit(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'is_submitted' => 1
			);
			if($this->session->userdata('biannual_report_id')) {
				$biannual_report_id = $this->session->userdata('biannual_report_id');
				$q = $this->biannual_model->submit($data,$biannual_report_id);

				if ($q['res'] == true){
					$this->session->unset_userdata('biannual_report_id');
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
	function delete_pending($biannual_report_id){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('biannual_report_id')) {
				if ($biannual_report_id == $this->session->userdata('biannual_report_id')){
					$this->session->unset_userdata('biannual_report_id');
				}
			}
			$q = $this->biannual_model->delete($biannual_report_id);
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

	function delete($biannual_report_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->biannual_model->delete($biannual_report_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/biannual');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/biannual');
			}
		}else{
			redirect('be/auth');
		}

	}

	//GET biannual RESOURCE
	function get_biannual_resource2($biannual_resource_id){
		$biannual_resource = $this->biannual_model->get_biannual_resource2($biannual_resource_id);
		echo json_encode($biannual_resource);		
	}
	//function get_biannual_resource($biannual_resource_id){
		//$biannual_resource = $this->biannual_model->get_biannual_resource($biannual_resource_id);
		//echo json_encode($biannual_resource);		
	//}

	//UPDATE biannual RESOURCE
	function update_project_resource($biannual_resource_id){
		$data = array(
			'implementor_type_id' => $this->input->post('biannual_resource_implementor_type_id2'),
			'biannual_actual_expenditure' => $this->input->post('biannual_resource_actual_expenditure2'),
			'biannual_planned_expenditure' => $this->input->post('biannual_resource_planned_expenditure2'),
			'biannual_percentage_spent' => $this->input->post('biannual_resource_percentage_spent2'),
			'biannual_variance' => $this->input->post('biannual_resource_variance2'),
			'biannual_variance_comment' => $this->input->post('biannual_resource_variance_comment2')
		);			

		$q = $this->biannual_model->update_project_resource($data,$biannual_resource_id);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);
	}

	//DELETE biannual RESOURCE
	function delete_biannual_resource($biannual_resource_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biannual_model->delete_biannual_resource($biannual_resource_id);

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
	//DELETE biannual DELIVERABLES
	function delete_biannual_deliverables($biannual_deliverables_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biannual_model->delete_biannual_deliverables($biannual_deliverables_id);

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
	//DELETE biannual MANAGEMENT ISSUES
	function delete_biannual_management_issues($biannual_management_issues_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->biannual_model->delete_biannual_management_issues($biannual_management_issues_id);

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

	//GET biannual DELIVERABLES
	function get_biannual_deliverables2($biannual_deliverables_id){
		$biannual_deliverables = $this->biannual_model->get_biannual_deliverable2($biannual_deliverables_id);
		echo json_encode($biannual_deliverables);	

	}

	function update_planned_deliverables($biannual_deliverables_id){
			$data = array(
				'implementor_type_id' => $this->input->post('biannual_deliverables_implementor_type_id2'),
				'biannual_deliverables_cause' => $this->input->post('biannual_deliverables_cause2'),
				'biannual_deliverables' => $this->input->post('biannual_deliverables2'),
			);			

			$q = $this->biannual_model->update_planned_deliverables($data,$biannual_deliverables_id);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		echo json_encode($resp);

	}

	//GET biannual MANAGEMENT ISSUES
	function get_biannual_management_issues2($biannual_management_issues_id){
		$biannual_management_issues = $this->biannual_model->get_biannual_management_issue2($biannual_management_issues_id);
		echo json_encode($biannual_management_issues);	

	}

	function update_management_issues($biannual_management_issues_id){
			$data = array(
				'biannual_management_issues' => $this->input->post('biannual_management_issues2'),
				'biannual_management_action' => $this->input->post('biannual_management_action2'),
				'biannual_management_recommendation' => $this->input->post('biannual_management_recommendation2'),
			);			

			$q = $this->biannual_model->update_management_issues($data,$biannual_management_issues_id);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		echo json_encode($resp);

	}






	function save(){
		$save_data = array(
			'biannual_report_title' => $this->input->post('report_title'),
			'biannual_period_from' => $this->input->post('period_from'),
			'biannual_period_to' => $this->input->post('period_to'),
			'biannual_report_summary' => $this->input->post('report_summary'),
			'biannual_report_remark' => $this->input->post('report_remark'),
			'system_user_id' => $this->session->userdata('user_id')
		);			


		$q = $this->biannual_model->save_su($save_data);
		if ($q['res'] == true){
			//$this->unset_variables();
			$this->session->set_flashdata('success',$q['dt']);

			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => '<strong>'. $q['dt'] .'</strong>');
		}

		redirect('be/biannual/create');
		//echo json_encode($resp);

	}
	function js_add_intermediate_result(){
		//$taskID = $this->input->post('taskID');
		//$data['taskID'] = $taskID;
		$data['intermediate_results'] = $this->intermediate_results_model->get_intermediate_results_list();
		$this->load->view('be/js_appends/biannual_intermediate_results',$data);
	}

}

