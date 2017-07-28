<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_purpose extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('be/project_purpose_model');
	}

	function index(){
		if($this->session->userdata('bnfb_loginstate')) {
			$data['project_purpose'] = $this->project_purpose_model->get_project_purpose();
			
			$data['page_title'] = 'Project Purpose | ';
        	$data['cur'] = 'Settings';
			$data['main_content'] = 'be/project_purpose';
			$this->load->view('be/includes/template',$data);
        } 
		else {
            redirect('be/auth');
		}
	}
	function save(){
		$data = array(
			'project_purpose' => $this->input->post('project_purpose'),
		);
		$q = $this->project_purpose_model->save($data);
		if ($q['res'] == true){
			$this->session->set_flashdata('success',$q['dt']);
			redirect('be/project_purpose');
		}else{
			$this->session->set_flashdata('error',$q['dt']);
			redirect('be/project_purpose');
		}
	}
}

