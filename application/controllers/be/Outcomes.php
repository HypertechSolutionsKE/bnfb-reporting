<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outcomes extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/outcomes_model');
		$this->load->model('be/indicators_model');
		$this->load->model('be/countries_model');
		$this->load->model('be/trainings_model');
		$this->load->model('be/implementors_model');
		$this->load->model('be/districts_model');
		$this->load->model('be/crops_model');

	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			//$data['outputs'] = $this->outputs_model->get_outputs_list();
			
			$data['page_title'] = 'Outputs/Outcomes | ';
        	$data['cur'] = 'Outcomes';
			$data['main_content'] = 'be/outcomes_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function load_outcome_list($outcome){
		switch ($outcome) {
			case 'change_agents_trained':
				$data['change_agents_trained'] = $this->outcomes_model->get_change_agents_trained_list();
				$this->load->view('be/oo/oo_change_agents_trained_list',$data);
				break;

			case 'policy_documents':
				$data['policy_documents'] = $this->outcomes_model->get_policy_documents_list();
				$this->load->view('be/oo/oo_policy_documents_list',$data);
				break;

			case 'advocates':
				$data['advocates'] = $this->outcomes_model->get_advocates_list();
				$this->load->view('be/oo/oo_advocates_list',$data);
				break;

			case 'new_programs':
				$data['new_programs'] = $this->outcomes_model->get_new_programs_list();
				$this->load->view('be/oo/oo_new_programs_list',$data);
				break;

			case 'resources_mobilized':
				$data['resources_mobilized'] = $this->outcomes_model->get_resources_mobilized_list();
				$this->load->view('be/oo/oo_resources_mobilized_list',$data);
				break;

			case 'key_issues_discussed':
				$data['key_issues_discussed'] = $this->outcomes_model->get_key_issues_discussed_list();
				$this->load->view('be/oo/oo_key_issues_discussed_list',$data);
				break;

			case 'key_elements_documented':
				$data['key_elements_documented'] = $this->outcomes_model->get_key_elements_documented_list();
				$this->load->view('be/oo/oo_key_elements_documented_list',$data);
				break;

			case 'institutions_equipped':
				$data['institutions_equipped'] = $this->outcomes_model->get_institutions_equipped_list();
				$this->load->view('be/oo/oo_institutions_equipped_list',$data);
				break;

			case 'households':
				$data['households'] = $this->outcomes_model->get_households_list();
				$this->load->view('be/oo/oo_households_list',$data);
				break;

			case 'percentage_national_programs':
				$data['percentage_national_programs'] = $this->outcomes_model->get_percentage_national_programs_list();
				$this->load->view('be/oo/oo_percentage_national_programs_list',$data);
				break;

			case 'commercial_processes':
				$data['commercial_processes'] = $this->outcomes_model->get_commercial_processes_list();
				$this->load->view('be/oo/oo_commercial_processes_list',$data);
				break;

			case 'number_national_programs':
				$data['number_national_programs'] = $this->outcomes_model->get_number_national_programs_list();
				$this->load->view('be/oo/oo_number_national_programs_list',$data);
				break;

				
				default:
					# code...
					break;
			}	
	}
	function load_outcome_add($outcome){
		switch ($outcome) {
			case 'change_agents_trained':
				$data['trainings'] = $this->trainings_model->get_trainings_list();
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();

				$this->load->view('be/oo/oo_change_agents_trained_add',$data);
				break;

			case 'policy_documents':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$this->load->view('be/oo/oo_policy_documents_add',$data);
				break;

			case 'advocates':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$this->load->view('be/oo/oo_advocates_add',$data);
				break;

			case 'new_programs':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['crops'] = $this->crops_model->get_crops_list();			
				$this->load->view('be/oo/oo_new_programs_add',$data);
				break;

			case 'resources_mobilized':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$this->load->view('be/oo/oo_resources_mobilized_add',$data);
				break;

			case 'key_issues_discussed':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$this->load->view('be/oo/oo_key_issues_discussed_add',$data);
				break;

			case 'key_elements_documented':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['crops'] = $this->crops_model->get_crops_list();			
				$this->load->view('be/oo/oo_key_elements_documented_add',$data);
				break;

			case 'institutions_equipped':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$this->load->view('be/oo/oo_institutions_equipped_add',$data);
				break;

			case 'households':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();
				$data['crops'] = $this->crops_model->get_crops_list();
				$this->load->view('be/oo/oo_households_add',$data);
				break;

			case 'percentage_national_programs':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$data['crops'] = $this->crops_model->get_crops_list();			

				$this->load->view('be/oo/oo_percentage_national_programs_add',$data);
				break;

			case 'commercial_processes':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$data['crops'] = $this->crops_model->get_crops_list();			

				$this->load->view('be/oo/oo_commercial_processes_add',$data);
				break;

			case 'number_national_programs':
				$data['implementors'] = $this->implementors_model->get_implementors_list();
				$data['countries'] = $this->countries_model->get_countries_list();
				$data['districts'] = $this->districts_model->get_districts_list();			
				$this->load->view('be/oo/oo_number_national_programs_add',$data);
				break;
				
			default:
				# code...
				break;
		}	

	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			//$data['indicators'] = $this->indicators_model->get_indicators_list();
			//$data['countries'] = $this->countries_model->get_countries_list();

			$data['page_title'] = 'Add Output/Outcome | ';
	        $data['cur'] = 'Outcomes';
			$data['main_content'] = 'be/outcomes_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}


	function save_change_agents_trained(){
		$data = array(
			'training_period_from' => $this->input->post('training_period_from'),
			'training_period_to' => $this->input->post('training_period_to'),
			'training_id' => $this->input->post('training_id'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'district_id' => $this->input->post('district_id'),
			'male_attendees' => $this->input->post('male_attendees'),
			'female_attendees' => $this->input->post('female_attendees'),
			'total_attendees' => $this->input->post('total_attendees')
		);	
		$q = $this->outcomes_model->save_change_agents_trained($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_policy_documents(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'district_id' => $this->input->post('district_id'),
			'no_policy_documents' => $this->input->post('no_policy_documents')
		);	
		$q = $this->outcomes_model->save_policy_documents($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_advocates(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'district_id' => $this->input->post('district_id'),
			'no_advocates' => $this->input->post('no_advocates')
		);	
		$q = $this->outcomes_model->save_advocates($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_new_programs(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'crop_id' => $this->input->post('crop_id'),
			'no_programs' => $this->input->post('no_programs')
		);	
		$q = $this->outcomes_model->save_new_programs($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_resources_mobilized(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'amount' => $this->input->post('amount')
		);	
		$q = $this->outcomes_model->save_resources_mobilized($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_key_issues_discussed(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'no_key_issues' => $this->input->post('no_key_issues'),
			'type_key_issues' => $this->input->post('type_key_issues')
		);	
		$q = $this->outcomes_model->save_key_issues_discussed($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_key_elements_documented(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'crop_id' => $this->input->post('crop_id'),
			'no_key_elements' => $this->input->post('no_key_elements'),
			'type_key_elements' => $this->input->post('type_key_elements')
		);	
		$q = $this->outcomes_model->save_key_elements_documented($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_institutions_equipped(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'no_institutions' => $this->input->post('no_institutions')
		);	
		$q = $this->outcomes_model->save_institutions_equipped($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_households(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'crop_id' => $this->input->post('crop_id'),
			'no_households' => $this->input->post('no_households')
		);	
		$q = $this->outcomes_model->save_households($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_percentage_national_programs(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'crop_id' => $this->input->post('crop_id'),
			'no_percentage' => $this->input->post('no_percentage')
		);	
		$q = $this->outcomes_model->save_percentage_national_programs($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_commercial_processes(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'crop_id' => $this->input->post('crop_id'),
			'no_processes' => $this->input->post('no_processes')
		);	
		$q = $this->outcomes_model->save_commercial_processes($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}
	function save_number_national_programs(){
		$data = array(
			'period_from' => $this->input->post('period_from'),
			'period_to' => $this->input->post('period_to'),
			'implementor_id' => $this->input->post('implementor_id'),
			'country_id' => $this->input->post('country_id'),
			'no_programs' => $this->input->post('no_programs')
		);	
		$q = $this->outcomes_model->save_number_national_programs($data);
		if ($q['res'] == true){
			$resp = array('status' => 'SUCCESS','message' => $q['dt']);
		}else{
			$resp = array('status' => 'ERR','message' => $q['dt']);
		}
		echo json_encode($resp);

	}








	function save(){
		$data = array(
			'training_period_from' => $this->input->post('training_period_from'),
			'training_period_to' => $this->input->post('training_period_to'),
			'indicator_id' => $this->input->post('indicator_id'),
			'country_id' => $this->input->post('country_id'),
			'males_attended' => $this->input->post('males_attended'),
			'females_attended' => $this->input->post('females_attended')
		);	
		$q = $this->outputs_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/outputs/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/outputs/add');
		}
	}
	function edit($output_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['indicators'] = $this->indicators_model->get_indicators_list();
			$data['countries'] = $this->countries_model->get_countries_list();
			$data['output'] = $this->outputs_model->get_output($output_id);

			$data['page_title'] = 'Edit Output | ';
	        $data['cur'] = 'Outputs';
			$data['main_content'] = 'be/outputs_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($output_id){
		$data = array(
			'training_period_from' => $this->input->post('training_period_from'),
			'training_period_to' => $this->input->post('training_period_to'),
			'indicator_id' => $this->input->post('indicator_id'),
			'country_id' => $this->input->post('country_id'),
			'males_attended' => $this->input->post('males_attended'),
			'females_attended' => $this->input->post('females_attended')
		);	
		$q = $this->outputs_model->update($data,$output_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/outputs/edit/'.$output_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/outputs/edit/'.$output_id);
		}

	}
	function delete($output_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->outputs_model->delete($output_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/outputs');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/outputs');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

