<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quarterly extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/implementor_types_model');
		$this->load->model('be/implementors_model');
		$this->load->model('be/project_purpose_model');
		$this->load->model('be/project_objectives_model');
		$this->load->model('be/intermediate_results_model');
		$this->load->model('be/countries_model');
		$this->load->model('be/thematic_areas_model');
		$this->load->model('be/milestones_model');

		$this->load->model('be/quarterly_model');

	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['quarterly_reports'] = $this->quarterly_model->get_reports_list();
			
			$data['page_title'] = 'Quarterly Reports List | ';
	        $data['cur'] = 'Quarterly';			
			$data['main_content'] = 'be/quarterly_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function create(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['implementor_types'] = $this->implementor_types_model->get_implementor_types_list();	
			$data['implementors'] = $this->implementors_model->get_implementors_list();	
			$data['project_purpose'] = $this->project_purpose_model->get_project_purpose();	
			$data['project_objectives'] = $this->project_objectives_model->get_project_objectives_list();
			$data['intermediate_results'] = $this->intermediate_results_model->get_intermediate_results_list();
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['thematic_areas'] = $this->thematic_areas_model->get_thematic_areas_list();
			$data['milestones'] = $this->milestones_model->get_milestones_list();


			if($this->session->userdata('quarterly_report_id')) {
				$data['quarterly_report'] = $this->quarterly_model->get_quarterly_report($this->session->userdata('quarterly_report_id'));
				$data['quarterly_objectives'] = $this->quarterly_model->get_quarterly_objectives($this->session->userdata('quarterly_report_id'));
				$data['num_quarterly_objectives'] = $this->quarterly_model->get_quarterly_num_objectives($this->session->userdata('quarterly_report_id'));

				$data['quarterly_intermediate_results'] = $this->quarterly_model->get_quarterly_intermediate_results($this->session->userdata('quarterly_report_id'));				
				$data['quarterly_resources'] = $this->quarterly_model->get_quarterly_resources($this->session->userdata('quarterly_report_id'));
				$data['quarterly_deliverables'] = $this->quarterly_model->get_quarterly_deliverables($this->session->userdata('quarterly_report_id'));
				$data['quarterly_management_issues'] = $this->quarterly_model->get_quarterly_management_issues($this->session->userdata('quarterly_report_id'));
			}
			$data['page_title'] = 'Create Quarterly Report | ';
	        $data['cur'] = 'Quarterly';
			$data['main_content'] = 'be/quarterly_create';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function complete($quarterly_report_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$this->session->set_userdata(array('quarterly_report_id' => $quarterly_report_id));
			redirect('be/quarterly/create');	
        } 
		else {
            redirect('be/auth');
		}

	}
	function view($quarterly_report_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['quarterly_report'] = $this->quarterly_model->get_quarterly_report($quarterly_report_id);
			$data['quarterly_objectives'] = $this->quarterly_model->get_quarterly_objectives($quarterly_report_id);
			$data['num_quarterly_objectives'] = $this->quarterly_model->get_quarterly_num_objectives($quarterly_report_id);

			$data['quarterly_intermediate_results'] = $this->quarterly_model->get_quarterly_intermediate_results($quarterly_report_id);				
			$data['quarterly_resources'] = $this->quarterly_model->get_quarterly_resources($quarterly_report_id);
			$data['quarterly_deliverables'] = $this->quarterly_model->get_quarterly_deliverables($quarterly_report_id);
			$data['quarterly_management_issues'] = $this->quarterly_model->get_quarterly_management_issues($quarterly_report_id);

			$data['page_title'] = 'Quarterly Report View | ';
	        $data['cur'] = 'Quarterly';
			$data['main_content'] = 'be/quarterly_view';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}		
	}
	function save_summary(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'quarterly_implementor_id' => $this->input->post('quarterly_implementor_id'),
				'quarterly_period_from' => $this->input->post('quarterly_period_from'),
				'quarterly_period_to' => $this->input->post('quarterly_period_to'),
				'quarterly_executive_summary' => $this->input->post('quarterly_executive_summary'),
				'system_user_id' => $this->session->userdata('user_id')
			);			

			if($this->session->userdata('quarterly_report_id')) {
				$quarterly_report_id = $this->session->userdata('quarterly_report_id');
				$q = $this->quarterly_model->update_summary($data,$quarterly_report_id);
			}else{
				$q = $this->quarterly_model->save_summary($data);
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

	function save_project_objective(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'quarterly_project_objective_id' => $this->input->post('quarterly_project_objective_id'),
				'quarterly_intermediate_result_id' => $this->input->post('quarterly_intermediate_result_id'),
				'quarterly_country_id' => $this->input->post('quarterly_country_id'),
				'quarterly_thematic_area_id' => $this->input->post('quarterly_thematic_area_id'),
				'quarterly_milestone_id' => $this->input->post('quarterly_milestone_id'),
				'quarterly_deliverables' => $this->input->post('quarterly_deliverable'),
				'quarterly_report_id' => $this->session->userdata('quarterly_report_id')
			);			

			$q = $this->quarterly_model->save_project_objective($data);
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
			if($this->session->userdata('quarterly_report_id')) {
				$q = $this->quarterly_model->validate_objectives($this->session->userdata('quarterly_report_id'));
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

	function load_js_quarterly_objectives(){
		if($this->session->userdata('quarterly_report_id')) {
			$data['quarterly_objectives'] = $this->quarterly_model->get_quarterly_objectives($this->session->userdata('quarterly_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/quarterly_objectives',$data);

	}

	function save_accomplishments(){
		if($this->session->userdata('bnfb_loginstate')){
			$data = array(
				'quarterly_project_purpose_id' => $this->input->post('quarterly_project_purpose_id')
			);			

			if($this->session->userdata('quarterly_report_id')) {
				$quarterly_report_id = $this->session->userdata('quarterly_report_id');
				$q = $this->quarterly_model->save_accomplishments($data,$quarterly_report_id);

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
				'quarterly_report_id' => $this->session->userdata('quarterly_report_id'),
				'implementor_id' => $this->input->post('quarterly_resource_implementor_id'),
				'quarterly_actual_expenditure' => $this->input->post('quarterly_resource_actual_expenditure'),
				'quarterly_planned_expenditure' => $this->input->post('quarterly_resource_planned_expenditure'),
				'quarterly_percentage_spent' => $this->input->post('quarterly_resource_percentage_spent'),
				'quarterly_variance' => $this->input->post('quarterly_resource_variance'),
				'quarterly_variance_comment' => $this->input->post('quarterly_resource_variance_comment')
			);			

			$q = $this->quarterly_model->save_project_resource($data);
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

	function load_js_quarterly_resources(){
		if($this->session->userdata('quarterly_report_id')) {
			$data['quarterly_resources'] = $this->quarterly_model->get_quarterly_resources($this->session->userdata('quarterly_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/quarterly_resources',$data);
	}

	function load_js_quarterly_deliverables(){
		if($this->session->userdata('quarterly_report_id')) {
			$data['quarterly_deliverables'] = $this->quarterly_model->get_quarterly_deliverables($this->session->userdata('quarterly_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/quarterly_deliverables',$data);
	}
	function load_js_quarterly_management_issues(){
		if($this->session->userdata('quarterly_report_id')) {
			$data['quarterly_management_issues'] = $this->quarterly_model->get_quarterly_management_issues($this->session->userdata('quarterly_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/quarterly_management_issues',$data);		
	}
	function load_js_quarterly_report(){
		if($this->session->userdata('quarterly_report_id')) {
			$data['quarterly_report'] = $this->quarterly_model->get_quarterly_report($this->session->userdata('quarterly_report_id'));
			$data['quarterly_objectives'] = $this->quarterly_model->get_quarterly_objectives($this->session->userdata('quarterly_report_id'));
			$data['num_quarterly_objectives'] = $this->quarterly_model->get_quarterly_num_objectives($this->session->userdata('quarterly_report_id'));

			$data['quarterly_intermediate_results'] = $this->quarterly_model->get_quarterly_intermediate_results($this->session->userdata('quarterly_report_id'));				
			$data['quarterly_resources'] = $this->quarterly_model->get_quarterly_resources($this->session->userdata('quarterly_report_id'));
			$data['quarterly_deliverables'] = $this->quarterly_model->get_quarterly_deliverables($this->session->userdata('quarterly_report_id'));
			$data['quarterly_management_issues'] = $this->quarterly_model->get_quarterly_management_issues($this->session->userdata('quarterly_report_id'));
		}
		$data['quat'] = '';
		$this->load->view('be/js_appends/quarterly_report_view',$data);		

	}

	function validate_resources(){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('quarterly_report_id')) {
				$q = $this->quarterly_model->validate_resources($this->session->userdata('quarterly_report_id'));
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
			if($this->session->userdata('quarterly_report_id')) {
				$q = $this->quarterly_model->validate_deliverables($this->session->userdata('quarterly_report_id'));
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
			if($this->session->userdata('quarterly_report_id')) {
				$q = $this->quarterly_model->validate_management_issues($this->session->userdata('quarterly_report_id'));
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
				'quarterly_deliverable_project_objective_id' => $this->input->post('quarterly_deliverable_project_objective_id'),
				'quarterly_deliverable_intermediate_result_id' => $this->input->post('quarterly_deliverable_intermediate_result_id'),
				'quarterly_deliverable_country_id' => $this->input->post('quarterly_deliverable_country_id'),
				'quarterly_deliverable_thematic_area_id' => $this->input->post('quarterly_deliverable_thematic_area_id'),
				'quarterly_deliverable_milestone_id' => $this->input->post('quarterly_deliverable_milestone_id'),
				'quarterly_deliverable_deliverables' => $this->input->post('quarterly_deliverable_deliverable'),
				'quarterly_report_id' => $this->session->userdata('quarterly_report_id')
			);			

			$q = $this->quarterly_model->save_planned_deliverables($data);
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
				'quarterly_report_id' => $this->session->userdata('quarterly_report_id'),				
				'quarterly_management_issues' => $this->input->post('quarterly_management_issues'),
				'quarterly_management_action' => $this->input->post('quarterly_management_action'),
				'quarterly_management_recommendation' => $this->input->post('quarterly_management_recommendation'),
			);			

			$q = $this->quarterly_model->save_management_issues($data);
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
				'quarterly_strategic_outlook' => $this->input->post('quarterly_strategic_outlook')
			);
			if($this->session->userdata('quarterly_report_id')) {
				$quarterly_report_id = $this->session->userdata('quarterly_report_id');
				$q = $this->quarterly_model->save_strategic_outlook($data,$quarterly_report_id);

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
				'quarterly_key_lessons' => $this->input->post('quarterly_key_lessons')
			);
			if($this->session->userdata('quarterly_report_id')) {
				$quarterly_report_id = $this->session->userdata('quarterly_report_id');
				$q = $this->quarterly_model->save_key_lessons($data,$quarterly_report_id);

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
			if($this->session->userdata('quarterly_report_id')) {
				$quarterly_report_id = $this->session->userdata('quarterly_report_id');
				$q = $this->quarterly_model->submit($data,$quarterly_report_id);

				if ($q['res'] == true){
					$this->session->unset_userdata('quarterly_report_id');
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
	function delete_pending($quarterly_report_id){
		if($this->session->userdata('bnfb_loginstate')){
			if($this->session->userdata('quarterly_report_id')) {
				if ($quarterly_report_id == $this->session->userdata('quarterly_report_id')){
					$this->session->unset_userdata('quarterly_report_id');
				}
			}
			$q = $this->quarterly_model->delete($quarterly_report_id);
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

	function delete($quarterly_report_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->quarterly_model->delete($quarterly_report_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/quarterly');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/quarterly');
			}
		}else{
			redirect('be/auth');
		}

	}

	//GET QUARTERLY RESOURCE
	function get_quarterly_resource2($quarterly_resource_id){
		$quarterly_resource = $this->quarterly_model->get_quarterly_resource2($quarterly_resource_id);
		echo json_encode($quarterly_resource);		
	}
	//function get_quarterly_resource($quarterly_resource_id){
		//$quarterly_resource = $this->quarterly_model->get_quarterly_resource($quarterly_resource_id);
		//echo json_encode($quarterly_resource);		
	//}

	//UPDATE QUARTERLY RESOURCE
	function update_project_resource($quarterly_resource_id){
		$data = array(
			'implementor_id' => $this->input->post('quarterly_resource_implementor_id2'),
			'quarterly_actual_expenditure' => $this->input->post('quarterly_resource_actual_expenditure2'),
			'quarterly_planned_expenditure' => $this->input->post('quarterly_resource_planned_expenditure2'),
			'quarterly_percentage_spent' => $this->input->post('quarterly_resource_percentage_spent2'),
			'quarterly_variance' => $this->input->post('quarterly_resource_variance2'),
			'quarterly_variance_comment' => $this->input->post('quarterly_resource_variance_comment2')
		);			

		$q = $this->quarterly_model->update_project_resource($data,$quarterly_resource_id);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);
	}

	//DELETE QUARTERLY RESOURCE
	function delete_quarterly_resource($quarterly_resource_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->quarterly_model->delete_quarterly_resource($quarterly_resource_id);

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
	//DELETE QUARTERLY DELIVERABLES
	function delete_quarterly_deliverables($quarterly_deliverables_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->quarterly_model->delete_quarterly_deliverables($quarterly_deliverables_id);

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
	//DELETE QUARTERLY MANAGEMENT ISSUES
	function delete_quarterly_management_issues($quarterly_management_issues_id){
		if($this->session->userdata('bnfb_loginstate')){
			
			$q = $this->quarterly_model->delete_quarterly_management_issues($quarterly_management_issues_id);

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

	//GET QUARTERLY DELIVERABLES
	function get_quarterly_deliverables2($quarterly_deliverables_id){
		$quarterly_deliverables = $this->quarterly_model->get_quarterly_deliverable2($quarterly_deliverables_id);
		echo json_encode($quarterly_deliverables);	

	}

	function update_planned_deliverables($quarterly_deliverables_id){
			$data = array(
				'implementor_id' => $this->input->post('quarterly_deliverables_implementor_id2'),
				'quarterly_deliverables_cause' => $this->input->post('quarterly_deliverables_cause2'),
				'quarterly_deliverables' => $this->input->post('quarterly_deliverables2'),
			);			

			$q = $this->quarterly_model->update_planned_deliverables($data,$quarterly_deliverables_id);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		echo json_encode($resp);

	}

	//GET QUARTERLY MANAGEMENT ISSUES
	function get_quarterly_management_issues2($quarterly_management_issues_id){
		$quarterly_management_issues = $this->quarterly_model->get_quarterly_management_issue2($quarterly_management_issues_id);
		echo json_encode($quarterly_management_issues);	

	}

	function update_management_issues($quarterly_management_issues_id){
			$data = array(
				'quarterly_management_issues' => $this->input->post('quarterly_management_issues2'),
				'quarterly_management_action' => $this->input->post('quarterly_management_action2'),
				'quarterly_management_recommendation' => $this->input->post('quarterly_management_recommendation2'),
			);			

			$q = $this->quarterly_model->update_management_issues($data,$quarterly_management_issues_id);
			if ($q['res'] == true){
				$resp = array('status' => 'SUCCESS','message' => $q['dt']);
			}else{
				$resp = array('status' => 'ERR','message' => $q['dt']);
			}
		echo json_encode($resp);

	}






	function save(){
		$save_data = array(
			'quarterly_implementor_id' => $this->input->post('quarterly_implementor_id'),
			'quarterly_period_from' => $this->input->post('period_from'),
			'quarterly_period_to' => $this->input->post('period_to'),
			'quarterly_report_summary' => $this->input->post('report_summary'),
			'quarterly_report_remark' => $this->input->post('report_remark'),
			'system_user_id' => $this->session->userdata('user_id')
		);			


		$q = $this->quarterly_model->save_su($save_data);
		if ($q['res'] == true){
			//$this->unset_variables();
			$this->session->set_flashdata('success',$q['dt']);

			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => '<strong>'. $q['dt'] .'</strong>');
		}

		redirect('be/Quarterly/create');
		//echo json_encode($resp);

	}
	function js_add_intermediate_result(){
		//$taskID = $this->input->post('taskID');
		//$data['taskID'] = $taskID;
		$data['intermediate_results'] = $this->intermediate_results_model->get_intermediate_results_list();
		$this->load->view('be/js_appends/quarterly_intermediate_results',$data);
	}

}

