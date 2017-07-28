<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_objectives extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/project_objectives_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['project_objectives'] = $this->project_objectives_model->get_project_objectives_list();
			
			$data['page_title'] = 'Project Objectives List | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/project_objectives_list';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function add(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['page_title'] = 'Add Project Objective | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/project_objectives_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'project_objective_name' => $this->input->post('project_objective_name')
		);	
		$q = $this->project_objectives_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/project_objectives/add');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/project_objectives/add');
		}
	}
	function edit($project_objective_id){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['project_objective'] = $this->project_objectives_model->get_project_objective($project_objective_id);

			$data['page_title'] = 'Edit Project Objective | ';
	        $data['cur'] = 'Settings';
			$data['main_content'] = 'be/project_objectives_add';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}

	}
	function update($project_objective_id){
		$data = array(
			'project_objective_name' => $this->input->post('project_objective_name')
		);	
		$q = $this->project_objectives_model->update($data,$project_objective_id);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/project_objectives/edit/'.$project_objective_id);
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/project_objectives/edit/'.$project_objective_id);
		}

	}
	function delete($project_objective_id){
		if($this->session->userdata('bnfb_loginstate')){
			$q = $this->project_objectives_model->delete($project_objective_id);
			if($q['res'] == TRUE){
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/project_objectives');
			}else{					
				$this->session->set_flashdata('success',$q['dt']);
				redirect('be/project_objectives');
			}
		}else{
            redirect('be/auth');
    	}

	}
}

