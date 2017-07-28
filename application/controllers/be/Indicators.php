<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicators extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/indicators_model');
		$this->load->model('be/project_objectives_model');
		$this->load->model('be/disaggregation_levels_model');

	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['indicators'] = $this->indicators_model->get_indicators_list();
			$data['indicator_disaggregation_levels'] = $this->indicators_model->get_indicator_disaggregation_levels();
			
			$data['page_title'] = 'Indicators List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/indicators_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['project_objectives'] = $this->project_objectives_model->get_project_objectives_list();
			$data['disaggregation_levels'] = $this->disaggregation_levels_model->get_disaggregation_levels_list();

			$data['page_title'] = 'Add Indicator | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/indicators_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'project_objective_id' => $this->input->post('project_objective_id'),			
			'indicator_name' => $this->input->post('indicator_name'),
			'indicator_definition' => $this->input->post('indicator_definition'),
			'target' => $this->input->post('target'),
			'baseline_value' => $this->input->post('baseline_value'),
			'source_of_data' => $this->input->post('source_of_data'),
			'data_collection_frequency' => $this->input->post('data_collection_frequency'),
			'responsibility' => $this->input->post('responsibility')
		);	
		$q = $this->indicators_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/indicators/add');
			//$this->add();
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/indicators/add');
			//$resp = array('status' => 'ERR','message' => $q['dt']);
		}
	}
	function edit($indicator_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['indicator'] = $this->indicators_model->get_indicator($indicator_id);

			$data['page_title'] = 'Edit Indicator | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/indicators_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($indicator_id){
		$data = array(
			'project_objective_id' => $this->input->post('project_objective_id'),			
			'indicator_name' => $this->input->post('indicator_name'),
			'indicator_definition' => $this->input->post('indicator_definition'),
			'target' => $this->input->post('target'),
			'baseline_value' => $this->input->post('baseline_value'),
			'source_of_data' => $this->input->post('source_of_data'),
			'data_collection_frequency' => $this->input->post('data_collection_frequency'),
			'responsibility' => $this->input->post('responsibility')
		);	
		$q = $this->indicators_model->update($data,$indicator_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/indicators/edit/'.$indicator_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/indicators/edit/'.$indicator_id);
		}

	}
	function delete($indicator_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->indicators_model->delete($indicator_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/indicators');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/indicators');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

